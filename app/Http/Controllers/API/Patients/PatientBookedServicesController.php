<?php

namespace App\Http\Controllers\API\Patients;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethods\StripeController;
use App\Http\Requests\API\Patients\BookedServiceRequest;
use App\Http\Resources\API\BookedServicesResource;
use App\Models\ServiceSchedule;
use App\Models\ServiceScheduleSlot;
use App\Models\ServiceStatus;
use App\Models\ServiceType;
use App\Models\BookedService;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class PatientBookedServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('api');
        $this->middleware('verified');
        $this->middleware('api_setting');
        $this->middleware('patient.api');
    }
    public function getter($req = null, $export = null)
    {

        $patient = auth()->user()->patient;
        if ($req != null) {
            $patient_services =  $patient->services()->withAll();
            if ($req->trash && $req->trash == 'with') {
                $patient_services =  $patient_services->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $patient_services =  $patient_services->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $patient_services = $patient_services->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $patient_services = $patient_services->whereLike(['name', 'description'], $req->search);
            }
            if ($req->status_code) {
                $patient_services = $patient_services->where('service_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $patient_services = $patient_services->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $patient_services = $patient_services->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $patient_services = $patient_services->get();
                return $patient_services;
            }
            $totalPatientServices = $patient_services->count();
            $patient_services = $patient_services->paginate($req->perPage);
            $patient_services = BookedServicesResource::collection($patient_services)->response()->getData(true);

            return $patient_services;
        }
        $patient_services = BookedServicesResource::collection($patient->services()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $patient_services;
    }

    public function bookService(BookedServiceRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user = Auth()->user();
            $patient = $user->patient->id;
            $service = Service::where('id', $request->service_id)->first();

            $data['price'] = $service->price;
            $data['doctor_id'] = $service->doctor_id ?? null;
            $data['doctor_id'] = $service->doctor_id ?? null;
            $data['patient_id'] = $patient;
            $data['service_status_code'] = ServiceStatus::$Pending;
            if ($request->hasFile('attachment')) {
                $data['attachment_url'] = uploadFile($request, 'attachment', 'booked_services');
            }
            $request->merge(['amount' => $data['price'], 'type' => 'service']);

            $fund_request = PaymentController::addFundRequest($request);
            // dd($fund_request);
            $data['fund_id'] = $fund_request['fund']['id'] ?? null;
            if ($fund_request['fund'] ?? false) {
                $data['is_paid'] = 0;
                $service = BookedService::create($data);
                // $request->merge(['fee' => $data['fee']]);
                $service->fund_transaction = $fund_request['fund']->transaction ?? null;
                // $service->fund = $fund_request['fund'];
                $response = generateResponse($service, true, 'Service Booked Successfully', null, 'collection');
                DB::commit();
                return response()->json($response, 200);
            } else {
                $response = generateResponse($fund_request, false, 'Error', null, 'collection');
                return response()->json($response, 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
            return response()->json($response, 200);
        }
    }
    public function getFilteredServiceLogs(Request $request)
    {
        $services = $this->getter($request);
        $response = generateResponse($services, count($services['data']) > 0 ? true : false, 'Filter Service Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showServiceLogDetail(BookedService $booked_service)
    {
        $user = Auth()->user();
        $service = BookedService::withAll()->find($booked_service->id);
        return ($booked_service->patient_id == $user->patient->id)
            ? response()->json(generateResponse(new BookedServicesResource($service), true, 'Service Fetched Successfully', null, 'collection'), 200)
            : response()->json(generateResponse(null, false, 'Service Not Found', null, 'collection'), 404);
    }
}

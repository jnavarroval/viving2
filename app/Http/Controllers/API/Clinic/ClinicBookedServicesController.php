<?php

namespace App\Http\Controllers\API\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookedService;
use App\Http\Resources\API\BookedServicesResource;
use App\Models\ServiceStatus;
use App\PusherBeam\PusherBeamService;

class ClinicBookedServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api', 'auth:api', 'verified', 'api_setting']);
        $this->middleware('clinic.api');
    }
    public function getter($req = null, $export = null)
    {
        $clinic = auth()->user()->clinic;
        if ($req != null) {
            $clinic_services =  $clinic->services()->withAll();
            if ($req->trash && $req->trash == 'with') {
                $clinic_services =  $clinic_services->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $clinic_services =  $clinic_services->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $clinic_services = $clinic_services->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $clinic_services = $clinic_services->whereLike(['name', 'description'], $req->search);
            }

            if ($req->status_code) {
                $clinic_services = $clinic_services->where('service_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $clinic_services = $clinic_services->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $clinic_services = $clinic_services->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $clinic_services = $clinic_services->get();
                return $clinic_services;
            }
            $totalClinicServices = $clinic_services->count();
            $clinic_services = $clinic_services->paginate($req->perPage);
            $clinic_services = BookedServicesResource::collection($clinic_services)->response()->getData(true);

            return $clinic_services;
        }
        $clinic_services = BookedServicesResource::collection($clinic->services()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $clinic_services;
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
        return ($booked_service->clinic_id == $user->clinic->id)
            ? response()->json(generateResponse(new BookedServicesResource($booked_service), true, 'Service Fetched Successfully', null, 'collection'), 200)
            : response()->json(generateResponse(null, false, 'Service Not Found', null, 'collection'), 404);
    }

    public function updateServiceStatus(Request $request, BookedService $booked_service)
    {
        $request->validate([
            'service_status_code' => 'required|in:1,2,3,4,5',
        ]);
        $user = Auth()->user();
        $settings = generalSettings();

        if (($booked_service->clinic_id == $user->clinic->id)) {
            $patient_id = $booked_service->patient->id;
            $updated = $booked_service->update([
                'service_status_code' => $request->service_status_code
            ]);
            if ($updated) {
                if ($request->service_status_code == ServiceStatus::$Accepted) {
                    $title = 'Your Service has been Accepted';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->service_status_code == ServiceStatus::$Rejected) {
                    $title = 'Your Service has been Rejected';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->service_status_code == ServiceStatus::$Cancel) {

                    $title = 'Your Service has been Canceled';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->service_status_code == ServiceStatus::$Completed) {
                    $title = 'Your Service has been Completed';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                $pusher = new PusherBeamService;
                $users = (string)$patient_id;
                $pusher->sendNotificationToUsers($users, $title, $body, $deep_link);
            }
        }
        $booked_service = new BookedServicesResource($booked_service);
        $response = generateResponse($booked_service, isset($booked_service) ? true : false, 'Service Status Updated Successfully', null, 'collection');
        return response()->json($response, 200);
    }
}

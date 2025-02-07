<?php

namespace App\Http\Controllers\API\Doctors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookedService;
use App\Http\Resources\API\BookedServicesResource;
use App\Models\ServiceStatus;
use App\PusherBeam\PusherBeamService;

class DoctorBookedServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api', 'auth:api', 'verified', 'api_setting']);
        $this->middleware('doctor.api');
    }
    public function getter($req = null, $export = null)
    {
        $doctor = auth()->user()->doctor;
        if ($req != null) {
            $doctor_services =  $doctor->services()->withAll();
            if ($req->trash && $req->trash == 'with') {
                $doctor_services =  $doctor_services->withTrashed();
            }
            if ($req->trash && $req->trash == 'only') {
                $doctor_services =  $doctor_services->onlyTrashed();
            }
            if ($req->column && $req->column != null && $req->search != null) {
                $doctor_services = $doctor_services->whereLike($req->column, $req->search);
            } else if ($req->search && $req->search != null) {

                $doctor_services = $doctor_services->whereLike(['name', 'description'], $req->search);
            }

            if ($req->status_code) {
                $doctor_services = $doctor_services->where('service_status_code', $req->status_code);
            }

            if ($req->sort && $req->sort['field'] != null && $req->sort['type'] != null) {
                $doctor_services = $doctor_services->OrderBy($req->sort['field'], $req->sort['type']);
            } else {
                $doctor_services = $doctor_services->OrderBy('id', 'desc');
            }
            if ($export != null) { // for export do not paginate
                $doctor_services = $doctor_services->get();
                return $doctor_services;
            }
            $total§§doctorServices = $doctor_services->count();
            $doctor_services = $doctor_services->paginate($req->perPage);
            $doctor_services = BookedServicesResource::collection($doctor_services)->response()->getData(true);

            return $doctor_services;
        }
        $doctor_services = BookedServicesResource::collection($doctor->services()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $doctor_services;
    }

    public function getFilteredBookedServices(Request $request)
    {
        $services = $this->getter($request);
        $response = generateResponse($services, count($services['data']) > 0 ? true : false, 'Filter Service Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showBookedServiceDetail(BookedService $booked_service)
    {
        $user = Auth()->user();
        return ($booked_service->doctor_id == $user->doctor->id)
            ? response()->json(generateResponse(new BookedServicesResource($booked_service), true, 'Service Fetched Successfully', null, 'collection'), 200)
            : response()->json(generateResponse(null, false, 'Service Not Found', null, 'collection'), 404);
    }

    public function updateBookedServiceStatus(Request $request, BookedService $booked_service)
    {
        $request->validate([
            'service_status_code' => 'required|in:1,2,3,4,5',
        ]);
        $user = Auth()->user();
        $settings = generalSettings();

        if (($booked_service->doctor_id == $user->doctor->id)) {
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

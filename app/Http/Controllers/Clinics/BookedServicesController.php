<?php

namespace App\Http\Controllers\Clinics;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

use App\Http\Resources\Web\BookedServicesResource;
use App\Models\ServiceStatus;
use App\Models\BookedService;
use App\Models\Commission;
use App\PusherBeam\PusherBeamService;
use Carbon\Carbon;

class BookedServicesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('clinics');
    }
    public function getter($req = null, $export = null)
    {

        $clinics = auth()->user()->clinic;

        if ($req != null) {
            $clinic_services =  $clinics->services()->withAll();
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
        $clinic_services = BookedServicesResource::collection($clinics->services()->withAll()->orderBy('id', 'desc')->paginate(10))->response()->getData(true);
        return $clinic_services;
    }
    public function getClinicFilteredServiceLogs(Request $request)
    {
        $services = $this->getter($request);
        $response = generateResponse($services, count($services['data']) > 0 ? true : false, 'Filter Service Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showClinicServiceLogDetailPage($id)
    {
        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $service = BookedService::withAll()->where('id', $id)->where('clinic_id', $clinic_id)->first();
        $service = new BookedServicesResource($service);
        $gateway = $service?->fund?->gateway;
        $data = [
            'service' => $service,
            'gateway' => $gateway,
        ];
        return Inertia::render('ServiceLogs/Detail', $data);
    }
    public function updateServiceStatus(Request $request)
    {

        $settings = generalSettings();
        $user = Auth()->user();
        $clinic_id = $user->clinic->id;
        $service = BookedService::withAll()->where('id', $request->service_id)->where('clinic_id', $clinic_id)->first();
        $patient_id = $service->patient->id;
        if ($service) {
            $updated =  $service->update([
                'service_status_code' => $request->status_code
            ]);
            if ($request->status_code == ServiceStatus::$Completed) {
                $service->update([
                    'ended_at' => Carbon::now(),
                ]);
            }
            if ($updated) {
                if ($request->status_code == ServiceStatus::$Accepted) {
                    $title = 'Your Service has been Accepted';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->status_code == ServiceStatus::$Rejected) {
                    $title = 'Your Service has been Rejected';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->status_code == ServiceStatus::$Cancel) {

                    $title = 'Your Service has been Canceled';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                }
                if ($request->status_code == ServiceStatus::$Completed) {

                    $title = 'Your Service has been Completed';
                    $body = 'You have a new notification';
                    $deep_link = env('APP_URL') . '/service_log';
                    if ((int)$settings['enable_wallet_system']) {
                        if ($settings['commission_type'] == 'commission_base') {
                            $commission = Commission::where('service_type_id', $service->service_type_id)->first();
                            if ($commission && $commission->commission_type == 'fixed_rate') {
                                $commission_amount = $commission->rate ?? 0;
                                $final_amount = $service->price - $commission_amount;
                            } else {
                                $rate = $commission->rate ?? 0;
                                $percentage_value = ($service->price / 100) * $rate;
                                $commission_amount = $percentage_value;
                                $final_amount = $service->price - $percentage_value;
                            }
                        } else {
                            $final_amount = $service->price;
                        }
                        $meta = ['details' => 'Deposit on Completion of Service # ' . $service->id];

                        $user->deposit($final_amount, $meta);
                    }
                }
                $pusher = new PusherBeamService;
                $users = (string)$patient_id;
                $pusher->sendNotificationToUsers($users, $title, $body, $deep_link);
            }


            if ($request->status_code == 2) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Service Accepted Successfully',
                ]);
            } elseif ($request->status_code == 3) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Service Rejected Successfully',
                ]);
            } elseif ($request->status_code == 5) {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Service Mark as Completed Successfully',
                ]);
            }
            return redirect()->back();
        }
    }
    public function updateServiceStarted(Request $request)
    {

        $user = Auth()->user();
        $clinic_id = $user->clinics->id;
        $service = BookedService::withAll()->where('id', $request->service_id)->where('clinic_id', $clinic_id)->first();
        if ($service) {
            $updated =  $service->update([
                'started_at' => Carbon::now(),
            ]);

            $response = generateResponse(null, true, 'Service Joined Successfully', null, 'object');
            return response()->json($response, 200);
        }
    }
}

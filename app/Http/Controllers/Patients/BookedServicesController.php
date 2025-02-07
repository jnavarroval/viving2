<?php

namespace App\Http\Controllers\Patients;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationSettingsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethods\StripeController;
use App\Http\Controllers\WalletController;
use App\Http\Requests\Patients\BookedServiceRequest;
use App\Http\Resources\Web\BookedServicesResource;
use App\Http\Resources\Web\ServicesResource;
use App\Models\BankAccount;
use App\Models\ServiceStatus;
use App\Models\ServiceType;
use App\Models\BookService;
use App\Models\BookedService;
use App\Models\Gateway;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class BookedServicesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('patient');
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

    public function showBookServicePage(Request $request, $slug)
    {
        $service = Service::withAll()->withChildrens()->hasModulePermissions()->active()->where('slug', $slug)->first();
        if (!$service) {
            abort(404);
        }
        $service = new ServicesResource($service);
        $gateways = Gateway::where('status', 1)->orderBy('sort_by', 'ASC')->get();

        return Inertia::render('Services/BookService', [
            'service' => $service,
            "gateways" => $gateways
        ]);
    }

    public function bookService(BookedServiceRequest $request)
    {
        $service = Service::find($request->service_id);
        if ($service) {
            $request->merge(['price' => $service->price, 'doctor_id' => $service->doctor_id ?? null, 'clinic_id' => $service->clinic_id ?? null]);
        }
        $data = $request->all();
        $user = Auth()->user();
        $patient = $user->patient->id;

        $data['patient_id'] = $patient;
        $data['service_status_code'] = ServiceStatus::$Pending;
        if ($request->hasFile('attachment')) {
            $data['attachment_url'] = uploadFile($request, 'attachment', 'booked_services');
        }
        $request->merge([
            'amount' => $data['price'],
            'type' => 'service'
        ]);

        if ($request->gateway == 'bank-transfer') {
            $fund_request = PaymentController::addFundRequest($request);
            // dd($fund_request);
            $data['fund_id'] = $fund_request['fund']['id'] ?? null;
            $appointment = BookedService::create($data);
            $request->merge(['fee' => $data['price']]);
            request()->session()->flash('alert', [
                'type' => 'info',
                'message' => 'Appointment Booked Successfully',
            ]);
            $email_users = [
                'patient' => $appointment->patient ? User::where('id', $appointment->patient->user_id)->first() : null,
                'doctor' => $appointment->doctor ? User::where('id', $appointment->doctor->user_id)->first() : null,
                // 'clinic' => User::where('id', $appointment->clinic->user_id)->first(),
            ];
            // NotificationSettingsController::fireNotificationEvent($appointment,'book_quick_service',$email_users,'service_log','Service Registred');
            return redirect(route('patients.service_bank_transfers', ['service_id' => $appointment->id]));
        }

        if ($request->gateway == 'stripe') {
            $fund_request = PaymentController::addFundRequest($request);

            $data['fund_id'] = $fund_request['fund']['id'] ?? null;
            // dd($fund_request['fund']);

            $service = BookedService::create($data);
            // triggerNotification('bookings', 'service_booked', $service->id);

            // dd($data);
            $request->merge(['fee' => $data['price']]);
            request()->session()->flash('alert', [
                'type' => 'info',
                'message' => 'service Booked Successfully',
            ]);
            return Inertia::location(route('patients.service_stripe_transfers', ['service_id' => $service->id]));
        }


        if ($request->gateway == 'wallet') {
            $wallet = new WalletController();
            $wallet_response = $wallet->payThroughUserWallet($request->amount, $request);
            $wallet_response = $wallet_response->getData();
            if ($wallet_response->status) {
                $data['is_paid'] = 1;
                $service = BookedService::create($data);
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Service Booked Successfully',
                ]);

                // $email_users = [
                //     'patient' => $service->patient ? User::where('id', $service->patient->user_id)->first() : null,
                //     'doctor' => $service->doctor ? User::where('id', $service->doctor->user_id)->first() : null,
                //     // 'clinic' => User::where('id', $service->clinic->user_id)->first(),
                // ];
                // NotificationSettingsController::fireNotificationEvent($service,'book_quick_service',$email_users,'service_log','Service Registred');

                return redirect()->back()->withResponseData([
                    'service' => $service,
                ]);
            } else {
                request()->session()->flash('alert', [
                    'type' => 'error',
                    'message' => $wallet_response->msg
                ]);

                return redirect()->back();
            }
        } else {
            $fund_request = PaymentController::addFundRequest($request);
            $data['fund_id'] = $fund_request['fund']['id'] ?? null;
            if ($fund_request['fund'] ?? false) {
                $data['is_paid'] = 0;
                $service = BookedService::create($data);
                $request->merge(['fee' => $data['price']]);
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Service Booked Successfully',
                ]);
                // $email_users = [
                //     'patient' => $service->patient ? User::where('id', $service->patient->user_id)->first() : null,
                //     'doctor' => $service->doctor ? User::where('id', $service->doctor->user_id)->first() : null,
                //     // 'clinic' => User::where('id', $service->clinic->user_id)->first(),
                // ];
                // NotificationSettingsController::fireNotificationEvent($service,'book_quick_service',$email_users,'service_log','Service Registred');
                return redirect()->back()->withResponseData([
                    'service' => $service,
                    'fund' => $fund_request['fund']
                ]);
            } else {
                request()->session()->flash('alert', [
                    'type' => 'error',
                    'message' => $fund_request,
                ]);

                return redirect()->back()->withErrors($fund_request);
            }
        }
    }
    public function getFilteredServiceLogs(Request $request)
    {
        $services = $this->getter($request);

        $response = generateResponse($services, count($services['data']) > 0 ? true : false, 'Filter Service Logs Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function showServiceLogDetailPage($id)
    {
        $user = Auth()->user();
        $patient_id = $user->patient->id;
        $service = BookedService::withAll()->where('id', $id)->where('patient_id', $patient_id)->first();
        $service = new BookedServicesResource($service);
        $gateway = $service?->fund?->gateway;
        $data = [
            'service' => $service,
            'gateway' => $gateway,
        ];
        return Inertia::render('ServiceLogs/Detail', $data);
    }


    public function getBankTransfers(Request $request)
    {

        $bank_accounts = BankAccount::active()->get();
        $appointment = BookedService::find($request->service_id);
        $fund = $appointment->fund;
        return Inertia::render('BankAccounts', [
            'appointment' => $appointment,
            'bank_accounts' => $bank_accounts,
            'fund' => $fund,
        ]);
    }
}

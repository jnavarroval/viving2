<?php

namespace App\Http\Controllers\API\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddDoctorReviewRequest;
use App\Http\Requests\Patients\AddClinicReviewRequest;
use App\Http\Resources\API\AppointmentMedicineResource;
use App\Http\Resources\API\BookAppointmentsResource;
use App\Http\Resources\API\DiseasesResource;
use App\Http\Resources\API\DoctorsResource;
use App\Models\BookAppointment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\API\Doctors\AppointmentMedicines\CreateRequest;

class ElectronicHealthRecordsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth:api');
    }

   
   
    
    public function index(Request $request)
    {
        $patient = auth()->user()->patient;
    
        $patient_diseases = [];
        $patient_doctors = [];
        $doctors = [];
        $diseases = [];
    
        $patient_appointments = BookAppointment::where('patient_id', $patient->id)
            ->with('doctor')
            ->withAll()
            ->WithChildren();
    
        $appointments = BookAppointment::where('patient_id', $patient->id)
            ->withAll()
            ->WithChildren()->get();
    
        foreach ($appointments as $appointment_doctor) {
            if ($appointment_doctor->doctor) {
                $doctors[] = $appointment_doctor->doctor;
            }
        }
    
        $doctors = array_unique($doctors, SORT_REGULAR);
        foreach ($appointments as $filter) {
            if (count($filter->diseases) > 0) {
                foreach ($filter->diseases as $disease) {
                    $diseases[] = $disease;
                }
            }
        }
    
        // Filters for doctors, appointment, diseases, and medicines
        if ($request->doctor_ids != null && count($request->doctor_ids) > 0) {
            $patient_appointments = $patient_appointments->whereHas('doctor', function ($q) use ($request) {
                $q->whereIn('id', $request->doctor_ids);
            });
        }
    
        if ($request->appointment) {
            $patient_appointments = $patient_appointments->where('id', $request->appointment);
        }
    
        if ($request->disease_ids) {
            $patient_appointments = $patient_appointments->whereHas('diseases', function ($q) use ($request) {
                $q->where('disease_id', $request->disease_ids);
            });
        }
    
        if ($request->medicine_name) {
            $patient_appointments = $patient_appointments->whereHas('medicines', function ($q) use ($request) {
                $q->whereLike(['name'], $request->medicine_name);
            });
        }
    
        // Paginate patient appointments
        $perPage = $request->get('perPage', 6);
        $patient_appointments = $patient_appointments->orderBy('created_at', 'desc')->paginate($perPage);
    
        // Collecting diseases
        foreach ($patient_appointments as $appointment) {
            $appointment_doctor_image = $appointment->doctor->image ?? "";
            $appointment_doctor_name = $appointment->doctor->name ?? "";
            $appointment_doctor_speciality = $appointment->doctor->specialization ?? "";
            $appointment_id = $appointment->id ?? "";
            if (count($appointment->diseases) > 0) {
                foreach ($appointment->diseases as $patient_disease) {
                    $patient_disease['appointment_doctor_image'] = $appointment_doctor_image;
                    $patient_disease['appointment_doctor_name'] = $appointment_doctor_name;
                    $patient_disease['appointment_id'] = $appointment_id;
                    $patient_disease['appointment_doctor_speciality'] = $appointment_doctor_speciality;
                    $patient_diseases[] = $patient_disease;
                }
            }
        }
    
        if ($request->disease_ids && is_array($request->disease_ids)) {
            $filtered_diseases = collect($patient_diseases)
                ->filter(function ($disease) use ($request) {
                    return in_array($disease['id'], $request->disease_ids);
                })->values()->all();
    
            if (count($filtered_diseases) > 0) {
                $patient_diseases = $filtered_diseases;
            }
        }
    
        // Manually paginate patient_diseases
        $currentPage = Paginator::resolveCurrentPage();
        $patient_diseases = collect($patient_diseases);
        $pagedDiseases = new LengthAwarePaginator(
            $patient_diseases->forPage($currentPage, $perPage), 
            $patient_diseases->count(), 
            $perPage, 
            $currentPage, 
            ['path' => Paginator::resolveCurrentPath()]
        );
    
        if (count($patient_diseases) > 0) {
            $patient_diseases = DiseasesResource::collection($pagedDiseases)->response()->getData(true);
        }
    
        // Collecting doctors
        foreach ($patient_appointments as $appointment_doctor) {
            if ($appointment_doctor->doctor) {
                $patient_doctors[] = $appointment_doctor->doctor;
            }
        }
    
        // Manually paginate patient_doctors
        $patient_doctors = collect($patient_doctors)->unique('id');
        $pagedDoctors = new LengthAwarePaginator(
            $patient_doctors->forPage($currentPage, $perPage), 
            $patient_doctors->count(), 
            $perPage, 
            $currentPage, 
            ['path' => Paginator::resolveCurrentPath()]
        );
    
        if (count($patient_doctors) > 0) {
            $patient_doctors = DoctorsResource::collection($pagedDoctors)->response()->getData(true);
        }
    
        if (count($doctors) > 0) {
            $doctors = DoctorsResource::collection($doctors)->response()->getData(true);
        }
    
        // Final pagination for patient_appointments
        $patient_appointments = BookAppointmentsResource::collection($patient_appointments)->response()->getData(true);
    
        // Paginate diseases and doctors
        $diseases = array_intersect_key($diseases, array_unique(array_column($diseases, 'id')));
        $appointments = BookAppointmentsResource::collection($appointments)->response()->getData(true);
        $diseases = DiseasesResource::collection($diseases)->response()->getData(true);
    
        $data = [
            'patient_appointments' => $patient_appointments,
            'patient_diseases' => $patient_diseases,
            'patient_doctors' => $patient_doctors,
        ];
    
        $response = generateResponse($data, false, "Prescription Fetched Successfully", null, 'collection');
    
        return response()->json($response);
    }
    

    public function showEhrDetailPage(Request $request, $id)
    {
        $appointment = BookAppointment::where('id', $id)->withAll()->withChildren()->first();
        $appointment_disease =   $appointment->diseases->where('id', $id)->first();
        $appointment_disease = new DiseasesResource($appointment_disease);
        $appointment = new BookAppointmentsResource($appointment);

        // $data = [
        //     'appointment' => $appointment,
        //     'appointment_disease' => $appointment_disease,
        // ];
        $response = generateResponse($appointment, false, "Prescription Fetched Successfully", null, 'collection');

        return response()->json($response);
    }
    public function downloadAppointmentPdf(Request $request)
    {
        $appointment = BookAppointment::where('id', $request->appointment_id)->withAll()->withChildren()->first();


        $appointment = new BookAppointmentsResource($appointment);

        // Render the PDF
        $pdf = Pdf::loadView('pdf.appointment_report', compact('appointment'));

        // Return the PDF as a download response
        return $pdf->download('appointment_report.pdf');
    }


    public function addDoctorReview(AddDoctorReviewRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $patient->doctor_reviews()->create($request->all());
        }

        $response = generateResponse([], "Doctor Review Successfully", null, 'collection');
        return response()->json($response);

    }
    public function addClinicReview(AddClinicReviewRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $patient->clinic_reviews()->create($request->all());
        }
        $response = generateResponse([], "Clinic Review Successfully", null, 'collection');
        return response()->json($response);
    }



    public function createPrescriptionAppointment(Request $request)
    {
            $user = Auth()->user();
            $doctor = $user->doctor;;


            $appointment =  $doctor->appointments->where('id', $request->booked_appointment_id)->first();

            if ($doctor) {
                $request->merge(
                    [
                        'doctor_id' => $doctor->id
                    ]
                );
            }


            $appointment->update([
                'prescription' => $request->prescription,
            ]);

            if ($request->test_ids) {
                $appointment->tests()->sync($request->test_ids);
            }



            if ($request->patient_healths) {

                $appointment->patient_healths()->delete();
                foreach ($request->patient_healths as $healthData) {
                    $appointment->patient_healths()->create([
                        'patient_health_id' => $healthData['id'],
                        'value' => $healthData['value'],
                    ]);
                }
            }

            if ($request->disease_ids) {
                $appointment->diseases()->sync($request->disease_ids);
            }


            $response = generateResponse($appointment, true, 'Prescription Appointment Added Successfully', null, 'collection');
            return response()->json($response, 200);


    }

    public function getPrescriptionAppointment(Request $request, $booked_appointment_id)
    {
        $user = Auth()->user();
        $doctor = $user->doctor;
        $appointment = $doctor->appointments()->where('id', $booked_appointment_id)->first();
        $healths = $appointment->patient_healths;
        $diseases = $appointment->diseases;
        $medicines = $appointment->medicines;
        $tests = $appointment->tests;
        $disease_ids = $diseases->pluck('id')->toArray();
        $test_ids = $tests->pluck('id')->toArray();
        $patient_healths = [];
        foreach ($healths as $health) {
            $object = new \stdClass();

            $object->id = $health->patient_health_id;
            $object->value = $health->value;
            $object->name = $health->healths->name ?? '';

            array_push($patient_healths, $object);
        }

        $data = [
            'medicines' => AppointmentMedicineResource::collection($medicines),
            'disease_ids' =>  $disease_ids,
            'patient_healths' => $patient_healths,
            'test_ids' => $test_ids,
            'prescription' =>  $appointment->prescription ?? "",

        ];


        $response = generateResponse($data, true, 'Prescription Appointment get Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function createMedicineAppointment(CreateRequest $request)
    {
        $user = Auth()->user();
        $doctor_id = $user->doctor->id;
        // dd($request->all());
        $appointment_medicine = BookAppointment::where('id', $request->booked_appointment_id)->where('doctor_id', $doctor_id)->first();

        $appointment_medicine = $appointment_medicine->medicines()->create([
            'name' => $request->name,
            'frequency' => $request->frequency,
            'dosage' => $request->dosage,
        ]);

        $appointment_medicine = new AppointmentMedicineResource($appointment_medicine);

        $response = generateResponse([], true, 'Medicines Added  Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    public function deleteMedicineAppointment(Request $request)
    {
        $user = Auth()->user();
        $doctor_id = $user->doctor->id;
        $appointment_medicine = BookAppointment::where('id', $request->booked_appointment_id)->where('doctor_id', $doctor_id)->first();
        if ($appointment_medicine) {
            $appointment_medicine = $appointment_medicine->medicines()->where('id', $request->medicine_id)->delete();
        }

        $response = generateResponse([], true, 'Medicines Deleted Successfully', null, 'collection');
        return response()->json($response, 200);
    }
}


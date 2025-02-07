<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddDoctorReviewRequest;
use App\Http\Requests\Patients\AddClinicReviewRequest;
use App\Http\Resources\Web\BookAppointmentsResource;
use App\Http\Resources\Web\DiseaseResource;
use App\Http\Resources\Web\DiseasesResource;
use App\Http\Resources\Web\DoctorsResource;
use App\Http\Resources\Web\RecordDiseasesResource;
use App\Http\Resources\Web\RecordsResource;
use App\Models\BookAppointment;
use App\Models\Disease;
use App\Models\Patient;
use App\Models\Record;
use App\Models\RecordDisease;
use App\Models\RecordMedicine;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;

class ElectronicHealthRecordsController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
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

        $patient_appointments = $patient_appointments->orderBy('created_at', 'desc')->get();

        foreach ($patient_appointments as $appointment) {
            $appointment_date = $appointment->date;
            $appointment_doctor_image = $appointment->doctor->image ?? "";
            $appointment_doctor_name = $appointment->doctor->name ?? "";
            $appointment_doctor_speciality = $appointment->doctor->specialization ?? "";
            $appointment_id = $appointment->id ?? "";
            if (count($appointment->diseases) > 0) {
                foreach ($appointment->diseases as $patient_disease) { {
                        $patient_disease['appointment_date'] = $appointment_date;
                        $patient_disease['appointment_doctor_image'] = $appointment_doctor_image;
                        $patient_disease['appointment_doctor_name'] = $appointment_doctor_name;
                        $patient_disease['appointment_id'] = $appointment_id;
                        $patient_disease['appointment_doctor_speciality'] = $appointment_doctor_speciality;
                        $patient_diseases[] = $patient_disease;
                    }
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


        if (count($patient_diseases) > 0) {
            $patient_diseases = DiseasesResource::collection($patient_diseases);
        }

        foreach ($patient_appointments as $appointment_doctor) {
            if ($appointment_doctor->doctor) {
                $patient_doctors[] = $appointment_doctor->doctor;
            }
        }

        $patient_doctors = array_unique($patient_doctors, SORT_REGULAR);

        if (count($patient_doctors) > 0) {
            $patient_doctors = DoctorsResource::collection($patient_doctors);
        }

        if (count($doctors) > 0) {
            $doctors = DoctorsResource::collection($doctors);
        }



        $patient_appointments = BookAppointmentsResource::collection($patient_appointments);

        $diseases = array_intersect_key($diseases, array_unique(array_column($diseases, 'id')));

        $appointments = BookAppointmentsResource::collection($appointments);
        $diseases = DiseasesResource::collection($diseases);

        return Inertia::render('Patients/EHR/Listing', [
            'patient_appointments' => $patient_appointments,
            'patient_diseases' => $patient_diseases,
            'diseases' => $diseases,
            'patient_doctors' => $patient_doctors,
            'doctors' => $doctors,
            'appointments' => $appointments,
        ]);
    }

    public function showEhrDetailPage(Request $request, $id)
    {
        $appointment = BookAppointment::where('id', $request->appointment_id)->withAll()->withChildren()->first();
        $appointment_disease =   $appointment->diseases->where('id', $id)->first();
        $appointment_disease = new DiseasesResource($appointment_disease);
        $appointment = new BookAppointmentsResource($appointment);

        return Inertia::render('Patients/EHR/Detail', [
            'appointment' => $appointment,
            'appointment_disease' => $appointment_disease,
        ]);
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
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Review Added Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Review Added Successfully',
            'type' => 'success'
        ]);
    }
    public function addClinicReview(AddClinicReviewRequest $request)
    {
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $patient->clinic_reviews()->create($request->all());
        }
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Review Added Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Review Added Successfully',
            'type' => 'success'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\AddDoctorReviewRequest;
use App\Http\Requests\Patients\AddClinicReviewRequest;
use App\Http\Resources\Web\DiseasesResource;
use App\Http\Resources\Web\RecordDiseasesResource;
use App\Http\Resources\Web\RecordsResource;
use App\Models\Disease;
use App\Models\Record;
use App\Models\RecordDisease;
use App\Models\RecordMedicine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RecordDiseaseController extends Controller
{
    /********* Initialize Permission based Middlewares  ***********/
    public function __construct()
    {
        $this->middleware('auth');
        //   $this->middleware('patient');
    }

    public function GetAllDisease(Request $request)
    {
        $disease=Disease::active()->get();

        $disease = DiseasesResource::collection($disease);


        $response = generateResponse($disease, true, 'Fetch Disease Successfully', null, 'collection');
        return response()->json($response, 200);
    }

}

<?php

namespace App\Http\Requests\Patients;

use Illuminate\Foundation\Http\FormRequest;

class AddClinicReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user= auth()->user();
        $patient = $user->patient;
        return [
            'rating' => 'required|numeric|max:5',
            'experience' => 'required|numeric|max:5',
            'service' => 'required|numeric|max:5',
            'communication' => 'required|numeric|max:5',
            'comment' => 'required|string',
            'clinic_id' => 'required|exists:clinics,id',

        ];
    }
}

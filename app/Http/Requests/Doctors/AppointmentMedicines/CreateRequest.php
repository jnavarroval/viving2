<?php

namespace App\Http\Requests\Doctors\AppointmentMedicines;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'booked_appointment_id' => 'required|integer',

            'dosage' => 'required|string',
            'frequency' => 'required|string',
        ];
    }
}

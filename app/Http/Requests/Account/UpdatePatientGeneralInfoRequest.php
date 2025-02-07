<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientGeneralInfoRequest extends FormRequest
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
        return [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = auth()->user();
        $patient = $user->patient;

        $rules=[];


        if($this->type=='address'){
            $rules['address_line_1']='required|string';
            $rules['address_line_2']='required|string';
        }
        if($this->type=='description'){
            $rules['description']='required|string';
           
        }

        if($this->type=='personal_info'){
            $rules['blood_group']='required';
            $rules['first_name']='required|string';
            $rules['last_name']='required|string';
            $rules['father_name']='required|string';
            $rules['user_name']='required|alpha_dash|max:55|unique:patients,user_name,' . $patient->id;
            $rules['gender']='required';

        }

        return $rules;

        // return [
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'description' => 'nullable|string',
        //     'address_line_1' => 'required|string',
        //     'address_line_2' => 'nullable|string',
        //     'user_name' => 'required|alpha_dash|max:55|unique:patients,user_name,' . $patient->id,
        //     'father_name' => 'required|string',
        //     'gender' => 'required',
        //     'dob' => 'required',
        //     'blood_group' => 'required',

        // ];

    }
}

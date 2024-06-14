<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            // Personal Details -
            'name' => ['required', 'string', 'max:255'],

            'email' =>'required|string|max:60|unique:users,id' . $this->id,

            'whatsapp_no' => 'required|string|max:60|unique:users,id' . $this->id,

            'refrence_by' => ['required', 'string', 'max:255'],
            'profile_created_by_type' => 'required|in:self,son,daughter,brother,sister,relative,other',
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'dob' => ['required', 'date'],
            'age' => ['required', 'integer', 'min:0'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_time' => ['required', 'string', 'max:255'],
            'height' => ['required'],
            'weight' => ['required'],
            'complexion' => ['required', 'string', 'max:255'],

            'education' => 'required|array',
            'education.*' => 'exists:education,education_name',

            'profession' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],

            'hobbies' => 'nullable|array',
            'hobbies.*' => 'exists:hobbies,id',

            'religion' => ['required', 'string', 'max:255'],
            'candidate_community' => ['required', 'string', 'max:255'],

            'marital_status' => ['required', 'string', 'max:255'],
            'is_children' => ['nullable', 'string', 'max:255'],
            'son_details' => ['nullable'],
            'daughter_details' => ['nullable'],

            'physical_status' => ['required', 'string', 'max:255'],
            'physical_status_desc' => ['nullable'],


            'blood_group' => ['required', 'string', 'max:3'],
            'candidate_income' => ['required',],
            'candidates_address' => ['required', 'string', 'max:255'],
            'terms_and_conditions' => ['nullable', 'boolean'],

            //  If NRI-
            'if_nri' => 'required|in:yes,no',
            'candidate_visa' => ['nullable', 'string', 'max:255'],
            'address_nri_citizen' => ['nullable', 'string', 'max:255'],

        ];

    }
}

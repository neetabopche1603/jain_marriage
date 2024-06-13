<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends BaseRequest
{

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

            'email' => $this->getMethod() == 'POST' ? 'required|string|max:60|unique:users' : 'required|string|max:60|unique:users,id' . $this->id,

            'whatsapp_no' => $this->getMethod() == 'POST' ? 'required|string|max:60|unique:users' : 'required|string|max:60|unique:users,id' . $this->id,

            'refrence_by' => ['required', 'string', 'max:255'],
            'profile_created_by_type' => 'required|in:self,son,daughter,brother,sister,relative,other',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'dob' => ['required', 'date'],
            'age' => ['required', 'integer', 'min:0'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_time' => ['required', 'string', 'max:255'],
            'height' => ['required'],
            'weight' => ['required'],
            'complexion' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],

            'hobbies' => 'nullable|array',
            'hobbies.*' => 'exists:hobbies,id',

            'religion' => ['required', 'string', 'max:255'],
            'candidate_community' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'max:255'],
            'physical_status' => ['required', 'string', 'max:255'],
            'blood_group' => ['required', 'string', 'max:3'],
            'candidate_income' => ['required',],
            'candidates_address' => ['required', 'string', 'max:255'],
            'terms_and_conditions' => ['required', 'boolean'],

            //  If NRI-

            'if_nri' => 'required|in:Yes,No',
            'candidate_visa' => ['nullable', 'string', 'max:255'],
            'address_nri_citizen' => ['nullable', 'string', 'max:255'],

            // Family Details -
            'father_name' => ['required', 'string', 'max:255'],
            'father_profession' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_profession' => ['required', 'string', 'max:255'],
            'residence_type' => ['required', 'string', 'max:255'],
            'gotra' => ['required', 'string', 'max:255'],
            'family_community' => ['required', 'string', 'max:255'],
            'family_sub_community' => ['required', 'string', 'max:255'],
            'family_address' => ['required', 'string', 'max:255'],

            // Siblings Details -
            'brother' => ['required', 'integer', 'min:0'],
            'sister' => ['required', 'integer', 'min:0'],
            'other_family_details' => ['nullable', 'string', 'max:500'],
            'calling_no' => ['required', 'string', 'max:15'],
            'are_you_manglik' => 'required',


            // 'photo.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            // 'photo' => ['nullable', 'array', 'max:5'],

            // 'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            // 'photo_width' => 'required|integer',
            // 'photo_height' => 'required|integer',
            // 'photo_x' => 'required|integer',
            // 'photo_y' => 'required|integer',

            'id_proof' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],

            // 'id_proof_width' => 'required|integer',
            // 'id_proof_height' => 'required|integer',
            // 'id_proof_x' => 'required|integer',
            // 'id_proof_y' => 'required|integer',

            // Partner Preference -
            'partner_age_group_from' => ['required', 'integer', 'min:18'],
            'partner_age_group_to' => ['required', 'integer', 'gte:partner_age_group_from'],
            'partner_income' => ['required'],
            'partner_country' => ['required', 'string', 'max:255'],
            'partner_state' => ['required', 'string', 'max:255'],
            'partner_city' => ['required', 'string', 'max:255'],
            'partner_education' => ['required', 'string', 'max:255'],
            'partner_occupation' => ['required', 'string', 'max:255'],
            'partner_profession' => ['required', 'string', 'max:255'],

            'partner_hobbies' => 'nullable|array',
            'partner_hobbies.*' => 'exists:hobbies,id',

            'partner_manglik' => 'required',
            'partner_marital_status' => ['required', 'string', 'max:255'],
            'astrology_matching' => ['required',],
            'expectation_partner_details' => ['required', 'string', 'max:500'],

            'profile_status' => 'nullable|in:pending,verified,rejected',
            'profile_rejected_reason' => 'nullable',
            'account_status' => 'nullable|in:active,inactive',

            'family_status' => 'required',
            'family_type' => 'required',

        ];

        // if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
        //     $rules['email'] = 'required|email';
        //     $rules['whatsapp_no'] = 'required';
        // }
        // return $rules;
    }


}

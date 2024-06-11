<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReq extends FormRequest
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

            'email' => $this->getMethod() == 'POST' ? 'required|string|max:60|unique:users' : 'required|string|max:60|unique:users,id' . $this->id,

            'whatsapp_no' => $this->getMethod() == 'POST' ? 'required|string|max:60|unique:users' : 'required|string|max:60|unique:users,id' . $this->id,

            'refrence_by' => ['required', 'string', 'max:255'],
            'profile_created_by_type' => 'required|in:self,son,daughter,brother,sister,relative,other',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'dob' => ['required', 'date'],
            'age' => ['nullable', 'integer', 'min:0'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'birth_time' => ['nullable', 'string', 'max:255'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'complexion' => ['nullable', 'string', 'max:255'],
            'education' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],

            'hobbies' => 'nullable|array',
            'hobbies.*' => 'exists:hobbies,id',

            'religion' => ['nullable', 'string', 'max:255'],
            'candidate_community' => ['nullable', 'string', 'max:255'],
            'marital_status' => ['nullable', 'string', 'max:255'],
            'physical_status' => ['nullable', 'string', 'max:255'],
            'blood_group' => ['nullable', 'string', 'max:3'],
            'candidate_income' => ['nullable',],
            'candidates_address' => ['nullable', 'string', 'max:255'],
            'terms_and_conditions' => ['nullable', 'boolean'],

            //  If NRI-

            'if_nri' => 'nullable|in:yes,no',
            'candidate_visa' => ['nullable', 'string', 'max:255'],
            'address_nri_citizen' => ['nullable', 'string', 'max:255'],

            // Family Details -
            'father_name' => ['nullable', 'string', 'max:255'],
            'father_profession' => ['nullable', 'string', 'max:255'],
            'mother_name' => ['nullable', 'string', 'max:255'],
            'mother_profession' => ['nullable', 'string', 'max:255'],
            'residence_type' => ['nullable', 'string', 'max:255'],
            'gotra' => ['nullable', 'string', 'max:255'],
            'family_community' => ['nullable', 'string', 'max:255'],
            'family_sub_community' => ['nullable', 'string', 'max:255'],
            'family_address' => ['nullable', 'string', 'max:255'],

            // Siblings Details -
            'brother' => ['nullable', 'integer', 'min:0'],
            'sister' => ['nullable', 'integer', 'min:0'],
            'other_family_details' => ['nullable', 'string', 'max:500'],
            'calling_no' => ['nullable', 'string', 'max:15'],
            'are_you_manglik' => 'nullable',


            'photo.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'photo' => ['nullable', 'array', 'max:5'],

            // 'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            // 'photo_width' => 'required|integer',
            // 'photo_height' => 'required|integer',
            // 'photo_x' => 'required|integer',
            // 'photo_y' => 'required|integer',

            'id_proof' =>'nullable', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048',

            // 'id_proof_width' => 'required|integer',
            // 'id_proof_height' => 'required|integer',
            // 'id_proof_x' => 'required|integer',
            // 'id_proof_y' => 'required|integer',

            // Partner Preference -
            'partner_age_group_from' => ['nullable', 'integer', 'min:18'],
            'partner_age_group_to' => ['nullable', 'integer', 'gte:partner_age_group_from'],
            'partner_income' => ['nullable'],
            'partner_country' => ['nullable', 'string', 'max:255'],
            'partner_state' => ['nullable', 'string', 'max:255'],
            'partner_city' => ['nullable', 'string', 'max:255'],
            'partner_education' => ['nullable', 'string', 'max:255'],
            'partner_occupation' => ['nullable', 'string', 'max:255'],
            'partner_profession' => ['nullable', 'string', 'max:255'],

            'partner_hobbies' => 'nullable|array',
            'partner_hobbies.*' => 'exists:hobbies,id',

            'partner_manglik' => 'nullable',
            'partner_marital_status' => ['nullable', 'string', 'max:255'],
            'astrology_matching' => ['nullable',],
            'expectation_partner_details' => ['nullable', 'string', 'max:500'],

            'profile_status' => 'nullable|in:pending,verified,rejected',
            'profile_rejected_reason' => 'nullable',
            'account_status' => 'nullable|in:active,inactive',

            'family_status' => 'nullable',
            'family_type' => 'nullable',

        ];

    }
}

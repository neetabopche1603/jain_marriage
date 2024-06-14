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

            // Family Details -
            'father_name' => ['required', 'string', 'max:255'],
            'father_profession' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_profession' => ['required', 'string', 'max:255'],
            'residence_type' => ['required', 'string', 'max:255'],
            'gotra' => ['required', 'string', 'max:255'],
            'family_community' => ['required', 'string', 'max:255'],
            'family_sub_community' => ['required'],
            'family_address' => ['required', 'string', 'max:255'],

            // Siblings Details -
            'brother' => ['required'],
            'sister' => ['required'],
            'other_family_details' => ['required', 'string', 'max:500'],
            'calling_no' => ['required', 'string', 'max:15'],
            'are_you_manglik' => 'required',


            // 'photo.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            // 'photo' => ['nullable', 'array', 'max:5'],

            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],

            'idProof_type' => 'required',
            'id_proof' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],

            // Partner Preference -
            'partner_age_group_from' => ['required'],
            'partner_age_group_to' => ['required','gte:partner_age_group_from'],
            'partner_income' => ['required'],

            'partner_country' => 'required|array',
            // 'partner_country.*' => 'exists:countries,id',

            'partner_state' => 'required|array',
            // 'partner_state.*' => 'exists:states,id',

            'partner_city' => 'required|array',
            // 'partner_city.*' => 'exists:cities,id',

            'partner_education' => 'required|array',
            'partner_education.*' => 'exists:education,education_name',

            'partner_occupation' => 'required|array',
            'partner_occupation.*' => 'exists:occupations,occupation_name',

            'partner_profession' => 'required|array',
            'partner_profession.*' => 'exists:professions,profession_name',

            'partner_hobbies' => 'nullable|array',
            'partner_hobbies.*' => 'exists:hobbies,id',

            'partner_manglik' => 'required',

            'partner_marital_status' => ['required', 'string', 'max:255'],
            'partner_acccept_kid' => 'nullable',
            'partner_kid_discription' => 'nullable',

            'astrology_matching' => ['required',],
            'expectation_partner_details' => ['required', 'string', 'max:500'],

            'profile_status' => 'nullable|in:pending,verified,rejected',
            'profile_rejected_reason' => 'nullable',
            'account_status' => 'nullable|in:active,inactive',

            'family_status' => 'required',
            'family_type' => 'required',

        ];

    }
}

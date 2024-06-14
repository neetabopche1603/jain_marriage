<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class PartnerPreferenceReq extends FormRequest
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
            // 'partner_education.*' => 'exists:education,education_name',

            'partner_occupation' => 'required|array',
            // 'partner_occupation.*' => 'exists:occupations,occupation_name',

            'partner_profession' => 'required|array',
            // 'partner_profession.*' => 'exists:professions,profession_name',

            'partner_hobbies' => 'nullable|array',
            'partner_hobbies.*' => 'exists:hobbies,id',

            'partner_manglik' => 'required',

            'partner_marital_status' => ['required', 'string', 'max:255'],
            'partner_acccept_kid' => 'nullable',
            'partner_kid_discription' => 'nullable',

            'astrology_matching' => ['required',],
            'expectation_partner_details' => ['required', 'string', 'max:500'],

        ];
    }
}

<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UserFamilyDetailReq extends FormRequest
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
            // Family Details -
            'father_name' => ['required', 'string', 'max:255'],
            'father_profession' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_profession' => ['required', 'string', 'max:255'],
            'residence_type' => ['required', 'string', 'max:255'],
            'gotra' => ['required', 'string', 'max:255'],

            'family_status' => 'required',
            'family_type' => 'required',

            'family_community' => ['required', 'string', 'max:255'],
            'family_sub_community' => ['required', 'string', 'max:255'],
            'family_address' => ['required', 'string', 'max:255'],

            // Siblings Details -
            'brother' => ['required', 'integer', 'min:0'],
            'sister' => ['required', 'integer', 'min:0'],
            'other_family_details' => ['nullable', 'string', 'max:500'],
            'calling_no' => ['required', 'string', 'max:15'],
            'are_you_manglik' => 'required',

        ];
    }
}

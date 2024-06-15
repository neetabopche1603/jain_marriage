@extends('partial.admin.app')
@section('adminTitle', 'Add User Details')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">users</a></li>
                                <li class="breadcrumb-item active">User Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->
            <p class="text-danger"><i>All Filed is required</i></p>

            @include('partial.flash-msg')

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('admin.userStore') }}" method="post" id="userRegForm" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-7">
                        {{-- Basic Details --}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">User Basic Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.select name="profile_created_by_type" label="Profile For" :options="[
                                            'self' => 'Self',
                                            'son' => 'Son',
                                            'daughter' => 'Daughter',
                                            'brother' => 'Brother',
                                            'sister' => 'Sister',
                                            'relative' => 'Relative',
                                            'other' => 'Other',
                                        ]"
                                            :required="true" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.select name="refrence_by" label="Reference By*" :options="[
                                            'facebook' => 'Facebook',
                                            'instagram' => 'Instagram',
                                            'google' => 'Google',
                                            'youTube' => 'YouTube',
                                        ]"
                                            :required="true" />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="whatsapp_no" label="Whatsapp No*" placeholder="" />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="email" type="email" label="Email Id*" placeholder="" />
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="password" type="password" label="Password*" placeholder="" />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="password_confirmation" type="password" label="Re-Type Password*"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>


                    {{-- User Profile PHOTO --}}
                    <div class="col-lg-5 mt-1">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Photo</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                                <div class="image_preview" style="display: none">
                                    <img id="image" src="" alt="" width="180" height="250">
                                    {{-- alt="Image to crop" --}}
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>

                    {{-- User Personal Details Card --}}
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">User Personal Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <x-form.select name="gender" label="Gender" :options="[
                                            'male' => 'male',
                                            'female' => 'female',
                                            'other' => 'other',
                                        ]" :required="true" />

                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="name" label="Candidate Name*" placeholder="" />
                                    </div>

                                    <div class="col-md-3">
                                        <x-form.input name="dob" type="date" label="DOB*" placeholder=""
                                            id="user_dob" />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="age" type="number" label="Age" placeholder=""
                                            id="user_age" />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="birth_time" type="time" label="Birth Time" placeholder="" />
                                    </div>

                                    <div class="col-md-5">
                                        <x-form.input name="birth_place" label="Birth Place" placeholder="" />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="height" class="form-label">Height</label>
                                        <select name="height" id="height" class="form-select">
                                            <option value="">Select Height</option>
                                            @for ($feet = 4; $feet <= 8; $feet++)
                                                @for ($inch = 0; $inch <= 9; $inch++)
                                                    @php
                                                        $height = $feet + $inch / 10;
                                                    @endphp
                                                    <option value="{{ $height }}">{{ $height }}</option>
                                                @endfor
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="weight" class="form-label">Weight</label>
                                        <select name="weight" id="weight" class="form-select">
                                            <option value="">Select Weight</option>
                                            @for ($weight = 35; $weight <= 200; $weight++)
                                                <option value="{{ $weight }}kg">{{ $weight }}kg</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.select name="complexion" label="Complexion" :options="[
                                            'extemely fair skin' => 'Extemely Fair Skin',
                                            'fair skin' => 'Fair Skin',
                                            'light skin' => 'Light Skin',
                                            'medium skin' => 'Medium Skin',
                                            'olive skin' => 'Olive Skin',
                                            'tan skin' => 'Tan Skin',
                                            'brown skin' => 'Brown Skin',
                                            'dark skin' => 'Dark Skin',
                                        ]"
                                            :required="true" />

                                    </div>

                                    <div class="col-md-4">
                                        <label for="education" class="form-label">Education</label>
                                        <select name="education[]" id="education" class="form-select"
                                            multiple="multiple">
                                            <option value="" disabled>Select Education</option>
                                            @foreach ($data['educations'] as $education)
                                                <option value="{{ $education->education_name }}"
                                                    {{ collect(old('education'))->contains($education->education_name) ? 'selected' : '' }}>
                                                    {{ strtoupper($education->education_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('education')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="profession" class="form-label">Profession</label>
                                        <select name="profession" id="profession" class="form-select">
                                            <option value="">Select Profession</option>
                                            @foreach ($data['professions'] as $profe)
                                                <option value="{{ $profe->profession_name }}"
                                                    {{ old('profession') == $profe->profession_name ? 'selected' : '' }}>
                                                    {{ strtoupper($profe->profession_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('profession')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="occupation" class="form-label">Occupation</label>
                                        <select name="occupation" id="occupation" class="form-select">
                                            <option value="">Select Occupation</option>
                                            @foreach ($data['occupations'] as $occu)
                                                <option value="{{ $occu->occupation_name }}"
                                                    {{ old('occupation') == $occu->occupation_name ? 'selected' : '' }}>
                                                    {{ strtoupper($occu->occupation_name) }}

                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('occupation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-3 mt-2">
                                        <x-form.select name="religion" label="Religion" :options="[
                                            // '' => 'Select Religion',
                                            'Christianity' => 'Christianity',
                                            'Islam' => 'Islam',
                                            'Hinduism' => 'Hinduism',
                                            'Buddhism' => 'Buddhism',
                                            'Judaism' => 'Judaism',
                                            'Sikhism' => 'Sikhism',
                                            'Jainism' => 'Jainism',
                                            'Shinto' => 'Shinto',
                                            'Taoism' => 'Taoism',
                                            'Zoroastrianism' => 'Zoroastrianism',
                                            'Bahá\'í Faith' => 'Bahá\'í Faith',
                                            'Confucianism' => 'Confucianism',
                                            'Atheism' => 'Atheism',
                                            'Agnosticism' => 'Agnosticism',
                                            'Other' => 'Other',
                                        ]" />
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <x-form.select name="candidate_community" label="Community" :options="[
                                            'swetamber' => 'Swetamber',
                                            'digmber' => 'Digmber',
                                            'agrawal' => 'Agrawal',
                                            'khandalwal' => 'Khandalwal',
                                            'vani' => 'Vani',
                                            'other jain' => 'Other Jain',
                                            'non jain' => 'Non Jain',
                                        ]" />
                                    </div>


                                    <div class="col-md-3 mt-2">
                                        <x-form.select name="candidate_income" label="Candidate Income"
                                            :options="[
                                                'any' => 'Any',
                                                '1 - 2 L' => '1 - 2 L',
                                                '2 - 3 L' => '2 - 3 L',
                                                '3 - 4 L' => '3 - 4 L',
                                                '4 - 5 L' => '4 - 5 L',
                                                '5 - 10 L' => '5 - 10 L',
                                                '10 - 15 L' => '10 - 15 L',
                                                '15 - 20 L' => '15 - 20 L',
                                                '20 - 25 L' => '20 - 25 L',
                                                '25 - 30 L' => '25 - 30 L',
                                                '30 - 45 L' => '30 - 45 L',
                                                '45 - 50 L' => '45 - 50 L',
                                                '50 - 75 L' => '50 - 75 L',
                                                '75 L - 1 Cr' => '75 L - 1 Cr',
                                                '1 - 2 Cr' => '1 - 2 Cr',
                                                '2 - 3 Cr' => '2 - 3 Cr',
                                                '3 - 5 Cr' => '3 - 5 Cr',
                                                '5 - 10 Cr' => '5 - 10 Cr',
                                                '10 - 15 Cr' => '10 - 15 Cr',
                                                '15 - 100 Cr' => '15 - 100 Cr',
                                                '100 - 200 Cr' => '100 - 200 Cr',
                                                '200 - 500 Cr' => '200 - 500 Cr',
                                                '500 Cr - 1B' => '500 Cr - 1B',
                                                '1B and above' => '1B and above',
                                            ]" />
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <x-form.select name="blood_group" label="Blood Group" :options="[
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                        ]" />
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="physical_status" class="form-label">Physical Status</label>
                                        <select name="physical_status" id="physical_status" class="form-select">
                                            <option value="">-Select Type-</option>
                                            <option value="yes"
                                                {{ old('physical_status') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no" {{ old('physical_status') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                        @error('physical_status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-8 mt-2 physical_status_desc_div" style="display: none">
                                        <x-form.textarea name="physical_status_desc" label="Physical Status Desciption"
                                            placeholder="" />
                                    </div>


                                    {{-- marital_status --}}
                                    <div class="row">


                                        <div class="col-md-4">
                                            <x-form.select name="marital_status" label="Marital Status"
                                                :options="[
                                                    'Single' => 'Single',
                                                    'Married' => 'Married',
                                                    'Divorced' => 'Divorced',
                                                    'Widowed' => 'Widowed',
                                                    'Separated' => 'Separated',
                                                    'Engaged' => 'Engaged',
                                                    'In a Relationship' => 'In a Relationship',
                                                    'any' => 'Any',
                                                ]" />
                                        </div>

                                        <div class="col-md-4 mt-2 is_children_div" style="display: none">
                                            <label for="is_children" class="form-label">Do you have childern</label>
                                            <select name="is_children" id="is_children" class="form-select">
                                                <option value="">-Select Type-</option>
                                                <option value="yes"
                                                    {{ old('is_children') == 'yes' ? 'selected' : '' }}>
                                                    Yes</option>

                                                <option value="no" {{ old('is_children') == 'no' ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @error('is_children')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row is_children_yes_div" style="display: none;">
                                            <div class="col-md-6 mt-2">
                                                <x-form.textarea name="son_details" label="Son Details" placeholder="" />
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <x-form.textarea name="daughter_details" label="Daughter Details"
                                                    placeholder="" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <x-form.textarea name="candidates_address" label="Candidates Address"
                                            placeholder="" />
                                    </div>

                                </div>

                            </div>
                            <!-- end card body -->

                        </div>
                        <!-- end card -->
                    </div>

                    {{-- NRI DETAILS --}}
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">NRI Details</h5>
                            </div>

                            <div class="card-body">

                                {{-- NRI Details --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="if_nri">{{ 'If NRI' }}</label>
                                        <div class="form-check form-check-inline">
                                            <!-- Radio button for "Yes" -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input if_nri_radio" name="if_nri"
                                                    type="radio" id="yes" value="yes"
                                                    {{ old('if_nri') == 'yes' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes">Yes</label>
                                            </div>

                                            <!-- Radio button for "No" -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input if_nri_radio" name="if_nri"
                                                    type="radio" id="no" value="no"
                                                    {{ old('if_nri', 'no') == 'no' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="no">No</label>
                                            </div>
                                        </div>

                                        <span class="text-danger">
                                            @error('if_nri')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="row nri_details_div" style="display: none;">
                                        <div class="col-md-3">
                                            <x-form.input name="candidate_visa" label="Candidate Visa" placeholder="" />
                                        </div>

                                        <div class="col-md-8">
                                            <x-form.textarea name="address_nri_citizen" label="Address(NRI Citizen)"
                                                placeholder="" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- end card body -->
                        </div>
                    </div>

                    {{-- Family Details --}}
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">Family Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input name="father_name" label="Father Name" placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="father_profession" class="form-label">Father Profession</label>
                                        <select name="father_profession" id="father_profession" class="form-select">
                                            <option value="">-Select Profession-</option>
                                            @foreach ($data['professions'] as $profe)
                                                <option value="{{ $profe->profession_name }}"
                                                    {{ old('father_profession') == $profe->profession_name ? 'selected' : '' }}>
                                                    {{ strtoupper($profe->profession_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('father_profession')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="mother_name" label="Mother Name" placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="mother_profession" class="form-label">Mother Profession</label>
                                        <select name="mother_profession" id="mother_profession" class="form-select">
                                            <option value="">-Select Profession-</option>
                                            @foreach ($data['professions'] as $profe)
                                                <option value="{{ $profe->profession_name }}"
                                                    {{ old('mother_profession') == $profe->profession_name ? 'selected' : '' }}>
                                                    {{ strtoupper($profe->profession_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('mother_profession')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="residence_type" class="form-label">Residence Type</label>
                                        <select name="residence_type" id="residence_type" class="form-select">
                                            <option value="">-Select Residence Type-</option>
                                            <option value="Apartment"
                                                {{ old('residence_type') == 'Apartment' ? 'selected' : '' }}>
                                                Apartment</option>
                                            <option value="Condominium"
                                                {{ old('residence_type') == 'Condominium' ? 'selected' : '' }}>Condominium
                                            </option>
                                            <option value="House"
                                                {{ old('residence_type') == 'House' ? 'selected' : '' }}>
                                                House
                                            </option>
                                            <option value="Townhouse"
                                                {{ old('residence_type') == 'Townhouse' ? 'selected' : '' }}>Townhouse
                                            </option>
                                            <option value="Villa"
                                                {{ old('residence_type') == 'Villa' ? 'selected' : '' }}>
                                                Villa
                                            </option>
                                            <option value="Dormitory"
                                                {{ old('residence_type') == 'Dormitory' ? 'selected' : '' }}>Dormitory
                                            </option>
                                            <option value="Hostel"
                                                {{ old('residence_type') == 'Hostel' ? 'selected' : '' }}>
                                                Hostel</option>
                                            <option value="Cottage"
                                                {{ old('residence_type') == 'Cottage' ? 'selected' : '' }}>
                                                Cottage</option>
                                            <option value="Bungalow"
                                                {{ old('residence_type') == 'Bungalow' ? 'selected' : '' }}>
                                                Bungalow</option>
                                            <option value="Studio"
                                                {{ old('residence_type') == 'Studio' ? 'selected' : '' }}>
                                                Studio</option>
                                            <option value="Mobile Home"
                                                {{ old('residence_type') == 'Mobile Home' ? 'selected' : '' }}>Mobile Home
                                            </option>
                                            <option value="Farmhouse"
                                                {{ old('residence_type') == 'Farmhouse' ? 'selected' : '' }}>Farmhouse
                                            </option>
                                            <option value="Penthouse"
                                                {{ old('residence_type') == 'Penthouse' ? 'selected' : '' }}>Penthouse
                                            </option>
                                            <option value="Mansion"
                                                {{ old('residence_type') == 'Mansion' ? 'selected' : '' }}>
                                                Mansion</option>
                                            <option value="Duplex"
                                                {{ old('residence_type') == 'Duplex' ? 'selected' : '' }}>
                                                Duplex</option>
                                            <option value="Shared Accommodation"
                                                {{ old('residence_type') == 'Shared Accommodation' ? 'selected' : '' }}>
                                                Shared
                                                Accommodation</option>
                                            <option value="Other"
                                                {{ old('residence_type') == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                        @error('residence_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <x-form.input name="gotra" label="Gotra" placeholder="" />
                                    </div>


                                    <div class="col-md-6">
                                        <label for="family_type" class="form-label">Family Type</label>
                                        <select name="family_type" id="family_type" class="form-select">
                                            <option value="">-Select Type-</option>
                                            <option value="nuclear"
                                                {{ old('family_type') == 'nuclear' ? 'selected' : '' }}>
                                                Nuclear</option>

                                            <option value="joint" {{ old('family_type') == 'joint' ? 'selected' : '' }}>
                                                Joint
                                            </option>

                                            <option value="single parent"
                                                {{ old('family_type') == 'single parent' ? 'selected' : '' }}>Single
                                                Parent
                                            </option>

                                            <option value="step parent"
                                                {{ old('family_type') == 'step parent' ? 'selected' : '' }}>Step Parent
                                            </option>

                                            <option value="grandparent"
                                                {{ old('family_type') == 'grandparent' ? 'selected' : '' }}>Grandparent
                                            </option>

                                        </select>

                                        @error('family_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label for="family_status" class="form-label">Family Status</label>
                                        <select name="family_status" id="family_status" class="form-select">
                                            <option value="">-Select Type-</option>
                                            <option value="middle class"
                                                {{ old('family_status') == 'middle class' ? 'selected' : '' }}>
                                                Middle Class</option>

                                            <option value="upper middle class"
                                                {{ old('family_status') == 'upper middle class' ? 'selected' : '' }}>
                                                Upper
                                                Middle Class
                                            </option>

                                            <option value="upper class"
                                                {{ old('family_status') == 'upper class' ? 'selected' : '' }}>Upper
                                                Class
                                            </option>

                                            <option value="rich" {{ old('family_status') == 'rich' ? 'selected' : '' }}>
                                                Rich
                                            </option>

                                        </select>
                                        @error('family_status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <x-form.select name="family_community" label="Community" :options="[
                                            'Swetamber' => 'Swetamber',
                                            'Digmber' => 'Digmber',
                                            'Agrawal' => 'Agrawal',
                                            'Khandalwal' => 'Khandalwal',
                                            'Vani' => 'Vani',
                                            'Other Jain' => 'Other Jain',
                                            'Non Jain' => 'Non Jain',
                                        ]" />
                                    </div>

                                    <div class="col-md-6 mt-2">

                                        <x-form.select name="family_sub_community" label="Sub Community"
                                            :options="[
                                                'Digmber-Murtipojak' => 'Digmber-Murtipojak',
                                                'Digmber-Gumanapati' => 'Digmber-Gumanapati',
                                                'Digmber-Taranapati' => 'Digmber-Taranapati',
                                                'Digmber-Teranapati' => 'Digmber-Teranapati',
                                                'Digmber-Terapanti' => 'Digmber-Terapanti',
                                                'Digmber-Torapanti' => 'Digmber-Torapanti',
                                                'Digmber-Pancham' => 'Digmber-Pancham',
                                                'Digmber-Bisapanti' => 'Digmber-Bisapanti',
                                                'Digmber' => 'Digmber',
                                                'Swetamber' => 'Swetamber',
                                                'Other' => 'Other',
                                                'Swetamber-Terapanti' => 'Swetamber-Terapanti',
                                                'Swetamber-Murtipojak' => 'Swetamber-Murtipojak',
                                                'Swetamber-Stanawasi' => 'Swetamber-Stanawasi',
                                                'Swetamber-Derawasi' => 'Swetamber-Derawasi',
                                                'Other Jain' => 'Other Jain',
                                                'Vani' => 'Vani',
                                                'Non Jain' => 'Non Jain',
                                            ]" />

                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <x-form.textarea name="family_address" label="Family Address" placeholder="" />
                                    </div>

                                    <strong>
                                        <u>Siblings Details</u>
                                    </strong>

                                    <div class="col-md-6">
                                        <x-form.input name="brother" label="Brother" placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="sister" label="Sister" placeholder="" />
                                    </div>

                                    <div class="col-md-12">
                                        <x-form.textarea name="other_family_details" label="Family Business Details"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="calling_no" type="number" label="Calling No"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="are_you_manglik" class="form-label">Are You Manglik</label>
                                        <select name="are_you_manglik" id="are_you_manglik" class="form-select">
                                            <option value="">-Select Type-</option>

                                            <option value="any"
                                                {{ old('are_you_manglik') == 'any' ? 'selected' : '' }}>Any
                                            </option>
                                            <option value="yes"
                                                {{ old('are_you_manglik') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no" {{ old('are_you_manglik') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>


                                        </select>
                                        @error('are_you_manglik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Id Proof --}}
                                    <div class="row mt-4">

                                        <div class="col-md-3">
                                            <label for="idProof_type" class="form-label">ID Proof Type</label>
                                            <select name="idProof_type" id="idProof_type" class="form-select">
                                                <option value="">-Select Type-</option>
                                                <option value="adhar_card"
                                                    {{ old('idProof_type') == 'adhar_card' ? 'selected' : '' }}>Adhar Card
                                                </option>
                                                <option value="pan_card"
                                                    {{ old('idProof_type') == 'pan_card' ? 'selected' : '' }}>PAN Card
                                                </option>
                                                <option value="voter_id"
                                                    {{ old('idProof_type') == 'voter_id' ? 'selected' : '' }}>Voter ID
                                                </option>
                                                <option value="driving_licence"
                                                    {{ old('idProof_type') == 'driving_licence' ? 'selected' : '' }}>
                                                    Driving
                                                    Licence</option>
                                                <option value="covid"
                                                    {{ old('idProof_type') == 'covid' ? 'selected' : '' }}>
                                                    COVID</option>
                                                <option value="ayushman"
                                                    {{ old('idProof_type') == 'ayushman' ? 'selected' : '' }}>Ayushman
                                                </option>
                                                <option value="religion_id"
                                                    {{ old('idProof_type') == 'religion_id' ? 'selected' : '' }}>Religion
                                                    ID
                                                </option>
                                            </select>
                                            @error('idProof_type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="id_proof">ID Proof</label>
                                            <input type="file" accept="image/*" name="id_proof" id="id_proof"
                                                onchange="loadFile(event, 'output3')" class="form-control">

                                            <span class="text-danger">
                                                @error('id_proof')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-lg-3">
                                            <img id="output3" src="" alt=""
                                                style="max-width: 50%; max-height: 100px;">
                                        </div>


                                    </div>

                                </div>

                            </div>
                            <!-- end card body -->
                        </div>
                    </div>

                    {{-- Patner Preferance Card --}}
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">Patner Preferance</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <strong>Age Group</strong>
                                    <div class="col-md-3">
                                        <label for="partner_age_group_from" class="form-label">From</label>
                                        <select name="partner_age_group_from" id="partner_age_group_from"
                                            class="form-select">
                                            <option value="">Select Age</option>
                                            @for ($age = 18; $age <= 75; $age++)
                                                <option value="{{ $age }}"
                                                    {{ old('partner_age_group_from') == $age ? 'selected' : '' }}>
                                                    {{ $age }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('partner_age_group_from')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label for="partner_age_group_to" class="form-label">To</label>
                                        <select name="partner_age_group_to" id="partner_age_group_to"
                                            class="form-select">
                                            <option value="">Select Age</option>
                                            @for ($age = 18; $age <= 75; $age++)
                                                <option value="{{ $age }}"
                                                    {{ old('partner_age_group_to') == $age ? 'selected' : '' }}>
                                                    {{ $age }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('partner_age_group_to')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <x-form.select name="partner_income" label="Income" :options="[
                                            'any' => 'Any',
                                            '1 - 2 L' => '1 - 2 L',
                                            '2 - 3 L' => '2 - 3 L',
                                            '3 - 4 L' => '3 - 4 L',
                                            '4 - 5 L' => '4 - 5 L',
                                            '5 - 10 L' => '5 - 10 L',
                                            '10 - 15 L' => '10 - 15 L',
                                            '15 - 20 L' => '15 - 20 L',
                                            '20 - 25 L' => '20 - 25 L',
                                            '25 - 30 L' => '25 - 30 L',
                                            '30 - 45 L' => '30 - 45 L',
                                            '45 - 50 L' => '45 - 50 L',
                                            '50 - 75 L' => '50 - 75 L',
                                            '75 L - 1 Cr' => '75 L - 1 Cr',
                                            '1 - 2 Cr' => '1 - 2 Cr',
                                            '2 - 3 Cr' => '2 - 3 Cr',
                                            '3 - 5 Cr' => '3 - 5 Cr',
                                            '5 - 10 Cr' => '5 - 10 Cr',
                                            '10 - 15 Cr' => '10 - 15 Cr',
                                            '15 - 100 Cr' => '15 - 100 Cr',
                                            '100 - 200 Cr' => '100 - 200 Cr',
                                            '200 - 500 Cr' => '200 - 500 Cr',
                                            '500 Cr - 1B' => '500 Cr - 1B',
                                            '1B and above' => '1B and above',
                                        ]" />

                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="partner_country" class="form-label">Country</label>
                                        <select name="partner_country[]" id="partner_country" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select Country</option>
                                            <option value='0'>Any</option>
                                            @foreach ($data['countries'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('partner_country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="partner_state" class="form-label">State</label>
                                        <select name="partner_state[]" id="partner_state" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select State</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('partner_state')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="partner_city" class="form-label">City</label>
                                        <select name="partner_city[]" id="partner_city" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select city</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('partner_city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-4 mt-2">
                                        <label for="partner_education" class="form-label">Education</label>
                                        <select name="partner_education[]" id="partner_education" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select Education</option>
                                            @foreach ($data['educations'] as $education)
                                                <option value="{{ $education->education_name }}"
                                                    {{ in_array($education->education_name, old('partner_education', [])) ? 'selected' : '' }}>
                                                    {{ strtoupper($education->education_name) }}

                                                </option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger">
                                            @error('partner_education')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-4 mt-2">
                                        <label for="partner_occupation" class="form-label">Occupation</label>
                                        <select name="partner_occupation[]" id="partner_occupation" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select Occupation</option>
                                            @foreach ($data['occupations'] as $occupation)
                                                <option value="{{ $occupation->occupation_name }}"
                                                    {{ in_array($occupation->occupation_name, old('partner_occupation', [])) ? 'selected' : '' }}>
                                                    {{ strtoupper($occupation->occupation_name) }}

                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('partner_occupation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-4 mt-2">
                                        <label for="partner_profession" class="form-label">Profession</label>
                                        <select name="partner_profession[]" id="partner_profession" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select Profession</option>
                                            @foreach ($data['professions'] as $profession)
                                                <option value="{{ $profession->profession_name }}"
                                                    {{ in_array($profession->profession_name, old('partner_profession', [])) ? 'selected' : '' }}>
                                                    {{ strtoupper($profession->profession_name) }}

                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('partner_profession')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-4 mt-2">
                                        <label for="partner_manglik" class="form-label">Manglik</label>
                                        <select name="partner_manglik" id="partner_manglik" class="form-select">
                                            <option value="">-Select Type-</option>
                                            <option value="any"
                                                {{ old('partner_manglik') == 'any' ? 'selected' : '' }}>Any
                                            </option>
                                            <option value="yes"
                                                {{ old('partner_manglik') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no"
                                                {{ old('partner_manglik') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>


                                        </select>
                                        @error('partner_manglik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="astrology_matching" class="form-label">Astrology Matching</label>
                                        <select name="astrology_matching" id="astrology_matching" class="form-select">
                                            <option value="">-Select Type-</option>

                                            <option value="any"
                                                {{ old('astrology_matching') == 'any' ? 'selected' : '' }}>
                                                Any
                                            </option>
                                            <option value="yes"
                                                {{ old('astrology_matching') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no"
                                                {{ old('astrology_matching') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>


                                        </select>
                                        @error('astrology_matching')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <x-form.select name="partner_marital_status" label="Marital Status"
                                            :options="[
                                                'any' => 'Any',
                                                'single' => 'Single',
                                                'married' => 'Married',
                                                'divorced' => 'Divorced',
                                                'widowed' => 'Widowed',
                                                'separated' => 'Separated',
                                                'engaged' => 'Engaged',
                                                'in a Relationship' => 'In a Relationship',
                                            ]" />


                                    </div>


                                    {{-- partner_marital_status hidden inputs  --}}
                                    <div class="row partner_marital_status_detail_div" style="display: none;">
                                        <div class="col-md-4 mt-2">
                                            <label for="partner_acccept_kid" class="form-label">Acccept Kid</label>
                                            <select name="partner_acccept_kid" id="partner_acccept_kid"
                                                class="form-select">
                                                <option value="">-Select Type-</option>
                                                <option value="any"
                                                    {{ old('partner_acccept_kid') == 'any' ? 'selected' : '' }}>
                                                    Any
                                                </option>
                                                <option value="with kid"
                                                    {{ old('partner_acccept_kid') == 'with kid' ? 'selected' : '' }}>
                                                    With kid</option>

                                                <option value="without kid"
                                                    {{ old('partner_acccept_kid') == 'without kid' ? 'selected' : '' }}>
                                                    Without kid
                                                </option>

                                            </select>
                                            @error('partner_acccept_kid')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-8 mt-2">
                                            <x-form.textarea name="partner_kid_discription" label="Kid Discription"
                                                placeholder="" />
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <x-form.textarea name="expectation_partner_details"
                                            label="Expectation Partner Details" placeholder="" />
                                    </div>



                                </div>

                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div id="cropedImage">

                </div>

                <!-- end row -->
                <div class="text-end mb-4">
                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                    <button type="button" id="userRegBtn" class="btn btn-success w-sm">Register</button>
                </div>

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


    <script>
        $(document).ready(function() {

            $('#education').select2();
            $('#occupation').select2();
            $('#profession').select2();

            $('#weight').select2();
            $('#height').select2();

            $('#partner_age_group_from').select2();
            $('#partner_age_group_to').select2();

            $('#partner_education').select2();
            $('#partner_occupation').select2();
            $('#partner_profession').select2();

            $('#candidate_income').select2();
            $('#partner_income').select2();

            $('#complexion').select2();
            $('#religion').select2();
            $('#family_community').select2();
            $('#marital_status').select2();
            $('#blood_group').select2();
            $('#father_profession').select2();
            $('#mother_profession').select2();
            $('#residence_type').select2();
            //$('#family_type').select2();
            $('#partner_community').select2();
            $('#partner_sub_community').select2();
            $('#partner_marital_status').select2();

            $('#partner_country').select2();
            $('#partner_state').select2();
            $('#partner_city').select2();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Load State
            // $("#partner_country").on("change", function(e) {
            //     e.preventDefault();
            //     let country_id = $(this).val()
            //     $.ajax({
            //         type: "post",
            //         url: "{{ route('admin.getState') }}",
            //         data: {
            //             country_id: country_id
            //         },
            //         success: function(response) {
            //             if (response.status == true) {
            //                 $("#partner_state").html(response.data)
            //             } else {
            //                 console.log(response);
            //             }
            //         }
            //     });
            // })


            $("#partner_country").on("change", function(e) {
                e.preventDefault();
                let country_ids = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.getState') }}",
                    data: {
                        country_ids: country_ids
                    },
                    success: function(response) {
                        if (response.status == true) {
                            $("#partner_state").html(response.data);
                        } else {
                            console.log(response);
                        }
                    }
                });
            });


            // Load City
            // $("#partner_state").on("change", function(e) {
            //     e.preventDefault();
            //     let state_id = $(this).val()
            //     console.log(state_id);
            //     $.ajax({
            //         type: "post",
            //         url: "{{ route('admin.getCity') }}",
            //         data: {
            //             state_id: state_id
            //         },
            //         success: function(response) {
            //             if (response.status == true) {
            //                 $("#partner_city").html(response.data)
            //             } else {
            //                 console.log(response);
            //             }
            //         }
            //     });
            // })

            $("#partner_state").on("change", function(e) {
                e.preventDefault();
                let state_ids = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.getCity') }}",
                    data: {
                        state_ids: state_ids
                    },
                    success: function(response) {
                        if (response.status == true) {
                            $("#partner_city").html(response.data);
                        } else {
                            console.log(response);
                        }
                    }
                });
            });

            // =======================================================================
            // DOB to Age calculate
            $("#user_dob").on("change", function(e) {
                e.preventDefault();
                let dob_user = $(this).val();
                let user_age = $("#user_age")

                if (!dob_user) {
                    alert("Please select your date of birth.");
                    return;
                }

                const dob = new Date(dob_user);
                const today = new Date();

                let age = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();
                const dayDiff = today.getDate() - dob.getDate();

                if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                    age--;
                }

                user_age.val(age)
            })


            // Physical Status Dive hide show
            $("#physical_status").on("change", function(e) {
                e.preventDefault();
                let sel_val = $(this).val()
                let div = $(".physical_status_desc_div")
                let input = $("#physical_status_desc")
                if (sel_val == "yes") {
                    div.show()
                } else {
                    div.hide()
                    input.val(null)
                }
            })

            // Marital Status Dive hide show
            $("#marital_status").on("change", function(e) {
                e.preventDefault();
                let sel_val = $(this).val()
                let div = $(".is_children_div")
                if (sel_val == "Single" || sel_val == "unmarried" || sel_val == "") {
                    div.hide()
                    $("#is_children").val(null)
                } else {
                    div.show()
                }
            })

            $("#is_children").on("change", function(e) {
                e.preventDefault();
                let sel_val = $(this).val()
                let div = $(".is_children_yes_div")
                if (sel_val == "yes") {
                    div.show()
                } else {
                    div.hide()
                    $("#son_details").val(null)
                    $("#daughter_details").val(null)
                }
            })


            $(".if_nri_radio").on("change", function(e) {
                e.preventDefault();
                let sel_val = $(this).val()
                let div = $(".nri_details_div")
                if (sel_val == "yes") {
                    div.show()
                } else {
                    div.hide()
                    $("#candidate_visa").val(null)
                    $("#address_nri_citizen").val(null)
                }
            })


            // partner_marital_status Status Dive hide show
            $("#partner_marital_status").on("change", function(e) {
                e.preventDefault();
                let sel_val = $(this).val()
                let div = $(".partner_marital_status_detail_div")
                if (sel_val == "Single" || sel_val == "unmarried" || sel_val == "") {
                    div.hide()
                    $("#partner_kid_discription").val(null)
                    $("#partner_acccept_kid").val(null)
                } else {
                    div.show()
                }
            })


        });
    </script>

    {{-- Image Preview Script --}}
    <script>
        function loadFile(event, outputId) {
            var output = document.getElementById(outputId);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src); // Free up memory
            };
        }
    </script>

    {{-- <script>
    // Initialize Cropper.js
    var cropper;

    // Handle image selection
    var inputImage = document.getElementById('photo');
    inputImage.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
            var imageUrl = event.target.result;
            var image = document.getElementById('image');
            image.src = imageUrl;

            // Destroy previous instance of Cropper.js if exists
            if (cropper) {
                cropper.destroy();
            }

            // Initialize Cropper.js
            cropper = new Cropper(image, {
                viewMode: 1, // Set to 1 to restrict the crop box to fit within the canvas
                dragMode: 'move', // Allow users to freely crop
                crop: function(event) {
                    console.log(event.detail.x);
                    console.log(event.detail.y);
                    console.log(event.detail.width);
                    console.log(event.detail.height);
                    console.log(event.detail.rotate);
                    console.log(event.detail.scaleX);
                    console.log(event.detail.scaleY);
                },
            });
        };

        reader.readAsDataURL(file);
    });

    // Handle crop button click
    var cropButton = document.getElementById('cropButton');
    cropButton.addEventListener('click', function() {
        if (cropper) {
            // Get cropped canvas data
            var canvas = cropper.getCroppedCanvas();

            // Optionally, you can download the cropped image directly
            // canvas.toBlob(function(blob) {
            //     var url = URL.createObjectURL(blob);
            //     var a = document.createElement('a');
            //     a.href = url;
            //     a.download = 'cropped_image.jpg';
            //     a.click();
            // });

            // Display cropped image in a new window
            var croppedImage = document.createElement('img');
            croppedImage.src = canvas.toDataURL();
            croppedImage.alt = 'Cropped Image';
            document.body.appendChild(croppedImage);
        }
    });
</script> --}}

    <script>
        // Initialize Cropper.js
        var cropper;

        // Handle image selection
        var inputImage = document.getElementById('photo');
        inputImage.addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(event) {
                $(".image_preview").show()
                var imageUrl = event.target.result;
                var image = document.getElementById('image');
                image.src = imageUrl;

                // Destroy previous instance of Cropper.js if exists
                if (cropper) {
                    cropper.destroy();
                }

                // Initialize Cropper.js
                cropper = new Cropper(image, {
                    viewMode: 1, // Set to 1 to restrict the crop box to fit within the canvas
                    dragMode: 'move', // Allow users to freely crop
                    crop: function(event) {
                        console.log(event.detail.x);
                        console.log(event.detail.y);
                        console.log(event.detail.width);
                        console.log(event.detail.height);
                        console.log(event.detail.rotate);
                        console.log(event.detail.scaleX);
                        console.log(event.detail.scaleY);
                    },
                });
            };

            reader.readAsDataURL(file);
        });

        // Handle crop button click
        var cropButton = document.getElementById('userRegBtn');
        cropButton.addEventListener('click', function() {
            if (cropper) {
                // Get cropped canvas data
                var canvas = cropper.getCroppedCanvas();

                // Convert canvas to base64 encoded image
                var croppedImageBase64 = canvas.toDataURL('image/jpeg'); // Adjust format as needed

                // Create a hidden input field to store the base64 image data
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'croppedImage';
                hiddenInput.value = croppedImageBase64;
                document.getElementById('cropedImage').append(hiddenInput);

            }
            // Submit the form
            document.getElementById('userRegForm').submit();
            // console.log($("#user_age").val(),"User Age");
        });
    </script>


    {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var croppers = [];

        // Handle image selection
        var inputImages = document.getElementById('photo');
        inputImages.addEventListener('change', function(e) {
            var files = e.target.files;

            // Clear previous cropper instances and cropped images
            croppers.forEach(function(cropper) {
                cropper.destroy();
            });
            croppers = [];

            var imagesContainer = document.getElementById('imagesContainer');
            imagesContainer.innerHTML = '';

            // Process each selected file
            Array.from(files).forEach(function(file, index) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var imageUrl = event.target.result;

                    // Create image element
                    var image = document.createElement('img');
                    image.id = 'image_' + index;
                    image.src = imageUrl;
                    image.style.maxWidth = '300px'; // Adjust image size as needed
                    imagesContainer.appendChild(image);

                    // Initialize Cropper.js for each image
                    var cropper = new Cropper(image, {
                        viewMode: 1, // Set to 1 to restrict the crop box to fit within the canvas
                        dragMode: 'move', // Allow users to freely crop
                        crop: function(event) {
                            console.log('Image ' + index + ' cropped:', event.detail);
                        },
                    });

                    // Store cropper instance
                    croppers.push(cropper);
                };

                reader.readAsDataURL(file);
            });
        });

        // Handle form submission
        var form = document.getElementById('userRegForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Prepare FormData to submit with other form data
            var formData = new FormData(form);

            // Iterate through croppers to get cropped images
            croppers.forEach(function(cropper, index) {
                var canvas = cropper.getCroppedCanvas();
                var croppedImageBase64 = canvas.toDataURL('image/jpeg'); // Adjust format as needed

                // Append cropped image data to FormData
                formData.append('croppedImage_' + index, croppedImageBase64);
            });

            // Submit the form using fetch
            fetch('your-backend-endpoint', {
                method: 'POST',
                body: formData
            }).then(response => {
                // Handle response
                console.log('Form submitted successfully');
            }).catch(error => {
                // Handle error
                console.error('Error submitting form', error);
            });
        });
    });
</script> --}}
@endpush

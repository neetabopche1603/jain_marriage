@extends('partial.admin.app')
@section('adminTitle', 'Edit User Details')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit The User Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Information</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            @include('partial.flash-msg')

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">User Derails</h5>
                    <div class="card">
                        <div class="card-body">

                           @include('adminPanel.user.tablist')
                            <div class="tab-content text-muted">

                                <div class="tab-pane active" id="nav-border-top-home" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">

                                            {{-- Basic & Personal Details Form --}}
                                            <form action="{{ route('admin.userBasicPersonalDetailUpdate') }}"
                                                method="post">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ $usersEdit->id }}">

                                                <div class="row">

                                                    {{-- Basic --}}
                                                    <div class="col-lg-7">
                                                        {{-- Basic Details --}}
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-title mb-sm-0 text-primary">User Basic
                                                                    Details</h5>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <x-form.select name="profile_created_by_type"
                                                                            label="Profile For" :options="[
                                                                                '' => '-Select Profile For-',
                                                                                'self' => 'Self',
                                                                                'son' => 'Son',
                                                                                'daughter' => 'Daughter',
                                                                                'brother' => 'Brother',
                                                                                'sister' => 'Sister',
                                                                                'relative' => 'Relative',
                                                                                'other' => 'Other',
                                                                            ]"
                                                                            :required="true" :selected="$usersEdit->profile_created_by_type" />
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.select name="refrence_by"
                                                                            label="Reference By*" :options="[
                                                                                '' => '-Select-',
                                                                                'facebook' => 'Facebook',
                                                                                'instagram' => 'Instagram',
                                                                                'google' => 'Google',
                                                                                'youTube' => 'YouTube',
                                                                            ]"
                                                                            :required="true" :selected="$usersEdit->refrence_by" />
                                                                    </div>

                                                                    <div class="col-md-6 mt-2">
                                                                        <x-form.input name="whatsapp_no"
                                                                            label="Whatsapp No*"
                                                                            value="{{ $usersEdit->whatsapp_no }}"
                                                                            placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-6 mt-2">
                                                                        <x-form.input name="email" type="email"
                                                                            value="{{ $usersEdit->email }}"
                                                                            label="Email Id*" placeholder="" />
                                                                    </div>


                                                                    <div class="col-md-6 mt-2">
                                                                        <x-form.input name="password" type="password"
                                                                            label="Password*" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-6 mt-2">
                                                                        <x-form.input name="password_confirmation"
                                                                            type="password" label="Re-Type Password*"
                                                                            placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->

                                                    </div>

                                                    {{-- User Profile NRI --}}
                                                    <div class="col-lg-4 mt-1">

                                                        <div class="card">

                                                            <div class="card-header">
                                                                <h5 class="card-title mb-sm-0 text-primary">NRI Details
                                                                </h5>
                                                            </div>

                                                            <div class="card-body">

                                                                {{-- NRI Details --}}
                                                                <div class="row">


                                                                    <div class="col-md-12">

                                                                        @php
                                                                            $ifNriValue = old(
                                                                                'if_nri',
                                                                                $usersEdit->userDetail->if_nri ?? 'no',
                                                                            );
                                                                        @endphp

                                                                        <label for="if_nri">{{ 'If NRI' }}</label>
                                                                        <div class="form-check form-check-inline">
                                                                            <!-- Radio button for "Yes" -->
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input if_nri_radio"
                                                                                    name="if_nri" type="radio"
                                                                                    id="yes" value="yes"
                                                                                    {{ $ifNriValue == 'yes' ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="yes">Yes</label>
                                                                            </div>

                                                                            <!-- Radio button for "No" -->
                                                                            <div class="form-check form-check-inline">
                                                                                <input
                                                                                    class="form-check-input if_nri_radio"
                                                                                    name="if_nri" type="radio"
                                                                                    id="no" value="no"
                                                                                    {{ $ifNriValue == 'no' ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="no">No</label>
                                                                            </div>
                                                                        </div>

                                                                        <span class="text-danger">
                                                                            @error('if_nri')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>



                                                                    <div class="row nri_details_div"
                                                                        style="display: none;">
                                                                        <div class="col-md-12">
                                                                            <x-form.input name="candidate_visa"
                                                                                label="Candidate Visa"
                                                                                value="{{ $usersEdit->userDetail->candidate_visa }}"
                                                                                placeholder="" />
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <x-form.textarea name="address_nri_citizen"
                                                                                label="Address(NRI Citizen)"
                                                                                value="{{ $usersEdit->userDetail->address_nri_citizen }}"
                                                                                placeholder="" />
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    {{-- User Personal Details Card --}}

                                                    <div class="col-lg-12">
                                                        <div class="card">

                                                            <div class="card-header">
                                                                <h5 class="card-title mb-sm-0 text-primary">User Personal
                                                                    Details</h5>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <x-form.select name="gender" label="Gender"
                                                                            :options="[
                                                                                'male' => 'male',
                                                                                'female' => 'female',
                                                                                'other' => 'other',
                                                                            ]" :required="true"
                                                                            :selected="$usersEdit->gender" />

                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.input name="name"
                                                                            label="Candidate Name*" placeholder=""
                                                                            value="{{ $usersEdit->name }}" />
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <x-form.input name="dob" type="date"
                                                                            label="DOB*" placeholder="" id="user_dob"
                                                                            value="{{ $usersEdit->dob }}" />
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <x-form.input name="age" type="number"
                                                                            label="Age" placeholder="" id="user_age"
                                                                            value="{{ $usersEdit->age }}" readonly />
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <x-form.input name="birth_time" type="time"
                                                                            label="Birth Time" placeholder=""
                                                                            value="{{ date('H:i', strtotime($usersEdit->birth_time)) }}" />
                                                                    </div>

                                                                    <div class="col-md-5">
                                                                        <x-form.input name="birth_place"
                                                                            label="Birth Place" placeholder=""
                                                                            value="{{ $usersEdit->birth_place }}" />
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="height"
                                                                            class="form-label">Height</label>
                                                                        <select name="height" id="height"
                                                                            class="form-select js-example-basic-single">
                                                                            <option value="">Select Height</option>
                                                                            @for ($feet = 4; $feet <= 8; $feet++)
                                                                                @for ($inch = 0; $inch <= 9; $inch++)
                                                                                    @php
                                                                                        $height = $feet + $inch / 10;
                                                                                    @endphp
                                                                                    <option value="{{ $height }}"
                                                                                        {{ $usersEdit->height == $height ? 'selected' : '' }}>
                                                                                        {{ $height }}
                                                                                    </option>
                                                                                @endfor
                                                                            @endfor
                                                                        </select>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <label for="weight"
                                                                            class="form-label">Weight</label>
                                                                        <select name="weight" id="weight"
                                                                            class="form-select js-example-basic-single">
                                                                            <option value="">Select Weight</option>
                                                                            @for ($weight = 35; $weight <= 200; $weight++)
                                                                                <option value="{{ $weight }}kg"
                                                                                    {{ intval($usersEdit->weight) == $weight ? 'selected' : '' }}>
                                                                                    {{ $weight }}kg
                                                                                </option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <x-form.select name="complexion" :selectClass="'js-example-basic-single'"
                                                                            label="Complexion" :options="[
                                                                                'extemely fair skin' =>
                                                                                    'Extemely Fair Skin',
                                                                                'fair skin' => 'Fair Skin',
                                                                                'light skin' => 'Light Skin',
                                                                                'medium skin' => 'Medium Skin',
                                                                                'olive skin' => 'Olive Skin',
                                                                                'tan skin' => 'Tan Skin',
                                                                                'brown skin' => 'Brown Skin',
                                                                                'dark skin' => 'Dark Skin',
                                                                            ]"
                                                                            :required="true" :selected="$usersEdit->complexion" />

                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="education"
                                                                            class="form-label">Education</label>
                                                                        <select name="education[]" id="education"
                                                                            class="form-select js-example-basic-single"
                                                                            multiple="multiple">
                                                                            <option value="" disabled>Select
                                                                                Education</option>

                                                                            @foreach ($data['educations'] as $education)
                                                                                <option
                                                                                    value="{{ $education->education_name }}"
                                                                                    {{ (is_array(old('education')) && in_array($education->education_name, old('education'))) ||
                                                                                    (is_array($usersEdit->education) && in_array($education->education_name, $usersEdit->education))
                                                                                        ? 'selected'
                                                                                        : '' }}>
                                                                                    {{ $education->education_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('education')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <label for="profession"
                                                                            class="form-label">Profession</label>
                                                                        <select name="profession" id="profession"
                                                                            class="form-select js-example-basic-single">
                                                                            <option value="">Select Profession
                                                                            </option>
                                                                            @foreach ($data['professions'] as $profe)
                                                                                <option
                                                                                    value="{{ $profe->profession_name }}"
                                                                                    {{ old('profession', $usersEdit->profession) == $profe->profession_name ? 'selected' : '' }}>
                                                                                    {{ $profe->profession_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('profession')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <label for="occupation"
                                                                            class="form-label">Occupation</label>
                                                                        <select name="occupation" id="occupation"
                                                                            class="form-select js-example-basic-single">
                                                                            <option value="">Select Occupation
                                                                            </option>
                                                                            @foreach ($data['occupations'] as $occu)
                                                                                <option
                                                                                    value="{{ $occu->occupation_name }}"
                                                                                    {{ old('occupation', $usersEdit->occupation) == $occu->occupation_name ? 'selected' : '' }}>
                                                                                    {{ $occu->occupation_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('occupation')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>



                                                                    <div class="col-md-3 mt-2">
                                                                        <x-form.select name="religion" label="Religion"
                                                                            :selectClass="'js-example-basic-single'" :options="[
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
                                                                            ]"
                                                                            :required="true" :selected="$usersEdit->religion" />
                                                                    </div>

                                                                    <div class="col-md-3 mt-2">
                                                                        <x-form.select name="candidate_community"
                                                                            label="Community" :selectClass="'js-example-basic-single'"
                                                                            :options="[
                                                                                '' => 'Select Community',
                                                                                'swetamber' => 'Swetamber',
                                                                                'digmber' => 'Digmber',
                                                                                'agrawal' => 'Agrawal',
                                                                                'khandalwal' => 'Khandalwal',
                                                                                'vani' => 'Vani',
                                                                                'other jain' => 'Other Jain',
                                                                                'non jain' => 'Non Jain',
                                                                            ]" :required="true"
                                                                            :selected="$usersEdit->candidate_community" />
                                                                    </div>


                                                                    <div class="col-md-3 mt-2">
                                                                        <x-form.select name="candidate_income"
                                                                            :selectClass="'js-example-basic-single'" label="Candidate Income"
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
                                                                            ]" :required="true"
                                                                            :selected="$usersEdit->candidate_income" />
                                                                    </div>

                                                                    <div class="col-md-3 mt-2">
                                                                        <x-form.select name="blood_group"
                                                                            :selectClass="'js-example-basic-single'" label="Blood Group"
                                                                            :options="[
                                                                                'A+' => 'A+',
                                                                                'A-' => 'A-',
                                                                                'B+' => 'B+',
                                                                                'B-' => 'B-',
                                                                                'AB+' => 'AB+',
                                                                                'AB-' => 'AB-',
                                                                                'O+' => 'O+',
                                                                                'O-' => 'O-',
                                                                            ]" :required="true"
                                                                            :selected="$usersEdit->blood_group" />
                                                                    </div>

                                                                    <div class="col-md-4 mt-2">
                                                                        <label for="physical_status"
                                                                            class="form-label">Physical Status</label>
                                                                        <select name="physical_status"
                                                                            id="physical_status"
                                                                            class="form-select physical_status">
                                                                            <option value="">-Select Type-</option>
                                                                            <option value="yes"
                                                                                {{ old('physical_status', $usersEdit->physical_status) == 'yes' ? 'selected' : '' }}>
                                                                                Yes</option>


                                                                            <option value="no"
                                                                                {{ old('physical_status', $usersEdit->physical_status) == 'no' ? 'selected' : '' }}>
                                                                                No</option>

                                                                        </select>
                                                                        @error('physical_status')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-md-8 mt-2 physical_status_desc_div"
                                                                        style="display: none">
                                                                        <x-form.textarea name="physical_status_desc"
                                                                            label="Physical Status Desciption"
                                                                            value="{{ $usersEdit->physical_status_desc }}"
                                                                            placeholder="" />
                                                                    </div>


                                                                    {{-- marital_status --}}
                                                                    <div class="row">
                                                                        <div class="col-md-4 mt-2">
                                                                            <x-form.select name="marital_status"
                                                                                label="Marital Status" :selectClass="'js-example-basic-single'"
                                                                                :options="[
                                                                                    'any' => 'Any',
                                                                                    'single' => 'Single',
                                                                                    'married' => 'Married',
                                                                                    'divorced' => 'Divorced',
                                                                                    'widowed' => 'Widowed',
                                                                                    'separated' => 'separated',
                                                                                    'engaged' => 'Engaged',
                                                                                    'in a Relationship' =>
                                                                                        'In a Relationship',
                                                                                ]" :required="true"
                                                                                :selected="$usersEdit->marital_status" />
                                                                        </div>


                                                                        <div class="col-md-4 mt-2 is_children_div">
                                                                            <label for="is_children" class="form-label">Do
                                                                                you have children?</label>
                                                                            <select name="is_children" id="is_children"
                                                                                class="form-select is_children_sel">
                                                                                <option value="">-Select Type-
                                                                                </option>
                                                                                <option value="yes"
                                                                                    {{ old('is_children', $usersEdit->is_children) == 'yes' ? 'selected' : '' }}>
                                                                                    Yes</option>
                                                                                <option value="no"
                                                                                    {{ old('is_children', $usersEdit->is_children) == 'no' ? 'selected' : '' }}>
                                                                                    No</option>
                                                                            </select>
                                                                            @error('is_children')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>



                                                                        <div class="row is_children_yes_div"
                                                                            style="{{ old('is_children', $usersEdit->is_children) == 'yes' ? 'display:;' : 'display:none;' }}">

                                                                            <div class="col-md-6 mt-2">
                                                                                <x-form.textarea name="son_details"
                                                                                    label="Son Details" placeholder=""
                                                                                    value="{{ $usersEdit->son_details }}" />
                                                                            </div>

                                                                            <div class="col-md-6 mt-2">
                                                                                <x-form.textarea name="daughter_details"
                                                                                    label="Daughter Details"
                                                                                    placeholder=""
                                                                                    value="{{ $usersEdit->daughter_details }}" />
                                                                            </div>

                                                                        </div>


                                                                    </div>

                                                                    <div class="col-md-12 mt-2">
                                                                        <x-form.textarea name="candidates_address"
                                                                            label="Candidates Address" placeholder=""
                                                                            value="{{ $usersEdit->candidates_address }}" />
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <!-- end card body -->

                                                        </div>
                                                        <!-- end card -->
                                                    </div>

                                                </div>


                                                <div class="text-end mb-4">
                                                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                    <button type="submit" class="btn btn-success w-sm">Update Personal Detail</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="tab-pane" id="nav-border-top-profile-Img" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <x-form.input name="photo" type="file" label="photo" />
                                                    </div>
                                                </div>

                                                <div class="text-end mb-4">
                                                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                    <button type="submit" class="btn btn-success w-sm">Upload</button>
                                                </div>
                                            </form>

                                            <strong>User Profile Images</strong>
                                            <div class="table-photo table-responsive table-card mt-3 mb-1">

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if ($userMedias->isEmpty())
                                                            <tr>
                                                                <td colspan="3">No data found</td>
                                                            </tr>
                                                        @else
                                                            @foreach ($userMedias as $index => $media)
                                                                <tr>
                                                                    <td scope="row">{{ $index + 1 }}</td>
                                                                    <td>
                                                                        <img src="{{ $media->photo }}" alt=""
                                                                            width="70" height="70">

                                                                    </td>
                                                                    <td>
                                                                        <select name="status" id="userPhotoStatus" class="form-control">
                                                                            <option value="front_img">Front Img</option>
                                                                            <option value="cover_img">Cover Img</option>
                                                                            <option value="family_img">family Img</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-danger btn-sm"><i
                                                                                class="fa fa-trash"></i></a>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @endif


                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="tab-pane" id="nav-border-top-document-upload" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">

                                            <form action="">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <x-form.input name="id_proof" type="file" label="Id Proof" />
                                                    </div>
                                                </div>

                                                <div class="text-end mb-4">
                                                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                    <button type="submit" class="btn btn-success w-sm">Upload</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div><!--end col-->

            </div>



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

            $('.js-example-basic-single').select2();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Load State
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
                if (sel_val == "Single" || sel_val == "single" || sel_val == "unmarried" || sel_val == "") {
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
        });
    </script>

    {{-- Load Document & show hide divs --}}
    <script>
        $(document).ready(function() {
            let if_nri_radio = $(".if_nri_radio:checked").val();
            let div_nri = $(".nri_details_div")
            if (if_nri_radio == "yes") {
                div_nri.show()
            } else {}

            // is_children_yes_div

            let is_children_select = $(".is_children_sel").val();
            let is_children_yes = $(".is_children_yes_div");
            if (is_children_select === "yes") {
                is_children_yes.show();
            }

            let physical_status_select = $(".is_children_sel").val();
            let physical_status_yes = $(".physical_status_desc_div");
            if (physical_status_select === "yes") {
                physical_status_yes.show();
            }



        });
    </script>
@endpush

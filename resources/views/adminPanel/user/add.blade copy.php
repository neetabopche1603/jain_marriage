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
            {{-- <p class="text-danger"><i>All Filed is required</i></p> --}}

            @include('partial.flash-msg')

            <form action="{{ route('admin.userStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        {{-- Basic Details --}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">User Basic Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="profile_created_by_type" class="form-label">Profile For*</label>
                                        <select class="form-select" data-choices data-choices-search-false
                                            id="profile_created_by_type" name="profile_created_by_type">
                                            <option value="">-Select-</option>

                                            <option value="self"
                                                {{ old('profile_created_by_type') == 'self' ? 'selected' : '' }}>
                                                Self</option>

                                            <option value="son"
                                                {{ old('profile_created_by_type') == 'son' ? 'selected' : '' }}>
                                                Son</option>

                                            <option value="daughter"
                                                {{ old('profile_created_by_type') == 'daughter' ? 'selected' : '' }}>
                                                Daughter</option>
                                            <option value="brother"
                                                {{ old('profile_created_by_type') == 'brother' ? 'selected' : '' }}>
                                                Brother</option>

                                            <option value="sister"
                                                {{ old('profile_created_by_type') == 'sister' ? 'selected' : '' }}>
                                                Sister</option>

                                            <option value="relative"
                                                {{ old('profile_created_by_type') == 'relative' ? 'selected' : '' }}>
                                                Relative</option>

                                            <option value="other"
                                                {{ old('profile_created_by_type') == 'other' ? 'selected' : '' }}>
                                                Other</option>

                                        </select>
                                        <span class="text-danger">
                                            @error('profile_created_by_type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="refrence_by" class="form-label">Refrence By*</label>
                                        <select class="form-select" data-choices data-choices-search-false id="refrence_by"
                                            name="refrence_by">
                                            <option value="">-Select-</option>
                                            <option value="facebook"
                                                {{ old('refrence_by') == 'facebook' ? 'selected' : '' }}>
                                                Facebook</option>

                                            <option value="instagram"
                                                {{ old('refrence_by') == 'instagram' ? 'selected' : '' }}>
                                                Instagram</option>

                                            <option value="google" {{ old('refrence_by') == 'google' ? 'selected' : '' }}>
                                                Google</option>

                                            <option value="youTube"
                                                {{ old('refrence_by') == 'youTube' ? 'selected' : '' }}>
                                                YouTube</option>

                                        </select>

                                        <span class="text-danger">
                                            @error('refrence_by')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>

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

                    {{-- User Profile Status --}}
                    {{-- <div class="col-lg-4 mt-1">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Profile Status</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="choices-privacy-status-input" class="form-label">Status</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                        id="choices-privacy-status-input" name="profile_status">
                                        <option value="pending" selected>Pending</option>
                                        <option value="verified">Verified</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Account Status</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-0">
                                    <label for="choices-categories-input" class="form-label">Status</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                        id="choices-privacy-status-input" name="account_status">
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>


                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div> --}}

                    {{-- User Personal Details Card --}}
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">User Personal Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender*</label>
                                        <select class="form-select" name="gender" class="form-control">
                                            <option value="">-Select gender-</option>

                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                Male</option>

                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
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
                                            id="user_age" disabled />
                                    </div>

                                    <div class="col-md-2">
                                        <x-form.input name="birth_time" type="time" label="Birth time"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-5">
                                        <x-form.input name="birth_place" label="Birth Place" placeholder="" />
                                    </div>


                                    <div class="col-md-4">
                                        <x-form.input name="height" label="Height" placeholder="5.2 inch" />
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.input name="weight" label="Weight" placeholder="40Kg" />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="complexion" class="form-label">Complexion</label>
                                        <select name="complexion" id="complexion" class="form-select">
                                            <option value="">Select Complexion</option>
                                            <option value="extemely fair skin">Extemely Fair Skin</option>
                                            <option value="fair skin">Fair Skin</option>
                                            <option value="light skin">Light Skin</option>
                                            <option value="medium skin">Medium Skin</option>
                                            <option value="olive skin">Olive Skin</option>
                                            <option value="tan skin">Tan Skin</option>
                                            <option value="brown skin">Brown Skin</option>
                                            <option value="dark skin">Dark Skin</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('complexion')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="education" class="form-label">Education</label>
                                        <select name="education[]" id="education" class="form-select"
                                            multiple="multiple">
                                            <option value="" disabled>Select Education</option>
                                            @foreach ($data['educations'] as $education)
                                                <option value="{{ $education->education_name }}">
                                                    {{ $education->education_name }}</option>
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
                                                <option value="{{ $profe->profession_name }}">
                                                    {{ $profe->profession_name }}
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
                                                <option value="{{ $occu->occupation_name }}">{{ $occu->occupation_name }}
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
                                        <label for="religion" class="form-label">Religion</label>
                                        <select name="religion" id="religion" class="form-select">
                                            <option value="">Select Religion</option>
                                            <option value="Christianity">Christianity</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hinduism">Hinduism</option>
                                            <option value="Buddhism">Buddhism</option>
                                            <option value="Judaism">Judaism</option>
                                            <option value="Sikhism">Sikhism</option>
                                            <option value="Jainism">Jainism</option>
                                            <option value="Shinto">Shinto</option>
                                            <option value="Taoism">Taoism</option>
                                            <option value="Zoroastrianism">Zoroastrianism</option>
                                            <option value="Bahá'í Faith">Bahá'í Faith</option>
                                            <option value="Confucianism">Confucianism</option>
                                            <option value="Atheism">Atheism</option>
                                            <option value="Agnosticism">Agnosticism</option>
                                            <option value="Other">Other</option>
                                        </select>

                                        <span class="text-danger">
                                            @error('religion')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label for="candidate_community" class="form-label">Community</label>
                                        <select name="candidate_community" id="Community" class="form-select">
                                            <option value="">Select Community</option>
                                            <option value="Swetamber">Swetamber</option>
                                            <option value="Digmber">Digmber</option>
                                            <option value="Agrawal">Agrawal</option>
                                            <option value="Khandalwal">Khandalwal</option>
                                            <option value="Vani">Vani</option>
                                            <option value="Other Jain">Other Jain</option>
                                            <option value="Non Jain">Non Jain</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('candidate_community')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-md-3 mt-2">
                                        <x-form.input name="candidate_income" label="Candidate Income" placeholder="" />
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <label for="blood_group" class="form-label">Blood Group</label>
                                        <select name="blood_group" id="blood_group" class="form-select">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        @error('blood_group')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                            <label for="marital_status" class="form-label">Marital Status</label>
                                            <select name="marital_status" id="marital_status" class="form-select">
                                                <option value="">Select Marital Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Engaged">Engaged</option>
                                                <option value="In a Relationship">In a Relationship</option>
                                            </select>
                                            @error('marital_status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                                    {{ $profe->profession_name }}
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
                                                    {{ $profe->profession_name }}
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
                                                {{ old('family_status') == 'nuclear' ? 'selected' : '' }}>
                                                Nuclear</option>

                                            <option value="joint"
                                                {{ old('family_status') == 'joint' ? 'selected' : '' }}>
                                                Joint
                                            </option>

                                            <option value="single parent"
                                                {{ old('family_status') == 'single parent' ? 'selected' : '' }}>Single
                                                Parent
                                            </option>

                                            <option value="step parent"
                                                {{ old('family_status') == 'step parent' ? 'selected' : '' }}>Step Parent
                                            </option>

                                            <option value="grandparent"
                                                {{ old('family_status') == 'grandparent' ? 'selected' : '' }}>Grandparent
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
                                            'Non Jain' => 'Non Jain']"
                                             />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="family_sub_community" class="form-label">Sub Community</label>
                                        <select name="family_sub_community" id="family_sub_community"
                                            class="form-select">
                                            <option value="">Select Sub-Community</option>
                                            <option value="Digmber-Murtipojak">Digmber-Murtipojak</option>
                                            <option value="Digmber-Gumanapati">Digmber-Gumanapati</option>
                                            <option value="Digmber-Taranapati">Digmber-Taranapati</option>
                                            <option value="Digmber-Teranapati">Digmber-Teranapati</option>
                                            <option value="Digmber-Terapanti">Digmber-Terapanti</option>
                                            <option value="Digmber-Torapanti">Digmber-Torapanti</option>
                                            <option value="Digmber-Pancham">Digmber-Pancham</option>
                                            <option value="Digmber-Bisapanti">Digmber-Bisapanti</option>
                                            <option value="Digmber">Digmber</option>
                                            <option value="Swetamber">Swetamber</option>
                                            <option value="Other">Other</option>
                                            <option value="Swetamber-Terapanti">Swetamber-Terapanti</option>
                                            <option value="Swetamber-Murtipojak">Swetamber-Murtipojak</option>
                                            <option value="Swetamber-Stanawasi">Swetamber-Stanawasi</option>
                                            <option value="Swetamber-Derawasi">Swetamber-Derawasi</option>
                                            <option value="Other Jain">Other Jain</option>
                                            <option value="Vani">Vani</option>
                                            <option value="Non Jain">Non Jain</option>

                                        </select>
                                        <span class="text-danger">
                                            @error('family_sub_community')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>


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
                                        <x-form.textarea name="other_family_details" label="Other Family Details"
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
                                            <option value="yes"
                                                {{ old('are_you_manglik') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no" {{ old('are_you_manglik') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>

                                            <option value="don't know"
                                                {{ old('are_you_manglik') == "don't know" ? 'selected' : '' }}>Don't Know
                                            </option>
                                        </select>
                                        @error('are_you_manglik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Id Proof --}}
                                    <div class="row mt-4">

                                        <div class="col-md-3">
                                            <label for="idProof_type" class="form-label">IdProof Type</label>
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
                                            <label for="id_proof">Id Proof</label>
                                            <input type="file" accept="image/*" name="id_proof" id="id_proof"
                                                onchange="loadFile(event, 'output3')" class="form-control">
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
                                        <x-form.input name="partner_age_group_from" type="date" label="from"
                                            placeholder="" />
                                    </div>
                                    <div class="col-md-3">
                                        <x-form.input name="partner_age_group_to" type="date" label="to"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="partner_income" label="Income" placeholder="" />
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="partner_country" class="form-label">Country</label>
                                        <select name="partner_country[]" id="partner_country" class="form-select"
                                            multiple="multiple">
                                            <option value="">Select Country</option>
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
                                                <option value="{{ $education->education_name }}">
                                                    {{ $education->education_name }}
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
                                                <option value="{{ $occupation->occupation_name }}">
                                                    {{ $occupation->occupation_name }}
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
                                                <option value="{{ $profession->profession_name }}">
                                                    {{ $profession->profession_name }}
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
                                        <label for="partner_manglik" class="form-label">Are You Manglik</label>
                                        <select name="partner_manglik" id="partner_manglik" class="form-select">
                                            <option value="">-Select Type-</option>
                                            <option value="yes"
                                                {{ old('partner_manglik') == 'yes' ? 'selected' : '' }}>
                                                Yes</option>

                                            <option value="no"
                                                {{ old('partner_manglik') == 'no' ? 'selected' : '' }}>
                                                No
                                            </option>
                                            <option value="don't know"
                                                {{ old('partner_manglik') == "don't know" ? 'selected' : '' }}>Don't Know
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
                                        <label for="partner_marital_status" class="form-label">Marital Status</label>
                                        <select name="partner_marital_status" id="partner_marital_status"
                                            class="form-select">
                                            <option value="">Select Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Engaged">Engaged</option>
                                            <option value="In a Relationship">In a Relationship</option>
                                        </select>
                                        @error('partner_marital_status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- partner_marital_status hidden inputs  --}}
                                    <div class="row partner_marital_status_detail_div" style="display: none;">
                                        <div class="col-md-4 mt-2">
                                            <label for="partner_acccept_kid" class="form-label">Acccept Kid</label>
                                            <select name="partner_acccept_kid" id="partner_acccept_kid"
                                                class="form-select">
                                                <option value="">-Select Type-</option>
                                                <option value="with kit"
                                                    {{ old('partner_acccept_kid') == 'with kit' ? 'selected' : '' }}>
                                                    With Kit</option>

                                                <option value="without kit"
                                                    {{ old('partner_acccept_kid') == 'without kit' ? 'selected' : '' }}>
                                                    Without Kit
                                                </option>

                                                <option value="any"
                                                    {{ old('partner_acccept_kid') == 'any' ? 'selected' : '' }}>
                                                    Any
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

                <!-- end row -->
                <div class="text-end mb-4">
                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                    <button type="submit" class="btn btn-success w-sm">Register</button>
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

            $('#partner_education').select2();
            $('#partner_occupation').select2();
            $('#partner_profession').select2();

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
@endpush

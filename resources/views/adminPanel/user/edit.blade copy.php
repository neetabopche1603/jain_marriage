@extends('partial.admin.app')
@section('adminTitle', 'Edit User Details')
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

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">User Derails</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-top-home"
                                        role="tab" aria-selected="false">
                                        Basic & Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-profile" role="tab"
                                        aria-selected="false">
                                        Profile Image
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-familyDetails"
                                        role="tab" aria-selected="false">
                                        Family Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-settings" role="tab"
                                        aria-selected="true">
                                        Other Details
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-partner-preference"
                                        role="tab" aria-selected="true">
                                        Partner Preference
                                    </a>
                                </li>



                            </ul>
                            <div class="tab-content text-muted">

                                <div class="tab-pane active" id="nav-border-top-home" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">

                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        {{-- Basic Details --}}
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-title mb-sm-0">User Basic Details</h5>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="profile_created_by_type"
                                                                            class="form-label">Profile For</label>
                                                                        <select class="form-select" data-choices
                                                                            data-choices-search-false
                                                                            id="profile_created_by_type"
                                                                            name="profile_created_by_type">
                                                                            <option value="">-Select-</option>
                                                                            <option value="son">Son</option>
                                                                            <option value="daughter">Daughter</option>
                                                                            <option value="brother">Brother</option>
                                                                            <option value="sister">Sister</option>
                                                                            <option value="relative">Relative</option>
                                                                            <option value="other ">Other</option>
                                                                            </option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('refrence_by')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>

                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="refrence_by" class="form-label">Refrence
                                                                            By</label>
                                                                        <select class="form-select" data-choices
                                                                            data-choices-search-false id="refrence_by"
                                                                            name="refrence_by">
                                                                            <option value="">-Select-</option>
                                                                            <option value="facebook">Facebook</option>
                                                                            <option value="instagram">Instagram </option>
                                                                            <option value="google">Google</option>
                                                                            <option value="youTube ">YouTube</option>
                                                                        </select>

                                                                        <span class="text-danger">
                                                                            @error('refrence_by')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>

                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.input name="whatsapp_no" label="Whatsapp No"
                                                                            placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.input name="email" type="email"
                                                                            label="Email Id" placeholder="" />
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <x-form.input name="password" type="password"
                                                                            label="Password" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.input name="confirm_password"
                                                                            type="password" label="Re-Type Password"
                                                                            placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>

                                                    {{-- User Profile Status --}}
                                                    <div class="col-lg-4 mt-1">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-title mb-0">User Profile Status</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div>
                                                                    <label for="choices-privacy-status-input"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-select" data-choices
                                                                        data-choices-search-false
                                                                        id="choices-privacy-status-input">
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
                                                                    <label for="choices-categories-input"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-select" data-choices
                                                                        data-choices-search-false
                                                                        id="choices-privacy-status-input">
                                                                        <option value="active" selected>Active</option>
                                                                        <option value="inactive">Inactive</option>
                                                                    </select>
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
                                                                <h5 class="card-title mb-sm-0">User Personal Details</h5>
                                                            </div>

                                                            <div class="card-body">
                                                                <form action="" method="post">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="gender"
                                                                            class="form-label">Gender</label>
                                                                        <select class="form-select" name="gender"
                                                                            class="form-control">
                                                                            <option value="">-Select gender-</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                            <option value="other">other</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('gender')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <x-form.input name="name"
                                                                            label="Candidate Name" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <x-form.input name="dob" type="date"
                                                                            label="DOB" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <x-form.input name="age" type="number"
                                                                            label="Age" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <x-form.input name="birth_time" type="time"
                                                                            label="Birth time" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-5">
                                                                        <x-form.input name="birth_place"
                                                                            label="Birth Place" placeholder="" />
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <x-form.input name="height" label="Height"
                                                                            placeholder="5.2 inch" />
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <x-form.input name="weight" label="Weight"
                                                                            placeholder="40Kg" />
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="complexion"
                                                                            class="form-label">Complexion</label>
                                                                        <select name="complexion" id="complexion"
                                                                            class="form-select">
                                                                            <option value="">Select Complexion
                                                                            </option>
                                                                            <option value="extemely fair skin">Extemely
                                                                                Fair Skin</option>
                                                                            <option value="fair skin">Fair Skin</option>
                                                                            <option value="light skin">Light Skin</option>
                                                                            <option value="medium skin">Medium Skin
                                                                            </option>
                                                                            <option value="olive skin">Olive Skin</option>
                                                                            <option value="tan skin">Tan Skin</option>
                                                                            <option value="brown skin">Brown Skin</option>
                                                                            <option value="dark skin">Dark Skin</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('complexion')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="education"
                                                                            class="form-label">Education</label>
                                                                        <select name="education" id="education"
                                                                            class="form-select">
                                                                            <option value="">Select Education
                                                                            </option>
                                                                            <option value="extemely fair skin">B.tech
                                                                            </option>
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
                                                                            class="form-select">
                                                                            <option value="">Select Profession
                                                                            </option>
                                                                            <option value="">BS/w</option>
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
                                                                            class="form-select">
                                                                            <option value="">Select Occupation
                                                                            </option>
                                                                            <option value="">occupation</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('occupation')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="hobbies"
                                                                            class="form-label">Hobbies</label>
                                                                        <select name="hobbies[]" id="hobbies"
                                                                            class="form-select">
                                                                            <option value="">Select hobbies</option>
                                                                            <option value="">occupation</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('hobbies')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <label for="religion"
                                                                            class="form-label">Religion</label>
                                                                        <select name="religion" id="religion"
                                                                            class="form-select">
                                                                            <option value="">Select Religion</option>
                                                                            <option value="Christianity">Christianity
                                                                            </option>
                                                                            <option value="Islam">Islam</option>
                                                                            <option value="Hinduism">Hinduism</option>
                                                                            <option value="Buddhism">Buddhism</option>
                                                                            <option value="Judaism">Judaism</option>
                                                                            <option value="Sikhism">Sikhism</option>
                                                                            <option value="Jainism">Jainism</option>
                                                                            <option value="Shinto">Shinto</option>
                                                                            <option value="Taoism">Taoism</option>
                                                                            <option value="Zoroastrianism">Zoroastrianism
                                                                            </option>
                                                                            <option value="Bahá'í Faith">Bahá'í Faith
                                                                            </option>
                                                                            <option value="Confucianism">Confucianism
                                                                            </option>
                                                                            <option value="Atheism">Atheism</option>
                                                                            <option value="Agnosticism">Agnosticism
                                                                            </option>
                                                                            <option value="Other">Other</option>
                                                                        </select>

                                                                        <span class="text-danger">
                                                                            @error('religion')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="candidate_community"
                                                                            class="form-label">Community</label>
                                                                        <select name="Community" id="Community"
                                                                            class="form-select">
                                                                            <option value="">Select Community
                                                                            </option>
                                                                            <option value="Swetamber">Swetamber</option>
                                                                            <option value="Digmber">Digmber</option>
                                                                            <option value="Agrawal">Agrawal</option>
                                                                            <option value="Khandalwal">Khandalwal</option>
                                                                            <option value="Vani">Vani</option>
                                                                            <option value="Other Jain">Other Jain</option>
                                                                            <option value="Non Jain">Non Jain</option>
                                                                        </select>
                                                                        <span class="text-danger">
                                                                            @error('Community')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </span>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <label for="marital_status"
                                                                            class="form-label">Marital Status</label>
                                                                        <select name="marital_status" id="marital_status"
                                                                            class="form-select">
                                                                            <option value="">Select Marital Status
                                                                            </option>
                                                                            <option value="Single">Single</option>
                                                                            <option value="Married">Married</option>
                                                                            <option value="Divorced">Divorced</option>
                                                                            <option value="Widowed">Widowed</option>
                                                                            <option value="Separated">Separated</option>
                                                                            <option value="Engaged">Engaged</option>
                                                                            <option value="In a Relationship">In a
                                                                                Relationship</option>
                                                                        </select>
                                                                        @error('marital_status')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <x-form.input name="physical_status"
                                                                            label="Physical Status" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="blood_group" class="form-label">Blood
                                                                            Group</label>
                                                                        <select name="blood_group" id="blood_group"
                                                                            class="form-select">
                                                                            <option value="">Select Blood Group
                                                                            </option>
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

                                                                    <div class="col-md-4">
                                                                        <x-form.input name="candidate_income"
                                                                            label="Candidate Income" placeholder="" />
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <x-form.textarea name="candidates_address"
                                                                            label="Candidates Address" placeholder="" />
                                                                    </div>


                                                                    {{-- NRI DETAILS --}}
                                                                    <div class="col-lg-12">
                                                                        <div class="card">

                                                                            <div class="card-header">
                                                                                <h5 class="card-title mb-sm-0">NRI Details
                                                                                </h5>
                                                                            </div>

                                                                            <div class="card-body">

                                                                                {{-- NRI Details --}}
                                                                                <div class="row">
                                                                                    <div class="col-md-12">

                                                                                        <label
                                                                                            for="if_nri">{{ 'If NRI' }}</label>
                                                                                        <div
                                                                                            class="form-check form-check-inline">

                                                                                            <div
                                                                                                class="form-check form-check-inline">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    name="if_nri"
                                                                                                    type="radio"
                                                                                                    id="yes"
                                                                                                    value="yes">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="yes">Yes</label>
                                                                                            </div>

                                                                                            <div
                                                                                                class="form-check form-check-inline">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    name="if_nri"
                                                                                                    type="radio"
                                                                                                    id="no"
                                                                                                    value="no">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="no">No</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="text-danger">
                                                                                            @error('religion')
                                                                                                <div class="text-danger">
                                                                                                    {{ $message }}</div>
                                                                                            @enderror
                                                                                        </span>

                                                                                    </div>

                                                                                    <div class="col-md-3">
                                                                                        <x-form.input name="candidate_visa"
                                                                                            label="Candidate Visa"
                                                                                            placeholder="" />
                                                                                    </div>

                                                                                    <div class="col-md-8">
                                                                                        <x-form.textarea
                                                                                            name="address_nri_citizen"
                                                                                            label="Address(NRI Citizen)"
                                                                                            placeholder="" />
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <!-- end card body -->
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="text-end mb-4">
                                                                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                                    <button type="submit" class="btn btn-success w-sm">Update</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                            <!-- end card body -->

                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane" id="nav-border-top-profile" role="tabpanel">
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
                                </div>


                                {{-- Family Details --}}
                                <div class="tab-pane" id="nav-border-top-familyDetails" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">

                                            <div class="col-lg-12">
                                                <div class="card">

                                                    <div class="card-header">
                                                        <h5 class="card-title mb-sm-0">Family Details</h5>
                                                    </div>

                                                    <div class="card-body">
                                                        <form action="" method="post">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <x-form.input name="father_name" label="Father Name"
                                                                    placeholder="" />
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="father_profession" class="form-label">Father
                                                                    Profession</label>
                                                                <select name="father_profession" id="father_profession"
                                                                    class="form-select">
                                                                    <option value="">Select Profession</option>
                                                                    <option value="">BS/w</option>
                                                                </select>
                                                                <span class="text-danger">
                                                                    @error('father_profession')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <x-form.input name="mother_name" label="Mother Name"
                                                                    placeholder="" />
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="mother_profession" class="form-label">Mother
                                                                    Profession</label>
                                                                <select name="mother_profession" id="mother_profession"
                                                                    class="form-select">
                                                                    <option value="">Select Profession</option>
                                                                    <option value="">BS/w</option>
                                                                </select>
                                                                <span class="text-danger">
                                                                    @error('mother_profession')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="residence_type" class="form-label">Residence
                                                                    Type</label>
                                                                <select name="residence_type" id="residence_type"
                                                                    class="form-select">
                                                                    <option value="">-Select Residence Type-</option>
                                                                    <option value="Apartment"
                                                                        {{ old('residence_type') == 'Apartment' ? 'selected' : '' }}>
                                                                        Apartment</option>
                                                                    <option value="Condominium"
                                                                        {{ old('residence_type') == 'Condominium' ? 'selected' : '' }}>
                                                                        Condominium
                                                                    </option>
                                                                    <option value="House"
                                                                        {{ old('residence_type') == 'House' ? 'selected' : '' }}>
                                                                        House
                                                                    </option>
                                                                    <option value="Townhouse"
                                                                        {{ old('residence_type') == 'Townhouse' ? 'selected' : '' }}>
                                                                        Townhouse</option>
                                                                    <option value="Villa"
                                                                        {{ old('residence_type') == 'Villa' ? 'selected' : '' }}>
                                                                        Villa
                                                                    </option>
                                                                    <option value="Dormitory"
                                                                        {{ old('residence_type') == 'Dormitory' ? 'selected' : '' }}>
                                                                        Dormitory</option>
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
                                                                        {{ old('residence_type') == 'Mobile Home' ? 'selected' : '' }}>
                                                                        Mobile Home
                                                                    </option>
                                                                    <option value="Farmhouse"
                                                                        {{ old('residence_type') == 'Farmhouse' ? 'selected' : '' }}>
                                                                        Farmhouse</option>
                                                                    <option value="Penthouse"
                                                                        {{ old('residence_type') == 'Penthouse' ? 'selected' : '' }}>
                                                                        Penthouse</option>
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
                                                                <x-form.input name="gotra" label="Gotra"
                                                                    placeholder="" />
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label for="family_type" class="form-label">Family
                                                                    Type</label>
                                                                <select name="family_type" id="family_type"
                                                                    class="form-select">
                                                                    <option value="">-Select Type-</option>
                                                                    <option value="nuclear"
                                                                        {{ old('family_status') == 'nuclear' ? 'selected' : '' }}>
                                                                        Nuclear</option>

                                                                    <option value="joint"
                                                                        {{ old('family_status') == 'joint' ? 'selected' : '' }}>
                                                                        Joint
                                                                    </option>

                                                                    <option value="single parent"
                                                                        {{ old('family_status') == 'single parent' ? 'selected' : '' }}>
                                                                        Single Parent
                                                                    </option>

                                                                    <option value="step parent"
                                                                        {{ old('family_status') == 'step parent' ? 'selected' : '' }}>
                                                                        Step Parent
                                                                    </option>

                                                                    <option value="grandparent"
                                                                        {{ old('family_status') == 'grandparent' ? 'selected' : '' }}>
                                                                        Grandparent
                                                                    </option>

                                                                </select>

                                                                @error('family_type')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="col-md-6">
                                                                    <label for="family_status" class="form-label">Family
                                                                        Status</label>
                                                                    <select name="family_status" id="family_status"
                                                                        class="form-select">
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
                                                                            {{ old('family_status') == 'upper class' ? 'selected' : '' }}>
                                                                            Upper Class
                                                                        </option>

                                                                        <option value="rich"
                                                                            {{ old('family_status') == 'rich' ? 'selected' : '' }}>
                                                                            Rich
                                                                        </option>

                                                                    </select>
                                                                    @error('family_status')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>



                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="family_community"
                                                                    class="form-label">Community</label>
                                                                <select name="family_community" id="family_community"
                                                                    class="form-select">
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
                                                                    @error('family_community')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </span>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="family_sub_community" class="form-label">Sub
                                                                    Community</label>
                                                                <select name="family_sub_community"
                                                                    id="family_sub_community" class="form-select">
                                                                    <option value="">Select Sub-Community</option>
                                                                    <option value="Digmber-Murtipojak">Digmber-Murtipojak
                                                                    </option>
                                                                    <option value="Digmber-Gumanapati">Digmber-Gumanapati
                                                                    </option>
                                                                    <option value="Digmber-Taranapati">Digmber-Taranapati
                                                                    </option>
                                                                    <option value="Digmber-Teranapati">Digmber-Teranapati
                                                                    </option>
                                                                    <option value="Digmber-Terapanti">Digmber-Terapanti
                                                                    </option>
                                                                    <option value="Digmber-Torapanti">Digmber-Torapanti
                                                                    </option>
                                                                    <option value="Digmber-Pancham">Digmber-Pancham
                                                                    </option>
                                                                    <option value="Digmber-Bisapanti">Digmber-Bisapanti
                                                                    </option>
                                                                    <option value="Digmber">Digmber</option>
                                                                    <option value="Swetamber">Swetamber</option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="Swetamber-Terapanti">Swetamber-Terapanti
                                                                    </option>
                                                                    <option value="Swetamber-Murtipojak">
                                                                        Swetamber-Murtipojak</option>
                                                                    <option value="Swetamber-Stanawasi">Swetamber-Stanawasi
                                                                    </option>
                                                                    <option value="Swetamber-Derawasi">Swetamber-Derawasi
                                                                    </option>
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

                                                            <div class="col-md-12">
                                                                <x-form.textarea name="family_address"
                                                                    label="Family Address" placeholder="" />
                                                            </div>

                                                            <strong>
                                                                <u>Siblings Details</u>
                                                            </strong>
                                                            <div class="col-md-6">
                                                                <x-form.input name="brother" label="Brother"
                                                                    placeholder="" />
                                                            </div>

                                                            <div class="col-md-6">
                                                                <x-form.input name="sister" label="Sister"
                                                                    placeholder="" />
                                                            </div>

                                                            <div class="col-md-12">
                                                                <x-form.textarea name="other_family_details"
                                                                    label="Other Family Details" placeholder="" />
                                                            </div>

                                                            <div class="col-md-6">
                                                                <x-form.input name="calling_no" type="number"
                                                                    label="Calling No" placeholder="" />
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="are_you_manglik" class="form-label">Are You
                                                                    Manglik</label>
                                                                <select name="are_you_manglik" id="are_you_manglik"
                                                                    class="form-select">
                                                                    <option value="">-Select Type-</option>
                                                                    <option value="yes"
                                                                        {{ old('are_you_manglik') == 'yes' ? 'selected' : '' }}>
                                                                        Yes</option>

                                                                    <option value="no"
                                                                        {{ old('are_you_manglik') == 'no' ? 'selected' : '' }}>
                                                                        No
                                                                    </option>
                                                                </select>
                                                                @error('are_you_manglik')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="text-end mb-4">
                                                            <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                            <button type="submit" class="btn btn-success w-sm">Update</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="nav-border-top-settings" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul
                                            and absorb its power, like the form of a beloved mistress, then I often think
                                            with longing, Oh, would I could describe these conceptions, could impress upon
                                            paper all that is living so full and warm within me, that it might be the.
                                            <div class="mt-2">
                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i
                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

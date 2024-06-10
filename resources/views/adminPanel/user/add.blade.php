@extends('partial.admin.app')
@section('adminTitle', 'Add User Details')
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

            <div class="row">
                <div class="col-lg-8">

                    {{-- Basic Details --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0">User Basic Details</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <label for="profile_created_by_type">{{ 'Create Profile On VCT' }}</label>
                                    <div class="form-check form-check-inline">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="self" value="self">
                                            <label class="form-check-label" for="yes">Self</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="son" value="son">
                                            <label class="form-check-label" for="no">Son</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="daughter" value="daughter">
                                            <label class="form-check-label" for="daughter">Daughter</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="brother" value="brother">
                                            <label class="form-check-label" for="brother">Brother</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="sister" value="sister">
                                            <label class="form-check-label" for="sister">Sister</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="relative" value="relative">
                                            <label class="form-check-label" for="relative">Relative</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="profile_created_by_type" type="radio"
                                                id="other" value="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>

                                    </div>

                                    <span class="text-danger">
                                        @error('religion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>


                                </div>

                                <div class="col-md-12 mt-4">
                                    <x-form.input name="refrence_by" label="Refrence By" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="whatsapp_no" label="Whatsapp No" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="email" type="email" label="Email Id" placeholder="" />
                                </div>


                                <div class="col-md-6">
                                    <x-form.input name="password" type="password" label="Password" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="confirm_password" type="password" label="Re-Type Password"
                                        placeholder="" />
                                </div>

                                {{-- <div class="mb-3">
                                    <x-form.input type="file" name="image" label="Thumbnail Image" />
                                </div> --}}

                            </div>






                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>

                {{-- User Profile Status --}}
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">User Profile Status</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="choices-privacy-status-input" class="form-label">Status</label>
                                <select class="form-select" data-choices data-choices-search-false
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
                                <label for="choices-categories-input" class="form-label">Status</label>
                                <select class="form-select" data-choices data-choices-search-false
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

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" class="form-control">
                                        <option value="">-Select gender-</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">other</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="name" label="Candidate Name" placeholder="" />
                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="dob" type="date" label="DOB" placeholder="" />
                                </div>

                                <div class="col-md-2">
                                    <x-form.input name="age" type="number" label="Age" placeholder="" />
                                </div>

                                <div class="col-md-2">
                                    <x-form.input name="birth_time" label="Birth time" placeholder="" />
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
                                        <option value="fair">Fair</option>
                                        <option value="light">Light</option>
                                        <option value="medium">Medium</option>
                                        <option value="olive">Olive</option>
                                        <option value="tan">Tan</option>
                                        <option value="brown">Brown</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('complexion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="education" label="Education" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="profession" label="Profession" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="occupation" label="Occupation" placeholder="" />
                                </div>


                                <div class="col-md-4">
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

                                <div class="col-md-4">
                                    <x-form.input name="candidate_community" label="Community" placeholder="" />
                                </div>


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

                                <div class="col-md-4">
                                    <x-form.input name="physical_status" label="Physical Status" placeholder="" />
                                </div>

                                <div class="col-md-4">
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

                                <div class="col-md-4">
                                    <x-form.input name="candidate_income" label="Candidate Income" placeholder="" />
                                </div>

                                <div class="col-md-12">
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
                            <h5 class="card-title mb-sm-0">NRI Details</h5>
                        </div>

                        <div class="card-body">

                            {{-- NRI Details --}}
                            <div class="row">
                                <div class="col-md-12">

                                    <label for="if_nri">{{ 'If NRI' }}</label>
                                    <div class="form-check form-check-inline">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="if_nri" type="radio" id="yes"
                                                value="yes">
                                            <label class="form-check-label" for="yes">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="if_nri" type="radio" id="no"
                                                value="no">
                                            <label class="form-check-label" for="no">No</label>
                                        </div>
                                    </div>
                                    <span class="text-danger">
                                        @error('religion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </span>

                                </div>

                                <div class="col-md-3">
                                    <x-form.input name="candidate_visa" label="Candidate Visa" placeholder="" />
                                </div>

                                <div class="col-md-8">
                                    <x-form.textarea name="address_nri_citizen" label="Address(NRI Citizen)"
                                        placeholder="" />
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
                            <h5 class="card-title mb-sm-0">Family Details</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form.input name="father_name" label="Father Name" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="father_profession" label="Father Profession" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="mother_name" label="Mother Name" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="mother_profession" label="Mother Profession" placeholder="" />
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
                                        <option value="House" {{ old('residence_type') == 'House' ? 'selected' : '' }}>
                                            House
                                        </option>
                                        <option value="Townhouse"
                                            {{ old('residence_type') == 'Townhouse' ? 'selected' : '' }}>Townhouse</option>
                                        <option value="Villa" {{ old('residence_type') == 'Villa' ? 'selected' : '' }}>
                                            Villa
                                        </option>
                                        <option value="Dormitory"
                                            {{ old('residence_type') == 'Dormitory' ? 'selected' : '' }}>Dormitory</option>
                                        <option value="Hostel" {{ old('residence_type') == 'Hostel' ? 'selected' : '' }}>
                                            Hostel</option>
                                        <option value="Cottage"
                                            {{ old('residence_type') == 'Cottage' ? 'selected' : '' }}>
                                            Cottage</option>
                                        <option value="Bungalow"
                                            {{ old('residence_type') == 'Bungalow' ? 'selected' : '' }}>
                                            Bungalow</option>
                                        <option value="Studio" {{ old('residence_type') == 'Studio' ? 'selected' : '' }}>
                                            Studio</option>
                                        <option value="Mobile Home"
                                            {{ old('residence_type') == 'Mobile Home' ? 'selected' : '' }}>Mobile Home
                                        </option>
                                        <option value="Farmhouse"
                                            {{ old('residence_type') == 'Farmhouse' ? 'selected' : '' }}>Farmhouse</option>
                                        <option value="Penthouse"
                                            {{ old('residence_type') == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                                        <option value="Mansion"
                                            {{ old('residence_type') == 'Mansion' ? 'selected' : '' }}>
                                            Mansion</option>
                                        <option value="Duplex" {{ old('residence_type') == 'Duplex' ? 'selected' : '' }}>
                                            Duplex</option>
                                        <option value="Shared Accommodation"
                                            {{ old('residence_type') == 'Shared Accommodation' ? 'selected' : '' }}>Shared
                                            Accommodation</option>
                                        <option value="Other" {{ old('residence_type') == 'Other' ? 'selected' : '' }}>
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
                                    <x-form.input name="family_community" label="Community" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <x-form.input name="family_sub_community" label="Sub Community" placeholder="" />
                                </div>

                                <div class="col-md-12">
                                    <x-form.textarea name="family_address" label="Family Address" placeholder="" />
                                </div>

                                <strong>
                                    <ul>Siblings Details</ul>
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
                                    <x-form.input name="calling_no" type="number" label="Calling No" placeholder="" />
                                </div>

                                <div class="col-md-6">
                                    <label for="are_you_manglik" class="form-label">Are You Manglik</label>
                                    <select name="are_you_manglik" id="are_you_manglik" class="form-select">
                                        <option value="">-Select Type-</option>
                                        <option value="yes" {{ old('are_you_manglik') == 'yes' ? 'selected' : '' }}>
                                            Yes</option>

                                        <option value="no" {{ old('are_you_manglik') == 'no' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    @error('are_you_manglik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-8">
                                    <x-form.input name="photo" type="file" label="photo" />
                                </div>

                                <div class="col-md-8">
                                    <x-form.input name="id_proof" type="file" label="Id Proof" />
                                </div>


                                {{-- Patner Preferance Card --}}

                                <div class="col-md-6">
                                    <x-form.input name="partner_age_group_from" type="date" label="from"
                                        placeholder="" />

                                    <x-form.input name="partner_age_group_to" type="date" label="to"
                                        placeholder="" />
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
                            <h5 class="card-title mb-sm-0">Patner Preferance</h5>
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

                                <div class="col-md-4">
                                    <x-form.input name="partner_country" label="Country" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="partner_state" label="State" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="partner_city" label="City" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="partner_education" label="Education" placeholder="" />
                                </div>


                                <div class="col-md-4">
                                    <x-form.input name="partner_occupation" label="Occupation" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <x-form.input name="partner_profession" label="Profession" placeholder="" />
                                </div>

                                <div class="col-md-4">
                                    <label for="partner_manglik" class="form-label">Are You Manglik</label>
                                    <select name="partner_manglik" id="partner_manglik" class="form-select">
                                        <option value="">-Select Type-</option>
                                        <option value="yes" {{ old('partner_manglik') == 'yes' ? 'selected' : '' }}>
                                            Yes</option>

                                        <option value="no" {{ old('partner_manglik') == 'no' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    @error('partner_manglik')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label for="partner_marital_status" class="form-label">Marital Status</label>
                                    <select name="partner_marital_status" id="partner_marital_status" class="form-select">
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

                                <div class="col-md-4">
                                    <label for="astrology_matching" class="form-label">Astrology Matching</label>
                                    <select name="astrology_matching" id="astrology_matching" class="form-select">
                                        <option value="">-Select Type-</option>
                                        <option value="yes" {{ old('astrology_matching') == 'yes' ? 'selected' : '' }}>
                                            Yes</option>

                                        <option value="no" {{ old('astrology_matching') == 'no' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                    @error('astrology_matching')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <x-form.textarea name="expectation_partner_details" label="Expectation Partner Details" placeholder="" />
                                </div>



                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                </div>


                <!-- end card -->
                <div class="text-end mb-4">
                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                    <button type="submit" class="btn btn-success w-sm">Create</button>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


@endsection

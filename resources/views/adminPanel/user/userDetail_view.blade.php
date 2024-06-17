@extends('partial.admin.app')
@section('adminTitle', 'User Profile')

@push('style')
    <style>
        .profile-header {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .profile-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-image {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 767px) {
            .profile-header {
                height: 200px;
            }

            .profile-image {
                width: 120px;
                height: 120px;
                bottom: -30px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Profile Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">User Information</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Profile Header -->
                    <div class="profile-header">
                        <img src="https://www.livelaw.in/h-upload/2020/12/01/750x450_385302-marriage-02.jpg"
                            alt="Cover Image" class="img-fluid">
                        <div class="profile-image">
                            @php
                                $userMedia = App\Models\UsersMedia::where([
                                    'user_id' => $userProfile->id,
                                    'status' => 'front_img',
                                ])->first();
                            @endphp
                            @if (!empty($userMedia))
                                <img src="{{ asset($userMedia->photo) }}" alt="Profile Image" class="img-fluid">
                            @else
                                <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg"
                                    alt="Profile Image" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <!-- End Profile Header -->

                    <!-- Basic & Personal Details Card -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Basic & Personal Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-4">
                                    <p><strong>UserId:</strong> {{ $userProfile->userId ?? '' }}</p>
                                    <p><strong>Profile For:</strong> {{ $userProfile->profile_created_by_type ?? '' }}</p>
                                    <p><strong>Gender:</strong> {{ $userProfile->gender ?? '' }}</p>
                                    <p><strong>Birth Place:</strong> {{ $userProfile->birth_place ?? '' }}</p>
                                    <p><strong>Weight:</strong> {{ $userProfile->weight ?? '' }}</p>
                                    <p><strong>Education:</strong>
                                        {{ collect(json_decode($userProfile->education, true))->map(function ($item) {return ucfirst($item);})->implode(', ') }}
                                    </p>
                                    <p><strong>Community:</strong> {{ ucfirst($userProfile->candidate_community) ?? '' }}
                                    </p>
                                    <p><strong>Marital Status:</strong> {{ ucfirst($userProfile->marital_status) ?? '' }}
                                    </p>
                                </div>


                                <div class="col-md-4">
                                    <p><strong>Name:</strong> {{ $userProfile->name ?? '' }}</p>
                                    <p><strong>Reference By:</strong> {{ $userProfile->refrence_by ?? '' }}</p>
                                    <p><strong>DOB:</strong> {{ \Carbon\Carbon::parse($userProfile->dob)->format('d-M-Y') }}
                                    </p>
                                    <p><strong>Birth Time:</strong> {{ isset($userProfile->birth_time) ? \Carbon\Carbon::createFromFormat('H:i', $userProfile->birth_time)->format('g:i A') : '' }}</p>

                                    <p><strong>Height:</strong> {{ $userProfile->height ?? '' }}</p>
                                    <p><strong>Profession:</strong> {{ ucfirst($userProfile->profession) ?? '' }}</p>
                                    <p><strong>Candidate Income:</strong>
                                        {{ ucfirst($userProfile->candidate_income) ?? '' }}</p>
                                    <p><strong>Do you have children:</strong>
                                        {{ ucfirst($userProfile->is_children) ?? '' }}</p>
                                </div>

                                <div class="col-md-4">
                                    <p><strong>Email:</strong> {{ $userProfile->email ?? '' }}</p>
                                    <p><strong>Phone:</strong> {{ $userProfile->whatsapp_no ?? '' }}</p>
                                    <p><strong>Age:</strong> {{ $userProfile->age ?? '' }}</p>
                                    <p><strong>Complexion:</strong> {{ ucfirst($userProfile->complexion) ?? '' }}</p>
                                    <p><strong>Religion:</strong> {{ ucfirst($userProfile->religion) ?? '' }}</p>
                                    <p><strong>Occupation:</strong> {{ ucfirst($userProfile->occupation) ?? '' }}</p>
                                    <p><strong>Blood Group:</strong> {{ ucfirst($userProfile->blood_group) ?? '' }}</p>

                                </div>



                                <div class="col-md-12">
                                    <p><strong>Daughter Details:</strong>
                                        {{ ucfirst($userProfile->daughter_details) ?? '' }}</p>

                                    <p><strong>Son Details:</strong> {{ ucfirst($userProfile->son_details) ?? '' }}</p>
                                </div>

                                <div class="col-md-12">
                                    <p><strong>Physical Status:</strong> {{ ucfirst($userProfile->physical_status) ?? '' }}
                                    </p>

                                    <p><strong>Physical Status Desciption:</strong>
                                        {{ ucfirst($userProfile->physical_status_desc) ?? '' }}</p>

                                    <p><strong>Candidates Address:</strong>
                                        {{ ucfirst($userProfile->candidates_address) ?? '' }}</p>
                                </div>


                            </div>


                        </div>
                        <!-- End Basic & Personal Details Card -->
                    </div>

                    <!-- Family Details Card -->
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Family Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>If NRI:</strong> {{ ucfirst($userProfile->userDetail?->if_nri) ?? '' }}
                                    </p>
                                    <p><strong>Father Name:</strong>
                                        {{ ucfirst($userProfile->userDetail?->father_name) ?? '' }}</p>
                                    <p><strong>Mother Name:</strong>
                                        {{ ucfirst($userProfile->userDetail?->mother_name) ?? '' }}</p>
                                    <p><strong>Community:</strong>
                                        {{ $userProfile->userDetail?->family_community ?? '' }}
                                    </p>

                                    <p><strong>Calling No:</strong> {{ $userProfile->userDetail?->calling_no ?? '' }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Candidate Visa:</strong>
                                        {{ ucfirst($userProfile->userDetail?->candidate_visa) ?? '' }}</p>
                                    <p><strong>Father Profession:</strong>
                                        {{ ucfirst($userProfile->userDetail?->father_profession) ?? '' }}</p>
                                    <p><strong>Mother Profession:</strong>
                                        {{ ucfirst($userProfile->userDetail?->mother_profession) ?? '' }}</p>
                                    <p><strong>Sub Community:</strong>
                                        {{ $userProfile->userDetail?->family_sub_community ?? '' }}</p>
                                    <p><strong>Are You Manglik:</strong>
                                        {{ ucfirst($userProfile->userDetail?->are_you_manglik) ?? '' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Address(NRI Citizen):</strong>
                                        {{ ucfirst($userProfile->userDetail?->address_nri_citizen) ?? '' }}</p>
                                    <p><strong>Family Type:</strong>
                                        {{ ucfirst($userProfile->userDetail?->family_type) ?? '' }}</p>
                                    <p><strong>Family Status:</strong>
                                        {{ ucfirst($userProfile->userDetail?->family_status) ?? '' }}</p>
                                </div>


                                <div class="col-md-12">
                                    <p><strong class="text-primary"><u>Siblings:</u></strong> <strong>Brothers:</strong>
                                        {{ $userProfile->userDetail?->brother ?? '' }}, <strong>Sisters:</strong>
                                        {{ $userProfile->userDetail?->sister ?? '' }}</p>

                                    <p><strong>Family Address:</strong>
                                        {{ $userProfile->userDetail?->family_address ?? '' }}
                                    </p>

                                    <p><strong>Family Business Details:</strong>
                                        {{ $userProfile->userDetail?->other_family_details ?? '' }}
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p><strong>ID Proof Type:</strong> {{ ucfirst($userProfile->idProof_type) ?? '' }}
                                    </p>
                                </div>

                                <div class="col-md-8">
                                    <p><strong>ID Proof:</strong> <a href="{{ asset($userProfile->id_proof) }}" target="_blank"><img src="{{ asset($userProfile->id_proof) }}"
                                        alt="" width="80"></a></p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- End Family Details Card -->

                    <!-- Partner Preference Card -->
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Partner Preference</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Age Group:</strong> <strong>From:</strong>
                                        {{ $userProfile->userDetail?->partner_age_group_from ?? '' }},
                                        <strong>To:</strong>
                                        {{ $userProfile->userDetail?->partner_age_group_to ?? '' }}
                                    </p>

                                    <p><strong>Country:</strong>
                                        {{
                                            $userProfile->userDetail ?
                                            collect(json_decode($userProfile->userDetail?->partner_country, true))
                                                ->map(function ($item) {
                                                    // Check if $item is "0", then return "ANY", otherwise ucfirst($item)
                                                    return getCountyNameUsingId($item);
                                                })
                                                ->implode(', ')
                                            :
                                            'ANY'
                                        }}
                                    </p>


                                    <p><strong>Education:</strong>
                                        {{ collect(json_decode($userProfile->userDetail?->partner_education, true))->map(function ($item) {return ucfirst($item);})->implode(', ') }}
                                    </p>

                                    <p><strong>Astrology Matching:</strong>
                                        {{ ucfirst($userProfile->userDetail?->astrology_matching) ?? '' }}</p>
                                </div>


                                <div class="col-md-4">
                                    <p><strong>Income:</strong> {{ $userProfile->userDetail?->partner_income ?? '' }}
                                    </p>
                                    <p><strong>State:</strong>
                                        {{
                                            $userProfile->userDetail ?
                                            collect(json_decode($userProfile->userDetail->partner_state, true))
                                                ->map(function ($item) {
                                                    // Check if $item is "0", then return "ANY", otherwise ucfirst($item)
                                                    return getStateNameUsingId($item);
                                                })
                                                ->implode(', ')
                                            :
                                            'ANY'
                                        }}

                                    </p>

                                    <p><strong>Occupation:</strong>
                                        {{ collect(json_decode($userProfile->userDetail?->partner_occupation, true))->map(function ($item) {return ucfirst($item);})->implode(', ') }}
                                    </p>

                                    <p><strong>Marital Status:</strong>
                                        {{ ucfirst($userProfile->userDetail?->partner_marital_status) ?? '' }}</p>
                                </div>



                                <div class="col-md-4">
                                    <p><strong>Manglik:</strong>{{ ucfirst($userProfile->userDetail?->partner_manglik) ?? '' }}
                                    </p>
                                    <p><strong>City:</strong>
                                        {{
                                            $userProfile->userDetail ?
                                            collect(json_decode($userProfile->userDetail->partner_city, true))
                                                ->map(function ($item) {
                                                    return getCityNameUsingId($item);
                                                })
                                                ->implode(', ')
                                            :
                                            'ANY'
                                        }}

                                    </p>

                                    <p><strong>Profession:</strong>
                                        {{ collect(json_decode($userProfile->userDetail?->partner_profession, true))->map(function ($item) {return ucfirst($item);})->implode(', ') }}
                                    </p>

                                    <p><strong>Accept Kid:</strong>
                                        {{ ucfirst($userProfile->userDetail?->partner_acccept_kid) ?? '' }}</p>
                                </div>

                                <div class="col-md-12">

                                    <p><strong>Kid Description:</strong>
                                        {{ ucfirst($userProfile->userDetail?->partner_kid_discription) ?? 'No Kid Description' }}
                                    </p>

                                    <p><strong>Expectation Partner Details:</strong>
                                        {{ ucfirst($userProfile->userDetail?->expectation_partner_details) ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Partner Preference Card -->

                </div>

            </div>
        </div>

    @endsection

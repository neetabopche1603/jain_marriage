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

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Profile Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Information</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-8 offset-md-2">
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
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Basic & Personal Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <p><strong>UserId:</strong> {{ $userProfile->userId ?? ''}}</p>
                                    <p><strong>Name:</strong> {{ $userProfile->name ?? '' }}</p>
                                    <p><strong>Email:</strong> {{ $userProfile->email ?? ''}}</p>
                                    <p><strong>Phone:</strong> {{ $userProfile->whatsapp_no ?? ''}}</p>
                                    <p><strong>Gender:</strong> {{$userProfile->gender ?? '' }}</p>
                                    <p><strong>DOB:</strong> {{$userProfile->dob ?? '' }}</p>
                                    <p><strong>Age:</strong> {{$userProfile->age ?? '' }}</p>
                                    <p><strong>Birth Time:</strong> {{$userProfile->birth_time ?? '' }}</p>
                                    <p><strong>Birth Place:</strong> {{$userProfile->birth_place ?? '' }}</p>
                                    <p><strong>Height:</strong> {{$userProfile->height ?? '' }}</p>
                                    <p><strong>Weight:</strong> {{$userProfile->weight ?? '' }}</p>
                                    <p><strong>Complexion:</strong> {{ucfirst($userProfile->complexion) ?? '' }}</p>
                                    <p><strong>Candidates Address:</strong> {{ucfirst($userProfile->candidates_address) ?? '' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <p><strong>Profile For:</strong> {{ $userProfile->profile_created_by_type ?? '' }}</p>
                                    <p><strong>Reference By:</strong> {{$userProfile->refrence_by ?? '' }}</p>
                                    <p><strong>Education:</strong>
                                        {{ collect(json_decode($userProfile->education, true))->map(function ($item) { return ucfirst($item); })->implode(', ') }}
                                    </p>

                                    <p><strong>Profession:</strong> {{ ucfirst($userProfile->profession) ?? '' }}</p>
                                    <p><strong>Occupation:</strong> {{ ucfirst($userProfile->occupation) ?? '' }}</p>
                                    <p><strong>Religion:</strong> {{ ucfirst($userProfile->religion) ?? '' }}</p>
                                    <p><strong>Community:</strong> {{ ucfirst($userProfile->candidate_community) ?? '' }}</p>

                                    <p><strong>Candidate Income:</strong> {{ ucfirst($userProfile->candidate_income) ?? '' }}</p>

                                    <p><strong>Candidate Income:</strong> {{ ucfirst($userProfile->candidate_income) ?? '' }}</p>
                                    <p><strong>Blood Group:</strong> {{ ucfirst($userProfile->blood_group) ?? '' }}</p>
                                    <p><strong>Physical Status:</strong> {{ucfirst($userProfile->physical_status)?? '' }}</p>
                                    <p><strong>Physical Status Desciption:</strong> {{ucfirst($userProfile->physical_status_desc) ?? '' }}</p>

                                    <p><strong>Marital Status:</strong> {{ucfirst($userProfile->marital_status) ?? '' }}</p>

                                    <p><strong>Do you have childern:</strong> {{ucfirst($userProfile->is_children) ?? '' }}</p>

                                    <p><strong>Son Details:</strong> {{ucfirst($userProfile->son_details) ?? '' }}</p>

                                    <p><strong>Daughter Details:</strong> {{ucfirst($userProfile->daughter_details) ?? '' }}</p>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Family Details</h5>
                        </div>
                        <div class="card-body">
                            {{-- <h5 class="card-title">Family Details</h5> --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>If NRI:</strong> {{ucfirst($userProfile->userDetail->if_nri) ?? '' }}</p>

                                    <p><strong>Father Name:</strong> {{ucfirst($userProfile->userDetail->father_name) ?? '' }}</p>

                                    <p><strong>Mother Name:</strong> {{ucfirst($userProfile->userDetail->father_name) ?? '' }}</p>

                                </div>


                                <div class="col-md-4">
                                    <p><strong>Candidate Visa:</strong> {{ucfirst($userProfile->userDetail->candidate_visa) ?? '' }}</p>
                                    <p><strong>Father Profession:</strong> {{ucfirst($userProfile->userDetail->father_profession) ?? '' }}</p>

                                    <p><strong>Mother Profession:</strong> {{ucfirst($userProfile->userDetail->mother_profession) ?? '' }}</p>
                                    
                                </div>


                                <div class="col-md-4">
                                    <p><strong>Address(NRI Citizen):</strong> {{ucfirst($userProfile->userDetail->address_nri_citizen) ?? '' }}</p>
                                    <p><strong>Family Type:</strong> {{ucfirst($userProfile->userDetail->family_type) ?? '' }}</p>
                                    <p><strong>Family Status:</strong> {{ucfirst($userProfile->userDetail->family_status) ?? '' }}</p>

                                </div>
                            </div>

                            <p><strong>Father's Name:</strong> Michael Doe</p>
                            <p><strong>Father's Name:</strong> Michael Doe</p>
                            <p><strong>Father's Name:</strong> Michael Doe</p>
                            <p><strong>Mother's Name:</strong> Jane Doe</p>
                            <p><strong>Siblings:</strong> 2 brothers, 1 sister</p>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-sm-0 text-primary">Partner Preference</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Age:</strong> 25-30</p>
                            <p><strong>Height:</strong> 5'5" - 5'9"</p>
                            <p><strong>Religion:</strong> Christian</p>
                            <p><strong>Education:</strong> Bachelor's Degree</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

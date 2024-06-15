@extends('partial.admin.app')
@section('adminTitle', 'Edit Document')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
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
                    <h5 class="mb-3">Update User Document Derails</h5>
                    <div class="card">
                        <div class="card-body">

                            @include('adminPanel.user.tablist')

                            <div class="tab-content text-muted">

                                {{-- Document and Update status --}}
                                <div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">

                                            <div class="col-lg-12">
                                                <div class="card">

                                                    <div class="card-header">
                                                        <h5 class="card-title mb-sm-0">Verify Document & Upload</h5>
                                                    </div>

                                                    <div class="card-body">

                                                        <div class="row">

                                                            {{-- Update Id Proof Start --}}
                                                            <div class="col-lg-8 mt-1">

                                                                <form action="{{ route('admin.userDocumentUpdate') }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $usersEdit->id }}">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 mt-lg-4 text-center">
                                                                            @if (!empty($usersEdit->id_proof))
                                                                            <a href="{{ asset($usersEdit->id_proof) }}" class="image-popup">
                                                                                <img src="{{ asset($usersEdit->id_proof) }}"
                                                                                    alt="idproof" width="300"
                                                                                    height="200" id="current-idproof">
                                                                            </a>
                                                                            @else
                                                                                <strong class="text-primary">No
                                                                                    File</strong>
                                                                            @endif
                                                                        </div>

                                                                        <hr>

                                                                        <div class="col-lg-7 mt-lg-4 ">
                                                                            <x-form.select name="idProof_type"
                                                                                label="Id Proof Type" :options="[
                                                                                    'adhar_card' => 'Adhar Card',
                                                                                    'pan_card' => 'Pan Card',
                                                                                    'voter_id' => 'Voter Id',
                                                                                    'driving_licence' =>
                                                                                        'Driving Licence',
                                                                                    'covid' => 'Covid',
                                                                                    'ayushman' => 'Ayushman',
                                                                                    'religion_id' => 'Religion Id',
                                                                                ]"
                                                                                :selected="$usersEdit->idProof_type" required />
                                                                        </div>

                                                                        <div class="col-lg-7 mt-lg-4 ">
                                                                            <label for="id_proof">Id Proof Upload</label>

                                                                            <input type="file" name="id_proof"
                                                                                accept="image/*"
                                                                                onchange="loadFile(event, 'new-idproof')"
                                                                                class="form-control" />
                                                                        </div>

                                                                        <div class="col-lg-4 mt-lg-4 ">
                                                                            <img id="new-idproof" width="70"
                                                                                height="70" style="display:none;">
                                                                        </div>

                                                                        <div class="text-center mb-4 col-lg-7 mt-lg-4">
                                                                            <button type="submit"
                                                                                class="btn btn-success w-sm">Document Upload
                                                                                & Update</button>
                                                                        </div>

                                                                    </div>

                                                                </form>
                                                            </div>
                                                            {{-- Update Id Proof End --}}


                                                            <div class="col-lg-4 mt-2">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title mb-0">User Document
                                                                            Verification Status
                                                                        </h5>
                                                                    </div>

                                                                    <form
                                                                        action="{{ route('admin.userVerificationDocStatusUpdate') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $usersEdit->id }}">

                                                                        <div class="card-body">
                                                                            <div>
                                                                                <x-form.select name="profile_status"
                                                                                    id="profile_status"
                                                                                    label="Document Verify Status"
                                                                                    :options="[
                                                                                        'pending' => 'Pending',
                                                                                        'verified' => 'Verified',
                                                                                        'rejected' => 'Rejected',
                                                                                    ]" :selected="$usersEdit->profile_status"
                                                                                    required />
                                                                            </div>


                                                                            <div id="rejected-reason-container"
                                                                                style="display: none;">
                                                                                <x-form.textarea
                                                                                    name="profile_rejected_reason"
                                                                                    id="profile_rejected_reason"
                                                                                    label="Profile Rejected Reason"
                                                                                    value="{{ $usersEdit->profile_rejected_reason }}"
                                                                                    placeholder="" />
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-warning w-sm">Verify
                                                                                Status</button>

                                                                        </div>

                                                                    </form>
                                                                    <!-- end card body -->
                                                                </div>
                                                                <!-- end card -->

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title mb-0">User Account Status
                                                                        </h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form
                                                                            action="{{ route('admin.userAccountStatusUpdate') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ $usersEdit->id }}">


                                                                            <div class="mb-0">
                                                                                <div>
                                                                                    <x-form.select name="account_status"
                                                                                        label=" User Account Status"
                                                                                        :options="[
                                                                                            'active' => 'Active',
                                                                                            'inactive' => 'Inactive',
                                                                                        ]" :selected="$usersEdit->account_status"
                                                                                        required />
                                                                                </div>

                                                                                <button type="submit"
                                                                                    class="btn btn-danger w-sm">Update
                                                                                    Account Status</button>
                                                                            </div>

                                                                        </form>

                                                                    </div>
                                                                    <!-- end card body -->
                                                                </div>
                                                                <!-- end card -->

                                                            </div>



                                                        </div>


                                                    </div>
                                                    <!-- end card body -->
                                                </div>
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


@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    {{-- Image Preview Script --}}
    <script>
        function loadFile(event, outputId) {
            var output = document.getElementById(outputId);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = 'block';
            output.onload = function() {
                URL.revokeObjectURL(output.src); // Free up memory
            };
        }
    </script>

    <script>
        $(document).ready(function() {

            // Image PopUP
            $('.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });


            let profileStatus = $('#profile_status');
            let rejectedReasonContainer = $('#rejected-reason-container');

            // Show hide div
            $(profileStatus).on("change", function(e) {
                e.preventDefault()
                if ($(this).val() == "rejected") {
                    rejectedReasonContainer.show();
                } else {
                    rejectedReasonContainer.hide();
                }
            })

            if (profileStatus.val() === 'rejected') {
                rejectedReasonContainer.show();
            } else {
                rejectedReasonContainer.hide();
            }

        });
    </script>
@endpush

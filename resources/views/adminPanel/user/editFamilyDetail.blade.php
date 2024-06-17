@extends('partial.admin.app')
@section('adminTitle', 'Edit User Family Details')

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
                    <h5 class="mb-3">Update User Family Derails</h5>
                    <div class="card">
                        <div class="card-body">

                           @include('adminPanel.user.tablist')
                            <div class="tab-content text-muted">

                                {{-- Family Details --}}
                                <div >
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

                                                        <form method="POST"
                                                            action="{{ route('admin.userFamilyDetailsUpdate') }}">
                                                            @csrf

                                                            <input type="hidden" name="user_id"
                                                                value="{{ $usersEdit->userDetail->user_id }}">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <x-form.input name="father_name" label="Father Name"
                                                                        value="{{ $usersEdit->userDetail->father_name }}"
                                                                        placeholder="" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="father_profession"
                                                                        class="form-label">Father Profession</label>
                                                                    <select name="father_profession"
                                                                        id="father_profession" class="form-select">
                                                                        <option value="">-Select Profession-</option>
                                                                        @foreach ($data['professions'] as $profe)
                                                                            <option value="{{ $profe->profession_name }}"
                                                                                {{ old('father_profession', $usersEdit->userDetail->father_profession) == $profe->profession_name ? 'selected' : '' }}>
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
                                                                    <x-form.input name="mother_name" label="Mother Name"
                                                                        value="{{ $usersEdit->userDetail->mother_name }}"
                                                                        placeholder="" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="mother_profession"
                                                                        class="form-label">Mother Profession</label>
                                                                    <select name="mother_profession"
                                                                        id="mother_profession" class="form-select">
                                                                        <option value="">-Select Profession-</option>
                                                                        @foreach ($data['professions'] as $profe)
                                                                            <option value="{{ $profe->profession_name }}"
                                                                                {{ old('mother_profession', $usersEdit->userDetail->mother_profession) == $profe->profession_name ? 'selected' : '' }}>
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
                                                                    <label for="residence_type"
                                                                        class="form-label">Residence Type</label>
                                                                    <select name="residence_type" id="residence_type"
                                                                        class="form-select">
                                                                        <option value="">-Select Residence Type-
                                                                        </option>
                                                                        <option value="apartment"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'apartment' ? 'selected' : '' }}>
                                                                            Apartment
                                                                        </option>
                                                                        <option value="condominium"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'condominium' ? 'selected' : '' }}>
                                                                            Condominium
                                                                        </option>
                                                                        <option value="house"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'house' ? 'selected' : '' }}>
                                                                            House
                                                                        </option>
                                                                        <option value="townhouse"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'townhouse' ? 'selected' : '' }}>
                                                                            Townhouse
                                                                        </option>
                                                                        <option value="villa"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'villa' ? 'selected' : '' }}>
                                                                            Villa
                                                                        </option>
                                                                        <option value="dormitory"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'dormitory' ? 'selected' : '' }}>
                                                                            Dormitory
                                                                        </option>
                                                                        <option value="hostel"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'hostel' ? 'selected' : '' }}>
                                                                            Hostel
                                                                        </option>
                                                                        <option value="cottage"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'cottage' ? 'selected' : '' }}>
                                                                            Cottage
                                                                        </option>
                                                                        <option value="bungalow"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'bungalow' ? 'selected' : '' }}>
                                                                            Bungalow
                                                                        </option>
                                                                        <option value="studio"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'studio' ? 'selected' : '' }}>
                                                                            Studio
                                                                        </option>
                                                                        <option value="mobile home"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'mobile home' ? 'selected' : '' }}>
                                                                            Mobile Home
                                                                        </option>
                                                                        <option value="farmhouse"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'farmhouse' ? 'selected' : '' }}>
                                                                            Farmhouse
                                                                        </option>
                                                                        <option value="penthouse"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'penthouse' ? 'selected' : '' }}>
                                                                            Penthouse
                                                                        </option>
                                                                        <option value="mansion"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'mansion' ? 'selected' : '' }}>
                                                                            Mansion
                                                                        </option>
                                                                        <option value="duplex"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'duplex' ? 'selected' : '' }}>
                                                                            Duplex
                                                                        </option>
                                                                        <option value="shared accommodation"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'shared accommodation' ? 'selected' : '' }}>
                                                                            Shared Accommodation
                                                                        </option>
                                                                        <option value="other"
                                                                            {{ strtolower(old('residence_type', $usersEdit->userDetail->residence_type)) == 'other' ? 'selected' : '' }}>
                                                                            Other
                                                                        </option>
                                                                    </select>
                                                                    @error('residence_type')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <x-form.input name="gotra" label="Gotra"
                                                                        placeholder=""
                                                                        value="{{ $usersEdit->userDetail->gotra }}" />
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <x-form.select name="family_type" label="Family Type"
                                                                        :options="[
                                                                            'nuclear' => 'Nuclear',
                                                                            'joint' => 'Joint',
                                                                            'single parent' => 'Single Parent',
                                                                            'step parent' => 'Step Parent',
                                                                            'grandparent' => 'Grandparent',
                                                                        ]" :selected="$usersEdit->userDetail->family_type" />
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <x-form.select name="family_status"
                                                                        label="Family Status" :options="[
                                                                            'middle class' => 'Middle Class',
                                                                            'upper middle class' =>
                                                                                'Upper Middle Class',
                                                                            'upper class' => 'Upper Class',
                                                                            'rich' => 'Rich',
                                                                        ]"
                                                                        :selected="$usersEdit->userDetail
                                                                            ->family_status" />
                                                                </div>


                                                                <div class="col-md-6 mt-2">
                                                                    <x-form.select name="family_community"
                                                                        label="Community" :options="[
                                                                            'Swetamber' => 'Swetamber',
                                                                            'Digmber' => 'Digmber',
                                                                            'Agrawal' => 'Agrawal',
                                                                            'Khandalwal' => 'Khandalwal',
                                                                            'Vani' => 'Vani',
                                                                            'Other Jain' => 'Other Jain',
                                                                            'Non Jain' => 'Non Jain',
                                                                        ]"
                                                                        :selected="$usersEdit->userDetail
                                                                            ->family_community" required />
                                                                </div>


                                                                <div class="col-md-6 mt-2">

                                                                    <x-form.select name="family_sub_community"
                                                                        label="Sub Community" :options="[
                                                                            'Digmber-Murtipojak' =>
                                                                                'Digmber-Murtipojak',
                                                                            'Digmber-Gumanapati' =>
                                                                                'Digmber-Gumanapati',
                                                                            'Digmber-Taranapati' =>
                                                                                'Digmber-Taranapati',
                                                                            'Digmber-Teranapati' =>
                                                                                'Digmber-Teranapati',
                                                                            'Digmber-Terapanti' => 'Digmber-Terapanti',
                                                                            'Digmber-Torapanti' => 'Digmber-Torapanti',
                                                                            'Digmber-Pancham' => 'Digmber-Pancham',
                                                                            'Digmber-Bisapanti' => 'Digmber-Bisapanti',
                                                                            'Digmber' => 'Digmber',
                                                                            'Swetamber' => 'Swetamber',
                                                                            'Other' => 'Other',
                                                                            'Swetamber-Terapanti' =>
                                                                                'Swetamber-Terapanti',
                                                                            'Swetamber-Murtipojak' =>
                                                                                'Swetamber-Murtipojak',
                                                                            'Swetamber-Stanawasi' =>
                                                                                'Swetamber-Stanawasi',
                                                                            'Swetamber-Derawasi' =>
                                                                                'Swetamber-Derawasi',
                                                                            'Other Jain' => 'Other Jain',
                                                                            'Vani' => 'Vani',
                                                                            'Non Jain' => 'Non Jain',
                                                                        ]"
                                                                        :selected="$usersEdit->userDetail
                                                                            ->family_sub_community" required />

                                                                </div>

                                                                <div class="col-md-12 mt-2">
                                                                    <x-form.textarea name="family_address"
                                                                        label="Family Address" placeholder=""
                                                                        value="{{ $usersEdit->userDetail->family_address }}" />
                                                                </div>

                                                                <strong>
                                                                    <u>Siblings Details</u>
                                                                </strong>

                                                                <div class="col-md-6">
                                                                    <x-form.input name="brother" label="Brother"
                                                                        placeholder=""
                                                                        value="{{ $usersEdit->userDetail->brother }}" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <x-form.input name="sister" label="Sister"
                                                                        placeholder=""
                                                                        value="{{ $usersEdit->userDetail->sister }}" />
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <x-form.textarea name="other_family_details"
                                                                        label="Family Business Details" placeholder=""
                                                                        value="{{ $usersEdit->userDetail->other_family_details }}" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <x-form.input name="calling_no" type="number"
                                                                        value="{{ $usersEdit->userDetail->calling_no }}"
                                                                        label="Calling No" placeholder="" />
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <x-form.select name="are_you_manglik"
                                                                        label="Are You Manglik" :options="[
                                                                            'any' => 'Any',
                                                                            'yes' => 'Yes',
                                                                            'no' => 'No',
                                                                        ]"
                                                                        :selected="$usersEdit->userDetail
                                                                            ->are_you_manglik" required />
                                                                </div>


                                                            </div>


                                                            <div class="text-end mb-4">
                                                                <button type="reset"
                                                                    class="btn btn-danger w-sm">Reset</button>
                                                                <button type="submit" class="btn btn-success w-sm">Update
                                                                    Family Details</button>
                                                            </div>

                                                        </form>
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

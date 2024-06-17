@extends('partial.admin.app')
@section('adminTitle', 'Edit User Partner Preference Details')

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
                    <h5 class="mb-3">Update Partner Preference Derails</h5>
                    <div class="card">
                        <div class="card-body">

                           @include('adminPanel.user.tablist')
                            <div class="tab-content text-muted">



                                {{-- Partner Preference --}}
                                <div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <form action="{{ route('admin.userPartnerPreferenceDetailsUpdate') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="user_id"
                                                    value="{{ $usersEdit->userDetail->user_id }}">

                                                <div class="row">

                                                    <strong>Age Group</strong>

                                                    <div class="col-md-3">
                                                        <label for="partner_age_group_from"
                                                            class="form-label">From</label>
                                                        <select name="partner_age_group_from" id="partner_age_group_from"
                                                            class="form-select select2Option">
                                                            <option value="">Select Age</option>
                                                            @for ($age = 18; $age <= 75; $age++)
                                                                <option value="{{ $age }}"
                                                                    {{ old('partner_age_group_from', $usersEdit->userDetail->partner_age_group_from) == $age ? 'selected' : '' }}>
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
                                                            class="form-select select2Option">
                                                            <option value="">Select Age</option>
                                                            @for ($age = 18; $age <= 75; $age++)
                                                                <option value="{{ $age }}"
                                                                    {{ old('partner_age_group_to', $usersEdit->userDetail->partner_age_group_to) == $age ? 'selected' : '' }}>
                                                                    {{ $age }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        @error('partner_age_group_to')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">
                                                        <x-form.select name="partner_income" label="Income" :selectClass="'select2Option'"
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
                                                            ]" :selected="$usersEdit->userDetail->partner_income ??
                                                                old('partner_income')" required />

                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <label for="partner_country" class="form-label">Country</label>
                                                        <select name="partner_country[]" id="partner_country"
                                                            class="form-select select2Option"
                                                            multiple="multiple">
                                                            <option value="">Select Country</option>

                                                            @php
                                                                $selectedCountries = json_decode(
                                                                    $usersEdit->userDetail->partner_country,
                                                                    true,
                                                                );
                                                                $selectAny = in_array('0', $selectedCountries ?? []);
                                                            @endphp

                                                            <option value='0' {{ $selectAny ? 'selected' : '' }}>Any
                                                            </option>

                                                            @foreach ($data['countries'] as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ in_array($country->id, old('partner_country', $selectedCountries ?? [])) ? 'selected' : '' }}>
                                                                    {{ strtoupper($country->name) }}
                                                                </option>
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
                                                        <select name="partner_state[]" id="partner_state"
                                                            class="form-select select2Option"
                                                            multiple="multiple">
                                                            <option value="">Select State</option>

                                                            @php
                                                                $selectedStates = json_decode(
                                                                    $usersEdit->userDetail->partner_state,
                                                                    true,
                                                                );
                                                                $selectAnyState = in_array('0', $selectedStates ?? []);
                                                            @endphp

                                                            <option value="0"
                                                                {{ $selectAnyState ? 'selected' : '' }}>Any</option>

                                                            @foreach ($data['states'] as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ in_array($state->id, old('partner_state', $selectedStates ?? [])) ? 'selected' : '' }}>
                                                                    {{ strtoupper($state->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">
                                                            @error('partner_state')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </span>
                                                    </div>


                                                    <div class="col-md-4 mt-2">
                                                        <label for="partner_city" class="form-label">City</label>
                                                        <select name="partner_city[]" id="partner_city"
                                                            class="form-select select2Option"
                                                            multiple="multiple">
                                                            <option value="">Select City</option>

                                                            @php
                                                                $selectedCities = json_decode(
                                                                    $usersEdit->userDetail->partner_city,
                                                                    true,
                                                                );
                                                                $selectAnyCity = in_array('0', $selectedCities ?? []);
                                                            @endphp

                                                            <option value="0"
                                                                {{ $selectAnyCity ? 'selected' : '' }}>Any</option>

                                                            @foreach ($data['cities'] as $city)
                                                                <option value="{{ $city->id }}"
                                                                    {{ in_array($city->id, old('partner_city', $selectedCities ?? [])) ? 'selected' : '' }}>
                                                                    {{ strtoupper($city->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">
                                                            @error('partner_city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </span>
                                                    </div>



                                                    <div class="col-md-4 mt-2">
                                                        <label for="partner_education"
                                                            class="form-label">Education</label>
                                                        <select name="partner_education[]" id="partner_education"
                                                            class="form-select select2Option" multiple>
                                                            <option value="">Select Education</option>

                                                            @php
                                                                $selectedEducations = json_decode(
                                                                    $usersEdit->userDetail->partner_education,
                                                                    true,
                                                                );
                                                            @endphp

                                                            @foreach ($data['educations'] as $education)
                                                                <option value="{{ $education->education_name }}"
                                                                    {{ in_array($education->education_name, old('partner_education', $selectedEducations ?? [])) ? 'selected' : '' }}>
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
                                                        <label for="partner_occupation"
                                                            class="form-label">Occupation</label>
                                                        <select name="partner_occupation[]" id="partner_occupation"
                                                            class="form-select select2Option" multiple>
                                                            <option value="">Select Occupation</option>

                                                            @php
                                                                $selectedOccupations = json_decode(
                                                                    $usersEdit->userDetail->partner_occupation,
                                                                    true,
                                                                );
                                                            @endphp

                                                            @foreach ($data['occupations'] as $occupation)
                                                                <option value="{{ $occupation->occupation_name }}"
                                                                    {{ in_array($occupation->occupation_name, old('partner_occupation', $selectedOccupations ?? [])) ? 'selected' : '' }}>
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
                                                        <label for="partner_profession"
                                                            class="form-label">Profession</label>
                                                        <select name="partner_profession[]" id="partner_profession"
                                                            class="form-select select2Option" multiple="multiple">
                                                            <option value="">Select Profession</option>

                                                            @php
                                                                $selectedProfessions = json_decode(
                                                                    $usersEdit->userDetail->partner_profession,
                                                                    true,
                                                                );
                                                            @endphp

                                                            @foreach ($data['professions'] as $profession)
                                                                <option value="{{ $profession->profession_name }}"
                                                                    {{ in_array($profession->profession_name, old('partner_profession', $selectedProfessions ?? [])) ? 'selected' : '' }}>
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
                                                        <x-form.select name="partner_manglik" label="Manglik"
                                                            :options="[
                                                                'any' => 'Any',
                                                                'yes' => 'Yes',
                                                                'no' => 'No',
                                                            ]" :selected="$usersEdit->userDetail->partner_manglik" required />
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <x-form.select name="astrology_matching"
                                                            label="Astrology Matching" :options="[
                                                                'any' => 'Any',
                                                                'yes' => 'Yes',
                                                                'no' => 'No',
                                                            ]"
                                                            :selected="$usersEdit->userDetail->astrology_matching ??
                                                                old('astrology_matching')" required />
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <x-form.select name="partner_marital_status"
                                                            label="Marital Status" :selectClass="'select2Option'" :options="[
                                                                'any' => 'Any',
                                                                'single' => 'Single',
                                                                'married' => 'Married',
                                                                'divorced' => 'Divorced',
                                                                'widowed' => 'Widowed',
                                                                'separated' => 'Separated',
                                                                'engaged' => 'Engaged',
                                                                'in a Relationship' => 'In a Relationship',
                                                            ]"
                                                            :selected="$usersEdit->userDetail->partner_marital_status ??
                                                                old('partner_marital_status')" />


                                                    </div>



                                                    <div class="row partner_marital_status_detail_div"
                                                        style="display: none;">
                                                        <div class="col-md-4 mt-2">
                                                            <x-form.select name="partner_acccept_kid" label="Accept Kid"
                                                                :options="[
                                                                    'any' => 'Any',
                                                                    'with kid' => 'With Kid',
                                                                    'without kid' => 'Without Kid',
                                                                ]" :selected="$usersEdit->userDetail
                                                                    ->partner_acccept_kid ?? old('partner_acccept_kid')" selectClass=""
                                                                required />
                                                        </div>

                                                        <div class="col-md-8 mt-2">
                                                            <x-form.textarea name="partner_kid_discription"
                                                                label="Kid Discription"
                                                                value="{{ $usersEdit->userDetail->partner_kid_discription }}"
                                                                placeholder="" />
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 mt-4">
                                                        <x-form.textarea name="expectation_partner_details"
                                                            label="Expectation Partner Details"
                                                            value="{{ $usersEdit->userDetail->expectation_partner_details }}"
                                                            placeholder="" />
                                                    </div>



                                                </div>

                                                <div class="text-end mb-4">
                                                    <button type="reset" class="btn btn-danger w-sm">Reset</button>
                                                    <button type="submit" class="btn btn-success w-sm">Update Partner
                                                        Preference</button>
                                                </div>
                                            </form>
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

            $('.select2Option').select2();

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

            let selected_partner_marital_status =$("#partner_marital_status:selected").val()
            let div_partner_marital_status = $(".partner_marital_status_detail_div")
                if (selected_partner_marital_status == "Single" || selected_partner_marital_status == "unmarried" || selected_partner_marital_status == "") {
                    div_partner_marital_status.hide()
                    // $("#partner_kid_discription").val(null)
                    // $("#partner_acccept_kid").val(null)
                } else {
                    div_partner_marital_status.show()
                }


        });
    </script>
@endpush

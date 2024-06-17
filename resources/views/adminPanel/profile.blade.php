@extends('partial.admin.app')
@section('adminTitle', 'Profile Details')
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
                        <h4 class="mb-sm-0">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Superadmin</a></li>
                                <li class="breadcrumb-item active">Profile Details</li>
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

                <div class="col-lg-7">
                    {{-- Basic Details --}}
                    <form action="{{ route('admin.update_profile') }}" method="post" id=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">User Basic Details</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <x-form.input name="name" label="Name*" value="{{$user->name}}" placeholder="Enter Name" />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="email" type="email" label="Email Id*" placeholder="" value="{{$user->email}}"  />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <x-form.input name="whatsapp_no" label="Whatsapp No*" placeholder="" value="{{$user->whatsapp_no}}" />
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <x-form.textarea name="candidates_address" label="Address*" placeholder="" value="{{$user->candidates_address}}" />
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label for="id_proof">Profile Image </label>
                                        <input type="file" accept="image/*" name="photo" id="photo"
                                            onchange="loadFile(event, 'output3')" class="form-control">

                                        <span class="text-danger">
                                            @error('photo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <img id="output3" src="" alt=""
                                            style="max-width: 50%; max-height: 100px;">
                                    </div>

                                </div>
                            </div>


                            <div class="text-center mb-4 m-2">
                                <button type="submit" id="userRegBtn" class="btn btn-success w-sm">Update Profile</button>
                            </div>

                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </form>
                </div>



                <div class="col-lg-5">
                    {{-- Changes password Details --}}

                    <form action="{{route('admin.update_password')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-sm-0 text-primary">Change Password</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <x-form.input name="current_password" label="Old Password" type="password"/>
                                    </div>
                                    <div class="col-lg-12">
                                        <x-form.input name="password" label="New Password" type="password"/>
                                    </div>
                                    <div class="col-lg-12">
                                        <x-form.input name="password_confirmation" label="Confirm Password" type="password" />
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mb-4 m-2">
                                <button type="submit" id="" class="btn btn-danger w-sm">Chnage Password</button>
                            </div>

                            <!-- end card body -->
                        </div>
                    </form>
                    <!-- end card -->

                </div>


            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


@endsection

@push('script')
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

@extends('partial.admin.app')
@section('adminTitle', 'Upload Profile Image')

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
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
                    <h5 class="mb-3">User Profile Image Derails</h5>
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
                                                        <h5 class="card-title mb-sm-0">Upload Profile Image</h5>
                                                    </div>

                                                    <div class="card-body">

                                                        <div class="row">

                                                            {{-- Update Phpto Start --}}
                                                            <div class="col-lg-8 mt-1">

                                                                <form action="{{route('admin.uploadUserImageUpdate')}}" id="userPhotoUploadForm"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $usersEdit->id }}">

                                                                    <div class="row">

                                                                        <div class="col-lg-7 mt-lg-4 ">
                                                                            <div class="form-group">
                                                                                <input type="file" name="photo" id="photo" class="form-control">
                                                                            </div>
                                                                            <div class="image_preview my-2" style="display: none">
                                                                                <img id="image" src="" alt="" width="180" height="250">
                                                                                {{-- alt="Image to crop" --}}
                                                                            </div>

                                                                        </div>

                                                                        <div id="cropedImage">

                                                                        </div>

                                                                        <div class="text-center mb-4 col-lg-7 mt-lg-4">
                                                                            <button type="button" id="userPhotoUploadBtn"
                                                                                class="btn btn-success w-sm">Upload Photo</button>
                                                                        </div>

                                                                    </div>

                                                                </form>
                                                            </div>


                                                            <div class="col-lg-12 mt-2">

                                                                <strong>User Profile Images</strong>
                                                                <div class="table-photo table-responsive table-card mt-3 mb-1">

                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Id</th>
                                                                                <th>Image</th>
                                                                                {{-- <th>Status</th> --}}
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
                                                                                            <img src="{{asset($media->photo)}}" alt="" width="70" height="70">

                                                                                        </td>
                                                                                        {{-- <td>
                                                                                            <select name="status" id="userPhotoStatus" class="form-control">
                                                                                                <option value="front_img">Front Img</option>
                                                                                                <option value="cover_img">Cover Img</option>
                                                                                                <option value="family_img">family Img</option>
                                                                                            </select>
                                                                                        </td> --}}
                                                                                        <td>
                                                                                            <a href="{{route('admin.userPhotoDelete',$media->id)}}" onclick="return confirm('Are you sure delete this photo!')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                                                        </td>

                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif


                                                                        </tbody>
                                                                    </table>

                                                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


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
        var cropButton = document.getElementById('userPhotoUploadBtn');
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
            document.getElementById('userPhotoUploadForm').submit();
            // console.log($("#user_age").val(),"User Age");
        });
    </script>





@endpush

@extends('partial.admin.app')
@section('adminTitle', 'Education List')
@push('style')
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Education List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">List of Education</a></li>
                                <li class="breadcrumb-item active">Education</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('partial.flash-msg')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Educations</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="#" onclick="addEducation()" class="btn btn-success add-btn"> <i
                                                    class="fa fa-plus"></i> Add Education</a>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <x-search.table-search-input action="{{ route('admin.professions') }}"
                                                    method="get" name="search"
                                                    value="{{ isset($_REQUEST['search']) ? $_REQUEST['search'] : '' }}"
                                                    btnClass="search_btn" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ 'S.No' }}</th>
                                                <th scope="col">{{ 'Name' }}</th>
                                                <th scope="col">{{ 'Status' }}</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($educations as $edu)
                                                <tr>
                                                    <td scope="row">
                                                        {{ ($educations->currentPage() - 1) * $educations->perPage() + $loop->index + 1 }}
                                                    </td>
                                                    <td>{{ strtoupper($edu->education_name) }}</td>
                                                    <td>

                                                        <div
                                                            class="form-check form-switch form-switch-custom form-switch-success mb-3">

                                                            <input class="form-check-input educationStatusToggle"
                                                                type="checkbox" id="educationStatusToggle"
                                                                {{ $edu->status == 'active' ? 'checked' : '' }}
                                                                data-uid="{{ $edu->id }}">
                                                            <label class="form-check-label"
                                                                for="educationStatusToggle">{{ ucfirst($edu->status) }}</label>
                                                        </div>

                                                    </td>

                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm"
                                                            onclick="editEducation(<?= $edu->id ?>)"><i
                                                                class="fa fa-pencil-square-o"></i></a>

                                                        <a href="{{route('admin.educationDelete',$edu->id)}}" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure delete this education data!')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $educations->appends(request()->query())->onEachSide(5)->links() }}
                                </div>

                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>

        </div>
    </div>


    {{-- Add Education Model --}}
    <div class="modal fade" id="addEducationModel" tabindex="-1" aria-labelledby="addEducationModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.educationStore') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addEducationModelLabel">{{ 'Add Education' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Education <span class="text-danger">*</span></label>
                                <input type="text" name="education_name" class="form-control"
                                    placeholder="Enter Education">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" id="" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="block">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Add Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Education Edit Model --}}
    <div class="modal fade" id="educationEditModel" tabindex="-1" aria-labelledby="educationEditModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.educationUpdate')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="educationEditModelLabel">{{ 'Edit Education Details' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Education <span class="text-danger">*</span></label>
                                <input type="text" name="education_name" class="form-control"
                                    placeholder="Enter Education">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" id="education_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="block">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



@push('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    {{-- Add Educcation --}}
    <script>
        function addEducation() {
            $('#addEducationModel').modal('show');
        }


        function editEducation(education_id) {
            let url = `{{ url('admin/education-edit/${education_id}') }}`
            $.ajax({
                type: "GET",
                url: url,
                success: function(res) {
                    console.log("res", res)
                    let model = $('#educationEditModel')
                    $('input[name="id"]').val(res.data.id);
                    $('input[name="education_name"]').val(res.data.education_name);
                    $('#education_status').val(res.data.status);
                    model.modal("show")
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        $(".educationStatusToggle").on("click", function(e) {
                // e.prevantDefault()
                // if (confirm("Are you sure change account status this user")) {
                    let eduId = $(this).attr("data-uid")
                    let url = `{{ url('/admin/education-status-update') }}/${eduId}`
                    location.href = url;
                // }
            })

    </script>
@endpush

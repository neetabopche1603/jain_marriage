@extends('partial.admin.app')
@section('adminTitle', 'Occupation List')
@push('style')
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Occupation List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">List of Occupation</a></li>
                                <li class="breadcrumb-item active">Occupation</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Occupation</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="#" onclick="addOccupation()" class="btn btn-success add-btn"> <i
                                                    class="fa fa-plus"></i> Add Occupation</a>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <x-search.table-search-input action="{{ route('admin.occupations') }}"
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

                                            @foreach ($occupations as $occup)
                                                <tr>
                                                    <td scope="row">
                                                        {{ ($occupations->currentPage() - 1) * $occupations->perPage() + $loop->index + 1 }}
                                                    </td>
                                                    <td>{{ strtoupper($occup->occupation_name) }}</td>
                                                    <td>

                                                        <div
                                                        class="form-check form-switch form-switch-custom form-switch-success mb-3">

                                                        <input class="form-check-input occupationStatusToggle"
                                                            type="checkbox" id="occupationStatusToggle"
                                                            {{ $occup->status == 'active' ? 'checked' : '' }}
                                                            data-uid="{{ $occup->id }}">
                                                        <label class="form-check-label"
                                                            for="occupationStatusToggle">{{ ucfirst($occup->status) }}</label>
                                                    </div>

                                                    </td>

                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm"
                                                            onclick="editOccupation(<?= $occup->id ?>)"><i
                                                                class="fa fa-pencil-square-o"></i></a>

                                                        <a href="{{ route('admin.occupationDelete', $occup->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure delete this Occupation data!')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $occupations->appends(request()->query())->onEachSide(5)->links() }}
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



    {{-- Add Occupation Model --}}
    <div class="modal fade" id="addOccupationModel" tabindex="-1" aria-labelledby="addOccupationModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.occupationStore') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addOccupationModelLabel">{{ 'Add Occupation' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Occupation <span class="text-danger">*</span></label>
                                <input type="text" name="occupation_name" class="form-control"
                                    placeholder="Enter Occupation">
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
                        <button type="submit" name="submit" class="btn btn-primary">Add Occupation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Occupation Edit Model --}}

    <div class="modal fade" id="OccupationEditModel" tabindex="-1" aria-labelledby="OccupationEditModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.occupationUpdate') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="OccupationEditModelLabel">{{ 'Edit Occupation Details' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Occupation <span class="text-danger">*</span></label>
                                <input type="text" name="occupation_name" class="form-control"
                                    placeholder="Enter Occupation">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" id="occupation_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="block">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update Occupation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



@push('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    {{-- Add Occupation --}}
    <script>
        function addOccupation() {
            $('#addOccupationModel').modal('show');
        }

        function editOccupation(occupation_id) {
            let url = `{{ url('admin/occupation-edit/${occupation_id}') }}`
            $.ajax({
                type: "GET",
                url: url,
                success: function(res) {
                    console.log("res", res)
                    let model = $('#OccupationEditModel')
                    $('input[name="id"]').val(res.data.id);
                    $('input[name="occupation_name"]').val(res.data.occupation_name);
                    $('#occupation_status').val(res.data.status);
                    model.modal("show")
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        $(".occupationStatusToggle").on("click", function(e) {
            e.preventDefault();

            let occupationId = $(this).attr("data-uid");
            let url = `/admin/occupation-status-update/${occupationId}`;
            location.href = url;
        });
    </script>
@endpush

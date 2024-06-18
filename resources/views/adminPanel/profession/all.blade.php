@extends('partial.admin.app')
@section('adminTitle', 'Professions List')
@push('style')
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Professions List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">List of Professions</a></li>
                                <li class="breadcrumb-item active">Professions</li>
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
                            <h4 class="card-title mb-0">Professions</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="#" onclick="addProfessions()" class="btn btn-success add-btn"> <i
                                                    class="fa fa-plus"></i> Add Professions</a>

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

                                            @foreach ($professions as $p)
                                                <tr>
                                                    <td scope="row">
                                                        {{ ($professions->currentPage() - 1) * $professions->perPage() + $loop->index + 1 }}
                                                    </td>
                                                    <td>{{ strtoupper($p->profession_name) }}</td>
                                                    <td>

                                                        <div
                                                            class="form-check form-switch form-switch-custom form-switch-success mb-3">

                                                            <input class="form-check-input professionsStatusToggle"
                                                                type="checkbox" id="professionsStatusToggle"
                                                                {{ $p->status == 'active' ? 'checked' : '' }}
                                                                data-uid="{{ $p->id }}">
                                                            <label class="form-check-label"
                                                                for="professionsStatusToggle">{{ ucfirst($p->status) }}</label>
                                                        </div>

                                                    </td>

                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm"
                                                            onclick="editProfession(<?= $p->id ?>)"><i
                                                                class="fa fa-pencil-square-o"></i></a>

                                                        <a href="{{route('admin.professionDelete',$p->id)}}" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure delete this professions data!')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $professions->appends(request()->query())->onEachSide(5)->links() }}
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



    {{-- Add Professions Model --}}
    <div class="modal fade" id="addProfessionsModel" tabindex="-1" aria-labelledby="addProfessionsModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.professionStore') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addProfessionsModelLabel">{{ 'Add Professions' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Professions <span class="text-danger">*</span></label>
                                <input type="text" name="profession_name" class="form-control"
                                    placeholder="Enter Professions">
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
                        <button type="submit" name="submit" class="btn btn-primary">Add Professions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Professions Edit Model --}}

    <div class="modal fade" id="professionsEditModel" tabindex="-1" aria-labelledby="professionsEditModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.professionUpdate')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="professionsEditModelLabel">{{ 'Edit Professions Details' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Professions <span class="text-danger">*</span></label>
                                <input type="text" name="profession_name" class="form-control"
                                    placeholder="Enter Professions">
                            </div>

                            <div class="col-lg-12 mt-2">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" id="profession_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="block">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update Profession</button>
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
        function addProfessions() {
            $('#addProfessionsModel').modal('show');
        }


        function editProfession(professions_id) {
            let url = `{{ url('admin/profession-edit/${professions_id}') }}`
            $.ajax({
                type: "GET",
                url: url,
                success: function(res) {
                    console.log("res", res)
                    let model = $('#professionsEditModel')
                    $('input[name="id"]').val(res.data.id);
                    $('input[name="profession_name"]').val(res.data.profession_name);
                    $('#profession_status').val(res.data.status);
                    model.modal("show")
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        $(".professionsStatusToggle").on("click", function(e) {
                // e.prevantDefault()
                // if (confirm("Are you sure change account status this user")) {
                    let profeId = $(this).attr("data-uid")
                    let url = `{{ url('/admin/profession-status-update') }}/${profeId}`
                    location.href = url;
                // }
            })

    </script>
@endpush

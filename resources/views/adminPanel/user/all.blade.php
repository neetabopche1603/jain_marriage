@extends('partial.admin.app')
@section('adminTitle', 'Users List')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users Information</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                            <h4 class="card-title mb-0">Users Informations</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            {{-- <a href="{{route('admin.generatePdf')}}" class="btn btn-success add-btn"><i class="fa fa-download"></i> </i>Download Pdf</a> --}}

                                            <a href="{{ route('admin.create') }}" class="btn btn-success add-btn"><i
                                                    class="fa fa-user"></i> </i>Add New User</a>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                         <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <x-search.table-search-input action="{{route('admin.users')}}" method="get" name="search"
                                                    value="{{ isset($_REQUEST['search']) ? $_REQUEST['search'] : '' }}" btnClass="search_btn"
                                                 />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ 'S.No' }}</th>
                                                <th scope="col">{{ 'Photo' }}</th>
                                                <th scope="col">{{ 'Name' }}</th>
                                                <th scope="col">{{ 'Email' }}</th>
                                                <th scope="col">{{ 'Whatsapp No' }}</th>
                                                <th scope="col">{{ 'Calling No' }}</th>
                                                <th scope="col">{{ 'DOB/Age' }}</th>
                                                {{-- <th scope="col">{{ 'Photo' }}</th> --}}
                                                <th scope="col">{{ 'Profile Status' }}</th>
                                                <th scope="col">{{ 'Account Status' }}</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">{{ 'Created at' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)
                                                <tr>
                                                    <td scope="row">
                                                        {{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}
                                                    </td>

                                                    <td>
                                                        @php
                                                            $userMedia = App\Models\UsersMedia::where([
                                                                'user_id' => $user->id,
                                                                'status' => 'front_img',
                                                            ])->first();
                                                        @endphp

                                                        @if (!empty($userMedia))
                                                            <a href="{{ asset($userMedia->photo) }}"
                                                                class="userImage-popup">
                                                                <img src="{{ asset($userMedia->photo) }}" class="rounded"
                                                                    alt="" width="50">
                                                            </a>
                                                        @else
                                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeqOkeOMcWfV70RX4UGcoyx3NjceMhLcDA6CG8-rbn2Im07JvMXBI0Xkh1YXNRIEri-0w&usqp=CAU"
                                                                class="rounded" alt="" width="50">
                                                        @endif
                                                    </td>

                                                    <td>{{ $user->name }}<br>({{ $user->userId }}) </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->whatsapp_no }}</td>
                                                    <td>{{ $user->userDetail->calling_no }}</td>
                                                    <td> {{ \Carbon\Carbon::parse($user->dob)->format('d-M-Y') }}<br>Age:
                                                        {{ $user->age }}
                                                    </td>
                                                    {{-- <td><a href="#" class="btn btn-secondary btn-sm">Upload Photo</a></td> --}}
                                                    <td>
                                                        @if ($user->profile_status == 'verified')
                                                            <a href="#" class="btn btn-primary btn-sm">Verified</a>
                                                        @elseif ($user->profile_status == 'pending')
                                                            <a href="#" class="btn btn-warning btn-sm">Pending</a>
                                                        @else
                                                            <a href="#" class="btn btn-danger btn-sm">Rejected</a>
                                                        @endif

                                                    </td>

                                                    <td>

                                                        {{-- @if ($user->account_status == 'active')
                                                            <a href="#" class="btn btn-success btn-sm">Active</a>
                                                        @else
                                                            <a href="#" class="btn btn-danger btn-sm">Inactive</a>
                                                        @endif --}}


                                                        <div
                                                            class="form-check form-switch form-switch-custom form-switch-success mb-3">

                                                            <input class="form-check-input accountStatusToggle"
                                                                type="checkbox" id="accountStatusToggle"
                                                                {{ $user->account_status == 'active' ? 'checked' : '' }}
                                                                data-uid="{{ $user->id }}">
                                                            <label class="form-check-label"
                                                                for="accountStatusToggle">{{ ucfirst($user->account_status) }}</label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin.userViewProfilePage', $user->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                                                        <a href="{{ route('admin.edit', $user->id) }}"
                                                            class="btn btn-info btn-sm"><i
                                                                class="fa fa-pencil-square-o"></i></a>

                                                        <a href="{{ route('admin.userSoftDeleteData', $user->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure delete this user data!')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>

                                                    <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->appends(request()->query())->onEachSide(5)->links() }}
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

@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



    <script>
        $(document).ready(function() {

            // Image PopUP
            $('.userImage-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            $(".accountStatusToggle").on("click", function(e) {
                // e.prevantDefault()
                // if (confirm("Are you sure change account status this user")) {
                let userId = $(this).attr("data-uid")
                let url = `{{ url('/admin/user-account-status-update') }}/${userId}`
                location.href = url;
                // }
            })
        });
    </script>
@endpush

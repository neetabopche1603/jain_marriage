@extends('partial.admin.app')
@section('adminTitle', 'Dashboard')
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                @include('partial.flash-msg')

                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Good Morning, {{ auth()->user()->name }}!</h4>
                                        {{-- <p class="text-muted mb-0">Here's what's happening with your store
                                            today.</p> --}}
                                    </div>

                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            {{-- <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total User</p>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                        data-target="{{$data['total_users']}}"> {{$data['total_users']}} </span>
                                                </h4>
                                                <a href="{{route('admin.users')}}" class="text-decoration-underline">Total
                                                    users</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                                    <i class="bx bx-user-circle text-warning"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col --> --}}


                            <x-analyticscard heading="Total Users" value="{{$data['total_users']}}" icon="bx bx-user-circle" desc="Users List" action="{{route('admin.users')}}" color="primary" />

                            <x-analyticscard heading="Total Active Users" value="{{ $data['total_active_users'] }}" icon="bx bxs-user-check"  color="success"
                                desc="Total Active User List" action="{{route('admin.users')}}" />

                                <x-analyticscard  heading="Total Trashed Users" value="{{ $data['total_trashed_users'] }}" icon="bx bxs-trash"  color="danger"
                                desc="Total Trashed User List" action="{{route('admin.deletedUsersList')}}" />

                                <x-analyticscard  heading="Total Users profile verify" value="{{ $data['total_profile_verify_users'] }}" icon="bx bxs-user-check"  color="primary"
                                desc="Total verify User List" action="{{route('admin.users')}}" />

                                <x-analyticscard  heading="Total Users profile pending" value="{{ $data['total_profile_verify_pending'] }}" icon="bx bxs-user-rectangle"  color="warning"
                                desc="Total Pending User List" action="{{route('admin.users')}}" />

                                <x-analyticscard  heading="Total Users profile rejected" value="{{ $data['total_profile_verify_rejected'] }}" icon="bx bxs-x-circle"  color="danger"
                                desc="Total Rejected User List" action="{{route('admin.users')}}" />



                        </div> <!-- end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->


            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection

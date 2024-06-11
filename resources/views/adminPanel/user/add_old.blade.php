@extends('partial.admin.app')
@section('adminTitle', 'Add User Details')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Fill The User Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Information</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">User Derails</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-home" role="tab"
                                        aria-selected="false">
                                        Basic & Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-profile" role="tab"
                                        aria-selected="false">
                                        Profile Image
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-messages" role="tab"
                                        aria-selected="false">
                                        Family Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-top-settings"
                                        role="tab" aria-selected="true">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="nav-border-top-home" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before
                                            they sold out master cleanse gluten-free squid scenester freegan cosby sweater.
                                            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo
                                            park Austin. Cred vinyl keffiyeh DIY salvia PBR.
                                            <div class="mt-2">
                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i
                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-border-top-profile" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            When, while the lovely valley teems with vapour around me, and the meridian sun
                                            strikes the upper surface of the impenetrable foliage of my trees, and but a few
                                            stray gleams steal into the inner sanctuary, I throw myself down among the tall
                                            grass by the trickling stream; and, as I lie close to the earth, a thousand
                                            unknown.
                                            <div class="mt-2">
                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i
                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-border-top-messages" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out
                                            mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.
                                            Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore
                                            carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            <div class="mt-2">
                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i
                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-border-top-settings" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-checkbox-circle-line text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul
                                            and absorb its power, like the form of a beloved mistress, then I often think
                                            with longing, Oh, would I could describe these conceptions, could impress upon
                                            paper all that is living so full and warm within me, that it might be the.
                                            <div class="mt-2">
                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i
                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
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

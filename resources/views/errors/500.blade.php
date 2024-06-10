<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>

        <meta charset="utf-8" />
        <title>500 Error | VCT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
          <!-- App favicon -->
          <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

          <!-- Layout config Js -->
          <script src="{{asset('assets/js/layout.js')}}"></script>
          <!-- Bootstrap Css -->
          <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
          <!-- Icons Css -->
          <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
          <!-- App Css-->
          <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
          <!-- custom Css-->
          <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- auth-page wrapper -->
        <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

            <!-- auth-page content -->
            <div class="auth-page-content overflow-hidden p-0">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 text-center">
                            <div class="error-500 position-relative">
                                <img src="assets/images/error500.png" alt="" class="img-fluid error-500-img error-img" />
                                <h1 class="title text-muted">500</h1>
                            </div>
                            <div>
                                <h4>Internal Server Error!</h4>
                                <p class="text-muted w-75 mx-auto">Server Error 500. We're not exactly sure what happened, but our servers say something is wrong.</p>
                                <a href="{{route('admin.dashboard')}}" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Back to home</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end auth-page content -->
        </div>
        <!-- end auth-page-wrapper -->

    </body>

</html>

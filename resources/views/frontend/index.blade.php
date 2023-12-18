<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ __('Sign In | Egale Shop') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('backend/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="row col-lg-12 text-center">
                    <div class="card col-md-3"  style="margin: auto;">
                        <a target="__blank" href="{{ route('login.index') }}"><div class="card-body">Super Admin Login</div>
                        <h6>Email : superadmin@gmail.com</h6>
                        <h6>Passwd : 123456</h6></a>
                      </div>
                    <div class="card col-md-3"   style="margin: auto;">
                        <a target="__blank"  href="{{ route('home') }}"><div class="card-body">All Posts</div></a>
                      </div>
                    <div class="card col-md-3"  style="margin: auto;">
                        <a target="__blank" href="{{ route('front.login') }}"><div class="card-body">User Login</div>
                        <h6>Email : khairul@gmail.com</h6>
                        <h6>passwd : 123456</h6></a>
                      </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            
            <!-- end row -->
        </div>
        <div class="row">

            <div class="card col-md-3"  style="margin: auto; ">
                <a target="__blank" href="http://manirul.xyz/"><div class="card-body">Md.Manirul Islam's Portfolio</div>
                
              </div><br>
            <div class="card col-md-3"  style="margin: auto; ">
                <a target="__blank" href="https://github.com/MohanManirul/rashitech-task.git"><div class="card-body">Github Link</div>
                
              </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>document.write(new Date().getFullYear())</script> {{ __('Eagle Shop. Crafted with') }} <i class="mdi mdi-heart text-danger"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins.js') }}"></script>

<!-- password-addon init -->
<script src="{{ asset('backend/assets/js/pages/password-addon.init.js') }}"></script>

<script src="{{ asset('backend/assets/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/ajax_form_submit.js') }}"></script>

</body>

</html>

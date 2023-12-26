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

    <link href="{{ asset('backend/assets/css/select2/form-select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/select2/select2-bootstrap-5-theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .select2-container--bootstrap-5 + .select2-container--bootstrap-5 {
            z-index: 10 !important;
        }
    </style>
    <style>
        .text{
            color: #ffffff;
        }
        .danger .text-muted .form-errors .require-span{
            color: red;
        }
        .require-span{
            color: red;
        }
        
       
    </style>
</head>

<body>

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden border-0">
                        <div class="row g-0">
                            {{-- ticket query form start --}}
                            <div class="col-lg-6">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if(session('failed'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session('failed') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">{{ __('Welcome Back') }} !</h5>
                                        <p class="text-muted">{{ __('Online Ticketing made easy !') }} .</p>
                                    </div>

                                    <div class="mt-4">
                                        <form action="{{ route('available.bus') }}" method="get" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            {{-- leaving from start --}}
                                            <div class="row">
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Leaving From') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="starting_point_id" id="starting_point_id">
                                                        <option selected disabled >{{ __('From') }}</option>
                                                        @foreach ($destinations as $destination_start)                                                            
                                                            <option value="{{ $destination_start->id }}">{{ $destination_start->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- leaving from ends --}}
                                                
                                                {{-- going to start --}}
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Going To') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="end_point_id" id="end_point_id">
                                                        <option selected disabled >{{ __('To') }}</option>
                                                        @foreach ($destinations as $destination_end)                                                            
                                                            <option value="{{ $destination_end->id }}">{{ $destination_end->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                 {{-- going to ends --}}

                                            </div>
                                            <div class="row">
                                                <!-- jurney date start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="jurney_date" class="form-label">{{ __('Departuring On') }}</label><span class="require-span">*</span>
                                                    <input type="date" name="jurney_date" class="form-control" id="jurney_date" placeholder="{{ __('Jurney Date') }}">                                                        
                                                </div>                                                    
                                                <!-- jurney date ends -->

                                                <!-- coach type start -->
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Coach Type') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="bus_type" type="bus_id">                                                                                                                                                                    
                                                        <option value="all">All</option>                                                       
                                                        <option value="AC">AC</option>                                                       
                                                        <option value="Non-Ac">Non-Ac</option>                                                   
                                                    </select>
                                                </div>                                                
                                                <!-- coach type ends -->
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">{{ __('Search') }}</button>
                                            </div>
                                        </form>
                                    </div>

                                    {{--<div class="mt-5 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="" class="fw-semibold text-primary text-decoration-underline"> Signup</a> </p>
                                    </div>--}}
                                </div>
                            </div>
                            {{-- ticket query form ends --}}

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="" class="d-block">
                                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="18">
                                            </a> <br>
                                            <h6 style="color: #ffffff">Email : superadmin@gmail.com</h6>
                                            <h6 style="color: #ffffff">Passwd : 123456</h6></a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" {{ __('Great! Clean code, clean design, easy for customization. Thanks very much') }} ! "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" {{ __('The theme is really great with an amazing customer support') }} ."</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" {{ __('Great! Clean code, clean design, easy for customization. Thanks very much') }}! "</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
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
                            <script>document.write(new Date().getFullYear())</script> {{ __('Egal Shop. Crafted with') }} <i class="mdi mdi-heart text-danger"></i>
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

<script src="{{ asset('backend/assets/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/ajax_form_submit.js') }}"></script>

<script src="{{ asset('backend/assets/js/select2/form-select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2/select2.full.min.js') }}"></script>


<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'cancellation_policy' );
</script>

<script>
$(document).ready(function domReady() {
    $(".select2").select2({
        theme: 'bootstrap-5',
        dropdownAutoWidth: true,
        width: '100%',
    });
});
</script>

</body>

</html>

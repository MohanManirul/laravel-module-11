@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Edit Bus Seat | Super Admin Dashboard') }}
@endsection

@push('per_page_css')
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
    
   
</style>
@endpush


@section('content')
    <div class="page-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                                        <li class="breadcrumb-item"><a href="#">{{ __('Bus Seat Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('bus.seat.all') }}">{{ __('Bus Seat') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Bus Seat') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">{{ __('Edit Bus Seat') }}</h5>                                    
                                            <a href="{{ route('bus.seat.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Bus Seat') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('bus.seat.update', ['id' => encrypt($single_seat->id)]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <!-- bus seat_number start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="seat_number" class="form-label">{{ __('Bus Seat Number') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="seat_number" class="form-control" id="seat_number" placeholder="{{ __('Enter Bus Seat Number') }}" value="{{ $single_seat->seat_number }}">
                                                    <input type="hidden" seat_number="id" value="{{ $single_seat->id }}" class="form-control">
                                                </div>                                                    
                                                <!-- bus seat_number ends -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light float-end">{{ __('Update') }}</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->


            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection

@push('per_page_js')

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
@endpush
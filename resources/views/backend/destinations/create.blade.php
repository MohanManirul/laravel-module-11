@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Create Destinations | Super Admin Dashboard') }}
@endsection

@push('per_page_css')
<style>
    .text{
        color: #ffffff;
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Destinations Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('destinations.all') }}">{{ __('Destinations') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Destinations') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Create Destinations') }}</h5>                                    
                                            <a class="text" href="{{ route('destinations.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Destinations') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('destinations.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!-- product name start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="name" class="form-label">{{ __('Destinations Name') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Enter Destinations Name') }}">                                                        
                                                </div>                                                    
                                                <!-- product name ends -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light float-end">{{ __('Add') }}</button>
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
@endpush
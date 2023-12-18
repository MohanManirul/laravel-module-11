@extends('frontend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Create Products | User Dashboard') }}
@endsection

@push('per_page_css')
<style>
    .text{
        color: #ffffff;
    }
   
</style>
@endpush


@section('body-content')
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Products Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('user.products.all') }}">{{ __('Products') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Products') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Create Products') }}</h5>                                    
                                            <a class="text" href="{{ route('user.products.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Products') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('user.products.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!-- product name start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="name" class="form-label">{{ __('Products Name') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Enter Products Name') }}">                                                        
                                                </div>                                                    
                                                <!-- product name ends -->

                                                <!-- product quantity start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="quantity" class="form-label">{{ __('Products Quantity') }}</label><span class="require-span">*</span>
                                                    <input type="number" min="1" name="quantity" class="form-control" id="quantity" placeholder="{{ __('Enter Products Quantity') }}">                                                        
                                                </div>                                                    
                                                <!-- product quantity ends -->

                                                <!-- product price start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="price" class="form-label">{{ __('Products Price') }}</label><span class="require-span">*</span>
                                                    <input type="number" name="price" class="form-control" id="price" placeholder="{{ __('Enter Products Price') }}">                                                        
                                                </div>                                                    
                                                <!-- product price ends -->
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
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
@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Edit Product | Super Admin Dashboard') }}
@endsection

@push('per_page_css')

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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Product Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('products.all') }}">{{ __('Product') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Product') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Edit Product') }}</h5>                                    
                                            <a href="{{ route('products.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Product') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('products.update', ['id' => encrypt($single_product->id)]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!--name start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="name" class="form-label">{{ __('Product Name') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('Enter Product Name') }}" value="{{ $single_product->name }}">
                                                    <input type="hidden" name="id" value="{{ $single_product->id }}" class="form-control">
                                                </div>                                                    
                                                <!--name ends -->

                                                <!--Quantity start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="quantity" class="form-label">{{ __('Product Quantity') }}</label><span class="require-span">*</span>
                                                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="{{ __('Enter Product Quantity') }}" value="{{ $single_product->quantity }}">
                                                    <input type="hidden" name="id" value="{{ $single_product->id }}" class="form-control">
                                                </div>                                                    
                                                <!--Quantity ends -->

                                                <!--Price start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="price" class="form-label">{{ __('Product Price') }}</label><span class="require-span">*</span>
                                                    <input type="number" name="price" class="form-control" id="price" placeholder="{{ __('Enter Product Price') }}" value="{{ $single_product->price }}">
                                                    <input type="hidden" name="id" value="{{ $single_product->id }}" class="form-control">
                                                </div>                                                    
                                                <!--Price ends -->
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
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
@endpush
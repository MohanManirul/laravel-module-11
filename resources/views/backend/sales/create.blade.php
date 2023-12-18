@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Create Sales | Super Admin Dashboard') }}
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Sales Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('sales.all') }}">{{ __('Sales') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Sales') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Create Sales') }}</h5>                                    
                                            <a class="text" href="{{ route('sales.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Sales') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('sales.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <!-- product name start -->
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Product Name') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="product_id" id="product_id">
                                                        <option selected disabled >{{ __('Select Product') }}</option>
                                                        @foreach ($all_products as $single_products)                                                            
                                                            <option value="{{ $single_products->id }}">{{ $single_products->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- product name ends -->

                                                <!-- current stock start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="current_stock_quantity" class="form-label">{{ __('Current Stock') }}</label><span class="require-span">*</span>
                                                    <input type="number"  class="form-control" id="current_stock_quantity" placeholder="{{ __('Current Stock') }}" readonly>                                                        
                                                </div>                                                    
                                                <!-- current stock ends -->

                                                <!-- unit price start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="name" class="form-label">{{ __('Unit Price') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="unit_price" class="form-control" id="unit_price" placeholder="{{ __('Unit Price') }}" readonly>                                                        
                                                </div>                                                    
                                                <!-- unit price ends -->

                                                <!-- product quantity start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="quantity" class="form-label">{{ __('Sales Quantity') }}</label><span class="require-span">*</span>
                                                    <input type="text" min="1" name="sales_quantity" class="form-control" id="sales_quantity" placeholder="{{ __('Enter Sales Quantity') }}">                                                        
                                                </div>                                                    
                                                <!-- product quantity ends -->


                                                <!-- product price start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="price" class="form-label">{{ __('Total Price') }}</label><span class="require-span">*</span>
                                                    <input type="number" min="1" name="total_price" class="form-control" id="total_price" placeholder="{{ __('Total Price') }}" readonly>                                                        
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




{{-- check product stock start --}}

<script>
    $(function(){
        $(document).on('change','#product_id', function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('check.product.stock')}}",
                type:"GET",
                data:{product_id : product_id}, //product_id send to controller
                success:function(data){
                    // where to show on page
                    $('#current_stock_quantity').val(data);                      
                }
            });
        });
    });
</script>

{{-- check product stock start --}}

{{-- get unit price start--}}

<script>
    $(function(){
        $(document).on('change','#product_id', function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('get.unit.price')}}",
                type:"GET",
                data:{product_id : product_id}, //product_id send to controller
                success:function(data){
                    // where to show on page
                    $('#unit_price').val(data);                      
                }
            });
        });
    });
</script>

{{-- get unit price ends--}}


    {{-- get total price ends--}}

    <script>
        $("#sales_quantity").on('input',function(){
            var inputQuantity = $(this).val();
            const unitPrice = $("#unit_price").val(); 
            var total_price = inputQuantity * unitPrice ;
            $('#total_price').val(total_price);           
                
        });
    </script>
    
    {{-- get total price ends--}}




@endpush
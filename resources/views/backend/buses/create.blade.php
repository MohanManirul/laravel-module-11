@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Create Bus | Super Admin Dashboard') }}
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Bus Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('buses.all') }}">{{ __('Bus') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Bus') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Create Bus') }}</h5>                                    
                                            <a class="text" href="{{ route('buses.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Bus') }}</a>
                                    
                                    </div>
                                    <div class="card-body"> 

                                        <form class="ajax-form" action="{{ route('buses.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!-- jurney date start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="jurney_date" class="form-label">{{ __('Jurney Date') }}</label><span class="require-span">*</span>
                                                    <input type="date" name="jurney_date" class="form-control" id="jurney_date" placeholder="{{ __('Jurney Date') }}">                                                        
                                                </div>                                                    
                                                <!-- jurney date ends -->
                                                 <!-- end point start -->
                                                 <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('Bus Route') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="bus_route_id" id="bus_route_id">
                                                        <option selected disabled >{{ __('Select Bus Route') }}</option>
                                                        @foreach ($all_routes as $single_bus_routes)                                                            
                                                            <option value="{{ $single_bus_routes->id }}">{{ $single_bus_routes->route_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                     
                                                <!-- end point ends -->  
                                                <!-- bus operator start -->
                                                <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('Bus Operator') }}</label><span class="require-span">*</span>
                                                    <select class="form-select  form-control select2" name="bus_operators_id" id="bus_operators_id">
                                                        <option selected disabled >{{ __('Select Bus Operator') }}</option>
                                                        @foreach ($bus_operators as $bus_operator)                                                            
                                                            <option value="{{ $bus_operator->id }}">{{ $bus_operator->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                              
                                                <!-- bus operator ends -->

                                                <!-- bus type start -->
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Bus Type') }}</label><span class="require-span">*</span>
                                                    <select class="form-select form-control" name="bus_type">
                                                        <option disabled selected>{{ __('Select Bus Type') }}</option>
                                                        <option value="AC" >{{ __('AC') }}</option>
                                                        <option value="Non-Ac" >{{ __('Non-Ac') }}</option>
                                                    </select>
                                                </div>                                             
                                                <!-- bus type ends -->

                                                <!-- image start-->
                                                <div class="col-md-6 col-12 mb-2 form-group ">                                                        
                                                    <label for="" class="form-label">{{ __('Bus Image') }}</label>
                                                    <div class="input-group">
                                                        <input type="file" name="image">
                                                    </div>                                                
                                                </div>
                                                <!-- image ends-->

                                                <!-- starting point start -->
                                                <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('Starting Point') }}</label><span class="require-span">*</span>
                                                    <select class="form-select  form-control select2" name="starting_point_id" id="starting_point_id">
                                                        <option selected disabled >{{ __('Select Starting Point') }}</option>
                                                        @foreach ($destinations as $single_destination)                                                            
                                                            <option value="{{ $single_destination->id }}">{{ $single_destination->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                              
                                                <!-- starting point ends -->

                                                <!-- end point start -->
                                                <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('End Point') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="end_point_id" id="end_point_id">
                                                        <option selected disabled >{{ __('Select End Point') }}</option>
                                                        @foreach ($destinations as $single_destination)                                                            
                                                            <option value="{{ $single_destination->id }}">{{ $single_destination->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                     
                                                <!-- end point ends -->                                                

                                                <!-- bus number start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="bus_number" class="form-label">{{ __('Bus Number') }}</label><span class="require-span">*</span>
                                                    <input type="number" name="bus_number" class="form-control" id="bus_number" placeholder="{{ __('Bus Number') }}" >                                                        
                                                </div>                                                    
                                                <!-- bus number ends -->

                                                <!-- bus registration number start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="bus_registration_number" class="form-label">{{ __('Bus Registration Number') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="bus_registration_number" class="form-control" id="bus_registration_number" placeholder="{{ __('Bus Registration Number') }}" >                                                        
                                                </div>                                                    
                                                <!-- bus registration number ends -->

                                                <!-- stopage start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="stopage" class="form-label">{{ __('Stopage') }}</label><span class="require-span">*</span>
                                                    <input type="text" name="stopage" class="form-control" id="stopage" placeholder="{{ __('Stopage') }}" >                                                        
                                                </div>                                                    
                                                <!-- stopage ends --> 

                                                <!-- service charge start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="service_charge" class="form-label">{{ __('Service Charge') }} <span>if no then skip</span> </label>
                                                    <input type="number" name="service_charge" class="form-control" id="service_charge" placeholder="{{ __('Service Charge') }}" >                                                        
                                                </div>                                                    
                                                <!-- service charge  ends -->

                                                 <!-- seat number start --> 
                                                 <div class="row">
                                                    <label for="seat_number">Seats</label>
                                                     @foreach ($all_seats as $all_seat)                                                     
                                                     <div class="col-md-2 col-12 mb-2 form-group ">
                                                         <div class="form-check form-switch form-switch-right form-switch-md float-end">
                                                             <span class="float-end">{{ $all_seat->seat_number }}</span>
                                                             <input class="form-check-input me-2" type="checkbox" name="seat_number[]" id="seat_number" value="{{ $all_seat->id }}" checked>
                                                         </div>                                                       
                                                     </div>
                                                     @endforeach
                                                 </div> 
                                                <!-- seat number  ends -->

                                                <!-- cancellation policy start --> 
                                               
                                                <div class="col-md-12 col-12 mb-2 form-group ">
                                                    <label for="cancellation_policy" class="form-label">{{ __('Cancellation Policy') }}</label><span class="require-span">*</span>
                                                    <textarea name="cancellation_policy" id="cancellation_policy"  class="form-control"></textarea>                                                    
                                                </div>                                                    
                                                <!-- cancellation policy  ends -->

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
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
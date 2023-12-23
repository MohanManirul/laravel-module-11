@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Edit Fare Variant | Super Admin Dashboard') }}
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Fare Variant Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('fares.all') }}">{{ __('Fare Variant') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Fare Variant') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Edit Fare Variant') }}</h5>                                    
                                            <a href="{{ route('fares.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Fare Variant') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('fares.update', ['id' => encrypt($single_fare_variant->id)]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <!-- travel_date start --> 
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="travel_date" class="form-label">{{ __('Travel Date') }}</label><span class="require-span">*</span>
                                                    <input type="date" name="travel_date" value="{{ date('m/d/Y', strtotime($single_fare_variant->travel_date)) }}" class="form-control" id="travel_date" placeholder="{{ __('Travel Date') }}" >                                                        
                                                </div>                                                    
                                                <!-- travel_date ends -->

                                                <!-- bus name start -->
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Bus') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="bus_id" id="bus_id">
                                                        <option selected disabled >{{ __('Select Bus') }}</option>
                                                        @foreach ($all_buses as $single_bus)                                                            
                                                            <option value="{{ $single_bus->id }}" @if ($single_fare_variant->bus_id === $single_bus->id) selected @endif>{{ $single_bus->name }}  ( {{ $single_bus->bus_type }} )</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="id" value="{{ $single_fare_variant->id }}" class="form-control">
                                                </div>

                                                <!-- bus name ends -->                                                

                                                 <!-- starting point start -->
                                                 <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('Departure Point') }}</label><span class="require-span">*</span>
                                                    <select class="form-select  form-control select2" name="departure_point_id" id="departure_point_id">
                                                        <option selected disabled >{{ __('Select Departure Point') }}</option>
                                                        @foreach ($destinations as $single_destination)                                                            
                                                            <option value="{{ $single_destination->id }}" @if($single_fare_variant->bus_id === $single_destination->id ) selected @endif>{{ $single_destination->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                              
                                                <!-- starting point ends -->

                                                <!-- departure time start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="departure_at" class="form-label">{{ __('Departure Time') }}</label><span class="require-span">*</span>
                                                    <input type="time"  class="form-control" value="{{ $single_fare_variant->departure_at }}" name="departure_at" id="departure_at" placeholder="{{ __('Departure Time') }}" >                                                        
                                                </div>                                                    
                                                <!-- departure time ends -->

                                                 <!-- starting point start -->
                                                 <div class="col-md-6 col-12 mb-2 form-group"> 
                                                    <label for="">{{ __('Araival Point') }}</label><span class="require-span">*</span>
                                                    <select class="form-select  form-control select2" name="araival_point_id" id="araival_point_id">
                                                        <option selected disabled >{{ __('Select Araival Point') }}</option>
                                                        @foreach ($destinations as $single_destination)                                                            
                                                            <option value="{{ $single_destination->id }}" @if($single_fare_variant->araival_point_id === $single_destination->id ) selected @endif>{{ $single_destination->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                              
                                                <!-- starting point ends -->

                                                <!-- ariaval time start -->
                                                <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="araival_at" class="form-label">{{ __('Arival Time') }}</label><span class="require-span">*</span>
                                                    <input type="time"  class="form-control" name="araival_at" value="{{$single_fare_variant->araival_at }}" id="araival_at" placeholder="{{ __('Arival Time') }}" >                                                        
                                                </div>                                                    
                                                <!-- ariaval time ends -->

                                                 <!-- fare start --> 
                                                 <div class="col-md-6 col-12 mb-2 form-group ">
                                                    <label for="fare" class="form-label">{{ __('Fare') }}</label><span class="require-span">*</span>
                                                    <input type="number" name="fare" value="{{ $single_fare_variant->fare }}" class="form-control" id="fare" placeholder="{{ __('Fare') }}" >                                                        
                                                </div>                                                    
                                                <!-- fare ends -->

                                               
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

<script src="{{ asset('backend/assets/js/select2/form-select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/select2/select2.full.min.js') }}"></script>

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
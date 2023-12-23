@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Create Seat Reservation | Super Admin Dashboard') }}
@endsection

@push('per_page_css')
<link href="{{ asset('backend/assets/css/select2/form-select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/select2/select2-bootstrap-5-theme.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css" rel="stylesheet" type="text/css" />

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
  
   .right-vertical-pipe{
    border-right: 1px dashed #c1c1c1;
    margin-right: 0;
   }
   .red{
    color: red;
   }
   .numeric{
    color: red;
    font-size: 14px;
   }
   .background {
    background: #dc0201;
    color: #fff;
    border-color: #dc0201;
    position: relative;
}
.bus-border{
    border: 1px solid red;
    border-radius: 5px;
    margin-bottom: 2px;
}
.seat {
    position: relative;
    width: 25px;
    height: 28px;
    background: #fff;
    border: 1px solid #c1c1c1;
    display: inline-block;
}
.seat.sold, .seat.sold:before {
    border-color: #ff9090;
    background: red;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
li{
    list-style: none;
}
.search_seat-list__cojt_ li{

    display: flex;
    flex-wrap: wrap;
    margin-bottom: 10px;
    padding-left: 50px;
}

.booked-male{
    border-color: #74489d;
    background: #ffa4a4;
}
.booked-female{
    border-color: #74489d;
    background: #ffa4a4;
}
.blocked{
    border-color: #000;
    background: #aaa;
}
.available{
    border-color: #f8cccc;
    background: #01ac34;
}
.selected{
    border-color: #72bf44;
    background: #9cd27c;
}
.sold-male{
    border-color: #ff9090;
    background: red;
}
.sold-female{
    border-color: #f9c;
    background: #ff1493;
}

.search_seat-selection__w1vv6 {
    border-right: 1px solid #f8cccc;
}
*, :after, :before {
    box-sizing: border-box;
}
div {
    display: block;
}
.search_search-result__bIqY1 .search_seat-selection__w1vv6 .search_bus__VrbiR {
    margin-bottom: 20px;
    min-width: 240px;
    min-height: 500px;
    width: 100%;
}
.search_seat-selection__w1vv6 .search_bus__VrbiR {
    margin-right: 20px;
    min-height: 400px;
}
.search_seat-selection__w1vv6 .search_bus__VrbiR {
    padding: 15px 10px;
    border: 1px solid #f8cccc;
    min-height: 600px;
}
.search_seat-selection__w1vv6 .search_bus__VrbiR .search_seats__O1_OT ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
    display: grid;
    grid-gap: 1rem;
    gap: 1rem;
    flex: 1 1;
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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Seat Reservation Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('seat.reservations.all') }}">{{ __('Seat Reservation') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Seat Reservation') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Create Seat Reservation') }}</h5>                                    
                                            <a class="text" href="{{ route('seat.reservations.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Seat Reservation') }}</a>
                                    
                                    </div>
                                    <div class="card-body bus-border">

                                        <form class="ajax-form" action="{{ route('seat.reservations.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="container row "> 
                                                <!-- bus information start -->
                                               <div class="col-md-3 right-vertical-pipe">

                                                    <p> <strong>RP SPECIAL NICE</strong> </p>
                                                    <p>NICE-02 CP-RAJ-NAT-FENI-CTG-</p>
                                                    <p>PAT <span class="red"><strong>Non AC</strong> </span> </p>
                                                    <p>Starting Point: <span class="red">Chapainawabganj</span> </p>
                                                    <p>End Point: <span class="red">Chittagong</span> </p>
                                               </div>
                                               <!-- bus information ends -->

                                               <!-- departure time start -->
                                               <div class="col-md-2 right-vertical-pipe text-center">
                                                    <p>DEPARTURE TIME</p>
                                                    <b class="numeric"> 5:00 PM</b>                                            
                                               </div>
                                               <!-- departure time ends -->

                                               <!-- arival time start -->
                                               <div class="col-md-2 right-vertical-pipe text-center">
                                                    <p>ARRIVAL TIME</p>
                                                    <b class="numeric">7:30 AM</b>                                            
                                               </div>
                                               <!-- arival time ends -->

                                               <!-- seat available start -->
                                               <div class="col-md-2 right-vertical-pipe text-center">
                                                    <p>SEATS AVAILABLE</p>
                                                    <b  class="numeric">25</b>                                            
                                               </div>
                                               <!-- seat available ends -->

                                               <!-- price start -->
                                               <div class="col-md-1 right-vertical-pipe text-center">
                                                    <b style="font-size: 16px">800 TK</b>                                          
                                               </div>
                                               <!-- price ends -->

                                               <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm background"  data-bs-toggle="collapse" data-bs-target="#seat-details">View Seats</button> <br>
                                                    <span style="font-size: 12px"> <i style="color: red" >Cancellation Policy</i> </span>                                       
                                               </div>
                                               
                                               <!-- bus details start -->
                                               <div id="seat-details" class="collapse"> <hr>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                <div class="col-12">

                                                    <ul style="display: flex" class="search_seat-list__cojt_ ">
                                                        <li><span class="seat booked-male"></span>Booked(M)</li>
                                                        <li><span class="seat booked-female"></span>Booked(F)</li>
                                                        <li><span class="seat blocked"></span>Blocked</li>
                                                        <li><span class="seat available"></span>AVAILABLE</li>
                                                        <li><span class="seat selected"></span>Selected</li>
                                                        <li><span class="seat sold-male"></span>SOLD (M)</li>
                                                        <li><span class="seat sold-female"></span>SOLD (F)</li>
                                                    </ul>
                                                </div>

                                                <div class="row">
                                                    <div class="col-8 col-sm-7 col-lg-4 order-1 order-lg-0">
                                                        <div class="search_seat-selection__w1vv6">
                                                            <div class="search_bus__VrbiR ">
                                                                
                                                                <div class="float-start search_driver__ZhwLD">
                                                                   => <span>Entrance</span>
                                                                </div>
                                                                <div class="float-end search_driver__ZhwLD">
                                                                    <img src="{{ asset('images/driver.png') }}" alt="" height="18">
                                                                </div>
                                                                <br>
                                                                
                                                                <div class="search_seats__O1_OT">
                                                                    <hr>                                                             
                                                                    <div class="row mt-4  col-12" style="margin-left: 20px"> 
                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">A1</span></li>
                                                                            <li><span class="seat booked-female">A2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">A3</span></li>
                                                                            <li><span class="seat booked-female">A4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="mt-4 row col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">B1</span></li>
                                                                            <li><span class="seat booked-female">B2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">B3</span></li>
                                                                            <li><span class="seat booked-female">B4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4  col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">C1</span></li>
                                                                            <li><span class="seat booked-female">C2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">C3</span></li>
                                                                            <li><span class="seat booked-female">C4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row  mt-4  col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">D1</span></li>
                                                                            <li><span class="seat booked-female">D2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">D3</span></li>
                                                                            <li><span class="seat booked-female">D4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4  col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">E1</span></li>
                                                                            <li><span class="seat booked-female">E2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">E3</span></li>
                                                                            <li><span class="seat booked-female">E4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4 col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">F1</span></li>
                                                                            <li><span class="seat booked-female">F2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">F3</span></li>
                                                                            <li><span class="seat booked-female">F4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4 col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">G1</span></li>
                                                                            <li><span class="seat booked-female">G2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">G3</span></li>
                                                                            <li><span class="seat booked-female">G4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4 col-12" style="margin-left: 20px"> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">H1</span></li>
                                                                            <li><span class="seat booked-female">H2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">H3</span></li>
                                                                            <li><span class="seat booked-female">H4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    <div class="row mt-4 col-12" style="margin-left: 20px; "> 

                                                                        <ul style="display: flex" >
                                                                            <li><span class="seat booked-male">I1</span></li>
                                                                            <li><span class="seat booked-female">I2</span></li>
                                                                        </ul>
                                                                    
                                                                        <ul  style="display: flex">
                                                                            <li><span class="seat booked-male">I3</span></li>
                                                                            <li><span class="seat booked-female">I4</span></li>
                                                                        </ul>                                                                                                                                            
                                                                        
                                                                    </div>
                                                                    
                                                                </div> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        BOARDING/DROPPING POINT:
                                                         <!-- starting point start -->
                                                       
                                                            <label for="">{{ __('Starting Point') }}</label><span class="require-span">*</span>
                                                            <select class="form-select  form-control select2" name="starting_point_id" id="starting_point_id">
                                                                <option selected disabled >{{ __('Select Boarding Point') }}</option>
                                                                <option   >{{ __('Rajshahi Counter') }} at 12.00pm</option>
                                                                <option   >{{ __('Baneswar Counter') }} at 11.30pm</option>
                                                                <option   >{{ __('Puthia Counter') }} at 11.00pm</option>
                                                                {{-- @foreach ($destinations as $single_destination)                                                            
                                                                    <option value="{{ $single_destination->id }}">{{ $single_destination->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                                                                    
                                                        <!-- starting point ends -->
                                                    </div>
                                                    <div class="col-md-4">
                                                       <!-- bus name start -->                                                    
                                                        <label for="name" class="form-label">{{ __('MOBILE NUMBER') }}</label><span class="require-span">*</span>
                                                        <input type="number" name="name" class="form-control" id="name" placeholder="{{ __('Enter MOBILE NUMBER*') }}">                                                                                               
                                                    <!-- bus name ends -->
                                                    </div>
                                                </div>
                                                
                                            </div>
                                              <!-- bus details ends -->

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
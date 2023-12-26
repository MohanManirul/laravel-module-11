@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="all product" name="description" />
@endsection

@section('per_page_title')
    {{ __('Super Admin Dashboard | All Bus Trips') }}
@endsection

@push('per_page_css')

@endpush
@section('content')
    <div class="page-content">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">All Bus Trips</h4>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" id="create-btn" ><i class="ri-add-line align-bottom me-1"></i><a href="{{ route('bus.trip.create.page') }}"><span style="color:#fff">Add Trip</span> </a></button>
                                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        </div>
                                    </div>
                                     <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                              <span>Search</span>  <input type="date" name="search" id="search">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    @include('inc.messages')
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="customer_name">Sl</th>
                                                <th class="sort" data-sort="name">Journey Date</th>
                                                <th class="sort" data-sort="name">Bus Name</th>
                                                <th class="sort" data-sort="name">Status</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic-row" class="list form-check-all">
                                            @foreach ($all_trips as $key=>$single_trip)                                                
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                        </div>
                                                    </th>
                                                    
                                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                    <td class="customer_name">{{ $key+1 }}</td>
                                                    <td class="email">{{ $single_trip->journey_date }}</td>                                                 
                                                    <td class="email">
                                                        @foreach ($single_trip->buses as $key =>$bus_nam)  
                                                            {{ $bus_nam->name }}  ({{ $bus_nam->bus_type }})
                                                        @endforeach 
                                                    </td>                                                  
                                                    <td class="email">
                                                    @if ($single_trip->is_active = true)
                                                        <span style="color: green">Active</span>
                                                        @else 
                                                        <span style="color: red">In-Active</span>
                                                    @endif
                                                    </td>                                                  
                                                                                                    
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn"><a href="{{ route('bus.trip.edit',['id'=>encrypt($single_trip->id)]) }}"><span style="color:#fff">Edit</span></a> </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>

@endsection

@push('per_page_js')
    <script src="{{ asset('backend/assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/ajax_form_submit.js') }}"></script>
@endpush
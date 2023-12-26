@extends('backend.layouts.master')
@section('per_page_meta')
    <meta content="all product" name="description" />
@endsection

@section('per_page_title')
    {{ __('Super Admin Dashboard | All Buses') }}
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
                            <h4 class="card-title mb-0">All Buses</h4>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" id="create-btn" ><i class="ri-add-line align-bottom me-1"></i><a href="{{ route('buses.create.page') }}"><span style="color:#fff">Add</span> </a></button>
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
                                                <th class="sort" data-sort="name">Name</th>
                                                <th class="sort" data-sort="name">Image</th>
                                                <th class="sort" data-sort="name">Start From</th>
                                                <th class="sort" data-sort="name">Last Stop</th>
                                                <th class="sort" data-sort="name">Total Seats</th> 
                                                <th class="sort" data-sort="name">Bus Type</th> 
                                                <th class="sort" data-sort="name">Stopage</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic-row" class="list form-check-all">
                                            @foreach ($all_buses as $key=>$single_buse)                                                
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                        </div>
                                                    </th>
                                                    
                                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                    <td class="customer_name">{{ $key+1 }}</td>
                                                    <td class="email">{{ $single_buse->jurney_date }}</td>                                                    
                                                    <td class="email">
                                                     {{ $single_buse->bus_operators->name  }}                                                       
                                                        
                                                    <td class="phone"><img style="width: 50px;height:auto" src="{{ asset('images/buses/' . $single_buse->image) }}" alt="Image"></td>                                                   
                                                    <td class="email">
                                                        @foreach ($single_buse->start as $start_point)
                                                            {{ $start_point->name }}
                                                        @endforeach
                                                    </td>                                                    
                                                    <td class="email">
                                                        @foreach ($single_buse->end as $end_point)
                                                            {{ $end_point->name }}
                                                        @endforeach</td>                                                
                                                    <td class="email">{{ $single_buse->seats }}</td>                                                    
                                                    <td class="email">{{ $single_buse->bus_type }}</td>                                                  
                                                    <td class="email">{{ $single_buse->stopage }}</td>                                                    
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn"><a href="{{ route('buses.edit',['id'=>encrypt($single_buse->id)]) }}"><span style="color:#fff">Edit</span></a> </button>
                                                            </div>
                                                            <div class="remove"> 
                                                                <a class="btn btn-sm btn-danger delete_user"  href={{ route('seat.reservations.create.page') }}>Reservation</a> 
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
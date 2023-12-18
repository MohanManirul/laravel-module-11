@extends('backend.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col"> 

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                                    <div class="row">

                                        <div class="col-md-3 card "   style="border:1px solid red">
                                            <div class="card-body">
                                                <h3>today's' Sale</h3>
                                                <h2>{{ $today_sale }} TK</h2>
                                            </div>
                                        </div>
                                        <div    style="border:1px solid red"  class="col-md-3 card">
                                            <div class="card-body">
                                                <h3>Yesterday's sale</h3>
                                                <h2>{{ $last_today_sale }} TK</h2>
                                            </div>
                                         </div>
                                        <div    style="border:1px solid red" class="col-md-3 card">
                                            <div class="card-body">
                                                <h3>{{ date("F Y") }} Sale</h3>
                                                <h2>{{ $this_month_sale }} TK</h2>
                                            </div>
                                        </div>
                                        <div    style="border:1px solid red" class="col-md-3 card">
                                            <div class="card-body">
                                                <h3>last month's sale</h3>
                                                <h2>{{ $last_month_sale }} TK</h2>
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

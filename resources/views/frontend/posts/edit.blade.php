@extends('frontend.layouts.master')
@section('per_page_meta')
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
@endsection

@section('per_page_title')
    {{ __('Edit Post | User Dashboard') }}
@endsection

@push('per_page_css')

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
                                        <li class="breadcrumb-item"><a href="#">{{ __('Post Management') }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('user.post.all') }}">{{ __('Post') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add Post') }}</li>
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
                                        <h5 class="card-title mb-0">{{ __('Edit Post') }}</h5>                                    
                                            <a href="{{ route('user.post.all') }}" class="btn btn-outline-dark waves-effect waves-light float-end">{{ __('All Post') }}</a>
                                    
                                    </div>
                                    <div class="card-body">

                                        <form class="ajax-form" action="{{ route('user.post.update', ['id' => encrypt($my_post->id)]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                    <!--name start -->
                                                    <div class="col-md-6 col-12 mb-2 form-group ">
                                                        <label for="title" class="form-label">{{ __('Post Name') }}</label><span class="require-span">*</span>
                                                        <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('Enter Post Name') }}" value="{{ $my_post->title }}">
                                                        <input type="hidden" name="id" value="{{ $my_post->id }}" class="form-control">
                                                    </div>                                                    
                                                    <!--name ends -->

                                                    <!-- image start-->
                                                    <div class="col-md-6 col-12 mb-2 form-group uploader">
                                                        
                                                            <label for="" class="form-label">{{ __('Old Image') }}</label>
                                                            <img style="width: 50px;height:auto" src="{{ asset('frontend/assets/task_img/' . $my_post->image) }}" alt="Image"> <br>
                                                            <label for="" class="form-label">{{ __('Change Image') }}</label>
                                                            <div class="input-group">
                                                                <input type="file" name="image" class="file-id">
                                                            </div>
                                                        
                                                    </div>
                                                <!-- image ends-->
                                                <div class="col-md-6 col-12 mb-2 form-group">
                                                    <label for="">{{ __('Status') }}</label><span class="require-span">*</span>
                                                    <select class="form-select select2 form-control" name="is_active">
                                                        <option disabled >{{ __('Select Status') }}</option>
                                                        <option value="1" @if($my_post->is_active == 1) selected @endif>{{ __('Active') }}</option>
                                                        <option value="0" @if($my_post->is_active == 0) selected @endif>{{ __('Inactive') }}</option>
                                                    </select>
                                                </div>
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
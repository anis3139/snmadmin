@extends('admin.layouts.master')
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/select/select2.min.css">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('') }}app-assets/css/base/plugins/forms/form-validation.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/css/base/plugins/forms/form-wizard.css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Home</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Banner</a>
                            </li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        @include('ErrorMessage')
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="left">
                                <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                            </div>
                            <div class="right">
                                <a class="btn btn-primary btn-learge" href=""><i data-feather='eye'></i> View {{ request()->name }}</a>
                                <a class="btn btn-dark btn-learge" href=""><i data-feather='plus'></i> Create New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Upload File</label>
                                            <input type="file" class="form-control" placeholder="Enter Name" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="role">Banner Type</label>
                                            <select name="status" class="form-control">
                                            <option value="">---Select Status---</option>
                                                {{-- @foreach($enumStatuses as $key => $status) --}}
                                                    {{-- <option value="{{$status}}">{{ ucwords($status) }}</option> --}}
                                                    <option value="">Main slider</option>
                                                    <option value="">Below slider</option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="role">Banner Status</label>
                                            <select name="status" class="form-control">
                                            <option value="">---Select Status---</option>
                                                {{-- @foreach($enumStatuses as $key => $status) --}}
                                                    {{-- <option value="{{$status}}">{{ ucwords($status) }}</option> --}}
                                                    <option value="">Active</option>
                                                    <option value="">Inactive</option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn btn-danger right" type="submit">Cancel</button>
                                        <button class="btn btn-info right" type="submit">Save as draft</button>
                                        <button class="btn btn-success right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tooltip validations end -->
    </div>
</div>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset('') }}app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('') }}app-assets/js/scripts/forms/form-wizard.js"></script>
@endsection

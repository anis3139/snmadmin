@extends('admin.layouts.master')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('/app-assets/css/plugins/forms/form-validation.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Tag</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        @include('ErrorMessage')

        <!-- Tooltip validations start -->
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                       <div class="card-header d-flex">
                                <div class="left">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i
                                            class="fas fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="right">
                                    @can('blog.view')

                                    <a class="btn btn-primary btn-learge" href="{{ route('tag.index') }}"><i
                                        data-feather='eye'></i> View Tag</a>
                                        @endcan
                                        @can('blog.create')

                                        <a class="btn btn-dark btn-learge" href="{{ route('tag.create') }}"><i
                                            data-feather='plus'></i> Create New</a>
                                            @endcan
                                </div>
                            </div>
                            <hr>
                        <div class="card-body">
                            <form id="tagAddForm" action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="nameBn">Bangla Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Bangla Name" id="nameBn" name="nameBn">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="nameEn">English Name</label>
                                            <input type="text" class="form-control" placeholder="Enter English  Name" id="nameEn" name="nameEn">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Satus</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
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
    <script src="{{ asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/forms/form-validation.js') }}"></script>
@endsection
@section('page-script')

    <script>

        $('#tagAddForm').validate({
            rules: {
                nameEn: "required",
                nameBn: "required",
                status: "required",
            },
            messages: {
                nameEn: "Please specify Title (English)",
                nameBn: "Please Selcect Name (Bangla)",
                status: "Please Selcect Status",
            }
        });

    </script>

@endsection

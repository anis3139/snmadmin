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
                    <h2 class="content-header-title float-left mb-0">Category</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Category Create
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
                                    @can('category.view')

                                    <a class="btn btn-primary btn-learge" href="{{ route('category.index') }}"><i
                                        data-feather='eye'></i> View Category</a>
                                        @endcan
                                        @can('category.create')

                                        <a class="btn btn-dark btn-learge" href="{{ route('category.create') }}"><i
                                            data-feather='plus'></i> Create New</a>
                                            @endcan
                                </div>
                            </div>
                            <hr>
                        <div class="card-body">
                            <form id="categoryAddForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" files="true">
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
                                            <label for="description">Image</label>
                                            <input type="file" name="img" id="input-file-now" class="form-control img" data-default-file="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Textarea</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control"></textarea>

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
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <img src="" alt="" id="imagePreview" width="200px" height="auto"
                                            class="text-center">

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
         $('.img').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#imagePreview').attr('src', ImgSource)
            }
        })


        $('#categoryAddForm').validate({
            rules: {
                nameEn: "required",
                img: "required",
                nameBn: "required",
                description: "required",
                status: "required",
            },
            messages: {
                nameEn: "Please specify Title (Bangla)",
                img: "Please Selcect Image",
                nameBn: "Please Selcect Name",
                status: "Please Selcect Status",
                description: "Please specify Description (Bangla)",
            }
        });





    </script>

@endsection

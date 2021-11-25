@extends('admin.layouts.master')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/forms/select/select2.min.css') }}">
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('/app-assets/css/plugins/forms/form-validation.css') }}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-style: none;
        }

    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Blog</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Blog Edit
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
                                <h4 class="card-title">{{$blog->title}} Edit</h4>
                            </div>
                            <div class="right">
                                <a class="btn btn-primary btn-learge" href="{{ route('blog.index') }}">Blog List</a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form id="userEditForm" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" files="true">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="first_name1">Title Bangla</label>
                                            <input value="{{ $blog->title }}" placeholder="Enter Bangla Title" id="title" type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="titleEn">Title English</label>
                                            <input type="text" value="{{ $blog->titleEn }}" class="form-control" placeholder="Enter English  Name" id="titleEn" name="titleEn">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Description Bangla</label>
                                            <textarea placeholder="Enter Description"  cols="30" rows="10" name="description" id="description" class="form-control ckeditor">{{ $blog->description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="descriptionEn">Description English</label>
                                            <textarea placeholder="Enter Description" cols="30" rows="10" name="descriptionEn" id="descriptionEn" class="form-control ckeditor">{{ $blog->descriptionEn }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <option value="" selected>---- Select Category---</option>
                                                @foreach($categories as $key => $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? "selected" : '' }}>{{ $category->nameBn }} ({{ $category->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="subcategory_id">Sub Category</label>
                                            <select id="subcategory_id" name="subcategory_id" class="form-control">
                                                <option value="" selected>---- Select Sub Category---</option>
                                                @foreach($subcategories as $key => $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $blog->subcategory_id ? "selected" : '' }}>{{ $subcategory->nameBn }} ({{ $subcategory->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="tag">Tag</label>
                                            <select name="tags[]" id="tag" class="form-control select2" multiple>
                                                @foreach($tags as $key => $tag)
                                                <option value="{{ $tag->id }}" {{ $tag->id == $blog->tag ? "selected" : '' }}>{{ $tag->nameBn }} ({{ $tag->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="status">Satus</label>
                                            <select name="status" class="form-control">
                                                <option {{ $blog->status==1 ? "selected" : '' }} value="1">Active</option>
                                                <option {{ $blog->status==0 ? "selected" : '' }} value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Image</label>
                                            <input type="file" id="img" name="img" id="input-file-now" class="form-control img" data-default-file="" />
                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <img src="{{ asset($blog->image) }}" alt="" id="imagePreview" width="200px" height="auto"
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
    <script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/forms/form-validation.js') }}"></script>
@endsection
@section('page-script')

    <script>
        $('#userEditForm').validate({
            rules: {
                title: "required",
                tag: "required",
                status: "required",
                category_id: "required",
                subcategory_id: "required",
                descriptionEn: "required",
                description: "required",
                titleEn: {
                    required: true,
                    // email: true
                }
            },
            messages: {
                title: "Please specify Title (Bangla)",
                tag: "Please Selcect Tag",
                status: "Please Selcect Status",
                category_id: "Please Selcect Category",
                subcategory_id: "Please Selcect Sub Category",
                descriptionEn: "Please specify Description (English)",
                description: "Please specify Description (Bangla)",
                titleEn: {
                    required: "Please specify Title (English)",
                }
            }
        });


        // $(".select2").select2();
        var select = $('.select2');

        select.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
                .select2({
                    placeholder: 'Select value',
                    dropdownParent: $this.parent()
                })
                .change(function() {
                    $(this).valid();
                });
        });

        $('.img').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#imagePreview').attr('src', ImgSource)
            }
        })
    </script>

@endsection

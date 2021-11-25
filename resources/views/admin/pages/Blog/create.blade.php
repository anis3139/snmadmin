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
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Blog</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blog Create
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

                                    <a class="btn btn-primary btn-learge" href="{{ route('blog.index') }}"><i
                                        data-feather='eye'></i> View Blog</a>
                                        @endcan
                                        @can('blog.create')

                                        <a class="btn btn-dark btn-learge" href="{{ route('blog.create') }}"><i
                                            data-feather='plus'></i> Create New</a>
                                            @endcan
                                </div>
                            </div>

                            <hr>
                            <div class="card-body">
                                <form class="" action="{{ route('blog.store') }}" method="POST"
                                    enctype="multipart/form-data" files="true" id="blogAddForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">

                                            <div class="form-group">
                                                <label class="form-label" for="first_name1">Title Bangla</label>

                                                <input type="text" id="first_name1" class="form-control"
                                                    placeholder="Title Bangla" aria-label="title"
                                                    aria-describedby="first_name1" name="title" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">

                                            <div class="form-group">
                                                <label class="form-label" for="titleEn">Title English</label>

                                                <input type="text" id="titleEn" class="form-control"
                                                    placeholder="Title English" aria-label="titleEn"
                                                    aria-describedby="titleEn" name="titleEn" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="description">Description Bangla</label>
                                                <textarea required placeholder="Enter Description" name="description"
                                                    id="description" class="form-control ckeditor" aria-label="description"
                                                    aria-describedby="description"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="descriptionEn">Description English</label>
                                                <textarea  placeholder="Enter Description" name="descriptionEn"
                                                    id="descriptionEn" class="form-control ckeditor"
                                                    aria-label="descriptionEn" aria-describedby="descriptionEn"></textarea>
                                            </div>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select id="category_id" name="category_id" class="form-control select2"
                                                    aria-label="category_id" aria-describedby="category_id">
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}">{{ $category->nameBn }}
                                                            ({{ $category->nameEn }})</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>



                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="subcategory_id">Sub Category</label>
                                                <select id="subcategory_id" name="subcategory_id" class="form-control select2"
                                                    aria-label="subcategory_id" aria-describedby="subcategory_id">
                                                    <option value="" selected>---- Select Sub Category---</option>
                                                    @foreach ($subcategories as $key => $subcategory)
                                                        <option value="{{ $subcategory->id }}">
                                                            {{ $subcategory->nameBn }} ({{ $subcategory->nameEn }})
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="tag">Tag</label>
                                                <select name="tags[]" id="tag" class="form-control select2" aria-label="tag"
                                                    aria-describedby="tag" multiple>
                                                    @foreach ($tags as $key => $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->nameBn }}
                                                            ({{ $tag->nameEn }})</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="status">Satus</label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="description">Image</label>

                                                    <input type="file" id="img" class="form-control img"
                                                        placeholder="Title English" aria-label="img" aria-describedby="img"
                                                        name="img" />
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please enter your name.</div>

                                                </div>

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
    <script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
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


        $('#blogAddForm').validate({
            rules: {
                title: "required",
                img: "required",
                tag: "required",
                category_id: "required",
                descriptionEn: "required",
                description: "required",
                status: "required",
                titleEn: {
                    required: true,
                    // email: true
                }
            },
            messages: {
                title: "Please specify Title (Bangla)",
                img: "Please Selcect Image",
                tag: "Please Selcect Tag",
                status: "Please Selcect Status",
                category_id: "Please Selcect Category",
                descriptionEn: "Please specify Description (English)",
                description: "Please specify Description (Bangla)",
                titleEn: {
                    required: "Please specify Title (English)",
                    // email: "Your email address must be in the format of name@domain.com"
                }
            }
        });
        CKEDITOR.instances.description.updateElement();

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



    </script>

@endsection

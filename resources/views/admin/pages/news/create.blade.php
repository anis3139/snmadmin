@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)

@section('content')
@include('ErrorMessage')
    <div class="row">
        <div class="col s12">
            <div id="input-fields" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Add</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.index') }}">List</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.create') }}">Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="view-input-fields">
                        <div class="row">
                            <div class="col s12">
                                @if ($message = Session::get('success'))
                                    <div class="card-alert card green">
                                        <div class="card-content white-text">
                                            <p>SUCCESS : {{ $message }}</p>
                                        </div>
                                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($message = Session::get('failed'))
                                        <div class="card-alert card red">
                                            <div class="card-content white-text">
                                                <p>DANGER : {{ $message }}</p>
                                            </div>
                                            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                @endif

                                <form class="row" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="row">
                                        <div class="col s12 m6 l8">
                                            <div class="card subscriber-list-card animate fadeRight">
                                                <div class="card-content pb-1">
                                                    <h5 class="card-title mb-0">Title & Description</h5>
                                                </div>
                                                <section class="full-editor">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <div class="input-field col s12">
                                                                        <input placeholder="Enter Title" id="title" type="text" name="title" class="validate @error('title') validate @enderror">
                                                                        <label for="first_name1">Title</label>
                                                                        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('title') }}</span>
                                                                    </div>
                                                                    <h4 class="card-title">Full Editor</h4>

                                                                    <div class="row">
                                                                        <div class="col s12">
                                                                            <div id="full-wrapper">
                                                                                <div id="full-container">
                                                                                    <textarea class="editor" name="description" id="editor" cols="30"
                                                                                              rows="20"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('description') }}</span>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                                                                <i class="material-icons right">send</i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </section>
                                                <!-- full Editor end -->

                                            </div>
                                        </div>
                                        <div class="col s12 m6 l4">

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Category</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            @foreach($categories as $key => $category)
                                                                <p class="mb-1">
                                                                    <label>
                                                                        <input type="checkbox" name="category" value="{{ $category->id }}" class="filled-in" />
                                                                        <span>{{ $category->nameBn }}</span>
                                                                    </label>
                                                                </p>
                                                            @endforeach
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('categories') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Sub Category</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            @foreach($subcategories as $key => $subcategory)
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input  type="checkbox" name="subcategory[]" value="{{ $subcategory->id }}" class="filled-in" />
                                                                    <span>{{ $subcategory->nameEn }}</span>
                                                                </label>
                                                            </p>
                                                            @endforeach
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('subcategory[]') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">


                                                        <div id="view-checkboxes">

                                                                <div class="col s12">
                                                                    <input type="file" name="img" id="input-file-now" class="dropify" data-default-file="" />
                                                                </div>
                                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('img') }}</span>

                                                </div>
                                            </div>
                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Tags</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            @foreach($tags as $key => $tag)
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input name="tags[]" type="checkbox" value="{{ $tag->id }}" class="filled-in" />
                                                                    <span>{{ $tag->nameBn }}</span>
                                                                </label>
                                                            </p>
                                                            @endforeach
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('tags') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/dropify/css/dropify.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/quill.bubble.css')}}">
@endpush
@push('custom-js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin/app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/form-file-uploads.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/ui-alerts.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('admin/app-assets/vendors/quill/katex.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/quill/quill.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('admin/app-assets/js/scripts/form-editor.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
        (function ($) {
            "use strict";

            jQuery(document).ready(function ($) {
                var quill = new Quill('#editor', {
                    modules: {
                        toolbar: '#toolbar'
                    },
                    theme: 'snow'
                });
            });


        }(jQuery));
    </script>
@endpush


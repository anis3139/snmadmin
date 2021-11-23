@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">View</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">View
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">
        <!-- Responsive tables start -->
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View</h4>
                    </div>
                    <div class="card-body">

                        <form class="row" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" files="true">
                            @csrf
                            <div class="row">
                                <div class="col s12 m6 l8">
                                    <div class="card m-0 hoverable">
                                        <div class="card-content">
                                            <div class="card-header pb-1">
                                                <div class="card-text">
                                                    <h6 class="m-0">{{ $blog->title }}</h6>
                                                    <small>{{ $blog->created_at->toFormattedDateString() }}</small>
                                                </div>
                                            </div>
                                            <div class="divider"></div>

                                            <br>
                                            <p class="card-text mt-1">
                                                {{ $blog->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">

                                    <div class="col s12">
                                        <div id="checkboxes" class="card card-tabs">
                                            <div class="card-content">
                                                <div class="card-title">
                                                    <div class="row">
                                                        <div class="col s12 m6 l10">
                                                            <h4 class="card-title">Image</h4>
                                                        </div>
                                                        <div class="col s12">

                                                            @if($blog->image != null)
                                                            <img class="responsive-img" style="width:100%; height: 200px" src="{{ asset($blog->image) }}" alt="">
                                                            @elseif(isset($blog->subcategory->image))
                                                            <img class="responsive-img" style="width:100%; height: 200px" src="{{ asset($blog->subcategory->image) }}" alt="28.png">
                                                            @else

                                                            @endif
                                                        </div>
                                                    </div>

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
        <!-- Responsive tables end -->
    </div>
</div>
@endsection

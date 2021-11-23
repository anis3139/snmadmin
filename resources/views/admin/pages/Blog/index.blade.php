@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')
@include('ErrorMessage')
    <!-- Page Length Options -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.index') }}">List</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.create') }}">Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                            <table   id="dataTable" class="table table-bordered table-striped common-datatables" style="width:100%; padding: 10px">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name Bn</th>
                                    <th>Name En</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->nameBn }}</td>
                                        <td>{{ $category->nameEn }}</td>
                                        <td>
                                            <img src="{{ asset($category->image) }}" style="border-radius: 5px;" width="50" height="50" class="responsive-img mb-10" alt="">
                                        </td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <span class="badge {{ $category->status == 1 ? 'blue' : 'red' }}">{{ $category->status == 1 ? 'Active' : 'Deactive' }}</span>
                                        </td>
                                        <td>
                                            <div class="icon-preview col s6 m3">
                                                <a href="{{ route('category.edit', $category->id) }}" method="GET">
                                                    <i class="material-icons dp48">edit</i>
                                                </a>

                                            </div>
                                            <div class="icon-preview col s6 m3">
                                                <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn" type="submit" onclick="return confirm(' you want to delete?');">
                                                        <i class="material-icons dp48">delete</i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
 
@push('custom-js')
   
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/ui-alerts.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
@endpush

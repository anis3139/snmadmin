@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">category List
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

                        <div class="card-header d-flex">
                            <div class="left">
                                <h4 class="card-title">category List</h4>
                            </div>
                            <div class="right">
                                <a class="btn btn-primary btn-learge" href="{{ route('category.create') }}">Add Blog</a>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                        <div class="table-responsive p-1">
                            <table   id="dataTable" class="table table-bordered table-striped common-datatables p-1" style="width:100%; padding: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th>Name Bn</th>
                                        <th>Name En</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Blog Count</th>
                                        <th>Status</th>
                                        <th scope="col" class="text-nowrap text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td class="text-nowrap">{{ $loop->iteration }}</td>
                                            <td>{{ $category->nameBn }}</td>
                                            <td>{{ $category->nameEn }}</td>
                                            <td>
                                                <img src="{{ asset($category->image) }}" style="border-radius: 5px;"
                                                    width="50" height="50" class="responsive-img mb-10" alt="">
                                            </td>
                                            <td>{{ $category->description }}</td>
                                            <td>{{ $category->blog->count() }}</td>
                                            <td>
                                                <span
                                                    class="{{ $category->status == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{ $category->status == 1 ? 'Active' : 'Deactive' }}</span>
                                            </td>
                                            <td>
                                                <div class="float-right">
                                                    <form action="{{ route('category.delete', $category->id) }}"
                                                        method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                            Edit
                                                        </a>
                                                        <button id="btnDelete" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->
        </div>
    </div>
@endsection

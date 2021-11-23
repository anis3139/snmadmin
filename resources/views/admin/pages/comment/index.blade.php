@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Pending List</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Pending List List
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
                                <h4 class="card-title">Comment Pending List </h4>
                            </div>
                            <div class="right">
                                <a class="btn btn-success btn-learge" href="{{ route('comment.approve.list') }}">Approved
                                    List</a>
                                <a class="btn btn-danger btn-learge" href="{{ route('comment.pending.list') }}">Pending
                                    List</a>
                            </div>
                        </div>
                        <div class="card-body">


                        </div>
                        <div class="table-responsive p-1">
                            <table  id="dataTable" class="table table-bordered table-striped common-datatables p-1" style="width:100%; padding: 10px">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th scope="col" class="text-nowrap text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $tag)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $tag->blog->title }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->email }}</td>
                                            <td>{{ $tag->phone }}</td>
                                            <td>{{ $tag->comment }}</td>
                                            <td>

                                                <span
                                                    class="badge badge-{{ $tag->status == 1 ? 'success' : 'danger' }}  ">{{ $tag->status == 1 ? 'Approved' : 'Pending' }}</span>
                                            </td>
                                            <td>

                                                <div class="icon-preview col s6 m3">
                                                    <a href="{{ route('blog.view', $tag->blog_id) }}" method="GET"
                                                        title="View">
                                                        <i data-feather="view"></i><span class="btn btn-sm btn-secondary">
                                                            View Post </span>
                                                    </a>

                                                </div>
                                                @if ($tag->status == 0)
                                                <div class="icon-preview col s6 m3 mt-1">
                                                    <form
                                                        action="{{ route('comment.pending.list.approve', $tag->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button style="border: none; background: transparent "
                                                            type="submit"
                                                            onclick="return confirm('Are you sure, want to Approve?');">
                                                            <i data-feather="eye"></i><span
                                                                class="text-white btn btn-success btn-sm">
                                                                Approve </span>
                                                        </button>
                                                    </form>

                                                </div>
                                            @endif
                                                <div class="icon-preview col s6 m3">
                                                    <form action="{{ route('comment.destroy', $tag->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn" type="submit"
                                                            onclick="return confirm(' you want to delete?');">
                                                            <i data-feather='trash'></i><span class="btn btn-sm btn-danger">
                                                                delete </span>
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
            <!-- Responsive tables end -->
        </div>
    </div>
@endsection

@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Approve List</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Approve List List
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
                            <h4 class="card-title">Comment Approve List </h4>
                        </div>
                        <div class="right">
                            <a class="btn btn-primary btn-learge" href="{{ route('comment.list') }}">Back To Comment List</a>
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
                                @foreach($approvelists as $key=>$tag)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $tag->blog->title }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->email }}</td>
                                    <td>{{ $tag->phone }}</td>
                                    <td>{{ $tag->comment }}</td>
                                    <td>
                                        <span class="badge {{ $tag->status == 1 ? 'blue' : 'red' }}">{{ $tag->status == 1 ? 'Approved' : 'Pending' }}</span>
                                    </td>
                                    <td>
                                        <div class="icon-preview col s6 m3">
                                            <a href="{{ route('blog.view', $tag->blog_id) }}" method="GET" title="View">
                                                <i class="material-icons dp48">remove_red_eye</i>
                                            </a>

                                        </div>
                                        <div class="icon-preview col s6 m3">
                                            <form action="{{ route('comment.destroy', $tag->id) }}" method="POST">
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
        <!-- Responsive tables end -->
    </div>
</div>
@endsection

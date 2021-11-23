@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-6">
                    <h2 class="content-header-title float-left mb-0">News</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">News List
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
                            <h4 class="card-title">News List</h4>
                        </div>
                        <div class="right">
                            <a class="btn btn-primary btn-learge" href="{{ route('news.create') }}">Add News</a>
                        </div>
                    </div>
                    <div class="card-body">


                    </div>
                    <div class="table-responsive p-1">
                        <table   id="dataTable" class="table table-bordered table-striped common-datatables" style="width:100%; padding: 10px">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Total View</th>
                                    <th>Status</th>
                                    <th scope="col" class="text-nowrap text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($news as $key=>$n)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td>{{ $n->title }}</td>
                                    <td>
                                        {!! nl2br(\Illuminate\Support\Str::limit($n->description, 100, '') ) !!}
                                        ................
                                    </td>
                                    <td>
                                        @if($n->image != null)
                                        <img src="{{ asset($n->image) }}" style="border-radius: 5px;" width="50" height="50" class="responsive-img mb-10" alt="">
                                        @elseif(isset($n->subcategory->image))
                                        <img src="{{ asset($n->subcategory->image) }}" style="border-radius: 5px;" width="50" height="50" class="responsive-img mb-10" alt="">
                                        @else

                                        @endif
                                    </td>
                                    <td>{{ $n->view_count }}</td>
                                    <td>
                                        <span class="{{ $n->status == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{ $n->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                    <td>
                                        <div class="float-right">
                                            <form action="{{ route('news.delete', $n->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('news.edit', $n->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    Edit
                                                </a>
                                                <a href="{{ route('news.view', $n->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    show
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

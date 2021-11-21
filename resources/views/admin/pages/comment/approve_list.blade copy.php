@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')

    <!-- Page Length Options -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Approve List</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('comment.approve.list') }}">Appro.</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('comment.pending.list') }}">Pendi.</a></li>
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
                            <table id="page-length-option" class="display">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($approvelists as $key=>$tag)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $tag->news->title }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->email }}</td>
                                        <td>{{ $tag->phone }}</td>
                                        <td>{{ $tag->comment }}</td>
                                        <td>
                                            <span class="badge {{ $tag->status == 1 ? 'blue' : 'red' }}">{{ $tag->status == 1 ? 'Approved' : 'Pending' }}</span>
                                        </td>
                                        <td>
{{--                                            <div class="icon-preview col s6 m3">--}}
{{--                                                <form action="{{ route('comment.pending.list.approve',$tag->id) }}" method="GET">--}}
{{--                                                    @csrf--}}
{{--                                                    <button style="border: none; background: transparent" type="submit" onclick="return confirm('Are you sure, want to Approve?');">--}}
{{--                                                        <i class="material-icons dp48" title="Approve Comment">check</i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}

{{--                                            </div>--}}
                                            <div class="icon-preview col s6 m3">
                                                <a href="{{ route('news.view', $tag->news_id) }}" method="GET" title="View">
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
        </div>
    </div>

@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/data-tables.css')}}">

@endpush
@push('custom-js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('admin/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('admin/app-assets/js/scripts/data-tables.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/ui-alerts.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
@endpush

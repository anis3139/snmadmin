@extends('admin.layouts.master')
@can('admin.view')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Admin</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">View Admin</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include ('components.flash-messages')

        <section id="advanced-search-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                            <div class="col-sm-10 mt-1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ol class="breadcrumb float-sm-right">
                                            <li style="margin: 2px;">
                                            <a class="btn btn-info btn-sm" href="{{ route('common.export',['extension'=>'csv','type'=>'admin']) }}">
                                                <i data-feather='file-text'></i> CSV</a>
                                            </li>
                                            <li style="margin: 2px;">
                                                <a class="btn btn-secondary btn-sm" href="{{ route('common.export',['extension'=>'xlsx','type'=>'admin']) }}">
                                                <i data-feather='download'></i> Excel</a>
                                            </li>
                                            <li style="margin: 2px;">
                                                <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="showModal(' for Admin','admin')">
                                                <i data-feather='upload'></i> Import</a>
                                            </li>
                                            <li style="margin: 2px;">
                                            <a class="btn btn-danger btn-sm" href="{{ route('common.print',['action'=>'pdf','api'=>'admin']) }}" target="_blank">
                                            <i data-feather='file'></i> PDF</a></li>
                                            <li style="margin: 2px;">
                                            <a class="btn btn-warning btn-sm" href="{{ route('common.print',['action'=>'print','api'=>'admin']) }}" target="_blank">
                                            <i data-feather='printer'></i> Print</a></li>
                                            @can('admin.view')
                                            <li style="margin: 2px;"><a class="btn btn-primary btn-sm" href="{{ route('admin.index') }}"><i data-feather='eye'></i> View</a></li>
                                                @endcan
                                            @can('admin.create')
                                            <li style="margin: 2px;"><a class="btn btn-dark btn-sm" href="{{ route('admin.create') }}"><i data-feather='plus'></i> Create</a></li>
                                                @endcan
                                            <li style="margin: 2px;"><div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Column</button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                    >
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Name</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Email</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Phone</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Address</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Admin Type</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Status</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Social Links</a>
                                                        <div class="col-md-12 p-1">
                                                            <button class="btn btn-sm btn-primary btn-block">Apply</button>
                                                        </div>
                                                    </div>
                                                </div></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0" />
                        <div class="col-sm-12">
                            <table class="table table-bordered table-responsive common-datatables" style="width:100%; padding: 10px">
                                <thead>
                                <tr>
                                    <th style="width: 3%">SL</th>
                                    <th style="width: 2%"><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                    <th style="width: 10%">Action</th>
                                    <th style="width: 20%">Full Name</th>
                                    <th style="width: 20%">User Name</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 10%">Phone</th>
                                    <th style="width: 10%">Admin Type</th>
                                    <th style="width: 10%">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($admins!="")
                                    @foreach($admins as $key=>$admin)
                                        <tr id="tablerow{{ $key }}">
                                        <td>{{ $admin->id }}</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="{{ $admin->id }}" /></td>
                                        <td class="text-nowrap">
                                            @can('admin.view')
                                            <a href="{{ route('admin.show',$admin->id) }}"><i data-feather='eye'></i></a>
                                            @endcan
                                            @can('admin.edit')
                                            <a href="{{ route('admin.edit',$admin->id) }}"><i data-feather='edit'></i></a>
                                            @endcan
                                            @can('admin.delete')
                                            @if ($admin->id!=1)
                                            <a href="#" onclick="singleDelete({{ $admin->id }},'admin');"><i data-feather='trash-2'></i></a>
                                            @endif
                                            @endcan
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td><button class="btn btn-sm btn-primary">{{ ucfirst($admin->getRoleNames()[0]) }}</button></td>
                                        <td>
                                            @php

                                                $btnClass=['danger', 'success', 'warning', 'info', 'danger']
                                            @endphp
                                            @foreach ($enumStatuses as $key => $status)
                                                @if ($admin->status == $key)
                                                    <button class="btn btn-sm btn-{{ $btnClass[$key]}}">
                                                            {{$enumStatuses[$key]}}
                                                        </button>
                                                @endif
                                            @endforeach

                                    </td>
                                    </tr>
                                    @endforeach
                                @endif

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--/ Advanced Search -->


@endsection

@section('page-script')
@endsection
@endcan

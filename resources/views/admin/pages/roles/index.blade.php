@extends('admin.layouts.master')
@can('role.view')
@section('content')
    <section id="advanced-search-datatable">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Role</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">View Role</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-12">
            <div class="card invoice-list-wrapper">
                <div class="card-header border-bottom">
                   <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    <div class="col-sm-10 mt-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <ol class="breadcrumb float-sm-right">
                                    <li style="margin: 2px;"><button class="btn btn-info btn-sm"><i data-feather='file-text'></i> CSV</button></li>
                                    <li style="margin: 2px;"><button class="btn btn-success btn-sm"><i data-feather='download'></i> Excel</button></li>
                                    <li style="margin: 2px;"><button class="btn btn-danger btn-sm"><i data-feather='file'></i> PDF</button></li>
                                    <li style="margin: 2px;"><button class="btn btn-warning btn-sm"><i data-feather='printer'></i> Print</button></li>
                                    @can('role.view')
                                    <li style="margin: 2px;"><a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}"><i data-feather='eye'></i> View</a></li>
                                    @endcan
                                    @can('role.create')
                                    <li style="margin: 2px;"><a class="btn btn-dark btn-sm" href="{{ route('admin.roles.create') }}"><i data-feather='plus'></i> Create</a></li>
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
                                                <a class="dropdown-item" href="javascript:void(0);">ID</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Image</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Name</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Banner Type</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Status</a>
                                            </div>
                                        </div></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    @include('Message')
                </div>
                <hr>
                <div class="card-datatable mb-2">
                    <div class="col-sm-12">
                        <table id="dataTable" class="table table-bordered table-striped common-datatables" style="width:100%; padding: 10px">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                <th>Action</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($roles as $role)
                               <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    @can('role.view')
                                    <a href="{{ route('admin.roles.show', $role->id) }}" title="view"><i data-feather='eye'></i></a>
                                    @endcan
                                 @if ( $role->id!=1)
                                    @can('role.edit')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" title="edit"><i data-feather='edit'></i></a>
                                    @endcan
                                    @can('role.delete')

                                    <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();" title="delete"><i data-feather='trash-2'></i></a>

                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endcan
                                     @endif
                                    <a href="#" title="info"><i data-feather='more-vertical'></i></a>
                                </td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $perm)
                                                <button class="btn btn-info btn-sm" style="margin-left: 1px; margin-bottom:2px;" type="button">
                                                    <i data-feather='shield'></i> {{ $perm->name }}
                                                  </button>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$role->created_at->diffForHumans(null, false, true)}}
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
    </section>
@endsection
@endcan

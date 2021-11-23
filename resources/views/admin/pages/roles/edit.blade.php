@extends('admin.layouts.master')
@can('role.edit')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Home</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Role</a>
                                </li>
                                <li class="breadcrumb-item active">Edit {{ $role->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="left">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i
                                            class="fas fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="right">
                                    @can('role.view')
                                    <a class="btn btn-primary btn-learge" href="{{ route('admin.roles.index') }}"><i
                                            data-feather='eye'></i> View List{{ request()->name }}</a>
                                            @endcan
                                            @can('role.create')
                                    <a class="btn btn-dark btn-learge" href="{{ route('admin.roles.create') }}"><i
                                            data-feather='plus'></i> Create New</a>
                                            @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST"
                                    enctype="multipart/form-data" files="true">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">

                                            <label class="card-title" for="name">Role Name</label>
                                            <input id="name" placeholder="Name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $role->name }}" autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <h4 class="card-title">Permissions</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="demo-inline-spacing"
                                                    style="display: flex; flex-direction: column; align-items: baseline;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="checkPermissionAll" value="1"
                                                            {{ \App\Models\Admin::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <hr>
                                        <div class="row px-3">
                                            @php $i = 1; @endphp
                                            @foreach ($permission_groups as $group)
                                                @php
                                                    $permissions = \App\Models\Admin::getpermissionsByGroupName($group->name);
                                                    $j = 1;
                                                @endphp
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="{{ $i }}Management"
                                                            value="{{ $group->name }}"
                                                            onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                                            {{ App\Models\Admin::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="checkPermission">{{ $group->name }}</label>
                                                    </div>
                                                    <hr>

                                                    <div class=" role-{{ $i }}-management-checkbox">
                                                        @php
                                                            $permissions = \App\Models\Admin::getpermissionsByGroupName($group->name);
                                                            $j = 1;
                                                        @endphp

                                                        @foreach ($permissions as $permission)
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                                                    name="permissions[]"
                                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                    id="checkPermission{{ $permission->id }}"
                                                                    value="{{ $permission->name }}">
                                                                <label class="form-check-label"
                                                                    for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                            @php  $j++; @endphp
                                                        @endforeach
                                                        <br>
                                                    </div>

                                                </div>
                                                @php  $i++; @endphp
                                            @endforeach

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn btn-danger right" type="reset">Cancel</button>
                                            <button class="btn btn-success right" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Tooltip validations end -->
        </div>
    </div>
@endsection

@section('role')
    @include('admin.pages.roles.partials.scripts')
@endsection



@endcan








@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Admin</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Admin Create
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            @include('ErrorMessage')
            <!-- Tooltip validations start -->
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="left">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="right">
                                    <a class="btn btn-primary btn-learge" href="{{ route('admin.index') }}">Admin List</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action=" {{ route('admin.update', $admin->id) }}" method="post"
                                    enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Name" id="name"
                                                    name="name" value="{{ $admin->name }}">
                                                <div id="team-message">
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" placeholder="Enter username"
                                                    id="username" name="username" value="{{ $admin->username }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" placeholder="Enter email"
                                                    id="email" name="email" value="{{ $admin->email }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="phone">phone</label>
                                                <input type="text" class="form-control" placeholder="Enter phone"
                                                    id="phone" name="phone" value="{{ $admin->phone }}">
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control">
                                                    <option value="">---Select Role---</option>
                                                    @foreach ($roles as $key => $role)
                                                        <option value="{{ $role->id }}" {{$admin->getRoleNames()[0]==$role->name ? "selected": ''}}   >{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn btn-success right" type="submit">Update</button>
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

@extends('admin.layouts.master')
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/css/plugins/forms/form-validation.css">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('') }}app-assets/css-rtl/plugins/forms/form-validation.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/css-rtl/plugins/forms/form-wizard.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ request()->name }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create {{ request()->name }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12 p-5">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="left">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i
                                            class="fas fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="right">
                                    <a class="btn btn-primary btn-learge" href="{{ route('admin.index') }}"><i
                                            data-feather='eye'></i> View Admin</a>
                                    <a class="btn btn-dark btn-learge" href="{{ route('admin.create') }}"><i
                                            data-feather='plus'></i> Create New</a>
                                </div>
                            </div>
                        </div>
                        <!-- Modern Horizontal Wizard -->
                        @include('ErrorMessage')
                        <form class="mt-2" action="{{ route('admin.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="login-name">Name</label>
                                <input id="name" placeholder="Name" type="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="login-username">Admin Name</label>
                                <input id="username" placeholder="Admin Name" type="username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="login-phone">Mobile</label>
                                <input id="phone" placeholder="Mobile" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="login-email">Email</label>
                                <input id="email" placeholder="Email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="role">Role</label>
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"
                                    value="{{ old('role') }}" autocomplete="role" autofocus>
                                    <option value="">Select Role</option>

                                    @foreach ($roles as  $role)
                                    <option value="{{$role->name}}">{{ucFirst($role->name)}}</option>
                                    @endforeach

                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                    value="{{ old('status') }}" autocomplete="status" autofocus>
                                    <option value="">Select Status</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Freez</option>
                                    <option value="4">Block</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="login-password">Password</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input id="password" placeholder="Password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                                                data-feather="eye"></i></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="login-password">Confirm Password</label>
                                </div>
                                <div class="input-group input-group-merge form-password_confirmation-toggle">
                                    <input id="password_confirmation" placeholder="Password" type="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="current-password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                                                data-feather="eye"></i></span></div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                        </form>
                        <!-- /Modern Horizontal Wizard -->
                    </div>
                </div>
            </section>
            <!-- Tooltip validations end -->
        </div>
    </div>
@endsection

@extends('admin.layouts.master')
@can('admin.edit')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Admin</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                @can('admin.view')

                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                @endcan
                                @can('admin.create')

                                <li class="breadcrumb-item active">Admin Create
                                </li>
                                @endcan
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Tooltip validations start -->
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="left">
                                    <h4 class="card-title">{{Auth::user()->roles->pluck('name')[0]?? ''}} Edit</h4>
                                </div>
                                <div class="right">
                                    <a class="btn btn-primary btn-learge" href="{{ route('admin.index') }}">Admin List</a>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('ErrorMessage')
                                <form action=" {{ route('admin.update', $admin->id) }}" method="post"
                                    enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label class="form-label" for="login-name">Name</label>
                                                <input required  id="name" placeholder="Name" type="name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ $admin->name ?? '' }}" autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">

                                                    <label class="form-label" for="login-username">User Name</label>
                                                    <input required id="username" placeholder="Admin Name" type="username"
                                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                                        value="{{ $admin->username ?? ''  }}" autocomplete="username" autofocus>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">

                                                    <label class="form-label" for="login-email">Email</label>
                                                <input required id="email" placeholder="Email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ $admin->email ?? '' }}" autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label class="form-label" for="login-phone">Mobile</label>
                                                <input required id="phone" placeholder="Mobile" type="phone"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ $admin->phone ??'' }}" autocomplete="phone" autofocus>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-md-6 col-12 mb-1">

                                            <div class="form-group">
                                                <label class="form-label" for="status">Status</label>
                                                <select required name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ old('status') }}" autocomplete="status" autofocus>
                                                    <option value="">Select Status</option>
                                                   @if ($enumStatuses)
                                                        @foreach ($enumStatuses as $key => $status)
                                                        <option {{$key==$admin->status?'selected':''}} value="{{$key}}">{{$status}}</option>
                                                        @endforeach
                                                   @endif
                                                </select>

                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        @if ($admin->id!=1)

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">

                                                <label class="form-label" for="role">Role</label>
                                                <select required name="role" id="role" class="form-control @error('role') is-invalid @enderror"
                                                        value="{{ old('role') }}" autocomplete="role" autofocus>
                                                        <option value="">Select Role</option>
                                                        @foreach ($roles as  $role)
                                                        <option value="{{$role->name}}" {{$admin->getRoleNames()[0]==$role->name ? "selected": ''}}   >{{ucFirst($role->name)}}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        @endif

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
@endcan


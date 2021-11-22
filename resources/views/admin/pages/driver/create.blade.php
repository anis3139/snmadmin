@extends('admin.layouts.master')
@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('') }}app-assets/vendors/css/forms/select/select2.min.css">
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
                        <h2 class="content-header-title float-left mb-0">Driver</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create Driver
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @include('ErrorMessage')
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="left">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="right">
                                    <a class="btn btn-primary btn-learge" href="{{ route('driver.index') }}"><i data-feather='eye'></i> View Driver</a>
                                    <a class="btn btn-dark btn-learge" href="{{ route('driver.create') }}"><i data-feather='plus'></i> Create New</a>
                                </div>
                            </div>
                            {{--<div class="card-body">
                                <form class="" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" placeholder="Enter username" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" placeholder="Enter email" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="phone">phone</label>
                                                <input type="text" class="form-control" placeholder="Enter phone" id="phone" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" placeholder="Enter password" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="text" class="form-control" placeholder="Enter password_confirmation" id="password_confirmation" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="role">Status</label>
                                                <select name="status" class="form-control">
                                                <option value="">---Select Status---</option>
                                                    @foreach($enumStatuses as $key => $status)
                                                        <option value="{{$status}}">{{ ucwords($status) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control">
                                                <option value="">---Select Role---</option>
                                                    @foreach($roles as $key => $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn btn-danger right" type="submit">Cancel</button>
                                            <button class="btn btn-info right" type="submit">Save as draft</button>
                                            <button class="btn btn-success right" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>--}}

                        </div>
                        <!-- Modern Horizontal Wizard -->
                        <section class="modern-horizontal-wizard card bg-light">
                            <div class="bs-stepper wizard-modern modern-wizard-example">
                                <div class="bs-stepper-header">
                                    <div class="step" data-target="#account-details-modern">
                                        <button type="button" class="step-trigger">
                                              <span class="bs-stepper-box">
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                              </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">User Info</span>
                                                <span class="bs-stepper-subtitle ml-2">Setup User Info</span>
                                              </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#personal-info-modern">
                                        <button type="button" class="step-trigger">
                                              <span class="bs-stepper-box">
                                                <i data-feather="user" class="font-medium-3"></i>
                                              </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Personal Details</span>
                                                <span class="bs-stepper-subtitle ml-2">Add Personal Details</span>
                                              </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#address-step-modern">
                                        <button type="button" class="step-trigger">
                                              <span class="bs-stepper-box">
                                                <i data-feather="map-pin" class="font-medium-3"></i>
                                              </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">License</span>
                                                <span class="bs-stepper-subtitle ml-2">Add License</span>
                                              </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#social-links-modern">
                                        <button type="button" class="step-trigger">
                                              <span class="bs-stepper-box">
                                                <i data-feather="link" class="font-medium-3"></i>
                                              </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Vehicle Info</span>
                                                <span class="bs-stepper-subtitle ml-2">Add Vehicle Info</span>
                                              </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#reference-modern">
                                        <button type="button" class="step-trigger">
                                              <span class="bs-stepper-box">
                                                <i data-feather="link" class="font-medium-3"></i>
                                              </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Reference</span>
                                                <span class="bs-stepper-subtitle ml-2">Add Reference</span>
                                              </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="account-details-modern" class="content m-0">
                                        <div class="content-header">
                                            <h5 class="mb-0">Account Details</h5>
                                            <small class="text-muted">Enter Your Account Details.</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-username">Username</label>
                                                <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-email">Email</label>
                                                <input
                                                    type="email"
                                                    id="modern-email"
                                                    class="form-control"
                                                    placeholder="john.doe@email.com"
                                                    aria-label="john.doe"
                                                />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group form-password-toggle col-md-6">
                                                <label class="form-label" for="modern-password">Password</label>
                                                <input
                                                    type="password"
                                                    id="modern-password"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                />
                                            </div>
                                            <div class="form-group form-password-toggle col-md-6">
                                                <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                                                <input
                                                    type="password"
                                                    id="modern-confirm-password"
                                                    class="form-control"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="personal-info-modern" class="content m-0">
                                        <div class="content-header">
                                            <h5 class="mb-0">Personal Info</h5>
                                            <small>Enter Your Personal Info.</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-first-name">First Name</label>
                                                <input type="text" id="modern-first-name" class="form-control" placeholder="John" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-last-name">Last Name</label>
                                                <input type="text" id="modern-last-name" class="form-control" placeholder="Doe" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="modern-first-name">Email</label>
                                                <input type="text" id="modern-first-name" class="form-control" placeholder="john@email.com" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="modern-last-name">Phone</label>
                                                <input type="text" id="modern-last-name" class="form-control" placeholder="+8801958084234" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="modern-last-name">Emergency Contact</label>
                                                <input type="text" id="modern-last-name" class="form-control" placeholder="+8801958084234" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label" for="modern-address">Image</label>
                                                <input
                                                    type="file"
                                                    id=""
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">Present Address</label>
                                                <input
                                                    type="text"
                                                    id="modern-address"
                                                    class="form-control"
                                                    placeholder="Banani, Dhaka"
                                                />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">Permanent Address</label>
                                                <input
                                                    type="text"
                                                    id="modern-address"
                                                    class="form-control"
                                                    placeholder="Banani, Dhaka"
                                                />
                                            </div>
                                        </div>
                                        {{--<div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-country">Country</label>
                                                <select class="select2 w-100" id="modern-country">
                                                    <option label=" "></option>
                                                    <option>UK</option>
                                                    <option>USA</option>
                                                    <option>Spain</option>
                                                    <option>France</option>
                                                    <option>Italy</option>
                                                    <option>Australia</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-language">Language</label>
                                                <select class="select2 w-100" id="modern-language" multiple>
                                                    <option>English</option>
                                                    <option>French</option>
                                                    <option>Spanish</option>
                                                </select>
                                            </div>
                                        </div>--}}
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="address-step-modern" class="content m-0">
                                        <div class="content-header">
                                            <h5 class="mb-0">License</h5>
                                            <small>Enter Your License.</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">License No.</label>
                                                <input
                                                    type="text"
                                                    id="modern-address"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">Date of Issue</label>
                                                <input
                                                    type="text"
                                                    id="modern-address"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">Date of Expire</label>
                                                <input
                                                    type="text"
                                                    id="modern-address"
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="modern-address">Image of License</label>
                                                <input
                                                    type="file"
                                                    id=""
                                                    class="form-control"
                                                />
                                            </div>
                                            {{--<div class="form-group col-md-6">
                                                <label class="form-label" for="modern-landmark">Landmark</label>
                                                <input type="text" id="modern-landmark" class="form-control" placeholder="Borough bridge" />
                                            </div>--}}
                                        </div>
                                        {{--  <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label class="form-label" for="pincode3">Pincode</label>
                                                  <input type="text" id="pincode3" class="form-control" placeholder="658921" />
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label class="form-label" for="city3">City</label>
                                                  <input type="text" id="city3" class="form-control" placeholder="Birmingham" />
                                              </div>
                                          </div>--}}
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="social-links-modern" class="content m-0">
                                        <div class="content-header">
                                            <h5 class="mb-0">Vehicle Info</h5>
                                            <small>Enter Your Vehicle Info.</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="">Vehicle Info</label>
                                                <input type="text" id="" class="form-control" placeholder="Enter your vehicle info" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="reference-modern" class="content m-0">
                                        <div class="content-header">
                                            <h5 class="mb-0">Reference Info</h5>
                                            <small>Enter Your Reference Info.</small>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="">Reference Name</label>
                                                <input type="text" id="" class="form-control" placeholder="Enter your reference info" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="">Reference Contact</label>
                                                <input type="text" id="" class="form-control" placeholder="Enter your reference contact" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label" for="">Relationship</label>
                                                <input type="text" id="" class="form-control" placeholder="Enter your reference contact" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-success btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /Modern Horizontal Wizard -->
                    </div>
                </div>
            </section>
            <!-- Tooltip validations end -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset('') }}app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('') }}app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('') }}app-assets/js/scripts/forms/form-wizard.js"></script>
@endsection

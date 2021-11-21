@extends('admin.layouts.master')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/css/modal-design.css">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Live Tracking</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Delivery</li>
                            <li class="breadcrumb-item active">Live Tracking</li>
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
                                    <li style="margin: 2px;"><button class="btn btn-secondary btn-sm"><i data-feather='download'></i> Excel</button></li>
                                    <li style="margin: 2px;"><button class="btn btn-danger btn-sm"><i data-feather='file'></i> PDF</button></li>
                                    <li style="margin: 2px;"><button class="btn btn-warning btn-sm"><i data-feather='printer'></i> Print</button></li>
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
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> ID</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Image</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> License</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Vehicle</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Full Name</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Mobile</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Emergency Contact</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Email</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Address</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Status</a>
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
                <div class="card-body mt-2">
                    <form class="dt_adv_search" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row mb-1">
                                    <div class="col-lg-3">
                                        <label>Name:</label>
                                        <input type="text"  class="form-control" />
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Mobile</label>
                                        <input type="text"  class="form-control" name="from" />
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Email</label>
                                        <input type="text"  class="form-control" name="from" />
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Status:</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Processing">Active</option>
                                            <option value="Picked">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2" style="margin-top:22px;">
                                        <input type="submit"  class="btn btn-success btn-sm" name="submit" value="Search"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order Id</th>
                            <th>Assignee</th>
                            <th>Pickup Location</th>
                            <th>Delivery Location</th>
                            <th>Billing Location</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                            <th>Map</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                32001
                            </td>
                            <td>
                                <div class="basic-modal">
                                    <a href="#" data-toggle="modal" data-target="#default">
                                       Mehedi Hasan
                                    </a>

                                    <!-- Modal -->
                                    <div
                                        class="modal fade text-left"
                                        id="default"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="DriverModal"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="DriverModal">Driver Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                                            <div class="card user-card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-xl-12 col-lg-12 mt-2 mt-xl-0">
                                                                            <div class="user-info-wrapper">
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="user" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">ID:</span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> 1234</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="user" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Image:</span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> 1234</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="user" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">License:</span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> 1234</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="user" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Full Name:</span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> eleanor.aguilar</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap my-50">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="check" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Mobile: </span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> Active</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap my-50">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="star" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Role: </span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> Admin</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap my-50">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="flag" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Country: </span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> England</p>
                                                                                </div>
                                                                                <div class="d-flex flex-wrap">
                                                                                    <div class="user-info-title">
                                                                                        <i data-feather="phone" class="mr-1"></i>
                                                                                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">Contact: </span>
                                                                                    </div>
                                                                                    <p class="card-text mb-0"> (123) 456-7890</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-primary">03-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>

                        <tr>
                            <td>{{$i++}}</td>
                            <td>32002</td>
                            <td>Mehedi Hasan</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-warning"><i data-feather='calendar'></i> 04-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32003</td>
                            <td>Shakil Ahmed</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-warning"><i data-feather='calendar'></i> 05-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32004</td>
                            <td>Mehedi Hasan</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-warning"><i data-feather='calendar'></i> 06-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32005</td>
                            <td>Shakil Ahmed</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-primary">03-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32006</td>
                            <td>Mehedi Hasan</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-warning"><i data-feather='calendar'></i> 06-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32007</td>
                            <td>Shakil Ahmed</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-primary">03-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>32008</td>
                            <td>Saiful Islam</td>
                            <td>Banani, Dhaka</td>
                            <td>Dhanmondi, Dhaka</td>
                            <td>32, Dhanmondi, Dhaka</td>
                            <td class="text-warning"><i data-feather='calendar'></i> 07-11-2021</td>
                            <td><button class="btn btn-success btn-sm">Processing</button></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#information_modal"><i data-feather='map'></i></a>
                                <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">Order Id: 32006</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='loader'></i> Start Location: <span>Banani, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='map-pin'></i> Current Location: <span>Gulshan-2, Dhaka</span></h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h5><i data-feather='edit-2'></i> Change Driver: </h5>
                                                                <select class="form-control">
                                                                    <option>Mehedi</option>
                                                                    <option>Shakil</option>
                                                                    <option>Saiful</option>
                                                                </select>
                                                                <button class="btn btn-sm btn-primary mt-2">Apply Changes</button>
                                                            </div>
                                                            <hr>
                                                            {{--<div class="col-sm-12 mt-5">
                                                                <h5>Current Route</h5>
--}}{{--                                                                @include('dashboard.map1')--}}{{--
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- modal-content -->
                                        </form>
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                            </td>
                        </tr>
                        </tbody>

                    </table>

                    <hr>

                    <h4 class="card-text text-center"> Driver's Live Location</h4>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            @include('dashboard.map')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

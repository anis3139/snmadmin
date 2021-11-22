@extends('admin.layouts.master')
@section('content')

<!-- Advanced Search -->
<section id="advanced-search-datatable">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Orders</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">View Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Order Id</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Order Date</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Order Value</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Order Status</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Delivery Status</a>
                                                    <div class="col-md-12 p-1">
                                                        <button class="btn btn-sm btn-primary btn-block">Apply</button>
                                                    </div>
                                                </div>
                                            </div></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-sm-8">
                            <!--<div class="row">-->
                            <div class="col-md-12 text-right">
                                <button class="btn btn-info btn-sm">CSV</button>
                                <button class="btn btn-success btn-sm">Excel</button>
                                <button class="btn btn-danger btn-sm">PDF</button>
                            </div>
                            <!--<div class="col-md-6">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.create') }}"><i data-feather='eye'></i> View {{ request()->name }}</a>
                                <a class="btn btn-dark btn-sm" href="{{ route('admin.create') }}"><i data-feather='plus'></i> Create New</a>
                            </div>
                        </div>-->
                        </div>--}}
                    </div>
                    <!--Search Form -->
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-row mb-1">
                                        <div class="col-lg-2">
                                            <label>Order Id:</label>
                                            <input type="text"  class="form-control" />
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Order Status:</label>
                                            <select class="form-control" name="status">
                                            	<option value="">Select Status</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Picked">Picked</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Delivery Status:</label>
                                            <select class="form-control" name="status">
                                            	<option value="">Select Status</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>From Date</label>
                                            <input type="text"  class="form-control" name="from" />
                                        </div>
                                        <div class="col-lg-2">
                                            <label>To Date</label>
                                            <input type="text"  class="form-control" name="to" />
                                        </div>
                                        <div class="col-lg-2" style="margin-top:22px;">
                                            <input type="submit"  class="btn btn-success btn-sm" name="submit" value="Search" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <hr class="my-0" />
                    <div class="col-sm-12">
                        <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
{{--                                    <th>Action</th>--}}
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Value</th>
                                    <th>Order Status</th>
                                    <th>Delivery Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                     {{--<td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                       </div>
                                    </td>
                                </tr>
                                 <tr>
                                     <td>2</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    {{-- <td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                     <td>3</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    {{-- <td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                     <td>4</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                     {{--<td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                     <td>5</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                     {{--<td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                     <td>6</td>
                                     <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                     {{--<td class="text-nowrap">
                                         <a href="#"><i data-feather='eye'></i></a>
                                         <a href="#"><i data-feather='edit'></i></a>
                                         <a href="#"><i data-feather='trash-2'></i></a>
                                         <a href="#"><i data-feather='more-vertical'></i></a>
                                     </td>--}}
                                    <td>0001</td>
                                    <td>2021-10-31 12:10:14</td>
                                    <td>2500</td>
                                    <td><button class="btn btn-sm btn-success">Processing</button></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">In Progress</button>
                                        <div class="btn-group">
                                            <a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown"><i data-feather='more-vertical'></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="#" class="dropdown-item">Pending</a>
                                                <a href="#" class="dropdown-item">Processing</a>
                                                <a href="#" class="dropdown-item delete-record">Delivered</a>
                                                <a href="#" class="dropdown-item delete-record">Returned</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card invoice-list-wrapper">
                    <div class="card-header border-bottom">
                        <h2>Order Log</h2>
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
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Status</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Log Name</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Description</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Property Changes</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Date Time</a>
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
                    <div class="card-datatable table-responsive">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Status</th>
                                    <th>Log Name</th>
                                    <th>Description</th>
                                    <th>Property Changes</th>
                                    <th>Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From processing To delivered</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From processing To delivered</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From processing To delivered</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From processing To cancelled</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From unpaid To delivered</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Order ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From processing To delivered</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>



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


@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <!-- total users Chart Card starts -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-5"></i>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <h3 class="card-text">Total Users</h3>
                                <h4 class="font-weight-bolder mt-1">{{$user}}</h4>
                            </div>
                        </div>
                        <div id="#"></div>
                    </div>
                </div>


                {{-- @php
                    dd($notifications);
                @endphp --}}
                <!-- total users Chart Card ends -->

                <!-- Total Driver Chart Card starts -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="package" class="font-medium-5"></i>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <h3 class="card-text">Total Visitor</h3>
                                <h4 class="font-weight-bolder mt-1">{{$visitor}}</h4>
                            </div>
                        </div>
                        <div id="#"></div>
                    </div>
                </div>
                <!-- Total Driver Chart Card ends -->

                <!-- New Driver Request Chart Card starts -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="message-square" class="font-medium-5"></i>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <h3 class="card-text">New User Request</h3>
                                <h4 class="font-weight-bolder mt-1">{{$user}}</h4>
                            </div>
                        </div>
                        <div id="#"></div>
                    </div>
                </div>
                <!-- New Driver Request Chart Card ends -->
            </div>
        </section>
        @include('dashboard.partial.notification')
         <div class="row">
                <div class="col-12">
                    <div class="card invoice-list-wrapper">
                        <div class="card-header border-bottom">
                            <h2>Activity Log For {{ ucfirst(Auth::user()->roles->pluck('name')[0]) }}</h2>
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
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Deleted</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Deleted</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Deleted</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Created</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Updated</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Deleted</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>Deleted</td>
                                    <td>Product Offer ID #18804 has been updated</td>
                                    <td>updated by Admin  2 weeks ago</td>
                                    <td>status: changed From active To inactive</td>
                                    <td>2021-10-31 12:10:14</td>
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
                        <h2>System Error/Waring</h2>
                        <div class="col-sm-10">
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
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Level</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Context</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Content</a>
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
                                    <th>Level</th>
                                    <th>Context</th>
                                    <th>Content</th>
                                    <th>Date Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="fas fa-exclamation-triangle fa-2x text-warning"></i> Warning</td>
                                    <td>Production</td>
                                    <td>
                                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist
                                        (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or
                                        (`reserved_at` <= 1635659183)) order by `id` asc limit 1 for update) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42S02): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or (`reserved_at` <= 1635659183)) order by `id` asc limit 1
                                        for update) at /usr/share/nginx/html/mart-clone/vendor/laravel/framework/src/Illuminate/Database/Connection.php:669)
                                    </td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="fas fa-exclamation-circle fa-2x text-danger"></i> Error</td>
                                    <td>Staging</td>
                                    <td>
                                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist
                                        (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or
                                        (`reserved_at` <= 1635659183)) order by `id` asc limit 1 for update) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42S02): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or (`reserved_at` <= 1635659183)) order by `id` asc limit 1
                                        for update) at /usr/share/nginx/html/mart-clone/vendor/laravel/framework/src/Illuminate/Database/Connection.php:669)
                                    </td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="fas fa-exclamation-triangle fa-2x text-warning"></i> Warning</td>
                                    <td>Staging</td>
                                    <td>
                                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist
                                        (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or
                                        (`reserved_at` <= 1635659183)) order by `id` asc limit 1 for update) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42S02): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or (`reserved_at` <= 1635659183)) order by `id` asc limit 1
                                        for update) at /usr/share/nginx/html/mart-clone/vendor/laravel/framework/src/Illuminate/Database/Connection.php:669)
                                    </td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="fas fa-exclamation-triangle fa-2x text-danger"></i> Error</td>
                                    <td>Production</td>
                                    <td>
                                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist
                                        (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or
                                        (`reserved_at` <= 1635659183)) order by `id` asc limit 1 for update) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42S02): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or (`reserved_at` <= 1635659183)) order by `id` asc limit 1
                                        for update) at /usr/share/nginx/html/mart-clone/vendor/laravel/framework/src/Illuminate/Database/Connection.php:669)
                                    </td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><i class="fas fa-exclamation-circle fa-2x text-danger"></i> Warning</td>
                                    <td>Production</td>
                                    <td>
                                        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist
                                        (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or
                                        (`reserved_at` <= 1635659183)) order by `id` asc limit 1 for update) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 42S02): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'aleshatechdriverapp.jobs' doesn't exist (SQL: select * from `jobs` where `queue` = default and ((`reserved_at` is null and `available_at` <= 1635659273) or (`reserved_at` <= 1635659183)) order by `id` asc limit 1
                                        for update) at /usr/share/nginx/html/mart-clone/vendor/laravel/framework/src/Illuminate/Database/Connection.php:669)
                                    </td>
                                    <td>2021-10-31 12:10:14</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

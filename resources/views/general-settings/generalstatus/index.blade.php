@extends('admin.layouts.master')
@section('content')

<!-- Advanced Search -->
<section id="advanced-search-datatable">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">General Status</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item">Settings</li>
                            <li class="breadcrumb-item active">General Status</li>
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
                        <h4>Create New</h4>
                    </div>
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-row mb-1">
                                        <div class="col-lg-3">
                                            <label>Company Name:</label>
                                            <input type="text" value="Aleshamart" disabled class="form-control" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Name:</label>
                                            <input type="text"  class="form-control" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Status:</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option value="Processing">Active</option>
                                                <option value="Picked">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                           <button class="btn btn-primary mt-2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="card-header border-bottom">
                        <h4 class="m-0">View List</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
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
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Name</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Status</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Created At</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Updated At</a>
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
                    <!--Search Form -->
                    <hr class="my-0" />
                    <ul class="nav nav-pills m-1" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link d-flex align-items-center active"
                                id="aleshamart-tab"
                                data-toggle="tab"
                                href="#aleshamart"
                                aria-controls="aleshamart"
                                role="tab"
                                aria-selected="true"
                            >
                                <i class="far fa-building"></i><span class="d-none d-sm-block">Aleshamart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link d-flex align-items-center"
                                id="daraz-tab"
                                data-toggle="tab"
                                href="#daraz"
                                aria-controls="daraz"
                                role="tab"
                                aria-selected="false"
                            >
                                <i class="far fa-building"></i><span class="d-none d-sm-block">Daraz</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link d-flex align-items-center"
                                id="evaly-tab"
                                data-toggle="tab"
                                href="#evaly"
                                aria-controls="evaly"
                                role="tab"
                                aria-selected="false"
                            >
                                <i class="far fa-building"></i><span class="d-none d-sm-block">Evaly</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link d-flex align-items-center"
                                id="chaldal-tab"
                                data-toggle="tab"
                                href="#chaldal"
                                aria-controls="chaldal"
                                role="tab"
                                aria-selected="false"
                            >
                                <i class="far fa-building"></i><span class="d-none d-sm-block">Chaldal</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Account Tab starts -->
                        <div class="tab-pane active" id="aleshamart" aria-labelledby="aleshamart-tab" role="tabpanel">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Active</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Inactive</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- Account Tab ends -->

                        <!-- Information Tab starts -->
                        <div class="tab-pane" id="daraz" aria-labelledby="daraz-tab" role="tabpanel">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Active</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Inactive</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- Information Tab ends -->

                        <!-- Social Tab starts -->
                        <div class="tab-pane" id="evaly" aria-labelledby="evaly-tab" role="tabpanel">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Active</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Inactive</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- Social Tab ends -->
                        <!-- Social Tab starts -->
                        <div class="tab-pane" id="chaldal" aria-labelledby="chaldal-tab" role="tabpanel">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Active</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                        <td class="text-nowrap">
                                            <a href="#"><i data-feather='edit'></i></a>
                                            <a href="#"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>Inactive</td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td>2021-10-31 12:10:14</td>
                                        <td>2021-10-31 12:10:14</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- Social Tab ends -->
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


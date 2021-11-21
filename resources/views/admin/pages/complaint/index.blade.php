@extends('admin.layouts.master')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Complaint</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">View Complaint</li>
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
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> ID</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Name</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Email</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Subject</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Issue</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Created at</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Updated at</a>
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
                        <div class="card-body mt-2">
                            <form class="dt_adv_search" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row mb-1">
                                            <div class="col-lg-3">
                                                <label>Name</label>
                                                <input type="text"  class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Email</label>
                                                <input type="text"  class="form-control" name="from" />
                                            </div>
                                            <div class="col-lg-2">
                                                <label>Issue</label>
                                                <input type="text"  class="form-control" name="from" />
                                            </div>

                                            <div class="col-lg-2" style="margin-top:22px;">
                                                <input type="submit"  class="btn btn-success btn-sm" name="submit" value="Search"/>
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
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Issue</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>

                                </tr>
                                </thead>
                                @php $i=1; @endphp
                                <tbody>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    <td class="text-nowrap">
                                        <a href="#"><i data-feather='eye'></i></a>
                                        <a href="#"><i data-feather='more-vertical'></i></a>
                                    </td>
                                    <td>1234</td>
                                    <td>Arif</td>
                                    <td>test@gmail.com</td>
                                    <td>Query</td>
                                    <td>Product problem</td>
                                    <td>1-10-21</td>
                                    <td>1-10-21</td>

                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    <td class="text-nowrap">
                                        <a href="#"><i data-feather='eye'></i></a>
                                        <a href="#"><i data-feather='more-vertical'></i></a>
                                    </td>
                                    <td>1234</td>
                                    <td>Arif</td>
                                    <td>test@gmail.com</td>
                                    <td>Query</td>
                                    <td>Product problem</td>
                                    <td>1-10-21</td>
                                    <td>1-10-21</td>

                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    <td class="text-nowrap">
                                        <a href="#"><i data-feather='eye'></i></a>
                                        <a href="#"><i data-feather='more-vertical'></i></a>
                                    </td>
                                    <td>1234</td>
                                    <td>Arif</td>
                                    <td>test@gmail.com</td>
                                    <td>Query</td>
                                    <td>Product problem</td>
                                    <td>1-10-21</td>
                                    <td>1-10-21</td>

                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    <td class="text-nowrap">
                                        <a href="#"><i data-feather='eye'></i></a>
                                        <a href="#"><i data-feather='more-vertical'></i></a>
                                    </td>
                                    <td>1234</td>
                                    <td>Arif</td>
                                    <td>test@gmail.com</td>
                                    <td>Query</td>
                                    <td>Product problem</td>
                                    <td>1-10-21</td>
                                    <td>1-10-21</td>

                                </tr>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                    <td class="text-nowrap">
                                        <a href="#"><i data-feather='eye'></i></a>
                                        <a href="#"><i data-feather='more-vertical'></i></a>
                                    </td>
                                    <td>1234</td>
                                    <td>Arif</td>
                                    <td>test@gmail.com</td>
                                    <td>Query</td>
                                    <td>Product problem</td>
                                    <td>1-10-21</td>
                                    <td>1-10-21</td>

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

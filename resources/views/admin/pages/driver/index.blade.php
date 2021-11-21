@extends('admin.layouts.master')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/css/base/plugins/forms/form-validation.css">
    <link rel="stylesheet" href="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/css/base/plugins/forms/pickers/form-flat-pickr.css">
@endsection
@section('content')
    <section id="advanced-search-datatable">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Driver</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">View Drivers</li>
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
                                    <li style="margin: 2px;"><a class="btn btn-primary btn-sm" href="{{ route('driver.create') }}"><i data-feather='eye'></i> View</a></li>
                                    <li style="margin: 2px;"><a class="btn btn-dark btn-sm" href="{{ route('driver.create') }}"><i data-feather='plus'></i> Create</a></li>
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
                <div class="card-datatable mb-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-responsive common-datatables" style="width:100%; padding: 10px">
                            <thead>
                            <tr>
                                <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                <th>Action</th>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>License</th>
                                <th>Vehicle</th>
                                <th>Full Name</th>
                                <th>Mobile</th>
                                <th>Emergency Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Track</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @php $i=1; @endphp
                            <tbody>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/2.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/1.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/10.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/2.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/2.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/3.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/6.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/4.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/2.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/1.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/6.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/2.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/2.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/3.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/6.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/4.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/10.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/1.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>

                            <tr>
                                <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="" /></td>
                                <td class="text-nowrap">
                                    <a href="#"><i data-feather='eye'></i></a>
                                    <a href="#"><i data-feather='edit'></i></a>
                                    <a href="#"><i data-feather='trash-2'></i></a>
                                    <a href="#"><i data-feather='more-vertical'></i></a>
                                </td>
                                <td>{{$i++}}</td>
                                <td>1234</td>
                                <td><img height="auto" width="50px" src="{{asset('app-assets/images/avatars/10.png')}}" alt="license"></td>
                                <td><img height="auto" width="80px" src="{{asset('images/license/1.jpg')}}" alt="license"></td>
                                <td>Cycle</td>
                                <td>Mehedi Hasan</td>
                                <td>01958084234</td>
                                <td>01958084235</td>
                                <td>mehedi@gmail.com</td>
                                <td>Banani, Dhaka</td>
                                <td class="text-center"><a href="#"><i data-feather='map-pin'></i></a></td>
                                <td><button class="btn btn-sm btn-success">Active</button></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection


@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
@endsection

@section('page-script')
   {{-- <script>
        checked = false;
        function checkedAll() {
            if (checked == false){checked = true}else{checked = false}
            for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
                document.getElementById('form_check').elements[i].checked = checked;
            }
        }
    </script>--}}
    {{-- Page js files --}}
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/js/scripts/pages/app-user-list.js"></script>

    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/js/scripts/tables/table-datatables-advanced.js"></script>
    <script src="http://192.168.1.224:8080/aleshatech-driver-app/atladmin/public/app-assets/data/table-datatable.json"></script>
@endsection


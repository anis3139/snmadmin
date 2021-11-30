           
        
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
                                    <th style="width:10%;">SL</th>
                                    <th style="width:20%;">Log Name</th>
                                    <th style="width:20%;">Event</th>
                                    <th style="width:40%">Description</th> 
                                    <th style="width:10%;">Date Time</th>
                                </tr>
                                </thead>
                                 <tbody>
                             @forEach($activities as $key=> $activity)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{$activity->log_name}}</td>
                                    <td>{{$activity->description}}</td> 
                                    <td style=" word-break: break-all;">{{ $activity->changes}}</td> 
                                    <td>{{$activity->created_at->diffForHumans()}}</td> 
                                </tr>
                            @endforeach
                            

                                </tbody>

                            </table>
                            </div>
                    </div>
                </div>
            </div>

        

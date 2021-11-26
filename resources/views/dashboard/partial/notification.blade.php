<div class="row">
    <div class="col-12">
        <div class="card invoice-list-wrapper">
            <div class="card-header border-bottom">
                <h2> {{ ucfirst(Auth::user()->roles->pluck('name')[0]) }} Notification</h2>

            </div>
            <div class="card-datatable table-responsive">
                <div class="col-sm-12">
                <table class="table table-striped table-bordered common-datatables" style="width:100%; padding: 10px">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Notification Type</th>
                        <th>Notification</th>
                        <th>Status</th>
                        <th>Date Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $notifications=Auth::user()->notifications;
                    @endphp
                    @foreach ($notifications as $key=> $notification)
                        <tr>
                            <td>{{$key+1}}</td>
                            @php
                               $nType = explode("\\", $notification->type);
                               $capitalArray = preg_split('/(?=[A-Z])/', $nType[2]);
                               $capitalType = ltrim(implode(' ', $capitalArray))
                            @endphp
                            <td>{{$capitalType}}</td>
                            <td>{{$notification->data['message']}}</td>
                            <td>{{$notification->read_at?'Read':'Unread'}}</td>
                            <td>{{$notification->created_at->diffForHumans()}}</td>
                            <td> <a href="{{route('admin.user.show', $notification->data['user_id'] )}}"> View this user</a></td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                </div>
        </div>
    </div>
</div>

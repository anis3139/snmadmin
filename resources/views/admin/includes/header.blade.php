<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
      </ul>
      <ul class="nav navbar-nav bookmark-icons">
        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
      </ul>
      @if(request()->has('admintype') && request()->get('admintype')!="")
      	<strong style="padding:0 5px;">{{ ucfirst(Auth::user()->roles->pluck('name')[0]) }}</strong> Panel
      @else
      {{ ucfirst(Auth::user()->roles->pluck('name')[0]) }} Panel
      @endif
    </div>

    <ul class="nav navbar-nav align-items-center ml-auto">


      <li class="nav-item dropdown dropdown-notification mr-25">
          <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i>
            @if (Auth::user()->unReadNotifications->count())
            <span class="badge badge-pill badge-danger badge-up">
                {{Auth::user()->unReadNotifications->count()}}
            </span>
            @endif
     </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 mr-auto">Notifications</h4>


              <div class="badge badge-pill badge-light-primary"> {{Auth::user()->unReadNotifications->count()}} New</div>
            </div>
          </li>
           @if (Auth::user()->unReadNotifications->count())
          <li class="scrollable-container media-list">
              @foreach (Auth::user()->unReadNotifications as $notification)
                <a class="d-flex" href="{{route('admin.user.show', $notification->data['user_id'] )}}">
                <div class="media d-flex align-items-start">
                    <div class="media-left">
                    <div class="avatar"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                    </div>
                    <div class="media-body">
                     <small class="notification-text"> {{ $notification->data['message'] }} </small>
                    </div>
                </div>
                </a>
             @endforeach
          </li>
          <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="{{route('admin.notification.read')}}">Mark All as Read</a></li>
          @else
          <li class="scrollable-container media-list">
            @foreach (Auth::user()->notifications as $notification)
              <a class="d-flex" href="{{route('admin.user.show', $notification->data['user_id'] )}}">
              <div class="media d-flex align-items-start">
                  <div class="media-left">
                  <div class="avatar"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                  </div>
                  <div class="media-body">
                   <small class="notification-text"> {{ $notification->data['message'] }} </small>
                  </div>
              </div>
            
              </a>
           @endforeach
        </li>
          @endif
        </ul>
      </li>
      <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name ?? '' }}</span><span class="user-status">{{ ucfirst(Auth::user()->roles->pluck('name')[0]) }}</span></div><span class="avatar"><img class="round" src="{{ Auth::user()->image ? asset('').Auth::user()->image : asset('').'app-assets/images/portrait/small/avatar-s-10.jpg'}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
          <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="mr-50" data-feather="power"></i>
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

            <a class="dropdown-item" href="#">
                <i class="mr-50" data-feather="user"></i>
                {{ __('Profile') }}

            </a>

            <a class="dropdown-item" href="#">
                <i class="mr-50" data-feather="power"></i>
                {{ __('Reset Password') }}
            </a>

        </div>
      </li>
    </ul>
  </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Files</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{asset('')}}app-assets/images/icons/xls.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{asset('')}}app-assets/images/icons/jpg.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{asset('')}}app-assets/images/icons/pdf.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
      <div class="d-flex">
        <div class="mr-75"><img src="{{asset('')}}app-assets/images/icons/doc.png" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
        </div>
      </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
    </a></li>
  <li class="d-flex align-items-center"><a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Members</h6>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
        </div>
      </div>
    </a></li>
  <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
      <div class="d-flex align-items-center">
        <div class="avatar mr-75"><img src="{{asset('')}}app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
        <div class="search-data">
          <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
        </div>
      </div>
    </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
    </a></li>
</ul>

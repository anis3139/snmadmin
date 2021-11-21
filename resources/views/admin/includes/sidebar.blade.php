<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
  <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"></span><i data-feather="more-horizontal"></i>
  </li>
  <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
      <ul class="menu-content">
          <li><a class="d-flex align-items-center" href="{{ route('home',['admintype'=>base64_encode('Super Admin')]) }}"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Super Admin</span></a></li>
          <li><a class="d-flex align-items-center" href="{{ route('home',['admintype'=>base64_encode('Admin')]) }}"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Admin</span></a></li>
          <li><a class="d-flex align-items-center" href="{{ route('home',['admintype'=>base64_encode('Driver')]) }}"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Driver</span></a></li>
          <li><a class="d-flex align-items-center" href="{{ route('home',['admintype'=>base64_encode('HRM')]) }}"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">HRM</span></a></li>
          <li><a class="d-flex align-items-center" href="{{ route('home',['admintype'=>base64_encode('Finance')]) }}"><i data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Finance</span></a></li>
      </ul>
  </li>

  <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Board">User</span></a>
    <ul class="menu-content">
      <li class="{{ Route::currentRouteName() === 'user.create' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('user.create') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a></li>
      <li class="{{ Route::currentRouteName() === 'user.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('user.index') }}"><i data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a></li>
    </ul>
  </li>

  <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='shield'></i><span class="menu-title text-truncate" data-i18n="Board">Role</span></a>
    <ul class="menu-content">
      <li class="{{ Route::currentRouteName() === 'roles.create' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('roles.create') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a></li>
      <li class="{{ Route::currentRouteName() === 'roles.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a></li>
    </ul>
  </li>

  <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='compass'></i><span class="menu-title text-truncate" data-i18n="Board">Partner</span></a>
    <ul class="menu-content">
      <li class="{{ Route::currentRouteName() === 'partner.create' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('partner.create') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a></li>
      <li class="{{ Route::currentRouteName() === 'partner.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('partner.index') }}"><i data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a></li>
    </ul>
  </li>

  <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='image'></i><span class="menu-title text-truncate" data-i18n="Board">Banner</span></a>
    <ul class="menu-content">
      <li class="{{ Route::currentRouteName() === 'banners.create' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('banners.create') }}"><i data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a></li>
      <li class="{{ Route::currentRouteName() === 'banners.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('banners.index') }}"><i data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a></li>
    </ul>
  </li>

  <li class="nav-item {{ Route::currentRouteName() === 'complaint.view' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('complaint.view') }}"><i data-feather='alert-triangle'></i><span class="menu-title text-truncate" data-i18n="Board">Manage Complaints</span></a>

  </li>



  <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='twitch'></i><span class="menu-title text-truncate" data-i18n="Board">Reports</span></a>
  
  </li>

    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Board">Settings</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'setting.create' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('setting.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">General Settings</span></a></li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">User Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'user_type.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('user_type.index') }}"><span class="menu-item text-truncate" data-i18n="Third Level">User Type</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Vehicle Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'vehicle_type.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('vehicle_type.index') }}"><span class="menu-item text-truncate" data-i18n="Third Level">Vehicle Type</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Delivery Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'delivery_status.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('delivery_status.index') }}"><span class="menu-item text-truncate" data-i18n="Third Level">Delivery Status</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Subscription Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'subscription_type.index' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('subscription_type.index') }}"><span class="menu-item text-truncate" data-i18n="Third Level">Subscription Type</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>



</ul>

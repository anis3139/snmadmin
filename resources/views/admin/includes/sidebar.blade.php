<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"></span><i data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('home') }}"><i
                data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center"
                    href="{{ route('home', ['admintype' => base64_encode('Super Admin')]) }}"><i
                        data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Super
                        Admin</span></a></li>
            <li><a class="d-flex align-items-center"
                    href="{{ route('home', ['admintype' => base64_encode('Admin')]) }}"><i
                        data-feather="activity"></i><span class="menu-item text-truncate"
                        data-i18n="List">Admin</span></a></li>
            <li><a class="d-flex align-items-center"
                    href="{{ route('home', ['admintype' => base64_encode('Driver')]) }}"><i
                        data-feather="activity"></i><span class="menu-item text-truncate"
                        data-i18n="List">Driver</span></a></li>
            <li><a class="d-flex align-items-center"
                    href="{{ route('home', ['admintype' => base64_encode('HRM')]) }}"><i
                        data-feather="activity"></i><span class="menu-item text-truncate"
                        data-i18n="List">HRM</span></a></li>
            <li><a class="d-flex align-items-center"
                    href="{{ route('home', ['admintype' => base64_encode('Finance')]) }}"><i
                        data-feather="activity"></i><span class="menu-item text-truncate"
                        data-i18n="List">Finance</span></a></li>
        </ul>
    </li>

    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span
                class="menu-title text-truncate" data-i18n="Board">User</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'admin.create' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.create') }}"><i
                        data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
            </li>
            <li class="{{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.index') }}"><i
                        data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
            </li>
        </ul>
    </li>

    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='shield'></i><span
                class="menu-title text-truncate" data-i18n="Board">Role</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'roles.create' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.roles.create') }}"><i
                        data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
            </li>
            <li class="{{ Route::currentRouteName() === 'roles.index' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.roles.index') }}"><i
                        data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
            </li>
        </ul>
    </li>



    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='image'></i><span
                class="menu-title text-truncate" data-i18n="Board">Banner</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'banners.create' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('banners.create') }}"><i
                        data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
            </li>
            <li class="{{ Route::currentRouteName() === 'banners.index' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('banners.index') }}"><i
                        data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
            </li>
        </ul>
    </li>






    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i></i><span
                class="menu-title text-truncate" data-i18n="Board">News</span></a>
        <ul class="menu-content">



            <li><a class="d-flex align-items-center" href="#"><i data-feather="book-open"></i><span
                        class="menu-item text-truncate" data-i18n="Second Level">Post</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'news.create' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('news.create') }}"><i
                                data-feather="plus"></i><span class="menu-item text-truncate"
                                data-i18n="List">New</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'news.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('news.index') }}"><i
                                data-feather="list"></i><span class="menu-item text-truncate"
                                data-i18n="List">View</span></a>
                    </li>
                </ul>
            </li>

            <li><a class="d-flex align-items-center" href=""><i data-feather="layout"></i><span
                        class="menu-item text-truncate" data-i18n="List">Category</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'category.create' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('category.create') }}"><i
                                data-feather="plus"></i><span class="menu-item text-truncate"
                                data-i18n="List">New</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'category.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('category.index') }}"><i
                                data-feather="list"></i><span class="menu-item text-truncate"
                                data-i18n="List">View</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="trending-down"></i><span
                        class="menu-item text-truncate" data-i18n="List">Sub
                        Category</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'subcategory.create' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('subcategory.create') }}"><i
                                data-feather="plus"></i><span class="menu-item text-truncate"
                                data-i18n="List">New</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'subcategory.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('subcategory.index') }}"><i
                                data-feather="list"></i><span class="menu-item text-truncate"
                                data-i18n="List">View</span></a>
                    </li>
                </ul>
            </li>

            <li><a class="d-flex align-items-center" href="#"><i data-feather="tag"></i><span
                        class="menu-item text-truncate" data-i18n="List">Tag</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'tag.create' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('tag.create') }}"><i
                                data-feather="plus"></i><span class="menu-item text-truncate"
                                data-i18n="List">New</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'tag.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="{{ route('tag.index') }}"><i
                                data-feather="list"></i><span class="menu-item text-truncate"
                                data-i18n="List">View</span></a>
                    </li>
                </ul>
            </li>
            <li><a
                    class="d-flex align-items-center" href="#"><i
                        data-feather="message-square"></i><span class="menu-item text-truncate"
                        data-i18n="List">Comment</span></a>
                        <ul class="menu-content">

                            <li class="{{ Route::currentRouteName() === 'comment.list' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('comment.list') }}"><i
                                        data-feather="list"></i><span class="menu-item text-truncate"
                                        data-i18n="List">All Comment</span></a>
                            </li>
                            <li class="{{ Route::currentRouteName() === 'comment.approve.list' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('comment.approve.list') }}"><i
                                        data-feather="list"></i><span class="menu-item text-truncate"
                                        data-i18n="List">Approved List</span></a>
                            </li>
                            <li class="{{ Route::currentRouteName() === 'comment.pending.list' ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('comment.pending.list') }}"><i
                                        data-feather="list"></i><span class="menu-item text-truncate"
                                        data-i18n="List">Pending List</span></a>
                            </li>
                        </ul>
            </li>
            <li class="{{ Route::currentRouteName() === 'filter.view' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('filter.view') }}"><i
                        data-feather="filter"></i><span class="menu-item text-truncate" data-i18n="List">Filter News</span></a>
            </li>
        </ul>
    </li>

    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='mail'></i><span
                class="menu-title text-truncate" data-i18n="Board">Contacts</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'contact.index' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('contact.index') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
            </li>
        </ul>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span
                class="menu-title text-truncate" data-i18n="Board">Settings</span></a>
        <ul class="menu-content">
            <li class="{{ Route::currentRouteName() === 'setting.create' ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('setting.create') }}"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                        data-i18n="Second Level">General
                        Settings</span></a></li>

            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Second Level">Subscription Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteName() === 'subscription_type.index' ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="#"><span
                                class="menu-item text-truncate" data-i18n="Third Level">Subscription Type</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>


</ul>

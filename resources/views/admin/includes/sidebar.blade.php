<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"></span><i data-feather="more-horizontal"></i>
    </li>
    @can('home.view')
        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('home') }}"><i
                    data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
            <ul class="menu-content">
                @hasrole('superadmin')
                    <li><a class="d-flex align-items-center"
                            href="{{ route('home') }}"><i
                                data-feather="activity"></i><span class="menu-item text-truncate" data-i18n="List">Super
                                Admin</span></a></li>
                @endhasrole
                @hasrole('admin')
                    <li><a class="d-flex align-items-center"
                            href="{{ route('home') }}"><i
                                data-feather="activity"></i><span class="menu-item text-truncate"
                                data-i18n="List">Admin</span></a></li>
                @endhasrole
                @hasrole('editor')
                    <li><a class="d-flex align-items-center"
                            href="{{ route('home') }}"><i
                                data-feather="activity"></i><span class="menu-item text-truncate"
                                data-i18n="List">Driver</span></a></li>
                @endhasrole
                @hasrole('hr')
                    <li><a class="d-flex align-items-center"
                            href="{{ route('home') }}"><i
                                data-feather="activity"></i><span class="menu-item text-truncate"
                                data-i18n="List">HRM</span></a></li>
                @endhasrole
                @hasrole('finance')
                    <li><a class="d-flex align-items-center"
                            href="{{ route('home') }}"><i
                                data-feather="activity"></i><span class="menu-item text-truncate"
                                data-i18n="List">Finance</span></a></li>
                @endhasrole

            </ul>
        </li>
    @endcan
    @can('admin.view')

        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span
                    class="menu-title text-truncate" data-i18n="Board">Admin</span></a>
            <ul class="menu-content">
                <li class="{{ Route::currentRouteName() === 'admin.create' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.create') }}"><i
                            data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
                </li>
                <li class="{{
                Route::currentRouteName() === 'admin.index' ? 'active' : Route::currentRouteName() === 'admin.edit' ? 'active' : Route::currentRouteName() === 'admin.show' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.index') }}"><i
                            data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                </li>
            </ul>
        </li>
    @endcan
    @can('role.view')
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='shield'></i><span
                    class="menu-title text-truncate" data-i18n="Board">Role</span></a>
            <ul class="menu-content">
                <li class="{{ Route::currentRouteName() === 'roles.create' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.roles.create') }}"><i
                            data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
                </li>
                <li class="{{ Route::currentRouteName() === 'roles.index' ? 'active' :  Route::currentRouteName() === 'roles.edit' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.roles.index') }}"><i
                            data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                </li>
            </ul>
        </li>
    @endcan

    @can('slider.view')
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='image'></i><span
                    class="menu-title text-truncate" data-i18n="Board">Banner</span></a>
            <ul class="menu-content">
                <li class="{{ Route::currentRouteName() === 'banners.create' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('banners.create') }}"><i
                            data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
                </li>
                <li class="{{ Route::currentRouteName() === 'banners.index' ? 'active' : Route::currentRouteName() === 'banners.edit' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('banners.index') }}"><i
                            data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                </li>
            </ul>
        </li>


    @endcan


    @can('blog.view')
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i></i><span
                    class="menu-title text-truncate" data-i18n="Board">Blog</span></a>
            <ul class="menu-content">



                <li><a class="d-flex align-items-center" href="#"><i data-feather="book-open"></i><span
                            class="menu-item text-truncate" data-i18n="Second Level">Post</span></a>
                    <ul class="menu-content">
                        <li class="{{ Route::currentRouteName() === 'blog.create' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('blog.create') }}"><i
                                    data-feather="plus"></i><span class="menu-item text-truncate"
                                    data-i18n="List">New</span></a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'blog.index'? 'active' : Route::currentRouteName() === 'blog.edit' ? 'active' :'' }}"><a
                                class="d-flex align-items-center" href="{{ route('blog.index') }}"><i
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
                        <li class="{{ Route::currentRouteName() === 'category.index' ? 'active' :Route::currentRouteName() === 'category.edit' ? 'active' : '' }}"><a
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
                        <li class="{{ Route::currentRouteName() === 'subcategory.index' ? 'active' :Route::currentRouteName() === 'subcategory.edit' ? 'active' : '' }}"><a
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
                        <li class="{{ Route::currentRouteName() === 'tag.index' ? 'active' : Route::currentRouteName() === 'tag.edit' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('tag.index') }}"><i
                                    data-feather="list"></i><span class="menu-item text-truncate"
                                    data-i18n="List">View</span></a>
                        </li>
                    </ul>
                </li>
                <li><a class="d-flex align-items-center" href="#"><i data-feather="message-square"></i><span
                            class="menu-item text-truncate" data-i18n="List">Comment</span></a>
                    <ul class="menu-content">

                        <li class="{{ Route::currentRouteName() === 'comment.list' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('comment.list') }}"><i
                                    data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">All
                                    Comment</span></a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'comment.approve.list' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('comment.approve.list') }}"><i
                                    data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">Approved
                                    List</span></a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'comment.pending.list' ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('comment.pending.list') }}"><i
                                    data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">Pending
                                    List</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() === 'filter.view' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('filter.view') }}"><i
                            data-feather="filter"></i><span class="menu-item text-truncate" data-i18n="List">Filter
                            Blog</span></a>
                </li>
            </ul>
        </li>
    @endcan
    @can('user.view')
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span
                    class="menu-title text-truncate" data-i18n="Board">User</span></a>
            <ul class="menu-content">
                <li class="{{ Route::currentRouteName() === 'admin.user.create' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.user.create') }}"><i
                            data-feather="plus"></i><span class="menu-item text-truncate" data-i18n="List">New</span></a>
                </li>
                <li class="{{ Route::currentRouteName() === 'admin.user.index' ? 'active' : Route::currentRouteName() === 'admin.user.show' ? 'active' : Route::currentRouteName() === 'admin.user.edit' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('admin.user.index') }}"><i
                            data-feather="list"></i><span class="menu-item text-truncate" data-i18n="List">View</span></a>
                </li>
            </ul>
        </li>
    @endcan
    @can('contact.view')
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='mail'></i><span
                    class="menu-title text-truncate" data-i18n="Board">Contacts</span></a>
            <ul class="menu-content">
                <li class="{{ Route::currentRouteName() === 'contact.index' ? 'active' : '' }}"><a
                        class="d-flex align-items-center" href="{{ route('contact.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">List</span></a>
                </li>
            </ul>
        </li>
    @endcan
    @can('setting.view')
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
                                class="d-flex align-items-center" href="#"><span class="menu-item text-truncate"
                                    data-i18n="Third Level">Subscription Type</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    @endcan


</ul>

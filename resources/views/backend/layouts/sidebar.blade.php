<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.index') }}">
                <img src="{{ general_setting('site_logo') }}" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ request()->is('admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>

                    <li class="{{ request()->is('admin/category*','admin/subcategory*' ) ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                            <span>Category</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('admin/category*' ) ? 'active' : '' }}"><a
                                    href="{{ route('admin.category.index') }}">Category</a></li>
                            <li class="{{ request()->is('admin/subcategory*' ) ? 'active' : '' }}"><a
                                    href="{{ route('admin.subcategory.index') }}">Sub Category</a></li>
                        </ul>
                    </li>


                    <li class="{{ request()->is('admin/post*') ? 'active' : '' }}"><a
                            href="{{ route('admin.post.index') }}"><i class="ti-receipt"></i> <span>Post</span></a></li>

                    <li class="{{ request()->is('admin/admin-list*', 'admin/user-list*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i>
                            <span>Users</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('admin/user-list*' ) ? 'active' : '' }}"><a
                                    href="{{ route('admin.user-list.index') }}">User</a></li>
                            <li class="{{ request()->is('admin/admin-list*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.admin-list.index') }}">Admin</a></li>
                        </ul>
                    </li>

                    <li class="{{ request()->is('admin/system-settings/*','admin/banner*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cogs"
                                aria-hidden="true"></i><span>System Settings</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('admin/system-settings/1') ? 'active' : '' }}"><a
                                    href="{{ route('admin.system-setting.index', 1) }}">General Settings</a></li>
                            <li class="{{ request()->is('admin/banner*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.banner.index') }}">Banner</a></li>
                            <li class="{{ request()->is('admin/system-settings/2') ? 'active' : '' }}"><a
                                    href="{{ route('admin.system-setting.index', 2) }}">Pyament Settings</a></li>
                            <li class="{{ request()->is('admin/system-settings/3') ? 'active' : '' }}"><a
                                    href="{{ route('admin.system-setting.index', 3) }}">ADS Settings</a></li>
                            <li class="{{ request()->is('admin/system-settings/3') ? 'active' : '' }}"><a
                                    href="{{ url('sitemap') }}">Sitemap</a></li>

                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>

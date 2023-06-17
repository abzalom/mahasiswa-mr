<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/assets/img/logokab.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->photo() }}" class="img-circle elevation-2 bg-white" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ auth()->user()->username }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'menu-open' : '' }}">
                    <a href="/" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/set/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/set/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.set.panitia') }}" class="nav-link {{ Request::is('admin/set/panitia') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Koordinator Panitia</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/config/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/config/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Config App
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.config.roles') }}" class="nav-link {{ Request::is('admin/config/roles') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles & Permision</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.config.banks') }}" class="nav-link {{ Request::is('admin/config/banks') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Bank</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.config.pejabats') }}" class="nav-link {{ Request::is('admin/config/pejabats') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pejabat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.config.components') }}" class="nav-link {{ Request::is('admin/config/components') ? 'active' : (Request::is('admin/config/components/*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>App Component</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

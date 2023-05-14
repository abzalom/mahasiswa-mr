<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/koordinator" class="brand-link">
        <img src="/assets/img/logokab.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Koordinator Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->image)
                    @if (File::exists('images/thumbnails/' . auth()->user()->image))
                        <img src="{{ asset('images/thumbnails/' . auth()->user()->image) }}" class="img-circle elevation-2" alt="{{ auth()->user()->username }}">
                    @else
                        <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="{{ auth()->user()->username }}">
                    @endif
                @else
                    <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('koordinator.profile') }}" class="d-block">{{ auth()->user()->username }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
                @if (Request::is('koordinator/dashboard') or Request::is('koordinator/profile'))
                    <li class="nav-item menu-open">
                        <a href="/" class="nav-link active">
                        @else
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                @endif
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
                </li>
                <li class="nav-item {{ Request::is('koordinator/set/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('koordinator/set/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Management Panitia
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('koordinator.set.panitia') }}" class="nav-link {{ Request::is('koordinator/set/panitia') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Panitia</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('koordinator.set.verifikator') }}" class="nav-link {{ Request::is('koordinator/set/verifikator') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tim Verifikator</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('koordinator/atur/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('koordinator/atur/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pengelolaan Peserta
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('koordinator.atur.peserta') }}" class="nav-link {{ Request::is('koordinator/atur/peserta') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>user</p>
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

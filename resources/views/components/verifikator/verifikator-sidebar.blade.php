<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/assets/img/logokab.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Verifikator Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->image)
                    @if (File::exists('images/' . auth()->user()->image))
                        <img src="{{ asset('images/thumbnails/' . auth()->user()->image) }}" class="img-circle elevation-2" alt="{{ auth()->user()->username }}">
                    @else
                        <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="{{ auth()->user()->username }}">
                    @endif
                @else
                    <img src="/vendors/adminlte3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('verifikator.profile') }}" class="d-block">{{ auth()->user()->username }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
                @if (Request::is('verifikator/dashboard') or Request::is('verifikator/profile'))
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
                <li class="nav-item {{ Request::is('verifikator/manajement/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('verifikator/manajement/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manajement Peserta
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if (Request::is('verifikator/manajement/peserta') or Request::is('verifikator/manajement/peserta/*'))
                                <a href="{{ route('verifikator.man.peserta') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Verifikasi</p>
                                </a>
                            @else
                                <a href="{{ route('verifikator.man.peserta') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Verifikasi</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Request::is('verifikator/manajement/perbaikan') or Request::is('verifikator/manajement/perbaikan/*'))
                                <a href="{{ route('verifikator.manperbaikan.peserta') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Perbaikan</p>
                                </a>
                            @else
                                <a href="{{ route('verifikator.manperbaikan.peserta') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Perbaikan</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Request::is('verifikator/manajement/lengkap') or Request::is('verifikator/manajement/lengkap/*'))
                                <a href="{{ route('verifikator.manlengkap.peserta') }}" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lengkap</p>
                                </a>
                            @else
                                <a href="{{ route('verifikator.manlengkap.peserta') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lengkap</p>
                                </a>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

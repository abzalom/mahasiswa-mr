        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Tahun Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Tahun {{ session()->get('tahun') }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <span class="dropdown-header p-0">Pilih tahun</span>
                        <div class="dropdown-divider"></div>
                        @foreach ($tahuns as $tahun)
                            <form action="/config/app/session/tahun" method="post">
                                @csrf
                                <input type="hidden" name="idtahun" value="{{ $tahun->id }}">
                                <button type="submit" class="dropdown-item">
                                    Tahun {{ $tahun->tahun }}&nbsp;
                                    @if (session()->get('tahun') == $tahun->tahun)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </button>
                            </form>
                        @endforeach
                    </div>
                </li>
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ auth()->user()->username }} <i class="fas fa-user-cog" style="color: #5c652d;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Pengaturan User</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('koordinator.profile') }}" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-footer">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

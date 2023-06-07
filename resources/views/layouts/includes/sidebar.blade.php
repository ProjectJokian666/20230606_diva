 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('img/icon/logo.png') }}" alt="Sanggar Senam Atheena" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 17px">Sanggar Senam Atheena</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->getImage()}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{Auth::user()->username}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @if(Auth::user()->role_id == 1)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pelatih') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pelatih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('anggota') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('audience') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Audience
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemasukkan') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Pemasukkan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->role_id == 2)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.pelatih') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pelatih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.kelassenam') }}" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Data Kelas 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.jadwal') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Data Jadwal 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.anggota') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.event') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a.diskon') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Diskon 
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->role_id == 3)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('p.anggota') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('p.event') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('p.pemasukkan') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Pemasukkan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->role_id == 4)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('m.kelassenam') }}" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Kelas Senam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('m.pelatih') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pelatih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('m.daftarKelas')}}" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Daftar Kelas Senam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('m.pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('m.event') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>
                            Event
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @elseif(Auth::user()->role_id == 5)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nm.pelatih') }}" class="nav-link {{ request()->is('login') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pelatih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nm.kelassenam') }}" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Jadwal & Harga Kelas Senam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nm.daftarKelas') }}" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Daftar Kelas Senam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nm.pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="#"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="#"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Home</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='dashboard' ? 'active' : '' }}" href="{{route('dashboard.index')}}"><i data-feather="home"> </i><span>Dashboard</span></a></li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pelayanan</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pasien.index' ? 'active' : '' }}" href="{{route('pasien.index')}}"><i data-feather="users"> </i><span>Daftar Pasien</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pendaftaran.index' ? 'active' : '' }}" href="{{route('pendaftaran.index')}}"><i data-feather="user-plus"> </i><span>Pendaftaran Pasien</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pemeriksaan.index' ? 'active' : '' }}" href="{{route('pemeriksaan.index')}}"><i data-feather="user-check"> </i><span>Pemeriksaan Pasien</span></a></li>
{{--                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pemeriksaan.index' ? 'active' : '' }}" href="{{route('pemeriksaan.index')}}"><i class="fa-solid fa-money-bill-wave-alt"></i><span class="px-3">Pembayaran</span></a></li>--}}
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Farmasi</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='stok-barang' ? 'active' : '' }}" href="{{route('stok-barang')}}"><i class="fa fa-warehouse fa-md mx-1"> </i><span>Stok Barang</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='obat-masuk' ? 'active' : '' }}" href="{{route('obat-masuk')}}"><i class="fa fa-truck-loading fa-md mx-1"> </i><span>Obat Masuk</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='obat-keluar' ? 'active' : '' }}" href="{{route('obat-keluar')}}"><i class="fa fa-dolly-flatbed fa-md mx-1"> </i><span>Obat Keluar</span></a></li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Laporan</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='keuangan' ? 'active' : '' }}" href="{{route('keuangan')}}"><i class="fa-solid fa-receipt fa-lg mx-1"> </i><span>Keuangan</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='piutang' ? 'active' : '' }}" href="{{route('piutang')}}"><i class="fa-solid fa-comments-dollar fa-md mx-1"> </i><span>Piutang</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='cashflow' ? 'active' : '' }}" href="{{route('cashflow')}}"><i class="fa-solid fa-right-left fa-md mx-1"> </i><span>Cashflow</span></a></li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Konfigurasi</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/manajemen-klinik' ? 'active' : '' }}" href="#"><i class="fa fa-clinic-medical fa-md mx-1"></i><span>Manajemen Klinik</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/manajemen-klinik' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/manajemen-klinik' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()== 'tindakan.index' ? 'active' : '' }}" href="{{route('tindakan.index')}}">Tindakan</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='poli.index' ? 'active' : '' }}" href="{{route('poli.index')}}">Poli</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/produk' ? 'active' : '' }}" href="#"><i class="fa fa-boxes fa-md mx-1"></i><span>Produk</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/produk' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/produk' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='daftar-produk.index' ? 'active' : '' }}" href="{{route('daftar-produk.index')}}">Daftar Produk</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='kategori.index' ? 'active' : '' }}" href="{{route('kategori.index')}}">Kategori</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/manajemen-user' ? 'active' : '' }}" href="#"><i class="fa fa-users fa-md mx-1">

                            </i><span>Manajemen User</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/manajemen-user' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == 'pelayanan' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='user.index' ? 'active' : '' }}" href="{{route('user.index')}}">User Pengguna</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='dokter.index' ? 'active' : '' }}" href="{{route('dokter.index')}}">Dokter </a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('dokter*') ? 'active' : '' }}" href="{{route('dokter.index')}}">
                            <i class="fa fa-warehouse fa-md mx-1"> </i><span>Data Dokter</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('dokter*') ? 'active' : '' }}" href="{{route('dokter.index')}}">
                            <i class="fa fa-warehouse fa-md mx-1"> </i><span>Data Dokter</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('pasien*') ? 'active' : '' }}" href="{{route('pasien.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data Pasien</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('poli*') ? 'active' : '' }}" href="{{route('poli.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data Poli</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('pendaftaran*') ? 'active' : '' }}" href="{{route('pendaftaran.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Pendaftaran Pasien</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('pemeriksaan*') ? 'active' : '' }}" href="{{route('pemeriksaan.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Pemeriksaan Pasien</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('obat/index*') ? 'active' : '' }}" href="{{route('obat.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data Obat</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('obat/obatmasuk*') ? 'active' : '' }}" href="{{route('obat.obatmasuk')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data Obat Masuk</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('obat/obatkeluar*') ? 'active' : '' }}" href="{{route('obat.obatkeluar')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data Obat Keluar</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('piutang/*') ? 'active' : '' }}" href="{{route('piutang.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Piutang</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('user/*') ? 'active' : '' }}" href="{{route('user.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Data User </span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->is('laporan/*') ? 'active' : '' }}" href="{{route('laporan.index')}}">
                            <i class="fa fa-truck-loading fa-md mx-1"> </i><span>Laporan</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>

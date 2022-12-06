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
                    <!-- <li class="sidebar-main-title">
                        <div>
                            <h6>Pelayanan</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ (request()->is('home*')) ? 'active' : '' }}" href="#"><i data-feather="home"> </i><span>Pendaftaran Pasien</span></a></li> -->
                    <!-- <li class="sidebar-main-title">
                        <div>
                            <h6>Farmasi</h6>
                        </div>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->is('pasien*') ? 'active' : '' }}" href="#"><i class="fa fa-exchange fa-md mx-1"></i><span>Pelayanan</span>
                            <div class="according-menu"><i class="fa fa-angle-{{ request()->is('pasien*') ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{  request()->is('pasien*') ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='pasien.index' ? 'active' : '' }}" href="{{route('pasien.index')}}">Data Pasien</a></li>
                        </ul>
                        <ul class="sidebar-submenu" style="display: {{  request()->is('pasien*') ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='pasien.create' ? 'active' : '' }}" href="{{route('pasien.create')}}">Pendaftaran Pasien</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'active' : '' }}" href="#"><i class="fa fa-exchange fa-md mx-1"></i><span>Farmasi</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == 'transaksi/penjualan' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Stok Barang</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Barang Masuk</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Barang Keluar</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'active' : '' }}" href="#"><i class="fa fa-exchange fa-md mx-1"></i><span>Keuangan</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == 'transaksi/penjualan' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Laporan Keuangan</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Piutang</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Cashflow</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'active' : '' }}" href="#"><i class="fa fa-exchange fa-md mx-1"></i><span>Konfigurasi</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == 'transaksi/penjualan' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == 'transaksi/penjualan' ? 'block;' : 'none;' }}">
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Produk</a></li>
                            <li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Daftar Produk</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Jenis</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Satuan</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Kategori</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Poli</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Tindakan</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Supplier</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Manajemen User</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Daftar User</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Daftar Role</a></li>
                            <li><a class="lan-5 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="#">Hak Akses</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='user.index' ? 'active' : '' }}" href="#"><i data-feather="user"> </i><span>User</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pelanggan.index' ? 'active' : '' }}" href="#"><i data-feather="users"> </i><span>Pelanggan</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='supplier.index' ? 'active' : '' }}" href="#"><i data-feather="truck"> </i><span>Supplier</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
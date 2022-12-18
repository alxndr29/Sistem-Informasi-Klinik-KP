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
                            <h6>Pelayanan</h6>
                        </div>
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
                    <li class="sidebar-main-title">

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='user.index' ? 'active' : '' }}" href="#"><i data-feather="user"> </i><span>User</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='pelanggan.index' ? 'active' : '' }}" href="#"><i data-feather="users"> </i><span>Pelanggan</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='supplier.index' ? 'active' : '' }}" href="#"><i data-feather="truck"> </i><span>Supplier</span></a></li> -->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
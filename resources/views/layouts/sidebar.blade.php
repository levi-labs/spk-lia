<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">

                {{-- <img class="img-40 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image"> --}}
                <div class="user-details">
                    <span>{{ Auth::user()->nama }}</span>
                    <span id="more-details">{{ auth()->user()->level_user }}</span>
                </div>
            </div>

            {{-- <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div> --}}
        </div>
        {{-- <div class="pcoded-search">
            <span class="searchbar-toggle"> </span>
            <div class="pcoded-search-box ">
                <input type="text" placeholder="Search">
                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
            </div>
        </div> --}}
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="index.html">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Management
        </div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('kriteria.index') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>M</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar Kriteria</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('karyawan.index') }}">
                    <span class="pcoded-micon"><i class="ti-zip"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar
                        Karyawan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Nilai &amp; Ranking</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ route('nilai.index') }}">
                    <span class="pcoded-micon"><i class="ti-comments-smiley"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Nilai</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('nilai.ranking') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Ranking</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>


        </ul>

        @if (auth()->user()->level_user == 'master')
            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">User Management</div>
            <ul class="pcoded-item pcoded-left-item">
                <li>
                    <a href="{{ route('users.index') }}">
                        <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        @endif

    </div>
</nav>

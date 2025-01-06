<!-- Sidebar Toggle Button -->
<script src="https://kit.fontawesome.com/17a1c55d76.js" crossorigin="anonymous"></script>
<!-- Sidebar -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active ps">
        <div class="sidebar-header">
            <div class="">
                <a class="text-capitalize text-decoration-none" href="/home" style="color:#047857">XYLARIUM</a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->is('home*') ? 'active' : '' }}">
                    <a href="{{ url('home') }}" class='sidebar-link'>
                        <i class="fas fa-th-large"></i>
                        <span class="">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('penerimaan*') ? 'active' : '' }}">
                    <a href="{{ route('penerimaan.index') }}" class='sidebar-link'>
                        <i class="fas fa-handshake"></i>
                        <span class="text-capitalize">Penerimaan & Kelayakan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('penomorankoleksi*') ? 'active' : '' }}">
                    <a href="/penomorankoleksi" class='sidebar-link'>
                        <i class="fas fa-barcode"></i>
                        <span class="text-capitalize">Penomoran Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('tanaman*') ? 'active' : '' }}">
                    <a href="/tanaman" class='sidebar-link'>
                        <i class="fas fa-leaf"></i>
                        <span class="text-capitalize">Kekayaan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pengeringan*') ? 'active' : '' }}">
                    <a href="/pengeringan" class='sidebar-link'>
                        <i class="fas fa-temperature-high"></i>
                        <span class="text-capitalize">Pengovenan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pembuatan-bahan-koleksi*') ? 'active' : '' }}">
                    <a href="{{ route('pembuatan-bahan-koleksi.index') }}" class='sidebar-link'>
                        <i class="fas fa-box"></i>
                        <span class="text-capitalize">Pembuatan Bahan Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pola-trapesium*') ? 'active' : '' }}">
                    <a href="{{ route('pola-trapesium.index') }}" class='sidebar-link'>
                        <i class="fas fa-drafting-compass"></i>
                        <span class="text-capitalize">Pembuatan Pola Trapesium</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pbtk*') ? 'active' : '' }}">
                    <a href="{{ route('pbtk.index') }}" class='sidebar-link'>
                        <i class="fas fa-boxes"></i>
                        <span class="text-capitalize">Pembuatan Bahan Trapesium Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pnptk*') ? 'active' : '' }}">
                    <a href="{{ route('pnptk.index') }}" class='sidebar-link'>
                        <i class="fas fa-hammer"></i>
                        <span class="text-capitalize">Pengetokan Nomor pada Trapesium Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('dokumentasi-koleksi*') ? 'active' : '' }}">
                    <a href="{{ route('dokumentasi-koleksi.index') }}" class='sidebar-link'>
                        <i class="fas fa-camera"></i>
                        <span class="text-capitalize">Dokumentasi Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('anatomi-makroskopis*') ? 'active' : '' }}">
                    <a href="{{ route('anatomi-makroskopis.index') }}" class='sidebar-link'>
                        <i class="fas fa-eye"></i>
                        <span class="text-capitalize">Anatomi Makroskopis</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('anatomi-mikroskopis*') ? 'active' : '' }}">
                    <a href="{{ route('anatomi-mikroskopis.index') }}" class='sidebar-link'>
                        <i class="fas fa-microscope"></i>
                        <span class="text-capitalize">Anatomi Mikroskopis</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pendinginan*') ? 'active' : '' }}">
                    <a href="{{ route('pendinginan.index') }}" class='sidebar-link'>
                        <i class="fas fa-snowflake"></i>
                        <span class="text-capitalize">Pendinginan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('penyimpanan*') ? 'active' : '' }}">
                    <a href="{{ route('penyimpanan.index') }}" class='sidebar-link'>
                        <i class="fas fa-archive"></i>
                        <span class="text-capitalize">Tersimpan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('inspeksi*') ? 'active' : '' }}">
                    <a href="{{ route('inspeksi.index') }}" class='sidebar-link'>
                        <i class="fas fa-search"></i>
                        <span class="text-capitalize">Inspeksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('pemeliharaan*') ? 'active' : '' }}">
                    <a href="{{ route('pemeliharaan.index') }}" class='sidebar-link'>
                        <i class="fas fa-tools"></i>
                        <span class="text-capitalize">Pemeliharaan</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a href="/getout" class='sidebar-link'>
                        <i class="fas fa-sign-out"></i>
                        <span class="text-capitalize">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

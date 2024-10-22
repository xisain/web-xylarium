<!-- Sidebar Toggle Button -->
<script src="https://kit.fontawesome.com/17a1c55d76.js" crossorigin="anonymous"></script>
<!-- Sidebar -->
<div class="sidebar form-control mt-4" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ url('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('penerimaan.index') }}" class="nav-link {{ request()->routeIs('penerimaan.index') ? 'active' : '' }}">
                    <i class="fas fa-handshake"></i> Penerimaan & Kelayakan
                </a>
            </li>
            <li class="nav-item">
                <a href="/penomorankoleksi" class="nav-link {{ request()->is('penomorankoleksi') ? 'active' : '' }}">
                    <i class="fas fa-barcode"></i> Penomoran Koleksi
                </a>
            </li>
            <li class="nav-item">
                <a href="/tanaman" class="nav-link {{ request()->is('tanaman') ? 'active' : '' }}">
                    <i class="fas fa-leaf"></i> Kekayaan
                </a>
            </li>
            <li class="nav-item">
                <a href="/pengeringan" class="nav-link {{ request()->is('pengeringan') ? 'active' : '' }}">
                    <i class="fas fa-temperature-high"></i> Pengovenan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pembuatan-bahan-koleksi.index') }}" class="nav-link {{ request()->routeIs('pembuatan-bahan-koleksi.index') ? 'active' : '' }}">
                    <i class="fas fa-box"></i> Pembuatan Bahan Koleksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pola-trapesium.index') }}" class="nav-link {{ request()->routeIs('pola-trapesium.index') ? 'active' : '' }}">
                    <i class="fas fa-drafting-compass"></i> Pembuatan Pola Trapesium
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pbtk.index') }}" class="nav-link {{ request()->routeIs('pbtk.index') ? 'active' : '' }}">
                    <i class="fas fa-boxes"></i> Pembuatan Bahan Trapesium Koleksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pnptk.index') }}" class="nav-link {{ request()->routeIs('pnptk.index') ? 'active' : '' }}">
                    <i class="fas fa-hammer"></i> Pengetokan Nomor pada Trapesium Koleksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokumentasi-koleksi.index') }}" class="nav-link {{ request()->routeIs('dokumentasi-koleksi.index') ? 'active' : '' }}">
                    <i class="fas fa-camera"></i> Dokumentasi Koleksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('anatomi-makroskopis.index') }}" class="nav-link {{ request()->routeIs('anatomi-makroskopis.index') ? 'active' : '' }}">
                    <i class="fas fa-eye"></i> Anatomi Makroskopis
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('anatomi-mikroskopis.index') }}" class="nav-link {{ request()->routeIs('anatomi-mikroskopis.index') ? 'active' : '' }}">
                    <i class="fas fa-microscope"></i> Anatomi Mikroskopis
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pendinginan.index') }}" class="nav-link {{ request()->routeIs('pendinginan.index') ? 'active' : '' }}">
                    <i class="fas fa-snowflake"></i> Pendinginan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('penyimpanan.index') }}" class="nav-link {{ request()->routeIs('penyimpanan.index') ? 'active' : '' }}">
                    <i class="fas fa-archive"></i> Tersimpan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inspeksi.index') }}" class="nav-link {{ request()->routeIs('inspeksi.index') ? 'active' : '' }}">
                    <i class="fas fa-search"></i> Inspeksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pemeliharaan.index') }}" class="nav-link {{ request()->routeIs('pemeliharaan.index') ? 'active' : '' }}">
                    <i class="fas fa-tools"></i> Pemeliharaan
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

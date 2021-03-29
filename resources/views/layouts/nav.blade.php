<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-feather-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PELMA</div>
            </a>

            @hasrole('admin')
            <div class="sidebar-heading">
                ADMIN
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.beranda.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route ('admin.petugas') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Petugas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.masyarakat') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Masyarakat</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.pengaduan') }}">
                    <i class="fas fa-fw fa-file-pdf"></i>
                    <span>Laporan</span></a>
            </li>
            <!-- end admin -->
            @endhasrole

            <!-- petugas -->
            @hasrole('petugas')
            <div class="sidebar-heading">
                PETUGAS
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('petugas.beranda.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('petugas.aduan.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Pengaduan</span></a>
            </li>
            @endhasrole
            <!-- end petugas -->

            <!-- masyarakat -->
            @hasrole('masyarakat')
            <div class="sidebar-heading">
                MASYARAKAT
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('masyarakat.beranda.index') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('masyarakat.aduan') }}">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Pengaduan</span></a>
            </li>
            @endhasrole
            <!-- end masyarakat -->

            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tani <sup>KU</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Product</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataMaster"
            aria-expanded="true" aria-controls="DataMaster">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
        </a>
        <div id="DataMaster" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Barang:</h6>
                <a class="collapse-item {{ request()->routeIs('bibit.index') ? 'active' : '' }}"
                    href="{{ route('bibit.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bibit</span>
                </a>
                <a class="collapse-item {{ request()->routeIs('pupuk.index') ? 'active' : '' }}"
                    href="{{ route('pupuk.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pupuk</span>
                </a>
                <a class="collapse-item {{ request()->routeIs('peralatan.index') ? 'active' : '' }}"
                    href="{{ route('peralatan.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Peralatan</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan Website
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan Website</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="#">Tim</a>
                <a class="collapse-item" href="#">Galeri</a>
                <a class="collapse-item" href="#">Kontak</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

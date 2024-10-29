<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AIO Store Admin</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <?php if (session()->get('role') == 'superadmin'): ?>
                    <!-- Link to Superadmin Dashboard -->
                    <a href="/superadmin/dashboard" class="nav-link <?= (uri_string() == 'superadmin/dashboard') ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Superadmin Dashboard</p>
                    </a>
                <?php else: ?>
                    <!-- Link to Admin Dashboard -->
                    <a href="/admin/dashboard" class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin Dashboard</p>
                    </a>
                <?php endif; ?>
            </li>

            <!-- Manage Data Section -->
            <li class="nav-item <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas') ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Manage Data <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/brand" class="nav-link <?= (uri_string() == 'admin/brand') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Merek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/kategori" class="nav-link <?= (uri_string() == 'admin/kategori') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/subkategori" class="nav-link <?= (uri_string() == 'admin/subkategori') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sub-Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/kapasitas" class="nav-link <?= (uri_string() == 'admin/kapasitas') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kapasitas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/ukuran" class="nav-link <?= (uri_string() == 'admin/kapasitas') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ukuran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/garansi_kompresor" class="nav-link <?= (uri_string() == 'admin/garansi_kompresor') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compressor Warranty</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/refrigrant" class="nav-link <?= (uri_string() == 'admin/refrigrant') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tipe Refrigrant</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?= (uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor' || uri_string() == 'admin/garansi_service' || uri_string() == 'admin/garansi_elemen_panas') ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= (uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor' || uri_string() == 'admin/garansi_service'|| uri_string() == 'admin/garansi_elemen_panas') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Garansi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/garansi_kompresor" class="nav-link <?= (uri_string() == 'admin/garansi_kompresor') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Kompresor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/garansi_sparepart" class="nav-link <?= (uri_string() == 'admin/garansi_sparepart') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Sparepart</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/garansi_motor" class="nav-link <?= (uri_string() == 'admin/garansi_motor') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Motor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/garansi_service" class="nav-link <?= (uri_string() == 'admin/garansi_service') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Service</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/garansi_elemen_panas" class="nav-link <?= (uri_string() == 'admin/garansi_elemen_panas') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Elemen Panas</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Manage Products Section -->
            <li class="nav-item <?= (uri_string() == 'products/approval') ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= (uri_string() == 'products/approval') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Manage Products <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/product" class="nav-link <?= (uri_string() == 'products/list') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Products List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/products/approval" class="nav-link <?= (uri_string() == 'products/approval') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Products Approval</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</aside>

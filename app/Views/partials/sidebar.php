<!-- Sidebar -->
<div class="sidebar" style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0; padding: 20px; overflow-y: auto; z-index: 999">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">    
<!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AIO Store Admin</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
        <!-- Dashboard -->
                   <li class="nav-item">
                        <a href="/" class="nav-link <?= (uri_string() == '') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
            <!-- Manage Data Section -->
            <li class="nav-item <?= (uri_string() == 'brand' || uri_string() == 'kategori' || uri_string() == 'subkategori' || uri_string() == 'kapasitas' || uri_string() == 'garansi_kompresor' || uri_string() == 'garansi_sparepart') ? 'menu-open' : '' ?>" style="width: 90%">
                <a href="#" class="nav-link <?= (uri_string() == 'brand' || uri_string() == 'kategori' || uri_string() == 'subkategori' || uri_string() == 'kapasitas' || uri_string() == 'garansi_kompresor' || uri_string() == 'garansi_sparepart') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Kelola Data<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/brand" class="nav-link <?= (uri_string() == 'brand') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Merek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kategori" class="nav-link <?= (uri_string() == 'kategori') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/subkategori" class="nav-link <?= (uri_string() == 'subkategori') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subkategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kapasitas" class="nav-link <?= (uri_string() == 'kapasitas') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kapasitas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/garansi_kompresor" class="nav-link <?= (uri_string() == 'garansi_kompresor') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Kompresor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/garansi_sparepart" class="nav-link <?= (uri_string() == 'garansi_sparepart') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Garansi Sparepart</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Manage Products Section -->
            <li class="nav-item <?= (uri_string() == 'product' || uri_string() == 'product/approved'|| uri_string() == 'product/rejected') ? 'menu-open' : '' ?>" style= "width: 90%">
                <a href="#" class="nav-link <?= (uri_string() == 'product' || uri_string() == 'product/approved' || uri_string() == 'product/rejected') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Kelola Produk <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/product" class="nav-link <?= (uri_string() == 'product') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Antrian Persetujuan Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product/approved" class="nav-link <?= (uri_string() == 'product/approved') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Produk Disetujui</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product/rejected" class="nav-link <?= (uri_string() == 'product/rejected') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Produk Ditolak</p>
                        </a>
                    </li>
                </ul>
            </li>

                        <!-- Manage Products Section -->
                        <li class="nav-item <?= (uri_string() == 'user' || uri_string() == 'user/reset') ? 'menu-open' : '' ?>" style= "width: 90%">
                <a href="#" class="nav-link <?= (uri_string() == 'user' || uri_string() == 'user/reset') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Kelola User <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/user" class="nav-link <?= (uri_string() == 'user') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manajemen User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product/approved" class="nav-link <?= (uri_string() == 'user/reset') ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lupa Password</p>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

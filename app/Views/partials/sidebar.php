<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
<!-- Sidebar -->
<div class="sidebar" style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0; padding: 20px; overflow-y: auto; z-index: 999">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">    
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AIO Store Admin</span>
    </a>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
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
        <li class="nav-item <?= (uri_string() == 'brand' || uri_string() == 'kategori' || uri_string() == 'subkategori' || uri_string() == 'kapasitas' || uri_string() == 'garansi_kompresor' || uri_string() == 'garansi_sparepart') ? 'menu-open' : '' ?>" style="width: 90%">
          <a href="#" class="nav-link <?= (uri_string() == 'brand' || uri_string() == 'kategori' || uri_string() == 'subkategori' || uri_string() == 'kapasitas' || uri_string() == 'garansi_kompresor' || uri_string() == 'garansi_sparepart') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Kelola Data<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/brand" class="nav-link <?= (uri_string() == 'brand') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Merek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kategori" class="nav-link <?= (uri_string() == 'kategori') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/subkategori" class="nav-link <?= (uri_string() == 'subkategori') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Subkategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kapasitas" class="nav-link <?= (uri_string() == 'kapasitas') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kapasitas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_kompresor" class="nav-link <?= (uri_string() == 'garansi_kompresor') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Garansi Kompresor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_sparepart" class="nav-link <?= (uri_string() == 'garansi_sparepart') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Garansi Sparepart</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Manage Products Section -->
        <li class="nav-item 
        <?= (uri_string() == 'product' || uri_string() == 'product/approved'|| uri_string() == 'product/rejected') ? 'menu-open' : '' ?>" style="width: 90%">
          <a href="#" class="nav-link <?= (uri_string() == 'product' || uri_string() == 'product/approved' || uri_string() == 'product/rejected') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Kelola Produk<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
        <li class="nav-item">
          <?php if (session()->get('role') == 'superadmin'): ?>
            <!-- Link to Superadmin Dashboard -->
            <a href="/superadmin/product" class="nav-link <?= (uri_string() == 'superadmin/product') ? 'active' : '' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Konfirmasi Antrian Produk</p>
            </a>
          <?php else: ?>
            <!-- Link to Admin Dashboard -->
            <a href="/admin/product" class="nav-link <?= (uri_string() == 'admin/product') ? 'active' : '' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Antrian Produk</p>
            </a>
          <?php endif; ?>
        </li>
        
            
            <?php if (session()->get('role') == 'superadmin'): ?>
            <!-- These links are visible only to superadmin -->
            <li class="nav-item">
              <a href="/superadmin/product/approved" class="nav-link <?= (uri_string() == 'product/approved') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk Disetujui</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/superadmin/product/rejected" class="nav-link <?= (uri_string() == 'product/rejected') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk Ditolak</p>
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </li>

        <!-- Manage User Section, visible only for superadmin -->
        <?php if (session()->get('role') == 'superadmin'): ?>
        <li class="nav-item <?= (uri_string() == 'superadmin/user' || uri_string() == 'superadmin/user/reset') ? 'menu-open' : '' ?>" style="width: 90%">
          <a href="#" class="nav-link <?= (uri_string() == 'superadmin/user' || uri_string() == 'superadmin/user/reset') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Kelola User<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/superadmin/user" class="nav-link <?= (uri_string() == 'superadmin/user') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Manajemen User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/reset/reset-password" class="nav-link <?= (uri_string() == 'superadmin/user/reset') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Lupa Password</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </aside>
</div>
<!-- /.sidebar -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>


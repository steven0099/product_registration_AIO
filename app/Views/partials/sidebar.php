<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
<!-- Sidebar -->
<div class="sidebar" style="width: 250px; padding: 20px; z-index: 999">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="max-height: 100vh; overflow-y: auto;">
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
        <li class="nav-item <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas' || uri_string() == 'admin/ukuran' || uri_string() == 'admin/refrigrant' || uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor'|| uri_string() == 'admin/garansi_service'|| uri_string() == 'admin/garansi_elemen_panas') ? 'menu-open' : '' ?>" style="width: 90%">
          <a href="#" class="nav-link <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas' || uri_string() == 'admin/ukuran' || uri_string() == 'admin/refrigrant' || uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor'|| uri_string() == 'admin/garansi_service'|| uri_string() == 'admin/garansi_elemen_panas') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Kelola Data<i class="right fas fa-angle-left"></i></p>
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
                <p>Subkategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kapasitas" class="nav-link <?= (uri_string() == 'admin/kapasitas') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kapasitas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/ukuran" class="nav-link <?= (uri_string() == 'admin/ukuran') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Ukuran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/refrigrant" class="nav-link <?= (uri_string() == 'admin/refrigrant') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tipe Refrigrant</p>
              </a>
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
                <p>Ganti Password</p>
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


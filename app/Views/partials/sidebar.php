<link
  href="static\plugin\font-awesome\css\fontawesome-all.min.css"
  rel="stylesheet" />

<style>
  /* Menambahkan scroll pada sidebar */
  .main-sidebar {
    height: 100vh;
    overflow-y: auto;
  }

  /* Styling tambahan untuk scrollbar */
  .main-sidebar::-webkit-scrollbar {
    width: 8px;
  }

  .main-sidebar::-webkit-scrollbar-thumb {
    background-color: #888;

  }

  .main-sidebar::-webkit-scrollbar-thumb:hover {
    background-color: #555;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <?php if (session()->get('role') == 'superadmin'): ?>
    <a href="/" class="brand-link">
      <img src="/images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:16px">AIO Store SuperAdmin</span>
    </a>
  <?php elseif (session()->get('role') == 'admin'): ?>
    <a href="/" class="brand-link">
      <img src="/images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:16px">AIO Store Admin</span>
    </a>
  <?php else: ?>
    <a href="/" class="brand-link">
      <img src="/images/logo-aio.png" alt="AIO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:16px">AIO Store</span>
    </a>
  <?php endif; ?>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Dashboard -->
      <li class="nav-item">
        <?php if (session()->get('role') == 'superadmin'): ?>
          <!-- Link to Superadmin Dashboard -->
          <a href="/superadmin/dashboard" class="nav-link <?= (uri_string() == 'superadmin/dashboard') ? 'active' : '' ?>">
            <i class="fas fa-home nav-icon"></i>
            <p style="font-size:14px">Superadmin Dashboard</p>
          </a>
        <?php elseif (session()->get('role') == 'admin'): ?>
          <!-- Link to Admin Dashboard -->
          <a href="/admin/dashboard" class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
            <i class="fas fa-home nav-icon"></i>
            <p style="font-size:14px">Admin Dashboard</p>
          </a>
        <?php endif; ?>
      </li>

      <?php if (session()->get('role') == 'superadmin' || session()->get('role') == 'admin'): ?>
        <li class="nav-item">
          <!-- Link Laporan -->
          <a href="/admin/reports" class="nav-link <?= (uri_string() == 'admin/reports') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>Cetak Laporan</p>
          </a>
        </li>
      <?php endif; ?>

      <li class="nav-item">
        <!-- Link Laporan -->
        <a href="/catalog" class="nav-link <?= (uri_string() == 'catalog') ? 'active' : '' ?>">
          <i class="nav-icon fas fa-book"></i>
          <p>Katalog</p>
        </a>
      </li>

      <?php if (session()->get('role') == 'superadmin' || session()->get('role') == 'admin'): ?>
        <!-- Manage Data Section -->
        <li class="nav-item <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas' || uri_string() == 'admin/ukuran' || uri_string() == 'admin/refrigrant') ? 'menu-open' : '' ?>" style="width: 99%">
          <a href="#" class="nav-link <?= (uri_string() == 'admin/brand' || uri_string() == 'admin/kategori' || uri_string() == 'admin/subkategori' || uri_string() == 'admin/kapasitas' || uri_string() == 'admin/ukuran' || uri_string() == 'admin/refrigrant') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Kelola Data<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/brand" class="nav-link <?= (uri_string() == 'admin/brand') ? 'active' : '' ?>">
                <i class="fas fa-tags nav-icon"></i>
                <p>Merek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kategori" class="nav-link <?= (uri_string() == 'admin/kategori') ? 'active' : '' ?>">
                <i class="fas fa-cocktail nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/subkategori" class="nav-link <?= (uri_string() == 'admin/subkategori') ? 'active' : '' ?>">
                <i class="fas fa-hourglass-start nav-icon"></i>
                <p>Subkategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kapasitas" class="nav-link <?= (uri_string() == 'admin/kapasitas') ? 'active' : '' ?>">
                <i class="fas fa-dolly-flatbed nav-icon"></i>
                <p>Kapasitas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/ukuran" class="nav-link <?= (uri_string() == 'admin/ukuran') ? 'active' : '' ?>">
                <i class="fas fa-caret-square-up"></i>
                <p>Ukuran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/refrigrant" class="nav-link <?= (uri_string() == 'admin/refrigrant') ? 'active' : '' ?>">
                <i class="fas fa-certificate"></i>
                <p>Tipe Refrigrant</p>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>
      <?php if (session()->get('role') == 'superadmin' || session()->get('role') == 'admin'): ?>
        <li class="nav-item <?= (uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor' || uri_string() == 'admin/garansi_panel' || uri_string() == 'admin/garansi_service' || uri_string() == 'admin/garansi_elemen_panas') ? 'menu-open' : '' ?>" style="width: 99%">
          <a href="#" class="nav-link <?= (uri_string() == 'admin/garansi_kompresor' || uri_string() == 'admin/garansi_sparepart' || uri_string() == 'admin/garansi_motor' || uri_string() == 'admin/garansi_panel' || uri_string() == 'admin/garansi_service' || uri_string() == 'admin/garansi_elemen_panas') ? 'active' : '' ?>">
            <i class="fas fa-scroll nav-icon"></i>
            <p>
              Garansi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/garansi_kompresor" class="nav-link <?= (uri_string() == 'admin/garansi_kompresor') ? 'active' : '' ?>">
                <i class="fas fa-tools nav-icon"></i>
                <p>Garansi Kompresor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_sparepart" class="nav-link <?= (uri_string() == 'admin/garansi_sparepart') ? 'active' : '' ?>">
                <i class="fas fa-screwdriver nav-icon"></i>
                <p>Garansi Sparepart</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_panel" class="nav-link <?= (uri_string() == 'admin/garansi_panel') ? 'active' : '' ?>">
                <i class="fas fa-tv nav-icon"></i>
                <p>Garansi Panel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_motor" class="nav-link <?= (uri_string() == 'admin/garansi_motor') ? 'active' : '' ?>">
                <i class="fas fa-motorcycle nav-icon"></i>
                <p>Garansi Motor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_service" class="nav-link <?= (uri_string() == 'admin/garansi_service') ? 'active' : '' ?>">
                <i class="fas fa-wrench nav-icon"></i>
                <p>Garansi Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/garansi_elemen_panas" class="nav-link <?= (uri_string() == 'admin/garansi_elemen_panas') ? 'active' : '' ?>">
                <i class="fas fa-fire nav-icon"></i>
                <p>Garansi Elemen Panas</p>
              </a>
            </li>
          </ul>
        <?php endif; ?>
        <!-- Manage Products Section -->
        <?php if (session()->get('role') == 'superadmin' || session()->get('role') == 'admin'): ?>
        <li class="nav-item 
        <?= (uri_string() == 'superadmin/product' || uri_string() == 'admin/product' || uri_string() == 'superadmin/product/approved' || uri_string() == 'superadmin/product/rejected') ? 'menu-open' : '' ?>" style="width: 99%">
          <a href="#" class="nav-link <?= (uri_string() == 'superadmin/product' || uri_string() == 'admin/product' || uri_string() == 'superadmin/product/approved' || uri_string() == 'superadmin/product/rejected') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>Kelola Produk<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <?php endif; ?>
            <?php if (session()->get('role') == 'superadmin'): ?>
              <!-- Link to Superadmin Dashboard -->
              <a href="/superadmin/product" class="nav-link <?= (uri_string() == 'superadmin/product') ? 'active' : '' ?>">
                <i class="fas fa-window-restore nav-icon"></i>
                <p>Antrian Konfirmasi Produk</p>
              </a>
            <?php elseif (session()->get('role') == 'admin'): ?>
              <!-- Link to Admin Dashboard -->
              <a href="/admin/product" class="nav-link <?= (uri_string() == 'admin/product') ? 'active' : '' ?>">
                <i class="fas fa-window-restore nav-icon"></i>
                <p>Antrian Produk</p>
              </a>
            </li>
          <?php endif; ?>

          <?php if (session()->get('role') == 'superadmin'): ?>
            <!-- These links are visible only to superadmin -->
            <li class="nav-item">
              <a href="/superadmin/product/approved" class="nav-link <?= (uri_string() == 'product/approved') ? 'active' : '' ?>">
                <i class="far fa-thumbs-up nav-icon"></i>
                <p>Produk Disetujui</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/superadmin/product/rejected" class="nav-link <?= (uri_string() == 'product/rejected') ? 'active' : '' ?>">
                <i class="far fa-thumbs-down nav-icon"></i>
                <p>Produk Ditolak</p>
              </a>
            </li>
          <?php endif; ?>
          </ul>
        </li>

        <!-- Manage User Section, visible only for superadmin -->
        <?php if (session()->get('role') == 'superadmin'): ?>
          <li class="nav-item <?= (uri_string() == 'superadmin/user' || uri_string() == 'superadmin/user/reset') ? 'menu-open' : '' ?>" style="width: 99%">
            <a href="#" class="nav-link <?= (uri_string() == 'superadmin/user' || uri_string() == 'superadmin/user/reset') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Kelola User<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/superadmin/user" class="nav-link <?= (uri_string() == 'superadmin/user') ? 'active' : '' ?>">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Manajemen User</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>

        <?php if (session()->get('role') == 'superadmin'): ?>
          <li class="nav-item <?= (uri_string() == 'superadmin/marketplace') ? 'menu-open' : '' ?>" style="width: 99%">
            <a href="#" class="nav-link <?= (uri_string() == 'superadmin/marketplace') ? 'active' : '' ?>">
              <i class="fas fa-map-marked-alt nav-icon"></i>
              <p>Kelola Gerai<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/superadmin/marketplace" class="nav-link <?= (uri_string() == 'superadmin/marketplace') ? 'active' : '' ?>">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Manajemen Gerai</p>
                </a>
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
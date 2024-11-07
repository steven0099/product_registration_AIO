<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Pengelolaan User
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengelolaan User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <li class="breadcrumb-item active">Pengelolaan User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Daftar User</h3>
                <a href="/superadmin/user/addUser" class="btn btn-primary ml-auto">+ Tambah User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Brand</th>
                      <th>No.Telp</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Role</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $users): ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($users['name']) ?></td>
                        <td><?= esc($users['brand']) ?></td>
                        <td><?= esc($users['phone']) ?></td>
                        <td><?= esc($users['email']) ?></td>
                        <td><?= esc($users['address']) ?></td>
                        <td><?= esc($users['role']) ?></td>
                        <td>
                        <a href="/superadmin/user/editUser/<?= esc($users['id']) ?>" class="btn-edit">
    <i class="fas fa-pencil-alt"></i> <!-- Pencil icon from Font Awesome -->
</a>
<a href="/superadmin/user/deleteUser/<?= esc($users['id']) ?>" class="btn-delete">
    <i class="fas fa-trash"></i> <!-- Trash icon from Font Awesome -->
</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

    <script>
      $(document).ready(function() {
        var table = $('#user').DataTable();
        table.destroy(); // Destroy existing DataTable instance

        $('#user').DataTable({
          "paging": true,
          "pageLength": 10,
          "searching": true,
          "ordering": true,
          "info": true,
          "responsive": true
        });
      });
    </script>
<?= $this->endSection() ?>
<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar')?>
<?= $this->include('partials/sidebar')?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url('/superadmin/user/saveUser') ?>" enctype="multipart/form-data">
              <?= csrf_field() ?>  
              <div class="card-body">
              <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" id="email" value="<?= old('email') ?>" required>
        </div>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" placeholder="Brand">
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" name="address" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label for="phone">No. Telp</label>
                    <input type="text" class="form-control" name="phone" placeholder="No. Telp">
                  </div>

                  <div class="form-group">
                    <label for="cusername">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm">Konfirmasi Password</label>
            <input type="password" name="password-confirm" class="form-control" placeholder="Konfirmasi Password" id="password-confirm" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" id="role" required>
                <option value="user" <?= old('role') === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
             <!-- Display validation errors -->
<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>
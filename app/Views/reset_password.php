<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Ganti Password
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ganti Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <li class="breadcrumb-item active">Ganti Password</li>
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
<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
              </div>
<form action="/reset/reset_password" method="post">
   <?= csrf_field() ?>
   <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

   <div class="form-group">
      <label for="current_password">Password</label>
      <input type="password" name="current_password" class="form-control" placeholder="Password Sekarang" required>
   </div>
   <div class="form-group">
      <label for="new_password">Password Baru</label>
      <input type="password" name="new_password" class="form-control" placeholder="Password Baru" required>
   </div>
   <div class="form-group">
      <label for="confirm_password">Konfirmasi Password Baru</label>
      <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password Baru" required>
   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar')?>
<?= $this->include('partials/sidebar')?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <section class="background" style="padding: 20px; background-color: #f0f0f5;">
  <title>Produk Ditolak</title>

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
              <h3 class="card-title">Daftar Produk Ditolak</h3>
              <a href="/product/step1" class="btn btn-primary ml-auto">+ Tambah Produk</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="rejected" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Foto</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Subkategori</th>
                    <th>Tipe Produk</th>
                    <th>Warna</th>
                    <th>Kapasitas</th>
                    <th>Pengaju</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
</table>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script>
      $(document).ready(function() {
        var table = $('#rejected').DataTable();
        table.destroy(); // Destroy existing DataTable instance

  $('#rejected').DataTable({
    "paging": true,
    "pageLength": 10,
    "searching": true,
    "ordering": true,
    "info": true,
    "responsive": true
  });
});
</script>
</body>
<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Produk Disetujui
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Produk Disetujui</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <li class="breadcrumb-item active">Produk Disetujui</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Daftar Produk Disetujui</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                    <th>No.</th>
                    <th>Merek</th>
                    <th>Tipe Produk</th>
                    <th>Pengaju</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php $i = 1; ?>
                <?php foreach ($approved_products as $products): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= esc($products['brand']) ?></td> <!-- Display Brand Name -->
                <td><?= esc($products['product_type']) ?></td> <!-- Display Category Name -->
                <td><?= esc($products['submitted_by']) ?></td> <!-- Display Subcategory Name -->
                <td><?= esc($products['confirmed_at']) ?></td>
                <td>
                    <a href="/product/editProduct/<?= esc($products['product_id']) ?>" class="btn-edit">
                        <i class="fas fa-pencil-alt"></i> <!-- Pencil icon from Font Awesome -->
                    </a>
                    <a href="/product/deleteProduct/<?= esc($products['product_id']) ?>" class="btn-delete">
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
    <script>

        $('#example2').DataTable();

    </script>
<?= $this->endSection() ?>
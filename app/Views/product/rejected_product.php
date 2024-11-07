<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Produk Ditolak
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Produk Ditolak</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Produk Ditolak</li>
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
                        <h3 class="card-title">Daftar Produk Ditolak</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Merek</th>
                                    <th>Tipe Produk</th>
                                    <th>Diajukan Oleh</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($rejected_products as $products): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($products['brand']) ?></td> <!-- Display Brand Name -->
                                    <td><?= esc($products['product_type']) ?></td> <!-- Display Category Name -->
                                    <td><?= esc($products['submitted_by']) ?></td> <!-- Display Subcategory Name -->
                                    <td><?= esc($products['confirmed_at']) ?></td>
                                    <td>
                                    <button class="button btn btn-success" onclick="location.href='/superadmin/details/<?= esc($products['id']) ?>'"><i class="fas fa-eye"></i></button>
                                    </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
</section>
</div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
$('#example2').DataTable();
</script>
<?= $this->endSection() ?>
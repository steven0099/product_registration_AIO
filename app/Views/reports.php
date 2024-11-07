<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Laporan
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
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
    <form action="<?= site_url('admin/generateReport') ?>" method="post">
        <?= csrf_field() ?>
        
        <!-- Status Filter -->
        <label for="status">Status Produk:</label>
        <select name="status" id="status">
            <option value="all">Diterima dan Ditolak</option>
            <option value="approved">Diterima</option>
            <option value="rejected">Ditolak</option>
        </select>
        
        <!-- Date Filter -->
        <label for="start_date">Tanggal Awal:</label>
        <input type="date" name="start_date" id="start_date" required>
        
        <label for="end_date">Tanggal Akhir:</label>
        <input type="date" name="end_date" id="end_date" required>
        
        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
    </form>
</div>

    </section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>

<?= $this->endSection() ?>
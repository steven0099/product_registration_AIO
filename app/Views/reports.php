<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- <link rel="stylesheet" href="<?= base_url('css/style.css') ?>"> -->
<style>
    /* General Styles for Form Elements */
    .form-select,
    .form-control {
        border: 2px solid #00BFFF;
        /* Blue border */
        border-radius: 5px;
        /* Rounded corners */
        padding: 10px;
        /* Padding inside the input */
        box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
        /* Shadow effect */
        transition: border-color 0.3s, box-shadow 0.3s;
        /* Smooth transition */
    }

    /* Focus Styles */
    .form-select:focus,
    .form-control:focus {
        border-color: #1E90FF;
        /* Darker blue on focus */
        box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
        /* Brighter shadow on focus */
    }

    /* Button Styles */
    .btn-primary {
        background-color: #007bff;
        /* Bootstrap primary color */
        border: none;
        /* Remove default border */
        border-radius: 5px;
        /* Rounded corners for button */
        padding: 10px 20px;
        /* Padding for button */
        transition: background-color 0.3s;
        /* Smooth transition for hover effect */
    }

    /* Button Hover Effect */
    .btn-primary:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }
</style>
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
<section class="content">
    <div class="container-fluid">
        <form action="<?= site_url('admin/generateReport') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Status Filter -->
            <div class="mb-3">
                <label for="status" class="form-label">Status Produk:</label>
                <select class="form-select form-select-sm" name="status" id="status">
                    <option value="all">Diterima dan Ditolak</option>
                    <option value="approved">Diterima</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Awal:</label>
                <input type="date" name="start_date" id="start_date" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Akhir:</label>
                <input type="date" name="end_date" id="end_date" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cetak Laporan</button>
        </form>
    </div>
</section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>

<?= $this->endSection() ?>
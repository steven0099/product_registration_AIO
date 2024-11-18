<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<style>
    /* General Styles for Form Elements */
    .form-group {
        margin-bottom: 1rem;
        /* Jarak bawah untuk elemen form */
    }

    .form-label {
        font-weight: bold;
        /* Membuat label lebih tebal */
        margin-bottom: 0.5rem;
        /* Jarak bawah label */
        display: block;
        /* Menampilkan label sebagai blok */
    }

    .form-select {
        width: 100%;
        /* Memastikan dropdown mengisi lebar penuh */
        padding: 0.375rem 0.75rem;
        /* Padding dalam dropdown */
        border: 1px solid #ced4da;
        /* Warna border */
        border-radius: 0.25rem;
        /* Sudut membulat */
        background-color: #fff;
        /* Warna latar belakang */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        /* Transisi halus untuk interaksi */
    }

    .form-select:focus {
        border-color: #80bdff;
        /* Warna border saat fokus */
        outline: none;
        /* Menghilangkan outline default */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        /* Bayangan saat fokus */
    }

    .form-select option {
        padding: 10px;
        /* Padding untuk opsi dropdown (tidak selalu berfungsi di semua browser) */
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
        width: 100%;
        /* Full width button */
    }

    /* Button Hover Effect */
    .btn-primary:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }

    /* Card Layout */
    .card {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Form Layout */
    .form-group {
        margin-bottom: 15px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Laporan
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="<?= site_url('admin/generateReport') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Status Filter -->
                <div class="form-group">
                    <label for="status" class="form-label">Status Produk:</label>
                    <select class="form-select form-select-sm" name="status" id="status">
                        <option value="all">Diterima dan Ditolak</option>
                        <option value="approved">Diterima</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>

                <!-- Date Filter -->
                <div class="form-group">
                    <label for="start_date" class="form-label">Tanggal Awal:</label>
                    <input type="date" name="start_date" id="start_date" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date" class="form-label">Tanggal Akhir:</label>
                    <input type="date" name="end_date" id="end_date" required class="form-control">
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>
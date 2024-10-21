<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form - Step 4</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="form-header">
            <img src="<?= base_url('images/logo.png') ?>" alt="AIO Logo" class="logo">
            <h2>Form Registrasi Produk</h2>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <span>General Data</span>
            <span>Dimensi Produk</span>
            <span>Keunggulan Produk</span>
            <span class="active">Foto Produk</span>
            <span>Konfirmasi Produk</span>
        </div>

        <!-- Fetching Data from Previous Steps -->
        <?php
        // Retrieve data from previous steps (this assumes you have stored the data in session or database)
        $generalData = session()->get('generalData');
        $dimensions = session()->get('dimensions');
        $advantages = session()->get('advantages');
        ?>

        <!-- Step 4: Upload Product Photos -->
        <form action="<?= base_url('/product/save-step4') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="gambar_utama">Gambar Utama: <span>(jpg, jpeg, png, max: 2MB)</span></label>
                <input type="file" name="gambar_utama" id="gambar_utama" required>
            </div>

            <div class="form-group">
                <label for="gambar_samping_kiri">Gambar Tampak Samping Kiri: <span>(jpg, jpeg, png, max: 2MB)</span></label>
                <input type="file" name="gambar_samping_kiri" id="gambar_samping_kiri" required>
            </div>

            <div class="form-group">
                <label for="gambar_samping_kanan">Gambar Tampak Samping Kanan: <span>(jpg, jpeg, png, max: 2MB)</span></label>
                <input type="file" name="gambar_samping_kanan" id="gambar_samping_kanan" required>
            </div>

            <div class="form-group">
                <label for="video_produk">Video Produk: <span>(mp4, max: 10MB)</span></label>
                <input type="file" name="video_produk" id="video_produk" accept="video/mp4" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
    </div>
</body>
</html>

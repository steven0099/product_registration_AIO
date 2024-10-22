<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Produk - Step 4</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="form-header">
            <img src="/images/logo.png" alt="AIO Logo" class="logo">
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

        <!-- Form Upload -->
        <form action="save-step4" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
            <div class="form-group">
                <label for="gambar_utama">Gambar Utama</label>
                <input type="file" id="gambar_utama" name="gambar_utama" required>
                <div class="upload-icon">⬆</div>
            </div>

            <div class="form-group">
                <label for="gambar_samping_kiri">Gambar Tampak Samping Kiri</label>
                <input type="file" id="gambar_samping_kiri" name="gambar_samping_kiri" required>
                <div class="upload-icon">⬆</div>
            </div>

            <div class="form-group">
                <label for="gambar_samping_kanan">Gambar Tampak Samping Kanan</label>
                <input type="file" id="gambar_samping_kanan" name="gambar_samping_kanan" required>
                <div class="upload-icon">⬆</div>
            </div>

            <div class="form-group">
                <label for="video_produk">Video Produk</label>
                <input type="file" id="video_produk" name="video_produk" accept="video/mp4" required>
                <div class="upload-icon">⬆</div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
    </div>
</body>
</html>
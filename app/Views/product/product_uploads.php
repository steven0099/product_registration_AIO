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
        <label for="gambar_depan">Gambar Tampak Depan</label>
        <input type="file" id="gambar_depan" name="gambar_depan" required>
    </div>

    <div class="form-group">
        <label for="gambar_belakang">Gambar Tampak Belakang</label>
        <input type="file" id="gambar_belakang" name="gambar_belakang">
    </div>

    <div class="form-group">
        <label for="gambar_atas">Gambar Tampak Atas</label>
        <input type="file" id="gambar_atas" name="gambar_atas">
    </div>

    <div class="form-group">
        <label for="gambar_bawah">Gambar Tampak Bawah</label>
        <input type="file" id="gambar_bawah" name="gambar_bawah">
    </div>

    <div class="form-group">
        <label for="gambar_samping_kiri">Gambar Tampak Samping Kiri</label>
        <input type="file" id="gambar_samping_kiri" name="gambar_samping_kiri">
    </div>

    <div class="form-group">
        <label for="gambar_samping_kanan">Gambar Tampak Samping Kanan</label>
        <input type="file" id="gambar_samping_kanan" name="gambar_samping_kanan">
    </div>

    <div class="form-group">
        <label for="video_produk">Video Produk (YouTube Link)</label>
        <input type="text" id="video_produk" name="video_produk" placeholder="https://www.youtube.com/watch?v=XXXXXXXXX" pattern="^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="submit-btn">Selanjutnya</button>
</form>

    </div>
</body>
</html>
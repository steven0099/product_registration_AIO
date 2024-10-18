<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form - Step 3</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <img src="<?= base_url('images/logo.png') ?>" alt="AIO Logo" class="logo">
            <h2>Form Registrasi Produk</h2>
        </div>
        <div class="progress-bar">
            <span>General Data</span>
            <span>Dimensi Produk</span>
            <span class="active">Keunggulan Produk</span>
            <span>Foto Produk</span>
            <span>Konfirmasi Produk</span>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('product/register_step3') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="advantage1">Keunggulan Produk</label>
                <input type="text" id="advantage1" name="advantage1" placeholder="Masukan Keunggulan Produk" required>
            </div>

            <div class="form-group">
                <input type="text" id="advantage2" name="advantage2" placeholder="Masukan Keunggulan Produk" >
            </div>

            <div class="form-group">
                <input type="text" id="advantage3" name="advantage3" placeholder="Masukan Keunggulan Produk" >
            </div>

            <div class="form-group">
                <input type="text" id="advantage4" name="advantage4" placeholder="Masukan Keunggulan Produk" >
            </div>

            <div class="form-group">
                <input type="text" id="advantage5" name="advantage5" placeholder="Masukan Keunggulan Produk" >
            </div>

            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>

    </div>
</body>
</html>

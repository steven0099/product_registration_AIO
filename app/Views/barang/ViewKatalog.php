<!DOCTYPE html>
<html>

<head>
    <title>Digital Catalog</title>
</head>

<body>
    <h1>Digital Catalog</h1>

    <div class="filter">
    </div>

    <div class="produk">
        <?php foreach ($produk as $p): ?>
            <div class="item">
                <img src="<?= base_url('uploads/' . $p['gambar']) ?>" alt="<?= $p['nama'] ?>">
                <h2><?= $p['nama'] ?></h2>
                <p><?= $p['deskripsi'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-detail-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            overflow: hidden;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .product-detail-title {
            color: #0d6efd;
            font-weight: bold;
        }

        .product-detail-info p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container product-detail-container">
        <h1 class="product-detail-title text-center mb-4"><?= esc($product['brand']) ?></h1>

        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>"
                    alt="<?= esc($product['brand']) ?>"
                    class="product-image">
            </div>
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" class="d-block w-100" alt="Gambar Depan">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>" class="d-block w-100" alt="Gambar Kiri">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>" class="d-block w-100" alt="Gambar Kanan">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>" class="d-block w-100" alt="Gambar Atas">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>" class="d-block w-100" alt="Gambar Bawah">
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Thumbnails -->
            <div class="thumbnail-images">
                <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" class="active" data-bs-target="#productCarousel" data-bs-slide-to="0" alt="Thumbnail Belakang">
                <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="1" alt="Thumbnail kanan">
                <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="2" alt="Thumbnail kiri">
            </div>
        </div>
        <div class="col-md-6 product-detail-info">
            <p><strong>Kategori:</strong> <?= esc($product['category']) ?></p>
            <p><strong>Sub Kategori:</strong> <?= esc($product['subcategory']) ?></p>
            <p><strong>Tipe Produk:</strong> <?= esc($product['product_type']) ?></p>
            <p><strong>Kapasitas:</strong> <?= esc($product['capacity']) ?> PK</p>
            <p><strong>Konsumsi Daya:</strong> <?= esc($product['daya']) ?> W</p>
            <p><strong>Kapasitas Pendinginan:</strong> <?= esc($product['cooling_capacity'] ?? '') ?> BTU/h</p>
            <p><strong>Dimensi Produk:</strong> <?= esc($product['product_dimensions']) ?> cm</p>
            <p><strong>Dimensi Kemasan:</strong> <?= esc($product['packaging_dimensions']) ?> cm</p>
            <p><strong>Berat Unit:</strong> <?= esc($product['berat']) ?> kg</p>
            <p><strong>Tipe Refrigerant:</strong> <?= esc($product['refrigrant_type'] ?? '') ?></p>
        </div>
    </div>

    <div class="text-center mt-4">
        <?php if (!empty($nextProduct)): ?>
            <a href="<?= base_url('catalog/detail/' . $nextProduct['id']) ?>" class="btn btn-primary">Next</a>
        <?php else: ?>
            <p class="text-muted">Tidak ada produk berikutnya</p>
        <?php endif; ?>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menambahkan class 'active' pada thumbnail yang diklik
        document.querySelectorAll('.thumbnail-images img').forEach((thumbnail) => {
            thumbnail.addEventListener('click', (e) => {
                document.querySelectorAll('.thumbnail-images img').forEach((img) => img.classList.remove('active'));
                e.target.classList.add('active');
            });
        });
    </script>
</body>

</html>
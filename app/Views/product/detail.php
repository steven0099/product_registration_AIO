<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-detail-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 10px;
        }

        .carousel-item {
            width: 350px;
            height: auto;
        }

        .thumbnail-images img {
            width: 350px;
            height: auto;
        }

        .product-image {
            width: 150%;
            height: auto;
            border-radius: 20px;
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

            <div class="text-center mt-4">
                <?php if (!empty($nextProduct)): ?>


                <?php else: ?>

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Product Detail</h2>
    <table>
        <tr>
            <td><strong>Kategori:</strong></td>
            <td><?= $product['category']; ?></td>
        </tr>
        <tr>
            <td><strong>Sub Kategori:</strong></td>
            <td><?= $product['subcategory']; ?></td>
        </tr>
        <tr>
            <td><strong>Tipe Produk:</strong></td>
            <td><?= $product['product_type']; ?></td>
        </tr>
        <tr>
            <td><strong>Kapasitas:</strong></td>
            <td><?= $product['capacity']; ?></td>
        </tr>
        <tr>
            <td><strong>Konsumsi Daya:</strong></td>
            <td><?= $product['daya']; ?></td>
        </tr>
        <tr>
            <td><strong>Kapasitas Pendinginan:</strong></td>
            <td><?= $product['cooling_capacity']; ?></td>
        </tr>
        <tr>
            <td><strong>Dimensi Produk:</strong></td>
            <td><?= $product['product_dimensions']; ?></td>
        </tr>
        <tr>
            <td><strong>Dimensi Kemasan:</strong></td>
            <td><?= $product['packaging_dimensions']; ?></td>
        </tr>
        <tr>
            <td><strong>Berat Unit:</strong></td>
            <td><?= $product['berat']; ?></td>
        </tr>
        <tr>
            <td><strong>Tipe Refrigerant:</strong></td>
            <td><?= $product['refrigrant']; ?></td>
        </tr>
    </table>

    <div class="button-container">
        <button type="submit" class="btn btn-primary">Selanjutnya
    </div>

</body>

</html>
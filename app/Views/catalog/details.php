<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-detail-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
        }

        .carousel-item img {
            max-width: auto;
            height: 450px;
            border-radius: 10px;
        }

        .thumbnail-images {
            display: flex;
            gap: 5px;
            justify-content: center;
            margin-top: 15px;
        }

        .thumbnail-images img {
            width: 80px;
            height: auto;
            cursor: pointer;
            border-radius: 5px;
            border: 2px solid transparent;
        }

        .thumbnail-images img.active {
            border-color: #0d6efd;
        }

        .product-description {
            padding: 20px;
        }

        .product-description h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .product-description p {
            margin: 5px 0;
            font-size: 1rem;
        }

        .product-description .product-title {
            font-weight: bold;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .product-description .product-subtitle {
            font-size: 1.2rem;
            font-weight: normal;
            color: #333;
        }

        .product-specifications {
            margin-top: 30px;
            padding: 20px;
            border-top: 2px solid #0d6efd;
        }

        .product-specifications table {
            width: 100%;
            font-size: 1rem;
            border-collapse: collapse;
        }

        .product-specifications th,
        .product-specifications td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .product-specifications th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container product-detail-container">
        <div class="row">
            <!-- Carousel Gambar Produk -->
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="d-block w-100" alt="Gambar Depan">
                        </div>
                        <?php if ($product['gambar_belakang'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" class="d-block w-100" alt="Gambar Belakang">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_samping_kiri'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>" class="d-block w-100" alt="Gambar Kiri">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_samping_kanan'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>" class="d-block w-100" alt="Gambar Kanan">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_atas'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>" class="d-block w-100" alt="Gambar Atas">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_bawah'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>" class="d-block w-100" alt="Gambar Bawah">
                        </div>
                        <?php endif; ?>
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

                <!-- Thumbnail Gambar Produk -->
                <div class="thumbnail-images">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="active" data-bs-target="#productCarousel" data-bs-slide-to="0" alt="Thumbnail Depan">
                    <?php if ($product['gambar_belakang'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="1" alt="Thumbnail Belakang">
                    <?php endif; ?>
                    <?php if ($product['gambar_samping_kiri'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="2" alt="Thumbnail Kiri">
                    <?php endif; ?>
                    <?php if ($product['gambar_samping_kanan'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="3" alt="Thumbnail Kanan">
                    <?php endif; ?>
                    <?php if ($product['gambar_atas'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="4" alt="Thumbnail Atas">
                    <?php endif; ?>
                    <?php if ($product['gambar_bawah'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="5" alt="Thumbnail Bawah">
                    <?php endif; ?>
                </div>
            </div>


            <!-- Deskripsi Produk -->
            <div class="col-md-6 product-description">
                <h1 class="product-title"><?= esc($product['brand']) ?></h1>
                <h2 class="product-title"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></h2>
                <p class="product-subtitle"><?= esc($product['product_type']) ?></p>
                <p><strong><?= !empty($product['capacity']) ? esc($product['capacity']) : ( !empty($product['ukuran']) ? esc($product['ukuran']) : null) ?></p>
                <ul class="product-details">
                    <li><?= esc($product['advantage1']) ?></li>
                    <li><?= esc($product['advantage2']) ?></li>
                    <li><?= esc($product['advantage3']) ?></li>
                    <?php if ($product['advantage4'] != null): ?>
                    <li><?= esc($product['advantage4'] ?? '') ?></li>
                    <?php endif; ?>
                    <?php if ($product['advantage5'] != null): ?>
                    <li><?= esc($product['advantage5'] ?? '') ?></li>
                    <?php endif; ?>
                    <?php if ($product['advantage6'] != null): ?>
                    <li><?= esc($product['advantage6'] ?? '') ?></li>
                    <?php endif; ?>
                </ul>
                <!-- Tombol Chat Pemesanan WhatsApp -->
                <div class="text-center mt-4">
                    <a href="https://wa.me/6289516103390?text=Halo%20saya%20ingin%20memesan%20produk%20yang%20Anda%20tawarkan."
                        target="_blank"
                        class="btn btn-success btn-lg d-inline-flex align-items-center">
                        <i class="fab fa-whatsapp me-2"></i>
                        <!-- Gambar Logo WhatsApp -->
                        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 8px;">
                        Pesan Via Whatsapp
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabel Spesifikasi Produk di Bagian Paling Bawah -->
        <div class="product-specifications">
            <h3>Spesifikasi Produk</h3>
            <table>
                <tr>
                    <th>Merek</th>
                    <td><?= esc($product['brand']) ?></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td><?= esc($product['category']) ?></td>
                </tr>
                <tr>
                    <th>Sub Kategori</th>
                    <td><?= esc($product['subcategory']) ?></td>
                </tr>
                <tr>
                    <th>Tipe Produk</th>
                    <td><?= esc($product['product_type']) ?></td>
                </tr>
                <?php if ($product['capacity'] != null): ?>
                    <tr>
                        <th>Kapasitas</th>
                        <td><?= esc($product['capacity']) ?></td>
                    </tr>
                <?php endif ?>
                <?php if ($product['ukuran'] != null): ?>
                    <tr>
                        <th>Ukuran</th>
                        <td><?= esc($product['ukuran']) ?></td>
                    </tr>
                <?php endif ?>
                <tr>
                    <th>Dimensi Produk (cm)</th>
                    <td><?= esc($product['product_dimensions']) ?></td>
                </tr>
                <tr>
                    <th>Dimensi Kemasan (cm)</th>
                    <td><?= esc($product['packaging_dimensions']) ?></td>
                </tr>
                <tr>
                    <th>Berat Unit (Kg)</th>
                    <td><?= esc($product['berat']) ?></td>
                </tr>
                <?php if ($product['subcategory'] == 'SPEAKER'): ?>
                    <tr>
                        <th>Garansi Barang</th>
                        <td><?= esc($product['garansi_semua_service']) ?> 1 Tahun</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <h3>Rekomendasi Produk Lainnya</h3>
            <div class="card" style="width: 18rem;">
                <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="card-img-top" alt="Gambar Produk" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($product['product_type']) ?></h5>
                    <p class="card-text"><?= esc($product['category']) ?></p>
                    <p class="card-text"><strong>Rp <?= (esc($product['subcategory'])) ?></strong></p>
                    <p class="card-text"><?= esc($product['brand']) ?></p>
                    <a href="<?= base_url('product/detail/' . esc($product['id'])) ?>" class="btn btn-primary">Lihat Detail</a>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    </div>

    </div>
    </div>

    <div class="text-center mt-4">
        <?php if (!empty($product['whatsapp']) && $product['availability']): ?>
            <!-- Tombol Pemesanan via WhatsApp -->
            <a href="https://wa.me/<?= esc($product['whatsapp']) ?>?text=Halo%20saya%20ingin%20memesan%20<?= urlencode($product['name']) ?>%20dengan%20harga%20<?= urlencode($product['price']) ?>"
                target="_blank"
                class="btn btn-success btn-lg d-inline-flex align-items-center">
                <img src="<?= base_url('assets/images/whatsapp-logo.png') ?>" alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 8px;">
                Pesan via WhatsApp
            </a>
        <?php else: ?>
            <!-- Tampilkan pesan atau tombol non-aktif jika tidak tersedia -->

        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.thumbnail-images img').forEach((thumbnail) => {
            thumbnail.addEventListener('click', (e) => {
                document.querySelectorAll('.thumbnail-images img').forEach((img) => img.classList.remove('active'));
                e.target.classList.add('active');
            });
        });
    </script>
</body>

</html>
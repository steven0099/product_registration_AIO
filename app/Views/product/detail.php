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
            max-width: 500px;
            height: 300px;
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
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="d-block w-100" alt="Gambar Depan">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" class="d-block w-100" alt="Gambar Belakang">
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

                <!-- Thumbnail Gambar Produk -->
                <div class="thumbnail-images">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="active" data-bs-target="#productCarousel" data-bs-slide-to="0" alt="Thumbnail Depan">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="1" alt="Thumbnail Belakang">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="2" alt="Thumbnail Kiri">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="3" alt="Thumbnail Kanan">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="4" alt="Thumbnail Atas">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>" data-bs-target="#productCarousel" data-bs-slide-to="5" alt="Thumbnail Bawah">
                </div>
            </div>


            <!-- Deskripsi Produk -->
            <div class="col-md-6 product-description">
                <h1 class="product-title"><?= esc($product['brand']) ?></h1>
                <h2 class="product-title"><?= esc($product['category']) ?></h2>
                <p class="product-subtitle"><?= esc($product['product_type']) ?></p>
                <p><strong><?= esc($product['capacity']) ?> | <?= esc($product['subcategory']) ?></strong></p>
                <ul class="product-details">
                    <li>. Health guard, menjaga selalu kebersihan pencucian dan sanitasi yang baik.</li>
                    <li>. Lunar dial (tombol pengoperasian yang sudah digital).</li>
                    <li>. Auto clean, melakukan pembersihan secara otomatis selama proses pembuangan air cucian, agar tabung bersih dan aman.</li>
                    <li>. 15" quick wash, mencuci cepat dalam waktu 15 menit.</li>
                    <li>. Terbuat dari bahan tempered glass, bonus pipa 1 meter.</li>
                    <li>. One touch smart wash, teknologi one touch wash secara otomatis.</li>
                </ul>
            </div>
        </div>

        <!-- Tombol Chat Pemesanan WhatsApp -->
<div class="text-center mt-4">
    <a href="https://wa.me/62895636161646?text=Halo%20saya%20ingin%20memesan%20produk%20yang%20Anda%20tawarkan." 
       target="_blank" 
       class="btn btn-success btn-lg d-inline-flex align-items-center">
        <i class="fab fa-whatsapp me-2"></i> 
        <!-- Gambar Logo WhatsApp -->
        <img src="<?= base_url('/images/whatsapp_logo.png') ?>" alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 8px;">
           
        Chat Pemesanan via WhatsApp
    </a>
    <div


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
                <?php endif; ?>
                <?php if ($product['ukuran'] != null): ?>
                <tr>
                    <th>Ukuran</th>
                    <td><?= esc($product['ukuran']) ?></td>
                </tr>
                <?php endif; ?>
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
                <?php if ($product['category'] == 'TV'): ?>
            <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
            <tr>
                <th>Dimensi Produk dengan Stand</th>
                <td id="standDimensionsValue"><?= esc($product['pstand_dimensions']) ?></td>
            </tr>
            <tr>
                <th>Resolusi Panel</th>
                <td id="resolutionValue"><?= esc($product['panel_resolution']) ?> Pixel</td>
            </tr>
            <tr>
                <th>Garansi Panel</th>
                <td><?= esc($product['garansi_panel']) ?> Tahun</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
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

</div>
</div>

</div>
</div>

</div>

</div>
</div>
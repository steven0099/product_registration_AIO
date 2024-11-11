<!DOCTYPE html>
<html lang="en">

<head>
    <a href="/catalog">← Kembali</a>
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

    .carousel-item iframe {
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
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    /* Adjust size based on the number of thumbnails */
    .thumbnail-images img:nth-child(7) {
        width: 60px;
        /* 60px when there are 7 thumbnails */
    }

    .thumbnail-images img:not(:nth-child(7)) {
        width: 80px;
        /* 80px for less than 7 thumbnails */
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

    .recommended-carousel {
        position: relative;
        display: flex;
        align-items: center;
    }

    .product-container {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        gap: 10px;
        width: 80%;
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
                            <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Depan">
                        </div>
                        <?php if ($product['gambar_belakang'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Belakang">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_samping_kiri'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Kiri">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_samping_kanan'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Kanan">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_atas'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Atas">
                        </div>
                        <?php endif; ?>
                        <?php if ($product['gambar_bawah'] != null): ?>
                        <div class="carousel-item">
                            <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>"
                                class="d-block w-100" alt="Gambar Bawah">
                        </div>
                        <?php endif; ?>
                        <!-- Add video slide if video link exists -->
                        <?php if ($product['video_produk'] != null): ?>
                        <div class="carousel-item" id="video-slide">
                            <iframe src="<?= esc($embedUrl) ?>" class="d-block w-100" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Thumbnail Gambar Produk -->
                <div class="thumbnail-images">
                    <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>" class="active"
                        data-bs-target="#productCarousel" data-bs-slide-to="0" alt="Thumbnail Depan">
                    <?php if ($product['gambar_belakang'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_belakang'] ?? '')) ?>"
                        data-bs-target="#productCarousel" data-bs-slide-to="1" alt="Thumbnail Belakang">
                    <?php endif; ?>
                    <?php if ($product['gambar_samping_kiri'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'] ?? '')) ?>"
                        data-bs-target="#productCarousel" data-bs-slide-to="2" alt="Thumbnail Kiri">
                    <?php endif; ?>
                    <?php if ($product['gambar_samping_kanan'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'] ?? '')) ?>"
                        data-bs-target="#productCarousel" data-bs-slide-to="3" alt="Thumbnail Kanan">
                    <?php endif; ?>
                    <?php if ($product['gambar_atas'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_atas'] ?? '')) ?>"
                        data-bs-target="#productCarousel" data-bs-slide-to="4" alt="Thumbnail Atas">
                    <?php endif; ?>
                    <?php if ($product['gambar_bawah'] != null): ?>
                    <img src="<?= base_url('uploads/' . esc($product['gambar_bawah'] ?? '')) ?>"
                        data-bs-target="#productCarousel" data-bs-slide-to="5" alt="Thumbnail Bawah">
                    <?php endif; ?>
                    <?php if ($product['video_produk']): ?>
                    <img src="<?= esc($thumbnailUrl) ?>" data-bs-target="#productCarousel" data-bs-slide-to="6"
                        alt="Video Thumbnail">
                    <?php endif; ?>
                </div>
            </div>


            <!-- Deskripsi Produk -->
            <div class="col-md-6 product-description">
                <h1 class="product-title"><?= esc($product['brand']) ?></h1>
                <h2 class="product-title"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></h2>
                <p class="product-subtitle"><?= esc($product['product_type']) ?></p>
                <?php if ($product['harga'] != null): ?>
                <p class="product-subtitle"><strong><?= esc($product['harga']) ?></strong></p>
                <?php elseif ($product['harga'] == null): ?>
                <p class="product-subtitle"><strong>Harga Belum Ditentukan</strong></p>
                <?php endif; ?>
                <p><strong><?= !empty($product['capacity']) ? esc($product['capacity']) : ( !empty($product['ukuran']) ? esc($product['ukuran']) : null) ?>
                </p>
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
                <?php if ($product['harga'] != null): ?>
                <div class="text-center mt-4">
                    <?php if ($product['capacity'] != null): ?>
                    <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20(<?= urlencode($product['subcategory']) ?>)%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aKapasitas:%20<?= urlencode($product['capacity']) ?>%0aHarga:%20<?= urlencode($product['harga']) ?>"
                        target="_blank" class="btn btn-success btn-lg d-inline-flex align-items-center">
                        <i class="fab fa-whatsapp me-2"></i>
                        <!-- Gambar Logo WhatsApp -->
                        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                            style="width: 24px; height: 24px; margin-right: 8px;">
                        Pesan Via Whatsapp
                    </a>
                    <?php endif; ?>
                    <?php if ($product['ukuran'] != null): ?>
                    <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20(<?= urlencode($product['subcategory']) ?>)%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aUkuran:%20<?= urlencode($product['ukuran']) ?>%0aHarga:%20<?= urlencode($product['harga']) ?>"
                        target="_blank" class="btn btn-success btn-lg d-inline-flex align-items-center">
                        <i class="fab fa-whatsapp me-2"></i>
                        <!-- Gambar Logo WhatsApp -->
                        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                            style="width: 24px; height: 24px; margin-right: 8px;">
                        Pesan Via Whatsapp
                    </a>
                    <?php endif; ?>
                    <?php if ($product['kapasitas_air_dingin'] != null || $product['kapasitas_air_panas'] != null): ?>
                    <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20(<?= urlencode($product['subcategory']) ?>)%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aKapasitas%20Air%20Dingin/Panas:%20<?= urlencode($product['kapasitas_air_dingin']) ?>%20L/<?= urlencode($product['kapasitas_air_panas']) ?>%20L%0aHarga:%20<?= urlencode($product['harga']) ?>"
                        target="_blank" class="btn btn-success btn-lg d-inline-flex align-items-center">
                        <i class="fab fa-whatsapp me-2"></i>
                        <!-- Gambar Logo WhatsApp -->
                        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                            style="width: 24px; height: 24px; margin-right: 8px;">
                        Pesan Via Whatsapp
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
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
                <tr>
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
                <?php if ($product['kapasitas_air_dingin'] != null || $product['kapasitas_air_panas'] != null): ?>
                <tr>
                    <th>Kapasitas Air Dingin</th>
                    <td><?= esc($product['kapasitas_air_dingin']) ?> Liter</td>
                </tr>
                <tr>
                    <th>Kapasitas Air Panas</th>
                    <td><?= esc($product['kapasitas_air_panas']) ?> Liter</td>
                </tr>
                <?php endif ?>
                <tr>
                    <th>Dimensi Produk</th>
                    <td><?= esc($product['product_dimensions']) ?></td>
                </tr>
                <tr>
                    <th>Dimensi Kemasan</th>
                    <td><?= esc($product['packaging_dimensions']) ?></td>
                </tr>
                <tr>
                    <th>Berat Unit</th>
                    <td><?= esc($product['berat']) ?> Kg</td>
                </tr>
                <tr>
                    <th>Konsumsi Daya</th>
                    <td><?= esc($product['daya']) ?> Watt</td>
                </tr>
                <?php if ($product['subcategory'] == 'SPEAKER'): ?>
                <tr>
                    <th>Garansi Barang</th>
                    <td><?= esc($product['garansi_semua_service']) ?> 1 Tahun</td>
                </tr>
                <?php endif; ?>
                <?php if ($product['category'] == 'TV'): ?>
                <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
                <tr>
                    <th>Resolusi Panel</th>
                    <td><?= esc($product['panel_resolution']) ?> Pixel</td>
                </tr>
                <tr>
                    <th>Dimensi Produk Dengan Stand</th>
                    <td><?= esc($product['pstand_dimensions']) ?></td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Panel</th>
                    <td><?= esc($product['garansi_panel']) ?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['category'] == 'AC'): ?>
                <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                <tr>
                    <th>Kapasitas Pendinginan</th>
                    <td><?= esc($product['cooling_capacity']) ?> BTU/h</td>
                </tr>
                <tr>
                    <th>Garansi Kompresor</th>
                    <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Tipe Refrigerant</th>
                    <td><?= esc($product['refrigrant']) ?></td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
                <tr>
                    <th>CSPF Rating</th>
                    <td><?= esc($product['cspf']) ?>/5
                        <?php if ($product['cspf'] == 5): ?>
                        <img src="<?= base_url('/images/5stars.png') ?>" alt="cspf-star"
                            style="height:35px; padding: 5px">
                        <?php elseif ($product['cspf'] < 5 || $product['cspf'>= 4]): ?>
                        <img src="<?= base_url('/images/4stars.png') ?>" alt="cspf-star"
                            style="height:35px; padding: 5px">
                        <?php elseif ($product['cspf'] < 4 || $product['cspf'>= 3]): ?>
                        <img src="<?= base_url('/images/3stars.png') ?>" alt="cspf-star"
                            style="height:35px; padding: 5px">
                        <?php elseif ($product['cspf'] < 3 || $product['cspf'>= 2]): ?>
                        <img src="<?= base_url('/images/2stars.png') ?>" alt="cspf-star"
                            style="height:35px; padding: 5px">
                        <?php elseif ($product['cspf'] < 2 || $product['cspf'>= 1]): ?>
                        <img src="<?= base_url('/images/1star.png') ?>" alt="cspf-star"
                            style="height:35px; padding: 5px">
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>

                <?php if ($product['category'] == 'KULKAS' || $product['category'] == 'FREEZER' || $product['category'] == 'SHOWCASE' ): ?>
                <tr>
                    <th>Garansi Kompresor</th>
                    <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['category'] == 'MESIN CUCI'): ?>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Motor</th>
                    <td><?= esc($product['garansi_motor']) ?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'KIPAS ANGIN'): ?>
                <tr>
                    <th>Garansi Motor</th>
                    <td><?= esc($product['garansi_motor']) ?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
                <tr>
                    <th>Garansi Kompresor</th>
                    <td><?= esc($product['compressor_warranty'])?></td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'): ?>
                <tr>
                    <th>Garansi Elemen Panas</th>
                    <td><?= esc($product['garansi_elemen_panas']) ?></td>
                </tr>
                <tr>
                    <th>Garansi Sparepart & Jasa Service</th>
                    <td><?= esc($product['sparepart_warranty'])?></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3>Rekomendasi Produk Lainnya</h3>
        </div>

        <div class="recommended-carousel">
            <!-- Left Arrow -->
            <button class="arrow left-arrow" onclick="scrollLeft()">&#9664;</button>

            <!-- Product Container -->
            <div class="product-container">
                <?php foreach ($relatedProducts as $product): ?>
                <div class="product-item">
                    <div class="card" style="width: 300px;">
                        <img src="<?= base_url('uploads/' . esc($product['gambar_depan'] ?? '')) ?>"
                            class="card-img-top" alt="Gambar Produk" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($product['brand']) ?> -
                                <?= esc($product['product_type']) ?></h5>
                            <p class="card-text"><?= esc($product['category']) ?></p>
                            <p class="card-text"><?= esc($product['subcategory']) ?></p>
                            <?php if ($product['harga'] != null): ?>
                            <p class="card-text"><strong><?= esc($product['harga']) ?></strong></p>
                            <?php elseif ($product['harga'] == null): ?>
                            <p class="card-text"><strong>Harga Belum Ditentukan</strong></p>
                            <?php endif; ?>

                            <p class="card-text">
                                <?= !empty($product['capacity']) ? esc($product['capacity']) : 
                                (!empty($product['ukuran']) ? esc($product['ukuran']) : 
                                (!empty($product['kapasitas_air_dingin']) && !empty($product['kapasitas_air_panas']) ? 
                                    esc($product['kapasitas_air_dingin']) . '/' . esc($product['kapasitas_air_panas']) : 
                                    'N/A')) ?>
                            </p>
                            <a href="<?= base_url('catalog/details/' . esc($product['id'])) ?>"
                                class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Right Arrow -->
            <button class="arrow right-arrow" onclick="scrollRight()">&#9654;</button>
        </div>



    </div>
    </div>

    </div>

    </div>
    </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.thumbnail-images img').forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', (e) => {
        // Remove 'active' class from all thumbnails
        document.querySelectorAll('.thumbnail-images img').forEach((img) => img.classList.remove(
            'active'));
        // Add 'active' class to the clicked thumbnail
        e.target.classList.add('active');

        // Navigate the carousel to the clicked slide
        const carousel = document.querySelector('#productCarousel');
        const bootstrapCarousel = bootstrap.Carousel.getOrCreateInstance(carousel);
        bootstrapCarousel.to(index); // Navigate to the specific slide index
    });

    document.addEventListener("DOMContentLoaded", function() {
        const thumbnails = document.querySelectorAll('.thumbnail-images img');

        // Check the number of thumbnails
        if (thumbnails.length === 7) {
            thumbnails.forEach(thumbnail => {
                thumbnail.style.width = '60px'; // Set width to 60px for 7 thumbnails
            });
        } else {
            thumbnails.forEach(thumbnail => {
                thumbnail.style.width = '80px'; // Set width to 80px for less than 7 thumbnails
            });
        }
    });
});
</script>





</html>
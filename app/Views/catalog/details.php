<!DOCTYPE html>
<html lang="en">

<head>
<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/catalog">Beranda</a></li>
                    <li class="breadcrumb-item active">Rincian Produk</li>
                </ol>
            </div><!-- /.col -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
.product-detail-container {
    max-width: 1080px;
    margin: 0 auto;
    padding: 10px;
    position: relative;
    background-image: url('<?= base_url("images/wm.png") ?>');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100px; /* Adjust size as needed */
    background-attachment: fixed; /* Keeps the watermark in place when scrolling */
    z-index: 1; /* Ensure the background is behind content */
}

.product-detail-container * {
    position: relative;
    z-index: 2; /* Ensures text and images overlay the watermark */
}

.carousel-control-prev,
.carousel-control-next {
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Adjust for perfect centering */
    width: 5%; /* Reduce width if needed */
    background: none; /* Remove default background */
    color: #333; /* Set color if needed for visibility */
}

.carousel-control-prev {
    left: -10%; /* Position to the left outside the image */
    margin-left:25px;
}

.carousel-control-next {
    right: -90%; /* Position to the right outside the image */
    margin-top: 205px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Make the icons semi-transparent */
    border-radius: 50%;
    padding: 20px; /* Increase padding for a larger click area */
}

    .carousel-item img {
        max-width: 540px;
        height: 350px;
        border-radius: 10px;
    }

    .carousel-item iframe {
        max-width: 540px;
        height: 350px;
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
        padding: 50px;
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
        padding: 10px;
    }

    .product-specifications table {
    width: 100%;
    padding: 0px;
    border-top: none;
    border-left: 1px solid #fff;
    border-right: 1px solid #fff;
    border-bottom: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 8px 8px;
    table-layout: fixed; /* Force equal column widths */
}

.product-specifications th, 
.product-specifications td {
    width: 50%; /* Each cell will take up half the width */
    padding-left: 5px;
    background-color: rgba(0, 0, 0, 0.1); /* Light gray with 80% opacity */
    border-right: 2px solid rgba(255, 255, 255, 0.1); /* White with 80% opacity */
    border-left: 2px solid rgba(255, 255, 255, 0.1);
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    text-align: left;
}


.product-specifications h3 {
    text-align: center;
    background-color: rgba(0, 77, 255, 0.8);
    color: #fff;
    display: block;
    height: 25px;
    font-family: Arial;
    font-size: 18px;
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
            <div class="col-md-7">
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
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
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                
                    <!-- Carousel Controls -->


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
            <div class="col-md-5 product-description">
                <h1 class="product-title"><?= esc($product['brand']) ?></h1>
                <h2 class="product-title"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></h2>
                <h3 class="product-title"><?= esc($product['product_type']) ?> |
                <?php if ($product['capacity'] != null): ?>
                <?= esc($product['capacity']) ?>
                <?php elseif ($product['ukuran'] != null): ?>
                <?= esc($product['ukuran']) ?>
                <?php elseif ($product['kapasitas_air_dingin'] != null || $product['kapasitas_air_panas'] != null): ?>
                <?= esc($product['kapasitas_air_dingin']) ?>/<?= esc($product['kapasitas_air_panas']) ?> Liter</td>
                <?php endif ?>
                 </h3>
                <?php if ($product['harga'] != null): ?>
                <p class="product-subtitle"><strong><?= esc($product['harga']) ?></strong></p>
                <?php elseif ($product['harga'] == null): ?>
                <p class="product-subtitle"><strong>Harga Belum Ditentukan</strong></p>
                <?php endif; ?>
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

                <div class="text-center mt-4">
    <a id="locationButton" class="btn btn-success btn-lg dropdown-toggle d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" href="#">
        <i class="fab fa-whatsapp me-2"></i>
        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp" style="width: 24px; height: 24px; margin-right: 8px;">
        Pilih Lokasi
    </a>
    <ul class="dropdown-menu" aria-labelledby="locationButton">
        <?php foreach ($marketplace as $item): ?>
            <li><a class="dropdown-item" href="#" data-location="<?= $item['location'] ?>">AIO Store <?= $item['location'] ?></a></li>
        <?php endforeach; ?>
    </ul>
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
                <tr>
                    <th>Negara Pembuat</th>
                    <td><?= esc($product['pembuat']) ?></td>
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

                <?php if ($product['category'] == 'MESIN CUCI' || $product['subcategory'] == 'BLENDER'): ?>
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
                    <td><?= esc($product['compressor_warranty'])?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'MICROWAVE' ||$product['subcategory'] == 'MAGIC COM' ||$product['subcategory'] == 'RICE COOKER' ||$product['subcategory'] == 'OVEN' ||$product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'): ?>
                <tr>
                    <th>Garansi Elemen Panas</th>
                    <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Sparepart & Jasa Service</th>
                    <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'SETRIKA' || $product['subcategory'] == 'VACUUM CLEANER'): ?>
                <tr>
                    <th>Garansi Elemen Panas</th>
                    <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Service</th>
                    <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'TOASTER'): ?>
                <tr>
                    <th>Garansi Elemen Panas</th>
                    <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                </tr>
                <?php endif; ?>

                <?php if ($product['subcategory'] == 'KOMPOR TUNGKU' ||$product['subcategory'] == 'KOMPOR TANAM' || $product['subcategory'] == 'COOKER HOOD' || $product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'AIR CURTAIN'): ?>
                <tr>
                    <th>Garansi Service</th>
                    <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                </tr>
                <tr>
                    <th>Garansi Sparepart</th>
                    <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>

    
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3 style="text-align:center">Rekomendasi Produk Lainnya</h3>
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
                                    esc($product['kapasitas_air_dingin']) . '/' . esc($product['kapasitas_air_panas'] . ' Liter') : 
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



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.thumbnail-images img').forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', (e) => {
        // Remove 'active' class from all thumbnails
        document.querySelectorAll('.thumbnail-images img').forEach((img) => img.classList.remove('active'));
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
                thumbnail.style.width = '80px'; // Set width to 60px for 7 thumbnails
            });
        } else {
            thumbnails.forEach(thumbnail => {
                thumbnail.style.width = '100px'; // Set width to 80px for less than 7 thumbnails
            });
        }
    });
});


    document.addEventListener("DOMContentLoaded", function() {
    // Get product details for WhatsApp message
    const brand = "<?= urlencode($product['brand']) ?>";
    const productType = "<?= urlencode($product['product_type']) ?>";

    // Handle dropdown item click and redirect to WhatsApp in a new tab
    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default link behavior
            const location = this.getAttribute("data-location");

            // Construct the WhatsApp link with selected location and product details
            const whatsappLink = `https://wa.me/6287822297790?text=Halo%20CS%20AIO%20Store,%20saya%20ingin%20bertanya%20mengenai%20produk%20${brand}%20${productType}%0aApakah%20ready%20di%20AIO%20Store%20${location}?`;

            // Open WhatsApp link in a new tab
            window.open(whatsappLink, '_blank');
        });
    });
});
</script>





</html>
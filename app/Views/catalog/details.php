<!DOCTYPE html>
<html lang="en">


<head>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">



<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:auto; width:100%; position: fixed">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
   </ul>

   <div class="col-sm-6" style="margin-left:100px">
    <a href="/catalog" class="breadcrumb-link" style="font-family: arial sans-serif; font-size:18px">Beranda</a> 
<span class="breadcrumb-separator"></span> 
<span class="breadcrumb-item" style="font-family: arial sans-serif; font-size:18px">Detail Produk</span>
    </div><!-- /.col -->

   <!-- User Dropdown -->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= session()->get('name') ? esc(session()->get('name')) : 'Guest'; ?>
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a href="/reset/reset-password" class="dropdown-item">
               <i class="fas fa-key mr-2"></i> Ganti Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
               <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
         </div>
      </li>
   </ul>
</nav>

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        /* Ensure the navbar stays fixed and doesn’t overlap the content */
.main-header {
  position: fixed; /* Fix the navbar at the top */
  top: 0;
  left: 0;
  width: 100%; /* Ensure it spans the full width */
  z-index: 1030; /* Higher than other elements to avoid being covered */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow for clarity */
}

/* Add padding to the content below to avoid overlap */
.content-wrapper {
  margin-top: 56px; /* Same as the navbar height */
}

    .product-detail-container {
        max-width: 1080px;
        margin-bottom: auto;
        padding: 10px;
        position: relative;
        background-image: url('<?= base_url("images/wm.png") ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100px;
        /* Adjust size as needed */
        background-attachment: fixed;
        /* Keeps the watermark in place when scrolling */
        z-index: 1;
        /* Ensure the background is behind content */
    }

    .product-detail-container * {
        position: relative;
        z-index: 2;
        /* Ensures text and images overlay the watermark */
    }


.carousel-control-prev {
    left: -43px; /* Move the button to the left of the carousel */
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: none;
    color: #000;
    cursor: pointer;
    z-index: 10;
}

.carousel-control-next {
    right: -20px; /* Move the button to the right of the carousel */
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background: none;
    color: #000;
    cursor: pointer;
    z-index: 10;
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: #000;
    border: 1px solid #000;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    padding: 10px; /* Adjust padding to make the click area larger */
}

.carousel-item img, .carousel-item iframe {
    max-width: 495px;
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
    border: 2px solid #0daff0;
}

.breadcrumb-separator {
        font-family: FontAwesome;
    }

    .product-description {
        padding: 50px;
    }

    .product-description h2 {
        font-size: 15px;
        font-weight: bold;
    }

    .product-description p {
        margin: 5px 0;
        font-size: 1rem;
    }

    .product-description .product-title {
        font-weight: bold;
        font-size: 1.5rem;
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
        margin-top:1px;
        border-top: none;
        border-bottom: none;
        border-radius: 0 0 8px 8px;
        table-layout: fixed;
        /* Force equal column widths */
    }

/* General styling for table cells */
.product-specifications th,
.product-specifications td {
    width: 50%; /* Each cell will take up half the width */
    padding-left: 5px;
    background-color: rgba(0, 0, 0, 0.1); /* Light gray with 80% opacity */
    text-align: left;
}

/* Add a right border only to the cells in the first column */
.product-specifications th:first-child,
.product-specifications td:first-child {
    border-right: 2px solid rgba(255, 255, 255, 0.1); /* White with 80% opacity */
}

/* Remove other borders */
.product-specifications th,
.product-specifications td {
    border-left: none;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    padding:5px;
    padding-left:15px;
}



    .product-specifications h3 {
        text-align: center;
        background-color: rgba(13, 175, 240, 0.8);
        color: #fff;
        margin-bottom:2px;
        display: block;
        padding: 8px;
        height: 35px;
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
        overflow-x: hidden;
        scroll-behavior: smooth;
        gap: 10px;
        width: 100%;
        overflow-y: hidden;
    }

    .product-item .card-title{
        color: #000000;
        margin-bottom:1px;
        font-size:14px;
    }

    .product-item a{
        position: absolute;
        color: #fff;
        bottom:5px;
        left:10px;
        background-color: #0daff0;
        border: #0d2a46;
        margin-bottom:1px;
    }

    .product-item .card img {
        width: 100%;
        padding:5px;
        height: 125px; /* Increase height for better image focus */
        object-fit: cover;
    }
    </style>
</head>

<body style="margin-top:60px;">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
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
                <h3 class="product-title"><?= esc($product['product_type']) ?> |
                    <?php if ($product['capacity'] != null): ?>
                    <?= esc($product['capacity']) ?>
                    <?php elseif ($product['ukuran'] != null): ?>
                    <?= esc($product['ukuran']) ?>
                    <?php elseif ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
                    <?= esc($product['kapasitas_air_dingin']) ?> Liter / <?= esc($product['kapasitas_air_panas']) ?>
                    Liter</td>
                    <?php elseif ($product['subcategory'] == 'AIR PURIFIER'): ?>
                    <?= esc($product['kapasitas_air_dingin']) ?> M²</td>
                    <?php endif ?>
                </h3>
                <!-- harga 
                <?php if ($product['harga'] != null): ?>
                <p class="product-subtitle"><strong><?= esc($product['harga']) ?></strong></p>
                <?php elseif ($product['harga'] == null): ?>
                <p class="product-subtitle"><strong>Harga Belum Ditentukan</strong></p>
                <?php endif; ?>
                -->
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
                    <a id="locationButton"
                        class="btn btn-success btn-lg dropdown-toggle d-inline-flex align-items-center"
                        data-bs-toggle="dropdown" aria-expanded="false" href="#">
                        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                            style="width: 24px; height: 24px; margin-right: 8px;">
                        Hubungi Kami
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="locationButton">
                        <li class="dropdown-item">Pilih Cabang AIO Store:</li>
                        <?php foreach ($marketplace as $item): ?>
                        <li><a class="dropdown-item" href="#" data-location="<?= $item['location'] ?>" data-phone="<?= $item['phone'] ?>">AIO Store
                                <?= $item['location'] ?></a></li>
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
                    <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
                    <tr>
                        <th>Kapasitas Air Dingin</th>
                        <td><?= esc($product['kapasitas_air_dingin']) ?> Liter</td>
                    </tr>
                    <tr>
                        <th>Kapasitas Air Panas</th>
                        <td><?= esc($product['kapasitas_air_panas']) ?> Liter</td>
                    </tr>
                    <?php endif ?>
                    <?php if ($product['subcategory'] == 'AIR PURIFIER'): ?>
                    <tr>
                        <th>Kapasitas</th>
                        <td><?= esc($product['kapasitas_air_dingin']) ?> M²</td>
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

                    <?php if ($product['category'] == 'MESIN CUCI' || $product['subcategory'] == 'BLENDER' || $product['subcategory'] == 'JUICER'): ?>
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

                    <?php if ($product['subcategory'] == 'KOMPOR TUNGKU' ||$product['subcategory'] == 'KOMPOR TANAM' || $product['subcategory'] == 'COOKER HOOD' || $product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'AIR CURTAIN' || $product['subcategory'] == 'AIR FRYER'): ?>
                    <tr>
                        <th>Garansi Jasa Service</th>
                        <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                    </tr>
                    <tr>
                        <th>Garansi Sparepart</th>
                        <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
                    </tr>
                    <?php endif; ?>

                    <?php if ($product['subcategory'] == 'AIR PURIFIER'): ?>
                    <tr>
                        <th>Garansi Sparepart & Jasa Service</th>
                        <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
                    </tr>

                    <?php endif; ?>
                </table>
            </div>


            <div class="row">
                <div class="col-md-12 mb-4">
                    <h3 style="text-align:center">Rekomendasi Untuk Anda</h3>
                </div>

                <div class="recommended-carousel">
    <!-- Left Arrow -->
    <button class="carousel-control-prev-icon" style="right:5px;" onclick="scrollProductLeft()"></button>

    <!-- Product Container -->
    <div class="product-container">
        <?php foreach ($relatedProducts as $relproduct): ?>
        <a href="<?= base_url('catalog/details/' . esc($relproduct['id'])) ?>" class="product-item" style="text-decoration: none; color: inherit;">
            <div class="card" style="width: 250px; height: 220px;">
                <img src="<?= base_url('uploads/' . esc($relproduct['gambar_depan'] ?? '')) ?>" class="card-img-top" alt="Gambar Produk">
                <div class="card-body p-2">
                    <h5 class="card-title"><strong><?= esc($relproduct['brand']) ?> | <?= esc($product['product_type']) ?></strong></h5><br>
                    <p class="card-title"><?= esc($relproduct['category']) ?> <?= esc($relproduct['subcategory']) ?></p>
                    
                    <p class="card-text">
                        <?= !empty($relproduct['capacity']) ? esc($relproduct['capacity']) : 
                            (!empty($relproduct['ukuran']) ? esc($relproduct['ukuran']) : 
                            (!empty($relproduct['kapasitas_air_dingin']) && !empty($relproduct['kapasitas_air_panas']) ? 
                                esc($relproduct['kapasitas_air_dingin']) . '/' . esc($relproduct['kapasitas_air_panas'] . ' Liter') : 
                                null)) ?>
                        <?php if  ($relproduct['subcategory'] == 'AIR PURIFIER'): ?>
                        <?= esc($relproduct['kapasitas_air_dingin']) . ' M²' ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Right Arrow -->
    <button class="carousel-control-next-icon" style="left:5px;" onclick="scrollProductRight()"></button>
</div>

            </div>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Define the scroll amount (in pixels)
    // Define the scroll amount (in pixels)
    const scrollAmount = 300;

    // Scroll the product container to the left
    function scrollProductLeft() {
        const container = document.querySelector('.product-container');
        container.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    }

    // Scroll the product container to the right
    function scrollProductRight() {
        const container = document.querySelector('.product-container');
        container.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }

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
                thumbnail.style.width = '70px'; // Set width to 60px for 7 thumbnails
            });
        } else {
            thumbnails.forEach(thumbnail => {
                thumbnail.style.width = '90px'; // Set width to 80px for less than 7 thumbnails
            });
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Handle dropdown item click and redirect to WhatsApp in a new tab
    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior

            // Fetch product details dynamically
            const brand = encodeURIComponent("<?= $product['brand'] ?>"); // Use correct server-side variables
            const productType = encodeURIComponent("<?= $product['product_type'] ?>");

            // Fetch location and phone dynamically from the clicked item
            const location = encodeURIComponent(this.getAttribute("data-location"));
            const phone = encodeURIComponent(this.getAttribute("data-phone"));

            // Construct the WhatsApp link
            const whatsappLink =
                `https://wa.me/${phone}?text=Halo%20CS%20AIO%20Store!%0ASaya%20ingin%20bertanya%20mengenai%20produk%20${brand}%20${productType}%0AApakah%20ready%20di%20AIO%20Store%20${location}?`;

            // Open WhatsApp link in a new tab
            window.open(whatsappLink, '_blank');
        });
    });
});



</script>





</html>
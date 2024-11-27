<?= $this->extend('partials/catalog') ?>

<?= $this->section('css') ?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
    .product-detail-container {
        max-width: 1080px;
        margin: 0 auto;
        padding: 10px;
        position: relative;
        background-image: url('<?= base_url("images/wm.png") ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100px;
        font-family: Poppins, sans-serif;
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
        left: -43px;
        /* Move the button to the left of the carousel */
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: none;
        color: #000;
        cursor: pointer;
        z-index: 10;
    }

    .carousel-control-next {
        right: -20px;
        /* Move the button to the right of the carousel */
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: none;
        color: #000;
        cursor: pointer;
        z-index: 10;
    }

    .carousel-control-prev-icon {
        background-image: url('/images/prev.png');
        background-size: contain;
        /* Ensures the image fits within the button */
        background-repeat: no-repeat;
        width: 40px;
        /* Adjust width to fit your image */
        height: 40px;
        /* Adjust height to fit your image */
    }

    .carousel-control-next-icon {
        background-image: url('/images/next.png');
        background-size: contain;
        background-repeat: no-repeat;
        width: 40px;
        /* Adjust width */
        height: 40px;
        /* Adjust height */
    }

    .carousel-item img,
    .carousel-item iframe {
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
        font-size: 14px;
    }

    .product-description {
        padding-left: 50px;
        padding-top: 25px;
        padding-right: 25px;
        padding-bottom: 25px;
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
        margin-left: 35px;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .product-description .product-subtitle {
        font-size: 18px;
        font-weight: bold;
        margin-left: 35px;
        color: #333;
    }

    .product-description .product-subtitle2 {
        font-size: 16px;
        font-weight: 500;
        margin-left: 35px;
        color: #333;
    }

    .product-specifications {
        margin-top: 30px;
        padding: 10px;
        position: relative;
    }

    .product-specifications table {
        width: 100%;
        padding: 0px;
        margin-top: 1px;
        border-top: none;
        border-bottom: none;
        border-radius: 0 0 8px 8px;
        table-layout: fixed;
        z-index: 1000;
        /* Force equal column widths */
    }

    /* General styling for table cells */
    .product-specifications th,
    .product-specifications td {
        width: 50%;
        /* Each cell will take up half the width */
        padding-left: 5px;
        background-color: rgba(0, 0, 0, 0.1);
        /* Light gray with 80% opacity */
        text-align: left;
        z-index: 1000;
    }

    /* Add a right border only to the cells in the first column */
    .product-specifications th:first-child,
    .product-specifications td:first-child {
        border-right: 2px solid rgba(255, 255, 255, 0.1);
        /* White with 80% opacity */
    }

    /* Remove other borders */
    .product-specifications th,
    .product-specifications td {
        border-left: none;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        padding: 5px;
        padding-left: 15px;
    }



    .product-specifications h3 {
        text-align: center;
        background-color: rgba(13, 175, 240, 0.8);
        color: #fff;
        margin-bottom: 2px;
        display: block;
        padding: 8px;
        height: 35px;
        font-family: Poppins, sans-serif;
        font-weight: bold;
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

    .product-item .card-title {
        color: #000000;
        margin-bottom: 1px;
        font-size: 14px;
    }

    .product-item a {
        position: absolute;
        color: #fff;
        bottom: 5px;
        left: 10px;
        background-color: #0daff0;
        border: #0d2a46;
        margin-bottom: 1px;
    }

    .text-center {
        position: relative;
        /* Ensure stacking context for the dropdown */
    }

    #floatingWidget {
        position: fixed;
        /* Makes it float at a fixed position */
        bottom: 20px;
        /* Adjust the vertical position */
        right: 20px;
        /* Adjust the horizontal position */
        z-index: 9999;
        /* Ensure it's above everything else */
        font-family: Poppins, sans-serif;
    }

    .btn-widget {
        border-radius: 50%;
        /* Make the button round */
        width: 60px;
        /* Set the width */
        height: 60px;
        /* Set the height */
        display: flex;
        /* Use flexbox for alignment */
        align-items: center;
        /* Center vertically */
        justify-content: center;
        /* Center horizontally */
        padding: 0;
        /* Remove any padding */
    }

    .btn-widget img {
        width: 70%;
        /* Make the logo fill most of the button */
        height: 70%;
        /* Maintain aspect ratio */
        object-fit: contain;
        /* Ensure the image scales without distortion */
    }


    .btn-widget::after {
        display: none !important;
        /* Hides the caret */
    }


    .dropdown-menu {
        position: absolute;
        bottom: 100%;
        /* Make the dropdown appear above the button */
        right: 0;
        /* Align the dropdown with the button */
        z-index: 9999;
        border: none;
        /* Remove the border */
        box-shadow: none;
        /* Remove the shadow */
        background-color: rgba(255, 255, 255, 0);
        /* Change the background color */
        padding: 10px;
        /* Add spacing around the entire dropdown */
    }

    .dropdown-item {
        margin-bottom: 5px;
        /* Add spacing between items */
        padding: 10px 15px;
        /* Add padding inside the items */
        background-color: #53a653;
        /* Set the background color for items */
        border-radius: 25px;
        color: #fff;
        transition: background-color 0.3s ease;
        /* Smooth transition for hover effect */
    }

    /* Last item in the dropdown should have no margin-bottom */
    .dropdown-item:last-child {
        margin-bottom: 0;
    }

    /* Hover effect for dropdown items */
    .dropdown-item:hover {
        background-color: #5cb85c;
        /* Highlight color on hover */
        cursor: pointer;
    }

    #locationButton {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }



    .product-item .card img {
        width: 100%;
        padding: 5px;
        height: 125px;
        /* Increase height for better image focus */
        object-fit: cover;
        border-bottom: 2px solid rgba(0, 0, 0, 0.4);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Detail Produk
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:auto; width:100%; position: fixed; top: 0; z-index: 1030; display: flex; justify-content: space-between; align-items: center;">

    <!-- Left section (Breadcrumb links) -->
    <div class="col-sm-9 d-flex align-items-center">
        <img src="/images/aio-new.png" alt="Logo" style="max-width: 150px; height: 50px; margin-left:65px; margin-right:200px">
        <a href="/catalog" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px;color: ;">Beranda</a>
        <span class="breadcrumb-separator" style="margin-left: 2px;">  </span>
        <a href="/catalog?category=<?= esc($product['category']) ?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px">Kategori</a>
        <span class="breadcrumb-separator" style="margin-left: 2px;"></span>
        <a href="/catalog?category=<?= esc($product['category']) ?>&subcategory=<?= esc($product['subcategory']) ?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px;">Subkategori</a>
        <?php if ($product['capacity'] != null): ?>
            <span class="breadcrumb-separator" style="margin-left: 2px;"></span>
            <a href="/catalog?category=<?= esc($product['category']) ?>&subcategory=<?= esc($product['subcategory']) ?>&capacity=<?= esc($product['capacity']) ?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px;">Kapasitas</a>
        <?php elseif ($product['ukuran'] != null): ?>
            <span class="breadcrumb-separator" style="margin-left: 2px;"></span>
            <a href="/catalog?category=<?= esc($product['category']) ?>&subcategory=<?= esc($product['subcategory']) ?>&ukuran=<?= esc($product['ukuran']) ?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px;">Ukuran</a>
        <?php endif; ?>
        <span class="breadcrumb-separator" style="margin-left: 2px;"></span>
        <span class="breadcrumb-item" style="font-family: Poppins, sans-serif; font-size:18px;">Detail Produk</span>
    </div>

    <!-- Right section (User Dropdown) -->
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

<div class="content-header" style="margin-top: 60px; margin-bottom: 30px; background-color: #009fe3; padding: 20px; color: white;">
    <div class="container-fluid" style="display: flex; align-items: center; justify-content: space-between;">
        <!-- Breadcrumb Text -->
        <div class="breadcrumb-text">
            <h1 style="margin: 0; margin-left:80px; font-size: 100px; font-weight: bold;">Katalog <br> Produk</h1>
        </div>
        <!-- Breadcrumb Image -->
        <div class="breadcrumb-image">
            <img src="/images/eco-catalog.png" alt="Header Image" style="max-height: 420px; margin-right:80px; width: auto;">
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
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
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
            <h2 class="product-subtitle"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></h2>
            <h3 class="product-subtitle2">
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
                | <?= esc($product['product_type']) ?>
            </h3>
            <!-- harga 
                <?php if ($product['harga'] != null): ?>
                <p class="product-subtitle"><strong><?= esc($product['harga']) ?></strong></p>
                <?php elseif ($product['harga'] == null): ?>
                <p class="product-subtitle"><strong>Harga Belum Ditentukan</strong></p>
                <?php endif; ?>
                -->
            <ul class="product-details" style="margin-left: 10px; font-size: 12px;">
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
                <th>Warna</th>
                <td><?= esc($product['color']) ?></td>
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
                <th>Garansi Semua Service</th>
                <td><?= esc($product['garansi_semua_service']) ?></td>
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
                        <img src="<?= base_url('/images/5stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 4.00 && $product['cspf'] < 5): ?>
                        <img src="<?= base_url('/images/4stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 3.00 && $product['cspf'] < 4.00): ?>
                        <img src="<?= base_url('/images/3stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 2.00 && $product['cspf'] < 3.00): ?>
                        <img src="<?= base_url('/images/2stars.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php elseif ($product['cspf'] >= 1.00 && $product['cspf'] < 2.00): ?>
                        <img src="<?= base_url('/images/1star.png') ?>" alt="cspf-star" style="height:35px; padding: 5px">
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>

        <?php if ($product['category'] == 'KULKAS' || $product['category'] == 'FREEZER' || $product['category'] == 'SHOWCASE'): ?>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['category'] == 'MESIN CUCI' || $product['subcategory'] == 'CHOPPER' || $product['subcategory'] == 'BLENDER' || $product['subcategory'] == 'JUICER'): ?>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'KIPAS ANGIN' || $product['subcategory'] == 'HAND MIXER' || $product['subcategory'] == 'MIXER'): ?>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'MICROWAVE' || $product['subcategory'] == 'MAGIC COM' || $product['subcategory'] == 'RICE COOKER' || $product['subcategory'] == 'OVEN' || $product['subcategory'] == 'CUP SEALER' || $product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'WATER BOILER'  || $product['subcategory'] == 'COFFEE MAKER' || $product['subcategory'] == 'PRESSURE COOKER' || $product['subcategory'] == 'OVEN FRYER'): ?>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Sparepart & Jasa Service</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'SETRIKA' || $product['subcategory'] == 'HAIR DRYER'): ?>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Service</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'TOASTER' || $product['subcategory'] == 'WAFFLE MAKER'): ?>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'KOMPOR TUNGKU' || $product['subcategory'] == 'KOMPOR TANAM' || $product['subcategory'] == 'COOKER HOOD' || $product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'AIR CURTAIN' || $product['subcategory'] == 'AIR FRYER' || $product['subcategory'] == 'FREE STANDING GAS COOKER' || $product['subcategory'] == 'GRILLER' || $product['subcategory'] == 'KOMPOR GAS OVEN' || $product['subcategory'] == 'KOMPOR LISTRIK' || $product['subcategory'] == 'SMART DOOR LOCK' || $product['subcategory'] == 'SMART LED'): ?>
            <tr>
                <th>Garansi Jasa Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'AIR PURIFIER'): ?>
            <tr>
                <th>Garansi Sparepart & Jasa Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
            </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'VACUUM CLEANER'): ?>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Jasa Service</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>

        <?php endif; ?>
        </table>
    </div>

    <?php if (count($relatedProducts) > 0): ?>
        <h3 style="text-align:center" class="col-12">Rekomendasi Untuk Anda</h3>
        <div class="row">
            <div class="col-md-12 mb-1 mt-2">
                <div class="recommended-carousel">
                    <!-- Left Arrow -->
                    <?php if (count($relatedProducts) > 4): ?>
                        <button class="carousel-control-prev" onclick="scrollProductLeft()" type="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                    <?php endif; ?>
                    <!-- Product Container -->
                    <div class="product-container">
                        <?php foreach ($relatedProducts as $relproduct): ?>
                            <a href="<?= base_url('catalog/details/' . esc($relproduct['id'])) ?>" class="product-item" style="text-decoration: none; color: inherit;">
                                <div class="card" style="width: 260px; height: 230px; background-color: rgba(255,255,255,0.2); border: 2px solid rgba(0,0,0,0.4)">
                                    <img src="<?= base_url('uploads/' . esc($relproduct['gambar_depan'] ?? '')) ?>" class="card-img-top" alt="Gambar Produk">
                                    <div class="card-body p-2">
                                        <h5 class="card-title"><strong><?= esc($relproduct['brand']) ?> | <?= esc($product['product_type']) ?></strong></h5>
                                        <p class="card-text" style="margin-bottom:2px;"><?= esc($relproduct['category']) ?> <?= esc($relproduct['subcategory']) ?></p>
                                        <p class="card-text">
                                            <?= !empty($relproduct['capacity']) ? esc($relproduct['capacity']) : (!empty($relproduct['ukuran']) ? esc($relproduct['ukuran']) : (!empty($relproduct['kapasitas_air_dingin']) && !empty($relproduct['kapasitas_air_panas']) ?
                                                esc($relproduct['kapasitas_air_dingin']) . '/' . esc($relproduct['kapasitas_air_panas'] . ' Liter') :
                                                null)) ?>
                                            <?php if ($relproduct['subcategory'] == 'AIR PURIFIER'): ?>
                                                <?= esc($relproduct['kapasitas_air_dingin']) . ' M²' ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>




                    <!-- Right Arrow -->
                    <?php if (count($relatedProducts) >= 4): ?>
                        <button class="carousel-control-next" style="right:-45px" onclick="scrollProductRight()" type="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <?php endif; ?>
                </div>

            </div>
        </div>
    <?php endif; ?>
</div>

<div id="floatingWidget" class="dropup" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <a id="locationButton"
        class="btn btn-success btn-widget btn-lg d-inline-flex align-items-center"
        data-bs-toggle="dropdown" aria-expanded="false" href="#">
        <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp">
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="locationButton">
        <li class="dropdown-item">Hubungi AIO Store Via WhatsApp:</li>
        <?php foreach ($marketplace as $item): ?>
            <li>
                <a class="dropdown-item" style="margin-bottom: 5px;" href="#" data-location="<?= $item['location'] ?>" data-phone="<?= $item['phone'] ?>">
                    AIO Store <?= $item['location'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
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


    document.addEventListener("DOMContentLoaded", function() {
        // Handle dropdown item click and redirect to WhatsApp in a new tab
        document.querySelectorAll(".dropdown-item").forEach(item => {
            item.addEventListener("click", function(event) {
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
<?= $this->endSection() ?>
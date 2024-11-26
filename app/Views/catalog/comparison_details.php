<?= $this->extend('partials/catalog') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="static\plugin\font-awesome\css\fontawesome-all.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
   <style>

a{
    font-family: Poppins, sans-serif;   
}
.breadcrumb-link,
.breadcrumb-product {
    display: inline; /* Keeps all elements on the same line */
    font-family: Poppins, sans-serif; /* Ensures Poppins font for all */
}

.breadcrumb-separator {
    font-family: FontAwesome; /* This will ensure the separator uses Poppins as well */
    font-size:12px;
}

/* Product grid styling */
.comparison-product-grid {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    justify-content: center;
    font-family: Poppins;
}

.comparison-product-card {
    width: 200px;
    height:270px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: #fff;
    font-family: Poppins;
    position: relative; /* Makes the card a reference point for absolute positioning */
    padding-bottom: 50px; /* Ensure there's space for the button */
}

.comparison-product-card .product-image {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 10px;
}

.comparison-product-card .product-info {
    text-align: center;
}

.comparison-product-card .product-title {
    font-size: 15px;
    font-weight: bold;
    margin: 5px 0;
}

.comparison-product-card .product-category,
.comparison-product-card .product-subcategory,
.comparison-product-card .product-capacity,
.comparison-product-card .product-harga {
    font-size: 14px;
    color: #555;
    margin: 3px 0;
}

/* Dynamic column styling for table */
table {
    width: 100%;
    margin-bottom: 20px;
}

/* Container for centering */
.center-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%; /* Ensures container spans the full width */
}

/* Label styles */
label {
    text-align: center;
    background-color: #0daff0;
    color: #fff;
    display: block;
    height: 25px;
    font-family: Poppins;
    font-size: 18px;
    width: 95%; /* Make label match the table width */
    margin: 0 auto; /* Center horizontally */ /* Optional: add shadow for consistency */
}

/* Comparison table styles */
.comparison-table {
    width: 95%;
    align-items: center;
    border-top: none; /* Remove top border */
    border-bottom: none; /* Remove bottom border */
    font-family: Poppins;
    margin: 5px auto; /* Center horizontally with some space above */
}

.comparison-table td,
.comparison-table th {
    padding: 10px;
    background-color: #f4f4f4;
    /* Change this to your desired cell background color */
    border-right: 3px solid #fff;
    border-left: 3px solid #fff;
    padding: 10px;
    border-bottom: 3px solid #fff;
}

.comparison-table th:first-child,
.comparison-table td:first-child {
    border-right: 3px solid rgba(255, 255, 255); /* White with 80% opacity */
    border-left: none;
}

.comparison-table td:last-child {
    border-right: none;
    border-left: 3px solid rgba(255, 255, 255); /* White with 80% opacity */
}

.comparison-table-head {
    width: 100%;
    border-top: none;
    /* Remove top border */
    border-left: 1px solid #fff;
    /* Adjusted typo in `solid` */
    border-right: 1px solid #fff;
    /* Add right border if needed */
    border-bottom: none;
    font-family: Poppins;
    /* Remove bottom border */
    box-shadow: 0 12px 10px rgba(0, 0, 0, 0.3);
    /* Bottom-only shadow */
    /* Optional: rounded bottom corners */
}

.comparison-table-head tbody,
.comparison-table-head thead {
    border-bottom: 1px solid #ccc;
    /* Optional: Internal border to define the rows */
}

/* If you want to add some padding around the table content */
.comparison-table-head td,
.comparison-table-head th {
    padding: 10px;
    /* Adjusted typo in `solid` */
    border-top: 5px solid #fff;
    border-left: 1px solid #fff;
    /* Adjusted typo in `solid` */
    border-bottom: 5px solid #fff;
}

.comparison-table-head th:last-child {
    border-right: 1px solid #fff;
}
th,
td {
    width: <?=100 / (count($products) + 1) ?>%;
    padding: 10px;
    border: 1px solid #f4f4f4;
    text-align: center;
}

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

.btn-custom {
    display: inline-flex;
    align-items: center;
    padding: 8px;
    font-size: 13px;
    font-weight: 600;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    position: absolute; /* Position the button absolutely inside the card */
    bottom: 10px; /* Margin from the bottom */
    left: 50%; /* Center horizontally */
    transform: translateX(-50%); /* Adjust the center alignment */
}

    .btn-custom-primary {
        background-color: #0daff0;
        color: white;
        border: 1px solid #0daff0;
    }

    .btn-custom-primary:hover {
        background-color: #0d2a46;
        border-color: #0d2a46;
    }
</style><link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Detail Perbandingan
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:auto; width:100%; position: fixed; top: 0; z-index: 1030;">
   <div class="col-sm-8">
   <img src="/images/aio-new.png" alt="Logo" style="max-width: 150px; height: 50px; margin-left:65px; margin-right:200px">
       <a href="/catalog" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px">Beranda</a>
      <span class="breadcrumb-separator"></span> 

      <!-- Render category link -->
      <?php if (!empty($products)): ?>
         <?php $product = $products[0]; // Get the first product, assuming all products belong to the same category ?>
         <?php if ($product['category'] == 'SMALL APPLIANCES'): ?>
            <a href="/catalog?category=<?= esc($product['category'])?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px">Kategori</a>
            <span class="breadcrumb-separator"></span> 
            <a href="/catalog?category=<?= esc($product['category'])?>&subcategory=<?= esc($product['subcategory'])?>" class="breadcrumb-link" style="font-family: Poppins sans-serif; font-size:18px">Subkategori</a>
         <?php else: ?>
            <a href="/catalog?category=<?= esc($product['category'])?>" class="breadcrumb-link" style="font-family: Poppins, sans-serif; font-size:18px">Kategori</a>
         <?php endif; ?>
      <?php endif; ?>

      <span class="breadcrumb-separator"></span> 
      <span class="breadcrumb-item" style="font-family: Poppins, sans-serif; font-size:18px">Detail Perbandingan</span>
    </div>


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
            <h1 style="margin: 0; margin-left:80px; font-size: 100px; font-weight: bold;">Katalog Produk</h1>
        </div>
        <!-- Breadcrumb Image -->
        <div class="breadcrumb-image">
            <img src="/images/eco-catalog.png" alt="Header Image" style="max-height: 420px; margin-right:80px; width: auto;">
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Product Grid Display for Selected Products -->
<div class="comparison-product-grid">
    <?php foreach ($products as $product): ?>
    <div class="comparison-product-card">
        <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" alt="<?= esc($product['product_type']) ?>"
            class="product-image">
        <div class="product-info">
            <h5 class="product-title"><?= esc($product['brand']) ?></h5>
            <p class="product-category"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?>                 <?= 
    !empty($product['capacity']) ? esc($product['capacity']) : 
    (!empty($product['ukuran']) ? esc($product['ukuran']) : 
    (!empty($product['kapasitas_air_dingin']) && !empty($product['kapasitas_air_panas']) ? 
        esc($product['kapasitas_air_dingin']) . 'L' . '/' . esc($product['kapasitas_air_panas']) . 'L': 
        ''))
?>
<?php if  ($product['subcategory'] == 'AIR PURIFIER'): ?>
    <?= esc($product['kapasitas_air_dingin']) . ' M²'?>
<?php endif; ?></p>
            <!-- harga
             <p class="product-harga">
             <?php if ($product['harga'] != null): ?>
                <?= esc($product['harga'] ?? '') ?>
                <?php elseif ($product['harga'] == null): ?>
                    Harga Belum Ditentukan
                </p> -->
<?php endif;?>
            <p class="product-capacity">
<?= esc($product['product_type']) ?>
</p>
<a href="<?= base_url('catalog/details/' . esc($product['id'])) ?>"
class="btn-custom btn-custom-primary">Lihat Detail</a>
    </div>
                </div>
    <?php endforeach; ?>
</div>


<!-- Comparison Table -->

<table class="comparison-table-head">
    <thead>
        <tr>
            <th>Bandingkan Produk</th>
            <?php foreach ($products as $product): ?>
            <th><?= esc($product['brand']) ?> <?= esc($product['product_type']) ?><br>
                <?= esc($product['category']) ?> <?= esc($product['subcategory']) ?>
                <?= esc($product['capacity'] ?? '')?> <?= esc($product['ukuran'] ?? '')?>
            </th>
            <?php endforeach; ?>
        </tr>
    </thead>
</table>

<div class="center-container">
<label>Keunggulan Produk</label>
<table class="comparison-table">
    <tbody>
        <tr>
            <td>Keunggulan 1</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage1']) ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Keunggulan 2</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage2']) ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Keunggulan 3</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage3']) ?></td>
            <?php endforeach; ?>
        </tr>
        <?php if ($product['advantage4'] != null): ?>
        <tr>
            <td>Keunggulan 4</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage4'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endif; ?>
        <?php if ($product['advantage5'] != null): ?>
        <tr>
            <td>Keunggulan 5</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage5'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endif;?>
        <?php if ($product['advantage6'] != null): ?>
        <tr>
            <td>Keunggulan 6</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage6'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endif; ?>
        <!-- Add more rows as needed for other attributes -->
    </tbody>
</table>

<label>Informasi Umum</label>
<table class="comparison-table">
    <tbody>
        <tr>
            <td>Warna</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['color']) ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Konsumsi Daya</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['daya']) ?> Watt</td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Negara Pembuat</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['pembuat']) ?></td>
            <?php endforeach; ?>
        </tr>
        <?php if ($product['category'] == 'TV'): ?>
        <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
        <tr>
            <td>Resolusi Panel</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['panel_resolution']) ?> Pixel</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Sparepart</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Panel</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['garansi_panel']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['category'] == 'AC'): ?>
        <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
        <tr>
            <td>Kapasitas Pendinginan</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['cooling_capacity']) ?> BTU/h</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Tipe Refrigrant</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['refrigrant']) ?></td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Rating CSPF</td>
            <?php foreach ($products as $product): ?>
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
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Kompresor</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Sparepart</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['category'] == 'KULKAS' || $product['category'] == 'FREEZER' || $product['category'] == 'SHOWCASE' ): ?>
        <tr>
            <td>Garansi Kompresor</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Sparepart</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['category'] == 'MESIN CUCI'|| $product['subcategory'] == 'CHOPPER' || $product['subcategory'] == 'BLENDER'  || $product['subcategory'] == 'JUICER'): ?>
        <tr>
            <td>Garansi Motor</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Sparepart</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'SPEAKER'): ?>
        <tr>
            <td>Garansi Semua Service</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'KIPAS ANGIN' || $product['subcategory'] == 'HAND MIXER' || $product['subcategory'] == 'MIXER'): ?>
        <tr>
            <td>Garansi Motor</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH' ): ?>
        <tr>
            <td>Garansi Kompresor</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Kapasitas Air Dingin</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['kapasitas_air_dingin']) ?> Liter</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Kapasitas Air Panas</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['kapasitas_air_panas']) ?> Liter</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'MICROWAVE' ||$product['subcategory'] == 'MAGIC COM' ||$product['subcategory'] == 'RICE COOKER'|| $product['subcategory'] == 'OVEN'||$product['subcategory'] == 'CUP SEALER'||$product['subcategory'] == 'WATER BOILER'  ||$product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'||$product['subcategory'] == 'PRESSURE COOKER' ||$product['subcategory'] == 'OVEN FRYER'): ?>
        <tr>
            <td>Garansi Elemen Panas</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <tr>
            <td>Garansi Sparepart & Jasa Service</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'SETRIKA' || $product['subcategory'] == 'HAIR DRYER'): ?>
        <tr><td>Garansi Elemen Panas</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <tr>
        <td>Garansi Service</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'TOASTER' || $product['subcategory'] == 'WAFFLE MAKER'): ?>
        <tr><td>Garansi Elemen Panas</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['garansi_elemen_panas']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <tr>
        <td>Garansi Sparepart</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'KOMPOR TUNGKU' || $product['subcategory'] == 'KOMPOR TANAM' || $product['subcategory'] == 'COOKER HOOD' || $product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'AIR CURTAIN'  || $product['subcategory'] == 'AIR FRYER'|| $product['subcategory'] == 'FREE STANDING GAS COOKER' || $product['subcategory'] == 'GRILLER'|| $product['subcategory'] == 'KOMPOR GAS OVEN' || $product['subcategory'] == 'KOMPOR LISTRIK' || $product['subcategory'] == 'SMART DOOR LOCK' || $product['subcategory'] == 'SMART LED'): ?>
        <tr>
            <td>Garansi Jasa Service</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <tr>
        <td>Garansi Sparepart</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['sparepart_warranty'])?> Tahun</td>
        </tr>
        <?php endforeach ; ?>
        
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'AIR PURIFIER'): ?>
        <tr>
        <td>Kapasitas</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['kapasitas_air_dingin']) ?> M²</td>
        <?php endforeach ; ?>
        </tr>   
        <tr>
        <td>Garansi Sparepart & Jasa Service</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        
        <?php endif; ?>

        <?php if ($product['subcategory'] == 'VACUUM CLEANER'): ?>
        <tr>
        <td>Garansi Sparepart</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        <tr>
        <td>Garansi Jasa Service</td>
        <?php foreach ($products as $product): ?>
        <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
        <?php endforeach ; ?>
        </tr>
        
        <?php endif; ?>

        <!-- Add more rows as needed for other attributes -->
    </tbody>
</table>

<label>Dimensi Produk</label>
<table class="comparison-table">
    <tbody>
    <tr>
    <td>Panjang Produk</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $productDims = explode(" x ", str_replace(" cm", "", $product['product_dimensions']));
        ?>
        <td>
            <?= esc($productDims[0]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Lebar Produk</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $productDims = explode(" x ", str_replace(" cm", "", $product['product_dimensions']));
        ?>
        <td>
            <?= esc($productDims[1]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Tinggi Produk</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $productDims = explode(" x ", str_replace(" cm", "", $product['product_dimensions']));
        ?>
        <td>
            <?= esc($productDims[2]) ?> cm
        </td>
    <?php endforeach; ?>
</tr>
<?php if ($product['category'] == 'TV'): ?>
    <tr>
    <td>Panjang Produk Dengan Stand</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $pstandDims = explode(" x ", str_replace(" cm", "", $product['pstand_dimensions']));
        ?>
        <td>
            <?= esc($pstandDims[0]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Lebar Produk Dengan Stand</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $pstandDims = explode(" x ", str_replace(" cm", "", $product['pstand_dimensions']));
        ?>
        <td>
            <?= esc($pstandDims[1]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Tinggi Produk Dengan Stand</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $pstandDims = explode(" x ", str_replace(" cm", "", $product['pstand_dimensions']));
        ?>
        <td>
            <?= esc($pstandDims[2]) ?> cm
        </td>
    <?php endforeach; ?>
</tr>
<?php endif; ?>

    </tbody>
</table>

<label>Dimensi Kemasan</label>
<table class="comparison-table">
    <tbody>
    <tr>
    <td>Panjang Kemasan</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $packageDims = explode(" x ", str_replace(" cm", "", $product['packaging_dimensions']));
        ?>
        <td>
            <?= esc($packageDims[0]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Lebar Kemasan</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $packageDims = explode(" x ", str_replace(" cm", "", $product['packaging_dimensions']));
        ?>
        <td>
            <?= esc($packageDims[1]) ?> cm
        </td>
        <?php endforeach; ?>
    </tr>
    <tr>
    <td>Tinggi Kemasan</td>
    <?php foreach ($products as $product): ?>
        <?php 
            // Split product dimensions into x, y, and z
            $packageDims = explode(" x ", str_replace(" cm", "", $product['packaging_dimensions']));
        ?>
        <td>
            <?= esc($packageDims[2]) ?> cm
        </td>
    <?php endforeach; ?>
</tr>
    </tbody>
    </table>

    <label>Berat Produk</label>
<table class="comparison-table">
    <tbody>
    <tr>
            <td>Berat Produk</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['berat']) ?> Kg</td>
            <?php endforeach; ?>
        </tr>
    </tbody>
    </table>
            </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<?= $this->endSection() ?>
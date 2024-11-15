<head>
<a href="/catalog" class="breadcrumb-link">Beranda</a> 
<span class="breadcrumb-separator">/</span> 
<span class="breadcrumb-product">Perbandingan Produk</span>


</head>
<!-- Product Grid Display for Selected Products -->
<div class="comparison-product-grid">
    <?php foreach ($products as $product): ?>
    <div class="comparison-product-card">
        <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" alt="<?= esc($product['product_type']) ?>"
            class="product-image">
        <div class="product-info">
            <h5 class="product-title"><?= esc($product['brand']) ?> - <?= esc($product['product_type']) ?></h5>
            <p class="product-category"><?= esc($product['category']) ?></p>
            <p class="product-subcategory"><?= esc($product['subcategory']) ?></p>
            <!-- harga
             <p class="product-harga">
             <?php if ($product['harga'] != null): ?>
                <?= esc($product['harga'] ?? '') ?>
                <?php elseif ($product['harga'] == null): ?>
                    Harga Belum Ditentukan
                </p> -->
<?php endif;?>
            <p class="product-capacity">
                <?= 
    !empty($product['capacity']) ? esc($product['capacity']) : 
    (!empty($product['ukuran']) ? esc($product['ukuran']) : 
    (!empty($product['kapasitas_air_dingin']) && !empty($product['kapasitas_air_panas']) ? 
        esc($product['kapasitas_air_dingin']) . 'L' . '/' . esc($product['kapasitas_air_panas']) . 'L': 
        ''))
?>
<?php if  ($product['subcategory'] == 'AIR PURIFIER'): ?>
    <?= esc($product['kapasitas_air_dingin']) . ' M²'?>
<?php endif; ?>
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
                <img src="<?= base_url('/images/5stars.png') ?>" alt="cspf-star" style="height:15px">
                <?php elseif ($product['cspf'] < 5 || $product['cspf'>= 4]): ?>
                <img src="<?= base_url('/images/4stars.png') ?>" alt="cspf-star" style="height:15px">
                <?php elseif ($product['cspf'] < 4 || $product['cspf'>= 3]): ?>
                <img src="<?= base_url('/images/3stars.png') ?>" alt="cspf-star" style="height:15px">
                <?php elseif ($product['cspf'] < 3 || $product['cspf'>= 2]): ?>
                <img src="<?= base_url('/images/2stars.png') ?>" alt="cspf-star" style="height:15px">
                <?php elseif ($product['cspf'] < 2 || $product['cspf'>= 1]): ?>
                <img src="<?= base_url('/images/1star.png') ?>" alt="cspf-star" style="height:15px">
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

        <?php if ($product['category'] == 'MESIN CUCI' || $product['subcategory'] == 'BLENDER'  || $product['subcategory'] == 'JUICER'): ?>
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

        <?php if ($product['subcategory'] == 'KIPAS ANGIN'): ?>
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

        <?php if ($product['subcategory'] == 'MICROWAVE' ||$product['subcategory'] == 'MAGIC COM' ||$product['subcategory'] == 'RICE COOKER'|| $product['subcategory'] == 'OVEN' ||$product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'): ?>
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

        <?php if ($product['subcategory'] == 'SETRIKA' || $product['subcategory'] == 'VACUUM CLEANER'): ?>
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

        <?php if ($product['subcategory'] == 'TOASTER'): ?>
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

        <?php if ($product['subcategory'] == 'KOMPOR TUNGKU' || $product['subcategory'] == 'KOMPOR TANAM' || $product['subcategory'] == 'COOKER HOOD' || $product['subcategory'] == 'AIR COOLER' || $product['subcategory'] == 'AIR CURTAIN'  || $product['subcategory'] == 'AIR FRYER'): ?>
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
            <p><?= esc($productDims[0]) ?> cm</p>
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
            <p><?= esc($productDims[1]) ?> cm</p>
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
            <p><?= esc($productDims[2]) ?> cm</p>
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
            <p><?= esc($pstandDims[0]) ?> cm</p>
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
            <p><?= esc($pstandDims[1]) ?> cm</p>
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
            <p><?= esc($pstandDims[2]) ?> cm</p>
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
            <p><?= esc($packageDims[0]) ?> cm</p>
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
            <p><?= esc($packageDims[1]) ?> cm</p>
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
            <p><?= esc($packageDims[2]) ?> cm</p>
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
<style>

.breadcrumb-link,
.breadcrumb-separator,
.breadcrumb-product {
    display: inline; /* Keeps all elements on the same line */
    font-family: Arial, sans-serif; /* Ensures Arial font for all */
}

.breadcrumb-separator {
    font-family: Arial, sans-serif; /* This will ensure the separator uses Arial as well */
}

/* Product grid styling */
.comparison-product-grid {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    justify-content: center;
    font-family: Arial;
}

.comparison-product-card {
    width: 200px;
    height:250px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: #fff;
    font-family: Arial;
    position: relative; /* Makes the card a reference point for absolute positioning */
    padding-bottom: 50px; /* Ensure there's space for the button */
}

a {
    font-family: arial;
}
.comparison-product-card .product-image {
    width: 100%;
    height: 150px;
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

label {
    text-align: center;
    background-color: #0daff0;
    color: #fff;
    display: block;
    height: 25px;
    font-family: Arial;
    font-size: 18px;
}

.comparison-table {
    width: 100%;
    border-top: none;
    /* Remove top border */
    /* Add right border if needed */
    border-bottom: none;
    /* Remove bottom border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Bottom-only shadow */
    border-radius: 0 0 8px 8px;
    /* Optional: rounded bottom corners */
    font-family: Arial;
}

.comparison-table td,
.comparison-table th {
    padding: 10px;
    background-color: #d9d9d9;
    /* Change this to your desired cell background color */
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.comparison-table th:first-child,
.comparison-table td:first-child {
    border-right: 2px solid rgba(255, 255, 255, 0.1); /* White with 80% opacity */
    border-left: none;
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
    font-family: Arial;
    /* Remove bottom border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Bottom-only shadow */
    border-radius: 0 0 8px 8px;
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
}

th,
td {
    width: <?=100 / (count($products) + 1) ?>%;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}

.btn-custom {
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
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
</style>
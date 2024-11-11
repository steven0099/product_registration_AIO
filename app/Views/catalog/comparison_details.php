<head>
<a href="/catalog">← Kembali</a>
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
            <p class="product-harga">
            <?php if ($product['harga'] != null): ?>
                <?= esc($product['harga'] ?? '') ?>
                <?php elseif ($product['harga'] == null): ?>
                    Harga Belum Ditentukan
                </p>
<?php endif;?>
            <p class="product-capacity">
                <?= 
    !empty($product['capacity']) ? esc($product['capacity']) : 
    (!empty($product['ukuran']) ? esc($product['ukuran']) : 
    (!empty($product['kapasitas_air_dingin']) && !empty($product['kapasitas_air_panas']) ? 
        esc($product['kapasitas_air_dingin']) . '/' . esc($product['kapasitas_air_panas']) : 
        ''))
?></p>
    
            

    <?php if ($product['harga'] != null): ?>
            <div class="text-center mt-4">
                <?php if ($product['capacity'] != null): ?>
                <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20<?= urlencode($product['subcategory']) ?>%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aKapasitas:%20<?= urlencode($product['capacity']) ?>"
                    target="_blank" class="btn-custom btn-custom-success">
                    <i class="fab fa-whatsapp me-2"></i>
                    <!-- Gambar Logo WhatsApp -->
                    <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                        style="width: 24px; height: 24px; margin-right: 8px;">
                    Pesan Via Whatsapp
                </a>
                <?php endif; ?>
                <?php if ($product['ukuran'] != null): ?>
                <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20<?= urlencode($product['subcategory']) ?>%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aUkuran:%20<?= urlencode($product['ukuran']) ?>"
                    target="_blank" class="btn-custom btn-custom-success">
                    <i class="fab fa-whatsapp me-2"></i>
                    <!-- Gambar Logo WhatsApp -->
                    <img src="<?= base_url('/images/whatsapp-logo.png') ?>" alt="WhatsApp"
                        style="width: 24px; height: 24px; margin-right: 8px;">
                    Pesan Via Whatsapp
                </a>
                <?php endif; ?>
                <?php if ($product['kapasitas_air_dingin'] != null || $product['kapasitas_air_panas'] != null): ?>
                <a href="https://wa.me/6287822297790?text=Halo,%20saya%20ingin%20memesan%20<?= urlencode($product['category']) ?>%20<?= urlencode($product['subcategory']) ?>%0aBrand:%20<?= urlencode($product['brand']) ?>%0aTipe%20Produk:%20<?= urlencode($product['product_type']) ?>%0aKapasitas%20Air%20Dingin/Panas:%20<?= urlencode($product['kapasitas_air_dingin']) ?>%20L/<?= urlencode($product['kapasitas_air_panas']) ?>%20L"
                    target="_blank" class="btn-custom btn-custom-success">
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
        <tr>
            <td>Keunggulan 4</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage4'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Keunggulan 5</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage5'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Keunggulan 6</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['advantage6'] ?? '') ?></td>
            <?php endforeach; ?>
        </tr>
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
            <td>Berat Produk</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['berat']) ?> Kg</td>
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

        <?php if ($product['category'] == 'MESIN CUCI'): ?>
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

        <?php if ($product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER' ): ?>
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
        </tr>
        <!-- Add more rows as needed for other attributes -->
    </tbody>
</table>

<label>Dimensi Produk dan Kemasan</label>
<table class="comparison-table">
    <tbody>
        <tr>
            <td>Dimensi Produk</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['product_dimensions']) ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td>Dimensi Kemasan</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['packaging_dimensions']) ?></td>
            <?php endforeach; ?>
        </tr>
        <?php if ($product['category'] == 'TV'): ?>
        <tr>
            <td>Dimensi Produk Dengan Stand</td>
            <?php foreach ($products as $product): ?>
            <td><?= esc($product['pstand_dimensions']) ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<style>
/* Product grid styling */
.comparison-product-grid {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    justify-content: center;
}

.comparison-product-card {
    width: 200px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: #fff;
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
    font-size: 16px;
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
    background-color: #007bff;
    color: #fff;
    display: block;
    height: 25px;
    font-family: Arial;
    font-size: 18px;
}

.comparison-table {
    width: 99.5%;
    margin-left: 3px;
    border-top: none;
    /* Remove top border */
    border-left: 1px solid #fff;
    /* Adjusted typo in `solid` */
    border-right: 1px solid #fff;
    /* Add right border if needed */
    border-bottom: none;
    /* Remove bottom border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Bottom-only shadow */
    border-radius: 0 0 8px 8px;
    /* Optional: rounded bottom corners */
}

.comparison-table td,
.comparison-table th {
    padding: 10px;
    background-color: #ddd;
    /* Change this to your desired cell background color */
    padding: 10px;
    border-bottom: 1px solid #ccc;
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
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-custom-primary {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .btn-custom-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-custom-success {
        background-color: #28a745;
        color: white;
        border: 1px solid #28a745;
    }

    .btn-custom-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
    }

    /* Button with WhatsApp icon */
    .btn-custom .fab {
        margin-right: 8px;
    }

    /* Icon Size Adjustment */
    .btn-custom img {
        width: 24px;
        height: 24px;
    }
</style>
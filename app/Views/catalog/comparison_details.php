<a href="/catalog">← Kembali</a>

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
            <p class="product-capacity">
                <?= !empty($product['capacity']) ? esc($product['capacity']) : ( !empty($product['ukuran']) ? esc($product['ukuran']) : null) ?>
            </p>
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
                <td><?= esc($product['cspf']) ?>/5</td>
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
            </tr>            <tr>
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
.comparison-product-card .product-capacity {
    font-size: 14px;
    color: #555;
    margin: 3px 0;
}

/* Dynamic column styling for table */
table {
    width: 100%;
    margin-bottom:20px;
}

label{
    text-align: center;
    background-color: #007bff;
    color: #fff;
    display: block;
    height: 25px;
    font-family: Arial;
    font-size: 18px;
}

.comparison-table{
    width: 99.5%;
    margin-left: 3px;
    border-top: none; /* Remove top border */
    border-left: 1px solid #fff; /* Adjusted typo in `solid` */
    border-right: 1px solid #fff; /* Add right border if needed */
    border-bottom: none; /* Remove bottom border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bottom-only shadow */
    border-radius: 0 0 8px 8px; /* Optional: rounded bottom corners */
}

.comparison-table td, .comparison-table th {
    padding: 10px;
    background-color: #ddd; /* Change this to your desired cell background color */
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.comparison-table-head {
    width: 100%;
    border-top: none; /* Remove top border */
    border-left: 1px solid #fff; /* Adjusted typo in `solid` */
    border-right: 1px solid #fff; /* Add right border if needed */
    border-bottom: none; /* Remove bottom border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bottom-only shadow */
    border-radius: 0 0 8px 8px; /* Optional: rounded bottom corners */
}

.comparison-table-head tbody, .comparison-table-head thead {
    border-bottom: 1px solid #ccc; /* Optional: Internal border to define the rows */
}

/* If you want to add some padding around the table content */
.comparison-table-head td, .comparison-table-head th {
    padding: 10px;
}

th,
td {
    width: <?=100 / (count($products) + 1) ?>%;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}
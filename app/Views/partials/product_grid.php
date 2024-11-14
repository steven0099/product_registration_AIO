<style>
    /* Adjust the width of the columns to make the grid larger */
    .col-md-4 {
        flex: 0 0 33%; /* Adjust to 25% width for four columns */
        max-width: 33%;
    }

    .product-item img {
        width: 100%;
        padding:5px;
        height: 135px; /* Increase height for better image focus */
        object-fit: cover;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .grid-card {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border: 2px solid #b3b3b3;
        height:280px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px; /* Reduce margin for closer spacing */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-text {
        font-size: 14px; /* Increase font size slightly for readability */
        color: #666; /* Optional: gray color for secondary information */
        margin: 0; /* Remove margin for tighter spacing */
    }

    /* Adjust button position */
    .button {
        position:absolute;
        bottom:3%;
        right:7%;
        margin-top: 10px;
        padding: 3px;
        font-size: 14px;
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Adjust checkbox and label positioning */
    .compare-checkbox, .compare-label {
        margin-right: 5px;
        vertical-align: middle;
    }

    </style>
    <!-- Product Grid -->
    <div id="productGrid" style= "width:730px; padding: 20px; ">
    <div class="row">
        <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 mb-4">
            <div class="grid-card">
                <div class="product-item">
                    <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" class="card-img-top"
                        alt="<?= esc($product['product_type']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($product['brand']) ?> - <?= esc($product['product_type']) ?></h5>
                        <p class="card-text"><?= esc($product['category']) ?></p>
                        <p class="card-text"><?= esc($product['subcategory']) ?></p>
                        <!--harga <?php if ($product['harga'] != null): ?>
                        <p class="card-text"><strong><?= esc($product['harga']) ?></strong></p>
                        <?php elseif ($product['harga'] == null): ?>
                        <p class="card-text"><strong>Harga Belum Ditentukan</strong></p>
                        <?php endif; ?>-->
                        <p class="card-text">
    <?php
    if (!empty($product['capacity'])) {
        echo esc($product['capacity']);
    } elseif (!empty($product['ukuran'])) {
        echo esc($product['ukuran']);
    } elseif (!empty($product['kapasitas_air_dingin'] && $product['kapasitas_air_panas'])){
        echo esc($product['kapasitas_air_dingin']. 'L' . '/' . $product['kapasitas_air_panas'] . 'L');
    } elseif ($product['subcategory'] == 'AIR PURIFIER'){
        echo esc($product['kapasitas_air_dingin']. ' M²');
    } else {
        echo 'Tidak Ada Kapasitas / Ukuran';
    }
    ?>
</p>

<!--harga data-product-harga="<?= esc($product['harga']) ?>" -->
<div class="column">
<input type="checkbox" class="compare-checkbox" data-product-id="<?= esc($product['id']) ?>"
           data-product-name="<?= esc($product['brand']) ?>"
           data-product-category="<?= esc($product['category']) ?>"
           data-product-subcategory="<?= esc($product['subcategory']) ?>"
           data-product-capacity="    <?php
    if (!empty($product['capacity'])) {
        echo esc($product['capacity']);
    } elseif (!empty($product['ukuran'])) {
        echo esc($product['ukuran']);
    } elseif (!empty($product['kapasitas_air_dingin'] && $product['kapasitas_air_panas'])){
        echo esc($product['kapasitas_air_dingin']. 'L' . '/' . $product['kapasitas_air_panas'] . 'L');
    } elseif ($product['subcategory'] == 'AIR PURIFIER'){
        echo esc($product['kapasitas_air_dingin']. 'M²');
    } else {
        echo ' ';
    }
    ?> | <?= esc($product['product_type']) ?>"
           data-product-image="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>">
    <label style="font-size:14px">Bandingkan</label>
<button class="button" onclick="location.href='/catalog/details/<?= esc($product['id']) ?>'">Lihat Detail</button>
</div>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
<?php else: ?>
    <p>Tidak ada produk pada filter ini.</p>
<?php endif; ?>
    </div>
    </div>

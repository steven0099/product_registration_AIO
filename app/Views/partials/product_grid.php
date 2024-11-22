<style>
    /* General box-sizing for all elements */
    * {
    box-sizing: border-box;
}

/* Product grid container */
#productGrid {
    width: 100%;
    padding: 0 15px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Space between cards */
}

/* Define each product item with fixed width and spacing */
.product-item {
    flex: 0 0 33.33%; /* 3 items per row */
    width: 33.33%; /* Prevent resizing */
    margin-bottom: 15px; /* Space between rows */
    padding: 0 10px; /* Space between columns */
    position: relative;
    height: 280px; /* Fixed height for consistent appearance */
    min-width: 280px; /* Prevent shrinking */
}

    /* Ensure product images are responsive and maintain aspect ratio */
    .product-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
    }

/* Grid card to ensure height consistency */
.grid-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 2px solid #b3b3b3;
}

.product-placeholder {
    flex: 0 0 33.33%; /* Match the width of product-item */
    max-width: 33.33%; /* Prevent resizing */
    height: 280px; /* Match height of product-item */
    padding: 0 10px;
    margin-bottom: 15px;
    visibility: hidden; /* Hidden but occupies space */
}

    .card-body {
        display: flex;
        width:280px;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        overflow: hidden; /* To prevent overflow */
    }

    .card-title {
        font-size: 14px; /* Adjusted for better readability */
        font-weight: 600;
        margin-bottom: 1px; /* Increase spacing */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-text {
        font-size: 12px;
        color: #666;
        margin: 1px 0; /* Add some margin for better spacing */
    }

    /* Adjust the button styling */
/* Button positioned bottom-right */
.button {
    position: absolute;
    bottom: 10px;
    right:20px;  /* Ensure button is in the bottom-right */
    padding: 5px 20px;
    font-size: 12px;
    background-color: #fff;
    color: #000;
    border: 1px solid #000;
    border-radius: 4px;
    cursor: pointer;
    text-align: left;
    z-index: 1;  /* Keep button on top if necessary */
}

    /* Ensure checkbox and label styling */
    .compare-checkbox {
    position: absolute;
    bottom: 12px; /* Position the checkbox towards the bottom */
    left: 25px;   /* Position the checkbox towards the left */
    display:none;
}


    .compare-label {
        margin-left: 15px;
        bottom:0;
        vertical-align: middle;
        font-size: 14px;
        color: #000;
        display:none;
        position:absolute;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .product-item {
            flex: 1 0 48%; /* 2 items per row on smaller screens */
            max-width: 48%;
        }
    }

    @media (max-width: 480px) {
        .product-item {
            flex: 1 0 98%; /* 1 item per row on mobile screens */
            max-width: 98%;
        }
    }
</style>

<!-- Product Grid -->
<div id="productGrid">
    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <div class="grid-card">
                        <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" class="card-img-top"
                             alt="<?= esc($product['product_type']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($product['brand']) ?></h5>
                            <p class="card-text"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?>                                 <?php
                                if (!empty($product['capacity'])) {
                                    echo esc($product['capacity']);
                                } elseif (!empty($product['ukuran'])) {
                                    echo esc($product['ukuran']);
                                } elseif (!empty($product['kapasitas_air_dingin'] && $product['kapasitas_air_panas'])) {
                                    echo esc($product['kapasitas_air_dingin'] . 'L' . '/' . $product['kapasitas_air_panas'] . 'L');
                                } elseif ($product['subcategory'] == 'AIR PURIFIER') {
                                    echo esc($product['kapasitas_air_dingin'] . ' M²');
                                } else {
                                    echo 'Tidak Ada Kapasitas / Ukuran';
                                }
                                ?></p>
                            <p class="card-text"> <?= esc($product['product_type']) ?></p>
                            <div class="column">
<input type="checkbox" class="compare-checkbox" data-product-id="<?= esc($product['id']) ?>"
           data-product-name="<?= esc($product['brand']) ?>"
           data-product-category="<?= esc($product['category']) ?>"
           data-product-subcategory="<?= esc($product['subcategory']) ?>"
           data-product-capacity="<?php
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
    <label class="compare-label" style="font-size:14px">Bandingkan</label>
<button class="button" onclick="location.href='/catalog/details/<?= esc($product['id']) ?>'">Lihat Detail</button>
</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Add placeholders to maintain grid alignment -->
            <?php for ($i = count($products); $i < 3; $i++): ?>
                <div class="product-placeholder"></div>
            <?php endfor; ?>
        <?php else: ?>
            <p>Tidak ada produk pada filter ini.</p>
        <?php endif; ?>
    </div>
</div>


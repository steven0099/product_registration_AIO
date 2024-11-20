<style>
    /* General box-sizing for all elements */
    * {
        box-sizing: border-box;
    }

    /* Ensure the container is responsive and has padding */
    #productGrid {
        width: 100%;
        padding: 0 15px; /* Padding to prevent content touching the edges */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Define each product item with flexible width and margin for spacing */
    .product-item {
        flex: 1 0 33%; /* 3 items per row on medium screens */
        max-width: 25.1%; /* Prevents overflow */
        margin-bottom: 15px; /* Space between rows */
        padding: 0 10px; /* Padding for spacing between columns */
        position: relative; /* Positioning for buttons */
    }

    /* Ensure product images are responsive and maintain aspect ratio */
    .product-item img {
        width: 280px;
        height: 135px;
        object-fit: cover;
        border-radius: 8px;
    }

    .grid-card {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 2px solid #b3b3b3;
    height: 280px;
    display: flex;
    flex-direction: column;
    position: relative; /* This ensures the button and checkbox are positioned relative to this card */
}

    .card-body {
        display: flex;
        width:300px;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        overflow: hidden; /* To prevent overflow */
    }

    .card-title {
        font-size: 16px; /* Adjusted for better readability */
        font-weight: 600;
        margin-bottom: 3px; /* Increase spacing */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-text {
        font-size: 14px;
        color: #666;
        margin: 1px 0; /* Add some margin for better spacing */
    }

    /* Adjust the button styling */
/* Button positioned bottom-right */
.button {
    position: absolute;
    bottom: 20px;
    left: 220px;  /* Ensure button is in the bottom-right */
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
    bottom: 25px; /* Position the checkbox towards the bottom */
    left: 10px;   /* Position the checkbox towards the left */
}


    .compare-label {
        margin-left: 5px;
        vertical-align: middle;
        font-size: 14px;
        color: #333;
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
                        <div class="product-item">
                            <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" class="card-img-top"
                                 alt="<?= esc($product['product_type']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($product['brand']) ?> - <?= esc($product['product_type']) ?></h5>
                                <p class="card-text"><?= esc($product['category']) ?></p>
                                <p class="card-text"><?= esc($product['subcategory']) ?></p>
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
                                    ?>" 
                                           data-product-image="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>">
                                    <label class="compare-label">Bandingkan</label>
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

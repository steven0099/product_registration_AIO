    <style>
        .product-item img {
    width: 100%;
    height: 200px; /* Set a fixed height to standardize */
    object-fit: cover; /* Scale image to fit within dimensions without distortion */
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 180px; /* Set a consistent height for the card content */
}

.card-title, .card-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.button {
    margin-top: auto; /* Push the button to the bottom of the card */
}
</style>
    <!-- Product Grid -->
    <div id="productGrid">
    <div class="row">
        <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="product-item">
                    <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" class="card-img-top"
                        alt="<?= esc($product['product_type']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($product['brand']) ?> - <?= esc($product['product_type']) ?></h5>
                        <p class="card-text"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></p>
                        <p class="card-text">
    <?php
    if (!empty($product['capacity'])) {
        echo esc($product['capacity']);
    } elseif (!empty($product['ukuran'])) {
        echo esc($product['ukuran']);
    } elseif (!empty($product['kapasitas_air_dingin'] && $product['kapasitas_air_panas'])){
        echo esc($product['kapasitas_air_dingin']. 'L' . '/' . $product['kapasitas_air_panas'] . 'L');
    } else {
        echo 'No capacity or ukuran available.';
    }
    ?>
</p>
<button class="button btn btn-success" onclick="location.href='/catalog/details/<?= esc($product['id']) ?>'">Detail Produk</button>
</button>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
<?php else: ?>
    <p>No products found for this filter.</p>
<?php endif; ?>
    </div>
    </div>
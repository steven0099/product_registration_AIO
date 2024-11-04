    <!-- Product Grid -->
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?= base_url('uploads/'. esc($product['gambar_depan'])) ?>" class="card-img-top" alt="<?= esc($product['product_type']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($product['brand']) ?></h5>
                        <p class="card-text"><?= esc($product['category']) ?> <?= esc($product['subcategory']) ?></p>
                        <?php if ($product['capacity'] != null): ?>
                        <p class="card-text"><?= esc($product['capacity']) ?></p>
                        <?php endif; ?>
                        <?php if ($product['ukuran'] != null): ?>
                        <p class="card-text"><?= esc($product['ukuran']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
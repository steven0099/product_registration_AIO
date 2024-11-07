<!-- Product Grid -->
<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                <img src="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>" class="card-img-top" alt="<?= esc($product['product_type']) ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold text-primary"><?= esc($product['brand']) ?></h5>
                    <p class="card-text text-muted"><?= esc($product['category']) ?> - <?= esc($product['subcategory']) ?></p>

                    <?php if (!empty($product['capacity'])): ?>
                        <p class="card-text"><small class="text-secondary">Kapasitas: <?= esc($product['capacity']) ?></small></p>
                    <?php endif; ?>

                    <?php if (!empty($product['ukuran'])): ?>
                        <p class="card-text"><small class="text-secondary">Ukuran: <?= esc($product['ukuran']) ?></small></p>
                    <?php endif; ?>

                    <a href="<?= base_url('catalog/detail/' . $product['id']) ?>" class="mt-auto btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
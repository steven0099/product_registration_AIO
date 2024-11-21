 <div class="catalog-grid">
     <?php foreach ($products as $product): ?>
         <div class="product-card">
             <!-- Atur ukuran gambar langsung di atribut style -->
             <img src="<?= base_url('/images/tv.jpg' . $product['image']) ?>"
                 alt="<?= $product['name'] ?>"
                 style="width: 100px; height: auto; object-fit: cover; margin: 0 auto;">
             <h3><?= $product['name'] ?></h3>
             <p><?= $product['description'] ?></p>
             <p><strong>Ukuran:</strong> <?= $product['size'] ?></p>
             <button class="btn-detail">Lihat Detail</button>
         </div>
     <?php endforeach; ?>
 </div>
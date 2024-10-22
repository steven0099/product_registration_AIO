<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<div class="container">
    <div class="form-header">
        <img src="<?= base_url('images/logo.png') ?>" class="logo" alt="Logo">
        <h1>Form Registrasi Produk</h1>
    </div>

    <div class="progress-bar">
            <span>General Data</span>
            <span>Dimensi Produk</span>
            <span>Keunggulan Produk</span>
            <span>Foto Produk</span>
            <span class="active">Konfirmasi Produk</span>
        </div>
    <table class="confirmation-table">
        <tr>
            <td>Merek</td>
            <td><?= esc($data['brand']) ?></td>
            <td>Konsumsi Daya</td>
            <td><?= esc($data['daya']) ?> Watt</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?= esc($data['category']) ?></td>
            <td>Negara Pembuat</td>
            <td><?= esc($data['pembuat']) ?></td>
        </tr>
        <tr>
            <td>Sub Kategori</td>
            <td><?= esc($data['subcategory']) ?></td>
            <td>Keunggulan</td>
            <td>
            <?= esc($data['advantage1']) ?><br>
            <?= esc($data['advantage2']) ?><br>
            <?= esc($data['advantage3']) ?><br>
            <?= esc($data['advantage4']) ?><br>
            <?= esc($data['advantage5']) ?><br>
            <?= esc($data['advantage6']) ?><br>
        </tr>
        <tr>
            <td>Tipe Produk</td>
            <td><?= esc($data['product_type']) ?></td>
            <td>Foto Produk</td>
    <td>
    <a href="<?= base_url('uploads/' . esc($data['gambar_utama'])) ?>" target="_blank">Lihat Gambar Utama</a><br>
    <a href="<?= base_url('uploads/' . esc($data['gambar_samping_kiri'])) ?>" target="_blank">Lihat Gambar Samping Kiri</a><br>
    <a href="<?= base_url('uploads/' . esc($data['gambar_samping_kanan'])) ?>" target="_blank">Lihat Gambar Samping Kanan</a>
</td>
        </td>
        </tr>
        <tr>
            <td>Warna</td>
            <td><?= esc($data['color']) ?></td>
            <td>Video Produk</td>
            <td><a href="<?= base_url('uploads/' . esc($data['video_produk'])) ?>" target="_blank">Lihat Video Produk</a></td>
        </tr>
        <tr>
    <td id="kapasitas-label">Kapasitas</td>
    <td id="kapasitas-value"><?= esc($data['capacity']) ?></td>
</tr>
<tr>
    <td id="garansi-kompresor-label">Garansi Kompresor</td>
    <td id="garansi-kompresor-value"><?= esc($data['compressor_warranty']) ?> Tahun</td>
</tr>
<tr>
    <td id="garansi-sparepart-label">Garansi Sparepart</td>
    <td id="garansi-sparepart-value"><?= esc($data['sparepart_warranty']) ?> Tahun</td>
</tr>
        <tr>
    <td>Dimensi Produk</td>
    <td><?= esc($data['produk_p']) ?> x <?= esc($data['produk_l']) ?> x <?= esc($data['produk_t']) ?> cm</td>
</tr>
<tr>
    <td>Dimensi Kemasan</td>
    <td><?= esc($data['kemasan_p']) ?> x <?= esc($data['kemasan_l']) ?> x <?= esc($data['kemasan_t']) ?> cm</td>
</tr>
        <tr>
            <td>Berat Unit</td>
            <td><?= esc($data['berat']) ?> Kg</td>
        </tr>
        <tr>
            <td>Tipe Refrigerant</td>
            <td><?= esc($data['refrigant']) ?></td>
        </tr>
        <tr>
            <td>CSPF Rating</td>
            <td><?= esc($data['cspf']) ?></td>
        </tr>
    </table>
    <p>Submitted by: <?= esc($data['submitted_by']) ?></p>

    <div class="note">
        *Harap dicek kembali
    </div>

    <div class="buttons">
    <a href="<?= site_url('product/step1') ?>" class="btn btn-secondary">Kembali</a>
    <form method="post" action="<?= base_url('product/confirmSubmission') ?>">
    <input type="hidden" name="brand" value="<?= esc($data['brand']) ?>">
    <input type="hidden" name="product_type" value="<?= esc($data['product_type']) ?>">
    <input type="hidden" name="submitted_by" value="<?= session()->get('username') ?>"> <!-- User name from session -->
    <input type="hidden" name="status" value="confirmed">
    <input type="hidden" name="submission_date" value="<?= date('d/m/Y H:i:s') ?>"> <!-- Formatted date -->

    <!-- Other form fields for product details... -->

    <button type="submit" name="confirm" value="selesai">Selesai</button>
</form>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const category = "<?= esc($data['category']) ?>"; // Category from data
        const subcategory = "<?= esc($data['subcategory']) ?>"; // Subcategory from data
        
        const kapasitasLabel = document.getElementById('kapasitas-label');
        const kapasitasValue = document.getElementById('kapasitas-value');
        const garansiKompresorLabel = document.getElementById('garansi-kompresor-label');
        const garansiKompresorValue = document.getElementById('garansi-kompresor-value');
        const garansiSparepartLabel = document.getElementById('garansi-sparepart-label');
        const garansiSparepartValue = document.getElementById('garansi-sparepart-value');

        // Adjust based on category
        if (["TV"].includes(category)) {
            kapasitasLabel.textContent = "Ukuran";
            garansiKompresorLabel.textContent = "Garansi Panel";
        } else if (category === "MESIN CUCI") {
            garansiKompresorLabel.textContent = "Garansi Motor";
        }

        // Adjust based on subcategory
        if (subcategory === "SPEAKER") {
            garansiKompresorLabel.textContent = "Garansi Semua Service";
            garansiSparepartLabel.textContent = "Garansi Semua Service";
        } else if (subcategory === "KIPAS ANGIN") {
            garansiKompresorLabel.textContent = "Garansi Motor";
            garansiSparepartLabel.textContent = "Garansi Motor";
        } else if (subcategory === "DISPENSER GALON ATAS" || subcategory === "DISPENSER GALON BAWAH") {
            garansiSparepartLabel.textContent = "Kapasitas Air Dingin";
            kapasitasLabel.textContent = "Kapasitas Air Panas";
        }
    });
</script>

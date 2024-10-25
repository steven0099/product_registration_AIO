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
        <!-- Existing Data -->
        <tr>
            <td>Merek</td>
            <td><?= esc($data['brand_name']) ?></td>
            <td>Konsumsi Daya</td>
            <td><?= esc($data['daya']) ?> Watt</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?= esc($data['category_name']) ?></td>
            <td>Negara Pembuat</td>
            <td><?= esc($data['pembuat']) ?></td>
        </tr>
        <tr>
            <td>Sub Kategori</td>
            <td><?= esc($data['subcategory_name']) ?></td>
            <td>Keunggulan</td>
            <td>
                <?= esc($data['advantage1']) ?><br>
                <?= esc($data['advantage2']) ?><br>
                <?= esc($data['advantage3']) ?><br>
                <?= esc($data['advantage4'] ?? '')?><br>
                <?= esc($data['advantage5'] ?? '') ?><br>
                <?= esc($data['advantage6'] ?? '') ?>
            </td>
        </tr>
        <tr>
            <td>Tipe Produk</td>
            <td><?= esc($data['product_type']) ?></td>
            <td>Foto Produk</td>
            <td>
                <a href="<?= base_url('uploads/' . esc($data['gambar_depan'])) ?>" target="_blank">Gambar Depan</a><br>
                <a href="<?= base_url('uploads/' . esc($data['gambar_belakang'])) ?>" target="_blank">Gambar Belakang</a><br>
                <a href="<?= base_url('uploads/' . esc($data['gambar_atas'])) ?>" target="_blank">Gambar Atas</a><br>
                <a href="<?= base_url('uploads/' . esc($data['gambar_bawah'])) ?>" target="_blank">Gambar Bawah</a><br>
                <a href="<?= base_url('uploads/' . esc($data['gambar_samping_kiri'])) ?>" target="_blank">Gambar Samping Kiri</a><br>
                <a href="<?= base_url('uploads/' . esc($data['gambar_samping_kanan'])) ?>" target="_blank">Gambar Samping Kanan</a>
            </td>
        </tr>
        <tr>
            <td>Warna</td>
            <td><?= esc($data['color']) ?></td>
            <td>Video Produk</td>
            <td><a href="<?= esc($data['video_produk']) ?>" target="_blank">Video Produk</a></td>
        </tr>

        <!-- Conditional Fields -->
        <?php if ($data['category_id'] == '9'): ?>
        <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
        <tr>
            <td>Dimensi Produk dengan Stand</td>
            <td><?= esc($data['pstand_dimension']) ?> cm</td>
            <td>Ukuran</td>
            <td><?= esc($data['ukuran_size']) ?> </td>
        </tr>
        <tr>
            <td>Resolusi Panel</td>
            <td><?= esc($data['panel_resolution']) ?> Pixel</td>
            <td>Garansi Panel</td>
            <td><?= esc($data['garansi_panel_value']) ?> Tahun</td>
        </tr>
        <?php endif; ?>

        <?php if ($data['category_id'] == '3'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Kapasitas Pendinginan</td>
            <td><?= esc($data['cooling_capacity']) ?> BTU/h</td>
            <td>Kapasitas</td>
            <td><?= esc($data['capacity_value']) ?></td>
        </tr>
        <tr>
            <td>Garansi Kompresor</td>
            <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
            <td>Tipe Refrigerant</td>
            <td><?= esc($data['refrigrant_type']) ?></td>
        </tr>
        <tr>
            <td>Garansi Sparepart</td>
            <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
            <td>CSPF Rating</td>
            <td><?= esc($data['cspf']) ?></td>
        </tr>

        <?php endif; ?>

        <?php if ($data['category_id'] == '4' || $data['category_id'] == '5' || $data['category_id'] == '7' ): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Kapasitas</td>
            <td><?= esc($data['capacity_value']) ?></td>
            <td>Garansi Kompresor</td>
            <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
        </tr>
        <tr>
        <td>Garansi Sparepart</td>
        <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
        </tr>

        <?php endif; ?>
        <?php if ($data['category_id'] == '6'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Kapasitas</td>
            <td><?= esc($data['capacity_value']) ?></td>
            <td>Garansi Sparepart</td>
            <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
        </tr>
        <tr>
            <td>Garansi Motor</td>
            <td><?= esc($data['garansi_motor_value']) ?> Tahun</td>
        </tr>
        
        <?php endif; ?>

        <?php if ($data['subcategory_id'] == '31'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Ukuran</td>
            <td><?= esc($data['ukuran_size']) ?></td>
            <td>Garansi Semua Service</td>
            <td><?= esc($data['garansi_semua_service_value']) ?> Tahun</td>
        </tr>
        
        <?php endif; ?>
        <?php if ($data['subcategory_id'] == '32'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Ukuran</td>
            <td><?= esc($data['ukuran_size']) ?></td>
            <td>Garansi Motor</td>
            <td><?= esc($data['garansi_motor_value']) ?> Tahun</td>
        </tr>
        
        <?php endif; ?>
        <?php if ($data['subcategory_id'] == '35' || $data['subcategory_id'] == '36'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Kapasitas Air Dingin</td>
            <td><?= esc($data['kapasitas_air_dingin']) ?> Liter</td>
            <td>Kapasitas Air Panas</td>
            <td><?= esc($data['kapasitas_air_panas']) ?> Liter</td>
        </tr>
        <tr>
            <td>Garansi Kompresor</td>
            <td><?= esc($data['compressor_warranty_value'])?></td>
        </tr>
        
        <?php endif; ?>
        <?php if ($data['subcategory_id'] == '37' || $data['subcategory_id'] == '38'): ?>
        <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
        <tr>
            <td>Kapasitas</td>
            <td><?= esc($data['capacity_value']) ?></td>
            <td>Garansi Elemen Panas</td>
            <td><?= esc($data['garansi_elemen_panas_value']) ?></td>
        </tr>
        <tr>
            <td>Garansi Sparepart & Jasa Service</td>
            <td><?= esc($data['sparepart_warranty_value'])?></td>
        </tr>
        
        <?php endif; ?>
        <!-- Other Default Fields -->
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
    </table>
    
    <p>Submitted by: <?= esc($data['submitted_by']) ?></p>

    <div class="note">
        *Harap dicek kembali
    </div>

    <div class="buttons">
    <!-- Back Button -->
    <a href="<?= site_url('product/step1') ?>" class="btn btn-secondary">Kembali</a>

    <!-- Confirm Submission Form -->
    <form method="post" action="<?= base_url('product/confirmSubmission') ?>">
        <?= csrf_field()?>
        <input type="hidden" name="submitted_by" value="<?= session()->get('name') ?>"> <!-- User name from session -->
        <input type="hidden" name="status" value="confirmed">
        <input type="hidden" name="confirmed_at" value="<?= date('Y-m-d H:i:s') ?>"> <!-- Use standard format -->

        <button type="submit" name="confirm" value="selesai" onclick="showThankYouModal(event)">Selesai</button>
    </form>
</div>

<!-- Modal Structure for Thank You Message -->
<div id="thankYouModal" class="modal" style="display:none;">
    <div class="modal-content">
        <h1>Thank You!</h1>
        <p>Your submission has been successfully confirmed.</p>
        <button class="button" onclick="location.href='<?= base_url('logout') ?>'">Log Out</button>
        <button class="button" onclick="location.href='<?= site_url('product/step1') ?>'">Create Another Submission</button>
    </div>
</div>

<!-- JavaScript to Show Modal After Submission -->
<script>
    function showThankYouModal(event) {
        // Prevent form submission to show the modal first
        event.preventDefault();

        // Show the modal
        document.getElementById('thankYouModal').style.display = 'flex';

        // Optionally, you can handle form submission here if needed after the modal shows
        // Use setTimeout if you want to auto-submit the form after a few seconds
        setTimeout(() => {
            event.target.closest('form').submit(); // Submit the form after showing the modal
        }, 3000); // Adjust timeout as needed
    }
</script>

<style>
    /* Basic styles for the modal */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        width: 80%; /* Almost full width */
        max-width: 600px; /* Maximum width */
        animation: floatDown 1s ease; /* Animation for floating down */
    }

    @keyframes floatDown {
        0% {
            transform: translateY(-50px); /* Start slightly above */
            opacity: 0; /* Start invisible */
        }
        100% {
            transform: translateY(0); /* End at original position */
            opacity: 1; /* Fully visible */
        }
    }

    .button {
        padding: 10px 20px;
        margin: 10px;
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .button:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
</style>
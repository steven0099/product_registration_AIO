<?php
// Load the session
$session = \Config\Services::session();

// Check if step1 data exists
if (!$session->has('step1')) {
    echo 'Step 1 data is missing';
    exit;
} 

// Process Step 2 form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure numeric validation for the form inputs
    if (!is_numeric($_POST['produk_p']) || !is_numeric($_POST['produk_l']) || !is_numeric($_POST['produk_t']) || 
        !is_numeric($_POST['kemasan_p']) || !is_numeric($_POST['kemasan_l']) || !is_numeric($_POST['kemasan_t']) || 
        !is_numeric($_POST['berat']) || !is_numeric($_POST['daya']) || !is_numeric($_POST['cspf'])) {
        
        echo "All dimension and weight fields must be numeric.";
        exit;
    }

    // Store Step 2 data in session
    $session->set('step2', $_POST);

    // Redirect to the next step
    header('Location: product_pros.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form - Step 2</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="form-header">
        <img src="<?= base_url('images/logo.png') ?>" alt="AIO Logo" class="logo">
            <h2>Form Registrasi Produk - Spesifikasi Produk</h2>
        </div>
        <div class="progress-bar">
            <span>General Data</span>
            <span class="active">Spesifikasi Produk</span>
            <span>Keunggulan Produk</span>
            <span>Foto Produk</span>
            <span>Konfirmasi Produk</span>
        </div>

        <!-- Step 2 Form -->
        <form action="save-step2" method="post">
        <?= csrf_field() ?>
            <div class="form-group-s">
                <label for="product_dimensions">Dimensi Produk (P x L x T cm)</label>
                <input type="number" name="produk_p" placeholder="Panjang (cm)" required>
                <input type="number" name="produk_l" placeholder="Lebar (cm)" required>
                <input type="number" name="produk_t" placeholder="Tinggi (cm)" required>
            </div>

            <div class="form-group-s">
                <label for="package_dimensions">Dimensi Kemasan (P x L x T cm)</label>
                <input type="number" name="kemasan_p" placeholder="Panjang (cm)" required>
                <input type="number" name="kemasan_l" placeholder="Lebar (cm)" required>
                <input type="number" name="kemasan_t" placeholder="Tinggi (cm)" required>
            </div>

            <div class="form-group">
                <label for="berat">Berat Produk (kg)</label>
                <input type="number" name="berat" placeholder="Berat Produk (kg)" required>
            </div>

            <div class="form-group">
                <label for="daya">Konsumsi Daya (watt)</label>
                <input type="number" name="daya" placeholder="Konsumsi Daya (watt)" required>
            </div>

            <div class="form-group">
                <label for="pembuat">Negara Pembuat</label>
                <input type="text" name="pembuat" placeholder="Negara Pembuat" required>
            </div>

            <!-- refigrant Dropdown -->
            <div class="form-group">
                <label for="refrigrant">Tipe Refrigrant</label>
                <select id="refigrant" name="refigrant_id" required>
                    <option value="" disabled selected>Tipe Refrigrant</option>
                    <?php foreach ($refrigrant as $refigrants): ?>
                        <option value="<?= $refigrants['id'] ?>"><?= esc($refigrants['type']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cspf">CSPF Rating</label>
                <input type="number" name="cspf" placeholder="CSPF rating" min="1" max="5" step="0.1" required>
            </div>


            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
    </div>
</body>
</html>

<?php
// Load the session
$session = \Config\Services::session();

// Check if step1 data exists
if (!$session->has('step1')) {
    echo 'Step 1 data is missing';
    exit;
} 

$category_id = $session->get('step1')['category_id'];
// Process Step 2 form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure numeric validation for the form inputs
    if (!is_numeric($_POST['produk_p']) || !is_numeric($_POST['produk_l']) || !is_numeric($_POST['produk_t']) || 
        !is_numeric($_POST['kemasan_p']) || !is_numeric($_POST['kemasan_l']) || !is_numeric($_POST['kemasan_t']) ||
        !is_numeric($_POST['pstand_p']) || !is_numeric($_POST['pstand_l']) || !is_numeric($_POST['pstand_t']) || 
        !is_numeric($_POST['resolusi_x']) || !is_numeric($_POST['resolusi_y']) || !is_numeric($_POST['berat']) ||
        !is_numeric($_POST['daya']) || !is_numeric($_POST['cspf'])) {
        
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
        <label for="product_dimensions" id="product-dimensions-label">Dimensi Produk (P x L x T)</label>
            <div class="form-group-s" style="display: flex">
                <input type="number" name="produk_p" placeholder="Panjang (cm)" required>
                <label style="text-align: center">x</label>
                <input type="number" name="produk_l" placeholder="Lebar (cm)" required>
                <label style="text-align: center">x</label>
                <input type="number" name="produk_t" placeholder="Tinggi (cm)" required>
                <label style="margin-left:10px">cm</label>
            </div>

            <label for="pstand_dimensions" id="pstand-dimensions-label">Dimensi Produk dengan Stand (P x L x T)</label>
            <div class="form-group-s" id="product-stand-field" style="display: flex">
                <input type="number" name="pstand_p" placeholder="Panjang (cm)">
                <label style="text-align: center">x</label>
                <input type="number" name="pstand_l" placeholder="Lebar (cm)">
                <label style="text-align: center">x</label>
                <input type="number" name="pstand_t" placeholder="Tinggi (cm)">
                <label style="margin-left:10px">cm</label>
            </div>

            <label for="package_dimensions">Dimensi Kemasan Produk (P x L x T)</label>
            <div class="form-group-s" style="display: flex">
                <input type="number" name="kemasan_p" placeholder="Panjang (cm)" required>
                <label style="text-align: center">x</label>
                <input type="number" name="kemasan_l" placeholder="Lebar (cm)" required>
                <label style="text-align: center">x</label>
                <input type="number" name="kemasan_t" placeholder="Tinggi (cm)" required>
                <label style="margin-left:10px">cm</label>
            </div>

            <label for="panel_resolution" id="panel-resolution-label">Resolusi Panel</label>
            <div class="form-group-s" id="panel-resolution-field">
                <input type="number" name="resolusi_x" placeholder="X (px)">
                <label style="text-align: center">x</label>
                <input type="number" name="resolusi_y" placeholder="Y (px)">
                <label style="margin-left:10px">Pixel</label>
            </div>

            <div class="form-group" style="width: 100%;">
    <label for="berat">Berat Produk</label>
    <div style="display: flex; align-items: center;">
        <input type="number" name="berat" placeholder="Berat Produk (kg)" style="flex-grow: 1;" required>
        <span style="margin-left: 10px;">kg</span>
    </div>
</div>


            <div class="form-group">
                <label for="daya">Konsumsi Daya</label>
                <div style="display: flex; align-items: center;">
                <input type="number" name="daya" placeholder="Konsumsi Daya (watt)" style="flex-grow: 1;" required>
                <span style="margin-left: 10px;">watt</span>
                </div>
            </div>

            <div class="form-group" id="cooling-capacity-field">
                <label for="cooling_capacity">Kapasitas Pendinginan</label>
                <div style="display: flex; align-items: center;">
                <input type="number" name="cooling_capacity" placeholder="Kapasitas Pendinginan (BTU/h)" style="flex-grow: 1;">
                <span style="margin-left: 10px;">BTU/h</span>
                </div>
            </div>

            <div class="form-group">
                <label for="pembuat">Negara Pembuat</label>
                <input type="text" name="pembuat" placeholder="Negara Pembuat" style="text-transform: uppercase;" required>
            </div>

            <!-- refigrant Dropdown -->
            <div class="form-group" id="refrigrant-field">
                <label for="refrigrant">Tipe Refrigrant</label>
                <select id="refigrant" name="refrigrant_id">
                    <option value="" disabled selected>Tipe Refrigrant</option>
                    <?php foreach ($refrigrant as $refigrants): ?>
                        <option value="<?= $refigrants['id'] ?>"><?= esc($refigrants['type']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group" id="cspf-field">
    <label for="cspf">CSPF Rating</label>
    <div style="display: flex; align-items: center;">
        <input type="number" name="cspf" id="cspf-input" placeholder="CSPF rating" min="1" max="5" step="0.1">
        <div id="star-rating" style="margin-left: 10px;">
            <!-- Five star placeholders -->
            <span class="star" style="font-size: 1.5rem;">☆</span>
            <span class="star" style="font-size: 1.5rem;">☆</span>
            <span class="star" style="font-size: 1.5rem;">☆</span>
            <span class="star" style="font-size: 1.5rem;">☆</span>
            <span class="star" style="font-size: 1.5rem;">☆</span>
        </div>
    </div>
</div>

            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
    </div>
    <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
    <script>
    // Get the category_id from PHP
    var categoryId = <?= $category_id ?>;
    
    // Select the form groups you want to show/hide
    var dimensiProdukLabel = document.getElementById('product-dimensions-label');
    var dimensiPStandLabel = document.getElementById('pstand-dimensions-label');
    var PanelLabel = document.getElementById('panel-resolution-label');
    var dimensiProdukStand = document.getElementById('product-stand-field');
    var resolusiPanel = document.getElementById('panel-resolution-field');
    var coolingCapacity = document.getElementById('cooling-capacity-field');
    var cspfRating = document.getElementById('cspf-field');
    var refrigrantField = document.getElementById('refrigrant-field');
    
    // Hide or show fields based on category ID
    if (categoryId == 9) {
        // Show "dimensi produk dengan stand" and "resolusi panel" for category ID 9
        dimensiProdukLabel.innerText = 'Dimensi Produk Tanpa Stand (P x L x T cm)';
        dimensiPStandLabel.innerText = 'Dimensi Produk Dengan Stand (P x L x T cm)';
        PanelLabel.innerText = 'Resolusi Panel';
        dimensiProdukStand.style.display = 'flex';
        resolusiPanel.style.display = 'flex';
    } else {
        // Hide these fields for other categories
        dimensiProdukLabel.innerText = 'Dimensi Produk (P x L x T cm)';
        dimensiPStandLabel.innerText = '';
        PanelLabel.innerText = '';
        dimensiProdukStand.style.display = 'none';
        resolusiPanel.style.display = 'none';
    }

    if (categoryId == 5) {
        // Show "kapasitas pendinginan", "CSPF rating", and "tipe refrigrant" for category ID 3
        coolingCapacity.style.display = 'flex';
        cspfRating.style.display = 'flex';
        refrigrantField.style.display = 'flex';
    } else {
        // Hide these fields for other categories
        coolingCapacity.style.display = 'none';
        cspfRating.style.display = 'none';
        refrigrantField.style.display = 'none';
    }

    // Function to update stars based on the CSPF input value
    function updateStars(cspf) {
        const stars = document.querySelectorAll('#star-rating .star');
        stars.forEach((star, index) => {
            if (cspf >= (index + 1)) {
                star.textContent = '★'; // Filled star for all stars up to the value
            } else {
                star.textContent = '☆'; // Empty star for remaining stars
            }
        });
    }

    // Add an event listener to the CSPF input field
    document.getElementById('cspf-input').addEventListener('input', function() {
        const cspfValue = parseFloat(this.value);
        if (!isNaN(cspfValue) && cspfValue >= 1 && cspfValue <= 5) {
            updateStars(Math.floor(cspfValue)); // Round down to nearest integer to light stars accordingly
        } else {
            updateStars(0); // Reset stars if input is invalid
        }
    });

    // Hide the entire CSPF field when it's not needed
    function toggleCspfField(isVisible) {
        const cspfField = document.getElementById('cspf-field');
        if (isVisible) {
            cspfField.style.display = 'block';
        } else {
            cspfField.style.display = 'none';
            updateStars(0); // Reset stars when the field is hidden
        }
    }
</script>
</body>
</html>

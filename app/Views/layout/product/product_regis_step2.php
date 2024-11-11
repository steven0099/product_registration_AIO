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
    if (
        !is_numeric($_POST['produk_p']) || !is_numeric($_POST['produk_l']) || !is_numeric($_POST['produk_t']) ||
        !is_numeric($_POST['kemasan_p']) || !is_numeric($_POST['kemasan_l']) || !is_numeric($_POST['kemasan_t']) ||
        !is_numeric($_POST['pstand_p']) || !is_numeric($_POST['pstand_l']) || !is_numeric($_POST['pstand_t']) ||
        !is_numeric($_POST['resolusi_x']) || !is_numeric($_POST['resolusi_y']) || !is_numeric($_POST['berat']) ||
        !is_numeric($_POST['daya']) || !is_numeric($_POST['cspf'])
    ) {

        echo "All dimension and weight fields must be numeric.";
        exit;
    }

    // Store Step 2 data in session
    $session->set('step2', $_POST);

    // Redirect to the next step
    header('Location: step3');
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
    <title><?= $this->renderSection('title') ?> - AIO</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="/product-asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/product-asset/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/product-asset/assets/css/themify-icons.css" rel="stylesheet">

    <style>
        input[type="text"],
        input[type="file"],
        input[type="number"],
        input[type="video"] {
            border: 2px solid #00BFFF;
            /* Warna biru */
            border-radius: 5px;
            /* Membuat sudut sedikit melengkung */
            padding: 10px;
            /* Menambahkan jarak di dalam input */
            outline: none;
            /* Menghilangkan outline default */
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            /* Menambahkan efek bayangan */
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="number"]:focus,
        input[type="video"]:focus {
            border-color: #1E90FF;
            /* Warna biru yang lebih tua saat input difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan yang lebih terang saat difokuskan */
        }

        select {
            border: 2px solid #00BFFF !important;
            /* Warna biru */
            border-radius: 5px;
            padding: 10px;
            padding-right: 40px;
            /* Tambahkan jarak untuk icon custom */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            /* Menambahkan efek bayangan */
            appearance: none;
            /* Menghilangkan default arrow */
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140 140"><polygon points="70,100 100,40 40,40" style="fill:%2300BFFF"/></svg>') no-repeat right 10px center !important;
            background-color: white;
            /* Warna latar belakang */
            background-size: 20px;
            /* Ukuran icon */
            cursor: pointer;
        }

        select:focus {
            border-color: #1E90FF;
            /* Warna biru yang lebih tua saat difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan lebih terang */
        }

        .logo {
            justify-content: flex-start;
            display: flex;
        }

        .title {
            justify-content: end;
            align-items: center;
            display: flex;
        }

        .divider {
            margin: 0 5px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .unit {
            margin-left: 10px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .col-form-label {
            text-align: right;
        }

        .disabled-link {
            pointer-events: none;
            /* Disables click events */
            color: gray;
            /* Optional: make it look disabled */
            cursor: not-allowed;
            /* Change cursor to indicate it's disabled */
        }

        #product-stand-field,
        #panel-resolution-field,
        #cooling-capacity-field,
        #cspf-field,
        #refrigrant-field {
            display: none;
        }

        @media (max-width: 600px) {

            .logo,
            .title {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="image-container set-full-height" style="background-color: #00a9ee">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">


                            <div class="wizard-header" style="text-align: center;weight: 7000;">
                                <div class="row" style=" height: 135px; align-content: center">
                                    <div class="col-sm-5 col-sm-offset-1 logo">
                                        <img src="<?= base_url('images/logo.png') ?>" style="max-height: 70px;">
                                    </div>
                                    <div class="col-sm-5 title">
                                        <h3 class="" style="font-weight: 700;margin-top: 0;font-family: 'Poppins', sans-serif;">Form Registrasi Produk</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#general" data-toggle="tab" onclick="history.back();">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            General Data
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#specification" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Spesifikasi Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#advantages" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Keunggulan Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#photos" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Foto Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#confirmation" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Konfirmasi Produk
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <form action="save-step2" method="post">
                                <?= csrf_field() ?>
                                <div class="tab-content">

                                    <div class="tab-pane" id="specification">
                                        <div class="row">
                                            <!-- Left Column -->
                                            <div class="col-sm-6" style="margin-top: 65px;">
                                                <div class="form-group row">
                                                    <label for="product_dimensions" id="product-dimensions-label" class="col-sm-4 col-form-label">Dimensi Produk (P x L x T)</label>
                                                    <div class="col-sm-8">

                                                        <div class="form-group-s" style="display: flex">
                                                            <input type="number" name="produk_p" placeholder="Panjang (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="produk_l" placeholder="Lebar (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="produk_t" placeholder="Tinggi (cm)" class="form-control" required>
                                                            <label class="unit">cm</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Grup Formulir Dimensi Produk Stand -->
                                                <div class="form-group row">
                                                    <label for="pstand_dimensions" id="pstand-dimensions-label" class="col-sm-4 col-form-label">Dimensi Produk dengan Stand (P x L x T)</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group-s" id="product-stand-field" style="display: flex; align-items: center;">
                                                            <!-- Input dimensi produk stand -->
                                                            <input type="number" name="pstand_p" placeholder="Panjang (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="pstand_l" placeholder="Lebar (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="pstand_t" placeholder="Tinggi (cm)" class="form-control" required>
                                                            <label class="unit"> cm </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="package_dimensions" class="col-sm-4 col-form-label">Dimensi Kemasan Produk (P x L x T)</label>
                                                    <div class="col-sm-8">
                                                        <div style="display: flex;">
                                                            <input type="number" name="kemasan_p" placeholder="Panjang (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="kemasan_l" placeholder="Lebar (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="kemasan_t" placeholder="Tinggi (cm)" class="form-control" required>
                                                            <label class="unit">cm</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Grup Formulir Resolusi Panel -->
                                                <div class="form-group row">
                                                    <label for="panel_resolution" id="panel-resolution-label" class="col-sm-4 col-form-label">Resolusi Panel</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group-s" id="panel-resolution-field" style="display: flex; align-items: center;">
                                                            <!-- Input resolusi panel -->
                                                            <input type="number" name="resolusi_x" placeholder="X (cm)" class="form-control" required>
                                                            <label class="divider"> x </label>
                                                            <input type="number" name="resolusi_y" placeholder="Y (cm)" class="form-control" required>
                                                            <label class="unit"> Pixel </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="berat" class="col-sm-4 col-form-label">Berat Produk</label>
                                                    <div class="col-sm-8">
                                                        <div style="display: flex;">
                                                            <input type="number" name="berat" placeholder="Berat Produk (kg)" class="form-control" required>
                                                            <label class="unit">kg</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- refigrant Dropdown -->
                                                <div class="form-group row" id="refrigrant-field">
                                                    <label for="refrigrant" class="col-sm-4 col-form-label">Tipe Refrigrant</label>
                                                    <div class="col-sm-8">
                                                        <select id="refigrant" name="refrigrant_id" class="form-control">
                                                            <option value="" disabled selected>Tipe Refrigrant</option>
                                                            <?php foreach ($refrigrant as $refigrants): ?>
                                                                <option value="<?= $refigrants['id'] ?>"><?= esc($refigrants['type']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-sm-6" style="margin-top: 65px;">
                                                <div class="form-group row" id="cspf-field">
                                                    <label for="cspf" class="col-sm-4 col-form-label">CSPF Rating</label>
                                                    <div class="col-sm-8">
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
                                                </div>

                                                <div class="form-group row">
                                                    <label for="daya" class="col-sm-4 col-form-label">Konsumsi Daya</label>
                                                    <div class="col-sm-8">
                                                        <div style="display: flex;">
                                                            <input type="number" name="daya" placeholder="Konsumsi Daya (watt)" class="form-control" required>
                                                            <label class="unit">watt</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="cooling-capacity-field">
                                                    <label for="cooling_capacity" class="col-sm-4 col-form-label">Kapasitas Pendinginan</label>
                                                    <div class="col-sm-8">
                                                        <div style="display: flex;">
                                                            <input type="number" name="cooling_capacity" placeholder="Kapasitas Pendinginan (BTU/h)" class="form-control">
                                                            <label class="unit">BTU/h</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="pembuat" class="col-sm-4 col-form-label">Negara Pembuat</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="pembuat" placeholder="Negara Pembuat" style="text-transform: uppercase;" class="form-control" required>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='submit' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' onclick="history.back();" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->


        <div class="footer">
            <div class="container text-center">
                Copyright &copy; 2024 AIO. All rights reserved.
            </div>
        </div>
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

</body>

<!--   Core JS Files   -->
<script src="/product-asset/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/product-asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/product-asset/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="/product-asset/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
<script src="/product-asset/assets/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('a[href="#specification"]').tab('show'); // Activate the specification tab
    });

    window.onload = function() {
        // Mendapatkan category_id dari PHP
        var categoryId = <?= $category_id ?>;

        // Mendapatkan elemen-elemen yang akan ditampilkan/disembunyikan
        var dimensiProdukLabel = document.getElementById('product-dimensions-label');
        var dimensiPStandLabel = document.getElementById('pstand-dimensions-label');
        var PanelLabel = document.getElementById('panel-resolution-label');
        var dimensiProdukStand = document.getElementById('product-stand-field');
        var resolusiPanel = document.getElementById('panel-resolution-field');
        var coolingCapacity = document.getElementById('cooling-capacity-field');
        var cspfRating = document.getElementById('cspf-field');
        var refrigrantField = document.getElementById('refrigrant-field');

        // Fungsi untuk mengatur visibilitas elemen berdasarkan category ID
        function updateVisibility() {
            if (categoryId == 9) {
                if (dimensiProdukLabel) dimensiProdukLabel.innerText = 'Dimensi Produk Tanpa Stand (P x L x T cm)';
                if (dimensiPStandLabel) dimensiPStandLabel.innerText = 'Dimensi Produk Dengan Stand (P x L x T cm)';
                if (PanelLabel) PanelLabel.innerText = 'Resolusi Panel';
                if (dimensiProdukStand) dimensiProdukStand.style.display = 'block';
                if (resolusiPanel) resolusiPanel.style.display = 'block';
                document.getElementById('product-stand-field').style.display = 'flex'; // Use 'flex' to maintain layout
                document.getElementById('panel-resolution-field').style.display = 'flex'; // Use 'flex' to maintain layout
            } else {
                if (dimensiProdukLabel) dimensiProdukLabel.innerText = 'Dimensi Produk (P x L x T cm)';
                if (dimensiPStandLabel) dimensiPStandLabel.innerText = '';
                if (PanelLabel) PanelLabel.innerText = '';
                if (dimensiProdukStand) dimensiProdukStand.style.display = 'none';
                if (resolusiPanel) resolusiPanel.style.display = 'none';
                document.getElementById('product-stand-field').style.display = 'none';
                document.getElementById('panel-resolution-field').style.display = 'none';
            }

            if (categoryId == 5) {
                if (coolingCapacity) coolingCapacity.style.display = 'block';
                if (cspfRating) cspfRating.style.display = 'block';
                if (refrigrantField) refrigrantField.style.display = 'block';
            } else {
                if (coolingCapacity) coolingCapacity.style.display = 'none';
                if (cspfRating) cspfRating.style.display = 'none';
                if (refrigrantField) refrigrantField.style.display = 'none';
            }
        }

        // Fungsi untuk memperbarui bintang berdasarkan nilai CSPF
        function updateStars(cspf) {
            const stars = document.querySelectorAll('#star-rating .star');
            stars.forEach((star, index) => {
                star.textContent = cspf >= (index + 1) ? '★' : '☆';
            });
        }

        // Menambahkan event listener untuk input CSPF
        document.getElementById('cspf-input').addEventListener('input', function() {
            const cspfValue = parseFloat(this.value);
            if (!isNaN(cspfValue) && cspfValue >= 1 && cspfValue <= 5) {
                updateStars(Math.floor(cspfValue));
            } else {
                updateStars(0);
            }
        });

        // Panggil fungsi updateVisibility untuk menetapkan visibilitas awal
        updateVisibility();
    };
</script>




</html>
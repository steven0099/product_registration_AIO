<?php
// Check if the session is not already started
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set session data
    $session = \Config\Services::session();
    $session->set('step1', $_POST);
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
                            <form action="" method="">

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
                                            <a href="#general" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-package"></i>
                                                </div>
                                                General Data
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#type" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-package"></i>
                                                </div>
                                                Spesifikasi Produk
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#facilities" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-package"></i>
                                                </div>
                                                Keunggulan Produk
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#description" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-package"></i>
                                                </div>
                                                Foto Produk
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#confirmation" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-package"></i>
                                                </div>
                                                Konfirmasi Produk
                                            </a>
                                        </li>
                                    </ul>
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

                                <form action="save-step1" method="post">
                                    <?= csrf_field() ?>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="general">
                                            <div class="row">
                                                <div class="col-sm-12" style="margin-bottom: 65px;">
                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="b and">Merek</label>
                                                        <select id="brand" name="brand_id" class="form-control" required>
                                                            <option value="" disabled selected>Masukan Merek</option>
                                                            <?php foreach ($brands as $brand): ?>
                                                                <option value="<?= $brand['id'] ?>"><?= esc($brand['name']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="category">Kategori</label>
                                                        <select id="category" name="category_id" class="form-control" required>
                                                            <option value="" disabled selected>Masukan Kategori</option>
                                                            <?php foreach ($categories as $category): ?>
                                                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="subcategory">Subkategori</label>
                                                        <select id="subcategory" class="form-control" name="subcategory_id" disabled required>
                                                            <option value="" disabled selected>Select Subcategory</option>
                                                            <option value="" disabled selected>Masukan Subkategori</option>
                                                            <?php foreach ($subcategories as $subcategory): ?>
                                                                <option value="<?= $subcategory['id'] ?>"><?= esc($subcategory['name']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="product_type">Tipe Produk</label>
                                                        <input type="text" id="product_type" class="form-control" name="product_type" placeholder="Masukan Tipe Produk" pattern="[^-/]+" title="Cannot contain '-' or '/'" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div id="capacity-group" class="col-sm-6" style="display:none;">
                                                    <div class="form-group">
                                                        <label id="capacity-label">Kapasitas</label>
                                                        <select id="capacity" name="capacity_value" class="form-control" required>
                                                            <option value="" disabled selected>Select Kapasitas</option>
                                                            <!-- Options will be populated dynamically -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group" id="warranty-compressor-group">
                                                        <label for="compressor_warranty" id="compressor-warranty-label">Garansi Kompresor</label>
                                                        <div>
                                                            <select id="compressor_warranty" name="compressor_warranty_id" class="form-control" style="" required>
                                                                <option value="" disabled selected>Masukan Garansi Kompresor</option>
                                                                <?php foreach ($compressor_warranties as $compressor_warranty): ?>
                                                                    <option value="<?= $compressor_warranty['id'] ?>"><?= esc($compressor_warranty['value']) ?> Tahun</option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="color">Warna</label>
                                                        <input type="text" id="color" name="color" placeholder="Masukan Warna" class="form-control" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group" id="warranty-sparepart-group">
                                                        <label for="sparepart_warranty" id="sparepart-warranty-label">Garansi Sparepart</label>
                                                        <div style="">
                                                            <select id="sparepart_warranty" class="form-control" name="sparepart_warranty_id" style="" required>
                                                                <option value="" disabled selected>Masukan Garansi Sparepart</option>
                                                                <?php foreach ($sparepart_warranties as $sparepart_warranty): ?>
                                                                    <option value="<?= esc($sparepart_warranty['id']) ?>"><?= esc($sparepart_warranty['value']) ?> Tahun</option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6" id="kapasitas-air-dingin" style="display:none;">
                                                    <div class="form-group">
                                                        <div style="">
                                                            <label for="kapasitas_air_dingin" style="">Kapasitas Air Dingin</label>
                                                            <input type="text" class="form-control" id="kapasitas_air_dingin" name="kapasitas_air_dingin" style="" placeholder="Kapasitas Air Dingin">
                                                            <span style="">Liter</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6" id="kapasitas-air-panas" style="display:none;">
                                                    <div class="form-group">
                                                        <div style="">
                                                            <label for="kapasitas_air_panas" style="">Kapasitas Air Panas</label>
                                                            <input type="text" class="form-control" id="kapasitas_air_panas" name="kapasitas_air_panas" style="" placeholder="Kapasitas Air Panas">
                                                            <span style="">Liter</span>
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
                                            <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <button type="submit" class="submit-btn">Selanjutnya</button>
                                </form>
                                <p class="form-note">*Harap diisi dengan benar</p>
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
    document.getElementById('category').addEventListener('change', function() {
        const categoryId = this.value;
        const subcategoryDropdown = document.getElementById('subcategory');

        // Clear the current options
        subcategoryDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';

        // Fetch subcategories via AJAX
        fetch(`<?= base_url('get-subcategories') ?>/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                subcategoryDropdown.innerHTML = '<option value="" disabled selected>Select Subcategory</option>';

                if (data.length > 0) {
                    data.forEach(subcategory => {
                        subcategoryDropdown.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                    });
                } else {
                    subcategoryDropdown.innerHTML = '<option value="" disabled selected>No Subcategories Available</option>';
                }
            })
            .catch(error => {
                console.error('Error fetching subcategories:', error);
            });
    });

    document.getElementById('subcategory').addEventListener('change', function() {
        const subcategoryId = this.value;
        const categoryId = document.getElementById('category').value;
        const capacityLabel = document.getElementById('capacity-label');
        const compressorWarrantyLabel = document.getElementById('compressor-warranty-label');
        const sparepartWarrantyLabel = document.getElementById('sparepart-warranty-label');

        // Update compressor warranty field based on category
        if (categoryId === '9') { // Category is for Garansi Panel
            compressorWarrantyLabel.innerText = 'Garansi Panel';
            document.getElementById('warranty-sparepart-group').style.display = 'block';
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_panel_id'); // Change name to garansi_panel_id
        } else if (categoryId === '6') {
            compressorWarrantyLabel.innerText = 'Garansi Motor';
            document.getElementById('warranty-sparepart-group').style.display = 'block';
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name to garansi_motor_id
        } else if (subcategoryId == '31') { // Check for subcategory id 31
            compressorWarrantyLabel.innerText = 'Garansi Semua Service';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
        } else if (subcategoryId == '32') { // Check for subcategory id 31
            compressorWarrantyLabel.innerText = 'Garansi Motor';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name for Garansi Semua Service
        } else if (subcategoryId == '35' || subcategoryId == '36') { // Check for subcategory id 31
            compressorWarrantyLabel.innerText = 'Garansi Kompresor';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name for Garansi Semua Service
        } else if (subcategoryId == '37' || subcategoryId == '38') { // Check for subcategory id 31
            compressorWarrantyLabel.innerText = 'Garansi Elemen Panas';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
        } else {
            compressorWarrantyLabel.innerText = 'Garansi Kompresor';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Ensure the group is visible
            document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name back to compressor_warranty_id
        }

        // Change capacity to ukuran_size if category is TV
        if (categoryId === '9') { // Assuming '9' corresponds to TV category
            capacityLabel.innerText = 'Ukuran Layar';
            document.getElementById('capacity').setAttribute('name', 'ukuran_id'); // Change name to ukuran_size
        } else if (subcategoryId == '31') {
            capacityLabel.innerText = 'Ukuran Speaker';
            document.getElementById('capacity').setAttribute('name', 'ukuran_id'); // Change name to ukuran_size
        } else if (subcategoryId == '32') {
            capacityLabel.innerText = 'Ukuran Speaker';
            document.getElementById('capacity').setAttribute('name', 'ukuran_id'); // Change name to ukuran_size
        } else {
            capacityLabel.innerText = 'Kapasitas';
            document.getElementById('capacity').setAttribute('name', 'capacity_id'); // Change back if not TV
        }

        // Check if the category is "TV" to fetch options for Ukuran TV
        if (categoryId === '9') {
            showCapacityField(true); // Show dropdown for capacity
            fetchUkuranTvOptions(subcategoryId); // Fetch Ukuran TV options
            fetchPanelWarrantyOptions(subcategoryId)
        } else if (categoryId === '6') {
            showCapacityField(false); // Show dropdown for capacity
            fetchCapacities(subcategoryId);
            fetchGaransiMotorOptions(subcategoryId); // Fetch Garansi Motor options
        } else if (subcategoryId == '31') {
            showCapacityField(true); // Show dropdown for capacity
            fetchUkuranTvOptions(subcategoryId); // Fetch Ukuran TV options
            fetchGaransiSemuaServiceOptions(subcategoryId)
        } else if (subcategoryId == '32') {
            showCapacityField(true); // Show dropdown for capacity
            fetchUkuranTvOptions(subcategoryId); // Fetch Ukuran TV options
            fetchGaransiMotorOptions(subcategoryId)
        } else if (subcategoryId == '35' || subcategoryId == '36') {
            hideCapacityField(); // Show dropdown for capacity
            fetchCompressorWarrantyOptions(subcategoryId)
        } else if (subcategoryId == '37' || subcategoryId == '38') {
            showCapacityField(false); // Show dropdown for capacity
            fetchCapacities(subcategoryId); // Fetch Ukuran TV options
            fetchGaransiElemenPanasOptions(subcategoryId)
        } else {
            showCapacityField(false); // Show dropdown for capacity
            fetchCapacities(subcategoryId); // Fetch capacities based on subcategory
            fetchCompressorWarrantyOptions(subcategoryId)
        }

        if (subcategoryId == 35 || subcategoryId == 36) {
            // Hide "kapasitas" and "garansi sparepart"
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'none';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'block';
            document.getElementById('kapasitas-air-panas').style.display = 'block';
            compressorWarrantyLabel.innerText = 'Garansi Kompresor';
            fetchCompressorWarrantyOptions(); // Fetch Garansi Kompresor options
        } else {
            // Show "kapasitas" and "garansi sparepart" for other subcategories
            document.getElementById('capacity-group').style.display = 'block';
            document.getElementById('warranty-sparepart-group').style.display = 'block';

            // Hide "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'none';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
        }
    });


    document.getElementById('product_type').addEventListener('input', function() {
        // Replace any instance of '-' or '/' with an empty string and make it uppercase
        this.value = this.value.replace(/[-/]/g, '').toUpperCase();
    });
    // Function to update form fields based on the selected category
    function updateFormFields(categoryId, subcategoryId) {
        const capacityGroup = document.getElementById('capacity-group');
        const capacityDropdown = document.getElementById('capacity')
        const compressorWarrantyLabel = document.getElementById('compressor-warranty-label');
        const compressorWarrantyDropdown = document.getElementById('compressor_warranty');
        const sparepartWarrantyLabel = document.getElementById('sparepart-warranty-label');

        capacityGroup.style.display = 'none'; // Hide capacity initially

        switch (categoryId) {
            case '3': // AC
            case '4': // KULKAS
            case '5': // FREEZER
            case '7': // SHOWCASE
                showCapacityField(true, 'Kapasitas'); // Show dropdown for capacity
                compressorWarrantyLabel.innerText = 'Garansi Kompresor';
                sparepartWarrantyLabel.innerText = 'Garansi Sparepart';
                fetchCapacities(subcategoryId); // Fetch capacities
                fetchCompressorWarrantyOptions(); // Fetch Garansi Kompresor options
                break;

            case '9': // TV
                showCapacityField(true, 'Ukuran'); // Show dropdown for "Ukuran"
                compressorWarrantyLabel.innerText = 'Garansi Panel'; // Change to Garansi Panel
                fetchUkuranTvOptions(subcategoryId); // Fetch Ukuran TV options
                fetchPanelWarrantyOptions(); // Fetch Garansi Panel options
                break;

            case '6': // MESIN CUCI
                showCapacityField(true, 'Kapasitas'); // Show dropdown for capacity
                compressorWarrantyLabel.innerText = 'Garansi Motor'; // Change to Garansi Motor
                fetchGaransiMotorOptions(); // Fetch Garansi Motor options
                break;

            default:
                hideCapacityField(); // Hide capacity field if category doesn't need it
                fetchCompressorWarrantyOptions(); // Set default to Garansi Kompresor
                break;
        }
    }

    document.getElementById('category').addEventListener('change', function() {
        const subcategoryDropdown = document.getElementById('subcategory');
        const categoryId = this.value;

        if (categoryId) {
            subcategoryDropdown.disabled = false;
            // You can now populate subcategory options based on categoryId
            fetchSubcategories(categoryId); // Implement this function for fetching options
        } else {
            subcategoryDropdown.disabled = true;
        }
    });

    function fetchGaransiSemuaServiceOptions() {
        const compressorWarrantyLabel = document.getElementById('compressor-warranty-label');
        compressorWarrantyLabel.innerText = 'Garansi Semua Service';

        fetch('<?= base_url('get-garansi-service') ?>')
            .then(response => response.json())
            .then(data => {
                const warrantyDropdown = document.getElementById('compressor_warranty');
                <?php foreach ($garansi_semua_service as $garansi_service): ?>
                    warrantyDropdown.innerHTML = '<option value="" disabled selected>Select Garansi Semua Service</option>';
                <?php endforeach ?>
                if (Array.isArray(data)) {
                    data.forEach(service => {
                        warrantyDropdown.innerHTML += `<option value="${service.id}">${service.value}</option>`;
                    });
                } else {
                    alert('Failed to load Garansi Semua Service options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching Garansi Semua Service options:', error);
                alert('An error occurred while fetching warranties. Please try again later.');
            });
    }

    function handleSparepartWarranty(subcategoryId) {
        const sparepartWarrantyGroup = document.getElementById('warranty-sparepart-group');
        const sparepartWarrantyField = document.getElementById('sparepart_warranty');

        if (subcategoryId == '31' || subcategoryId == '32' || subcategoryId == '35' || subcategoryId == '36') { // Subcategories that don't need sparepart warranty
            // Hide the sparepart warranty field
            sparepartWarrantyGroup.style.display = 'none';
            // Remove 'required' attribute since it's hidden and not needed
            sparepartWarrantyField.removeAttribute('required');
        } else {
            // Show the sparepart warranty field
            sparepartWarrantyGroup.style.display = 'block';
            // Add 'required' attribute when it's visible
            sparepartWarrantyField.setAttribute('required', 'required');
        }
    }

    function handleCapacityGroup(subcategoryId) {
        const capacityGroup = document.getElementById('capacity-group');
        const capacityField = document.getElementById('capacity');

        if (subcategoryId == '35' || subcategoryId == '36') { // Subcategories that don't need sparepart warranty
            // Hide the sparepart warranty field
            capacityGroup.style.display = 'none';
            // Remove 'required' attribute since it's hidden and not needed
            capacityField.removeAttribute('required');
        } else {
            // Show the sparepart warranty field
            capacityGroup.style.display = 'block';
            // Add 'required' attribute when it's visible
            capacityField.setAttribute('required', 'required');
        }
    }

    document.getElementById('subcategory').addEventListener('change', function() {
        const subcategoryId = this.value;

        handleSparepartWarranty(subcategoryId);
        handleCapacityGroup(subcategoryId);

        // Handle other logic for kapasitas or ukuran here
    });

    function fetchCompressorWarrantyOptions() {
        fetch('<?= base_url('get-compressor-warranties') ?>')
            .then(response => response.json())
            .then(data => {
                const warrantyDropdown = document.getElementById('compressor_warranty');
                warrantyDropdown.innerHTML = '<option value="" disabled selected>Select Garansi Kompresor</option>';

                if (Array.isArray(data)) {
                    data.forEach(warranty => {
                        warrantyDropdown.innerHTML += `<option value="${warranty.id}">${warranty.value}</option>`;
                    });
                } else {
                    alert('Failed to load Garansi Kompresor options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching compressor warranties:', error);
                alert('An error occurred while fetching warranties. Please try again later.');
            });
    }

    function fetchPanelWarrantyOptions() {
        fetch('<?= base_url('get-panel-warranties') ?>')
            .then(response => response.json())
            .then(data => {
                const warrantyDropdown = document.getElementById('compressor_warranty');

                // Clear previous options and add a placeholder for Garansi Panel
                warrantyDropdown.innerHTML = '<option value="" disabled selected>Select Garansi Panel</option>';

                // Populate options dynamically from the fetch result
                if (Array.isArray(data)) {
                    data.forEach(warranty => {
                        warrantyDropdown.innerHTML += `<option value="${warranty.id}">${warranty.value}</option>`;
                    });
                } else {
                    alert('Failed to load Garansi Panel options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching panel warranties:', error);
                alert('An error occurred while fetching warranties. Please try again later.');
            });
    }

    function fetchGaransiMotorOptions() {
        fetch('<?= base_url('get-motor-warranties') ?>')
            .then(response => response.json())
            .then(data => {
                const warrantyDropdown = document.getElementById('compressor_warranty');
                warrantyDropdown.innerHTML = '<option value="" disabled selected>Select Garansi Motor</option>';

                if (Array.isArray(data)) {
                    data.forEach(warranty => {
                        warrantyDropdown.innerHTML += `<option value="${warranty.id}">${warranty.value}</option>`;
                    });
                } else {
                    alert('Failed to load Garansi Motor options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching motor warranties:', error);
                alert('An error occurred while fetching warranties. Please try again later.');
            });
    }

    function fetchGaransiElemenPanasOptions() {
        fetch('<?= base_url('get-heat-warranties') ?>')
            .then(response => response.json())
            .then(data => {
                const warrantyDropdown = document.getElementById('compressor_warranty');
                warrantyDropdown.innerHTML = '<option value="" disabled selected>Select Garansi Elemen Panas</option>';

                if (Array.isArray(data)) {
                    data.forEach(heat => {
                        warrantyDropdown.innerHTML += `<option value="${heat.id}">${heat.value}</option>`;
                    });
                } else {
                    alert('Failed to load Garansi Elemen Panas options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching Elemen Panas warranties:', error);
                alert('An error occurred while fetching warranties. Please try again later.');
            });
    }

    // Function to show capacity field with dropdown
    // Function to show capacity field with dropdown and update the label based on category/subcategory
    function showCapacityField(isUkuran = false) {
        const capacityGroup = document.getElementById('capacity-group');
        const label = isUkuran ? 'Ukuran' : 'Kapasitas'; // Use 'Ukuran' if isUkuran is true, else 'Kapasitas'

        capacityGroup.style.display = 'block'; // Ensure capacity group is visible
        capacityGroup.innerHTML = `
        <div class="form-group">
            <label id="capacity-label">${label}</label>
            <select id="capacity" class="form-control" name="${isUkuran ? 'ukuran_id' : 'capacity_id'}" required>
                <option value="" disabled selected>Select ${label}</option>
                <!-- Options will be loaded dynamically -->
            </select>
        </div>`;
    }

    // Function to hide capacity field
    function hideCapacityField() {
        const capacityGroup = document.getElementById('capacity-group');
        capacityGroup.style.display = 'none';
    }

    // Function to fetch Ukuran TV options via AJAX
    // Function to fetch Ukuran TV options via AJAX
    function fetchUkuranTvOptions(subcategoryId) {
        fetch(`<?= base_url('get-ukuran-tv') ?>/${subcategoryId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const capacityDropdown = document.getElementById('capacity'); // Ensure this is the correct ID
                capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Ukuran</option>';

                if (Array.isArray(data)) {
                    data.forEach(ukuran => {
                        capacityDropdown.innerHTML += `<option value="${ukuran.id}">${ukuran.size}</option>`;
                    });
                } else {
                    console.error('Data format is not as expected:', data);
                    alert('Failed to load size options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching capacities:', error);
                alert('An error occurred while fetching capacities. Please try again later.');
            });
    }
    // Function to fetch capacities via AJAX
    function fetchCapacities(subcategoryId) {
        fetch(`<?= base_url('get-capacities') ?>/${subcategoryId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const capacityDropdown = document.getElementById('capacity');
                capacityDropdown.innerHTML = '<option value="" disabled selected>Select Kapasitas</option>';

                if (Array.isArray(data)) {
                    data.forEach(capacity => {
                        capacityDropdown.innerHTML += `<option value="${capacity.id}">${capacity.value}</option>`;
                    });
                } else {
                    console.error('Data format is not as expected:', data);
                    alert('Failed to load capacity options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching capacities:', error);
                alert('An error occurred while fetching capacities. Please try again later.');
            });

    }
</script>


</html>
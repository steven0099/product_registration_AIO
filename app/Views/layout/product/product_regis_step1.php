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
    <title>Informasi Umum Produk - AIO</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="/product-asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/product-asset/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/product-asset/assets/css/themify-icons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        input.form-control:-webkit-autofill {
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7),
                0 0 0 30px white inset !important;
            /* White background for content */
            -webkit-text-fill-color: #000 !important;
            /* Default text color */
            border: 2px solid #00bfff;
            /* Blue border */
            transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out;
            /* Smooth transition */
        }

        input.form-control:-webkit-autofill:focus {
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7),
                0 0 0 30px white inset !important;
            /* White background for content */
            -webkit-text-fill-color: #000 !important;
            /* Default text color */
            border: 2px solid #00bfff;
            /* Blue border */
            transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out;
            /* Smooth transition */
        }

        /* For valid autofill (if manually validated with Bootstrap classes) */
        input.form-control:-webkit-autofill.form-control.valid {
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5),
                0 0 0 30px white inset !important;
            /* White background for content */
            -webkit-text-fill-color: #000 !important;
            /* Default text color */
            border: 2px solid rgba(0, 191, 255, 0.8);
            /* Blue border */
            border-color: #00bfff;
            transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out;
            /* Smooth transition */
        }

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
            background-color: #fff;
            color: #000;
            /* Menambahkan efek bayangan */
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="number"]:focus,
        input[type="video"]:focus {
            border: 2px solid #00bfff;
            /* Warna biru yang lebih tua saat input difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan yang lebih terang saat difokuskan */
        }

        select {
            border: 2px solid #00BFFF !important;
            color: #000;
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

        .select-css {
            border: 2px solid #00BFFF;
            border-radius: 5px;
            padding: 10px;
            outline: none;
            appearance: none;
            background-image: linear-gradient(to bottom, transparent, transparent),
                radial-gradient(farthest-side padding-box, #fff calc(1% + 2px), currentColor calc(99% - 2px));
            background-position: right 13px top 14px, right 18px top 16px;
            background-size: 10px auto, 12px auto;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            background-origin: padding-box;
            background-clip: content-box, border-box;
        }

        /* Styling focus state untuk dropdown select */
        .select-css:focus {
            border-color: #1E90FF;
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
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
                            <!-- <form action="" method=""> -->

                            <div class="wizard-header" style="text-align: center;weight: 7000;">
                                <div class="row" style=" height: 135px; align-content: center">
                                    <div class="col-sm-5 col-sm-offset-1 logo">
                                        <img src="<?= base_url('images/aio-new.png') ?>" style="max-height: 70px;">
                                    </div>
                                    <div class="col-sm-5 title">
                                        <h3 class=""
                                            style="font-weight: 700;margin-top: 25px;font-family: Poppins, sans-serif;">
                                            Form Registrasi Produk</h3>
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
                                            Informasi Umum
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#specification" data-toggle="tab" class="disabled-link">
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

                            <?php if (session()->getFlashdata('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="save-step1" method="post" style="margin-left: 25px; margin-right: 25px;">
                                <?= csrf_field() ?>
                                <div class="tab-content">
                                    <div class="tab-pane" id="general">
                                        <div class="row">
                                            <div class="col-sm-12" style="margin-bottom: 65px;">
                                            </div>
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="brand">Merek</label>
                                                    <select id="brand" name="brand_id" class="form-control select-css"
                                                        required>
                                                        <option disabled selected>Pilih Merek</option>
                                                        <?php foreach ($brands as $brand): ?>
                                                            <option value="<?= $brand['id'] ?>"
                                                                <?php
                                                                if (session()->get("step1"))
                                                                    $brand['id'] == $previousData['brand_id'] ? 'selected' : ''
                                                                ?>>
                                                                <?= esc($brand['name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="category">Kategori</label>
                                                    <select id="category" name="category_id"
                                                        class="form-control select-css" required>
                                                        <option disabled selected>Pilih Kategori</option>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option value="<?= $category['id'] ?>"
                                                                <?php
                                                                if (session()->get("step1"))
                                                                    $category['id'] == $previousData['category_id'] ? 'selected' : ''
                                                                ?>>
                                                                <?= esc($category['name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="subcategory">Subkategori</label>
                                                    <select id="subcategory" class="form-control select-css"
                                                        name="subcategory_id" disabled required>
                                                        <option value="" disabled selected>Pilih Subkategori</option>
                                                        <?php foreach ($subcategories as $subcategory): ?>
                                                            <option value="<?= $subcategory['id'] ?>">
                                                                <?= esc($subcategory['name']) ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="product_type">Tipe Produk</label>
                                                    <input type="text" id="product_type"
                                                        value="<?= session()->get("step1")["product_type"] ?? '' ?>"
                                                        class="form-control" name="product_type"
                                                        placeholder="Masukan Tipe Produk" pattern="^[a-zA-Z0-9\s]+$"
                                                        title="Only alphanumeric characters are allowed."
                                                        style="text-transform: uppercase;" required
                                                        oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')">
                                                </div>
                                            </div>


                                            <div id="capacity-group" class="col-sm-6" style="display:block;">
                                                <div class="form-group">
                                                    <label id="capacity-label">Kapasitas</label>
                                                    <select id="capacity" name="capacity_value"
                                                        class="form-control select-css" required>
                                                        <option value="" disabled selected>Pilih Kapasitas</option>
                                                        <!-- Options will be populated dynamically -->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group" id="warranty-compressor-group">
                                                    <label for="compressor_warranty" id="compressor-warranty-label">Garansi
                                                        Kompresor (Tahun)</label>
                                                    <div>
                                                        <select id="compressor_warranty" name="compressor_warranty_id"
                                                            class="form-control select-css" style="" required>
                                                            <option value="" disabled selected>Pilih Garansi Kompresor
                                                                (Tahun)</option>
                                                            <?php foreach ($compressor_warranties as $compressor_warranty): ?>
                                                                <option value="<?= $compressor_warranty['id'] ?>">
                                                                    <?= esc($compressor_warranty['value']) ?> Tahun</option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="color">Warna</label>
                                                    <input type="text" id="color" name="color"
                                                        value="<?= session()->get("step1")["color"] ?? '' ?>"
                                                        placeholder="Masukan Warna" class="form-control"
                                                        style="text-transform: uppercase;" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6" id="kapasitas-air-dingin" style="display:none;">
                                                <div class="form-group">

                                                    <label for="kapasitas_air_dingin"
                                                        id="kapasitas-air-dingin-label">Kapasitas Air Dingin (Liter)</label>
                                                    <input type="number" class="form-control" id="kapasitas_air_dingin"
                                                        name="kapasitas_air_dingin" placeholder="Kapasitas Air Dingin">

                                                </div>
                                            </div>
                                            <div class="col-sm-6" id="kapasitas-air-panas" style="display:none;">
                                                <div class="form-group">

                                                    <label for="kapasitas_air_panas" id="kapasitas-air-panas-label">Kapasitas Air Panas (Liter)</label>
                                                    <input type="number" class="form-control" id="kapasitas_air_panas"
                                                        name="kapasitas_air_panas" placeholder="Kapasitas Air Panas">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group" id="warranty-sparepart-group">
                                                    <label for="sparepart_warranty" id="sparepart-warranty-label">Garansi
                                                        Sparepart (Tahun)</label>
                                                    <div style="">
                                                        <select id="sparepart_warranty" class="form-control select-css"
                                                            name="sparepart_warranty_id" style="" required>
                                                            <option value="" disabled selected>Pilih Garansi (Tahun)
                                                            </option>
                                                            <?php foreach ($sparepart_warranties as $sparepart_warranty): ?>
                                                                <option value="<?= esc($sparepart_warranty['id']) ?>">
                                                                    <?= esc($sparepart_warranty['value']) ?> Tahun</option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>


                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">

                                        <input type='submit' class='btn btn-next btn-fill btn-danger btn-wd' name='next'
                                            value='Selanjutnya' />

                                    </div>

                                    <div class="pull-left">
                                        <div class="col">
                                            <p class="form-note" style="margin-left: 0px;margin-top: 8px;"><span
                                                    style="color: red;">*</span>Harap diisi dengan benar</p>
                                        </div>
                                        <div>
                                            <a href="/reset/reset-password" class='btn btn-fill btn-danger btn-wd'
                                                style="margin-top:10px">Ganti Password</a>
                                        </div>
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
        $('#category').on('change', function() {
            const categoryId = this.value;
            const subcategoryDropdown = document.getElementById('subcategory');

            // Clear the current options and disable the dropdown
            subcategoryDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';
            subcategoryDropdown.disabled = true; // Disable until we load new options

            fetch(`<?= base_url('get-subcategories') ?>/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    const subcategoryDropdown = document.getElementById('subcategory');
                    subcategoryDropdown.innerHTML = ''; // Clear existing options

                    // Check if any subcategories were fetched
                    if (data.length > 0) {
                        subcategoryDropdown.innerHTML = '<option value="" disabled selected>Pilih Subkategori</option>';
                        // Populate the dropdown with the fetched subcategories
                        data.forEach(subcategory => {
                            subcategoryDropdown.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                        });
                        subcategoryDropdown.disabled = false;

                        // If the previous session value matches one of the subcategories, select it
                        const previousSubcategoryId = `<?= session()->get("step1")["subcategory_id"] ?? null ?>`;
                        if (previousSubcategoryId && data.some(subcategory => subcategory.id == previousSubcategoryId)) {
                            $('#subcategory').val(previousSubcategoryId).change();
                        } else {
                            // Reset to placeholder if no match
                            subcategoryDropdown.innerHTML = '<option value="" disabled selected>Pilih Subkategori</option>';
                            data.forEach(subcategory => {
                                subcategoryDropdown.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                            });
                            subcategoryDropdown.disabled = false;
                        }
                    } else {
                        // If no subcategories, show the placeholder
                        subcategoryDropdown.innerHTML = '<option value="" disabled selected>Pilih Subkategori</option>';
                        subcategoryDropdown.disabled = true; // Disable dropdown if no subcategories are available
                    }
                })
                .catch(error => {
                    console.error('Error fetching subcategories:', error);
                });
        });

        $('#subcategory').on('change', function() {
            const subcategoryId = $('#subcategory').val();
            const categoryId = document.getElementById('category').value;

            handleSparepartWarranty(subcategoryId);
            handleCapacityGroup(subcategoryId);
            updateWarrantyAndCapacityLabels();

            let type = '';
            if (categoryId === '9') {
                type = 'garansi_panel';
            } else if (categoryId === '6') {
                type = 'garansi_motor';
            } else if (subcategoryId == '31' || subcategoryId == '43' || subcategoryId == '45' || subcategoryId == '46' || subcategoryId ==
                '47' || subcategoryId == '48' || subcategoryId == '50' || subcategoryId == '51' || subcategoryId ==
                '52' || subcategoryId == '54' || subcategoryId == '64' || subcategoryId == '65' || subcategoryId ==
                '68' || subcategoryId == '69' || subcategoryId == '73' || subcategoryId == '74') {
                type = 'garansi_semua_service';
            } else if (subcategoryId === '32' || subcategoryId == '49' || subcategoryId == '53' || subcategoryId == '62' || subcategoryId == '67' || subcategoryId == '70') {
                type = 'garansi_motor';
            } else if (subcategoryId === '35' || subcategoryId === '36') {
                type = 'garansi_kompresor';
            } else if (subcategoryId == '33' || subcategoryId == '34' || subcategoryId == '37' || subcategoryId ==
                '38' || subcategoryId == '41' || subcategoryId == '42' || subcategoryId == '44' ||
                subcategoryId == '63' || subcategoryId == '66' || subcategoryId == '71' || subcategoryId == '72' ||
                subcategoryId == '75' || subcategoryId == '76') {
                type = 'garansi_elemen_panas';
            } else {
                type = 'garansi_kompresor'; // Default type if no conditions match
            }
            fetchWarrantyOptions(type);
            fetchOptions(subcategoryId);

        });

        if (`<?= isset(session()->get("step1")["category_id"]) ?>`) {
            $('#brand').val(`<?= session()->get("step1")["brand_id"] ?? null ?>`).change()
            $('#category').val(`<?= session()->get("step1")["category_id"] ?? null ?>`).change()
            $('#sparepart_warranty').val(`<?= session()->get("step1")["sparepart_warranty_id"] ?? null ?>`).change()
        }
    });

    function fetchWarrantyOptions(type) {
        fetch(`<?= base_url('fetch-warranty-options') ?>?type=${type}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log('API Response:', data); // Debug: Check what the API returns

                const warrantyDropdown = document.getElementById('compressor_warranty');

                // Ensure that the data is an array and has the expected format
                if (Array.isArray(data)) {
                    data.forEach(warranty => {
                        // Use optional chaining and default values for robustness
                        const id = warranty.id ?? '';
                        const name = warranty.value ?? 'Unnamed Warranty';
                        warrantyDropdown.innerHTML += `<option value="${id}">${name} Tahun</option>`;
                    });
                    if (type == 'ukuran') {
                        url = `<?= base_url('get-ukuran-tv') ?>/${subcategoryId}`;
                        capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Ukuran</option>'; // Clear existing options
                    } else if (type == 'kapasitas') {
                        url = `<?= base_url('get-capacities') ?>/${subcategoryId}`;
                        capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Kapasitas</option>'; // Clear existing options
                    }
                } else {
                    console.error('Unexpected data format:', data);
                    alert('Failed to load warranty options. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error fetching warranty options:', error);
                alert('An error occurred while fetching warranty options. Please try again later.');
            });
    }


    // Fetch warranty and capacity options using the determined type
    // fetchWarrantyOptions(type);

    function updateWarrantyAndCapacityLabels() {
        const categoryId = document.getElementById('category').value;
        const subcategoryId = document.getElementById('subcategory').value;
        const compressorWarrantyLabel = document.getElementById('compressor-warranty-label');
        const sparepartWarrantyLabel = document.getElementById('sparepart-warranty-label');
        const airdinginLabel = document.getElementById('kapasitas-air-dingin-label');
        const airpanasLabel = document.getElementById('kapasitas-air-panas-label');
        const airdinginSatuan = document.getElementById('air-dingin-satuan');
        const capacityLabel = document.getElementById('capacity-label');
        const airdinginField = document.getElementById('kapasitas_air_dingin');
        const airpanasField = document.getElementById('kapasitas_air_panas');
        const warrantyDropdown = document.getElementById('compressor_warranty');
        const sparepartwarrantyDropdown = document.getElementById('sparepart_warranty');
        // Update compressor warranty field based on category
        if (categoryId === '9') { // Category is for Garansi Panel
            const previousValue = `<?= session()->get("step1")["garansi_panel_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_panel_value) ?? '' ?>`;

            compressorWarrantyLabel.innerText = 'Garansi Panel (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block';

            // Change the name attribute to 'garansi_panel_id'
            warrantyDropdown.setAttribute('name', 'garansi_panel_id');

            // Set the dropdown options
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Panel</option>';

            // Set the value from the session if available
            if (previousValue) {
                // Ensure the dropdown has the value as an option
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_panel_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (categoryId == '6' || subcategoryId == '49' || subcategoryId == '53' || subcategoryId == '62') {
            const previousValue = `<?= session()->get("step1")["garansi_motor_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_motor_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Motor (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block';
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name to garansi_motor_id
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Motor</option>';
            if (previousValue) {
                // Ensure the dropdown has the value as an option
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_motor_id"]) ?>`) {
                    // Set the selected value
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '31') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_semua_service_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_semua_service_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Semua Service (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Semua Service</option>'
            // Ensure the dropdown has the value as an option
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                // Set the selected value
                if (`<?= isset(session()->get("step1")["garansi_semua_service_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '32' || subcategoryId == '67' || subcategoryId == '70') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_motor_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_motor_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Motor (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Motor</option>';
            // Ensure the dropdown has the value as an option
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_motor_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '35' || subcategoryId == '36') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["compressor_warranty_id"] ?? '' ?>`;
            const previousName = `<?= esc($compressor_warranty_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Kompresor (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Kompresor</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["compressor_warranty_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '33' || subcategoryId == '63' || subcategoryId == '34' || subcategoryId == '37' || subcategoryId == '38' || subcategoryId == '41' || subcategoryId == '44' || subcategoryId == '71' || subcategoryId == '72' || subcategoryId == '76') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_elemen_panas_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_elemen_panas_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Elemen Panas (Tahun)';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Elemen Panas</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_elemen_panas_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '42' || subcategoryId == '66' || subcategoryId == '75') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_elemen_panas_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_elemen_panas_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Elemen Panas (Tahun)';
            sparepartWarrantyLabel.innerText = 'Garansi Service (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display =
                'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name',
                'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Elemen Panas</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_elemen_panas_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '43' || subcategoryId == '45' || subcategoryId == '46' || subcategoryId == '50' ||
            subcategoryId == '51' || subcategoryId == '54' || subcategoryId == '64' || subcategoryId == '65' || subcategoryId == '68' || subcategoryId == '69' || subcategoryId == '73' || subcategoryId == '74') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_semua_service_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_semua_service_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Jasa Service (Tahun)';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Service</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_semua_service_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '47') {
            const previousValue = `<?= session()->get("step1")["garansi_semua_service_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_semua_service_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Motor (Tahun)';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Motor</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_semua_service_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '48') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_elemen_panas_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_elemen_panas_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Elemen Panas (Tahun)';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name',
                'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Elemen Panas</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_elemen_panas_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else if (subcategoryId == '52') { // Check for subcategory id 31
            const previousValue = `<?= session()->get("step1")["garansi_semua_service_id"] ?? '' ?>`;
            const previousName = `<?= esc($garansi_semua_service_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service (Tahun)';
            document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
            document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Sparepart & Jasa Service</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["garansi_semua_service_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        } else {
            const previousValue = `<?= session()->get("step1")["compressor_warranty_id"] ?? '' ?>`;
            const previousName = `<?= esc($compressor_warranty_value) ?? '' ?>`;
            compressorWarrantyLabel.innerText = 'Garansi Kompresor';
            sparepartWarrantyLabel.innerText = 'Garansi Sparepart';
            document.getElementById('warranty-sparepart-group').style.display = 'block'; // Ensure the group is visible
            document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name back to compressor_warranty_id
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Kompresor</option>';
            if (previousValue) {
                if (!Array.from(warrantyDropdown.options).some(option => option.value === previousValue)) {
                    const option = document.createElement('option');
                    option.value = previousValue;
                    option.text = `${previousName} Tahun`;
                    warrantyDropdown.appendChild(option); // Append the option to the dropdown
                }
                if (`<?= isset(session()->get("step1")["compressor_warranty_id"]) ?>`) {
                    warrantyDropdown.innerHTML = `<option value="${previousValue}" selected>${previousName} Tahun</option>`;
                }
            }
        }

        // Change capacity to ukuran_size if category is TV
        if (categoryId === '9' || subcategoryId == '31' || subcategoryId == '32' || subcategoryId == '47' || subcategoryId == '51') {
            capacityLabel.innerText = 'Ukuran'; // You may want to handle each subcategory separately for clarity
            document.getElementById('capacity').setAttribute('name', 'ukuran_id'); // Change name of the select element
            fetchOptions('ukuran', subcategoryId);
        } else if (subcategoryId == '78') {
            capacityLabel.innerText = 'Kapasitas Baterai'; // You may want to handle each subcategory separately for clarity
            document.getElementById('capacity').setAttribute('name', 'capacity_id'); // Change name of the select element
            fetchOptions('kapasitas', subcategoryId);
        } else {
            capacityLabel.innerText = 'Kapasitas';
            document.getElementById('capacity').setAttribute('name', 'capacity_id'); // Change back if not TV
            fetchOptions('kapasitas', subcategoryId);
        }

        function handleCategoryChange(categoryId, subcategoryId) {
            // Check if the category is "TV" to fetch options for Ukuran TV
            if (categoryId == '9' || subcategoryId == '31' || subcategoryId == '32' || subcategoryId == '47' || subcategoryId == '51') {
                showCapacityField(true); // Show dropdown for capacity
            } else if (subcategoryId == '42' || subcategoryId == '52' || subcategoryId == '35' || subcategoryId == '36' || subcategoryId == '66' || subcategoryId == '67' || subcategoryId == '70' || subcategoryId == '73' || subcategoryId == '74') {
                hideCapacityField(); // Hide dropdown for capacity
            } else {
                showCapacityField(false); // Show dropdown for capacity
            }

        }
        if (subcategoryId == 35 || subcategoryId == 36) {
            // Hide "kapasitas" and "garansi sparepart"
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'none';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'block';
            document.getElementById('kapasitas-air-panas').style.display = 'block';
            compressorWarrantyLabel.innerText = 'Garansi Kompresor (Tahun)';
            airdinginLabel.innerText = 'Kapasitas Air Dingin (Liter)';
            airdinginField.placeholder = 'Kapasitas Air Dingin (Liter)';
            airpanasLabel.innerText = 'Kapasitas Air Panas (Liter)';
            airpanasField.placeholder = 'Kapasitas Air Panas (Liter)';

        }  if (subcategoryId == 67 || subcategoryId == 70) {
            // Hide "kapasitas" and "garansi sparepart"
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'none';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'none';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
            compressorWarrantyLabel.innerText = 'Garansi Motor (Tahun)';

        } else if (subcategoryId == 78) {
            // Hide "kapasitas" and "garansi sparepart"
            document.getElementById('capacity-group').style.display = 'block';
            document.getElementById('warranty-sparepart-group').style.display = 'none';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'block';
            document.getElementById('kapasitas-air-panas').style.display = 'block';
            compressorWarrantyLabel.innerText = 'Garansi Sparepart (Tahun)';
            warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Sparepart</option>';
            airdinginLabel.innerText = 'Kecepatan Maksimal (Km/Jam)';
            airdinginField.placeholder = 'Kecepatan Maksimal (Km/Jam)';
            airpanasLabel.innerText = 'Jarak Tempuh (km)';
            airpanasField.placeholder = 'Jarak Tempuh (km)';
        } else if (subcategoryId == 42 || subcategoryId == 66) {
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'block';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'none';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
            compressorWarrantyLabel.innerText = 'Garansi Elemen Panas (Tahun)';

        }   else if (subcategoryId == 73 || subcategoryId == 74) {
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'block';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'none';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
            compressorWarrantyLabel.innerText = 'Garansi Jasa Service (Tahun)';

        } else if (subcategoryId == 52) {
            document.getElementById('capacity-group').style.display = 'none';
            document.getElementById('warranty-sparepart-group').style.display = 'none';

            // Show "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'block';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
            compressorWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service (Tahun)';
            airdinginLabel.innerText = 'Kapasitas (M²)';
            airdinginField.placeholder = 'Kapasitas (M²)';
        } else {
            // Show "kapasitas" and "garansi sparepart" for other subcategories
            document.getElementById('capacity-group').style.display = 'block';

            // Hide "kapasitas air dingin" and "kapasitas air panas"
            document.getElementById('kapasitas-air-dingin').style.display = 'none';
            document.getElementById('kapasitas-air-panas').style.display = 'none';
            airdinginLabel.innerText = 'Kapasitas Air Dingin (Liter)';
            airdinginField.placeholder = 'Kapasitas Air Dingin (Liter)';
        }
    };

    function handleSparepartWarranty(subcategoryId) {
        const sparepartWarrantyGroup = document.getElementById('warranty-sparepart-group');
        const sparepartWarrantyField = document.getElementById('sparepart_warranty');

        if ([31, 32, 35, 36, 67, 70, 78].includes(Number(subcategoryId))) {
            sparepartWarrantyGroup.style.display = 'none';
            sparepartWarrantyField.removeAttribute('required');
        } else {
            sparepartWarrantyGroup.style.display = 'block';
            sparepartWarrantyField.setAttribute('required', 'required');
        }
    }

    function handleCapacityGroup(subcategoryId) {
        const capacityGroup = document.getElementById('capacity-group');
        const capacityField = document.getElementById('capacity');

        if ([35, 36].includes(Number(subcategoryId))) {
            capacityGroup.style.display = 'none';
            capacityField.removeAttribute('required');
        } else {
            capacityGroup.style.display = 'block';
            capacityField.setAttribute('required', 'required');
        }
    }

    // Function to show capacity field with dropdown
    // Function to show capacity field with dropdown and update the label based on category/subcategory
    function showCapacityField(isUkuran = false) {
        const capacityGroup = document.getElementById('capacity-group');
        const label = isUkuran ? 'Ukuran' : 'Kapasitas'; // Use 'Ukuran' if isUkuran is true, else 'Kapasitas'

        capacityGroup.style.display = 'block'; // Ensure capacity group is visible
        capacityGroup.innerHTML = `
        <label id="capacity-label">${label}</label>
        <select id="capacity" name="${isUkuran ? 'ukuran_id' : 'capacity_id'}" required>
            <option value="" disabled selected>Pilih ${label}</option>
            <!-- Options will be loaded dynamically -->
        </select>`;
    }

    // Function to hide capacity field
    function hideCapacityField() {
        const capacityGroup = document.getElementById('capacity-group');
        capacityGroup.style.display = 'none';
    }

    // Function to fetch options (Ukuran TV or Kapasitas) via AJAX
    function fetchOptions(type, subcategoryId) {
        let url;
        const capacityDropdown = document.getElementById('capacity'); // Select the <select> element directly

        // Determine the URL and placeholder based on type
        if (type == 'ukuran') {
            url = `<?= base_url('get-ukuran-tv') ?>/${subcategoryId}`;
            capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Ukuran</option>'; // Clear existing options
        } else if (type == 'kapasitas') {
            url = `<?= base_url('get-capacities') ?>/${subcategoryId}`;
            capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Kapasitas</option>'; // Clear existing options
        } else {
            console.error('Invalid type specified for fetching options.');
            return; // Exit if the type is invalid
        }

        // Fetch data
        if (subcategoryId)
            fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data)) {
                    data.forEach(item => {
                        // Determine the correct value and display text based on the type
                        if (type == 'ukuran') {
                            capacityDropdown.innerHTML += `<option value="${item.id}">${item.size}</option>`;
                        } else if (type == 'kapasitas') {
                            capacityDropdown.innerHTML += `<option value="${item.id}">${item.value}</option>`;
                        }
                    });
                    if (type == 'ukuran') {
                        const previousUkuranId = `<?= session()->get("step1")["ukuran_id"] ?? null ?>`;
                        const ukuranDropdown = $('#capacity'); // Assuming this dropdown is for 'ukuran'

                        // Check if there's any previous value and if it matches an option in the dropdown
                        if (`<?= isset(session()->get("step1")["category_id"]) ?>` && previousUkuranId) {
                            // Check if the previous value exists in the dropdown options
                            if ($('#capacity option[value="' + previousUkuranId + '"]').length > 0) {
                                ukuranDropdown.val(previousUkuranId).change(); // Set the value if valid
                            } else {
                                // Reset to placeholder if no match
                                ukuranDropdown.val('').change(); // Reset to empty (placeholder)
                            }
                        } else {
                            // Set to placeholder if no session data
                            ukuranDropdown.val('').change(); // Reset to empty (placeholder)
                        }
                    } else if (type == 'kapasitas') {
                        const previousKapasitasId = `<?= session()->get("step1")["capacity_id"] ?? null ?>`;
                        const kapasitasDropdown = $('#capacity'); // Assuming this dropdown is for 'kapasitas'

                        // Check if there's any previous value and if it matches an option in the dropdown
                        if (`<?= isset(session()->get("step1")["category_id"]) ?>` && previousKapasitasId) {
                            // Check if the previous value exists in the dropdown options
                            if ($('#capacity option[value="' + previousKapasitasId + '"]').length > 0) {
                                kapasitasDropdown.val(previousKapasitasId).change(); // Set the value if valid
                            } else {
                                // Reset to placeholder if no match
                                kapasitasDropdown.val('').change(); // Reset to empty (placeholder)
                            }
                        } else {
                            // Set to placeholder if no session data
                            kapasitasDropdown.val('').change(); // Reset to empty (placeholder)
                        }
                    }
                } else {
                    console.error('Data format is not as expected:', data);
                    alert('Failed to load options. Please try again.');
                }
            })
            .catch(error => {
                console.error(`Error fetching ${type} options:`, error);
                alert(`An error occurred while fetching ${type} options. Please try again later.`);
            });
    }

    const productTypeInput = document.getElementById('product_type');
    const errorMessage = document.getElementById('error-message');
    const form = document.getElementById('productForm');

    // Replace forbidden characters and enforce uppercase
    productTypeInput.addEventListener('input', function() {
        this.value = this.value.replace(/[-/]/g, '').toUpperCase();
    });
</script>


</html>
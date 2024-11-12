<!doctype html>
<html lang="en">
<?= $this->include('partials/headbar') ?>
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
        input[type="text"], input[type="file"], input[type="video"] {
            border: 2px solid #00BFFF; /* Warna biru */
            border-radius: 5px; /* Membuat sudut sedikit melengkung */
            padding: 10px; /* Menambahkan jarak di dalam input */
            outline: none; /* Menghilangkan outline default */
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5); /* Menambahkan efek bayangan */
        }

        input[type="text"]:focus, input[type="file"]:focus, input[type="video"]:focus {
            border-color: #1E90FF; /* Warna biru yang lebih tua saat input difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7); /* Bayangan yang lebih terang saat difokuskan */
        }

        select {
            border: 2px solid #00BFFF !important; /* Warna biru */
            border-radius: 5px;
            padding: 10px;
            padding-right: 40px; /* Tambahkan jarak untuk icon custom */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5); /* Menambahkan efek bayangan */
            appearance: none; /* Menghilangkan default arrow */
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140 140"><polygon points="70,100 100,40 40,40" style="fill:%2300BFFF"/></svg>') no-repeat right 10px center !important;
            background-color: white; /* Warna latar belakang */
            background-size: 20px; /* Ukuran icon */
            cursor: pointer;
        }

        select:focus {
            border-color: #1E90FF; /* Warna biru yang lebih tua saat difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7); /* Bayangan lebih terang */
        }

        .logo{
            justify-content: flex-start;
            display: flex;
        }

        .title{
            justify-content: end;
            align-items: center;
            display: flex;
        }

        @media (max-width: 600px) {
            .logo, .title {
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
                                            </div
                                            Dimensi Produk
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
                                            Foto Produk                                         </a>
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
                            <div class="tab-content">
                                <div class="tab-pane" id="general">
                                    <div class="row">
                                        <div class="col-sm-12"  style="margin-bottom: 65px;">
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
                                        <div id="capacity-group" class="col-sm-6" style="display:block;">
                                            <div class="form-group">
                                                <label id="capacity-label">Kapasitas</label>
                                                <select id="capacity" name="capacity_value"  class="form-control"required>
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
                                                    <label for="kapasitas_air_dingin" style="">Kapasitas Air Dingin (Liter)</label>
                                                    <input type="text" class="form-control" id="kapasitas_air_dingin" name="kapasitas_air_dingin" style=""  placeholder="Kapasitas Air Dingin">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6" id="kapasitas-air-panas" style="display:none;">
                                            <div class="form-group">
                                                <div style="">
                                                    <label for="kapasitas_air_panas" style="">Kapasitas Air Panas (Liter)</label>
                                                    <input type="text" class="form-control" id="kapasitas_air_panas" name="kapasitas_air_panas" style="" placeholder="Kapasitas Air Panas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="type">
                                    <h5 class="info-text">What type of location do you have? </h5>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Design">
                                                    <div class="card card-checkboxes card-hover-effect">
                                                        <i class="ti-home"></i>
                                                        <p>Home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Design">
                                                    <div class="card card-checkboxes card-hover-effect">
                                                        <i class="ti-package"></i>
                                                        <p>Apartment</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="facilities">
                                    <h5 class="info-text">Tell us more about facilities. </h5>
                                    <div class="row">
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Your place is good for</label>
                                                <select class="form-control">
                                                    <option disabled="" selected="">- type -</option>
                                                    <option>Business</option>
                                                    <option>Vacation </option>
                                                    <option>Work</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Is air conditioning included ?</label>
                                                <select class="form-control">
                                                    <option disabled="" selected="">- response -</option>
                                                    <option>Yes</option>
                                                    <option>No </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Does your place have wi-fi?</label>
                                                <select class="form-control">
                                                    <option disabled="" selected="">- response -</option>
                                                    <option>Yes</option>
                                                    <option>No </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Is breakfast included?</label>
                                                <select class="form-control">
                                                    <option disabled="" selected="">- response -</option>
                                                    <option>Yes</option>
                                                    <option>No </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="description">
                                    <div class="row">
                                        <h5 class="info-text"> Drop us a small description. </h5>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Place description</label>
                                                <textarea class="form-control" placeholder="" rows="9"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Example</label>
                                                <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="confirmation">
                                    <div class="row">
                                        <h5 class="info-text"> Drop us a small Confirmation. </h5>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Place description</label>
                                                <textarea class="form-control" placeholder="" rows="9"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Example</label>
                                                <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
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
document.getElementById('category').addEventListener('change', function() {
    const categoryId = this.value;
    const subcategoryDropdown = document.getElementById('subcategory');

    // Clear the current options and disable the dropdown
    subcategoryDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';
    subcategoryDropdown.disabled = true; // Disable until we load new options

    // Fetch subcategories via AJAX
    fetch(`<?= base_url('get-subcategories') ?>/${categoryId}`)
    .then(response => {
        console.log('Response:', response); // Log the response object
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
        .then(data => {
            console.log('Data:', data);
            subcategoryDropdown.innerHTML = '<option value="" disabled selected>Select Subcategory</option>';
            if (data.length > 0) {
                data.forEach(subcategory => {
                    subcategoryDropdown.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                });
                subcategoryDropdown.disabled = false; // Enable dropdown after loading options
            } else {
                subcategoryDropdown.innerHTML = '<option value="" disabled selected>No Subcategories Available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching subcategories:', error);
        });
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
            } else {
                console.error('Unexpected data format:', data);
            }
        })
        .catch(error => {
            console.error('Error fetching warranty options:', error);
            alert('An error occurred while fetching warranty options. Please try again later.');
        });
}


        document.getElementById('subcategory').addEventListener('change', function() {
    const subcategoryId = this.value;
    const categoryId = document.getElementById('category').value;

    handleSparepartWarranty(subcategoryId);
    handleCapacityGroup(subcategoryId);
    updateWarrantyAndCapacityLabels();

            let type = '';
    if (categoryId === '9') {
        type = 'garansi_panel';
    } else if (categoryId === '6') {
        type = 'garansi_motor';
    } else if (subcategoryId === '31') {
        type = 'garansi_semua_service';
    } else if (subcategoryId === '32') {
        type = 'garansi_motor';
    } else if (subcategoryId === '35' || subcategoryId === '36') {
        type = 'garansi_kompresor';
    } else if (subcategoryId === '33' || subcategoryId === '34' || subcategoryId === '37' || subcategoryId === '38' || subcategoryId === '41') {
        type = 'garansi_elemen_panas';
    } else {
        type = 'garansi_kompresor'; // Default type if no conditions match
    }
    fetchWarrantyOptions(type);
    fetchOptions(subcategoryId);

        });



    // Fetch warranty and capacity options using the determined type
    fetchWarrantyOptions(type);
        function updateWarrantyAndCapacityLabels() {
            const categoryId = document.getElementById('category').value;
    const subcategoryId = document.getElementById('subcategory').value;
    const compressorWarrantyLabel = document.getElementById('compressor-warranty-label');
    const capacityLabel = document.getElementById('capacity-label');
    const warrantyDropdown = document.getElementById('compressor_warranty');
    // Update compressor warranty field based on category
    if (categoryId === '9') { // Category is for Garansi Panel
        compressorWarrantyLabel.innerText = 'Garansi Panel';
        document.getElementById('warranty-sparepart-group').style.display = 'block';
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_panel_id'); // Change name to garansi_panel_id
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Panel</option>';
    } else if (categoryId === '6') {
        compressorWarrantyLabel.innerText = 'Garansi Motor';
        document.getElementById('warranty-sparepart-group').style.display = 'block';
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name to garansi_motor_id
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Motor</option>';
    } else if (subcategoryId == '31') { // Check for subcategory id 31
        compressorWarrantyLabel.innerText = 'Garansi Semua Service';
        document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_semua_service_id'); // Change name for Garansi Semua Service
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Semua Service</option>';
    } else if (subcategoryId == '32') { // Check for subcategory id 31
        compressorWarrantyLabel.innerText = 'Garansi Motor';
        document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_motor_id'); // Change name for Garansi Semua Service
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Motor</option>';
    } else if (subcategoryId == '35' || subcategoryId == '36') { // Check for subcategory id 31
        compressorWarrantyLabel.innerText = 'Garansi Kompresor';
        document.getElementById('warranty-sparepart-group').style.display = 'none'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name for Garansi Semua Service
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Kompresor</option>';
    } else if (subcategoryId == '33' ||subcategoryId == '34' ||subcategoryId == '37' ||subcategoryId == '38' || subcategoryId == '41') { // Check for subcategory id 31
        compressorWarrantyLabel.innerText = 'Garansi Elemen Panas';
        sparepartWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service';
        document.getElementById('warranty-sparepart-group').style.display = 'block'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Elemen Panas</option>';
    } else {
        compressorWarrantyLabel.innerText = 'Garansi Kompresor';
        document.getElementById('warranty-sparepart-group').style.display = 'block'; // Ensure the group is visible
        document.getElementById('compressor_warranty').setAttribute('name', 'compressor_warranty_id'); // Change name back to compressor_warranty_id
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Kompresor</option>';
    }

    // Change capacity to ukuran_size if category is TV
    if (categoryId === '9' || subcategoryId == '31' || subcategoryId == '32') {
    capacityLabel.innerText = 'Ukuran'; // You may want to handle each subcategory separately for clarity
    document.getElementById('capacity').setAttribute('name', 'ukuran_id'); // Change name of the select element
    fetchOptions('ukuran', subcategoryId);
} else {
    capacityLabel.innerText = 'Kapasitas';
    document.getElementById('capacity').setAttribute('name', 'capacity_id'); // Change back if not TV
    fetchOptions('kapasitas', subcategoryId);

}

function handleCategoryChange(categoryId, subcategoryId) {
    // Check if the category is "TV" to fetch options for Ukuran TV
    if (categoryId === '9') {
    showCapacityField(true); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_panel'); // Fetch panel warranty options
} else if (categoryId === '6') {
    showCapacityField(false); // Show dropdown for capacity 
    fetchWarrantyOptions('garansi_motor'); // Fetch Garansi Motor options
} else if (subcategoryId == '31') {
    showCapacityField(true); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_semua_service'); // Fetch Garansi Semua Service options
} else if (subcategoryId == '32') {
    showCapacityField(true); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_motor'); // Fetch Garansi Motor options
} else if (subcategoryId == '35' || subcategoryId == '36') {
    hideCapacityField(); // Hide dropdown for capacity
    fetchWarrantyOptions('garansi_kompresor'); // Fetch Compressor Warranty options
} else if (subcategoryId == '33' ||subcategoryId == '34' ||subcategoryId == '37' || subcategoryId == '38' || subcategoryId == '41') {
    showCapacityField(false); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_elemen_panas'); // Fetch Garansi Elemen Panas options
} else if (subcategoryId == '42') {
    hideCapacityField(); // Hide dropdown for capacity
    fetchWarrantyOptions('garansi_elemen_panas'); // Fetch Compressor Warranty options
} else if (subcategoryId == '43') {
    showCapacityField(false); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_elemen_panas'); // Fetch Garansi Elemen Panas options
} else {
    showCapacityField(false); // Show dropdown for capacity
    fetchWarrantyOptions('garansi_kompresor'); // Fetch Compressor Warranty options
}
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
};

document.getElementById('product_type').addEventListener('input', function() {
    // Replace any instance of '-' or '/' with an empty string and make it uppercase
    this.value = this.value.replace(/[-/]/g, '').toUpperCase();
});

function handleSparepartWarranty(subcategoryId) {
        const sparepartWarrantyGroup = document.getElementById('warranty-sparepart-group');
        const sparepartWarrantyField = document.getElementById('sparepart_warranty');

        if ([31, 32, 35, 36].includes(Number(subcategoryId))) {
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
            <option value="" disabled selected>Select ${label}</option>
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
    if (type === 'ukuran') {
        url = `<?= base_url('get-ukuran-tv') ?>/${subcategoryId}`;
        capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Ukuran</option>'; // Clear existing options
    } else if (type === 'kapasitas') {
        url = `<?= base_url('get-capacities') ?>/${subcategoryId}`;
        capacityDropdown.innerHTML = '<option value="" disabled selected>Select Kapasitas</option>'; // Clear existing options
    } else {
        console.error('Invalid type specified for fetching options.');
        return; // Exit if the type is invalid
    }

    // Fetch data
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
                if (type === 'ukuran') {
                    capacityDropdown.innerHTML += `<option value="${item.id}">${item.size}</option>`;
                } else if (type === 'kapasitas') {
                    capacityDropdown.innerHTML += `<option value="${item.id}">${item.value}</option>`;
                }
            });
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

    </script>
</body>
</html>

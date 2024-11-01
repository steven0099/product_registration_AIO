<?php
// Check if the session is not already started
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set session data
    $session = \Config\Services::session();
    $session->set('step1', $_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration Form - Step 1</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <img src="<?= base_url('images/logo.png') ?>" alt="AIO Logo" class="logo">
            <h2>Form Registrasi Produk</h2>
        </div>
        <div class="progress-bar" style="width:90%">
            <span class="active">General Data</span>
            <span>Spesifikasi Produk</span>
            <span>Keunggulan Produk</span>
            <span>Foto Produk</span>
            <span>Konfirmasi Produk</span>
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

            <!-- Brand Dropdown -->
            <div class="form-group">
                <label for="brand">Merek</label>
                <select id="brand" name="brand_id" required>
                    <option value="" disabled selected>Masukan Merek</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value="<?= $brand['id'] ?>"><?= esc($brand['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Category Dropdown -->
            <div class="form-group">
                <label for="category">Kategori</label>
                <select id="category" name="category_id" required>
                    <option value="" disabled selected>Masukan Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Subcategory Dropdown -->
            <div class="form-group">
            <label for="subcategory">Subkategori</label>
            <select id="subcategory" name="subcategory_id" disabled required>
            <option value="" disabled selected>Pilih Subkategori</option>
                    <option value="" disabled selected>Pilih Subkategori</option>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= $subcategory['id'] ?>"><?= esc($subcategory['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
            <label for="product_type">Tipe Produk</label>
            <input type="text" id="product_type" name="product_type" placeholder="Masukan Tipe Produk" style="text-transform: uppercase;" required>
            <small id="error-message" style="color: red; display: none;">Product type cannot contain '-' or '/'</small>
        </div>

            <!-- Capacity / Ukuran -->
            <div class="form-group" id="capacity-group" style="display:block;">
                <label id="capacity-label">Kapasitas</label>
                <select id="capacity" name="capacity_value" required>
                    <option value="" disabled selected>Pilih Kapasitas</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <!-- Garansi Kompresor / Garansi Panel -->
            <div class="form-group" id="warranty-compressor-group">
                <label for="compressor_warranty" id="compressor-warranty-label">Garansi Kompresor</label>
                <div style="display: flex; align-items: center;">
                <select id="compressor_warranty" name="compressor_warranty_id" style="flex-grow: 1;" required>
                    <option value="" disabled selected>Pilih Garansi Kompresor</option>
                    <?php foreach ($compressor_warranties as $compressor_warranty): ?>
                        <option value="<?= $compressor_warranty['id'] ?>"><?= esc($compressor_warranty['value']) ?></option>
                    <?php endforeach; ?>
                </select>
                <span style="margin-left: 10px;">Tahun</span>
                </div>
            </div>

            <div class="form-group">
                <label for="color">Warna</label>
                <input type="text" id="color" name="color" placeholder="Masukan Warna" style="text-transform: uppercase;" required>
            </div>

            <!-- Garansi Sparepart -->
            <div class="form-group" id="warranty-sparepart-group">
    <label for="sparepart_warranty" id="sparepart-warranty-label">Garansi Sparepart</label>
    <div style="display: flex; align-items: center;">
        <select id="sparepart_warranty" name="sparepart_warranty_id" style="flex-grow: 1;" required>
            <option value="" disabled selected>Pilih Garansi Sparepart</option>
            <?php foreach ($sparepart_warranties as $sparepart_warranty): ?>
                <option value="<?= esc($sparepart_warranty['id']) ?>"><?= esc($sparepart_warranty['value']) ?></option>
            <?php endforeach; ?>
        </select>
        <span style="margin-left: 10px;">Tahun</span>
    </div>
</div>

            <div class="form-group" id="kapasitas-air-dingin" style="display:none;">
            <div style="display: flex; align-items: center;">
    <label for="kapasitas_air_dingin" style="margin-right: 10px;">Kapasitas Air Dingin</label>
    <input type="text" class="form-control" id="kapasitas_air_dingin" name="kapasitas_air_dingin" style="flex-grow: 1;"  placeholder="Kapasitas Air Dingin">
    <span style="margin-left: 10px;">Liter</span>
</div>
</div>

<div class="form-group" id="kapasitas-air-panas" style="display:none;">
<div style="display: flex; align-items: center;">
    <label for="kapasitas_air_panas" style="margin-right: 10px;">Kapasitas Air Panas</label>
    <input type="text" class="form-control" id="kapasitas_air_panas" name="kapasitas_air_panas" style="flex-grow: 1;" placeholder="Kapasitas Air Panas">
    <span style="margin-left: 10px;">Liter</span>
</div>
</div>

            <button type="submit" class="submit-btn">Selanjutnya</button>
        </form>
        <p class="form-note">*Harap diisi dengan benar</p>
    </div>

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
            subcategoryDropdown.innerHTML = '<option value="" disabled selected>Pilih Subkategori</option>';
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
                    warrantyDropdown.innerHTML += `<option value="${id}">${name}</option>`;
                });
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
    } else if (subcategoryId === '37' || subcategoryId === '38') {
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
    const sparepartWarrantyLabel = document.getElementById('sparepart-warranty-label');
    const capacityLabel = document.getElementById('capacity-label');
    const warrantyDropdown = document.getElementById('compressor_warranty');
    const sparepartwarrantyDropdown = document.getElementById('sparepart_warranty');
    // Update compressor warranty field based on category
    if (categoryId === '9') { // Category is for Garansi Panel
        compressorWarrantyLabel.innerText = 'Garansi Panel';
        document.getElementById('warranty-sparepart-group').style.display = 'flex';
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_panel_id'); // Change name to garansi_panel_id
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Panel</option>';
    } else if (categoryId === '6') {
        compressorWarrantyLabel.innerText = 'Garansi Motor';
        document.getElementById('warranty-sparepart-group').style.display = 'flex';
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
    } else if (subcategoryId == '37' || subcategoryId == '38') { // Check for subcategory id 31
        compressorWarrantyLabel.innerText = 'Garansi Elemen Panas';
        sparepartWarrantyLabel.innerText = 'Garansi Sparepart & Jasa Service';
        document.getElementById('warranty-sparepart-group').style.display = 'flex'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
        warrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Elemen Panas</option>';
        sparepartwarrantyDropdown.innerHTML = '<option value="" disabled selected>Pilih Garansi Sparepart & Jasa Service</option>';
    } else {
        compressorWarrantyLabel.innerText = 'Garansi Kompresor';
        document.getElementById('warranty-sparepart-group').style.display = 'flex'; // Ensure the group is visible
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
} else if (subcategoryId == '37' || subcategoryId == '38') {
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
        document.getElementById('kapasitas-air-dingin').style.display = 'flex';
        document.getElementById('kapasitas-air-panas').style.display = 'flex';
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

function handleSparepartWarranty(subcategoryId) {
        const sparepartWarrantyGroup = document.getElementById('warranty-sparepart-group');
        const sparepartWarrantyField = document.getElementById('sparepart_warranty');

        if ([31, 32, 35, 36].includes(Number(subcategoryId))) {
            sparepartWarrantyGroup.style.display = 'none';
            sparepartWarrantyField.removeAttribute('required');
        } else {
            sparepartWarrantyGroup.style.display = 'flex';
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
            capacityGroup.style.display = 'flex';
            capacityField.setAttribute('required', 'required');
        }
    }

        // Function to show capacity field with dropdown
// Function to show capacity field with dropdown and update the label based on category/subcategory
function showCapacityField(isUkuran = false) {
    const capacityGroup = document.getElementById('capacity-group');
    const label = isUkuran ? 'Ukuran' : 'Kapasitas'; // Use 'Ukuran' if isUkuran is true, else 'Kapasitas'
    
    capacityGroup.style.display = 'flex'; // Ensure capacity group is visible
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
    if (type === 'ukuran') {
        url = `<?= base_url('get-ukuran-tv') ?>/${subcategoryId}`;
        capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Ukuran</option>'; // Clear existing options
    } else if (type === 'kapasitas') {
        url = `<?= base_url('get-capacities') ?>/${subcategoryId}`;
        capacityDropdown.innerHTML = '<option value="" disabled selected>Pilih Kapasitas</option>'; // Clear existing options
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

const productTypeInput = document.getElementById('product_type');
        const errorMessage = document.getElementById('error-message');
        const form = document.getElementById('productForm');

        // Replace forbidden characters and enforce uppercase
        productTypeInput.addEventListener('input', function() {
            this.value = this.value.replace(/[-/]/g, '').toUpperCase();
        });


    </script>
</body>
</html>

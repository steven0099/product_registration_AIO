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
            <option value="" disabled selected>Select Subcategory</option>
                    <option value="" disabled selected>Masukan Subkategori</option>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= $subcategory['id'] ?>"><?= esc($subcategory['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="product_type">Tipe Produk</label>
                <input type="text" id="product_type" name="product_type" placeholder="Masukan Tipe Produk" pattern="[^-/]+" title="Cannot contain '-' or '/'" style="text-transform: uppercase;" required>
            </div>

            <!-- Capacity / Ukuran -->
            <div class="form-group" id="capacity-group" style="display:none;">
                <label id="capacity-label">Kapasitas</label>
                <select id="capacity" name="capacity_value" required>
                    <option value="" disabled selected>Select Kapasitas</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <!-- Garansi Kompresor / Garansi Panel -->
            <div class="form-group" id="warranty-compressor-group">
                <label for="compressor_warranty" id="compressor-warranty-label">Garansi Kompresor</label>
                <div style="display: flex; align-items: center;">
                <select id="compressor_warranty" name="compressor_warranty_id" style="flex-grow: 1;" required>
                    <option value="" disabled selected>Masukan Garansi Kompresor</option>
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
            <option value="" disabled selected>Masukan Garansi Sparepart</option>
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
        document.getElementById('warranty-sparepart-group').style.display = 'flex';
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_panel_id'); // Change name to garansi_panel_id
    } else if (categoryId === '6') {
        compressorWarrantyLabel.innerText = 'Garansi Motor';
        document.getElementById('warranty-sparepart-group').style.display = 'flex';
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
        document.getElementById('warranty-sparepart-group').style.display = 'flex'; // Hide the sparepart warranty group
        document.getElementById('compressor_warranty').setAttribute('name', 'garansi_elemen_panas_id'); // Change name for Garansi Semua Service
    } else {
        compressorWarrantyLabel.innerText = 'Garansi Kompresor';
        document.getElementById('warranty-sparepart-group').style.display = 'flex'; // Ensure the group is visible
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
        document.getElementById('kapasitas-air-dingin').style.display = 'flex';
        document.getElementById('kapasitas-air-panas').style.display = 'flex';
        compressorWarrantyLabel.innerText = 'Garansi Kompresor';
        fetchCompressorWarrantyOptions(); // Fetch Garansi Kompresor options
    } else {
        // Show "kapasitas" and "garansi sparepart" for other subcategories
        document.getElementById('capacity-group').style.display = 'flex';
        document.getElementById('warranty-sparepart-group').style.display = 'flex';

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
    
    if (subcategoryId == '31' || subcategoryId == '32'|| subcategoryId == '35'|| subcategoryId == '36') { // Subcategories that don't need sparepart warranty
        // Hide the sparepart warranty field
        sparepartWarrantyGroup.style.display = 'none';
        // Remove 'required' attribute since it's hidden and not needed
        sparepartWarrantyField.removeAttribute('required');
    } else {
        // Show the sparepart warranty field
        sparepartWarrantyGroup.style.display = 'flex';
        // Add 'required' attribute when it's visible
        sparepartWarrantyField.setAttribute('required', 'required');
    }
}

function handleCapacityGroup(subcategoryId) {
    const capacityGroup = document.getElementById('capacity-group');
    const capacityField = document.getElementById('capacity');
    
    if (subcategoryId == '35'|| subcategoryId == '36') { // Subcategories that don't need sparepart warranty
        // Hide the sparepart warranty field
        capacityGroup.style.display = 'none';
        // Remove 'required' attribute since it's hidden and not needed
        capacityField.removeAttribute('required');
    } else {
        // Show the sparepart warranty field
        capacityGroup.style.display = 'flex';
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
    
    capacityGroup.style.display = 'flex'; // Ensure capacity group is visible
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
</body>
</html>

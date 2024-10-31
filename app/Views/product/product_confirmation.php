<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<div class="container">
    <div class="form-header">
        <img src="<?= base_url('images/logo.png') ?>" class="logo" alt="Logo">
        <h1>Form Registrasi Produk</h1>
    </div>
    <style>
        .floating-modal {
            display: none;
            /* Keep it hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            justify-content: center;
            align-items: center;
            z-index: 1050;
        }
    </style>
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
            <td id="brand_nameDisplay"><?= esc($data['brand_name']) ?>
                <button
                    data-field-name="brand"
                    data-field-label="Brand"
                    data-field-value="<?= $data['brand_id'] ?>"
                    class="btn btn-sm btn-primary edit-button">
                    Edit Brand
                </button>


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
                <?= esc($data['advantage4'] ?? '') ?><br>
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

        <?php if ($data['category_id'] == '5'): ?>
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

        <?php if ($data['category_id'] == '3' || $data['category_id'] == '4' || $data['category_id'] == '7'): ?>
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
                <td><?= esc($data['compressor_warranty_value']) ?></td>
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
                <td><?= esc($data['sparepart_warranty_value']) ?></td>
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
            <?= csrf_field() ?>
            <input type="hidden" name="submitted_by" value="<?= session()->get('name') ?>"> <!-- User name from session -->
            <input type="hidden" name="status" value="confirmed">
            <input type="hidden" name="confirmed_at" value="<?= date('Y-m-d H:i:s') ?>"> <!-- Use standard format -->

            <button type="submit" name="confirm" value="selesai" onclick="showThankYouModal(event)">Selesai</button>
        </form>
        <div class="floating-modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Field</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeEditModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editFieldForm">
                            <input type="hidden" id="fieldName">
                            <input type="hidden" id="productId" value="<?= $data['product_id'] ?>">

                            <div class="form-group" id="inputFieldContainer">
                                <label id="fieldLabel" for="fieldValue">Field</label>
                                <input type="text" class="form-control" id="fieldValue" style="display:none;">
                                <select class="form-control" id="fieldDropdown" style="display:none;"></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeEditModal()">Cancel</button>
                        <button type="button" class="btn btn-primary" id="saveButton" onclick="updateField()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Function to open the edit modal
            function openEditModal(fieldName, fieldLabel, fieldValue) {
                // Set the field name and label
                document.getElementById('fieldName').value = fieldName;
                document.getElementById('fieldLabel').innerText = fieldLabel;

                // Determine if the field should be a dropdown or a text input
                if (fieldName === 'brand') {
                    // Assuming you want to populate the dropdown dynamically for brands
                    populateBrandDropdown(fieldValue);
                    document.getElementById('fieldDropdown').style.display = 'block';
                    document.getElementById('inputFieldContainer').querySelector('input').style.display = 'none';
                } else {
                    // For other fields, show the text input
                    document.getElementById('fieldValue').value = fieldValue;
                    document.getElementById('fieldValue').style.display = 'block';
                    document.getElementById('inputFieldContainer').querySelector('select').style.display = 'none';
                }

                // Show the modal
                document.getElementById('editModal').style.display = 'flex'; // Change to 'flex' to center it
            }

            $(document).ready(function() {
                // Fetch brands and populate the dropdown
                $.ajax({
                    url: '/ProductController/fetchBrands', // Update with the correct URL to your controller
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var $brandDropdown = $('#brandDropdown'); // Update with the actual ID of your dropdown

                        // Clear existing options
                        $brandDropdown.empty();

                        // Append a default option
                        $brandDropdown.append('<option value="">Select a brand</option>');

                        // Populate dropdown with brand names
                        data.forEach(function(brand) {
                            $brandDropdown.append('<option value="' + brand.id + '">' + brand.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching brands:', error);
                    }
                });
            });

            function populateBrandDropdown(selectedValue, brands) {
                const dropdown = document.getElementById('fieldDropdown');
                dropdown.innerHTML = ''; // Clear existing options
                brands.forEach(brand => {
                    const option = document.createElement('option');
                    option.value = brand.id;
                    option.textContent = brand.name;
                    if (brand.id == selectedValue) {
                        option.selected = true; // Set the current brand as selected
                    }
                    dropdown.appendChild(option);
                });
            }


            // Update the field function
            function updateField() {
                const fieldName = document.getElementById('fieldName').value;
                const productId = document.getElementById('productId').value;
                let fieldValue;

                // Determine whether to get value from input or dropdown
                if (fieldName === 'brand') {
                    fieldValue = document.getElementById('fieldDropdown').value;
                } else {
                    fieldValue = document.getElementById('fieldValue').value;
                }
            };
            // AJAX request to update the field on the server
            fetch(`<?= base_url('product/updateField') ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '<?= csrf_hash() ?>'
                    },
                    body: JSON.stringify({
                        fieldName: fieldName,
                        productId: productId,
                        fieldValue: fieldValue
                    })
                })

                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Field updated successfully');
                        // Optionally close the modal here
                        closeEditModal();
                    } else {
                        alert('Failed to update field');
                    }
                })
                .catch(error => console.error('Error updating field:', error));


            function closeEditModal() {
                document.getElementById('editModal').style.display = 'none';
            }

            // Attach this function to the close button
            document.querySelector('.close').onclick = closeEditModal;

            // Event listener for edit buttons
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const fieldName = event.currentTarget.getAttribute('data-field-name');
                    const fieldLabel = event.currentTarget.getAttribute('data-field-label');
                    const fieldValue = event.currentTarget.getAttribute('data-field-value');
                    openEditModal(fieldName, fieldLabel, fieldValue);
                });
            });

            // Function to show the thank you modal
            function showThankYouModal(event) {
                event.preventDefault(); // Prevent default form submission

                // Implement your thank you modal logic here
                // Example: Show a modal thanking the user for their submission
            }
        </script>

        <!-- Include jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </div>
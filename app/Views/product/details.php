<?= $this->extend('partials/main') ?>

<?= $this->section('title') ?>
Rincian Produk
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rincian Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Rincian Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <table class="table">
            <tr>
                <th>Brand</th>
                <td>
                    <?= esc($product['brand']) ?>
                    <?php if ($product['status'] == 'approved'): ?>
                    <button type="button" class="btn btn-primary btn-sm"
                        onclick="openEditModal('brand', <?= esc($product['id']) ?>)">
                        Edit
                    </button>
                    <?php endif; ?>

                </td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><?= esc($product['category']) ?></td>
            </tr>
            <tr>
                <th>Subkategori</th>
                <td><?= esc($product['subcategory']) ?></td>
            </tr>
            <tr>
                <th>Tipe Produk</th>
                <td><?= esc($product['product_type']) ?></td>
            </tr>
            <tr>
                <th>Warna</th>
                <td><?= esc($product['color']) ?>
                <button onclick="setColorModalData('<?= esc($product['id']) ?>', '<?= esc($product['color']) ?>')" class="btn btn-sm btn-primary">Edit</button>
            </td>
            </tr>
            <tr>
                <th>Dimensi Produk</th>
                <td id="productDimensionsValue"><?= esc($product['product_dimensions']) ?></td>
                <td><button onclick="openDynamicModal('product_dimensions')"
                        class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <tr>
                <th>Dimensi Kemasan</th>
                <td id="packagingDimensionsValue"><?= esc($product['packaging_dimensions']) ?></td>
                <td><button onclick="openDynamicModal('packaging_dimensions')"
                        class="btn btn-sm btn-primary">Edit</button></td>
            </tr>
            <tr>
                <th>Konsumsi Daya</th>
                <td><?= esc($product['daya']) ?> Watt</td>
            </tr>
            <tr>
                <th>Berat Produk</th>
                <td><?= esc($product['berat']) ?> Kg</td>
            </tr>
            <tr>
                <th>Negara Pembuat</th>
                <td><?= esc($product['pembuat']) ?></td>
            </tr>
            <tr>
                <th>Keunggulan</th>
                <td>
                    <?= esc($product['advantage1']) ?><br>
                    <?= esc($product['advantage2']) ?><br>
                    <?= esc($product['advantage3']) ?><br>
                    <?= esc($product['advantage4']) ?><br>
                    <?= esc($product['advantage5']) ?><br>
                    <?= esc($product['advantage6']) ?></td>
            </tr>
            <tr>
                <th>Foto Produk</th>
                <td>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_depan'])) ?>" target="_blank">Gambar
                        Depan</a><br>
                    <?php if (!empty($product['gambar_belakang'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_belakang'])) ?>" target="_blank">Gambar
                        Belakang</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_atas'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_atas'])) ?>" target="_blank">Gambar
                        Atas</a><br>
                    <?php endif; ?>
                    <?php if (!empty($product['gambar_bawah'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_bawah'])) ?>" target="_blank">Gambar
                        Bawah</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_samping_kiri'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kiri'])) ?>" target="_blank">Gambar
                        Samping Kiri</a><br>
                    <?php endif; ?>

                    <?php if (!empty($product['gambar_samping_kanan'])): ?>
                    <a href="<?= base_url('uploads/' . esc($product['gambar_samping_kanan'])) ?>" target="_blank">Gambar
                        Samping Kanan</a><br>
                    <?php endif; ?>
                </td>
            </tr>
            <?php if (!empty($product['video_produk'])): ?>
            <tr>
                <th>Video Produk</th>
                <td>
                    <a href="<?= esc($product['video_produk'] ?? '')?>" target="_blank">Video Produk</a>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th>Diajukan Oleh</th>
                <td><?= esc($product['submitted_by']) ?></td>
            </tr>
            <tr>
                <th>Tanggal Diajukan</th>
                <td><?= esc($product['confirmed_at']) ?></td>
            </tr>
            <!-- Conditional Fields -->
            <?php if ($product['category'] == 'TV'): ?>
            <!-- For category TV (ID 9): Display "dimensi produk dengan stand" and "resolusi panel" -->
            <tr>
                <th>Dimensi Produk dengan Stand</th>
                <td><?= esc($product['pstand_dimensions']) ?> cm</td>
            </tr>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
            </tr>
            <tr>
                <th>Resolusi Panel</th>
                <td><?= esc($product['panel_resolution']) ?> Pixel</td>
            </tr>
            <tr>
                <th>Garansi Panel</th>
                <td><?= esc($product['garansi_panel']) ?> Tahun</td>
            </tr>
            <?php endif; ?>

            <?php if ($product['category'] == 'AC'): ?>
            <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
            <tr>
                <th>Kapasitas Pendinginan</th>
                <td><?= esc($product['cooling_capacity']) ?> BTU/h</td>
            </tr>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Tipe Refrigerant</th>
                <td><?= esc($product['refrigrant']) ?></td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            <tr>
                <th>CSPF Rating</th>
                <td><?= esc($product['cspf']) ?></td>
            </tr>
            <?php endif; ?>

            <?php if ($product['category'] == 'KULKAS' || $product['category'] == 'FREEZER' || $product['category'] == 'SHOWCASE' ): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
            <?php endif; ?>

            <?php if ($product['category'] == 'MESIN CUCI'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
            </tr>
            <tr>
                <th>Garansi Sparepart</th>
                <td><?= esc($product['sparepart_warranty']) ?> Tahun</td>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'SPEAKER'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
            </tr>
            <tr>
                <th>Garansi Semua Service</th>
                <td><?= esc($product['garansi_semua_service']) ?> Tahun</td>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'KIPAS ANGIN'): ?>
            <tr>
                <th>Ukuran</th>
                <td><?= esc($product['ukuran']) ?></td>
            </tr>
            <tr>
                <th>Garansi Motor</th>
                <td><?= esc($product['garansi_motor']) ?> Tahun</td>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'DISPENSER GALON ATAS' || $product['subcategory'] == 'DISPENSER GALON BAWAH'): ?>
            <tr>
                <th>Kapasitas Air Dingin</th>
                <td><?= esc($product['kapasitas_air_dingin']) ?> Liter</td>
            </tr>
            <tr>
                <th>Kapasitas Air Panas</th>
                <td><?= esc($product['kapasitas_air_panas']) ?> Liter</td>
            </tr>
            <tr>
                <th>Garansi Kompresor</th>
                <td><?= esc($product['compressor_warranty'])?></td>
            </tr>
            <?php endif; ?>

            <?php if ($product['subcategory'] == 'WATER HEATER' || $product['subcategory'] == 'COFFEE MAKER'): ?>
            <tr>
                <th>Kapasitas</th>
                <td><?= esc($product['capacity']) ?></td>
            </tr>
            <tr>
                <th>Garansi Elemen Panas</th>
                <td><?= esc($product['garansi_elemen_panas']) ?></td>
            </tr>
            <tr>
                <th>Garansi Sparepart & Jasa Service</th>
                <td><?= esc($product['sparepart_warranty'])?></td>
            </tr>

            <?php endif; ?>

            <?php if ($product['status'] == 'approved'): ?>
            <tr>
                <th>Tanggal Disetujui</th>
                <td><?= esc($product['approved_at']) ?></td>
            </tr>
            <?php endif; ?>

            <?php if ($product['status'] == 'rejected'): ?>
            <tr>
                <th>Tanggal Ditolak</th>
                <td><?= esc($product['rejected_at']) ?></td>
            </tr>
            <?php endif; ?>
        </table>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit <span id="modalFieldLabel"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="productId" name="product_id">
                            <input type="hidden" id="fieldName" name="field_name">
                            <div class="form-group">
                                <label for="fieldValue">Select New Value</label>
                                <select id="fieldValue" name="field_value" class="form-control">
                                    <!-- Options will be dynamically populated -->
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Modal for Color -->
<div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="colorModalLabel">Edit Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="colorInput" class="form-control" value="<?= esc($product['color']) ?>" placeholder="Enter color">
                <input type="hidden" id="id" value="<?= esc($product['id']) ?>"> <!-- Include Product ID -->
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- Include CSRF Token -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="updateColor()">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        <!-- Two-Field Dynamic Modal -->
        <div class="modal fade" id="twoFieldModal" tabindex="-1" aria-labelledby="twoFieldModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="twoFieldModalLabel">Update Panel Resolution</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="twoFieldModalBody">
                            <!-- Input fields will be injected dynamically -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveTwoFieldButton">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Three-Field Dynamic Modal -->
        <div class="modal fade" id="threeFieldModal" tabindex="-1" aria-labelledby="threeFieldModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="threeFieldModalLabel">Update Dimensions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="threeFieldModalBody">
                        <!-- Input fields will be injected dynamically -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveThreeFieldButton">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($product['status'] == 'confirmed'): ?>
        <div class="mt-4">
            <a href="/superadmin/approve/<?= esc($product['id']) ?>" class="btn btn-success">
                Approve Product
            </a>
            <a href="/superadmin/reject/<?= esc($product['id']) ?>" class="btn btn-danger">
                Reject Product
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
    }
});

const csrfName = '<?= csrf_token() ?>';
let csrfHash = '<?= csrf_hash() ?>';

function openEditModal(field, productId) {
    // Set product ID and field name in the modal's hidden inputs
    document.getElementById('productId').value = productId;
    document.getElementById('fieldName').value = field;
    document.getElementById('modalFieldLabel').innerText = field.charAt(0).toUpperCase() + field.slice(1);

    // Clear previous options
    document.getElementById('fieldValue').innerHTML = '';

    // Fetch options for the field using AJAX
    fetch(`/superadmin/getOptions?field=${field}`)
        .then(response => response.json())
        .then(data => {
            data.options.forEach(option => {
                let optionElement = document.createElement('option');
                optionElement.value = option.name;
                optionElement.text = option.name;
                document.getElementById('fieldValue').appendChild(optionElement);
            });
            // Open the modal after loading options
            new bootstrap.Modal(document.getElementById('editModal')).show();
        })
        .catch(error => console.error('Error fetching options:', error));
}

// Handle form submission for updating data
document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    formData.append(csrfName, csrfHash); // Add CSRF token to form data

    fetch('/superadmin/updateProductField', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Refresh page to show updated value
            } else {
                location.reload(); // Refresh page to show updated value
            }
            csrfHash = data[csrfName];
        })
        .catch(error => console.error('Error updating product:', error));
});
// Add event listeners to all buttons with class 'open-modal-btn'
document.querySelectorAll('.open-modal-btn').forEach(button => {
    button.addEventListener('click', function() {
        const field = this.getAttribute('data-field'); // Get the field name
        openDynamicModal(field); // Call the function with the field
    });
});

function updateColor() {
    const colorInput = document.getElementById('colorInput');
    const idInput = document.getElementById('id');

    if (!colorInput || !idInput) {
        console.error('One or more elements not found:', {
            colorInput: colorInput,
            idInput: idInput
        });
        alert('Unable to find input fields.');
        return; // Exit the function early
    }

    const color = colorInput.value; // Get the color input value
    const id = `<?= $product['id'] ?>`; // Get the product ID

    // Validate the color input
    if (!color) {
        alert("Color cannot be empty.");
        return;
    }

    const csrfTokenName = '<?= csrf_token() ?>';
    const csrfTokenValue = '<?= csrf_hash() ?>';

    // Send the POST request to update the color
    $.post("<?= base_url('superadmin/updateColor') ?>", {
        id: id,
        color: color,
        [csrfTokenName]: csrfTokenValue
    })
    .done(function(response) {
        // Check if the response is in the expected format
        if (typeof response === "object" && response !== null) {
            if (response.success) {
                alert(response.message); // Show success message
                location.reload(); // Reload the page to see the updated color
            } else {
                alert("Error: " + response.message); // Show error message
            }
        } else {
            alert("Unexpected response format.");
        }
    })
    .fail(function(jqXHR) {
        alert("Request failed: " + jqXHR.statusText);
    });
}


// Function to dynamically open and populate the modal
function setColorModalData(id, color) {
    document.getElementById('id').value = id; // Set the hidden ID input
    document.getElementById('colorInput').value = color; // Set the color input
    $('#colorModal').modal('show'); // Show the modal
}


function updateField(field) {
    let value;
    const id = 'product_id'; // Update this with the actual product ID

    if (field === 'color') {
        value = document.getElementById('colorInput').value;
    } else if (field === 'product_dimensions') {
        const length = document.getElementById('productLengthInput').value;
        const width = document.getElementById('productWidthInput').value;
        const height = document.getElementById('productHeightInput').value;
        value = `${length} x ${width} x ${height} cm`;
    }
    // Handle other fields similarly...

    const csrfTokenName = '<?= csrf_token() ?>'; // Adjust as needed
    const csrfTokenValue = '<?= csrf_hash() ?>'; // Adjust as needed

    $.ajax({
        type: 'POST',
        url: "<?= base_url('superadmin/updateField') ?>",
        data: {
            field: field,
            value: value,
            id: id,
            [csrfTokenName]: csrfTokenValue
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                location.reload();
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(jqXHR) {
            alert("Request failed: " + jqXHR.statusText);
        }
    });
}


</script>
<?= $this->endSection() ?>
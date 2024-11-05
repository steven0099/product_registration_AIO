<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Digital Catalog
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Digital Catalog</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Digital Catalog</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="row">
            <!-- Sidebar for Filters -->
            <div class="col-md-3">
                <!-- Sidebar Filters -->
                <div id="filters" class="mb-4" style="margin-top: 10px; margin-left:20px">
                    <h4>Filter Produk</h4>
                    <form id="filterForm" action="" method="GET">
                        <!-- Category Filter -->
                        <div>
                            <label>Kategori Produk</label>
                            <select id="category" name="category" autocomplete="off">
                                <option value="">Semua Kategori</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= esc($category['category']) ?>"><?= esc($category['category']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Subcategory Filter -->
                        <div id="subcategoryContainer" style="display: none;">
                            <label>Sub Kategori Produk</label>
                            <select id="subcategory" name="subcategory">
                                <option value="">Semua Subkategori</option>
                                <?php foreach ($subcategories as $subcategory): ?>
                                <option value="<?= esc($subcategory['subcategory']) ?>">
                                    <?= esc($subcategory['subcategory']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Capacity Filter -->
                        <div id="capacityContainer" style="display: none;">
                            <label>Ukuran / Kapasitas</label>
                            <select id="capacity" name="capacity">
                                <option value="">Semua</option>
                                <?php foreach ($capacities as $capacity): ?>
                                <option value="<?= esc($capacity['capacity']) ?>"><?= esc($capacity['capacity']) ?>
                                </option>
                                <?php endforeach; ?>
                                <?php foreach ($ukuran as $size): ?>
                                <option value="<?= esc($size['ukuran']) ?>"><?= esc($size['ukuran']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Main Product Grid -->
            <div class="col-md-9">
                <div id="productGrid">
                    <!-- Content loaded from partials/product_grid -->
                    <?= view('partials/product_grid') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    // Trigger filtering on any change in dropdowns
    $('#category, #subcategory, #capacity').on('change', function() {
        filterProducts(); // Call the filter function on change
    });

    function filterProducts() {
        const category = $('#category').val();
        const subcategory = $('#subcategory').val();
        const capacity = $('#capacity').val();

        // Log the selected values to help debug
        console.log("Selected Values - Category:", category, "Subcategory:", subcategory, "Capacity:",
            capacity);

        $.ajax({
            url: "<?= base_url('catalog/filterProducts') ?>",
            type: "GET",
            data: {
                category: category,
                subcategory: subcategory,
                capacity: capacity
            },
            success: function(response) {
                $('#productGrid').html(
                    response); // Ensure response replaces product grid content
            },
            error: function() {
                alert("Failed to filter products.");
            }
        });
    }

    // Populate subcategories based on selected category
    $('#category').on('change', function() {
        const category = $(this).val();

        // Force reset of subcategory and capacity selections
        $('#subcategory').val('').trigger('change'); // Reset subcategory and trigger change event
        $('#capacity').val('').trigger('change'); // Reset capacity and trigger change event

        // Clear and hide the subcategory and capacity dropdowns until populated
        $('#subcategory').empty().append('<option value="">Semua Subkategori</option>');
        $('#capacity').empty().append('<option value="">Semua</option>');
        $('#capacityContainer').hide();

        $.ajax({
            url: "<?= base_url('catalog/getSubcategories') ?>",
            type: "GET",
            data: {
                category: category
            },
            success: function(response) {
                $('#subcategory').empty().append(
                    '<option value="">Semua</option>'); // Reset options

                if (Array.isArray(response)) {
                    $.each(response, function(index, subcategory) {
                        $('#subcategory').append(
                            `<option value="${subcategory.subcategory_name}">${subcategory.subcategory_name}</option>`
                        );
                    });
                } else {
                    console.error("Expected an array of subcategories but received:",
                        response);
                }

                $('#subcategoryContainer').show(); // Show subcategory dropdown
                $('#capacityContainer').hide(); // Hide capacity dropdown initially
            },
            error: function() {
                alert("Failed to fetch subcategories.");
            }
        });
    });

    $('#subcategory').on('change', function() {
        const subcategory = $(this).val();

        // Force reset of capacity dropdown
        $('#capacity').val('').trigger('change'); // Reset capacity selection

        $.ajax({
            url: "<?= base_url('catalog/getCapacities') ?>",
            type: "GET",
            data: {
                subcategory: subcategory
            },
            success: function(response) {
                $('#capacity').empty().append('<option value="">Semua</option>');

                if (response.showCapacity) {
                    response.capacities.forEach(item => {
                        const displayValue = item.value || item
                            .size; // Use `value` if available, otherwise `size`
                        $('#capacity').append(
                            `<option value="${displayValue}">${displayValue}</option>`
                        );
                    });
                    $('#capacityContainer').show(); // Show capacity dropdown
                } else {
                    $('#capacityContainer').hide(); // Hide capacity dropdown
                }
            },
            error: function() {
                alert("Failed to load capacities.");
            }
        });
    });

    $('#capacity').on('change', function() {
        filterProducts(); // Call the filterProducts function to filter the product list
    });
});
</script>

<?= $this->endSection() ?>
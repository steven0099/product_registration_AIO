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
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Digital Catalog</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <?= $this->include('partials/product_grid') ?>

    <!-- Sidebar Filters -->
    <div class="filters mt-4 p-3 border rounded">
        <h4>Filter Produk</h4>
        <form id="filterForm" action="" method="GET">
            <div class="form-group">
                <label for="category">Kategori Produk</label>
                <select id="category" name="category" class="form-control">
                    <option value="">All</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= esc($category['category']) ?>"><?= esc($category['category']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory">Sub Kategori Produk</label>
                <select id="subcategory" name="subcategory" class="form-control">
                    <option value="">All</option>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= esc($subcategory['subcategory']) ?>"><?= esc($subcategory['subcategory']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="capacity">Ukuran / Kapasitas</label>
                <select id="capacity" name="capacity" class="form-control">
                    <option value="">All</option>
                    <?php foreach ($capacities as $capacity): ?>
                        <option value="<?= esc($capacity['capacity']) ?>"><?= esc($capacity['capacity']) ?></option>
                    <?php endforeach; ?>
                    <?php foreach ($ukuran as $size): ?>
                        <option value="<?= esc($size['ukuran']) ?>"><?= esc($size['ukuran']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>

        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $('#filterForm').on('submit', function(e) {
        e.preventDefault(); // Prevent page reload

        $.ajax({
            url: "<?= base_url('catalog/filterProducts') ?>",
            type: "GET",
            data: $(this).serialize(),
            success: function(response) {
                $('#productGrid').html(response);
            },
            error: function() {
                alert("Failed to fetch filtered products.");
            }
        });
    });

    // Populate subcategories based on selected category
    $('#category').on('change', function() {
        const categoryId = $(this).val();
        $.ajax({
            url: "<?= base_url('catalog/getSubcategories') ?>",
            type: "GET",
            data: {
                category_id: categoryId
            },
            success: function(response) {
                $('#subcategory').empty().append('<option value="">All</option>');
                $.each(response, function(index, subcategory) {
                    $('#subcategory').append('<option value="' + subcategory.subcategory_id + '">' + subcategory.subcategory_name + '</option>');
                });
            },
            error: function() {
                alert("Failed to fetch subcategories.");
            }
        });
    });

    // Populate capacities based on selected subcategory
    $('#subcategory').on('change', function() {
        const subcategory = $(this).val();

        $.ajax({
            url: "<?= base_url('catalog/getCapacities') ?>",
            type: "GET",
            data: {
                subcategory: subcategory
            },
            success: function(data) {
                $('#capacity').empty().append('<option value="">All</option>');
                data.forEach(capacity => {
                    $('#capacity').append(`<option value="${capacity.value}">${capacity.value}</option>`);
                });
            },
            error: function() {
                alert("Failed to load capacities.");
            }
        });
    });
</script>
<?= $this->endSection() ?>
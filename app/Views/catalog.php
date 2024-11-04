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
<?= $this->include('partials/product_grid') ?>
    <!-- Sidebar Filters -->
    <div class="filters">
        <h4>Filter Produk</h4>
        <form id="filterForm" action="" method="GET">
            <!-- Category Filter -->
            <div>
                <label>Kategori Produk</label>
                <select id="category" name="category">
                    <option value="">All</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= esc($category['category']) ?>"><?= esc($category['category']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Subcategory Filter -->
            <div>
                <label>Sub Kategori Produk</label>
                <select id="subcategory" name="subcategory">
                    <option value="">All</option>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= esc($subcategory['subcategory']) ?>"><?= esc($subcategory['subcategory']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Capacity Filter -->
            <div>
                <label>Ukuran / Kapasitas</label>
                <select id="capacity" name="capacity">
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
    const categoryName = $(this).val();
    $.ajax({
        url: "<?= base_url('catalog/getSubcategories') ?>",
        type: "GET",
        data: { category_id: categoryId }, // Now sending category_id
        success: function(response) {
            // Populate subcategories based on the response
            $('#subcategoryFilter').empty().append('<option value="">Select Subcategory</option>');
            $.each(response, function(index, subcategory) {
                $('#subcategoryFilter').append('<option value="' + subcategory.subcategory_id + '">' + subcategory.subcategory_name + '</option>');
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
        data: { subcategory: subcategory },
        success: function(data) {
            $('#capacity').empty().append('<option value="">Select Capacity</option>');
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
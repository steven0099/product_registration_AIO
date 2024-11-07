<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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
                <div id="filters" class="mb-4" style="margin-top: 10px; margin-left: 20px;">
                    <h4>Filter Produk</h4>
<form id="filterForm" action="" method="GET">
    <!-- Category Filter -->
    <div>
        <label for="category">Kategori Produk</label>
        <select id="category" style="width:220px" name="category" autocomplete="off" class="form-control">
            <option value="">Semua Kategori</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= esc($category['category']) ?>"><?= esc($category['category']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Subcategory Filter -->
    <div id="subcategoryContainer" style="display: none;">
        <label for="subcategory">Sub Kategori Produk</label>
        <select id="subcategory" name="subcategory" style="width:220px" class="form-control">
            <option value="">Semua Subkategori</option>
            <?php foreach ($subcategories as $subcategory): ?>
                <option value="<?= esc($subcategory['subcategory']) ?>"><?= esc($subcategory['subcategory']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Capacity Filter -->
    <div id="capacityContainer" style="display: none;">
        <label for="capacity">Ukuran / Kapasitas</label>
        <select id="capacity" name="capacity" style="width:220px" class="form-control">
            <option value="">Semua</option>
            <?php foreach ($capacities as $capacity): ?>
                <option value="<?= esc($capacity['capacity']) ?>"><?= esc($capacity['capacity']) ?></option>
            <?php endforeach; ?>
            <?php foreach ($ukuran as $size): ?>
                <option value="<?= esc($size['ukuran']) ?>"><?= esc($size['ukuran']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</form>

                </div>
            </div>

            <!-- Main Product Grid (Right side) -->
            <div class="col-md-9">
                <div class="row">
                    <!-- Search field on the leftmost -->
                    <div class="col-md-6 d-flex align-items-center">
                        <form id="searchAndSortForm" action="" method="GET" class="d-flex w-100">
                            <label for="search" class="mr-2 mb-0">Search</label>
                            <input style="width:170px" type="text" id="search" name="search" value="<?= esc($search) ?>"
                                placeholder="Cari Produk..." class="form-control mr-2">
                            <button type="submit" class="btn btn-primary mb-0">Search</button>
                        </form>
                    </div>

                    <!-- Sort dropdown on the rightmost -->
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <form id="searchAndSortForm" action="" method="GET" class="d-flex w-100">
                            <label for="sort" class="mr-2 mb-0">Sort By</label>
                            <select style="width:170px" id="sort" name="sort" class="form-control mr-2">
                                <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Tipe Produk A-Z
                                </option>
                                <option value="name_desc" <?= $sort == 'name_desc' ? 'selected' : '' ?>>Tipe Produk Z-A
                                </option>
                                <option value="capacity_asc" <?= $sort == 'capacity_asc' ? 'selected' : '' ?>>Kapasitas
                                    Rendah - Tinggi</option>
                                <option value="capacity_desc" <?= $sort == 'capacity_desc' ? 'selected' : '' ?>>
                                    Kapasitas Tinggi - Rendah</option>
                            </select>
                            <button type="submit" class="btn btn-primary mb-0">Apply</button>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div id="productGrid" class="row">
                    <!-- Content loaded from partials/product_grid -->
                    <?= view('partials/product_grid') ?>
                    <div class="row">
    <div class="col-12">
        <div class="pagination d-flex justify-content-center mt-4">
            <?php if ($pager->getPageCount() > 1): ?>
                <?= $pager->links() ?>
            <?php endif; ?>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>

        <!-- Comparison Bar -->
        <div id="comparisonWidget" style="display:none" class="comparison-widget">
            <div class="comparison-header">
                <span>Perbandingan</span>
                <button onclick="closeComparisonWidget()">X</button>
            </div>
            <div class="comparison-content">
                <!-- Dynamically added comparison items will go here -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>




<?= $this->section('js') ?>
<script>
$(document).ready(function() {
    // Trigger filtering on any change in dropdowns
    $('#category, #subcategory, #capacity, #sort').on('change', function() {
        filterProducts();
    });

    $('#search').on('input', function() {
        filterProducts();
    });

    function filterProducts() {
        const category = $('#category').val();
        const subcategory = $('#subcategory').val();
        const capacity = $('#capacity').val();
        const search = $('#search').val();
        const sort = $('#sort').val();

        // Show loading indicator
        $('#productGrid').html('<div class="loader">Loading...</div>');

        $.ajax({
            url: "<?= base_url('catalog/filterProducts') ?>",
            type: "GET",
            data: {
                category: category,
                subcategory: subcategory,
                capacity: capacity,
                search: search,
                sort: sort
            },
            success: function(response) {
                $('#productGrid').html(response); // Replace product grid content
            },
            error: function() {
                alert("Failed to filter products.");
                $('#productGrid').html('');
            }
        });
    }

    // Populate subcategories and capacities based on selected category
    $('#category').on('change', function() {
        const category = $(this).val();

        $('#subcategory').val('').trigger('change');
        $('#capacity').val('').trigger('change');
        $('#subcategory').empty().append('<option value="">Semua Subkategori</option>');
        $('#capacity').empty().append('<option value="">Semua</option>');
        $('#capacityContainer').hide();

        $.ajax({
            url: "<?= base_url('catalog/getSubcategories') ?>",
            type: "GET",
            data: { category: category },
            success: function(response) {
                if (Array.isArray(response)) {
                    $('#subcategory').append('');
                    response.forEach(subcategory => {
                        $('#subcategory').append(
                            `<option value="${subcategory.subcategory_name}">${subcategory.subcategory_name}</option>`
                        );
                    });
                    $('#subcategoryContainer').show();
                } else {
                    console.error("Unexpected response:", response);
                }
            },
            error: function() {
                alert("Failed to fetch subcategories.");
            }
        });
    });

    // Populate capacities based on selected subcategory
    $('#subcategory').on('change', function() {
        const subcategory = $(this).val();

        $('#capacity').val('').trigger('change');

        $.ajax({
            url: "<?= base_url('catalog/getCapacities') ?>",
            type: "GET",
            data: { subcategory: subcategory },
            success: function(response) {
                $('#capacity').empty().append('<option value="">Semua</option>');

                if (response.showCapacity) {
                    response.capacities.forEach(item => {
                        const displayValue = item.value || item.size;
                        $('#capacity').append(
                            `<option value="${displayValue}">${displayValue}</option>`
                        );
                    });
                    $('#capacityContainer').show();
                } else {
                    $('#capacityContainer').hide();
                }
            },
            error: function() {
                alert("Failed to load capacities.");
            }
        });
    });
});

// Variables to track selected comparison category and subcategory (for "SMALL APPLIANCES")
let comparisonCategory = null;
let comparisonSubcategory = null;

// Function to open the comparison widget
function openComparisonWidget() {
    document.getElementById('comparisonWidget').style.display = 'block';
}

// Function to close the comparison widget
function closeComparisonWidget() {
    document.getElementById('comparisonWidget').style.display = 'none';

    // Uncheck all checkboxes
    document.querySelectorAll('.compare-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });

    // Clear the comparison content
    const comparisonContent = document.querySelector('.comparison-content');
    comparisonContent.innerHTML = '';

    // Reset comparison category and subcategory
    comparisonCategory = null;
    comparisonSubcategory = null;
}

// Function to add a product to the comparison widget
function addToComparison(productId, productName, productImage, productCategory, productSubcategory, productCapacity) {
    const comparisonContent = document.querySelector('.comparison-content');
    const existingItem = document.getElementById(`compare-item-${productId}`);

    // Check if the item is already in the comparison widget
    if (!existingItem) {
        const comparisonItem = document.createElement('div');
        comparisonItem.classList.add('comparison-item');
        comparisonItem.id = `compare-item-${productId}`;
        comparisonItem.innerHTML = `
            <img src="${productImage}" alt="${productName}" style="width: 100px; height: auto;">
            <span>${productName}<br>
            ${productCategory} - ${productSubcategory}<br>
            ${productCapacity}</span>
            <button onclick="removeFromComparison('${productId}')">Remove</button>
        `;
        comparisonContent.appendChild(comparisonItem);
    }
    openComparisonWidget(); // Ensure the widget is visible when adding a product
}

// Function to remove a product from the comparison widget
function removeFromComparison(productId) {
    const comparisonItem = document.getElementById(`compare-item-${productId}`);
    if (comparisonItem) {
        comparisonItem.remove();
    }

    // Uncheck the checkbox for the removed product
    const productCheckbox = document.querySelector(`.compare-checkbox[data-product-id="${productId}"]`);
    if (productCheckbox) {
        productCheckbox.checked = false;
    }

    // Hide the widget if there are no items left in comparison
    if (document.querySelector('.comparison-content').children.length === 0) {
        closeComparisonWidget();
    }
}

// Event listener for each checkbox
document.querySelectorAll('.compare-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const productId = this.getAttribute('data-product-id');
        const productName = this.getAttribute('data-product-name');
        const productImage = this.getAttribute('data-product-image');
        const productCategory = this.getAttribute('data-product-category');
        const productSubcategory = this.getAttribute('data-product-subcategory');
        const productCapacity = this.getAttribute('data-product-capacity');

        if (this.checked) {
            // If no category is set, initialize it with the first product’s category
            if (!comparisonCategory) {
                comparisonCategory = productCategory;
                if (productCategory === "SMALL APPLIANCES") {
                    comparisonSubcategory = productSubcategory;
                }
                addToComparison(productId, productName, productImage, productCategory, productSubcategory, productCapacity);
            } else {
                // Check if the selected product’s category matches the initial category
                if (productCategory === comparisonCategory &&
                    (comparisonCategory !== "SMALL APPLIANCES" || productSubcategory === comparisonSubcategory)) {
                    addToComparison(productId, productName, productImage, productCategory, productSubcategory, productCapacity);
                } else {
                    alert("Comparison can only include products from the same category. For SMALL APPLIANCES, subcategories must also match.");
                    this.checked = false; // Uncheck the box
                }
            }
        } else {
            removeFromComparison(productId);
        }
    });
});

// Function to make the comparison widget draggable
function makeWidgetMovable(widgetId) {
    var widget = document.getElementById(widgetId);
    var isDragging = false;
    var offsetX, offsetY;

    widget.addEventListener('mousedown', function (e) {
        // Start dragging
        isDragging = true;
        offsetX = e.clientX - widget.getBoundingClientRect().left;
        offsetY = e.clientY - widget.getBoundingClientRect().top;

        // Change the cursor to indicate dragging
        widget.style.cursor = 'grabbing';
    });

    window.addEventListener('mousemove', function (e) {
        if (isDragging) {
            // Move the widget as the mouse moves
            var x = e.clientX - offsetX;
            var y = e.clientY - offsetY;

            widget.style.left = x + 'px';
            widget.style.top = y + 'px';
        }
    });

    window.addEventListener('mouseup', function () {
        // Stop dragging when mouse is released
        isDragging = false;
        widget.style.cursor = 'move';
    });
}

// Initialize the movable functionality for the comparison widget
makeWidgetMovable('comparisonWidget');

// Close the widget when the close button is clicked
document.getElementById('closeWidget').addEventListener('click', function () {
    document.getElementById('comparisonWidget').style.display = 'none';
});

</script>
<?= $this->endSection() ?>

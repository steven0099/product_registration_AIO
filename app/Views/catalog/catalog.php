<?= $this->extend('partials/catalog') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="static\plugin\font-awesome\css\fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Katalog Digital
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:auto; width:100%; position: fixed">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
   </ul>

   <div class="col-sm-6" style="margin-left:100px">
    <a href="/catalog" class="breadcrumb-link" style="font-family: arial sans-serif; font-size:18px">Katalog</a> 
    </div><!-- /.col -->

   <!-- User Dropdown -->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= session()->get('name') ? esc(session()->get('name')) : 'Guest'; ?>
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a href="/reset/reset-password" class="dropdown-item">
               <i class="fas fa-key mr-2"></i> Ganti Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
               <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
         </div>
      </li>
   </ul>
</nav>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Katalog Digital</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/catalog">Katalog digital</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="card">
    <div class="row">
    <!-- Sidebar for Filters -->
<div class="container-fluid d-flex">
<div class="col-md-3">
    <!-- Sidebar Filters -->
    <div id="filters" class="mb-4" style="margin-top: 10px; margin-left: 5px; margin-right: 5px; max-height: 800px; overflow-y: auto; width:260px">
        <h4>Filter Produk</h4>

        <form id="filterForm" action="" method="GET">
            <div id="filterSidebar" style="width: 300px; padding: 20px;">

                <!-- Category Filter -->
                <div>
                    <h5 class="filter-title" data-target="#categoryContainer">Kategori Produk</h5>
                    <div id="categoryContainer" class="filter-options">
                        <label class="filter-option">
                            <input class="filter-option" type="radio" name="category" value="" checked>
                            Semua Kategori
                        </label>
                        <?php foreach ($categories as $category): ?>
                        <label class="filter-option">
                            <input type="radio" name="category" value="<?= esc($category['category']) ?>">
                            <?= esc($category['category']) ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Subcategory Filter -->
                <div>
                    <h5 class="filter-title" data-target="#subcategoryContainer">Sub Kategori Produk</h5>
                    <div id="subcategoryContainer" class="filter-options">
                        <label class="filter-option">
                            <input type="radio" name="subcategory" value="" checked>
                            Semua Subkategori
                        </label>
                        <?php foreach ($subcategories as $subcategory): ?>
                        <label class="filter-option">
                            <input type="radio" name="subcategory" value="<?= esc($subcategory['subcategory']) ?>">
                            <?= esc($subcategory['subcategory']) ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Capacity Filter -->
                <div>
                    <h5 class="filter-title" data-target="#capacityContainer">Ukuran / Kapasitas</h5>
                    <div id="capacityContainer" class="filter-options" style="display:none">
                        <label class="filter-option">
                            <input type="radio" name="capacity" value="" checked>
                            Semua
                        </label>
                        <?php foreach ($capacities as $capacity): ?>
                        <label class="filter-option">
                            <input type="radio" name="capacity" value="<?= esc($capacity['capacity']) ?>">
                            <?= esc($capacity['capacity']) ?>
                        </label>
                        <?php endforeach; ?>
                        <?php foreach ($ukuran as $size): ?>
                        <label class="filter-option">
                            <input type="radio" name="capacity" value="<?= esc($size['ukuran']) ?>">
                            <?= esc($size['ukuran']) ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
                        



        

<!-- Main Product Grid (Right side) -->
<div class="col-md-12">
    <div class="row">
        <!-- Search field on the leftmost -->
        <div class="col-md-6 d-flex align-items-center">
            <form id="searchAndSortForm" action="" method="GET" class="d-flex w-100">
                <input style="width:250px" type="text" id="search" name="search" value="<?= esc($search) ?>"
                    placeholder="Cari Produk..." class="form-control">
                <button type="submit" class="btn btn-primary ml-1"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Sort dropdown on the rightmost -->
        <div class="col-md-6 d-flex align-items-center justify-content-end">
    <form id="searchAndSortForm" action="" method="GET" class="d-flex w-100">
        <select style="width: 250px" id="sort" name="sort" class="form-control">
            <option value="name_asc" <?= $sort == 'name_asc' ? 'selected' : '' ?>>Tipe Produk A-Z</option>
            <option value="name_desc" <?= $sort == 'name_desc' ? 'selected' : '' ?>>Tipe Produk Z-A</option>
            <option value="capacity_asc" <?= $sort == 'capacity_asc' ? 'selected' : '' ?>>Kapasitas Rendah - Tinggi</option>
            <option value="capacity_desc" <?= $sort == 'capacity_desc' ? 'selected' : '' ?>>Kapasitas Tinggi - Rendah</option>
            <option value="date_asc" <?= $sort == 'date_asc' ? 'selected' : '' ?>>Produk Lama - Baru</option>
            <option value="date_desc" <?= $sort == 'date_desc' ? 'selected' : '' ?>>Produk Baru - Lama</option>
        </select>
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
        <div class="button-group">
        <button class="btn-minimize" onclick="toggleComparisonWidget()" id="minimizeButton"><i class="fas fa-chevron-down"></i></button>
        <button class="btn-close" onclick="closeComparisonWidget()"><i class="fas fa-times"></i></button>
    </div>
                            </div>
    <div class="row">
    <div class="comparison-content">
        <!-- Dynamically added comparison items will go here -->
    </div>
    <button class="btn-detailed-comparison" onclick="viewDetailedComparison()">Bandingkan</button>
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

    // Dynamically update subcategory options when category changes
    $('#categoryContainer input[name="category"]').on('change', function() {
    resetFilters();
    const selectedCategory = $(this).val();

    // Reset the capacity container visibility
    $('#capacityContainer').hide();
    $("input[name='capacity']").prop('checked', false); // Clear capacity selection

    // Manually handle visibility of subcategory container
    if (selectedCategory) {
        // Fetch subcategories without triggering dropdown behavior
        $.ajax({
            url: '<?= base_url('catalog/getSubcategories') ?>',
            type: 'GET',
            data: { category: selectedCategory },
            success: function(subcategories) {
                let subcategoryHTML = `
                    <label class="filter-option">
                        <input type="radio" name="subcategory" value="" checked>
                        Semua Subkategori
                    </label>
                `;
                
                subcategories.forEach(subcat => {
                    subcategoryHTML += `
                        <label class="filter-option">
                            <input type="radio" name="subcategory" value="${subcat.subcategory_name}">
                            ${subcat.subcategory_name}
                        </label>
                    `;
                });
                // Update subcategory container content
                $('#subcategoryContainer').html(subcategoryHTML);
                // Only show subcategory container if category is selected
                $('#subcategoryContainer');
                // Keep capacity container hidden until a subcategory is selected
                $('#capacityContainer').hide();
            },
            error: function() {
                alert("Failed to load subcategories.");
            }
        });
    } else {
        // Hide subcategory and capacity containers if no category is selected
        $('#subcategoryContainer').hide();
        $('#capacityContainer').hide();
    }

    filterProducts(); // Trigger filtering after category change
});



    // Dynamically update capacity options when subcategory changes
    $('#subcategoryContainer').on('change', "input[name='subcategory']", function() {
    resetCapacity();
    const selectedSubcategory = $(this).val();

    // Manually show capacity container based on subcategory selection
    if (selectedSubcategory) {
        $('#capacityContainer').show(); // Show capacity container

        $.ajax({
            url: '<?= base_url('catalog/getCapacities') ?>',
            type: 'GET',
            data: { subcategory: selectedSubcategory },
            success: function(response) {
                let capacityHTML = `
                    <label class="filter-option">
                        <input type="radio" name="capacity" value="" checked>
                        Semua
                    </label>
                `;

                response.capacities.forEach(capacity => {
                    if (capacity.value) {
                        capacityHTML += `
                            <label class="filter-option">
                                <input type="radio" name="capacity" value="${capacity.value}">
                                ${capacity.value}
                            </label>
                        `;
                    } else if (capacity.size) {
                        capacityHTML += `
                            <label class="filter-option">
                                <input type="radio" name="capacity" value="${capacity.size}">
                                ${capacity.size}
                            </label>
                        `;
                    }
                });

                // Update the capacity container
                $('#capacityContainer').html(capacityHTML);
            },
            error: function() {
                alert("Failed to load capacity options.");
            }
        });
    } else {
        $('#capacityContainer').hide(); // Hide capacity container if no subcategory is selected
    }

    filterProducts(); // Trigger filtering after subcategory change
});


    // Trigger filtering when capacity is changed
    $('#capacityContainer').on('change', "input[name='capacity']", function() {
        filterProducts();
    });

    // Function to filter products based on selected filters
    function filterProducts() {
    const category = $("input[name='category']:checked").val();
    const subcategory = $("input[name='subcategory']:checked").val();
    const capacity = $("input[name='capacity']:checked").val();
    const search = $('#search').val();
    const sort = $('#sort').val();

    console.log("Filters - Category:", category, "Subcategory:", subcategory, "Capacity:", capacity);

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
            console.log("Filter response:", response);
            $('#productGrid').html(response); // Update product grid with filtered products

            // Bind checkbox listeners again after the new content is loaded
            bindCheckboxListener();

            // Show the checkboxes if at least one filter is selected
            if (category || subcategory || capacity) {
                $('.compare-checkbox').show(); // Show checkboxes
                $('.compare-label').show();
            } else {
                $('.compare-checkbox').hide(); // Hide checkboxes if no filter is selected
                $('.compare-label').hide();
            }

            // Check if any products in the comparison list are still displayed
            const comparisonContent = document.querySelector('.comparison-content');
            if (comparisonContent.children.length > 0) {
                openComparisonWidget(); // Display widget if products are in comparison
            } else {
                closeComparisonWidget(); // Hide widget if no products are selected
            }
        },
        error: function() {
            alert("Failed to filter products.");
            $('#productGrid').html(''); // Clear product grid on error
        }
    });
}



    // Reset subcategory and capacity filters
function resetFilters() {
    // Reset the subcategory filter to ' ' (unselected state)
    $("input[name='subcategory']").prop('checked', false);

    // Reset the capacity filter to ' ' (unselected state)
    $("input[name='capacity']").prop('checked', false);

    // Optionally, clear the subcategory and capacity containers
    $('#subcategoryContainer').html('');
    $('#capacityContainer').html('');

        // Reset the comparison widget visibility
        $('#comparisonWidget').hide(); // Hide comparison widget initially
}

function resetCapacity() {
    // Reset the subcategory filter to ' ' (unselected state)

    // Reset the capacity filter to ' ' (unselected state)
    $("input[name='capacity']").prop('checked', false);

    // Optionally, clear the subcategory and capacity containers

    $('#capacityContainer').html('');
}
});

// DOMContentLoaded event handler to ensure elements are available before adding listeners
document.addEventListener("DOMContentLoaded", function() {
    const categoryRadios = document.querySelectorAll("input[name='category']");
    const subcategoryContainer = document.getElementById("subcategoryContainer");
    const capacityContainer = document.getElementById("capacityContainer");

    const subcategoryRadios = document.querySelectorAll("input[name='subcategory']");
    if (subcategoryRadios.length > 0) {
        subcategoryRadios.forEach(radio => {
            radio.addEventListener("change", function() {
                if (this.value) {
                    capacityContainer.style.display = 'none';
                }
            });
        });
    }
});

// Function to toggle the filter options and arrow direction
document.querySelectorAll('.filter-title').forEach(function(title) {
    title.addEventListener('click', function() {
        // Get the target container for this filter
        const target = document.querySelector(title.getAttribute('data-target'));

        // Toggle the 'show' class on the target container
        target.classList.toggle('show');

        // Rotate the arrow inside the title
        if (target.classList.contains('show')) {
            title.style.setProperty('background-color', '#d4d4d4');
            title.style.setProperty('--arrow-rotate', '90deg');
        } else {
            title.style.setProperty('background-color', '#f9f9f9');
            title.style.setProperty('--arrow-rotate', '0deg');
        }
    });
});

document.querySelectorAll('.filter-option input[type="radio"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        // Remove the "selected" class from all filter-option labels
        document.querySelectorAll('.filter-option').forEach((label) => {
            label.classList.remove('selected');
        });

        // Add the "selected" class to the parent label of the selected radio button
        if (radio.checked) {
            radio.closest('.filter-option').classList.add('selected');
        }
    });
});


// Variables to track selected comparison category and subcategory (for "SMALL APPLIANCES")
let comparisonCategory = null;
let comparisonSubcategory = null;

// Function to open the comparison widget
function openComparisonWidget() {
    // Check if widget is not already open, then open it
    const widget = document.getElementById('comparisonWidget');
    if (widget.style.display === 'none') {
        console.log('Opening comparison widget...');
        widget.style.display = 'block';
    }
}

function closeComparisonWidget() {
    console.log('Closing comparison widget...');
    const widget = document.getElementById('comparisonWidget');
    widget.style.display = 'none';
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
// Function to add a product to the comparison widget
function addToComparison(productId, productName, productImage, productCategory, productSubcategory,productCapacity){ //productHarga,  {
    const comparisonContent = document.querySelector('.comparison-content');
    const existingItem = document.getElementById(`compare-item-${productId}`);
    // Rest of your function here
    // Check if the item is already in the comparison widget
    if (!existingItem) {
        const comparisonItem = document.createElement('div');
        comparisonItem.classList.add('comparison-item');
        comparisonItem.id = `compare-item-${productId}`;
        comparisonItem.innerHTML = ` 
                    <button class="btn-remove" onclick="removeFromComparison('${productId}')">X</button>
            <img src="${productImage}" alt="${productName}" style="width: 100px; height: auto;">
            <span>${productName}<br>
            ${productCategory}  ${productSubcategory}<br>
            ${productCapacity}<br>
            </span>
        `;
        //pindahkan keatas kalau butuh
        //<strong>${productHarga}</strong>
        comparisonContent.appendChild(comparisonItem);
    }

    // Open the widget once a product is added
    openComparisonWidget();
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

function viewDetailedComparison() {
    const productIds = Array.from(document.querySelectorAll('.comparison-item'))
                            .map(item => item.id.replace('compare-item-', ''));
    const queryString = productIds.map(id => `products[]=${id}`).join('&');
    const selectedProducts = document.querySelectorAll('.comparison-item').length;

    if (selectedProducts < 2) {
        alert("Pilih minimal 2 produk untuk dibandingkan.");
    } else {
        // Proceed with the comparison
        window.location.href = `catalog/compare?${queryString}`; // Update this with the actual path
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
        const selectedCount = document.querySelectorAll('.compare-checkbox:checked').length;
// const productHarga = this.getAttribute('data-product-harga');
        if (selectedCount > 3) {
            alert("You can only compare up to 3 products.");
            this.checked = false; // Uncheck if more than 3
            return;
        }

        if (this.checked) {
            // If no category is set, initialize it with the first product’s category
            if (!comparisonCategory) {
                comparisonCategory = productCategory;
                if (productCategory === "SMALL APPLIANCES") {
                    comparisonSubcategory = productSubcategory;
                }
                addToComparison(productId, productName, productImage, productCategory, productCapacity,
                    productSubcategory,); //productHarga);
            } else {
                // Check if the selected product’s category matches the initial category
                if (productCategory === comparisonCategory &&
                    (comparisonCategory !== "SMALL APPLIANCES" || productSubcategory ===
                        comparisonSubcategory)) {
                    addToComparison(productId, productName, productImage, productCategory,
                        productSubcategory,productCapacity); //productHarga,) 
                } else {
                    alert(
                        "Hanya bisa membandingkan produk dengan kategori yang sama (untuk kategori SMALL APPLIANCES, subkategori juga harus sama)");
                    this.checked = false; // Uncheck the box
                }
            }
        } else {
            removeFromComparison(productId);
        }
    });
});

function bindCheckboxListener() {
    document.querySelectorAll('.compare-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const productImage = this.getAttribute('data-product-image');
            const productCategory = this.getAttribute('data-product-category');
            const productSubcategory = this.getAttribute('data-product-subcategory');
            //const productHarga = this.getAttribute('data-product-harga');
            const productCapacity = this.getAttribute('data-product-capacity');

            if (this.checked) {
                if (!comparisonCategory) {
                    comparisonCategory = productCategory;
                    if (productCategory === "SMALL APPLIANCES") {
                        comparisonSubcategory = productSubcategory;
                    }
                    addToComparison(productId, productName, productImage, productCategory, productSubcategory,productCapacity); //productHarga);
                } else {
                    if (productCategory === comparisonCategory &&
                        (comparisonCategory !== "SMALL APPLIANCES" || productSubcategory === comparisonSubcategory)) {
                        addToComparison(productId, productName, productImage, productCategory, productSubcategory,productCapacity); //productHarga); 
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
}

// Function to make the comparison widget draggable
function toggleComparisonWidget() {
    const widget = document.getElementById('comparisonWidget');
    const button = document.getElementById('minimizeButton');

    if (widget.classList.toggle('minimized')) {
        // Change to up arrow (restore icon)
        button.innerHTML = '<i class="fas fa-chevron-up"></i>';
    } else {
        // Change to minimize icon (underscore)
        button.innerHTML = '<i class="fas fa-chevron-down"></i>';
    }
}



// Close the widget when the close button is clicked
document.addEventListener('DOMContentLoaded', function() {
    var closeWidget = document.getElementById('closeWidget');
    if (closeWidget) {
        closeWidget.addEventListener('click', function() {
            document.getElementById('comparisonWidget').style.display = 'none';
        });
    }
});

// Reset category and subcategory on filter change (for example, when category is changed)
function resetComparisonFilters() {
    comparisonCategory = null;
    comparisonSubcategory = null;

    // Optionally, close the comparison widget if no products are selected
    closeComparisonWidget();
}

    document.addEventListener("DOMContentLoaded", function () {
    const sortDropdown = document.getElementById("sort");
    const searchInput = document.getElementById("search");
    const filterInputs = document.querySelectorAll("input[name='category'], input[name='subcategory'], input[name='capacity']");

    // Helper function to update the URL with current filters, search, and sorting
    const updateUrlWithFilters = () => {
        const url = new URL(window.location.href);
        const search = searchInput ? searchInput.value : '';
        const sort = sortDropdown ? sortDropdown.value : '';

        // Update URL with search and sort parameters
        if (search) {
            url.searchParams.set("search", search);
        } else {
            url.searchParams.delete("search");
        }

        if (sort) {
            url.searchParams.set("sort", sort);
        } else {
            url.searchParams.delete("sort");
        }

        // Manually handle filter inputs (checkboxes, radio buttons, and text inputs)
        filterInputs.forEach((input) => {
            // For checkboxes and radio buttons: include the parameter if it's checked
            if ((input.type === "checkbox" || input.type === "radio") && input.checked) {
                url.searchParams.set(input.name, input.value);
            }
            // For text inputs, include the parameter when the field is not empty
            if (input.type === "text" && input.value) {
                url.searchParams.set(input.name, input.value);
            }
        });

        return url;
    };

    // Event listener for sort change (without full page refresh)
    if (sortDropdown) {
        sortDropdown.addEventListener("change", function () {
            const updatedUrl = updateUrlWithFilters();
            history.pushState(null, '', updatedUrl.toString()); // Update URL without reloading page
            filterProducts(); // Trigger filtering (reapply filters including sort)
        });
    }

    // Event listener for search input
    if (searchInput) {
        searchInput.addEventListener("change", function () {
            const updatedUrl = updateUrlWithFilters();
            history.pushState(null, '', updatedUrl.toString());
            filterProducts(); // Trigger filtering
        });

        searchInput.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                const updatedUrl = updateUrlWithFilters();
                history.pushState(null, '', updatedUrl.toString());
                filterProducts(); // Trigger filtering
            }
        });
    }

    // Event listeners for filter inputs (checkboxes and radios)
    filterInputs.forEach((input) => {
        input.addEventListener("change", function () {
            const updatedUrl = updateUrlWithFilters();
            history.pushState(null, '', updatedUrl.toString()); // Update URL without reloading page
            filterProducts(); // Trigger filtering
        });
    });

    // Function to filter products based on selected filters
    function filterProducts() {
        const category = $("input[name='category']:checked").val();
        const subcategory = $("input[name='subcategory']:checked").val();
        const capacity = $("input[name='capacity']:checked").val();
        const search = $('#search').val();
        const sort = $('#sort').val();

        console.log("Filters - Category:", category, "Subcategory:", subcategory, "Capacity:", capacity);
        
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
            console.log("Filter response:", response);
            $('#productGrid').html(response); // Update product grid with filtered products

            // Bind checkbox listeners again after the new content is loaded
            bindCheckboxListener();

            // Show the checkboxes if at least one filter is selected
            if (category || subcategory || capacity) {
                $('.compare-checkbox').show(); // Show checkboxes
                $('.compare-label').show();
            } else {
                $('.compare-checkbox').hide(); // Hide checkboxes if no filter is selected
                $('.compare-label').hide();
            }

            // Check if any products in the comparison list are still displayed
            const comparisonContent = document.querySelector('.comparison-content');
            if (comparisonContent.children.length > 0) {
                openComparisonWidget(); // Display widget if products are in comparison
            } else {
                closeComparisonWidget(); // Hide widget if no products are selected
            }
        },
        error: function() {
            alert("Failed to filter products.");
            $('#productGrid').html(''); // Clear product grid on error
        }
    });
}

    // Dynamically update subcategory options when category changes
    $('#categoryContainer input[name="category"]').on('change', function() {
        resetFilters();
        const selectedCategory = $(this).val();

        // Reset the capacity container visibility
        $('#capacityContainer').hide();
        $("input[name='capacity']").prop('checked', false); // Clear capacity selection

        // Manually handle visibility of subcategory container
        if (selectedCategory) {
            // Fetch subcategories without triggering dropdown behavior
            $.ajax({
                url: '<?= base_url('catalog/getSubcategories') ?>',
                type: 'GET',
                data: { category: selectedCategory },
                success: function(subcategories) {
                    let subcategoryHTML = `
                        <label class="filter-option">
                            <input type="radio" name="subcategory" value="" checked>
                            Semua Subkategori
                        </label>
                    `;
                    
                    subcategories.forEach(subcat => {
                        subcategoryHTML += `
                            <label class="filter-option">
                                <input type="radio" name="subcategory" value="${subcat.subcategory_name}">
                                ${subcat.subcategory_name}
                            </label>
                        `;
                    });
                    // Update subcategory container content
                    $('#subcategoryContainer').html(subcategoryHTML);
                    $('#subcategoryContainer');
                    // Keep capacity container hidden until a subcategory is selected
                    $('#capacityContainer').hide();
                },
                error: function() {
                    alert("Failed to load subcategories.");
                }
            });
        } else {
            // Hide subcategory and capacity containers if no category is selected
            $('#subcategoryContainer').hide();
            $('#capacityContainer').hide();
        }

        filterProducts(); // Trigger filtering after category change
    });

    // Dynamically update capacity options when subcategory changes
    $('#subcategoryContainer').on('change', "input[name='subcategory']", function() {
        resetCapacity();
        const selectedSubcategory = $(this).val();

        // Manually show capacity container based on subcategory selection
        if (selectedSubcategory) {
            $('#capacityContainer').show(); // Show capacity container

            $.ajax({
                url: '<?= base_url('catalog/getCapacities') ?>',
                type: 'GET',
                data: { subcategory: selectedSubcategory },
                success: function(response) {
                    let capacityHTML = `
                        <label class="filter-option">
                            <input type="radio" name="capacity" value="" checked>
                            Semua
                        </label>
                    `;

                    response.capacities.forEach(capacity => {
                        if (capacity.value) {
                            capacityHTML += `
                                <label class="filter-option">
                                    <input type="radio" name="capacity" value="${capacity.value}">
                                    ${capacity.value}
                                </label>
                            `;
                        } else if (capacity.size) {
                            capacityHTML += `
                                <label class="filter-option">
                                    <input type="radio" name="capacity" value="${capacity.size}">
                                    ${capacity.size}
                                </label>
                            `;
                        }
                    });

                    // Update the capacity container
                    $('#capacityContainer').html(capacityHTML);
                },
                error: function() {
                    alert("Failed to load capacity options.");
                }
            });
        } else {
            $('#capacityContainer').hide(); // Hide capacity container if no subcategory is selected
        }

        filterProducts(); // Trigger filtering after subcategory change
    });

    // Trigger filtering when capacity is changed
    $('#capacityContainer').on('change', "input[name='capacity']", function() {
        filterProducts();
    });

    // Reset subcategory and capacity filters
    function resetFilters() {
        // Reset the subcategory filter to ' ' (unselected state)
        $("input[name='subcategory']").prop('checked', false);

        // Reset the capacity filter to ' ' (unselected state)
        $("input[name='capacity']").prop('checked', false);

        // Optionally, clear the subcategory and capacity containers
        $('#subcategoryContainer').html('');
        $('#capacityContainer').html('');

        // Reset the comparison widget visibility
        $('#comparisonWidget').hide(); // Hide comparison widget initially
    }

    function resetCapacity() {
        // Reset the capacity filter to ' ' (unselected state)
        $("input[name='capacity']").prop('checked', false);

        // Optionally, clear the capacity container
        $('#capacityContainer').html('');
    }

    // Apply filters from URL on page load
    function applyFiltersFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);

        // Get category, subcategory, and capacity values from URL
        const category = urlParams.get('category');
        const subcategory = urlParams.get('subcategory');
        const capacity = urlParams.get('capacity');
        const sort = urlParams.get('sort');

        if (category) {
            $(`input[name="category"][value="${category}"]`).prop('checked', true);
            $('#categoryContainer').show(); // Show category container
        }

        if (subcategory) {
            $(`input[name="subcategory"][value="${subcategory}"]`).prop('checked', true);
            $('#subcategoryContainer').show(); // Show subcategory container
        }

        if (capacity) {
            $(`input[name="capacity"][value="${capacity}"]`).prop('checked', true);
            $('#capacityContainer').show(); // Show capacity container
        }

        if (sort) {
            $('#sort').val(sort); // Set the sort dropdown
        }
    }

    // Trigger the filter re-application on page load
    applyFiltersFromUrl();
});




</script>
<?= $this->endSection() ?>
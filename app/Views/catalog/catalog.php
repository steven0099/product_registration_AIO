<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">

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
<div class="container-fluid">
    <div class="card">
        <div class="row">
            <!-- Sidebar for Filters -->
            <div class="col-md-3">
                <!-- Sidebar Filters -->
                <div id="filters" class="mb-4" style="margin-top: 10px; margin-left: 20px;">
                    <h4>Filter Produk</h4>

                    <form id="filterForm" action="" method="GET">
                        <div id="filterSidebar" style="width: 300px; padding: 20px; background-color: #f7f7f7; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">

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
                                <div id="capacityContainer" class="filter-options" style="display: none;">
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
            <div class="col-md-9">
                <div class="row">
                    <!-- Search field on the leftmost -->
                    <div class="col-md-6 d-flex align-items-center">
                        <form id="searchAndSortForm" action="" method="GET">
                            <div class="search-container">

                                <input type="text" id="search" name="search" value="<?= esc($search) ?>" placeholder="Cari Produk..." class="form-control mr-2">
                                <button type="submit" class="search-icon">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Sort dropdown on the rightmost -->
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <div class="flex justify-between items-center">
                            <div class="text-gray-500 flex items-center cursor-pointer" id="sortButton">
                                <span>Urutkan Berdasarkan:</span>
                                <i class="fas fa-sliders-h"></i>
                            </div>
                        </div>
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
        <!-- Modal -->
        <div class="modal" id="SortModal">
            <div class="modal-content">
                <span class="close" id="closeSortModal">&times;</span>
                <h3>Sort By</h3>
                <tr>
                    <form action="" method="GET">
                        <div class="col">
                            <div class="radio-input">
                                <input checked="" id="name_asc" name="radio" type="radio" value="name_asc" />
                                <label for="name_asc">Tipe Produk A-Z</label>

                                <input id="name_desc" name="radio" type="radio" value="name_desc" />
                                <label for="name_desc">Tipe Produk Z-A</label>

                                <input id="capacity_asc" name="radio" type="radio" value="capacity_asc" />
                                <label for="capacity_asc">Kapasitas Rendah - Tinggi</label>

                                <input id="capacity_desc" name="radio" type="radio" value="capacity_desc" />
                                <label for="capacity_desc">Kapasitas Rendah - Tinggi</label>
                                <div class="glider-container">
                                    <div class="glider"></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
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

        // Dynamically update subcategory options when category changes
        $('#categoryContainer input[name="category"]').on('change', function() {

            resetFilters();

            const selectedCategory = $(this).val();

            if (selectedCategory) {
                $.ajax({
                    url: '<?= base_url('catalog/getSubcategories') ?>',
                    type: 'GET',
                    data: {
                        category: selectedCategory
                    },
                    success: function(subcategories) {
                        console.log(subcategories); // Log the subcategories to verify they're returned correctly

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

                        // Update subcategory container and show it
                        $('#subcategoryContainer').html(subcategoryHTML).show();

                        // Reset capacity container
                        $('#capacityContainer').hide(); // Hide capacity container
                        $("input[name='capacity']").prop('checked', false); // Uncheck capacity radio buttons
                        $("input[name='subcategory']").prop('checked', false); // Uncheck subcategory radio buttons
                    },
                    error: function() {
                        alert("Failed to load subcategories.");
                    }
                });
            } else {
                $('#subcategoryContainer').hide();
                $('#capacityContainer').hide();
            }

            filterProducts(); // Call filterProducts after category change
        });

        // Dynamically update capacity options when subcategory changes
        $('#subcategoryContainer').on('change', "input[name='subcategory']", function() {
            resetCapacity();
            const selectedSubcategory = $(this).val();

            console.log('Selected Subcategory:', selectedSubcategory); // Log to verify the selected subcategory

            // Show the capacity container when a subcategory is selected
            if (selectedSubcategory) {
                $('#capacityContainer').show(); // Show the capacity container

                // Fetch available capacity/ukuran options based on the selected subcategory
                $.ajax({
                    url: '<?= base_url('catalog/getCapacities') ?>',
                    type: 'GET',
                    data: {
                        subcategory: selectedSubcategory
                    },
                    success: function(response) {
                        console.log(response); // Log to verify the available capacities

                        let capacityHTML = `
                                        <label class="filter-option">
                                            <input type="radio" name="capacity" value="" checked>
                                            Semua
                                        </label>`;
                        if (response.capacities.length > 0) {
                            // Loop through the available capacities and generate the radio buttons
                            response.capacities.forEach(capacity => {
                                if (capacity.value) {
                                    // Handle capacity type
                                    capacityHTML += `
                                    <label class="filter-option">
                                        <input type="radio" name="capacity" value="${capacity.value}">
                                        ${capacity.value}
                                    </label>
                                `;
                                } else if (capacity.size) {
                                    // Handle ukuran type (with size instead of capacity_value)
                                    capacityHTML += `
                                    <label class="filter-option">
                                        <input type="radio" name="capacity" value="${capacity.size}">
                                        ${capacity.size}
                                    </label>
                                `;
                                }
                            });
                            $('#capacityContainer').html(capacityHTML); // Update the capacity container with options
                        } else {
                            $('#capacityContainer').html('<p>No capacity options available.</p>'); // Handle empty capacity case
                        }
                    },
                    error: function() {
                        alert("Failed to load capacity options.");
                    }
                });
            } else {
                $('#capacityContainer').hide(); // Hide the capacity container if no subcategory is selected
            }

            filterProducts(); // Call the filter function after the subcategory selection
        });

        // Trigger filtering when capacity is changed
        $('#capacityContainer').on('change', "input[name='capacity']", function() {
            filterProducts();
        });

        // Function to filter products based on selected filters
        function filterProducts() {
            const category = $("input[name='category']:checked").val();
            const subcategory = $("input[name='subcategory']:checked").val();
            const capacity = $("input[name='capacity']:checked").val(); // Capture the selected capacity
            const search = $('#search').val();
            const sort = $('#sort').val();

            // Log values to verify they are captured correctly
            console.log("Category:", category);
            console.log("Subcategory:", subcategory);
            console.log("Capacity:", capacity); // Verify capacity value
            console.log("Search:", search);
            console.log("Sort:", sort);

            // Show loading indicator
            $('#productGrid').html('<div class="loader">Loading...</div>');

            $.ajax({
                url: "<?= base_url('catalog/filterProducts') ?>",
                type: "GET",
                data: {
                    category: category,
                    subcategory: subcategory,
                    capacity: capacity, // Include the capacity filter in the request
                    search: search,
                    sort: sort
                },
                success: function(response) {
                    console.log("Response:", response);
                    $('#productGrid').html(response); // Replace product grid content
                },
                error: function() {
                    alert("Failed to filter products.");
                    $('#productGrid').html(''); // Clear the product grid in case of error
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

        if (categoryRadios.length > 0) {
            categoryRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    if (this.value) {
                        subcategoryContainer.style.display = 'block';
                    } else {
                        subcategoryContainer.style.display = 'none';
                        capacityContainer.style.display = 'none';
                    }
                });
            });
        }

        const subcategoryRadios = document.querySelectorAll("input[name='subcategory']");
        if (subcategoryRadios.length > 0) {
            subcategoryRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    if (this.value) {
                        capacityContainer.style.display = 'block';
                    } else {
                        capacityContainer.style.display = 'none';
                    }
                });
            });
        }
    });

    // Function to toggle the filter options
    // Function to toggle the filter options and arrow direction
    // Function to toggle the filter options and arrow direction
    document.querySelectorAll('.filter-title').forEach(function(title) {
        title.addEventListener('click', function() {
            // Get the target container for this filter
            const target = document.querySelector(title.getAttribute('data-target'));

            // Toggle the 'show' class on the target container
            target.classList.toggle('show');

            // Rotate the arrow inside the title
            if (target.classList.contains('show')) {
                title.style.setProperty('--arrow-rotate', '90deg');
            } else {
                title.style.setProperty('--arrow-rotate', '0deg');
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
                    addToComparison(productId, productName, productImage, productCategory,
                        productSubcategory, productCapacity);
                } else {
                    // Check if the selected product’s category matches the initial category
                    if (productCategory === comparisonCategory &&
                        (comparisonCategory !== "SMALL APPLIANCES" || productSubcategory ===
                            comparisonSubcategory)) {
                        addToComparison(productId, productName, productImage, productCategory,
                            productSubcategory, productCapacity);
                    } else {
                        alert(
                            "Comparison can only include products from the same category. For SMALL APPLIANCES, subcategories must also match.");
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

        widget.addEventListener('mousedown', function(e) {
            // Start dragging
            isDragging = true;
            offsetX = e.clientX - widget.getBoundingClientRect().left;
            offsetY = e.clientY - widget.getBoundingClientRect().top;

            // Change the cursor to indicate dragging
            widget.style.cursor = 'grabbing';
        });

        window.addEventListener('mousemove', function(e) {
            if (isDragging) {
                // Move the widget as the mouse moves
                var x = e.clientX - offsetX;
                var y = e.clientY - offsetY;

                widget.style.left = x + 'px';
                widget.style.top = y + 'px';
            }
        });

        window.addEventListener('mouseup', function() {
            // Stop dragging when mouse is released
            isDragging = false;
            widget.style.cursor = 'move';
        });
    }

    // Initialize the movable functionality for the comparison widget
    makeWidgetMovable('comparisonWidget');

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

    document.addEventListener("DOMContentLoaded", () => {
        const searchIconSpan = document.querySelector(".search-icon");
        const submitButton = document.querySelector(".icon-search-btn");

        submitButton.addEventListener("focusin", () => {
            searchIconSpan.textContent = "";
        });

        submitButton.addEventListener("blur", () => {
            if (submitButton.hasAttribute("aria-expanded")) return;
            searchIconSpan.textContent = "\u{E60D}";
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('search');

        // Event listener untuk menangani input pada search bar
        searchInput.addEventListener('input', function() {
            // Ambil nilai dari input
            const query = this.value;

            // Lakukan pencarian jika ada query
            if (query.length > 0) {
                // Panggil fungsi untuk memfilter produk
                searchProducts(query);
            } else {
                // Jika input kosong, bisa menampilkan semua produk atau melakukan tindakan lain
                searchProducts('');
            }
        });

        function searchProducts(query) {
            // Lakukan AJAX request atau filter produk berdasarkan query
            $.ajax({
                url: "<?= base_url('catalog/filterProducts') ?>",
                type: "GET",
                data: {
                    search: query
                },
                success: function(response) {
                    $('#productGrid').html(response); // Ganti konten grid produk dengan respons dari server
                },
                error: function() {
                    alert("Failed to filter products.");
                    $('#productGrid').html(''); // Kosongkan grid produk jika terjadi kesalahan
                }
            });
        }
    });

    // Function to toggle modal for sorting options
    var brandModal = document.getElementById("SortModal");
    var createBtn = document.getElementById("sortButton");
    var closeBrandModal = document.getElementById("closeSortModal");

    createBtn.onclick = function() {
        brandModal.style.display = "block";
    }
    closeBrandModal.onclick = function() {
        brandModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == brandModal) {
            brandModal.style.display = "none";
        }
    }

    document.getElementById('sortButton').addEventListener('click', function() {
        document.getElementById('SortModal').classList.toggle('active');
    });
</script>
<?= $this->endSection() ?>
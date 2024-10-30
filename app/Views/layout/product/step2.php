<!-- product_specification.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Specification - Step 2</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Step 2: Product Specifications</h2>
        <form action="<?= base_url('product/saveStep2') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Product Dimensions -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="produk_p">Product Length (P)</label>
                    <input type="text" name="produk_p" class="form-control" id="produk_p" placeholder="Enter length" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="produk_l">Product Width (L)</label>
                    <input type="text" name="produk_l" class="form-control" id="produk_l" placeholder="Enter width" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="produk_t">Product Height (T)</label>
                    <input type="text" name="produk_t" class="form-control" id="produk_t" placeholder="Enter height" required>
                </div>
            </div>

            <!-- Package Dimensions -->
            <h4>Package Dimensions</h4>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="kemasan_p">Package Length (P)</label>
                    <input type="text" name="kemasan_p" class="form-control" id="kemasan_p" placeholder="Enter length" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="kemasan_l">Package Width (L)</label>
                    <input type="text" name="kemasan_l" class="form-control" id="kemasan_l" placeholder="Enter width" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="kemasan_t">Package Height (T)</label>
                    <input type="text" name="kemasan_t" class="form-control" id="kemasan_t" placeholder="Enter height" required>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="form-group">
                <label for="berat">Weight</label>
                <input type="text" name="berat" class="form-control" id="berat" placeholder="Enter weight" required>
            </div>
            <div class="form-group">
                <label for="daya">Power Consumption</label>
                <input type="text" name="daya" class="form-control" id="daya" placeholder="Enter power consumption" required>
            </div>
            <div class="form-group">
                <label for="pembuat">Manufacturer</label>
                <input type="text" name="pembuat" class="form-control" id="pembuat" placeholder="Enter manufacturer" required>
            </div>

            <!-- Refrigrant Dropdown -->
            <div class="form-group">
                <label for="refrigrant_id">Refrigrant Type</label>
                <select name="refrigrant_id" id="refrigrant_id" class="form-control" required>
                    <option value="">Select Refrigrant Type</option>
                    <?php foreach ($refrigrant as $ref): ?>
                        <option value="<?= $ref['id'] ?>"><?= $ref['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Conditional Fields Based on Category (e.g., cooling capacity) -->
            <div class="form-group" id="coolingCapacityField" style="display: none;">
                <label for="cooling_capacity">Cooling Capacity</label>
                <input type="text" name="cooling_capacity" class="form-control" id="cooling_capacity" placeholder="Enter cooling capacity">
            </div>

            <!-- Next Button -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show/hide additional fields based on the category selection in Step 1
            const category_id = "<?= session()->get('step1')['category_id'] ?>";
            if (category_id === '5') { // Example category ID
                $('#coolingCapacityField').show();
            }
        });
    </script>
</body>

</html>
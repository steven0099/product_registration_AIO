<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 30px 10px;
        }

        .header img {
            max-height: 150px;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .filter-sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            text-align: center;
            padding: 15px;
            margin-bottom: 10px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <img src="/images/aio-magang.png" alt="Logo" class="mb-3">
            <h1>Katalog Produk</h1>
        </div>
    </div>
    <div class="container">
        <div>
            <input type="text" class="search-bar" placeholder="Cari produk...">
        </div>

        <style>
            .search-bar {
                background-color: #f0f0f0;
                /* Warna abu-abu terang */
                border: 1px solid #ccc;
                /* Warna border abu-abu */
                padding: 8px;
                /* Jarak dalam */
                border-radius: 5px;
                /* Sudut melengkung */
                width: 100%;
                /* Sesuaikan dengan lebar container */
                box-sizing: border-box;
                /* Supaya padding tidak melebihi lebar */
            }
        </style>

        <div class="container mt-5">
            <div class="row">
                <!-- Sidebar Filter -->
                <div class="col-md-3">
                    <div class="filter-sidebar">
                        <h5>Filter Produk</h5>
                        <form>
                            <div class="mb-3">
                                <label for="category" class="form-label">Brand</label>
                                <select class="form-select" id="category">
                                    <option value="all">Semua</option>
                                    <option value="ac">GREE</option>
                                    <option value="tv">SHARP</option>
                                    <option value="kulkas">SAMSUNG</option>
                                    <option value="freezer">RSA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori Produk</label>
                                <select class="form-select" id="category">
                                    <option value="all">Semua</option>
                                    <option value="ac">AC</option>
                                    <option value="tv">TV</option>
                                    <option value="kulkas">Kulkas</option>
                                    <option value="freezer">Freezer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Sub Kategori Produk</label>
                                <select class="form-select" id="subcategory">
                                    <option value="all">Semua</option>
                                    <option value="split">GREE AC 2 PK</option>
                                    <option value="inverter">SHARP TV 32 INCH</option>
                                    <option value="large"> SAMSUNG KULKAS 2 PINTU</option>
                                    <option value="large">RSA FREEZER 199 LITER</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Ukuran / Kapasitas</label>
                                <select class="form-select" id="size">
                                    <option value="all">Semua</option>
                                    <option value="small">PK</option>
                                    <option value="large">INCH</option>
                                    <option value="large">TABUNG</option>
                                    <option value="large">LITER</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                        </form>
                    </div>
                </div>

                <!-- Product List -->
                <div class="col-md-9">
                    <div class="row">
                        <!-- Contoh produk -->
                        <?php for ($i = 0; $i < 1; $i++): ?>
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="/images/gree.webp" alt="Produk" style="width:200px">
                                    <h5 class="mt-2">GREE</h5>
                                    <p>AC - 2 PK</p>
                                    <div class="d-flex justify-content-center">
                                        <input type="checkbox" class="me-2">
                                        <button type="submit" class="btn btn-primary" style="margin-right:20px">Bandingkan</button>
                                        <button type="submit" class="btn btn-primary">Lihat Detail</button>


                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>




                        <?php for ($i = 0; $i < 1; $i++): ?>
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="/images/tv.jpg" alt="Produk">
                                    <h5 class="mt-2">SHARP</h5>
                                    <p>TV - 32 INCH</p>
                                    <div class="d-flex justify-content-center">
                                        <input type="checkbox" class="me-2">
                                        <button type="submit" class="btn btn-primary" style="margin-right:20px">Bandingkan</button>
                                        <button type="submit" class="btn btn-primary">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>


                        <?php for ($i = 0; $i < 1; $i++): ?>
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="/images/kulkas.avif" alt="Produk">
                                    <h5 class="mt-2">SAMSUNG</h5>
                                    <p>Kulkas - 2 Pintu</p>
                                    <div class="d-flex justify-content-center">
                                        <input type="checkbox" class="me-2">
                                        <button type="submit" class="btn btn-primary" style="margin-right:20px">Bandingkan</button>
                                        <button type="submit" class="btn btn-primary">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <?php for ($i = 0; $i < 1; $i++): ?>
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="/images/freezer.avif" alt="Produk">
                                    <h5 class="mt-2">RSA</h5>
                                    <p>Freezer - 199 Liter</p>
                                    <div class="d-flex justify-content-center">
                                        <input type="checkbox" class="me-2">
                                        <button type="submit" class="btn btn-primary" style="margin-right:20px">Bandingkan</button>
                                        <button type="submit" class="btn btn-primary">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
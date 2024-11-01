<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
    <title><?= $this->renderSection('title') ?> - AIO</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="/product-asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/product-asset/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/product-asset/assets/css/themify-icons.css" rel="stylesheet">

    <style>
        input[type="text"],
        input[type="file"],
        input[type="number"],
        input[type="video"] {
            border: 2px solid #00BFFF;
            /* Warna biru */
            border-radius: 5px;
            /* Membuat sudut sedikit melengkung */
            padding: 10px;
            /* Menambahkan jarak di dalam input */
            outline: none;
            /* Menghilangkan outline default */
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            /* Menambahkan efek bayangan */
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="number"]:focus,
        input[type="video"]:focus {
            border-color: #1E90FF;
            /* Warna biru yang lebih tua saat input difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan yang lebih terang saat difokuskan */
        }

        select {
            border: 2px solid #00BFFF !important;
            /* Warna biru */
            border-radius: 5px;
            padding: 10px;
            padding-right: 40px;
            /* Tambahkan jarak untuk icon custom */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 191, 255, 0.5);
            /* Menambahkan efek bayangan */
            appearance: none;
            /* Menghilangkan default arrow */
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140 140"><polygon points="70,100 100,40 40,40" style="fill:%2300BFFF"/></svg>') no-repeat right 10px center !important;
            background-color: white;
            /* Warna latar belakang */
            background-size: 20px;
            /* Ukuran icon */
            cursor: pointer;
        }

        select:focus {
            border-color: #1E90FF;
            /* Warna biru yang lebih tua saat difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan lebih terang */
        }

        .logo {
            justify-content: flex-start;
            display: flex;
        }

        .title {
            justify-content: end;
            align-items: center;
            display: flex;
        }

        .divider {
            margin: 0 5px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .unit {
            margin-left: 10px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .col-form-label {
            text-align: right;
        }

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


        @media (max-width: 600px) {

            .logo,
            .title {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="image-container set-full-height" style="background-color: #00a9ee">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">


                            <div class="wizard-header" style="text-align: center;weight: 7000;">
                                <div class="row" style=" height: 135px; align-content: center">
                                    <div class="col-sm-5 col-sm-offset-1 logo">
                                        <img src="<?= base_url('images/logo.png') ?>" style="max-height: 70px;">
                                    </div>
                                    <div class="col-sm-5 title">
                                        <h3 class="" style="font-weight: 700;margin-top: 0;font-family: 'Poppins', sans-serif;">Form Registrasi Produk</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#general" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            General Data
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#type" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Spesifikasi Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#facilities" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Keunggulan Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#description" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Foto Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#confirmation" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Konfirmasi Produk
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="confirmation">
                                    <div class="row">
                                        <h5 class="info-text"> Harap Konfirmasi Kembali Produk Anda. </h5>

                                        <table class="table table-striped table-bordered table-hover confirmation-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Field</th>
                                                    <th>Value</th>
                                                    <th>Field</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Merek</td>
                                                    <td id="brand_nameDisplay"><?= esc($data['brand_name']) ?>
                                                        <button data-field-name="brand" data-field-label="Brand" data-field-value="<?= $data['brand_id'] ?>" class="btn btn-sm btn-primary edit-button">Edit Brand</button>
                                                    </td>
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
                                                        <?php foreach (['gambar_depan', 'gambar_belakang', 'gambar_atas', 'gambar_bawah', 'gambar_samping_kiri', 'gambar_samping_kanan'] as $image): ?>
                                                            <a href="<?= base_url('uploads/' . esc($data[$image])) ?>" target="_blank"> <?= ucfirst(str_replace('_', ' ', $image)) ?></a><br>
                                                        <?php endforeach; ?>
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
                                                    <tr>
                                                        <td>Dimensi Produk dengan Stand</td>
                                                        <td><?= esc($data['pstand_dimension']) ?> cm</td>
                                                        <td>Ukuran</td>
                                                        <td><?= esc($data['ukuran_size']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Resolusi Panel</td>
                                                        <td><?= esc($data['panel_resolution']) ?> Pixel</td>
                                                        <td>Garansi Panel</td>
                                                        <td><?= esc($data['garansi_panel_value']) ?> Tahun</td>
                                                    </tr>

                                                <?php elseif ($data['category_id'] == '5'): ?>
                                                    <!-- Additional category-specific rows -->

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

                                            </tbody>
                                        </table>

                                        <p class="font-weight-bold">Submitted by: <?= esc($data['submitted_by']) ?></p>

                                        <div class="note text-danger font-italic">*Harap dicek kembali.</div>



                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <!-- Confirm Submission Form -->
                                    <form method="post" action="<?= base_url('product/confirmSubmission') ?>">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="submitted_by" value="<?= session()->get('name') ?>">
                                        <!-- User name from session -->
                                        <input type="hidden" name="status" value="confirmed">
                                        <input type="hidden" name="confirmed_at" value="<?= date('Y-m-d H:i:s') ?>">
                                        <!-- Use standard format -->
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name="confirm" value="Finish" onclick="showThankYouModal(event)" />
                                        <!-- <button type="submit" name="confirm" value="selesai" class="btn btn-success" onclick="showThankYouModal(event)">Selesai</button> -->
                                    </form>
                                    <!-- <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' /> -->
                                </div>

                                <div class="pull-left">
                                    <!-- Back Button -->
                                    <!-- <a href="<?= site_url('product/step1') ?>" class="btn btn-secondary">Kembali</a> -->

                                    <input type='button' class='btn btn-previous btn-default btn-wd' href="<?= site_url('layout/product/product_regis_step1') ?>" name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Copyright &copy; 2024 AIO. All rights reserved.
            </div>
        </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src="/product-asset/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/product-asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/product-asset/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="/product-asset/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
<script src="/product-asset/assets/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    // Function to show the thank you modal
    function showThankYouModal(event) {
        event.preventDefault(); // Prevent default form submission

        // Implement your thank you modal logic here
        // Example: Show a modal thanking the user for their submission
    }
</script>




</html>
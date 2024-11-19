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

        .disabled-link {
            pointer-events: none;
            /* Disables click events */
            color: gray;
            /* Optional: make it look disabled */
            cursor: not-allowed;
            /* Change cursor to indicate it's disabled */
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
                                        <h3 class=""
                                            style="font-weight: 700;margin-top: 25px;font-family: 'Poppins', sans-serif;">
                                            Form Registrasi Produk</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"
                                        aria-valuemax="4" style="width: 15%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#general" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            General Data
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#specification" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Spesifikasi Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#advantages" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Keunggulan Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#photos" data-toggle="tab" onclick="history.back();">
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
                                        <table
                                            class="table table-striped table-bordered table-hover confirmation-table">
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
                                                    <td id="brand_nameDisplay"><?= esc($data['brand_name']) ?></td>
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
                                                    <td>Subkategori</td>
                                                    <td><?= esc($data['subcategory_name']) ?></td>
                                                    <td>Warna</td>
                                                    <td><?= esc($data['color']) ?></td>
                                                </tr>
                                                <!-- Conditional Fields -->
                                                <?php if ($data['category_id'] == '9'): ?>
                                                    <tr>
                                                        <td>Dimensi Produk dengan Stand</td>
                                                        <td><?= esc($data['pstand_dimension']) ?></td>
                                                        <td>Resolusi Panel</td>
                                                        <td><?= esc($data['panel_resolution']) ?> Pixel</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Panel</td>
                                                        <td><?= esc($data['garansi_panel_value']) ?> Tahun</td>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ukuran</td>
                                                        <td><?= esc($data['ukuran_size']) ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if ($data['category_id'] == '5'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas Pendinginan</td>
                                                        <td><?= esc($data['cooling_capacity']) ?> BTU/h</td>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Kompresor</td>
                                                        <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
                                                        <td>Tipe Refrigerant</td>
                                                        <td><?= esc($data['refrigrant_type']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
                                                        <td>CSPF Rating</td>
                                                        <td><?= esc($data['cspf']) ?></td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['category_id'] == '3' || $data['category_id'] == '4' || $data['category_id'] == '7'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Kompresor</td>
                                                        <td><?= esc($data['compressor_warranty_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['category_id'] == '6' || $data['subcategory_id'] == '49' || $data['subcategory_id'] == '53'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Motor</td>
                                                        <td><?= esc($data['garansi_motor_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['subcategory_id'] == '31'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Ukuran</td>
                                                        <td><?= esc($data['ukuran_size']) ?></td>
                                                        <td>Garansi Semua Service</td>
                                                        <td><?= esc($data['garansi_semua_service_value']) ?> Tahun</td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['subcategory_id'] == '32'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Ukuran</td>
                                                        <td><?= esc($data['ukuran_size']) ?></td>
                                                        <td>Garansi Motor</td>
                                                        <td><?= esc($data['garansi_motor_value']) ?> Tahun</td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['subcategory_id'] == '35' || $data['subcategory_id'] == '36'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas Air Dingin</td>
                                                        <td><?= esc($data['kapasitas_air_dingin']) ?> Liter</td>
                                                        <td>Kapasitas Air Panas</td>
                                                        <td><?= esc($data['kapasitas_air_panas']) ?> Liter</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Kompresor</td>
                                                        <td><?= esc($data['compressor_warranty_value']) ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php if ($data['subcategory_id'] == '33' || $data['subcategory_id'] == '34' || $data['subcategory_id'] == '37' || $data['subcategory_id'] == '38' || $data['subcategory_id'] == '41' || $data['subcategory_id'] == '44'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Elemen Panas</td>
                                                        <td><?= esc($data['garansi_elemen_panas_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart & Jasa Service</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '42'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Garansi Elemen Panas</td>
                                                        <td><?= esc($data['garansi_elemen_panas_value']) ?> Tahun</td>
                                                        <td>Garansi Service</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '43'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Elemen Panas</td>
                                                        <td><?= esc($data['garansi_elemen_panas_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Service</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '45' || $data['subcategory_id'] == '46' || $data['subcategory_id'] == '54'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Jasa Service</td>
                                                        <td><?= esc($data['garansi_semua_service_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '47' || $data['subcategory_id'] == '50' || $data['subcategory_id'] == '51'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Ukuran</td>
                                                        <td><?= esc($data['ukuran_size']) ?></td>
                                                        <td>Garansi Service</td>
                                                        <td><?= esc($data['garansi_semua_service_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '48'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['capacity_value']) ?></td>
                                                        <td>Garansi Elemen Panas</td>
                                                        <td><?= esc($data['garansi_elemen_panas_value']) ?> Tahun</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi Sparepart</td>
                                                        <td><?= esc($data['sparepart_warranty_value']) ?> Tahun</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if ($data['subcategory_id'] == '52'): ?>
                                                    <!-- For category AC (ID 3): Display "kapasitas pendinginan", "cspf rating", "tipe refrigerant" -->
                                                    <tr>
                                                        <td>Kapasitas</td>
                                                        <td><?= esc($data['kapasitas_air_dingin']) ?> M²</td>
                                                        <td>Garansi Sparepart & Jasa Service</td>
                                                        <td><?= esc($data['garansi_semua_service_value']) ?> Tahun</td>
                                                    </tr>
                                                <?php endif; ?>
                                                <!-- Default Fields -->
                                                <tr>
                                                    <td>Dimensi Produk</td>
                                                    <td><?= esc($data['produk_p']) ?> x <?= esc($data['produk_l']) ?> x
                                                        <?= esc($data['produk_t']) ?> cm</td>
                                                    <td>Dimensi Kemasan</td>
                                                    <td><?= esc($data['kemasan_p']) ?> x <?= esc($data['kemasan_l']) ?>
                                                        x <?= esc($data['kemasan_t']) ?> cm</td>
                                                </tr>
                                                <tr>
                                                    <td>Berat Unit</td>
                                                    <td><?= esc($data['berat']) ?> Kg</td>
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
                                                    <td>Foto Produk</td>
                                                    <td colspan="3">
                                                        <!-- Front Image -->
                                                        <div
                                                            style="display: inline-block; margin-right: 10px; text-align: center;">
                                                            <img src="<?= base_url('uploads/' . esc($data['gambar_depan'])) ?>"
                                                                style="width: 100px; height: auto;" alt="Gambar Depan">
                                                            <div>Gambar Depan</div>
                                                        </div>

                                                        <!-- Back Image -->
                                                        <div
                                                            style="display: inline-block; margin-right: 10px; text-align: center;">
                                                            <?php if (!empty($data['gambar_belakang'])): ?>
                                                                <img src="<?= base_url('uploads/' . esc($data['gambar_belakang'] ?? '')) ?>"
                                                                    style="width: 100px; height: auto;"
                                                                    alt="Gambar Belakang">
                                                                <div>Gambar Belakang</div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <!-- Other Images -->
                                                        <?php foreach (['gambar_atas', 'gambar_bawah', 'gambar_samping_kiri', 'gambar_samping_kanan'] as $image): ?>
                                                            <?php if (!empty($data[$image])): // Check if the image is set and not empty 
                                                            ?>
                                                                <div
                                                                    style="display: inline-block; margin-right: 10px; text-align: center;">
                                                                    <img src="<?= base_url('uploads/' . esc($data[$image])) ?>"
                                                                        style="width: 100px; height: auto;"
                                                                        alt="<?= ucfirst(str_replace('_', ' ', $image)) ?>">
                                                                    <div><?= ucfirst(str_replace('_', ' ', $image)) ?></div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                </tr>
                                                <tr>
                                                    </td>
                                                    <?php if (!empty($data['video_produk'])): ?>
                                                        <td>Video Produk</td>
                                                        <td>
                                                            <a href="<?= esc($data['video_produk'] ?? '') ?>" target="_blank">Tonton Video Produk</a>
                                                        <?php endif; ?>
                                                        </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- Submission Information -->
                                        <p class="font-weight-bold">Diajukan Atas Nama: <?= esc($data['submitted_by']) ?></p><br>
                                        <a href="/reset/reset-password" style="margin-right:50px">Ganti Password</a><br>
                                        <div class="note text-danger font-italic">*Harap dicek kembali.</div>

                                    </div> <!-- End of row -->
                                </div> <!-- End of confirmation tab -->
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <!-- Confirm Submission Form -->
                                    <form action="confirmSubmission" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="submitted_by" value="<?= session()->get('name') ?>">
                                        <!-- User name from session -->
                                        <input type="hidden" name="status" value="confirmed">
                                        <input type="hidden" name="confirmed_at" value="<?= date('Y-m-d H:i:s') ?>">
                                        <!-- Use standard format -->
                                        <!-- <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name="confirm" value="Finish" onclick="showThankYouModal(event)" /> -->
                                        <button type="submit" name="confirm" value="selesai"
                                            class="btn btn-finish btn-fill btn-danger btn-wd">Konfirmasi Produk</button>
                                    </form>

                                    <!-- <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' /> -->
                                </div>

                                <div class="pull-left">
                                    <!-- Back Button -->


                                    <input type='button' class='btn btn-previous btn-default btn-wd'
                                        onclick="history.back();" name='previous' value='Kembali' />
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
    $(document).ready(function() {
        $('a[href="#confirmation"]').tab('show'); // Activate the confirmations tab
    });
    // Function to open the edit modal
    function openEditModal(fieldName, fieldLabel, fieldValue) {
        // Set the field name and label
        document.getElementById('fieldName').value = fieldName;
        document.getElementById('fieldLabel').innerText = fieldLabel;

        // Determine if the field should be a dropdown or a text input
        if (fieldName === 'brand') {
            // Assuming you want to populate the dropdown dynamically for brands
            populateBrandDropdown(fieldValue);
            document.getElementById('fieldDropdown').style.display = 'block';
            document.getElementById('inputFieldContainer').querySelector('input').style.display = 'none';
        } else {
            // For other fields, show the text input
            document.getElementById('fieldValue').value = fieldValue;
            document.getElementById('fieldValue').style.display = 'block';
            document.getElementById('inputFieldContainer').querySelector('select').style.display = 'none';
        }

        // Show the modal
        document.getElementById('editModal').style.display = 'flex'; // Change to 'flex' to center it
    }

    $(document).ready(function() {
        // Fetch brands and populate the dropdown
        $.ajax({
            url: '/ProductController/fetchBrands', // Update with the correct URL to your controller
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var $brandDropdown = $('#brandDropdown'); // Update with the actual ID of your dropdown

                // Clear existing options
                $brandDropdown.empty();

                // Append a default option
                $brandDropdown.append('<option value="">Select a brand</option>');

                // Populate dropdown with brand names
                data.forEach(function(brand) {
                    $brandDropdown.append('<option value="' + brand.id + '">' + brand.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching brands:', error);
            }
        });
    });

    function populateBrandDropdown(selectedValue, brands) {
        const dropdown = document.getElementById('fieldDropdown');
        dropdown.innerHTML = ''; // Clear existing options
        brands.forEach(brand => {
            const option = document.createElement('option');
            option.value = brand.id;
            option.textContent = brand.name;
            if (brand.id == selectedValue) {
                option.selected = true; // Set the current brand as selected
            }
            dropdown.appendChild(option);
        });
    }


    // Update the field function
    function updateField() {
        const fieldName = document.getElementById('fieldName').value;
        const productId = document.getElementById('productId').value;
        let fieldValue;

        // Determine whether to get value from input or dropdown
        if (fieldName === 'brand') {
            fieldValue = document.getElementById('fieldDropdown').value;
        } else {
            fieldValue = document.getElementById('fieldValue').value;
        }
    };
    // AJAX request to update the field on the server
    fetch(`<?= base_url('product/updateField') ?>`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                fieldName: fieldName,
                productId: productId,
                fieldValue: fieldValue
            })
        })

        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Field updated successfully');
                // Optionally close the modal here
                closeEditModal();
            } else {
                alert('Failed to update field');
            }
        })
        .catch(error => console.error('Error updating field:', error));


    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Attach this function to the close button
    document.querySelector('.close').onclick = closeEditModal;

    // Event listener for edit buttons
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', (event) => {
            const fieldName = event.currentTarget.getAttribute('data-field-name');
            const fieldLabel = event.currentTarget.getAttribute('data-field-label');
            const fieldValue = event.currentTarget.getAttribute('data-field-value');
            openEditModal(fieldName, fieldLabel, fieldValue);
        });
    });

    // Function to show the thank you modal
    function showThankYouModal(event) {
        event.preventDefault(); // Prevent default form submission

        // Implement your thank you modal logic here
        // Example: Show a modal thanking the user for their submission
    }
</script>




</html>
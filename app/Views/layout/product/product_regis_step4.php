<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
    <title>Foto Produk - AIO</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="/product-asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/product-asset/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/product-asset/assets/css/themify-icons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>

input.form-control:-webkit-autofill {
    box-shadow:  0 0 8px rgba(30, 144, 255, 0.7),
                0 0 0 30px white inset !important; /* White background for content */
    -webkit-text-fill-color: #000 !important; /* Default text color */
    border: 2px solid #00bfff; /* Blue border */
    transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out; /* Smooth transition */
}

input.form-control:-webkit-autofill:focus {
    box-shadow: 0 0 8px rgba(30, 144, 255, 0.7),
                0 0 0 30px white inset !important; /* White background for content */
    -webkit-text-fill-color: #000 !important; /* Default text color */
    border: 2px solid #00bfff; /* Blue border */
    transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out; /* Smooth transition */
}
/* For valid autofill (if manually validated with Bootstrap classes) */
input.form-control:-webkit-autofill.form-control.valid {
    box-shadow: 0 0 5px rgba(0, 191, 255, 0.5),
                0 0 0 30px white inset !important; /* White background for content */
    -webkit-text-fill-color: #000 !important; /* Default text color */
    border: 2px solid rgba(0, 191, 255, 0.8); /* Blue border */
    border-color: #00bfff;
    transition: box-shadow 0.3s ease-in-out, border 0.3s ease-in-out; /* Smooth transition */
}
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
            background-color:#fff;
            color:#000;
            /* Menambahkan efek bayangan */
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        input[type="number"]:focus,
        input[type="video"]:focus {
            border: 2px solid #00bfff;
            /* Warna biru yang lebih tua saat input difokuskan */
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan yang lebih terang saat difokuskan */
        }

        input[type="file"].image-uploaded {
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.7);
            /* Bayangan tetap sama setelah upload */
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

        .disabled-link {
            pointer-events: none;
            /* Disables click events */
            color: gray;
            /* Optional: make it look disabled */
            cursor: not-allowed;
            /* Change cursor to indicate it's disabled */
        }

        .icon-circle.filled {
            border-color: #00a9ee;
            /* Ganti dengan warna tema Anda */
        }

        .ti-package.filled {
            color: #00a9ee;
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
                                        <img src="<?= base_url('images/aio-new.png') ?>" style="max-height: 70px;">
                                    </div>
                                    <div class="col-sm-5 title">
                                        <h3 class="" style="font-weight: 700;margin-top: 25px;font-family: 'Poppins', sans-serif;">Form Registrasi Produk</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#general" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package filled"></i>
                                            </div>
                                            <span style="color: #00a9ee;">Informasi Umum</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#specification" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle filled">
                                                <i class="ti-package filled"></i>
                                            </div>
                                            <span style="color: #00a9ee;">Spesifikasi Produk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#advantages" data-toggle="tab" onclick="history.back();">
                                            <div class="icon-circle filled">
                                                <i class="ti-package filled"></i>
                                            </div>
                                            <span style="color: #00a9ee;">Keunggulan Produk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#photos" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Foto Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#confirmation" data-toggle="tab" class="disabled-link">
                                            <div class="icon-circle">
                                                <i class="ti-package"></i>
                                            </div>
                                            Konfirmasi Produk
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <?php if (session()->getFlashdata('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="save-step4" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="tab-content">
                                    <div class="tab-pane" id="photos">

                                        <div class="row" style="margin: 25px;">
                                            <!-- Left Column -->
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="gambar_depan">Gambar Tampak Depan</label>
                                                    <input type="file" id="gambar_depan" name="gambar_depan" value="<?= session()->get("step4")["gambar_depan"] ?? '' ?>" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar_samping_kanan">Gambar Tampak Samping Kanan</label>
                                                    <input type="file" id="gambar_samping_kanan" name="gambar_samping_kanan" value="<?= session()->get("step4")["gambar_samping_kanan"] ?? '' ?>" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar_atas">Gambar Tampak Atas</label>
                                                    <input type="file" id="gambar_atas" name="gambar_atas" value="<?= session()->get("step4")["gambar_atas"] ?? '' ?>" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="video_produk">Video Produk (YouTube Link)</label>
                                                    <input type="text" id="video_produk" name="video_produk" value="<?= session()->get("step4")["video_produk"] ?? '' ?>" class="form-control" placeholder="https://www.youtube.com/watch?v=XXXXXXXXX" pattern="^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$">
                                                </div>

                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="gambar_belakang">Gambar Tampak Belakang</label>
                                                    <input type="file" id="gambar_belakang" name="gambar_belakang" value="<?= session()->get("step4")["gambar_belakang"] ?? '' ?>" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar_samping_kiri">Gambar Tampak Samping Kiri</label>
                                                    <input type="file" id="gambar_samping_kiri" name="gambar_samping_kiri" value="<?= session()->get("step4")["gambar_samping_kiri"] ?? '' ?>" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar_bawah">Gambar Tampak Bawah</label>
                                                    <input type="file" id="gambar_bawah" name="gambar_bawah" value="<?= session()->get("step4")["gambar_bawah"] ?? '' ?>" class="form-control">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <!-- Submit Button -->
                                        <input type='submit' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Selanjutnya' style="margin-right: 25px;" />
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Konfirmasi' />
                                    </div>

                                    <div class="pull-left">

                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Kembali' style="margin-left: 25px;" onclick="history.back();" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <p class="form-note" style="margin-left: 46px;"><span style="color: red;">*</span>Harap diisi dengan benar</p>

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
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

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
        $('a[href="#photos"]').tab('show'); // Activate the upload photos tab
    });

    document.querySelector('form').addEventListener('submit', function() {
        const fileInput = document.querySelector('input[type="file"]');
        if (fileInput.files.length > 0) {
            fileInput.classList.add('image-uploaded'); // Tambahkan kelas untuk menandai bahwa gambar telah di-upload
        }
    });
</script>

</html>
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
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Full height of the viewport */
            margin: 0;
            /* Remove default margin */
            background-color: rgba(0, 0, 0, 0.7);
            /* Background color */
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 80%;
            /* Almost full width */
            max-width: 600px;
            /* Maximum width */
        }

        .image-container {
            display: flex;
            /* Use flexbox to arrange images in a row */
            align-items: center;
            /* Center items vertically */
            justify-content: center;
            /* Center the images horizontally */
            margin-bottom: 20px;
            /* Space below the images */
        }

        img {
            max-width: 100%;
            /* Ensure images are responsive */
            height: auto;
            /* Maintain aspect ratio */
        }

        .logo {
            max-height: 70px;
            /* Set maximum height for logo */
            margin-right: 20px;
            /* Space between logo and robot image */
        }

        .robot-image {
            max-height: 200px;
            /* Set maximum height for robot image */
        }

        .button-container {
            display: flex;
            /* Use flexbox for button layout */
            justify-content: space-between;
            /* Space buttons to the left and right */
            margin-top: 20px;
            /* Space above the buttons */
        }

        .button {
            width: calc(50% - 10px);
            /* Make button take half the width minus some spacing */
            padding: 10px;
            background-color: #002a46;
            /* Ubah warna latar belakang tombol */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #001f30;
            /* Warna lebih gelap saat hover */
        }

        .title {
            justify-content: end;
            align-items: center;
            display: flex;
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

        <div class="content">
            <div class="image-container">
                <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo">
                <img src="<?= base_url('images/Pose_25.png') ?>" alt="Robot" class="robot-image">
            </div>

            <div class="button-container">
                <button class="button" onclick="location.href='/product/step1'">Tambah Produk Baru</button>
                <button class="button" onclick="location.href='/logout'">Keluar Akun</button>

            </div>
        </div>


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
        $('a[href="#photos"]').tab('show'); // Activate the upload photos tab
    });
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan file CSS Anda -->
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
            width: 100%;
            /* Almost full width */
            max-width:720px;
            height: 560px;
            /* Maximum width */
        }

        .image-container {
            margin-top:120px;
            display: flex;
            /* Use flexbox to arrange images in a row */
            align-items: center;
            /* Center items vertically */
            justify-content: center;
            /* Center the images horizontally */
            margin-bottom: 30px;
            /* Space below the images */
        }

        img {
            width: 100%;
            /* Ensure images are responsive */
            max-height: auto;
            /* Maintain aspect ratio */
        }

        .logo {
            max-height: 75px;
            width:125px;
            /* Set maximum height for logo */
            margin-right: 20px;
            margin-left:20px
            /* Space between logo and robot image */
        }

        .robot-image {
            max-height: 375px;
            width: 270px;
            /* Set maximum height for robot image */
        }

        .button-container {
            display: flex;
            /* Use flexbox for button layout */
            justify-content: space-between;
            bottom:160px;
            width:40%;
            right:410px;
            position:absolute;
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
    </style>
</head>

<body>

    <div class="content">
        <div class="image-container">
            <img src="<?= base_url('images/aio-new.png') ?>" alt="Logo" class="logo">
            <img src="<?= base_url('images/Pose_25.png') ?>" alt="Robot" class="robot-image">
        </div>

        <div class="button-container">
            <button class="button" onclick="location.href='/product/step1'">Tambah Produk Baru</button>
            <button class="button" onclick="location.href='/logout'">Keluar Akun</button>
        </div>
    </div>

</body>

</html>
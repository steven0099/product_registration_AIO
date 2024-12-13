<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="/product-asset/assets/img/icon.png" />
    <title><?= $this->renderSection('title') ?> - AIO</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/style.css"> <!-- Tambahkan file CSS Anda -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            /* White background */
        }

        body {
            min-height: 100vh;
            /* Full viewport height */
        }

        .content {
            background-color: #fff;
            padding: 40px;
            /* Increased padding */
            border-radius: 10px;
            text-align: center;
            width: 90%;
            /* Increased width for larger screens */
            max-width: 800px;
            /* Larger max-width for bigger content */
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            /* Increased margin for spacing */
        }

        .logo {
            max-height: 80px;
            /* Increased height for the logo */
            padding: 20px;
        }

        .robot-image {
            max-height: 250px;
            /* Increased height for the robot image */
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            /* Increased margin for spacing */
        }

        .button {
            width: calc(50% - 15px);
            /* Slightly larger button width */
            padding: 10px;
            /* Increased padding for larger buttons */
            font-size: 1.1em;
            /* Larger font size */
            background-color: #002a46;
            color: white;
            border: none;
            border-radius: 8px;
            /* Slightly rounded corners */
            cursor: pointer;
        }

        .button:hover {
            background-color: #001f30;
            /* Darker color on hover */
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="image-container" style="margin-bottom: 20px;">
            <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo">
            <img src="<?= base_url('images/Pose_25.png') ?>" alt="Robot" class="robot-image">
        </div>

        <div class="button-container">
            <button class="button" onclick="location.href='/product/step1'">Tambah Produk Baru</button>
            <button class="button" onclick="location.href='/logout'">Keluar Akun</button>
        </div>
    </div>

</body>

</html>
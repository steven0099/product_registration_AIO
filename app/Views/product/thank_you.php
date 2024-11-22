<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Add your CSS file -->
    <style>
        /* Basic styles for the modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 80%; /* Almost full width */
            max-width: 600px; /* Maximum width */
            animation: floatDown 1s ease; /* Animation for floating down */
        }

        @keyframes floatDown {
            0% {
                transform: translateY(-50px); /* Start slightly above */
                opacity: 0; /* Start invisible */
            }
            100% {
                transform: translateY(0); /* End at original position */
                opacity: 1; /* Fully visible */
            }
        }

        .button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>

<div class="modal">
    <div class="modal-content">
        <h1>Terima Kasih</h1>
        <p>Produk sudah terkonfirmasi dan akan diproses lebih lanjut</p>
        <button class="button" onclick="location.href='/logout'">Log Out</button>
        <button class="button" onclick="location.href='/product/step1'">Tambah Produk Lain</button>
    </div>
</div>

</body>
</html>

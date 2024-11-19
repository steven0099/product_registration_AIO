<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Center the form on the page */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f6f8;
}

/* Form container styling */
form {
    background-color: #ffffff;
    padding: 30px;
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form title */
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form labels */
form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Form inputs */
form input[type="text"],
form input[type="email"],
form input[type="password"],
form input[type="tel"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #555;
}

/* Textarea resizing */
form textarea {
    resize: vertical;
}

/* Button styling */
form button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
form button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Validation error styling */
form .error {
    color: #d9534f;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 15px;
}

/* Responsive styling for mobile */
@media (max-width: 480px) {
    form {
        padding: 20px;
    }
}

    </style>
</head>
<body>
    <form action="<?= base_url('register/send') ?>" method="post">
        <?= csrf_field()?>
    <h2>Pendaftaran</h2>
        <label for="name">Nama:</label>
        <input type="text" name="name" required><br>

        <label for="username" style="align:left">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="phone">No. HP:</label>
        <input type="tel" name="phone"><br><br>

        <label for="address">Alamat:</label>
        <textarea name="address" rows="3"></textarea><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>

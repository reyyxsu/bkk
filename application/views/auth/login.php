<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin BKK</title>
    <style>
        /* Mengatur tampilan dasar halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Membuat kotak login */
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Judul login */
        h2 {
            text-align: center;
            color: #333;
        }

        /* Pesan error */
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Label input */
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        /* Inputan */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Tombol login */
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Hover untuk tombol login */
        button:hover {
            background-color: #218838;
        }

        /* Gaya responsif */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin BKK</h2>
        
        <?php if(validation_errors() || $this->session->flashdata('error')): ?>
    <div style="color:red;">
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

    <form action="<?php echo base_url('auth/login'); ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
</form>

    </div>
</body>
</html>

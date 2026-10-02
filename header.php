<?php

$theme = $_COOKIE['theme'] ?? 'light';

if (!in_array($theme, ['light', 'dark'], true)) {
    $theme = 'light';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang Belanja</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: <?= $theme === 'dark' ? '#222' : '#f5f5f5' ?>;
            color: <?= $theme === 'dark' ? '#fff' : '#222' ?>;
        }

        a {
            color: inherit;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            background: <?= $theme === 'dark' ? '#333' : '#fff' ?>;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        button {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .flash {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #d4edda;
            color: #155724;
        }

        .cart-link {
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="header">

    <h1>Keranjang Belanja</h1>

    <div>

        <a class="cart-link" href="cart.php">
            Keranjang (<?= cartCount($_SESSION['cart']) ?>)
        </a>

        <form action="index.php" method="POST" style="display:inline; margin-left:15px;">

            <select name="theme" onchange="this.form.submit()">

                <option value="light" <?= $theme === 'light' ? 'selected' : '' ?>>
                    Light
                </option>

                <option value="dark" <?= $theme === 'dark' ? 'selected' : '' ?>>
                    Dark
                </option>

            </select>

        </form>

    </div>

</div>
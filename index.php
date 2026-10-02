<?php

require_once __DIR__ . '/bootstrap.php';

$products = [
    [
        'id' => 1,
        'nama' => 'Kopi Susu',
        'harga' => 15000
    ],
    [
        'id' => 2,
        'nama' => 'Matcha Latte',
        'harga' => 18000
    ],
    [
        'id' => 3,
        'nama' => 'Cokelat',
        'harga' => 17000
    ]
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
</head>
<body>

    <h1>Katalog Produk</h1>

    <?php foreach ($products as $product): ?>
        <div>
            <h3><?= htmlspecialchars($product['nama']) ?></h3>
            <p>Rp <?= number_format($product['harga'], 0, ',', '.') ?></p>

            <form action="actions.php" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <button type="submit">Tambah ke Keranjang</button>
            </form>
        </div>
        <hr>
    <?php endforeach; ?>

</body>
</html>

@Mimi
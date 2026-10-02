<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

$flash = pullFlash();

$total = 0;

require __DIR__ . '/data/components/header.php';
?>

<?php if ($flash !== null): ?>

    <div class="flash">
        <?= e($flash) ?>
    </div>

<?php endif; ?>

<h2>Isi Keranjang</h2>

<?php if (empty($_SESSION['cart'])): ?>

    <p>Keranjang masih kosong.</p>

    <p>
        <a href="index.php">Kembali ke katalog</a>
    </p>

<?php else: ?>

    <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>

        <?php if (!isset($products[$id])) {
            continue;
        } ?>

        <?php

        $product = $products[$id];

        $subtotal = $product['harga'] * $quantity;

        $total += $subtotal;

        ?>

        <div class="card">

            <h3>
                <?= e($product['nama']) ?>
            </h3>

            <p>
                Harga:
                Rp <?= number_format($product['harga'], 0, ',', '.') ?>
            </p>

            <p>
                Jumlah:
                <?= $quantity ?>
            </p>

            <p>
                Subtotal:
                Rp <?= number_format($subtotal, 0, ',', '.') ?>
            </p>

            <form action="actions.php" method="POST">

                <input type="hidden" name="action" value="remove">

                <input type="hidden" name="id" value="<?= $id ?>">

                <button type="submit">
                    Hapus
                </button>

            </form>

        </div>

    <?php endforeach; ?>

    <h2>
        Total:
        Rp <?= number_format($total, 0, ',', '.') ?>
    </h2>

    <form action="actions.php" method="POST">

        <input type="hidden" name="action" value="clear">

        <button type="submit">
            Kosongkan Keranjang
        </button>

    </form>

<?php endif; ?>

<p>
    <a href="index.php">← Kembali ke Katalog</a>
</p>

<?php
require __DIR__ . '/data/components/footer.php';
?>
<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';

$products = require __DIR__ . '/data/products.php';

$flash = pullFlash();

require __DIR__ . '/data/components/header.php';
?>

<?php if ($flash !== null): ?>

    <div class="flash">
        <?= e($flash) ?>
    </div>

<?php endif; ?>

<h2>Daftar Produk</h2>

<div class="products">

    <?php foreach ($products as $id => $product): ?>

        <div class="card">

            <h3>
                <?= e($product['nama']) ?>
            </h3>

            <p>
                Rp <?= number_format($product['harga'], 0, ',', '.') ?>
            </p>

            <form action="actions.php" method="POST">

                <input
                    type="hidden"
                    name="action"
                    value="add"
                >

                <input
                    type="hidden"
                    name="id"
                    value="<?= $id ?>"
                >

                <button type="submit">
                    Tambah ke Keranjang
                </button>

            </form>

        </div>

    <?php endforeach; ?>

</div>

<?php
require __DIR__ . '/data/components/footer.php';
?>

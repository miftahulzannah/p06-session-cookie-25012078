<?php

declare(strict_types=1);

session_start();

$_SESSION['cart'] ??= [];
$_SESSION['flash'] ??= null;

$allowedThemes = ['light', 'dark'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {

    $candidate = $_POST['theme'];

    if (in_array($candidate, $allowedThemes, true)) {

        setcookie('theme', $candidate, [
            'expires' => time() + 60 * 60 * 24 * 30,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        header('Location: ' . ($_SERVER['PHP_SELF'] ?? 'index.php'));
        exit;
    }
}

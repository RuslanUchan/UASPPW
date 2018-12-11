<?php
    session_start();

    // Set menjadi array kosong
    $_SESSION = [];

    // Unset valuenya
    session_unset();

    // Hancurkan
    session_destroy();

    $url = $_GET['url'];

    header("Location: " . $url);
 ?>

<?php
    // Koneksi database
    $koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Cek koneksi
    if(mysqli_connect_errno()) {
        // Kalo error, display gagal
        // else, lanjut
        echo 'Gagal koneksi ke MySQL'. mysqli_connect_errno();
    }
?>

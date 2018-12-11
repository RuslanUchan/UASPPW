<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	$current_user_id = $_SESSION['user_id'];

	// jika belum login
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }

    // Tampilkan barang yang terjual
	$query_barang = "SELECT * FROM barang 
                     INNER JOIN kategori ON barang.kategori_id = kategori.kategori_id
                     INNER JOIN users ON barang.penjual_id = users.user_id
                     WHERE barang.penjual_id = '$current_user_id'
                     AND barang.status = 0
                     ORDER BY barang.tanggal_posting";
	$arrayBarang = query($query_barang);
 ?>
<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
<?php include '../warning.php' ?>
<section class="dashboard">
	<h1>Dashboard</h1>
	<!-- Modal Buat Iklan -->
	<?php include '../jual-barang.php' ?>
</section>
<section class="page">
	<div class="container">
		<!-- Item Lists -->
		<?php include '../list-barang.php' ?>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

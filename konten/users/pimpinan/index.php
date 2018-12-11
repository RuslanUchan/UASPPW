<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	// jika belum login
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
 ?>
<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
<section class="dashboard">
	<h1>Dashboard</h1>
	<a href="#" id="" class="dashboard-button">Cetak Spreadsheet</a>
	<a href="#" id="" class="dashboard-button">Cetak Laporan</a>
</section>
<section class="page">
	<div class="container">
		<div id="no-display"></div>
	</div>
</section>
<?php include '../../templates/footer.php' ?>
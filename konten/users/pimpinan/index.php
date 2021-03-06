<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	// jika belum login atau akses bukan pimpinan
    if (!isset($_SESSION['login']) || $_SESSION['akses'] != 'pimpinan') {
        header("Location: " . BASEURL . "/konten/masuk");
        exit;
    }
 ?>
<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
<section class="dashboard">
	<h1>Dashboard</h1>
	<a href="<?=BASEURL;?>/konten/users/spreadsheet.php" class="dashboard-button">Cetak Spreadsheet</a>
	<a href="<?=BASEURL;?>/konten/users/pdf.php" target="_blank" class="dashboard-button">Cetak Laporan</a>
</section>
<section class="page">
	<div class="container">
		<?php include '../chart.php'; ?>
	</div>
</section>
<?php include '../../templates/footer.php' ?>
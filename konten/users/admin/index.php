<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	$current_user_id = $_SESSION['user_id'];

	// jika belum login
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }

	// Tampilkan semua barang yang terjual
	$query_barang = "SELECT * FROM barang 
                     INNER JOIN kategori ON barang.kategori_id = kategori.kategori_id
                     INNER JOIN users ON barang.penjual_id = users.user_id
                     AND barang.status = 0
                     ORDER BY barang.tanggal_posting";
	$arrayBarang = query($query_barang);

	//
	//	Tambah Kategori
	//
	if (isset($_POST['tambah-kategori'])) {
		tambahKategori($_POST);

		// refresh halaman
	    header("Location:" . dirname($_SERVER['PHP_SELF']));
	    exit;
	}
 ?>
<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
<?php include '../warning.php' ?>
<section class="dashboard">
	<h1>Dashboard</h1>
	<!-- Modal Buat Iklan -->
	<?php include '../jual-barang.php' ?>

	<!-- Modal Tambah Kategori -->
	<a class="dashboard-button trigger-modal">Tambah Kategori</a>
	<?php include '../tambah-kategori.php' ?>
</section>
<section class="page">
	<div class="container">
		<h3>Kategori</h3>
		<ul class="category">
			<?php foreach ($arrayKategori as $kategori): ?>
				<li class="category-list">
					<a href=""><?=ucfirst($kategori["kategori"]);?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<hr/>

		<!-- List Barang -->
		<?php include '../list-barang.php' ?>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

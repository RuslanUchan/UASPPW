<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	//
	//	Verifikasi User
	//
	$query = "SELECT user_id, username FROM users
			  WHERE akses_id = 1";
	$unverifiedUserRecord = query($query);

	// Setelah button verifikasi ditekan
	if (isset($_GET["user_id"])) {
		$verifikasi_sukses = verify($_GET);

		if ($verifikasi_sukses) {
			// refresh halaman
		    header("Location:" . $_SERVER['PHP_SELF']);
		    exit;
		}
	}

	//
	//	Ubah Hak Akses
	//
	
	// Setelah button konfirmasi hak akses ditekan
	if (isset($_POST["ubah-akses"])) {
		$ubah_akses_sukses = ubahAkses($_POST);

		if ($ubah_akses_sukses) {
			echo "<script>
					alert('Hak akses user berhasil diubah');
				  </script>";
		} else {
			echo "<script>
					alert('Hak akses user gagal diubah');
				  </script>";
		}

		// refresh halaman
	    header("Location:" . $_SERVER['PHP_SELF']);
	    exit;
	}
 ?>

<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
<section class="dashboard">
	<h1>Administrasi</h1>
	<!-- Trigger Modal -->
	<a class="dashboard-button trigger-modal">Ubah Hak Akses</a>

	<!-- Modal -->
	<div class="modal">
		
		<!-- Konten Modal -->
		<div class="modal-konten">
			<div class="modal-header">
				<span class="modal-close">&times;</span>
				<h2>Ubah Hak Akses</h2>
			</div>
			<div class="modal-body">
				<p>Masukkan username dan tentukan hak akses yang akan diberikan</p>
				<form action="" method="post">
					<div>
						<label for="username">Username:</label>
						<input type="text" name="username" id="username">
					</div>
					<div>
						<label for="akses">Akses:</label>
						<!-- <input type="text" name="akses" id="akses"> -->
						<select id="akses" name="akses">
							<option value="1">1 - User</option>
							<option value="2">2 - Admin</option>
							<option value="3">3 - Pimpinan</option>
							<option value="4">4 - User Terverifikasi</option>
						</select>
					</div>
					<button type="submit" name="ubah-akses">Konfirmasi</button>
				</form>
			</div>
		</div>
	</div>
</section>
<section class="page">
	<div class="container verifikasi">
		<h4>Verifikasi</h4>
		<?php if (isset($verifikasi_sukses)): ?>
			<?php if (!$verifikasi_sukses): ?>
				<p class="error-msg">Verifikasi user gagal</p>
			<?php endif; ?>
		<?php endif; ?>
		<ul>
			<?php foreach ($unverifiedUserRecord as $unverifiedUser): ?>
				<li>
					<p><?=$unverifiedUser["username"];?></p>
					<a href="?user_id=<?=$unverifiedUser["user_id"];?>">verifikasi</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

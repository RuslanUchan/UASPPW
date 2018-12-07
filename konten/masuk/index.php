<?php 
	include_once '../../config/inisiasi.php';

	session_start();

	if (isset($_POST['masuk'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$hasil = mysqli_query($koneksi, "SELECT users.username,
												users.password,
												hak_akses.akses 
										FROM users INNER JOIN hak_akses
										ON users.akses_id = hak_akses.akses_id
										WHERE username = '$username'");
		
		if (mysqli_num_rows($hasil) === 1) {
			// Cek password
			$record = mysqli_fetch_assoc($hasil);
			
			if ($record['password'] === $password) {
				// Set beberapa value utk user session
				$_SESSION['username'] = $record['username'];
				$_SESSION['akses'] = $record['akses'];
				$_SESSION['login'] = true;

				// Cek hak akses untuk redirect user
				if ($record['akses'] !== 'user') {
					// Jika bukan user, redirect ke dashboard
					header("Location: " . BASEURL . "/konten/users/" . $record['akses']);
					exit;
				} else {
					header("Location: " . BASEURL);
					exit;
				}
				
			}
		}
		// Jika query gagal / password salah
		$error = true;
	}
 ?>

<?php include '../templates/header.php' ?>
<section id="login">
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
	</div>
	
	<!-- Jika terjadi error -->
	<?php if (isset($error)) : ?>
        <p style="color: crimson; font-style: italic; font-weight: 600;">username / password salah</p>
    <?php endif; ?>

	<form action="" method="post">
		<h1>Masuk</h1>
		<div>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username"/>
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"/>
		</div>
		<button type="submit" name="masuk">Konfirmasi</button>
		<hr/>
		<p>
			Belum punya akun?
			<a href="<?=BASEURL;?>/konten/daftar">Daftar</a>
		</p>
	</form>
</section>
<?php include '../templates/footer.php' ?>
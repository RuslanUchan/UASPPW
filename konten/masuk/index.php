<?php 
	include_once '../../config/inisiasi.php';

	session_start();

	if (isset($_POST['masuk'])) {
		// Jika gagal masuk
		$error = (!masuk($_POST)) ? true : false;
	}
 ?>

<?php include '../templates/header.php' ?>
<section id="login">
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
	</div>
	
	<!-- Jika terjadi error -->
	<?php if (isset($error)) : ?>
        <p class="error-msg">Username atau Password Salah</p>
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
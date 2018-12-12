<?php
    include_once '../../config/inisiasi.php';

    if (isset($_POST['daftar'])) {
        if (registrasi($_POST) > 0) {
            echo "<script>
                    alert('user baru berhasil ditambahkan');
                  </script>";

            header("Location: " . BASEURL . "/konten/masuk");
            exit;
        } else {
            echo mysqli_error($koneksi);
        }
    }
?>

<?php include '../templates/header.php' ?>
<section id="register">
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
	</div>
	<form action="" method="post">
		<h1>Daftar</h1>
		<div>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username"/>
		</div>
		<div>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email"/>
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"/>
		</div>
		<div>
			<label for="konfirmasi_password">Konfirmasi Password:</label>
			<input type="password" name="konfirmasi_password" id="konfirmasi_password"/>
		</div>
		<button type="submit" name="daftar">Konfirmasi</button>
		<hr/>
		<p>
			Sudah punya akun?
			<a href="<?=BASEURL;?>/konten/masuk">Masuk</a>
		</p>
	</form>
</section>
<?php include '../templates/footer.php' ?>
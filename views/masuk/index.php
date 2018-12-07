<?php include '../templates/header.php' ?>
<section id="login">
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
	</div>
	<form>
		<h1>Masuk</h1>
		<div>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username"/>
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"/>
		</div>
		<button type="submit">Konfirmasi</button>
		<hr/>
		<p>
			Belum punya akun?
			<a href="<?=BASEURL;?>/views/daftar">Daftar</a>
		</p>
	</form>
</section>
<?php include '../templates/footer.php' ?>
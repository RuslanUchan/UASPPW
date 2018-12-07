<?php include '../templates/header.php' ?>
<section id="register">
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
	</div>
	<form>
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
			<label for="confirm_password">Konfirmasi Password:</label>
			<input type="text" name="confirm_password" id="confirm_password"/>
		</div>
		<button type="submit">Konfirmasi</button>
		<hr/>
		<p>
			Sudah punya akun?
			<a href="<?=BASEURL;?>/views/masuk">Masuk</a>
		</p>
	</form>
</section>
<?php include '../templates/footer.php' ?>
<?php include '../../templates/header.php' ?>
<?php include 'nav.php' ?>
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
				<form action="">
					<div>
						<label for="username">Username:</label>
						<input type="text" name="username" id="username">
					</div>
					<div>
						<label for="akses">Akses:</label>
						<input type="text" name="akses" id="akses">
					</div>
					<button type="submit">Konfirmasi</button>
				</form>
			</div>
		</div>
	</div>
</section>
<section class="page">
	<div class="container verifikasi">
		<h4>Verifikasi</h4>
		<ul>
			<li>
				<p>Username sekian butuh verifikasi</p>
				<a href="">verifikasi</a>
			</li>
			<li>
				<p>Username sekian butuh verifikasi</p>
				<a href="">verifikasi</a>
			</li>
			<li>
				<p>Username sekian butuh verifikasi</p>
				<a href="">verifikasi</a>
			</li>
			<li>
				<p>Username sekian butuh verifikasi</p>
				<a href="">verifikasi</a>
			</li>
		</ul>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

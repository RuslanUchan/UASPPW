<?php include '../../templates/header.php' ?>
<?php include 'nav.php' ?>
<section class="dashboard">
	<h1>Dashboard</h1>
	<!-- Modal Buat Iklan -->
	<a class="dashboard-button trigger-modal">Buat Iklan</a>

	<div class="modal">
		
		<!-- Konten Modal -->
		<div class="modal-konten">
			<div class="modal-header">
				<span class="modal-close">&times;</span>
				<h2>Buat Iklan</h2>
			</div>
			<div class="modal-body">
				<p>Masukkan data barang yang ingin diiklankan</p>
				<form id="form-iklan" action="">
					<ul>
						<li>
							<label for="namabarang">Nama Barang:</label>
							<input type="text" name="namabarang" id="namabarang" required>
						</li>
						<li>
							<label for="hargabarang">Harga Barang:</label>
							<input type="number" name="hargabarang" id="hargabarang" placeholder="Ribu Rupiah (Rp.)" required>
						</li>
						<li>
							<label for="stokbarang">Stok:</label>
							<input type="number" name="stokbarang" id="stokbarang" required>
						</li>
						<li>
							<label for="beratbarang">Berat Barang:</label>
							<input type="number" name="beratbarang" id="beratbarang" placeholder="gram" required>
						</li>
						<li id="clear"></li>
						<li>
							Barang Baru<input id="checkbox" type="checkbox" name="barangbaru" value="baru">
						</li>
						<li>
							<label for="deskripsibarang">Deskripsi Barang</label>
							<textarea id="deskripsibarang" name="deskripsibarang" rows="5" cols="33"></textarea>
						</li>
						<li>
							<label for="kategoribarang">Pilih Kategori Barang</label>
							<select name="kategoribarang" id="kategoribarang" required>
								<option value="">Kategori Barang</option>
								<option value="teknologi">Teknologi</option>
							</select>
						</li>
						<li>
							<label for="gambarbarang">Gambar Barang:</label>
            <input type="file" name="gambarbarang" id="gambarbarang" required>
						</li>
					</ul>
					<button type="submit">Jual Barang</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Kategori -->
	<a class="dashboard-button trigger-modal">Tambah Kategori</a>

	<div class="modal">
		
		<!-- Konten Modal -->
		<div class="modal-konten">
			<div class="modal-header">
				<span class="modal-close">&times;</span>
				<h2>Tambah Kategori</h2>
			</div>
			<div class="modal-body">
				<p>Masukkan kategori barang yang ingin ditambahkan</p>
				<form action="">
					<div>
						<label for="tambahkategori">Kategori Tambahan:</label>
						<input type="text" name="tambahkategori" id="tambahkategori">
					</div>
					<button type="submit">Konfirmasi</button>
				</form>
			</div>
		</div>
	</div>
</section>
<section class="page">
	<div class="container">
		<h3>Kategori</h3>
		<ul class="category">
			<li class="category-list">
				<a href="">Teknologi</a>
			</li>
			<li class="category-list">
				<a href="">Fashion</a>
			</li>
			<li class="category-list">
				<a href="">Games</a>
			</li>
			<li class="category-list">
				<a href="">Buku</a>
			</li>
		</ul>
		<hr/>

		<!-- Item Lists -->
		<h1>OK</h1>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

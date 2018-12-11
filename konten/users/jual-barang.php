<?php 
	$query_kategori = "SELECT * FROM kategori";
	$arrayKategori = query($query_kategori);

	//
	//	Jual Barang
	//
	if (isset($_POST['jual-barang'])) {
		jualBarang($_POST, $_SESSION['user_id']);
		
		// refresh halaman
	    header("Location:" . dirname($_SERVER['PHP_SELF']));
	    exit;
	}
 ?>

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
			<form id="form-iklan" action="" method="post" enctype="multipart/form-data">
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
						Barang Baru<input id="checkbox" type="checkbox" name="barangbaru" value="1">
					</li>
					<li>
						<label for="deskripsibarang">Deskripsi Barang</label>
						<textarea id="deskripsibarang" name="deskripsibarang" rows="5" cols="33"></textarea>
					</li>
					<li>
						<label for="kategoribarang">Pilih Kategori Barang</label>
						<select name="kategoribarang" id="kategoribarang" required>
							<option value="">Kategori Barang</option>
							<!-- <option value="teknologi">Teknologi</option> -->
							<?php foreach($arrayKategori as $kategori): ?>
								<option value="<?=$kategori['kategori_id'];?>"><?=ucfirst($kategori['kategori']);?></option>
							<?php endforeach; ?>
						</select>
					</li>
					<li>
						<label for="gambarbarang">Gambar Barang:</label>
			            <input type="file" name="gambarbarang" id="gambarbarang" required>
					</li>
				</ul>
				<button type="submit" name="jual-barang">Jual Barang</button>
			</form>
		</div>
	</div>
</div>
<?php 
	//
	//	Edit Barang
	//
	if (isset($_POST['edit-barang'])) {
		if (edit($_POST, $_SESSION['user_id'])) {
			// refresh halaman
			header("Location: " . dirname($_SERVER['PHP_SELF']));
			exit;
		}
	}
 ?>

<div class="modal modalEdit">

	<!-- Konten Modal -->
	<div class="modal-konten">
		<div class="modal-header">
			<span class="modal-close">&times;</span>
			<h2>Edit Iklan</h2>
		</div>
		<div class="modal-body">
			<p>Masukkan data barang yang ingin diiklankan</p>
			<form id="form-iklan" action="" method="post" enctype="multipart/form-data">
				<ul>
					<li>
						<label for="namabarang">Nama Barang:</label>
						<input type="text" name="namabarang" id="namabarang" required value="<?=$barang['nama'];?>">
					</li>
					<li>
						<label for="hargabarang">Harga Barang:</label>
						<input type="number" name="hargabarang" id="hargabarang" placeholder="Ribu Rupiah (Rp.)" required value="<?=$barang['harga'];?>">
					</li>
					<li>
						<label for="stokbarang">Stok:</label>
						<input type="number" name="stokbarang" id="stokbarang" required value="<?=$barang['stok'];?>">
					</li>
					<li>
						<label for="beratbarang">Berat Barang:</label>
						<input type="number" name="beratbarang" id="beratbarang" placeholder="gram" required value="<?=$barang['berat'];?>">
					</li>
					<li id="clear"></li>
					<li>
						Barang Baru<input id="checkbox" type="checkbox" name="barangbaru" value="1">
					</li>
					<li>
						<label for="deskripsibarang">Deskripsi Barang</label>
						<textarea id="deskripsibarang" name="deskripsibarang" rows="5" cols="33""></textarea>
					</li>
					<li>
						<label for="kategoribarang">Pilih Kategori Barang</label>
						<select name="kategoribarang" id="kategoribarang" required>
							<option value="">Kategori Barang</option>
							<?php foreach($arrayKategori as $kategori): ?>
								<option value="<?=$kategori['kategori_id'];?>"><?=ucfirst($kategori['kategori']);?></option>
							<?php endforeach; ?>
						</select>
					</li>
					<li>
						<label for="gambarbarang">Gambar Barang:</label>
			            <input type="file" name="gambarbarang" id="gambarbarang">
					</li>
					<input type="hidden" name="barang_id" value="<?=$barang['barang_id'];?>">
					<input type="hidden" name="gambarLama" value="<?=$barang['gambar'];?>">
				</ul>
				<button type="submit" name="edit-barang">Edit Barang</button>
			</form>
		</div>
	</div>
</div>
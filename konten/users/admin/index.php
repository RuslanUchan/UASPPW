<?php 
	include_once '../../../config/inisiasi.php';

	session_start();

	// Tampilkan kategori yang ada
	$query_kategori = "SELECT * FROM kategori";
	$arrayKategori = query($query_kategori);

	// Tampilkan barang yang terjual
	$query_barang = "SELECT * 
					 FROM barang INNER JOIN kategori
					 ON barang.kategori_id = kategori.kategori_id";
	$arrayBarang = query($query_barang);

	$imgURL = BASEURL . '/assets/img/imgbrg/';

	//
	//	Jual Barang
	//
	if (isset($_POST['jual-barang'])) {
		jualBarang($_POST, $_SESSION['user_id']);
		
		// refresh halaman
	    // header("Location:" . dirname($_SERVER['PHP_SELF']));
	    // exit;
	}

	//
	//	Tambah Kategori
	//
	if (isset($_POST['tambah-kategori'])) {
		tambahKategori($_POST);

		// refresh halaman
	    header("Location:" . dirname($_SERVER['PHP_SELF']));
	    exit;
	}
 ?>
<?php include '../../templates/header.php' ?>
<?php include '../../templates/nav.php' ?>
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
				<!-- Form tambah kategori -->
				<form action="" method="post">
					<div>
						<label for="kategori">Kategori Tambahan:</label>
						<input type="text" name="kategori" id="kategori">
					</div>
					<button type="submit" name="tambah-kategori">Konfirmasi</button>
				</form>
			</div>
		</div>
	</div>
</section>
<section class="page">
	<div class="container">
		<h3>Kategori</h3>
		<ul class="category">
			<?php foreach ($arrayKategori as $kategori): ?>
				<li class="category-list">
					<a href=""><?=ucfirst($kategori["kategori"]);?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<hr/>

		<!-- Item Lists -->
		<div class="list-barang">
			<?php foreach ($arrayBarang as $barang): ?>
				<?php 
					$baru = ($barang['baru']) ? 'Ya' : 'Tidak';
				 ?>
				<div class="list-barang-ads">
					<img src="<?=$imgURL;?>/<?=$barang['gambar'];?>">
					<div class="box-lihat">
						<!-- Modal Barang Pertama -->
						<a class="trigger-modal">Lihat</a>
					</div>
					<p><?=$barang['nama'];?></p>
					<a href="terjual.php?id=<?=$barang['barang_id'];?>">tandai terjual</a>
					<!-- Display Modalnya di luar :) -->
					<div class="modal">
						<!-- Konten Modal -->
						<div class="modal-konten">
							<div class="modal-header">
								<span class="modal-close">&times;</span>
								<h2><?=$barang['nama'];?></h2>
							</div>
							<div class="modal-body">
								<ul>
									<li><p>Harga Barang:</p><span>Rp. <?=$barang['harga'];?></span></li>
									<li><p>Stok:</p><span><?=$barang['stok'];?></span></li>
									<li><p>Berat:</p><span><?=$barang['berat'];?> gram</span></li>
									<li><p>Barang Baru:</p><span><?=$baru;?></span></li>
									<li><p id="lihat-deskripsi-barang">Deskripsi Barang:</p><span><?=$barang['deskripsi'];?></span></li>
									<li><p>Kategori Barang:</p><span><?=ucfirst($barang['kategori']);?></span></li>
								</ul>
								<div class="container">
									<a href="hapus.php?id=<?=$barang['barang_id'];?>" class="delete-button">Hapus</a>
									<a href="edit.php?id=<?=$barang['barang_id'];?>" class="edit-button">Edit</a>
									<!-- <a class="warning-button">Peringati User</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<?php include '../../templates/footer.php' ?>

<?php
	$imgURL = BASEURL . '/assets/img/imgbrg/';

	if (isset($_POST['cari'])) {
		$arrayBarang = cari($_POST['keyword']);
	}
 ?>

<!-- 	
	URLnya nggak relative dari folder karena dipanggil dari index.
	Jadi masih ada di top-level directory 
-->
<?php include 'konten/templates/header.php' ?> 
<nav>
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
		<form action="" method="post">
			<input id="keyword" type="text" placeholder="Cari.." name="keyword">
			<button id="cari" type="submit" name="cari">Cari</button>
		</form>
		<ul>
			<li><a href="<?=BASEURL;?>/konten/daftar">Daftar</a></li>
			<li><a href="<?=BASEURL;?>/konten/masuk">Masuk</a></li>
		</ul>
	</div>
</nav>
<div id="main-container" class="container">
	<?php if (isset($arrayBarang)): ?>
		<div class="list-barang">
		<?php foreach ($arrayBarang as $barang): ?>
			<?php $baru = ($barang['baru']) ? 'Ya' : 'Tidak'; ?>
			<div class="list-barang-ads">
				<img src="<?=$imgURL;?>/<?=$barang['gambar'];?>">
				<p><?=$barang['nama'];?></p>
				<a class="edit-button trigger-modal">Lihat</a>
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
								<li><p>Pengiklan:</p><span><?=ucfirst($barang['username']);?></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		</div>
	<?php else: ?>
		<img id="hero" src="assets/img/wpp-1.jpg" alt="main-gif">
	<?php endif; ?>
</div>
<footer>
	<p>Copyright 2018</p>
</footer>
<?php include 'konten/templates/footer.php' ?>
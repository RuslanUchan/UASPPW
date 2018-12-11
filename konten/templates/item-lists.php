<?php 
    $imgURL = BASEURL . '/assets/img/imgbrg/';

    // Parameter hapus dan terjual -> barang_id
    if (isset($_GET['hapus'])) {
    	if (hapus($_GET['hapus'])) {
    		header("Location:" . dirname($_SERVER['PHP_SELF']));
		    exit;
    	}
    }

    if (isset($_GET['terjual'])) {
    	if (terjual($_GET['terjual'])) {
    		header("Location:" . dirname($_SERVER['PHP_SELF']));
		    exit;
    	}
    }

    // Parameter warn_user -> user_id
    if (isset($_GET['warn_user_id'])) {
    	if (warn_user($_GET['warn_user_id'])) {
    		header("Location:" . dirname($_SERVER['PHP_SELF']));
		    exit;
    	}
    }

 ?>

<!-- Item Lists -->
<div class="list-barang">
	<!-- Default jika tidak ada barang di array -->
	<?php if(!isset($arrayBarang)): ?>
		<div id="no-display"></div>
	<!-- Jika ada barang di array, loop -->
	<?php else: ?>
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
				<a href="?terjual=<?=$barang['barang_id'];?>">tandai terjual</a>
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
								<li><p>Pengiklan:</p><span><?=ucfirst($barang['username']);?></span></li>
							</ul>
							<div class="container">
								<?php if ($current_user_id === $barang['user_id']): ?>
									<a href="?hapus=<?=$barang['barang_id'];?>" class="delete-button">Hapus</a>
									<a href="?edit=<?=$barang['barang_id'];?>" class="edit-button">Edit</a>
								<?php else: ?>
									<a href="?warn_user_id=<?=$barang['user_id'];?>" class="warning-button">Peringati User</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif; ?>
</div>
<nav>
	<div class="container">
		<a class="logo">PPW</a>
		<?php if ($_SESSION['akses'] === 'admin'): ?>
			<a href="<?=BASEURL;?>/konten/users/admin" class="menu">Dashboard</a>
			<a href="<?=BASEURL;?>/konten/users/admin/administrasi.php" class="menu">Administrasi</a>
		<?php else: ?>
			<a href="" class="menu">Dashboard</a>
		<?php endif; ?>
		<ul>
			<li>
				<a href=""><?=ucfirst($_SESSION['username']);?></a>
			</li>
			<li>
				<a href="<?=BASEURL;?>">Keluar</a>
			</li>
		</ul>
	</div>
</nav>
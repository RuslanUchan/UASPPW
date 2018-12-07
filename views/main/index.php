<!-- 	
	URLnya nggak relative dari folder karena dipanggil dari index.
	Jadi masih ada di top-level directory 
-->
<?php include 'views/templates/header.php' ?> 
<nav>
	<div class="container">
		<a href="<?=BASEURL;?>" class="logo">PPW</a>
		<ul>
			<li><a href="<?=BASEURL;?>/views/daftar">Daftar</a></li>
			<li><a href="<?=BASEURL;?>/views/masuk">Masuk</a></li>
		</ul>
	</div>
</nav>
<div id="hero"></div>
<footer>
	<p>Copyright 2018</p>
</footer>
<?php include 'views/templates/footer.php' ?>
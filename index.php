<?php include_once 'config/inisiasi.php'; ?>
<?php 
	$test = query("SELECT * FROM users");
	echo var_dump($test);
 ?>
<?php include_once 'konten/main/index.php' ?>
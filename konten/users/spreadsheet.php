<?php 
	include_once '../../config/inisiasi.php';

	// Nama file untuk download
	$namaFile = "spreadsheet_" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$namaFile\"");
	header("Content-Type: application/vnd.ms-excel");

	$query = "SELECT barang.barang_id, barang.nama, barang.harga, kategori.kategori 
			  FROM barang
			  INNER JOIN kategori ON barang.kategori_id = kategori.kategori_id";
	$data = query($query);

	$flag = false;
	foreach($data as $baris) {
		if(!$flag) {
			// display field/column names as first row
			echo implode("\t", array_keys($baris)) . "\r\n";
			$flag = true;
		}
		echo implode("\t", array_values($baris)) . "\r\n";
	}
	exit;
 ?>
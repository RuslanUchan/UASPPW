<?php 
	require_once '../../vendor/autoload.php';
	include_once '../../config/inisiasi.php';

	// Tanggal
	$tanggal = date('Y-m-d');
	$namaFile = "ecom_report_". date('Ymd') .".pdf";

	// Ambil data untuk ditampilkan secara dinamis dalam database
	$query = "SELECT user_id FROM users WHERE akses_id = 4";
	$hasil = mysqli_query($koneksi, $query);
	$totalPenjual = mysqli_num_rows($hasil);

	$query = "SELECT barang_id FROM barang";
	$hasil = mysqli_query($koneksi, $query);
	$totalIklan = mysqli_num_rows($hasil);

	$query = "SELECT barang_id FROM barang WHERE status = 1";
	$hasil = mysqli_query($koneksi, $query);
	$totalTerjual = mysqli_num_rows($hasil);

	$query = "SELECT kategori_id FROM kategori";
	$hasil = mysqli_query($koneksi, $query);
	$totalKategori = mysqli_num_rows($hasil);

	// Direkomendasikan untuk menggunakan tempdir
	$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . "/tmp"]);

	$html = '
	<h1 align="center">Ecommerce Report</h1>
	<h3 align="center">'. $tanggal .'</h3>
	<table border="1" cellspacing="0" cellpadding="10" align="center">
		<thead>
			<tr>
				<th>Total penjual</th>
				<th>Total iklan terpasang</th>
				<th>Total barang terjual</th>
				<th>Total kategori</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>'. $totalPenjual .'</td>
				<td>'. $totalIklan .'</td>
				<td>'. $totalTerjual .'</td>
				<td>'. $totalKategori .'</td>
			</tr>
		</tbody>
	</table>';

	$mpdf->WriteHTML($html);
	$mpdf->Output($namaFile, \Mpdf\Output\Destination::INLINE);
 ?>
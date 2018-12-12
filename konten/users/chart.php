<?php 
	// Ambil barang dari database
	$query = "SELECT barang.status, barang.kategori_id, kategori.kategori FROM barang
			  INNER JOIN kategori ON barang.kategori_id = kategori.kategori_id";
	$dataBarang = query($query);

	// Ambil kategori dari database
	$query = "SELECT * FROM kategori";
	$dataKategori = query($query);

	// Kustomisasi data points
	$counter = 10;

	// Buat datapoints
	foreach ($dataKategori as $kategori) {
		$dataPoints[] = array('x' => $counter, 'y' => 0, 'indexLabel' => ucfirst($kategori['kategori']));
		$counter += 10;
	}

	// Hitung jumlah barang per kategori dan set nilainya dalam datapoints
	$i = 0;
	foreach($dataPoints as $point) {
		foreach ($dataBarang as $barang) {
			if ($point['indexLabel'] === ucfirst($barang['kategori'])) {
				$dataPoints[$i]['y'] += 1;
			}
		}
		$i++;
	}
 ?>

<?php if (!isset($dataPoints)): ?>
	<div id="no-display"></div>
<?php else: ?>
	<div id="chartContainer" style="height: 370px; width: 100%; margin-top: 50px;"></div>
<?php endif; ?>


<!-- Canvasjs -->
<script type="text/javascript" src="<?=BASEURL;?>/assets/js/canvasjs.min.js"></script>

<!-- Canvas Scriptku -->
<script type="text/javascript">
	window.onload = function () {
 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: false,
			theme: "light1", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Grafik Penjualan Barang"
			},
			data: [{
				type: "column", //change type to bar, line, area, pie, etc
				//indexLabel: "{y}", //Shows y value on all Data Points
				indexLabelFontColor: "#5A5757",
				indexLabelPlacement: "outside",   
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	}
</script>
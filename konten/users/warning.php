<?php if ($_SESSION['peringatan'] == 1): ?> 
	<div class="alert-warning">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		Anda terkena warning karena memasukkan data yang tidak tepat pada iklan barang. Segera perbaiki iklan barang Anda.
	</div>
	<?php $_SESSION['peringatan'] = reset_warning($_SESSION['user_id']); ?>
<?php endif; ?>
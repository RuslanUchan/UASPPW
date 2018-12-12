<?php if ($_SESSION['unverified'] == 1): ?> 
	<div class="alert-warning">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		Akun Anda belum terverifikasi. Silahkan tunggu sampai akun Anda diaktifkan.
	</div>
<?php endif; ?>
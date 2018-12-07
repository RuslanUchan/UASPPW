<?php 
	function query($query) {
		// params:	query SQL SELECT
		// return:	array; hasil query
		global $koneksi;
        $hasil = mysqli_query($koneksi, $query);
        $arrayRecord = [];

        while ($record = mysqli_fetch_assoc($hasil)) {
            $arrayRecord[] = $record;
        }

        return $arrayRecord;
	}

	function registrasi($data) {
		// params: 	data $_POST dari views/daftar
		// return:	int; bernilai 1 jika berhasil masuk
        global $koneksi;

        $username = strtolower($data['username']);
        $email = strtolower($data['email']);
        $password = $data['password'];
        $konfirmasi_password = $data['konfirmasi_password'];

        // Cek apakah username dan email sudah ada
        $hasil = mysqli_query($koneksi, "SELECT username, email FROM users
                                    WHERE username = '$username' OR email = '$email'");
        if (mysqli_fetch_assoc($hasil)) {
            echo "<script>
                    alert('username atau email telah terdaftar');
                  </script>";
            return false;
        }

        // Cek konfirmasi password
        if ($password != $konfirmasi_password) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai');
                  </script>";

            return false;
        }

        // Data tambahan wajib untuk dimasukkan ke database
        $akses_id = 1;
        $peringatan = 0;

        $query = "INSERT INTO users VALUES (
                    '',
                    '$akses_id',
                    '$username',
                    '$email',
                    '$password',
                    '$peringatan'
                )";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
 ?>
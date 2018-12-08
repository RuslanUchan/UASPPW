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
		// params: 	data $_POST dari konten/daftar
		// return:	bool; bernilai true jika berhasil masuk
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

    function masuk($data) {
    	// params:	data $_POST dari konten/masuk
    	// return:	bool, bernilai true jika user ada
    	global $koneksi;

    	$username = $data['username'];
		$password = $data['password'];

		$hasil = mysqli_query($koneksi, "SELECT users.username,
												users.password,
												hak_akses.akses 
										FROM users INNER JOIN hak_akses
										ON users.akses_id = hak_akses.akses_id
										WHERE username = '$username'");

		if (mysqli_num_rows($hasil) === 1) {
			// Cek password
			$record = mysqli_fetch_assoc($hasil);

			if ($record['password'] === $password) {
				// Set beberapa value utk user session
				$_SESSION['username'] = $record['username'];
				$_SESSION['akses'] = $record['akses'];
				$_SESSION['login'] = true;

				// Cek hak akses untuk redirect user
				if ($record['akses'] !== 'user') {
					// Jika bukan user, redirect ke dashboard
					header("Location: " . BASEURL . "/konten/users/" . $record['akses']);
					exit;
				} else {
					header("Location: " . BASEURL);
					exit;
				}
			}
		}

		// Jika query gagal / password salah
		return false;
    }

    function verify($data) {
        // params:  data $_GET dari URL admin/administrasi
        // return:  bool, true bila sukses
        global $koneksi;

        $user_id = $data['user_id'];

        $query = "UPDATE users 
                  SET akses_id = 4
                  WHERE user_id = '$user_id'";

        $hasil = mysqli_query($koneksi, $query);

        return mysqli_affected_rows($hasil);
    }

    function ubahAkses($data) {
        // params:  data $_POST dari form admin/administrasi
        // return:  bool, true bila sukses
        global $koneksi;

        $username = $data['username'];
        $akses = $data['akses'];

        $query = "UPDATE users
                  SET akses_id = '$akses'
                  WHERE username = '$username'";

        $hasil = mysqli_query($koneksi, $query);

        return mysqli_affected_rows($hasil);
    }
 ?>
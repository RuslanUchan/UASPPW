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

		$hasil = mysqli_query($koneksi, "SELECT users.user_id,
                                                users.username,
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
                $_SESSION['user_id'] = $record['user_id'];
				$_SESSION['username'] = $record['username'];
				$_SESSION['akses'] = $record['akses'];
				$_SESSION['login'] = true;

				// Cek hak akses untuk redirect user
				if ($record['akses'] !== 'user') {
					// Jika bukan user, redirect ke dashboard
					header("Location: " . BASEURL . "/konten/users/" . $record['akses']);
					exit;
				} else {
                    // echo '<p class="error-msg">Akun Anda belum Terverifikasi</p>';
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

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
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

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function tambahKategori($data) {
        // params:  data $_POST dari form admin/index
        // return:  bool, true bila sukses
        global $koneksi;

        $kategori = $data['kategori'];

        $query = "INSERT INTO kategori VALUES ('', '$kategori')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function tanggalPosting() {
        $tanggal = date('Y-m-d H:i:s', (time() + (3600 * 6)));
        $tanggal_posting = new DateTime($tanggal);

        // Untuk dimasukkan ke database
        return $tanggal_posting->format('Y-m-d H:i:s');
    }

    function jualBarang($data, $id) {
        // params:  data $_POST dari form admin/index
        // return:  bool: true bila sukses
        global $koneksi;

        $nama = $data['namabarang'];
        $gambar = upload();
        $berat = $data['beratbarang'];
        $stok = $data['stokbarang'];
        $deskripsi = $data['deskripsibarang'];
        $baru = (isset($data['barangbaru'])) ? 1 : 0;
        $harga = $data['hargabarang'];
        $user_id = $id;
        $kategori_id = $data['kategoribarang'];

        // Tanggal posting waktu Indonesia ditambah 6 jam
        $tanggal_posting = tanggalPosting();
        $status = 0;

        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO barang VALUES (
                    '',
                    '$nama',
                    '$gambar',
                    '$berat',
                    '$stok',
                    '$deskripsi',
                    '$harga',
                    '$baru',
                    '$user_id',
                    '$kategori_id',
                    '$tanggal_posting',
                    '$status'
                )";


        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function upload() {
        // params   data $_POST gambar barang
        // return   string nama file barang
        global $koneksi;
        
        $namaFile = $_FILES['gambarbarang']['name'];
        $ukuranFile = $_FILES['gambarbarang']['size'];
        $error = $_FILES['gambarbarang']['error'];
        $tmpName = $_FILES['gambarbarang']['tmp_name'];

        // Cek apakah gambar diupload
        if ($error === 4) {
            echo "<script>
                    alert('Pilih gambar terlebih dahulu');
                  </script>";

            return false;
        }

        // Cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);  // split string
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // Kalau tidak valid...
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('File yang diupload bukan gambar');
                  </script>";

            return false;
        }

        // Cek ukuran yang terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar');
                  </script>";

            return false;
        }

        // Generate nama baru untuk file
        // menghindari name collision di directory
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // Gambar siap diupload
        move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] .'/UASPPW/assets/img/imgbrg/'. $namaFileBaru);

        if (mysqli_errno($koneksi)) echo mysqli_error();
        
        return $namaFileBaru;
    }
 ?>
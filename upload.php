<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;

		// Proses upload
		if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
				// Jika gambar berhasil diupload, Lakukan :
				// Proses simpan ke Database
				$query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
				$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

				if($sql){ // Cek jika proses simpan ke database sukses atau tidak
					// Jika Sukses, Lakukan :
					header("location: index.php"); // Redirectke halaman index.php
				}else{
					// Jika Gagal, Lakukan :
					echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
					echo "<br><a href='form.php'>Kembali Ke Form</a>";
				}
		}else{
			// Jika gambar gagal diupload, Lakukan :
			echo "Maaf, Gambar gagal untuk diupload.";
			echo "<br><a href='form.php'>Kembali Ke Form</a>";
		}
?>

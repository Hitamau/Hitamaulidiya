<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama_brg = $_POST['nama_brg'];
$spek = $_POST['spek'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];
$kategori = $_POST['kategori'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama_brg fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "gambar/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO barang VALUES('', '".$nama_brg."', '".$spek."', '".$stok."', '".$harga."', '".$diskon."', '".$kategori."', '".$fotobaru."')";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo '<script language="javascript" type="text/javascript">
		alert("Data Tersimpan !");</script>';
		echo "<meta http-equiv='refresh' content='0; url=data_barang.php'>";
	}else{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
		alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<meta http-equiv='refresh' content='0; url=data_barang.php'>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
	echo '<script language="javascript" type="text/javascript">
	alert("Gambar gagal untuk diupload !");</script>';
	echo "<meta http-equiv='refresh' content='0; url=data_barang.php'>";
}
?>

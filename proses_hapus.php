<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data kd_brg yang dikirim oleh index.php melalui URL
$kd_brg = $_GET['kd_brg'];

// Query untuk menampilkan data barang berdasarkan kd_brg yang dikirim
$query = "SELECT * FROM barang WHERE kd_brg='".$kd_brg."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Cek apakah file fotonya ada di folder gambar
if(is_file("gambar/".$data['foto'])) // Jika foto ada
	unlink("gambar/".$data['foto']); // Hapus foto yang telah diupload dari folder gambar

// Query untuk menghapus data barang berdasarkan kd_brg yang dikirim
	$query2 = "DELETE FROM barang WHERE kd_brg='".$kd_brg."'";
$sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location:data_barang.php"); // Redirect ke halaman index.php
}else{
	// Jika Gagal, Lakukan :
	echo '<script language="javascript" type="text/javascript">
	alert("Data Gagal Dihapus !");</script>';
	echo "<meta http-equiv='refresh' content='0; url=data_barang.php'>";
}
?>

<?php
session_start();
include "koneksi.php";
$sid = $_SESSION[nmpegawai];

// Ambil data kd_brg yang dikirim oleh index.php melalui URL
$kd_brg = $_GET['kd_brg'];

// Query untuk menghapus data keranjang berdasarkan kd_brg yang dikirim
$query2 = "DELETE FROM keranjang WHERE id_session ='$sid' AND
kd_brg='$_GET[id]'";
$sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ 
	header("location:keranjang.php?hlm=Keranjang"); 
}else{
	// Jika Gagal, Lakukan :
	echo '<script language="javascript" type="text/javascript">
	alert("Data Gagal Dihapus !");</script>';
	echo "<meta http-equiv='refresh' content='0; url=keranjang.php?hlm=Keranjang'>";
}
?>

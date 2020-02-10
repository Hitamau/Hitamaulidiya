<?php
session_start();
include "koneksi.php";
$kd_brg=$_GET['id'];
@$sid = $_SESSION[nmpegawai];
$barang = mysqli_query($koneksi,"SELECT * FROM barang,keranjang WHERE barang.kd_brg = keranjang.kd_brg  AND barang.kd_brg='$kd_brg' AND keranjang.id_session='$sid'");
$data = mysqli_fetch_array($barang);
$stok=$data['stok'];
$jumlah=$data['jumlah'];
if($jumlah==1){
	echo '<script language="javascript" type="text/javascript">
	alert("Jumlah Tidak Boleh Kosong !");</script>';
	echo "<meta http-equiv='refresh' content='0; url=keranjang.php?hlm=Keranjang'>";
}else {
// kalau barang ada, maka di jalankan perintah update
	mysqli_query($koneksi,"UPDATE keranjang
		SET jumlah = jumlah - 1
		WHERE id_session ='$sid' AND
		kd_brg='$_GET[id]'");
	header('Location:keranjang.php?hlm=Keranjang');
}
?>
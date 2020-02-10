<?php
session_start();
include "koneksi.php";
@$sid = $_SESSION[nmpegawai];
$kd_brg=$_GET['id'];
//di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
$sql = mysqli_query($koneksi,"SELECT kd_brg FROM keranjang WHERE
	kd_brg='$_GET[id]' AND id_session='$sid'");
$ketemu=mysqli_num_rows($sql);
if ($ketemu==0){
// kalau barang belum ada, maka di jalankan perintah insert
	mysqli_query($koneksi,"INSERT INTO keranjang (kd_brg, jumlah,
		id_session)
		VALUES ('$_GET[id]', 1, '$sid')");
	header('Location:keranjang.php?hlm=Keranjang');
} else {
	$barang = mysqli_query($koneksi,"SELECT barang.stok AS stok, keranjang.jumlah AS jumlah FROM barang,keranjang WHERE barang.kd_brg = keranjang.kd_brg  AND barang.kd_brg='$kd_brg' AND keranjang.id_session='$sid'");
	$data = mysqli_fetch_array($barang);
	$stok=$data['stok'];
	$jumlah=$data['jumlah'];
	if($jumlah==$stok){
		echo '<script language="javascript" type="text/javascript">
		alert("Stok Habis !");</script>';
		echo "<meta http-equiv='refresh' content='0; url=keranjang.php?hlm=Keranjang'>";
	}else {
// kalau barang ada, maka di jalankan perintah update
		mysqli_query($koneksi,"UPDATE keranjang
			SET jumlah = jumlah + 1
			WHERE id_session ='$sid' AND
			kd_brg='$_GET[id]'");
		header('Location:keranjang.php?hlm=Keranjang');
	}
}
?>
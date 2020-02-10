
<div class="container-fluid">
  <br />
  <?php
	// Load file koneksi.php
  include "koneksi.php";
  
	// Ambil data kd_brg yang dikirim oleh index.php melalui URL
  $kd_brg=$_POST['id'];
  
	// Query untuk menampilkan data barang berdasarkan kd_brg yang dikirim
  $query = "SELECT * FROM barang WHERE kd_brg='".$kd_brg."'";
	$sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
  <form id="edit_barang" method="post" action="proses_ubah.php?kd_brg=<?php echo $kd_brg; ?>" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="form-control" name="nama_brg" id="nama_brg" value="<?php echo $data['nama_brg']; ?>">
    </div>
    <div class="form-group">
      <textarea class="form-control" name="spek" id="spek" placeholder="Spesifikasi" required><?php echo $data['spek']; ?></textarea>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="stok" id="stok" value="<?php echo $data['stok']; ?>">
    </div>
    <div class="row">
     <div class="col-sm-9">
      <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $data['harga']; ?>">
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-group form-control" name="diskon" id="diskon" value="<?php echo $data['diskon']; ?>">
    </div>
  </div>  
  <div class="form-group">
    <select class="form-control" id="sel1" name="kategori" value="<?PHP echo $kategori; ?>">
      <option>Game</option>
      <option>Hardware</option>
      <option>PC Build-Up</option>
    </select>
  </div>     
  <div class="form-group">
   <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
   <input type="file" name="foto">
 </div>    
 <div class="form-group">
  <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
</div>
</form>
</div>

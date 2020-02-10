 <?php 
 include "koneksi.php";
 include "header.php"; 
 if (empty($_SESSION['nmpegawai'])) {
 	header('location:login.php');
 }
 include "menu_navbar.php"; 
 ?>
 <br /><br /><br><br />
 <script type="text/javascript">
 	(function($) {
 		$(document).ready(function(e) {

 			$('.ubah').live("click", function(){
 				
 				var url = "edit_barang.php";
      // ambil nilai id dari tombol ubah
      kd_brg = this.id;
      $.post(url, {id: kd_brg} ,function(data) {
        // tampilkan data ke dalam <div class="modal-body"></div>
        $(".Edit-Barang").html(data).show();
    });
  });

 		}); 
 	}) (jQuery);
 </script>

 <div class="container" style="background-color: #fff">

 	<div class="page-header">
 		<h3>Data Barang <a class="btn btn-default pull-right" data-toggle="modal" data-target="#TambahBarang"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Barang </a></h3> 
 	</div>
 	
 	<br />
 	<div class="table-responsive" id="data-barang"><table class="table table-condensed table-bordered table-hover" cellpadding=0 cellspacing=0 >
 		<thead><tr bgcolor="DeepSkyBlue ">
 			<th>Foto</th>
 			<th>Nama Barang</th>
 			<th>Stok</th>
 			<th>Harga</th>
 			<th>Diskon</th>
 			<th>Kategori</th>
 			<th>Aksi</th>
 		</tr><tbody>
 			<?php
 			
 			
  $query = "SELECT * FROM barang"; // Query untuk menampilkan semua data barang
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
  	echo "<tr>";
  	echo "<td><img src='gambar/".$data['foto']."' width='100' height='100'></td>";
  	echo "<td>".$data['nama_brg']."</td>";
  	echo "<td>".$data['stok']."</td>";
  	echo "<td>".$data['harga']."</td>";
  	echo "<td>".$data['diskon']."</td>";
  	echo "<td>".$data['kategori']."</td>";

  	?>
  	<td>| <a href="#edit" id="<?php echo $data['kd_brg']?>" class="ubah" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a> |
  		<a href="proses_hapus.php?kd_brg=<?php echo $data['kd_brg']; ?>" title="Hapus Data Rubrik" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-remove-circle"></span> Hapus</a> |
  		<a href="detail.php?kd_brg=<?php echo $data['kd_brg']; ?>" title="Lihat Detail" ><span class="glyphicon glyphicon-eye-open"></span> Lihat</a> |</td></tr>
  		<?php
  	}
  	?>    

  </tbody></thead>
</table>
</div>  
</div>

<?php
include "tambah_barang.php";
?>

<div class="modal fade" id="edit" role="dialog">
	<div class="modal-dialog">
		<br /><br />
		<div class="modal-content">
			<div class="modal-header bg-biru">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Data Barang</h4>
			</div>
			<div class="Edit-Barang">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<br><br>
<?php 
include "footer.php"; 
?>
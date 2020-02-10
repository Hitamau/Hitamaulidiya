 <?php 
 include "koneksi.php";
 include "header.php"; 
 $sid = $_SESSION[nmpegawai];
 if (empty($_SESSION['nmpegawai'])) {
  header('location:login.php');
}
include "menu_navbar.php"; 
?>
<br /><br /><br><br />

<div class="container" style="background-color: #fff">

  <div class="page-header">
    <h3>Data Keranjang <a class="btn btn-default pull-right" href="produk.php?hlm=Semua Produk"> <span class="glyphicon glyphicon-plus"></span> Belanja </a></h3> 
  </div>
  
  <br />
  <div class="table-responsive" id="data-barang"><table class="table table-condensed table-bordered table-hover" cellpadding=0 cellspacing=0 >
    <thead><tr bgcolor="LawnGreen  ">
      <th>Foto</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>SubTotal</th>
      <th>Aksi</th>
    </tr><tbody>
      <?php
      
      
      $query = "SELECT * FROM keranjang, barang WHERE
id_session='$sid' AND keranjang.kd_brg=barang.kd_brg"; // Query untuk menampilkan semua data barang
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
  	$subtotal = @$data[harga]* @$data[jumlah];
    @$total = $total + $subtotal;
    echo "<tr>";
    echo "<td><img src='gambar/".$data['foto']."' width='100' height='100'></td>";
    echo "<td>".$data['nama_brg']."</td>";
    echo "<td align=center><a href='proses_tambahkrjg.php?id=$data[kd_brg]' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-plus'></span></a>
    &nbsp;&nbsp;".$data['jumlah']."&nbsp;&nbsp;
    <a href='proses_kurangkrjg.php?id=$data[kd_brg]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-minus'></span></a></td>";
    echo "<td>".$data['harga']."</td>";
    echo "<td>".$subtotal."</td>";

    ?>
    <td><a href="proses_hapuskrjg.php?id=<?php echo $data['kd_brg']; ?>" class="btn btn-danger">Hapus</a></td></tr>
    <?php
  }
  ?>    
  <tr><td colspan="5" align="right"><h4>Total Belanja : <b><?php echo "Rp " . number_format( @$total , 0 , "" , '.' ) . ",-"; ?></b></h4>
  </td></tr>
</tbody></thead>
</table>
</div>  
</div>

<br><br>
<?php 
include "footer.php"; 
?>
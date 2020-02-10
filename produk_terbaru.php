    <div class="maincontent-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="latest-product">
              <div class="panel panel-heading bg-ijo"><img src="logo/1.png" width="25px" height="25px"></img><h3>Hot Deals Today</h3></div>
              <div class="product-carousel">
                
                <?php
  $query = "SELECT * FROM barang Order By Rand() limit 8"; // Query untuk menampilkan data barang acak
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    ?>

    <div class="single-product">
      <div class="product-f-image">
        <?php  echo "<img src='gambar/".$data['foto']."'>"; ?>
        <div class="product-hover">
         
          <a href="detail.php?kd_brg=<?=$data['kd_brg'];?>" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
        </div>
      </div>
      <?php   echo "<h2><a href='detail.php?kd_brg=$data[kd_brg]'>".$data['nama_brg']."</a></h2>"; ?>
      <div class="product-carousel-price">
       <h4><?php echo "Rp " . number_format( $data['harga'] , 0 , "" , '.' ) . ",-"; ?> <span class="badge bg-1">Save <?=$data['diskon'];?>%</span></h4>
     </div> 
   </div>
 <?php } ?>
</div>
</div>
</div>
</div>
</div>
    </div> <!-- End main content area -->
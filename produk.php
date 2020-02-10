 <?php 
 include "header.php"; 
 include "menu_navbar.php"; 
 ?>  

 <div class="single-product-area">
  <div class="container">
    <div class="panel panel-heading bg-biru"><h3><?php echo $_GET['hlm'];?></h3></div>
    <div class="row">

      <?php
      if(@$_GET[hlm]=='Semua Produk'){
					@$query = "SELECT * FROM barang"; // Query untuk menampilkan semua data barang 
				}else
				{
					 @$query = "SELECT * FROM barang Where kategori='$_GET[hlm]'"; // Query untuk menampilkan data barang per kategori 
          }
				  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
				  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            ?>
            <div class="col-md-3 col-sm-6">
              <div class="single-shop-product" align="center">
               <div class="panel panel-primary">
                <div class="product-upper">
                  <?php  echo "<img src='gambar/".$data['foto']."'>"; ?>
                </div>
                <div class="panel-footer" align="left">

                  <?php   echo "<h2><a href='detail.php?kd_brg=$data[kd_brg]'>".$data['nama_brg']."</a></h2>"; ?>
                  
                  <h4><?php echo "Rp " . number_format( $data['harga'] , 0 , "" , '.' ) . ",-"; ?> <span class="badge bg-1">Save <?=$data['diskon'];?>%</span></h4>
                  <a class="add_to_cart_button" href="proses_tambahkrjg.php?id=<?=$data['kd_brg'];?>">Tambah ke Keranjang</a>
                </div>                       
              </div>
            </div>
          </div>
          
        <?php } ?>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="product-pagination text-center">
            <nav>
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>                        
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
  include "footer.php"; 
  ?>

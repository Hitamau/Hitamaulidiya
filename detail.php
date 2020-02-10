 <?php 
 @$_GET[hlm]="Detail Barang";
 include "header.php"; 
 include "menu_navbar.php"; 
 ?>
 
 <!-- Detail Produk Zoom Gambar -->
 <link href="lib/css/detail.css" rel="stylesheet" type="text/css" media="all" />	
 <link rel="stylesheet" href="lib/css/etalage.css">
 <script src="lib/js/jquery.etalage.min.js"></script>
 <script src="lib/js/zoom.js"></script>
 <!-- Slider produk -->
 <link rel="stylesheet" href="lib/css/owl.carousel.css">
 <script src="lib/js/owl.carousel.min.js"></script>
 <script src="lib/js/jquery.sticky.js"></script>
 <script src="lib/js/slider.js"></script>	
 <hr>
 <div class="product">
 	<div class="container">
 		<div class="col-md-3 product-price">
 			
 			<div class="product-bottom">
 				<div class="of-left-in">
 					<h3 class="best">BEST SELLER</h3>
 				</div>
 				<?php

     @$query = "SELECT * FROM barang Order by Rand() Limit 3"; // Query untuk menampilkan data barang acak
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
  	?>

  	<div class="product-go">
  		<div class=" fashion-grid">
  			<?php  echo "<img class='img-responsive' src='gambar/".$data['foto']."'>"; ?>
  		</div>
  		<div class="fashion-grid1">
  			<?php   echo "<h6 class='best2'><a href='detail.php?kd_brg=$data[kd_brg]'>".$data['nama_brg']."</a></h6>"; ?>
  			
  			<span class=" price-in1"><?php echo "Rp " . number_format( $data['harga'] , 0 , "" , '.' ) . ",-"; ?></span>
  		</div>
  		
  		<div class="clearfix"> </div>
  	</div>
  <?php } ?>
</div>

</div>

<?php
$ambil_data = mysqli_query($koneksi,"select * from barang where kd_brg='$_GET[kd_brg]'");
$data = mysqli_fetch_array($ambil_data);
?>
<div class="col-md-9 product-price1">
	<div class="col-md-5 single-top">	
		<ul id="etalage">
			<li>
				<a href="optionallink.html">
					<?php  echo "<img class='etalage_thumb_image img-responsive' src='gambar/".$data['foto']."'>"; ?>
					<?php  echo "<img class='etalage_source_image img-responsive' src='gambar/".$data['foto']."'>"; ?>
				</a>
			</li>
		</ul>
	</div>	

	<div class="col-md-7 single-top-in simpleCart_shelfItem">
		<div class="single-para ">
			<h4><?=$data['nama_brg'];?></h4>
			
			<h5 class="item_price"><?php echo "Rp " . number_format( $data['harga'] , 0 , "" , '.' ) . ",-"; ?></h5>
			<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#spesifikasi">
				Spesifikasi
			</button>
			<div id="spesifikasi" class="collapse out">
				<p align="justify"><?=$data['spek'];?></p>
			</div>

			<ul class="tag-men">
				<li><span>Stok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<span class="katt">: <?=$data['stok'];?></span></li>
					<li><span>Diskon &nbsp;</span>
						<span class="katt">: <?=$data['diskon'];?>%</span></li>
						<li><span>Kategori</span>
							<span class="katt">: <?=$data['kategori'];?></span></li>
						</ul>
						<a href="proses_tambahkrjg.php?id=<?=$data['kd_brg'];?>" class="add-cart item_add">ADD TO CART</a>
					</div>
				</div>		      
			</div>
		</div>
	</div>
	<?php 
	include "produk_terbaru.php"; 
	include "footer.php"; 
	?>

<?php 
include "header.php"; 
include "menu_navbar.php"; 
?>
<!-- Slider produk -->
<link rel="stylesheet" href="lib/css/owl.carousel.css">
<script src="lib/js/owl.carousel.min.js"></script>
<script src="lib/js/jquery.sticky.js"></script>
<script src="lib/js/slider.js"></script>   

<br>
<div class="slider-area">
   <!-- Slider -->
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <div class="item active img-responsive">
        <img src="gambar/slider1.jpg" alt="New York" width="1200" height="400">      
    </div>

    <div class="item">
        <img src="gambar/slider2.jpg" alt="Chicago" width="1200" height="400">
    </div>
    
    <div class="item">
        <img src="gambar/slider3.jpg" alt="Los Angeles" width="1200" height="400">      
    </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>Garansi Barang</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Gratis Ongkir</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Pembayaran Aman</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>Produk Terbaru</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<?php 
include "produk_terbaru.php"; 
    //include "sponsor.php"; 
include "footer.php"; 
?>


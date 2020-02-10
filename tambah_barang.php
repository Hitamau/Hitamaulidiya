
<div class="modal fade" id="TambahBarang" role="dialog">
  <div class="modal-dialog">
   <br /><br />
   <div class="modal-content">
    <div class="modal-header bg-biru">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tambah Data Barang</h4>
    </div>
    <div class="modal-body">
      <form id="tambah_barang" method="post" action="proses_simpan.php" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="Nama Barang" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="spek" id="spek" placeholder="Spesifikasi" required></textarea>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok"required>
        </div>
        <div class="row">
         <div class="col-sm-9">
          <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga"required>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-group form-control" name="diskon" id="diskon" placeholder="Diskon"required>
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
        <input type="file" name="foto" required>
      </div>    
      <div class="form-group">
        <input type="submit" value="Simpan" name="simpan" class="btn btn-info">
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
  </div>
</div>
</div>
</div>
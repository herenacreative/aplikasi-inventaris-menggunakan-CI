<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
        <?php
        foreach($data->result() as $row){
			$nama_barang = $row->nama_barang;
			$id = $row->id_inventaris;
			$keterangan = $row->keterangan;
			$jumlah = $row->jumlah;
			}
        ?>    
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/sekertaris/inventaris/simpan_edit" method="post" >
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="<?php echo $id; ?>" />
                  <label for="exampleInputEmail1">Nama Barang</label>
       <input type="text" name="nama_barang" value="<?php echo $nama_barang ?>" onKeyUp="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama" required>
      
       </div>
                 <div class="form-group">
                
                  <label for="exampleInputEmail1">Jumlah</label>
       <input type="number" value="<?php echo $jumlah;?>"  name="jumlah"  class="form-control col-6" required>
       
                  
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan </label>
                  <textarea class="form-control" name="keterangan"><?php echo $keterangan;?></textarea>
                 </div>
                
             
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>
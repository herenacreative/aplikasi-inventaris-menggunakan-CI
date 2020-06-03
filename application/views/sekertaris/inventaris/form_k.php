<div class="row" role="">
    <div class="modal-content">
      
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/sekertaris/inventaris/simpan_k" method="post" >
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama Barang</label>
       
       <select name="nama_barang" class="form-control col-6" required>
       
       <option value=""></option>
       <?php foreach($data->result() as $row){?>
       <option value="<?php echo $row->id_inventaris;?>"><?php echo $row->nama_barang; ?></option>
       <?php }?>
       
       
       </select>
      
       </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan Pengembalian</label>
                  <textarea class="form-control" name="keterangan"></textarea>
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
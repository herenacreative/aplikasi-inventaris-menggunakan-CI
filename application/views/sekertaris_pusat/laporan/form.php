<?php
foreach($data->result() as $row){
	$id_inventaris=$row->id_inventaris;
	$id_cabang=$row->id_cabang;
	$nama_cabang=$row->nama_cabang;
	$nik=$row->nik;
	$user_pusat=$row->user_pusat;
	$tgl_request=$row->tgl_request;
	$tgl_request_acc=$row->tgl_request_acc;
	$nama_barang=$row->nama_barang;
	$nama=$row->nama;
	$ket=$row->keterangan;
	$jumlah=$row->jumlah;
	
	
	}
?>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-"></i> Cabang :  <?php echo $nama_cabang;
			?>
            <small class="pull-right">Tgl Request: <?php echo $tgl_request;?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Sekertaris Cabang
          <address>
            <strong><?php echo $nama;?></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Nama Barang
          <address>
            <strong><?php echo $nama_barang;?></strong><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Jumlah</b><br>
          <?php echo $jumlah;?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<hr />
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <form class="form" action="<?php echo base_url()?>index.php/sekertaris_pusat/inventaris/kirim" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="jumlah" value="<?php echo $jumlah;?>" />
                  <label for="exampleInputEmail1">@Harga Barang </label>
       <input type="number" name="harga"  onKeyUp="hitu()" class="form-control" placeholder="" required>
      </div>
       <div class="form-group">
                <input type="hidden" name="id_inventaris" value="<?php echo $id_inventaris?>" />
                  <label for="exampleInputEmail1">@Harga Penyusutan </label>
       <input type="number" name="harga_penyusutan"  class="form-control" placeholder="" required>
      </div>
               
                
                

                
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
        </div>
        <!-- /.col -->
      </div>
      
      
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  

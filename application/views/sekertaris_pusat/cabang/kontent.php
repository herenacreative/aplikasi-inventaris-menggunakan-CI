<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>


              
               <section class="content-header">
     
        
        <small>  <a class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus" data-toggle="modal" data-target="#tambah"></i> Tambah</a></small>
        
     
     
      
    </section>
    <section class="content">
<div class="box">
          
        
            <!-- /.box-header -->
            <div class="box-body">
           
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA CABANG
	 </th>
                  <th>PHONE</th>
                  <th>ALAMAT</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$no=1;
				if($data->num_rows()>0){
					foreach($data->result() as $row){
					?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->nama_cabang;?></td>
                  <td><?php echo $row->phone_cabang;?></td>
                  <td><?php echo $row->alamat_cabang;?></td>
                  <td>
                   <span>
            <a href="#" class="glyphicon glyphicon-trash delete-personil" style="color:red"  title=""
            data-toggle="modal" data-target="#delete" 
            data-id_pr2="<?php echo $row->id_cabang;?>"
             data-nama_pr2="<?php echo $row->nama_cabang;?>" 
             ></a> 
            </span>||<span>
            <a href="#" data-toggle="modal" data-target="#editt" class="glyphicon glyphicon-pencil edit-personil"
             data-id_pr="<?php echo $row->id_cabang;?>" 
            data-nama_pr="<?php echo $row->nama_cabang;?>"
            data-daftar_pangkat_pr="<?php echo $row->alamat_cabang;?>"
            data-daftar_nohp="<?php echo $row->phone_cabang;?>"></a>
            
            </span>
            
              
          </td>
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
</div>
            <!-- /.box-body -->
      </div>
</section>

      <!-- Button trigger modal -->

<!-- Modal tambah dokter-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA CABANG</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
    <form class="form" action="<?php echo base_url()?>index.php/sekertaris_pusat/cabang/simpan" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                <input type="hidden" name="lokasi" value="Lokasi" />
                  <label for="exampleInputEmail1">Nama Cabang</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="p_nama" class="form-control" placeholder="Nama" required>
                </div>
                
                

                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat Cabang</label>
                  <textarea class="form-control" name="p_pangkat" id="p_pangkat"></textarea>
                 
                </div>

                
                <div class="form-group">
                  <label for="exampleInputEmail1">No. Telepon</label>
                  <input type="text" name="p_nohp" class="form-control" placeholder="Masukkan tanpa +62 contoh : 081822299999" required>
                </div>

                
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </div>
             
            </form>
          </div>



      </div>
      
    </div>
  </div>
</div>

<!-- Modal edit dokter-->


<div class="modal fade" id="editt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT DATA CABANG</h4>
      </div>
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/sekertaris_pusat/cabang/updated" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi2" value="Lokasi" />
                  <label for="exampleInputEmail2">NAMA CABANG</label>
                  <input type="text" onKeyUp="this.value = this.value.toUpperCase()" name="p_nama2" id="p_nama2" class="form-control" placeholder="Nama" required="required" />
                  <input type="hidden" name="id" id="id" class="form-control" required="required" />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">ALAMAT CABANNG</label>
                  <textarea class="form-control" name="p_pangkat2" id="p_pangkat2"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail2">No. Telepon</label>
                  <input type="text" name="p_nohp2" id="p_nohp2" class="form-control" placeholder="Masukkan tanpa +62 contoh : 081822299999" required="required" />
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>

      
      
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color:red" id="myModalLabel">DELETE DATA CABANG!!!</h4>
      </div>
      <div class="modal-bodydelete">
       
        <div class="box box-primary">
            
           
            <!-- form start -->
            <form class="form" action="<?php echo base_url()?>index.php/sekertaris_pusat/cabang/deleted" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="lokasi3" value="Lokasi" />
                  <label for="exampleInputEmail2">Anda Akan Menghapus <strong style="color:red"><i id="nama"></i></strong> ?</label>
                  
                  <input type="hidden" name="id3" id="id3" class="form-control" required="required" />
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                </div>
              </div>
            </form>
        </div>



      </div>
      
    </div>
  </div>
</div>
      
      
      
      <div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       
        <div class="box box-primary">
            
           
          <!-- form start --></div>



      </div>
      
    </div>
  </div>
</div>    

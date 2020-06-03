<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>

    <!-- Main content -->
  <section class="content">
    <div class="col-md-6">
          <!-- general form elements -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">FILTER LAPORAN</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" target="_blank" action="<?php echo base_url()?>index.php/manager/laporan/prt" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" required class="form-control"  name="tgl1" id="tgl" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">S/d</label>
                  <input type="text" required class="form-control" id="tgl1" name="tgl2" placeholder="">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
         </div>
         <!-- /.box -->

         <!-- Form Element sizes --><!-- /.box --><!-- /.box -->

         <!-- Input addon --><!-- /.box -->

    </div>
        <!--/.col (left) -->
        <!-- right column -->
    
      </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
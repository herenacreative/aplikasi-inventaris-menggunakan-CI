<?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo $info;
																 
																 
																 }
															?>

   <?php echo $this->load->view($header1);?>
  <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php foreach($request->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>REQUEST</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/REQUEST" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
			  <?php foreach($request_acc->result() as $row){
				  echo $row->jmlh;
				  
				  };?></sup></h3>

              <p>REQUEST DI  ACC</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-green"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/REQUEST ACC" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3> <?php foreach($request_kirim_cabang->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>TERKIRIM KE CABANG</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/REQUEST DITERIMA CABANG" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php foreach($request_pengembalian->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>REQUEST PENGEMBALIAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/REQUEST PENGEMBALIAN" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php foreach($request_pengembalian_acc->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>PENGEMBALIAN DI ACC</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
             <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/PENGEMBALIAN ACC" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php foreach($request_pengembalian_terima_pusat->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>PENGEMBALIAN TERKIRIM KE PUSAT</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
             <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat/PENGEMBALIAN DITERIMA PUSAT" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        
        <div class="col-lg-12 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php foreach($total->result() as $row){
				  echo $row->jmlh;
				  
				  };?></h3>

              <p>TOTAL INVENTARIS</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url()?>index.php/sekertaris/inventaris/lihat_all/0" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
      </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
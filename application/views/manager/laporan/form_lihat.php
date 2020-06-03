<style type="text/css" media="print">
@media print{
        @page 
        {
            size: auto;   /* auto is the current printer page size */
			margin-top:3mm;
			margin-bottom:0mm;
			
              /* this affects the margin in the printer settings */
        }

        body 
        {
			-webkit-print-color-adjust: exact;
            background-color:#FFF; 
            border: solid 1px #FFF ;
            margin: 0px;  /* the margin on the content before printing */
       }
	   table{
		   margin:1px;
		   background:#FFF;}
		 thead{
			 background-color:#F90;
			 color:#FFF
			 }
			 hr{
				 color::#F90;
				 border:none;
				 height:10px;
				 background-color:#F90;
				 }
				 footer{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#F90;
					 }
				footer table{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#F90;
					 color:#FFF;
					 padding:1px;
					}	 
					footer hr{
					 position:absolute;
					 bottom:0;
					 width:100%;
					 height:60px;
					 background:#000;
					}	 

}}
    .row .col-xs-12.table-responsive table {
	text-align: left;
}
</style>


<script type="text/javascript">
window.print();
window.onfocus=function()
{
window.close();

}</script>
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header" align="center">
           LAPORAN INVENTARIS
          </h2>
          
          
        </div>
        <!-- /.col -->
      </div>
      <!-- info row --><!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
  <table class="table table-striped" >
            <thead>
            <tr>
              <th align="center">No</th>
              <th align="center">ID</th>
              <th align="center">CABANG</th>
              <th align="center">BARANG</th>
              <th align="center">STATUS</th>
              <th align="center">JUMLAH</th>
              <th align="center">HARGA</th>
              <th align="center">HARGA PENYUSUTAN</th>
              <th align="center">PENYUSUTAN</th>
              </tr>
            </thead>
            
            <tbody>
            <?php
			$sum=0;
			$sumj=0;
			$sum1=0;
			$no=1;
foreach($data->result() as $row){
	$sum+=$row->harga;
	
	
	?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $row->id_inventaris;?></td>
              <td><?php echo $row->nama_cabang;?></td>
              <td><?php echo $row->nama_barang;?></td>
              <td><?php echo $row->stts;?></td>
              <td><?php echo $row->jumlah;
			  
			  $sumj+=$row->jumlah;?></td>
              <td>Rp. <?php 
			  if($row->harga==""){
			  echo "0";
			  }else{
			  echo number_format($row->harga);
			  }?></td>
              <td>Rp. <?php 
			  if($row->harga==""){
			  echo "0";}else{
			  echo number_format($row->harga_penyusutan);}?></td>
              <td>Rp. <?php  $a = $row->harga-$row->harga_penyusutan;
			  echo number_format($a/5);
			  $sum1+=$a;
			  
			  ?> / Tahun</td>
              
            </tr>
            <?php } ?>
             <tr>
            
              <td colspan="9" align="right"><hr /></td>
              </tr>
            <tr>
            
              <td colspan="9" align="right">&nbsp;</td>
              </tr>
            </tbody>
          </table>
          <table>
         
          <tr>
            <th>Total</th>
            <th>:</th>
            <th>Rp. <?php echo number_format($sum);?></th>
          </tr>
          <tr>
            <th>Penyusutan</th>
            <th>:</th>
            <th>Rp. <?php echo number_format($sum1/5);?> / Tahun</th>
          </tr>
          <tr>
            <th>Jumlah Inventaris</th>
            <th>:</th>
            <th><?php echo $sumj;?></th>
          </tr>
          <tr>
            <th colspan="3">&nbsp;</th>
          </tr>
          <tr>
            <th colspan="3">Tanggal Cetak : <?php echo date('d-m-Y');?></th>
            </tr>
         
          </table>
        
        
           
        </div>
        <!-- /.col -->
      </div>
      
      
   
    <!-- /.content -->
    <div class="clearfix"></div>
  

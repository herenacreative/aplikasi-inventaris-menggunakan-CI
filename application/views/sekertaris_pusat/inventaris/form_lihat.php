<?php
foreach($data->result() as $row){
	$id_inventaris=$row->id_inventaris;
	$id_cabang=$row->id_cabang;
	$nama_cabang=$row->nama_cabang;
	
	$nik=$row->nik;
	$tgl_terima=$row->tgl_terima;
	
	$stts=$row->stts;
	$user_pusat=$row->user_pusat;
	$user_pusat=$row->user_pusat;
	$tgl_beli=$row->tgl_beli;
	
	$tgl_request=$row->tgl_request;
	$tgl_request_acc=$row->tgl_request_acc;
	$nama_barang=$row->nama_barang;
	$nama=$row->nama;
	$ket=$row->keterangan;
	$jumlah=$row->jumlah;
	
	$tgl_request_acc=$row->tgl_request_acc;
	$tgl_pengembalian=$row->tgl_pengembalian; 
	$tgl_pengembalian_acc=$row->tgl_pengembalian_acc; 
	$tgl_pengembalian_diterima=$row->tgl_pengembalian_diterima; 
	if($row->harga==""){
		$harga = "0";
		}else{
			$harga=number_format($row->harga);
			}
	if($row->harga_penyusutan==""){
		$harga_penyusutan = "0";
		}else{
			$harga_penyusutan=number_format($row->harga_penyusutan);
			}
	
	}
?>

<script type="text/javascript">
window.print();
window.onfocus=function()
{
window.close();

}</script>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header" align="center">
           DETAIL INVENTARIS
          </h2>
          
          <h2 class="page-header">
            <i class="fa fa-"></i> Cabang :  <?php echo $nama_cabang;
			?>
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-3 invoice-col">
          Sekertaris Cabang
          <address>
            <strong><?php echo $nama;?></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          Nama Barang
          <address>
            <strong><?php echo $nama_barang;?></strong><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          <b>Jumlah</b> <?php echo $jumlah;?><br>
          
        </div>
        <div class="col-sm-3 invoice-col">
          <b>Tanggal Request</b><br>
         <?php echo $tgl_request?>
        </div>
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
              <th colspan="5" align="center">DATA DETAIL INVENTARIS</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td>HARGA</td>
              <td>: Rp. <?php echo $harga?></td>
              <td>&nbsp;</td>
              <td>HARGA PENYUSUTAN</td>
              <td>: Rp. <?php echo $harga_penyusutan?></td>
            </tr>
            <tr>
              <td>TGL ACC MANAGER</td>
              <td>: <?php echo $tgl_request_acc;?></td>
              <td>&nbsp;</td>
              <td>STATUS</td>
              <td>: <?php echo $stts;?></td>
            </tr>
            <tr>
              <td>TGL PEMBELIAN</td>
              <td>: <?php echo $tgl_beli;?></td>
              <td>&nbsp;</td>
              <td>SEKERTARIS PUSAT</td>
              <td>: <?php
			  $r = $this->db->query('select nama from tab_karyawan where nik="'.$user_pusat.'"');
			  foreach($r->result() as $yu){
				  echo $yu->nama;
				  }
			  ?></td>
            </tr>
            <tr>
              <td>TGL KIRIM KE CABANG</td>
              <td>: <?php echo $tgl_terima;?></td>
              <td>&nbsp;</td>
              <td>KETERANGAN REQUEST</td>
              <td>: <?php echo $ket;?></td>
              </tr>
            <tr>
              <td colspan="5"><hr /></td>
              </tr>
            <tr>
              <td>TGL PENGEMBALIAN</td>
              <td>: <?php echo $tgl_pengembalian;?></td>
              <td>&nbsp;</td>
              <td>TGL ACC PENGEMBALIAN</td>
              <td>: : <?php echo $tgl_pengembalian_acc;?></td>
            </tr>
            <tr>
              <td>TGL TERIMA PENGEMBALIAN DI PUSAT</td>
              <td>: : <?php echo $tgl_pengembalian_diterima;?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5" align="right">Tanggal Cetak : <?php echo date('d-m-Y');?>&nbsp;</td>
              </tr>
            </tbody>
          </table>
        
        
           
        </div>
        <!-- /.col -->
      </div>
      
      
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  

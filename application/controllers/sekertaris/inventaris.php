<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->cekAksesSEKERTARIS();
		}
	public function index()
	{   
	
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$id_cabang = $this->session->userdata('id_cabang');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['header1'] = "sekertaris/inventaris/header";
		$isi['request'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
		$isi['request_acc'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST ACC" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
	$isi['request_kirim_cabang'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST DITERIMA CABANG" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
$isi['request_pengembalian'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST PENGEMBALIAN" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
$isi['request_pengembalian_acc'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="PENGEMBALIAN ACC" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
	$isi['request_pengembalian_terima_pusat'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="PENGEMBALIAN DITERIMA PUSAT" AND tab_inventaris.id_cabang="'.$id_cabang.'"');
	$isi['total'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE tab_inventaris.id_cabang="'.$id_cabang.'"');

		$isi['kontent'] = "sekertaris/inventaris/kontent";
		$this->load->view('sekertaris/tampilan_home',$isi);
		
	}
	
	public function lihat($od)
	{   
	    $id=str_replace("%20"," ",$od);
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA INVENTARIS ".$id;
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data'] = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.stts = "'.$id.'"
		AND tab_inventaris.id_cabang="'.$this->session->userdata('id_cabang').'"');
		$cek = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.stts = "'.$id.'"
		AND tab_inventaris.id_cabang="'.$this->session->userdata('id_cabang').'"');
		if($cek->num_rows()>0){
		
		$isi['kontent'] = "sekertaris/inventaris/kontent_lihat";
		$this->load->view('sekertaris/tampilan_home',$isi);
		}else{
			$this->session->set_flashdata('info','Data TIDAK ADA');
			redirect('sekertaris/inventaris');
			}
		
	}
	public function tambah($id)
	{   
	
	    
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "REQUEST INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data']=$this->db->get('tab_cabang');
	   $isi['kontent'] = "sekertaris/inventaris/form";
		$this->load->view('sekertaris/tampilan_home',$isi);
		
	}
	
	
	public function tambah_k($id)
	{   
	
	    
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "REQUEST PENGEMBALIAN INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data'] = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE
tab_inventaris.stts = "REQUEST DITERIMA CABANG"
AND tab_inventaris.stts !="REQUEST PENGEMBALIAN" 
AND tab_inventaris.stts !="PENGEMBALIAN ACC" 
AND tab_inventaris.stts !="PENGEMBALIAN DITERIMA PUSAT"
		AND tab_inventaris.id_cabang="'.$this->session->userdata('id_cabang').'"');
	   $isi['kontent'] = "sekertaris/inventaris/form_k";
		$this->load->view('sekertaris/tampilan_home',$isi);
		
	}
	
	
	public function simpan()
	{
		
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	'id_inventaris' =>'INV'.date('Ymdhis'), 
	'id_cabang'=>$this->session->userdata('id_cabang'), 
	'nik'=>$this->session->userdata('nip'),  
	'user_pusat'=>'', 
	'tgl_request'=>date('d-m-Y'), 
	'tgl_request_acc'=>'', 
	'tgl_beli'=>'', 
	'tgl_terima'=>'', 
	'tgl_pengembalian'=>'', 
	'tgl_pengembalian_acc'=>'', 
	'tgl_pengembalian_diterima'=>'', 
	'nama_barang'=>$this->input->post('nama_barang'), 
	'harga'=>'', 
	'harga_penyusutan'=>'', 
	'stts'=>'REQUEST', 
	'jumlah'=>$this->input->post('jumlah'), 
	'keterangan'=>$this->input->post('keterangan')
	);
	
		$this->db->insert('tab_inventaris',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		

	redirect('sekertaris/inventaris');
		
		}
	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function hapus($id)
	{
		
		$this->db->query('DELETE FROM tab_inventaris WHERE id_inventaris="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		
			redirect('sekertaris/inventaris');
			
	}
	public function updateinventaris()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_inventaris 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('sekertaris/inventaris');
	}else{
		redirect('sekertaris/inventaris');
		
		}
	
	}
	
public function edit($id){
	$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "EDIT REQUEST INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data']=$this->db->get('tab_cabang');
	   $isi['kontent'] = "sekertaris/inventaris/form_edit";
	   $isi['data']= $this->db->query('select* from tab_inventaris where id_inventaris="'.$id.'"');
		$this->load->view('sekertaris/tampilan_home',$isi);
	}
	public function simpan_edit(){
		$id = $this->input->post("lokasi");
		$jumlah = $this->input->post("jumlah");
		$keterangan = $this->input->post("keterangan");
		$nama_barang = $this->input->post("nama_barang");
		
		$this->db->query("UPDATE tab_inventaris 
	SET nama_barang = '$nama_barang' , jumlah = '$jumlah' , keterangan = '$keterangan'
	WHERE
	id_inventaris = '$id' ;
");
		$this->session->set_flashdata('info','Data Sukses Di Update');
		
			redirect('sekertaris/inventaris');
		}
		
		
		public function lihat_all($od)
	{   
	    $id=str_replace("%20"," ",$od);
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA INVENTARIS ";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data'] = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.id_cabang="'.$this->session->userdata('id_cabang').'"');
		$cek = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.id_cabang="'.$this->session->userdata('id_cabang').'"');
		if($cek->num_rows()>0){
		
		$isi['kontent'] = "sekertaris/inventaris/kontent_lihat";
		$this->load->view('sekertaris/tampilan_home',$isi);
		}else{
			$this->session->set_flashdata('info','Data TIDAK ADA');
			redirect('sekertaris/inventaris');
			}
		
	}
	
	
	public function simpan_k()
	{
		
	$key = $this->input->post('lokasi');
	$tgl = date('d-m-Y');
	$id_inventaris = $this->input->post('nama_barang');
	$ket = $this->input->post('keterangan');
	if($key=="Lokasi")
	{  
	$d = $this->db->query("select * from tab_inventaris where id_inventaris='$id_inventaris'");
	foreach($d->result() as $tw){
		$keter = $tw->keterangan;
		$this->db->query("UPDATE tab_inventaris SET 
		stts='REQUEST PENGEMBALIAN',
		keterangan='Keterangan Request : $keter <br /> Keterangan Pengembalian : $ket',
		tgl_pengembalian = '$tgl'
		where id_inventaris='$id_inventaris'");
		}
	
		
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		

	redirect('sekertaris/inventaris');
		
		}
	
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
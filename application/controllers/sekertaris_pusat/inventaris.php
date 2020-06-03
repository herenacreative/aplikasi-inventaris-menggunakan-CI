<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->cekAksesSEKERTARIS_P();
		}
	public function index()
	{   
	
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "DATA INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$isi['request'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST"');
		$isi['request_acc'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST ACC"');
	$isi['request_kirim_cabang'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST DITERIMA CABANG"');
$isi['request_pengembalian'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="REQUEST PENGEMBALIAN"');
$isi['request_pengembalian_acc'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="PENGEMBALIAN ACC"');
	$isi['request_pengembalian_terima_pusat'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris WHERE stts="PENGEMBALIAN DITERIMA PUSAT"');
	$isi['total'] = $this->db->query('SELECT COUNT(*) AS jmlh FROM tab_inventaris');

		$isi['kontent'] = "sekertaris_pusat/inventaris/kontent";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		
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
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data'] = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.stts = "'.$id.'"');
		$cek = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.stts LIKE "'.$id.'%"');
		if($cek->num_rows()>0){
		
		$isi['kontent'] = "sekertaris_pusat/inventaris/kontent_lihat";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		}else{
			$this->session->set_flashdata('info','Data TIDAK ADA');
			redirect('sekertaris_pusat/inventaris');
			}
		
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
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data'] = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik)');
		$cek = $this->db->query('SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik)');
		if($cek->num_rows()>0){
		
		$isi['kontent'] = "sekertaris_pusat/inventaris/kontent_lihat";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		}else{
			$this->session->set_flashdata('info','Data TIDAK ADA');
			redirect('sekertaris_pusat/inventaris');
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
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data']=$this->db->get('tab_cabang');
	   $isi['kontent'] = "sekertaris_pusat/inventaris/form_t";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		
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
		

	redirect('sekertaris_pusat/inventaris');
		
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
		
			redirect('sekertaris_pusat/inventaris');
			
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
	redirect('sekertaris_pusat/inventaris');
	}else{
		redirect('sekertaris_pusat/inventaris');
		
		}
	
	}
	public function edit($id){
		 $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PROSES DATA REQUEST INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data']=$this->db->query('SELECT
    tab_inventaris.*
    , tab_cabang.*
    , tab_karyawan.*
FROM
    tab_inventaris
    INNER JOIN tab_karyawan 
        ON (tab_inventaris.nik = tab_karyawan.nik)
    INNER JOIN tab_cabang 
        ON (tab_inventaris.id_cabang = tab_cabang.id_cabang) WHERE tab_inventaris.id_inventaris="'.$id.'"');
		
		
		
		
		
		 $isi['kontent'] = "sekertaris_pusat/inventaris/form";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		}
		
		
		
		
		
		
		
		
		
		public function edit_l($id){
		 $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "PROSES DATA REQUEST INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data']=$this->db->query('SELECT
    tab_inventaris.*
    , tab_cabang.*
    , tab_karyawan.*
FROM
    tab_inventaris
    INNER JOIN tab_karyawan 
        ON (tab_inventaris.nik = tab_karyawan.nik)
    INNER JOIN tab_cabang 
        ON (tab_inventaris.id_cabang = tab_cabang.id_cabang) WHERE tab_inventaris.id_inventaris="'.$id.'"');
		
		
		
		
		
		 
		$this->load->view("sekertaris_pusat/inventaris/form_lihat",$isi);
		}
		
		
		
		
		
		
		
		public function kirim(){
			$nik = $this->session->userdata('nip');
			$tgl = date('d-m-Y');
			
			
			$harga = $this->input->post('harga');
			
	$id_inventaris = $this->input->post('id_inventaris');
	$harga_penyusutan = $this->input->post('harga_penyusutan');
	$this->db->query("UPDATE tab_inventaris 
	SET user_pusat = '$nik',
	 tgl_beli = '$tgl' , 
	tgl_terima = '$tgl' , 
	harga = '$harga' , 
	harga_penyusutan = '$harga_penyusutan' , 
	stts = 'REQUEST DITERIMA CABANG' 
	WHERE
	id_inventaris = '$id_inventaris' ;
");
	$this->session->set_flashdata('info','Data Sukses Di Kirim');
	redirect('sekertaris_pusat/inventaris');
			}


public function edit_k($id){
	$tgl = date('d-m-Y');
	$this->db->query("UPDATE tab_inventaris 
	SET tgl_pengembalian_diterima = '$tgl' , 
	stts = 'PENGEMBALIAN DITERIMA PUSAT' 
	WHERE
	id_inventaris = '$id' ;
");
	$this->session->set_flashdata('info','Data Pengembalian Sukses Di Terima Pusat');
	redirect('sekertaris_pusat/inventaris');
			
	
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
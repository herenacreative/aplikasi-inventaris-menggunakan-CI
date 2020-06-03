<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabang extends CI_Controller {

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
		$isi['home_nav1'] = "DATA CABANG";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data'] = $this->db->get('tab_cabang');
		$isi['kontent'] = "sekertaris_pusat/cabang/kontent";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		
	}
	public function simpan()
	{
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	'id_cabang'=>"",
	'nama_cabang'=>$this->input->post('p_nama'),
	'alamat_cabang'=>$this->input->post('p_pangkat'),
	'phone_cabang'=>$this->input->post('p_nohp')
	);
	
	$this->db->insert('tab_cabang',$data);
	$this->session->set_flashdata('info','Data Sukses Di Simpan');
	redirect('sekertaris_pusat/cabang');
	}else{
		redirect('sekertaris_pusat/cabang');
		
		}
	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function deleted()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM tab_cabang WHERE id_cabang="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('sekertaris_pusat/cabang');
		}else{
			redirect('sekertaris_pusat/cabang');
			}
	}
	public function updated()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama_cabang = $this->input->post('p_nama2');
	$alamat_cabang = $this->input->post('p_pangkat2');
	$phone_cabang = $this->input->post('p_nohp2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE tab_cabang
	SET
	
	nama_cabang = '$nama_cabang' , 
	alamat_cabang = '$alamat_cabang' , 
	phone_cabang = '$phone_cabang'
	
	WHERE
	id_cabang = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('sekertaris_pusat/cabang');
	}else{
		redirect('sekertaris_pusat/cabang');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
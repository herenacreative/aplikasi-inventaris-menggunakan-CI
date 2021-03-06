<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		$isi['home_nav1'] = "DATA BARANG";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$isi['data'] = $this->db->query('SELECT
    tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)');
		
		$isi['kontent'] = "sekertaris_pusat/karyawan/kontent";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		
	}
	public function tambah($id)
	{   
	
	    
		$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris_pusat/header";
		$f = $this->db->query("SELECT
    tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang) WHERE tab_karyawan.nik='$id'");
		if($f->num_rows>0){
			$isi['home_nav1'] = "EDIT KARYAWAN";
			foreach($f->result() as $rw){
								$isi['nik']=$rw->nik;
								$isi['nama']=$rw->nama;
								$isi['alamat']=$rw->alamat;
								$isi['jk']=$rw->jk;
								$isi['phone']=$rw->phone;
								$isi['id_cabang']=$rw->id_cabang;
								$isi['cabang']=$rw->nama_cabang;
								$isi['tem_lah']=$rw->tem_lah;
								$isi['tgl_lah']=$rw->tgl_lah;}
		}else{
			$isi['home_nav1'] = "TAMBAH KARYAWAN";
			                    $isi['nik']="";
								$isi['nama']="";
								$isi['alamat']="";
								$isi['jk']="";
								$isi['phone']="";
								$isi['id_cabang']="";
								$isi['cabang']="";
								$isi['tem_lah']="";
								$isi['tgl_lah']="";
			}
		$isi['data']=$this->db->get('tab_cabang');
	   $isi['kontent'] = "sekertaris_pusat/karyawan/form";
		$this->load->view('sekertaris_pusat/tampilan_home',$isi);
		
	}
	public function simpan()
	{
		$nok = $this->input->post('nik');
	$key = $this->input->post('lokasi');
	if($key=="Lokasi")
	{  
	$data = array(
	nik => $this->input->post('nik'),
	nama =>$this->input->post('nama'),
	alamat => $this->input->post('alamat'),
	jk => $this->input->post('jk'),
	phone => $this->input->post('phone'),
	cabang => $this->input->post('cabang'),
	tem_lah => $this->input->post('tem_lah'),
	tgl_lah => $this->input->post('tgl_lah')
	);
	if(!$nok){
		$this->db->insert('tab_karyawan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}else{
			$this->db->where('nik',$nok);
			$this->db->update('tab_karyawan',$data);
		$this->session->set_flashdata('info','Data Sukses Di Simpan');
			}

	redirect('sekertaris_pusat/karyawan');
		
		}
	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function deletekaryawan()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('DELETE FROM tab_karyawan WHERE nik="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('sekertaris_pusat/karyawan');
		}else{
			redirect('sekertaris_pusat/karyawan');
			}
	}
	public function updatekaryawan()
	{
		
		
		
		$key = $this->input->post('lokasi2');
	if($key=="Lokasi")
	{  
	
	$nama = $this->input->post('p_nama2');
	$dept = $this->input->post('p_pangkat2');
	$jabatan = $this->input->post('p_nip2');
	$nik = $this->input->post('id');
	$this->db->query("
UPDATE db_tamu.tab_karyawan 
	SET
	
	nama = '$nama' , 
	dept = '$dept' , 
	jabatan = '$jabatan'
	
	WHERE
	nik = '$nik' ;

");
	$this->session->set_flashdata('info','Data Sukses Di Update');
	redirect('sekertaris_pusat/karyawan');
	}else{
		redirect('sekertaris_pusat/karyawan');
		
		}
	
	}
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
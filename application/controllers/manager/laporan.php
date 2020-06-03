<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->cekAksesMANAGER();
		}
	public function index()
	{   
	
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "";
		$isi['home_nav1'] = "LAPORAN INVENTARIS";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "manager/header";
		$isi['kontent'] = "manager/laporan/kontent";
		$this->load->view('manager/tampilan_home',$isi);
		
	}
	public function prt(){
		
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$isi['data']=$this->db->query("SELECT
    tab_inventaris.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)
    INNER JOIN tab_inventaris 
        ON (tab_inventaris.nik = tab_karyawan.nik) WHERE tab_inventaris.tgl_request BETWEEN '".$tgl1."' AND '".$tgl2."' ORDER BY tab_inventaris.id_cabang");
		
		
		$isi['djumlah']=$this->db->query("SELECT SUM(jumlah) from tab_inventaris WHERE tgl_request BETWEEN '".$tgl1."' AND '".$tgl2."'")->num_rows();
		$this->load->view('manager/laporan/form_lihat',$isi);
		
		}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
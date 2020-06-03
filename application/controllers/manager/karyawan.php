<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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
		$isi['home_nav1'] = "DATA KARYAWAN";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "";
		$isi['header'] = "sekertaris/header";
		$isi['data'] = $this->db->query('SELECT
    tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang)');
		
		$isi['kontent'] = "sekertaris/karyawan/kontent";
		$this->load->view('sekertaris/tampilan_home',$isi);
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awal extends CI_Controller {

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
	    //$isi['title'] = $this->model_view->title();
		$isi['log'] = "";
		$isi['home_nav'] = "HOME";
		$isi['home_nav1'] = "DASHBOARD";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "SYSTEM INFORMASI PENGELOLAAN BARANG INVENTARIS";
		$isi['header'] = "sekertaris/header";
		
		$isi['jmlhhari'] = $this->model_admin->jumlah_hari();
		
		$isi['kontent'] = "sekertaris/kontent";
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
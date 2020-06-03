<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		$this->model_squrity->cekAksesAdmin();
		}
	public function index()
	{   
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "CAMELON";
		$isi['home_nav'] = "HOME";
		$isi['home_nav1'] = "DASHBOARD";
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "APLIKASI TAMU";
		$isi['header'] = "admin/header";
		$isi['jaksa'] = $this->model_admin->cekjaksa();
		$isi['pembina'] = $this->model_admin->cekpembina();
		$isi['intel'] = $this->model_admin->cekintel();
		$isi['pidanaumum'] = $this->model_admin->cekpidanaumum();
		$isi['pidanakhusus'] = $this->model_admin->cekpidanakhusus();
		$isi['datun'] = $this->model_admin->cekdatun();
		$isi['jmlhhari'] = $this->model_admin->jumlah_hari();
		
		$isi['kontent'] = "admin/kontent";
		$this->load->view('admin/tampilan_home',$isi);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
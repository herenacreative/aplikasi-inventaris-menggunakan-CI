<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_login');
		$this->load->model('model_squrity');
		$this->model_squrity->ceklogin();
		}
	public function index()

	{
		
		//$data['title'] = $this->model_view->title();
		$data['log'] = "SYSTEM INFORMASI PENGELOLAAN BARANG INVENTARIS";
		$data['login'] = "LOGIN";
		$data['log_sub'] = "";
		$this->load->view('tampilan_login',$data);
	}
	public function getlogin()
	{
		$u=$this->input->post('uu');
		$p=$this->input->post('pp');
		$this->model_login->getlogin($u,$p);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
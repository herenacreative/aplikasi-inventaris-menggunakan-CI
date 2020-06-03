<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_user extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_view');
		$this->load->model('model_squrity');
		$this->load->model('model_admin');
		$this->model_squrity->getsqurity();
		//$this->model_squrity->cekAksesuser();
		}
	public function index()
	{   
	    $isi['title'] = $this->model_view->title();
		$isi['log'] = "ABT";
		$isi['home_nav'] = "HOME";
		$isi['home_nav1'] = "DASHBOARD";
		$isi['kontent'] = "user/kontent";
		$isi['data'] = $this->model_admin->cekdata_user();
		$isi['menu'] = $this->model_squrity->cekmenu();
		$isi['username'] = $this->session->userdata('user_name');
		$isi['level'] = $this->model_view->lev();
		$isi['log_sub'] = "APPLIKASI BUKU TAMU";
		$isi['header'] = "user/header";
		$this->load->view('user/tampilan_home',$isi);
	}
	
	public function delete()
	{
		$key = $this->input->post('lokasi3');
		$id = $this->input->post('id3');
		if($key == "Lokasi"){
		$this->db->query('update tamu set stts="DELETE",
		                                  tglupdate="'.date('d-m-Y H:i:s').'",
										  userupdate="'.$this->session->userdata('user_name').'" 
										  where id="'.$id.'"');
		$this->session->set_flashdata('info','Data Sukses Di Delete');
		redirect('user/tamu');
		}else{
			redirect('admin/personi');
			}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
public function dd(){
	
	if(function_exists ('date_default_timezone_set'))
        date_default_timezone_set('Asia/Jakarta');
	$encodedData = $this->input->post('oo');
    $tgl = date('Ymdhis');
	$encodedData = $this->input->post('oo');
	$file = $this->input->post('oo'); //your data in base64 'data:image/png....';
	$img = str_replace('data:image/jpeg;base64,', '', $file);
	file_put_contents('./assets/images/IMG'.$tgl.'.jpg', base64_decode($img));
	$nip = $this->session->userdata('nip');
	$user = $this->db->query('SELECT * FROM tab_karyawan WHERE nik="'.$nip.'"')->result();
	foreach($user as $ro){
		$nama = $ro->daftar_nama;
		}
	$data = array(
	'nik'=>$this->input->post('nip'),
	'keperluan'=>$this->input->post('keperluan'),
	'tgl'=>date('d-m-Y'),
	'security'=>$nama,
	'jam_masuk'=>date('H:i:s'),
	'jam_keluar'=>'',
	'photo'=>'IMG'.$tgl.'.jpg'
	);
	$idd = 'IMG'.$tgl.'.jpg';
	$this->db->insert('tamu',$data);
	
   
        
$this->session->set_flashdata('info','Sukses Di Simpan');
	redirect('user/tamu');
	}
	
	
	public function tamu(){
	$encodedData = $this->input->post('oo');

	 $tgl = date('Ymdhis');
	$encodedData = $this->input->post('oo');
	$file = $this->input->post('oo'); //your data in base64 'data:image/png....';
	$img = str_replace('data:image/jpeg;base64,', '', $file);
	file_put_contents('./assets/images/IMG'.$tgl.'.jpg', base64_decode($img));
	$data = array(
	'no_identit'=>$this->input->post('no_identit'),
	'nama'=>$this->input->post('nama'),
	'alamat'=>$this->input->post('alamat'),
	'phone'=>$this->input->post('phone'),
	'bertemu_dgn'=>$this->input->post('nip'),
	'keperluan'=>$this->input->post('keperluan'),
	'tindak_lnjt'=>$this->input->post('tindak_lnjt'),
	'tglinput'=>date('Y-m-d'),
	'tglupdate'=>'',
	'userinput'=>$this->session->userdata('user_name'),
	'userupdate'=>'',
	'stts'=>'AKTIF',
	'photo'=>'IMG'.$tgl.'.jpg'
	);
	$this->db->insert('tamu',$data);
	
        
$this->session->set_flashdata('info','Tamu Berhasil Di Input');

	redirect('home_user');
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
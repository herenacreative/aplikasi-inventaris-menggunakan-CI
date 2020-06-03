<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_view extends CI_model {

	
	public function title()
	{
		
		 
			
	}
	public function lev()
	{
		
		$level = $this->session->userdata('level');
		if($level == "MANAGER"){$hasil = "MANAGER";}
		elseif($level == "SEKERTARIS"){$hasil = "SEKERTARIS";}
		elseif($level == "SEKERTARIS PUSAT"){$hasil = "SEKERTARIS PUSAT";}
		else{$hasil = "KAJARI";}
		return $hasil;
			
	}
	
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
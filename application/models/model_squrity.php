<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_squrity extends CI_model {

	
	public function getsqurity()
	{
		
		$user=$this->session->userdata('user_name');
		
		if(empty($user))
		{  
		
		$this->session->sess_destroy();
		
		   redirect ('login');
		}
		
		
			
	}
	
	public function ceklogin()
	{
		
		$user=$this->session->userdata('user_name');
		
		if($user)
		{  
		
		                        $level=$this->session->userdata('level');
								if($level=="MANAGER"){redirect ('manager/awal');}
								elseif($level=="SEKERTARIS"){redirect ('sekertaris/awal');}
								elseif($level=="SEKERTARIS PUSAT"){redirect ('sekertaris_pusat/awal');}
								else{redirect ('login');}
		}
		
		
			
	}
	
	public function cekAksesMANAGER()
	{
		
	 $level=$this->session->userdata('level');
	
	if($level=="SEKERTARIS"){redirect ('sekertaris/awal');}
	elseif($level=="SEKERTARIS PUSAT"){redirect ('sekertaris_pusat/awal');}
	
	}
	public function cekAksesSEKERTARIS()
	{
		
	 $level=$this->session->userdata('level');
	
	if($level=="MANAGER"){redirect ('manager/awal');}
	elseif($level=="SEKERTARIS PUSAT"){redirect ('sekertaris_pusat/awal');}
	
	}
	public function cekAksesSEKERTARIS_P()
	{
		
	 $level=$this->session->userdata('level');
	
	if($level=="MANAGER"){redirect ('manager/awal');}
	elseif($level=="SEKERTARIS"){redirect ('sekertaris/awal');}
	
		
		
	
	}
	
	
	public function cekmenu()
	{
		
	                           $level=$this->session->userdata('level');
								if($level=="MANAGER"){
									$hasil = "manager/menu";
									}
								elseif($level=="SEKERTARIS"){
									$hasil = "sekertaris/menu";
									}
								else{
									$hasil = "sekertaris_pusat/menu";
									}
								
								return $hasil;
								}
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	
	public function getlogin($u,$p)
	{
		
		$query=$this->db->query('SELECT
    tab_login.*
    , tab_karyawan.*
    , tab_cabang.*
FROM
    tab_karyawan
    INNER JOIN tab_login 
        ON (tab_karyawan.nik = tab_login.nik)
    INNER JOIN tab_cabang 
        ON (tab_karyawan.cabang = tab_cabang.id_cabang) where tab_login.user_name="'.$u.'" AND tab_login.user_key="'.$p.'"');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$sess = array ('user_name' =>$row->user_name,
				                'user_key' =>$row->user_key,
								'nip' =>$row->nik,
								'photo' =>$row->photo,
								'nama_cabang' =>$row->nama_cabang,
								'id_cabang' =>$row->id_cabang,
								'level'   =>$row->level  );
								$this->session->set_userdata($sess);
								
								$level=$this->session->userdata('level');
								if($level=="MANAGER"){redirect ('manager/awal');}
								elseif($level=="SEKERTARIS"){redirect ('sekertaris/awal');}
								elseif($level=="SEKERTARIS PUSAT"){redirect ('sekertaris_pusat/awal');}
								else{redirect ('error');}
								
								
								
								
								
								
			}
			
			
		  }
				else
				{
					
					$this->session->set_flashdata('info', 'Maaf Username atau Password Anda Salah');
								redirect ('login');
					
			
			}
}


	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
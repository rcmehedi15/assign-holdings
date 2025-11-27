<?php

class Adminauth extends CI_Model
{


    function Adminauth()
    {
        parent::__construct();
    }
	
	function validate_login()
    {

        $id = $this->session->userdata('admin_id');
		
		if(!$id){
			return false;
		}
		$this->db->where('id',$id);
        $admin_info = $this->db->get('admin')->row();
		
		if(empty($admin_info)){
			return false;
		}
		
        
		return true;
    }
	
	public function get_admin_info($username=false, $password=false){
		$hash = $this->encrypt->sha1($password);
		
		$this->db->where('email',$username);
		$this->db->where('password',$hash);
		$this->db->where('status','1');
        $admin_info = $this->db->get('admin')->row();
		//echo $this->db->last_query();
		//print_r($admin_info);exit;
		if(empty($admin_info)){
			return false;
		}
		        
		return $admin_info;
	}
	
	
}

?>
<?php

class Adminmodel extends CI_Model
{


    function Adminmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_admin_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('admin')->row();
		return $result;
	}
	
	
	public function get_all_admin_except_me($id=false/*, $start=false, $per_page=false*/){
		$this->db->where(" (id!='$id') ",'',false);
		//$this->db->limit($per_page, $start);
		$result = $this->db->get('admin')->result();
		return $result;
	}
	
	

}

?>
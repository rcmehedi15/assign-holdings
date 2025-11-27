<?php

class Pagemodel extends CI_Model
{


    function Pagemodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_page_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('pages')->row();
		return $result;
	}
	
	
	public function get_all_pages(){
		
		$result = $this->db->get('pages')->result();
		return $result;
	}
	
	

}

?>
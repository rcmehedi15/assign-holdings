<?php

class Contentmodel extends CI_Model
{


    function Contentmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_content_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('contents')->row();
		return $result;
	}
	
	
	public function get_all_contents(){
		
		$result = $this->db->get('contents')->result();
		return $result;
	}
	
	

}

?>
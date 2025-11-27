<?php

class Frontmodel extends CI_Model
{


    function Frontmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_project_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('projects')->row();
		return $result;
	}
	
	
	public function get_all_pages(){
		
		$result = $this->db->get('pages')->result();
		return $result;
	}
	
	

}

?>
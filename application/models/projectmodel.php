<?php

class Projectmodel extends CI_Model
{


    function Projectmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_project_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('projects')->row();
		return $result;
	}
	
	
	public function get_all_projects(){
		
		$result = $this->db->get('projects')->result();
		return $result;
	}
	
	
	public function get_location_list(){
		$this->db->where('status','1');
		$result = $this->db->get('locations')->result();
		return $result;
	}
}

?>
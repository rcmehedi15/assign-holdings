<?php

class Locationmodel extends CI_Model
{


    function Locationmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_location_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('locations')->row();
		return $result;
	}
	
	
	public function get_all_locations(){
		
		$result = $this->db->get('locations')->result();
		return $result;
	}
	
	

}

?>
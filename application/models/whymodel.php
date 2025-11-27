<?php

class Whymodel extends CI_Model
{


    function Whymodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_item_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('why')->row();
		return $result;
	}
	
	
	public function get_all_items(){
		
		$result = $this->db->get('why')->result();
		return $result;
	}
	
	

}

?>
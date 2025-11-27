<?php

class Bannermodel extends CI_Model
{


    function Bannermodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_banner_info($id=false){
		$this->db->where('id',$id);
		
		$result = $this->db->get('banners')->row();
		return $result;
	}
	
	
	public function get_all_banners(){
		
		$result = $this->db->get('banners')->result();
		return $result;
	}
	
	

}

?>
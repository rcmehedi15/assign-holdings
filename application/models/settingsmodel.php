<?php

class Settingsmodel extends CI_Model
{


    function Pagemodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function get_siteinfo(){
		
		$result = $this->db->get('siteinfo')->row();
		return $result;
	}
	

}

?>
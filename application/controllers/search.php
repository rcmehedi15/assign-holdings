<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		
		$this->load->model('Frontmodel');
	
		$this->load->helper('siteinfo');
		
		
		

    }
	
	
	
	
	public function slist()
	{
		$project_list = $this->db->query("select *from projects")->result();
		$parr = array();
		foreach($project_list as $val){
				$p = array(
					'id'=>$val->id,
					'name'=>$val->name,
					'address'=>$val->location,
					'link'=> base_url('projects/details/'.$val->id),
					'image'=>base_url().'asset/images/projects/'.$val->ataglance_image,
					'size'=>$val->size,
					'type'=>$val->type
				);
				$parr[] = $p;
		}
		
		echo json_encode($parr);
		
	}
	
	
		
	
}

?>
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projects extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		
		$this->load->model('Frontmodel');
	
		$this->load->helper('siteinfo');
		
		
		

    }
	
	
	
	
	public function ongoing()
	{
		$this->load->view('frontend/projects/ongoing.php');
	}
	public function upcoming()
	{
		$this->load->view('frontend/projects/upcoming.php');
	}	
	public function handedover()
	{
		$this->load->view('frontend/projects/handedover.php');
	}
	public function details($id=false)
	{
		$data = array();
		$data['project_info'] = $this->Frontmodel->get_project_info($id);
		$this->load->view('frontend/projects/details.php',$data);
	}
	
}

?>
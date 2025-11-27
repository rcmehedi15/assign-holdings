<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		
		$this->load->model('Frontmodel');
	
		$this->load->helper('siteinfo');
		
		
		

    }
	
	
	
	
	public function index()
	{
		$this->load->view('frontend/home.php');
	}
	
	public function why()
	{
		$this->load->view('frontend/why.php');
	}
		
	
}

?>
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		
		$this->load->model('Frontmodel');
	
		$this->load->helper('siteinfo');
		
		
		

    }
	
	
	
	
	public function ourstory()
	{
		$this->load->view('frontend/about/ourstory.php');
	}
	public function visionmission()
	{
		$this->load->view('frontend/about/visionmission.php');
	}	
	public function boardofdirectors()
	{
		$this->load->view('frontend/about/boardofdirectors.php');
	}
	public function managementteam()
	{
		$this->load->view('frontend/about/managementteam.php');
	}
	
	public function companies()
	{
		$this->load->view('frontend/about/companies.php');
	}
	
	public function csr()
	{
		$this->load->view('frontend/about/csr.php');
	}
	public function whoweare()
	{
		$this->load->view('frontend/about/whoweare.php');
	}
	
}

?>
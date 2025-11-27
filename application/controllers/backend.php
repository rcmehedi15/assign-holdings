<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Adminauth');
	
		$this->load->helper('siteinfo');
		
		
		$this->load->library('encrypt');
		$this->load->library('template_backend');

    }

    public function index($param=false)
    {
		if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		
		redirect(base_url().'backend/dashboard');
		
		
        
    }
	public function login(){
		
		if ($this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/dashboard');
        }
		
        $this->load->view("backend/admin/login");
	}

    function validate_login()
    {
        
		$username = $this->input->post("username", TRUE);
		$password = $this->input->post("password", TRUE);
		//$hash = $this->encrypt->sha1($password);
		
		$error_message = array();
		$error = 0;
		if($username==""){
			$error = 1;
			$error_message[] = 'Username is required.';
		}
		if($password==""){
			$error = 1;
			$error_message[] = 'Password is required.';
		}
		
		if($error){
			$this->session->set_flashdata("message", implode('<br>',$error_message));
			redirect(base_url()."backend/login");
		}
		
		$admin_info = $this->Adminauth->get_admin_info($username, $password);
		//print_r($admin_info);exit;

		if ($admin_info) {
			
			$session_data = array(
				'admin_id' => $admin_info->id,
				
				
			);
			$this->session->set_userdata($session_data);
			
			redirect(base_url()."backend/dashboard");
		} else {
			$this->session->set_flashdata("message", "Email/Username or Password incorrect.");
			redirect(base_url()."backend/login");
		}
            
        
    }
	public function dashboard($param=false){
		//print_r($this->session->userdata);
		
		if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		
				
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Dashboard");
		$this->template_backend->write('pdescription', "At a glance");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/dashboard.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/dashboard.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
	}
	
	public function logout(){
		
		
		$session_data = array(
			'admin_id' => '',
			
			
		);
		$this->session->unset_userdata($session_data);
		
		redirect(base_url()."backend");
	}

    
}

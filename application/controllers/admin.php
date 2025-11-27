<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Adminmodel');
	
		$this->load->helper('siteinfo');
		
		
		$this->load->library('encrypt');
		$this->load->library('template_backend');
		
		

    }
	function clear_search(){
		$sdata = array(
			'keyhere'=>''
		);
		$this->session->unset_userdata($sdata);
	}
	function profile()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error']='';
		$data['success']='';
		
		if ($this->input->post("submit", TRUE)) {
            
            $username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$repassword = $this->input->post('repassword', TRUE);
			$name = $this->input->post('name', TRUE);
            
			$phone = $this->input->post('phone', TRUE);
			
			
			$error_message = array();
			$error = 0;
			if($username==""){
				$error = 1;
				$error_message[] = 'Email/Username is required.';
			}
			else{
				$exist = $this->db->query("select *from admin where email='".$username."' and id!='".$this->session->userdata('admin_id')."'")->row();
				if($exist){
					$error = 1;
					$error_message[] = 'Email/Username is not available.';
				}
			}
			if($password){
				if($password != $repassword){
					$error = 1;
					$error_message[] = 'Password mismatch.';
				}
				/*else if (!preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[a-zA-Z]).*$/", $password)) {
					$data['error'] = "Password must be atleast 6 character long and combination of character and number";
				}*/
			}
			if($name==""){
				$error = 1;
				$error_message[] = 'Name is required.';
			}
			
			if($phone==""){
				$error = 1;
				$error_message[] = 'Phone is required.';
			}
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			if(!$error){
				$sdata = array(
					
					'name'=>$name,
					'email'=>$username,
					'phone'=>$phone
				);
				
				if($password){
					$sdata['password'] = $this->encrypt->sha1($password);
					
				}
				
				//print_r($sdata);
				$this->db->update('admin',$sdata,array('id'=>$this->session->userdata('admin_id')));

				$data['success'] = "Date has been updated successfully.";
			}
        }
		
		
		$data['profile'] = $this->Adminmodel->get_admin_info($this->session->userdata('admin_id'));
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Profile");
		$this->template_backend->write('pdescription', "At a glance");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/profile.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/profile.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	
	function user(/*$page = false*/)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        /*if (!$page)$offset = 0;
        else $offset = $page-1;
        

        $this->load->library('pagination');
        
        $total_rows = $this->Adminmodel->count_all_admin_except_me($this->session->userdata('admin_id'));
        $config['per_page'] = PER_PAGE;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        
        $data['pagination'] = $this->pagination->create_links($offset+1, $total_rows, $config['per_page'], $adjacents = 1, $targetpage = base_url()."admin/user", $pagestring = "/");
        
        $data['user_list'] = $this->Adminmodel->get_all_admin_except_me($this->session->userdata('admin_id'),$offset*$config['per_page'],$config['per_page']);
		*/
		$data['user_list'] = $this->Adminmodel->get_all_admin_except_me($this->session->userdata('admin_id')/*,$offset*$config['per_page'],$config['per_page']*/);
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Admin User");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/user_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/user_list.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function add_user()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            $username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$repassword = $this->input->post('repassword', TRUE);
			$name = $this->input->post('name', TRUE);
            
			$phone = $this->input->post('phone', TRUE);
			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			if($username==""){
				$error = 1;
				$error_message[] = 'Email/Username is required.';
			}
			else{
				$exist = $this->db->query("select *from admin where email='".$username."'")->row();
				if($exist){
					$error = 1;
					$error_message[] = 'Email/Username is not available.';
				}
			}
			if($password==""){
				$error = 1;
				$error_message[] = 'Password is required.';
			}
			else{
				if($password != $repassword){
					$error = 1;
					$error_message[] = 'Password mismatch.';
				}
				/*else if (!preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[a-zA-Z]).*$/", $password)) {
					$data['error'] = "Password must be atleast 6 character long and combination of character and number";
				}*/
			}
			if($name==""){
				$error = 1;
				$error_message[] = 'Name is required.';
			}
			
			if($phone==""){
				$error = 1;
				$error_message[] = 'Phone is required.';
			}
			
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			$sdata = array(
				'email'=>$username,
				'name'=>$name,
				
				'phone'=>$phone,
				
				'status'=>$status
			);
            
			if(!$error){
				$sdata['password'] = $this->encrypt->sha1($password);
				//print_r($sdata);
				$this->db->insert('admin',$sdata);

				$this->session->set_flashdata('success','Data has been inserted successfully.');
				redirect(base_url().'admin/user');
			}
        }

		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add User");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_user.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_user.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function edit_user($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            $username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$repassword = $this->input->post('repassword', TRUE);
			$name = $this->input->post('name', TRUE);
            
			$phone = $this->input->post('phone', TRUE);
			
			$status = $this->input->post('status', TRUE);
			
			
			$error_message = array();
			$error = 0;
			if($username==""){
				$error = 1;
				$error_message[] = 'Email/Username is required.';
			}
			else{
				$exist = $this->db->query("select *from admin where email='".$username."' and id!='".$id."'")->row();
				if($exist){
					$error = 1;
					$error_message[] = 'Email/Username is not available.';
				}
			}
			if($password){
				
				if($password != $repassword){
					$error = 1;
					$error_message[] = 'Password mismatch.';
				}
				/*else if (!preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[a-zA-Z]).*$/", $password)) {
					$data['error'] = "Password must be atleast 6 character long and combination of character and number";
				}*/
			}
			if($name==""){
				$error = 1;
				$error_message[] = 'Name is required.';
			}
			
			if($phone==""){
				$error = 1;
				$error_message[] = 'Phone is required.';
			}
			
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			
			$sdata = array(
				'email'=>$username,
				'name'=>$name,
				
				'phone'=>$phone,
				
				'status'=>$status
			);
            
            if($password){
				
				$sdata['password'] = $this->encrypt->sha1($password);
				
			}
			
			if(!$error){
				//print_r($sdata);
				$this->db->update('admin',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'admin/user');
			}
        }


        
		$data['admin_info'] = $this->Adminmodel->get_admin_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit User");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_user.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_user.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function delete_user($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        

        
		
		if($id){
			$admin_info = $this->Adminmodel->get_admin_info($id);
			if($this->session->userdata('admin_id')==$admin_info->id){
				$this->session->set_flashdata('error','You are not authorized to perform this action.');
				redirect(base_url().'admin/user');
			}
		}
		$this->db->where('id',$id);
		$this->db->delete('admin');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'admin/user');
		
    }
	
	
		
	
}

?>
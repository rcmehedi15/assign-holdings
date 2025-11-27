<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Locationmodel');
	
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
	
	
	
	function llist(/*$page = false*/)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        
		$data['location_list'] = $this->Locationmodel->get_all_locations();
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Location");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/location_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/location_list.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function add()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            
			$name = $this->input->post('name', TRUE);
            
			
			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			if($name==""){
				$error = 1;
				$error_message[] = 'Name is required.';
			}
			
						
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			$sdata = array(
				
				'name'=>$name,
				
				
				
				'status'=>$status
			);
            
			if(!$error){
				
				//print_r($sdata);
				$this->db->insert('locations',$sdata);

				$this->session->set_flashdata('success','Data has been inserted successfully.');
				redirect(base_url().'location/llist');
			}
        }

		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add Location");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_location.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_location.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function edit($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            
			$name = $this->input->post('name', TRUE);
            
			
			
			$status = $this->input->post('status', TRUE);
			
			
			$error_message = array();
			$error = 0;
			
			if($name==""){
				$error = 1;
				$error_message[] = 'Name is required.';
			}
			
			
			
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			
			$sdata = array(
				
				'name'=>$name,
				
				
				
				'status'=>$status
			);
            
            
			if(!$error){
				//print_r($sdata);
				$this->db->update('locations',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'location/llist');
			}
        }


        
		$data['location_info'] = $this->Locationmodel->get_location_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit Location");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_location.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_location.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function ldelete($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        

		$this->db->where('id',$id);
		$this->db->delete('locations');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'location/llist');
		
    }
	
	
		
	
}

?>
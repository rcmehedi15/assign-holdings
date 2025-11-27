<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Bannermodel');
	
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
	
	
	
	function blist()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        
		$data['banner_list'] = $this->Bannermodel->get_all_banners();
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Banner");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/banner_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/banner_list.php', $data, $overwrite = FALSE);
        
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
            
            $title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			
            			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			$config['upload_path']          = './asset/images/banners/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;
			

			$this->load->library('upload', $config);
			
			$image = "";

			if ( ! $this->upload->do_upload('image'))
			{
					$error_message = array('error' => $this->upload->display_errors());
					$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$image = $udata['file_name'];
			}
			
						
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			$sdata = array(
				'title'=>$title,
				'description'=>$description,
				
				'image'=>$image,
				
				'status'=>$status
			);
            
			if(!$error){
				
				//print_r($sdata);
				$this->db->insert('banners',$sdata);

				$this->session->set_flashdata('success','Data has been inserted successfully.');
				redirect(base_url().'banner/blist');
			}
        }

		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add Banner");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_banner.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_banner.php', $data, $overwrite = FALSE);
        
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
            
            $title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			
            			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
						
			$sdata = array(
				'title'=>$title,
				'description'=>$description,
				
				//'image'=>$image,
				
				'status'=>$status
			);
			
			$config['upload_path']          = './asset/images/banners/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;
			

			$this->load->library('upload', $config);
			
			$image = "";

			if ( ! $this->upload->do_upload('image'))
			{
					//$error_message = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$image = $udata['file_name'];
				
				$sdata['image'] = $image;
			}
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			if(!$error){
				//print_r($sdata);
				$this->db->update('banners',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'banner/blist');
			}
        }


        
		$data['banner_info'] = $this->Bannermodel->get_banner_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit Banner");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_banner.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_banner.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function bdelete($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

      
		
		$this->db->where('id',$id);
		$this->db->delete('banners');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'banner/blist');
		
    }
	
	
		
	
}

?>
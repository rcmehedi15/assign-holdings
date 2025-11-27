<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Contentmodel');
	
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
	
	
	
	function clist()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        
		$data['content_list'] = $this->Contentmodel->get_all_contents();
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Content");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/content_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/content_list.php', $data, $overwrite = FALSE);
        
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
            
            $section_code = $this->input->post('section_code', TRUE);
			$title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			$content = $this->input->post('content');
            			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			$config['upload_path']          = './asset/images/contents/';
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
			}
			
						
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			$sdata = array(
				'section_code'=>$section_code,
				'title'=>$title,
				'description'=>$description,
				'content'=>$content,
				'image'=>$image,
				
				'status'=>$status
			);
            
			if(!$error){
				
				//print_r($sdata);
				$this->db->insert('contents',$sdata);

				$this->session->set_flashdata('success','Data has been inserted successfully.');
				redirect(base_url().'content/clist');
			}
        }

		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add Content");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_content.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_content.php', $data, $overwrite = FALSE);
        
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
            
            $section_code = $this->input->post('section_code', TRUE);
			$title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			
            $content = $this->input->post('content');			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			
			
			$sdata = array(
				'section_code'=>$section_code,
				'title'=>$title,
				'description'=>$description,
				'content'=>$content,
				//'image'=>$image,
				
				'status'=>$status
			);
			
			$config['upload_path']          = './asset/images/contents/';
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
				$this->db->update('contents',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'content/clist');
			}
        }


        
		$data['content_info'] = $this->Contentmodel->get_content_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit Content");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_content.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_content.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function cdelete($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

      
		
		$this->db->where('id',$id);
		$this->db->delete('contents');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'content/clist');
		
    }
	
	
		
	
}

?>
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Pagemodel');
	
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
	
	
	
	function plist()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

        
		$data['page_list'] = $this->Pagemodel->get_all_pages();
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Page");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/page_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/page_list.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	
	
	function add($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            $name = $this->input->post('name', TRUE);
			$title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			$metatitle = $this->input->post('metatitle', TRUE);
			$metakeyword = $this->input->post('metakeyword', TRUE);
			$metadescription = $this->input->post('metadescription', TRUE);
			$content = $this->input->post('content');
			
            			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			if($name==""){
				$error = 1;
				$error_message[] = 'URL is required.';
			}
			else{
				$exist = $this->db->query("select *from pages where name='".$name."'")->row();
				if($exist){
					$error = 1;
					$error_message[] = 'URL is not available.';
				}
			}
			if($title==""){
				$error = 1;
				$error_message[] = 'Title is required.';
			}
			if($description==""){
				$error = 1;
				$error_message[] = 'Description is required.';
			}
			if($metatitle==""){
				$error = 1;
				$error_message[] = 'Meta Title is required.';
			}
			if($metakeyword==""){
				$error = 1;
				$error_message[] = 'Meta Keywords is required.';
			}
			if($metadescription==""){
				$error = 1;
				$error_message[] = 'Meta Description is required.';
			}
			
						
			$sdata = array(
				'name'=>$name,
				'title'=>$title,
				'description'=>$description,
				'metatitle'=>$metatitle,
				'metakeyword'=>$metakeyword,
				'metadescription'=>$metadescription,
				'content'=>$content,
				//'banner'=>$image,
				
				'status'=>$status
			);
			
			$config['upload_path']          = './asset/images/pages/';
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
				
				$sdata['banner'] = $image;
			}
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			if(!$error){
				//print_r($sdata);
				$this->db->insert('pages',$sdata);

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'page/plist');
			}
        }


        
		$data['page_info'] = $this->Pagemodel->get_page_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add Page");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_page.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_page.php', $data, $overwrite = FALSE);
        
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
			$title = $this->input->post('title', TRUE);
			$description = $this->input->post('description', TRUE);
			$metatitle = $this->input->post('metatitle', TRUE);
			$metakeyword = $this->input->post('metakeyword', TRUE);
			$metadescription = $this->input->post('metadescription', TRUE);
			$content = $this->input->post('content');
            			
			$status = $this->input->post('status', TRUE);
			
			$error_message = array();
			$error = 0;
			
			if($name==""){
				$error = 1;
				$error_message[] = 'URL is required.';
			}
			else{
				$exist = $this->db->query("select *from pages where name='".$name."' and id!='".$id."'")->row();
				if($exist){
					$error = 1;
					$error_message[] = 'URL is not available.';
				}
			}
			if($title==""){
				$error = 1;
				$error_message[] = 'Title is required.';
			}
			if($description==""){
				$error = 1;
				$error_message[] = 'Description is required.';
			}
			if($metatitle==""){
				$error = 1;
				$error_message[] = 'Meta Title is required.';
			}
			if($metakeyword==""){
				$error = 1;
				$error_message[] = 'Meta Keywords is required.';
			}
			if($metadescription==""){
				$error = 1;
				$error_message[] = 'Meta Description is required.';
			}
			
						
			$sdata = array(
				'name'=>$name,
				'title'=>$title,
				'description'=>$description,
				'metatitle'=>$metatitle,
				'metakeyword'=>$metakeyword,
				'metadescription'=>$metadescription,
				'content'=>$content,
				//'banner'=>$image,
				
				'status'=>$status
			);
			
			$config['upload_path']          = './asset/images/pages/';
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
				
				$sdata['banner'] = $image;
			}
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			if(!$error){
				//print_r($sdata);
				$this->db->update('pages',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'page/plist');
			}
        }


        
		$data['page_info'] = $this->Pagemodel->get_page_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit Page");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_page.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_page.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
    }
	
	function pdelete($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

      
		
		$this->db->where('id',$id);
		$this->db->delete('pages');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'page/plist');
		
    }
	
	
		
	
}

?>
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Settingsmodel');
	
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
	
	
	
	
	
	
	function siteinfo()
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		$data['error'] = 0;
		if ($this->input->post("submit", TRUE)) {
            
            $name = $this->input->post('name', TRUE);
			
			$metatitle = $this->input->post('metatitle', TRUE);
			$metakeyword = $this->input->post('metakeyword', TRUE);
			$metadescription = $this->input->post('metadescription', TRUE);
			
			$phone = $this->input->post('phone', TRUE);
			$address = $this->input->post('address', TRUE);
			$email = $this->input->post('email', TRUE);
			
            			
						
			$error_message = array();
			$error = 0;
			
						
			$sdata = array(
				'name'=>$name,
				
				'metatitle'=>$metatitle,
				'metakeys'=>$metakeyword,
				'metadescription'=>$metadescription,
				
				'phone'=>$phone,
				'address'=>$address,
				'email'=>$email,
				//'logo'=>$logo,
				//'favicon'=>$favicon,
				
				
			);
			
			$config['upload_path']          = './asset/images/';
			$config['allowed_types']        = 'gif|jpg|png|ico';
			$config['max_size']             = 10000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;
			

			$this->load->library('upload', $config);
			
			$logo = "";

			if ( ! $this->upload->do_upload('logo'))
			{
					//$error_message[] = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$logo = $udata['file_name'];
				
				$sdata['logo'] = $logo;
			}
			
			$favicon = "";

			if ( ! $this->upload->do_upload('favicon'))
			{
					//$error_message = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$favicon = $udata['file_name'];
				
				$sdata['favicon'] = $favicon;
			}
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			if(!$error){
				//print_r($sdata);
				$this->db->update('siteinfo',$sdata);

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'settings/siteinfo');
			}
        }


        
		$data['site_info'] = $this->Settingsmodel->get_siteinfo();
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Site Info");
		$this->template_backend->write('pdescription', SITE_NAME);
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/site_info.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/site_info.php', $data, $overwrite = FALSE);
        
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
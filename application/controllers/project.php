<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Projectmodel');
	
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

        
		$data['banner_list'] = $this->Projectmodel->get_all_projects();
		//echo $this->db->last_query();

        		
		
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Project");
		$this->template_backend->write('pdescription', "List");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/project_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/project_list.php', $data, $overwrite = FALSE);
        
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
			$size = $this->input->post('size', TRUE);
			$location = $this->input->post('location', TRUE);
			$address = $this->input->post('address', TRUE);
			$description = $this->input->post('description', TRUE);
			
			$ataglance_content = $this->input->post('ataglance_content', TRUE);
			$features_content = $this->input->post('features_content', TRUE);
			
			$sortorder = $this->input->post('sortorder', TRUE);
			
            			
			$status = $this->input->post('status', TRUE);
			$type = $this->input->post('type', TRUE);
			$showhome = $this->input->post('showhome', TRUE);
			
			$error_message = array();
			$error = 0;
			
			//echo '<pre>';print_r($_POST);print_r($_FILES);exit;
			
			$config['upload_path']          = './asset/images/projects/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;
			

			$this->load->library('upload', $config);
			
			$banner = array();
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'banner')===false)continue;
				if( ! empty($value['name']))
				{
					//echo $key;
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							
					}
					else
					{
						$udata = $this->upload->data();
						$banner[] = $udata['file_name'];
					}
				}
			}
			//echo '<pre>'; print_r($banner);exit;
			
			$gallery = array();
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'gallery')===false)continue;
				if( ! empty($value['name']))
				{
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							
					}
					else
					{
						$udata = $this->upload->data();
						$gallery[] = $udata['file_name'];
					}
				}
			}
			//echo '<pre>'; print_r($gallery);exit;
			
			$agimage = "";

			if ( ! $this->upload->do_upload('agimage'))
			{
					$error_message = array('error' => $this->upload->display_errors());
					$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$agimage = $udata['file_name'];
			}
			
			/*$fimage = "";

			if ( ! $this->upload->do_upload('fimage'))
			{
					$error_message = array('error' => $this->upload->display_errors());
					$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$fimage = $udata['file_name'];
			}*/
			$fimage = array();
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'fimage')===false)continue;
				if( ! empty($value['name']))
				{
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							
					}
					else
					{
						$udata = $this->upload->data();
						$fimage[] = $udata['file_name'];
					}
				}
			}
			
			$bimage = "";

			if ( ! $this->upload->do_upload('bimage'))
			{
					$error_message = array('error' => $this->upload->display_errors());
					$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$bimage = $udata['file_name'];
			}
			
						
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			$sdata = array(
				'name'=>$name,
				'location'=>$location,
				'size'=>$size,
				'address'=>$address,
				'description'=>$description,
				'ataglance_content'=>$ataglance_content,
				'features_content'=>$features_content,
				
				'banner'=>serialize($banner),
				'gallery'=>serialize($gallery),
				'ataglance_image'=>$agimage,
				'features_image'=>serialize($fimage),
				'booknow_image'=>$bimage,
				
				'status'=>$status,
				'type'=>$type,
				'display_at_home_page'=>$showhome,
				'sort_order'=>$sortorder,
			);
            
			if(!$error){
				
				//print_r($sdata);
				$this->db->insert('projects',$sdata);

				$this->session->set_flashdata('success','Data has been inserted successfully.');
				redirect(base_url().'project/plist');
			}
        }
		$data['location_list'] = $this->Projectmodel->get_location_list();
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Add Project");
		$this->template_backend->write('pdescription', "New");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/add_project.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/add_project.php', $data, $overwrite = FALSE);
        
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
			$address = $this->input->post('address', TRUE);
			$description = $this->input->post('description', TRUE);
			
			$ataglance_content = $this->input->post('ataglance_content', TRUE);
			$features_content = $this->input->post('features_content', TRUE);
			
			$size = $this->input->post('size', TRUE);
			$location = $this->input->post('location', TRUE);
			$sortorder = $this->input->post('sortorder', TRUE);
            			
			$status = $this->input->post('status', TRUE);
			$type = $this->input->post('type', TRUE);
			$showhome = $this->input->post('showhome', TRUE);
			
			$error_message = array();
			$error = 0;
			
			$sdata = array(
				'name'=>$name,
				'address'=>$address,
				'description'=>$description,
				'ataglance_content'=>$ataglance_content,
				'features_content'=>$features_content,
				
				//'banner'=>$banner,
				//'ataglance_image'=>$banner,
				//'features_image'=>$fimage,
				//'booknow_image'=>$bimage,
				'location'=>$location,
				'size'=>$size,
				'status'=>$status,
				'type'=>$type,
				'display_at_home_page'=>$showhome,
				'sort_order'=>$sortorder,
			);
			
			//echo '<pre>';print_r($_POST);print_r($_FILES);
			
			$config['upload_path']          = './asset/images/projects/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000000;
			$config['max_width']            = 5000;
			$config['max_height']           = 2000;
			$config['encrypt_name']         = TRUE;
			

			$this->load->library('upload', $config);
			
			$banner = array();
			$pi = $this->Projectmodel->get_project_info($id);
			$eb = unserialize($pi->banner);
			foreach($eb as $val){
				$banner[] = $val;
			}
			//echo '<pre>';
			//print_r($banner);
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'banner')===false)continue;
				if( ! empty($value['name']))
				{
					//echo $key;
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							//print_r($error_message);
					}
					else
					{
						$udata = $this->upload->data();
						$banner[] = $udata['file_name'];
					}
				}
			}
			//print_r($banner);
			if($banner){
				$sdata['banner'] = serialize($banner);
			}
			
			//echo '<pre>'; print_r($banner);exit;
			
			$gallery = array();
			$eg = unserialize($pi->gallery);
			foreach($eg as $val){
				$gallery[] = $val;
			}
			//print_r($gallery);
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'gallery')===false)continue;
				if( ! empty($value['name']))
				{
					//echo $key;
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							//print_r($error_message);
							
					}
					else
					{
						$udata = $this->upload->data();
						$gallery[] = $udata['file_name'];
					}
				}
			}
			//print_r($gallery);exit;
			if($gallery){
				$sdata['gallery'] = serialize($gallery);
			}
			//echo '<pre>'; print_r($gallery);exit;
			
			$agimage = "";

			if ( ! $this->upload->do_upload('agimage'))
			{
					//$error_message = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$agimage = $udata['file_name'];
				$sdata['ataglance_image'] = $agimage;
			}
			
			/*$fimage = "";

			if ( ! $this->upload->do_upload('fimage'))
			{
					//$error_message = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$fimage = $udata['file_name'];
				$sdata['features_image'] = $fimage;
			}*/
			$fimage = array();
			$eg = unserialize($pi->features_image);
			foreach($eg as $val){
				$fimage[] = $val;
			}
			//print_r($fimage);
			foreach($_FILES as $key => $value)
			{   
				if(strpos($key,'fimage')===false)continue;
				if( ! empty($value['name']))
				{
					//echo $key;
					if( ! $this->upload->do_upload($key))
					{
							//$error_message = array('error' => $this->upload->display_errors());
							//$error = 1;
							//print_r($error_message);
							
					}
					else
					{
						$udata = $this->upload->data();
						$fimage[] = $udata['file_name'];
					}
				}
			}
			//print_r($fimage);exit;
			if($fimage){
				$sdata['features_image'] = serialize($fimage);
			}
			//echo '<pre>'; print_r($gallery);exit;
			
			$bimage = "";

			if ( ! $this->upload->do_upload('bimage'))
			{
					//$error_message = array('error' => $this->upload->display_errors());
					//$error = 1;
					
			}
			else
			{
				$udata = $this->upload->data();
				$bimage = $udata['file_name'];
				$sdata['booknow_image'] = $bimage;
			}
			
						
			
			if($error){
				$data['error'] =  implode('<br>',$error_message);
				
			}
			
			
			
			if(!$error){
				//print_r($sdata);
				$this->db->update('projects',$sdata,array('id'=>$id));

				$this->session->set_flashdata('success','Data has been updated successfully.');
				redirect(base_url().'project/plist');
			}
        }


        $data['location_list'] = $this->Projectmodel->get_location_list();
		$data['project_info'] = $this->Projectmodel->get_project_info($id);
		
		$this->template_backend->write('title', SITE_TITLE);
		$this->template_backend->write('pheader', "Edit Project");
		$this->template_backend->write('pdescription', "Existing");
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/edit_project.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/edit_project.php', $data, $overwrite = FALSE);
        
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
		$this->db->delete('projects');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'project/plist');
		
    }
	
	function delete_banner($id, $key, $val){
		if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

		$project_info = $this->Projectmodel->get_project_info($id);
		$banners = unserialize($project_info->banner);
		foreach($banners as $bkey=>$bval){
			if($key==$bkey && $val==$bval){
				unset($banners[$bkey]);
			}
			
		}
		$sdata = array(
			'banner'=>serialize($banners)
		);
		$this->db->update('projects',$sdata, array('id'=>$id));
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'project/edit/'.$id);
	}
	
	function delete_gallery($id, $key, $val){
		if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

		$project_info = $this->Projectmodel->get_project_info($id);
		$gallery = unserialize($project_info->gallery);
		foreach($gallery as $bkey=>$bval){
			if($key==$bkey && $val==$bval){
				unset($gallery[$bkey]);
			}
			
		}
		$sdata = array(
			'gallery'=>serialize($gallery)
		);
		$this->db->update('projects',$sdata, array('id'=>$id));
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'project/edit/'.$id);
	}
	
	function delete_feature($id, $key, $val){
		if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

		$project_info = $this->Projectmodel->get_project_info($id);
		$fimage = unserialize($project_info->features_image);
		foreach($fimage as $bkey=>$bval){
			if($key==$bkey && $val==$bval){
				unset($fimage[$bkey]);
			}
			
		}
		$sdata = array(
			'features_image'=>serialize($fimage)
		);
		$this->db->update('projects',$sdata, array('id'=>$id));
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'project/edit/'.$id);
	}
		
	
}

?>
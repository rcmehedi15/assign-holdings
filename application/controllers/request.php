<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Adminauth');
		$this->load->model('Requestmodel');
	
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
	
	
	
	function rlist($type=false,$offset = false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();
		
		/*if($this->input->post('submit')){
			$sdata = array(
				'name'=>$this->input->post('name'),
				'date'=>$this->input->post('date'),
			);
			$this->session->set_userdata(array('search_access_log'=>$sdata));
			$data['search_data'] = $sdata;
		}
		else{
			$data['search_data'] = $this->session->userdata('search_access_log');
		}*/
		if (!$offset)$offset = 0;
       
        $data['search_data'] = array();
		
        $this->load->library('pagination');
        
        $total_rows = $this->Requestmodel->count_all_requests($type,$data['search_data']);
        
		$this->load->library('pagination');

		$config['base_url'] = base_url()."request/rlist/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 10;
		
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';	
		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();

        $data['request_list'] = $this->Requestmodel->get_all_requests($type, $data['search_data'],$offset,$config['per_page']);
		//echo $this->db->last_query();
        
        
		
		$this->template_backend->write('title', SITE_NAME);
		$this->template_backend->write('pheader', "Request");
		$this->template_backend->write('pdescription', ucfirst($type));
        
        if (HEADER)$this->template_backend->write_view(HEADER, 'backend/admin/header.php', $data, $overwrite = FALSE);
        
        if (LEFT_PANEL)$this->template_backend->write_view(LEFT_PANEL, 'backend/admin/left_panel.php', $data, $overwrite = FALSE);
		
		if (CONTENT)$this->template_backend->write_view(CONTENT, 'backend/admin/request_list.php', $data, $overwrite = FALSE);
		
		if (RIGHT_PANEL)$this->template_backend->write_view(RIGHT_PANEL, 'backend/admin/right_panel.php', $data, $overwrite = FALSE);
        
		if (JS_PANEL)$this->template_backend->write_view(JS_PANEL, 'backend/admin/js/request_list.php', $data, $overwrite = FALSE);
        
        if (FOOTER)$this->template_backend->write_view(FOOTER, 'backend/admin/footer.php', $data, $overwrite = FALSE);
        
        $this->template_backend->render();
        
    }
	
	/*function pdelete($id=false)
    {
        if (!$this->Adminauth->validate_login()) {
            
			redirect(base_url().'backend/login');
        }
		$data = array();

      
		
		$this->db->where('id',$id);
		$this->db->delete('pages');
		$this->session->set_flashdata('success','Data has been deleted successfully.');
		redirect(base_url().'page/plist');
		
    }*/
	
	
		
	
}

?>
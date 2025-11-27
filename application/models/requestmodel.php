<?php

class Requestmodel extends CI_Model
{


    function Requestmodel()
    {
        // Call the Model constructor
        parent::__construct();
    }
		
	
	public function get_all_requests($type=false, $sdata=false, $start=false, $per_page=false){
		/*if($sdata['name']){
			$this->db->where(" (name like '%".$sdata['name']."%') ",'',false);
		}
		if($sdata['date']){
			$d = explode('/',$sdata['date']);
			$nd1 = $d[2].'-'.$d[1].'-'.$d[0].' 00:00:00';
			$nd2 = $d[2].'-'.$d[1].'-'.$d[0].' 23:59:59';
			$this->db->where(" ((login_time>='".$nd1."' and login_time<='".$nd2."') or (logout_time>='".$nd1."' and logout_time<='".$nd2."')) ",'',false);
		}*/
		$this->db->where('type',$type);
		$this->db->limit($per_page, $start);
		$this->db->order_by('id','desc');
		$result = $this->db->get('requests')->result();
		//echo $this->db->last_query();
		return $result;
	}
	public function count_all_requests($type=false, $sdata=false){
		/*if($sdata['name']){
			$this->db->where(" (name like '%".$sdata['name']."%') ",'',false);
		}
		if($sdata['date']){
			$d = explode('/',$sdata['date']);
			$nd1 = $d[2].'-'.$d[1].'-'.$d[0].' 00:00:00';
			$nd2 = $d[2].'-'.$d[1].'-'.$d[0].' 23:59:59';
			$this->db->where(" ((login_time>='".$nd1."' and login_time<='".$nd2."') or (logout_time>='".$nd1."' and logout_time<='".$nd2."')) ",'',false);
		}*/
		$this->db->where('type',$type);
		$result = $this->db->get('requests')->result();
		return count($result);
	}
	

}

?>
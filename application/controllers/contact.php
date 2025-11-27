<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		
		$this->load->model('Frontmodel');
	
		$this->load->helper('siteinfo');
		
		
		

    }
	
	
	
	
	public function landowners()
	{
		$this->load->view('frontend/contact/landowners.php');
	}
	public function buyers()
	{
		$this->load->view('frontend/contact/buyers.php');
	}	
	public function customers()
	{
		$this->load->view('frontend/contact/customers.php');
	}
	public function contactus()
	{
		$this->load->view('frontend/contact/contactus.php');
	}
	public function landowner_request(){
		//echo '<pre>';
		//print_r($_REQUEST);
		$error = 0;
		$error_message = array();
		
		if($this->input->post('locality')==''){
			$error_message[] = 'Locality is required';
			$error = 1;
		}
		if($this->input->post('address_details')==''){
			$error_message[] = 'Address details is required';
			$error = 1;
		}
		if($this->input->post('landowner_name')==''){
			$error_message[] = 'Name of the landowner is required';
			$error = 1;
		}
		if($this->input->post('cell_phone')==''){
			$error_message[] = 'Contact number is required';
			$error = 1;
		}
		if($error == 0){
			$data = array(
				'Locality'=>$this->input->post('locality'),
				'Address'=>$this->input->post('address_details'),
				'Size_of_the_land'=>$this->input->post('plot'),
				'Width_of_the_road_in_front'=>$this->input->post('road_width'),
				'Category_of_land'=>$this->input->post('land_category'),
				'Facing'=>$this->input->post('fcing'),
				'Attractive_features'=>$this->input->post('attractive_features'),
				'Name_of_the_landowner'=>$this->input->post('landowner_name'),
				'Contact_person'=>$this->input->post('contact_person'),
				'Email_ID'=>$this->input->post('email_id'),
				'Contact_number'=>$this->input->post('cell_phone'),
				
				
			);
			
			$sdata = array(
				'type'=>'landowner',
				'status'=>0,
				'data'=>serialize($data),
				'rdate'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert('requests',$sdata);
			
			
			$to      = SITE_EMAIL;
			$subject = 'Request from landowner';
			
			$message = 'Following are the details:<br><br>';
			foreach($data as $key=>$val){
				$message.= str_replace('_',' ',$key).': '.$val.'<br>';
			}
			$message.= '<br>Thanks';
			
			$headers = 'From: '.SITE_EMAIL . "\r\n" .
				'Reply-To: '.SITE_EMAIL . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
			
			$response = array(
				"result"=>"success",
				'msg'=>'<div><p>Request is sent successfully</p></div>'
				
			);
			
			echo json_encode($response);
		}
		else{
			$response = array(
				"result"=>"error",
				'msg'=>'<div><p>Please fix the following errors:</p><p>'.implode('<br>',$error_message).'</p></div>'
				
			);
			
			echo json_encode($response);
		}
		
	}
	
	public function buyer_request(){
		//echo '<pre>';
		//print_r($_REQUEST);
		$error = 0;
		$error_message = array();
		
		if($this->input->post('name')==''){
			$error_message[] = 'Name is required';
			$error = 1;
		}
		if($this->input->post('mobile_number')==''){
			$error_message[] = 'Contact Number is required';
			$error = 1;
		}
		
		if($error == 0){
			$data = array(
				'Preferred_Location'=>$this->input->post('preferred_location'),
				'Preferred_Size'=>$this->input->post('preferred_size'),
				'Car_Parking_Requirement'=>$this->input->post('car_parking'),
				'Expected_Handover_Date'=>$this->input->post('expected_handover_time'),
				'Facing_Of_The_Apartment'=>$this->input->post('facing_the_apartment'),
				'Preferred_Floor'=>$this->input->post('preferred_floor'),
				'Minimum_Number_Of_Bedrooms'=>$this->input->post('minimum_bed_rooms'),
				'Minimum_Number_Of_Bathrooms'=>$this->input->post('minimum_bath_rooms'),
				'Name'=>$this->input->post('name'),
				'Profession'=>$this->input->post('profession'),
				'Contact Number'=>$this->input->post('mobile_number'),
				'Email ID'=>$this->input->post('email_id'),
				'Mailing Address'=>$this->input->post('mailing_address'),
				
				
			);
			
			$sdata = array(
				'type'=>'buyer',
				'status'=>0,
				'data'=>serialize($data),
				'rdate'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert('requests',$sdata);
			
			
			$to      = SITE_EMAIL;
			$subject = 'Request from buyer';
			
			$message = 'Following are the details:<br><br>';
			foreach($data as $key=>$val){
				$message.= str_replace('_',' ',$key).': '.$val.'<br>';
			}
			$message.= '<br>Thanks';
			
			$headers = 'From: '.SITE_EMAIL . "\r\n" .
				'Reply-To: '.SITE_EMAIL . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
			
			$response = array(
				"result"=>"success",
				'msg'=>'<div><p>Request is sent successfully</p></div>'
				
			);
			
			echo json_encode($response);
		}
		else{
			$response = array(
				"result"=>"error",
				'msg'=>'<div><p>Please fix the following errors:</p><p>'.implode('<br>',$error_message).'</p></div>'
				
			);
			
			echo json_encode($response);
		}
		
	}
	
	public function contact_request(){
		//echo '<pre>';
		//print_r($_REQUEST);
		$error = 0;
		$error_message = array();
		
		if($this->input->post('name')==''){
			$error_message[] = 'Name is required';
			$error = 1;
		}
		if($this->input->post('email')==''){
			$error_message[] = 'Email is required';
			$error = 1;
		}
		
		if($error == 0){
			$data = array(
				'Name'=>$this->input->post('name'),
				'Email'=>$this->input->post('email'),
				'Message'=>$this->input->post('Message'),
							
				
			);
			
			$sdata = array(
				'type'=>'contact',
				'status'=>0,
				'data'=>serialize($data),
				'rdate'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert('requests',$sdata);
			
			
			$to      = SITE_EMAIL;
			$subject = 'Contact Us';
			
			$message = 'Following are the details:<br><br>';
			foreach($data as $key=>$val){
				$message.= str_replace('_',' ',$key).': '.$val.'<br>';
			}
			$message.= '<br>Thanks';
			
			$headers = 'From: '.SITE_EMAIL . "\r\n" .
				'Reply-To: '.SITE_EMAIL . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
			
			$response = array(
				"result"=>"success",
				'msg'=>'<div><p>Request is sent successfully</p></div>'
				
			);
			
			echo json_encode($response);
		}
		else{
			$response = array(
				"result"=>"error",
				'msg'=>'<div><p>Please fix the following errors:</p><p>'.implode('<br>',$error_message).'</p></div>'
				
			);
			
			echo json_encode($response);
		}
		
	}
	public function booking_request(){
		//echo '<pre>';
		//print_r($_REQUEST);
		$error = 0;
		$error_message = array();
		
		if($this->input->post('name')==''){
			$error_message[] = 'Name is required';
			$error = 1;
		}
		
		if($this->input->post('phone')==''){
			$error_message[] = 'Contact number is required';
			$error = 1;
		}
		
		if($error == 0){
			$data = array(
				'Name'=>$this->input->post('name'),
				'Email'=>$this->input->post('email'),
				'Contact_number'=>$this->input->post('phone'),
				'Message'=>$this->input->post('Message'),
							
				
			);
			
			$sdata = array(
				'type'=>'booking',
				'status'=>0,
				'data'=>serialize($data),
				'rdate'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert('requests',$sdata);
			
			
			$to      = SITE_EMAIL;
			$subject = 'Booking request';
			
			$message = 'Following are the details:<br><br>';
			foreach($data as $key=>$val){
				$message.= str_replace('_',' ',$key).': '.$val.'<br>';
			}
			$message.= '<br>Thanks';
			
			$headers = 'From: '.SITE_EMAIL . "\r\n" .
				'Reply-To: '.SITE_EMAIL . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
			
			$response = array(
				"result"=>"success",
				'msg'=>'<div><p>Request is sent successfully</p></div>'
				
			);
			
			echo json_encode($response);
		}
		else{
			$response = array(
				"result"=>"error",
				'msg'=>'<div><p>Please fix the following errors:</p><p>'.implode('<br>',$error_message).'</p></div>'
				
			);
			
			echo json_encode($response);
		}
		
	}
	
}

?>
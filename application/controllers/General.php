<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {
	
	public function about()
	{
		$data = array();
		$award_photos = $this->Custom_model->single_table_records ( 'award_photos');
		$data ['award_photos'] = array();
		if($award_photos['status']){
			$data ['award_photos'] = $award_photos['data'];
		}
		$this->load->view('about',$data);
	}
	public function academics()
	{
		$data = array();
		$courses = $this->Custom_model->single_table_records ( 'courses');
		$data ['courses'] = array();
		if($courses['status']){
			$data ['courses'] = $courses['data'];
		}
		$this->load->view('academics',$data);
	}
	public function showcase()
	{
		$data = array();
		$digital_paintings = $this->Custom_model->single_table_records ( 'digital_paintings');
		$data ['digital_paintings'] = array();
		if($digital_paintings['status']){
			$data ['digital_paintings'] = $digital_paintings['data'];
		}
		
		$animation_videos = $this->Custom_model->single_table_records ( 'animation_videos');
		$data ['animation_videos'] = array();
		if($animation_videos['status']){
			$data ['animation_videos'] = $animation_videos['data'];
		}
		
		$art_gallery = $this->Custom_model->single_table_records ( 'art_gallery');
		$data ['art_gallery'] = array();
		if($art_gallery['status']){
			$data ['art_gallery'] = $art_gallery['data'];
		}
		
		$this->load->view('showcase',$data);
	}
	public function events()
	{
		$data = array();
		$events = $this->Custom_model->single_table_records ( 'events');
		$data ['events'] = array();
		if($events['status']){
			$data ['events'] = $events['data'];
		}
		$upcoming_events = $this->Custom_model->single_table_records ( 'upcoming_events');
		$data ['upcoming_events'] = array();
		if($upcoming_events['status']){
			$data ['upcoming_events'] = $upcoming_events['data'];
		}
		
		$this->load->view('events',$data);
	}
	public function admissions()
	{
		$this->load->view('admissions');
	}
	public function connect()
	{
		$this->load->view('connect');
	}
	public function app_form()
	{
		$this->load->view('app-form');
	}
	public function saveForm()
	{
		if ($this->input->post()){
			$postData = $this->input->post();
			if(isset($postData['name']) && isset($postData['email']) && isset($postData['phone']) && isset($postData['course']) && isset($postData['subject'])){
				$insertEnquiry = array(
									'name'=>$postData['name'],
									'email'=>$postData['email'],
									'phone'=>$postData['phone'],
									'course'=>$postData['course'],
									'subject'=>$postData['subject']
								);
				$this->Custom_model->insert_record('enquiry_form',$insertEnquiry);
				redirect('general/thankyou');
			}else{
				redirect('');
			}
		}else{
			redirect('');
		}
		
	}
	public function thankyou($name='')
	{
		$page_data = array();
		$page_data['name'] = $name.'.pdf';
		$this->load->view('thankyou',$page_data);
	}
	public function saveAppForm()
	{
		if ($this->input->post()){
			$postData = $this->input->post();
			if(count($postData) > 0){
				$insertAppForm = array(
									'first_name' =>@$postData['first_name'],
									'middle_name' =>@$postData['middle_name'],
									'last_name' =>@$postData['last_name'],
									'email' =>@$postData['email'],
									'date_of_birth' =>@$postData['date_of_birth'],
									'proofofid' =>@$postData['proofofid'],
									'country_of_citizenship' =>@$postData['country_of_citizenship'],
									'residence' =>@$postData['residence'],
									'primary_contact' =>@$postData['primary_contact'],
									'secondary_contact' =>@$postData['secondary_contact'],
									'street_address' =>@$postData['street_address'],
									'address_line1' =>@$postData['address_line1'],
									'address_line2' =>@$postData['address_line2'],
									'city' =>@$postData['city'],
									'country' =>@$postData['country'],
									'state' =>@$postData['state'],
									'postal_code' =>@$postData['postal_code'],
									'looking_course' =>@$postData['looking_course'],
									'qualification' =>@$postData['qualification']
								);
				$this->Custom_model->insert_record('app_form',$insertAppForm);
				$this->load->library('Pdf');
				$pdf = new PDF();
				
				$page_data = array();
				$page_data['request'] = $postData;
				$get_view = $this->load->view('pdf/enquiry_pdf', $page_data,true);
				$name = $pdf->create_pdf($get_view,'d');
				$final_name = str_replace("assets/pdf/","",$name);
				$final_name = str_replace(".pdf","",$final_name);
				redirect('general/thankyou/'.$final_name);
			}else{
				redirect('');
			}
		}else{
			redirect('');
		}
		
	}
	public function downloadFile($name){
		$filepath = "assets/pdf/".$name;
		if(file_exists($filepath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filepath));
			flush(); // Flush system output buffer
			readfile($filepath);
		}
	}
}

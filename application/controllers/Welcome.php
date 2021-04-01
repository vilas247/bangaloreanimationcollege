<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data = array();
		$video_url = '';
		$get_banners = $this->Custom_model->single_table_records ( 'banner_videos');
		if($get_banners['status']){
			$video_data = $get_banners['data'][0];
			$video_url = base_url().'assets/custom/banner_videos/'.$video_data['video_url'];
		}
		$data['video_url'] = $video_url;
		
		$get_awards = $this->Custom_model->single_table_records ( 'award_icons');
		$data ['award_icons'] = array();
		if($get_awards['status']){
			$data ['award_icons'] = $get_awards['data'];
		}
		
		$about_college = $this->Custom_model->single_table_records ( 'about_college');
		$data ['about_college'] = array();
		if($about_college['status']){
			$data ['about_college'] = $about_college['data'][0];
		}
		
		$courses = $this->Custom_model->single_table_records ( 'courses');
		$data ['courses'] = array();
		if($courses['status']){
			$data ['courses'] = $courses['data'];
		}
		
		$art_gallery = $this->Custom_model->single_table_records ( 'art_gallery');
		$data ['art_gallery'] = array();
		if($art_gallery['status']){
			$data ['art_gallery'] = $art_gallery['data'];
		}
		
		$events = $this->Custom_model->single_table_records ( 'events');
		$data ['events'] = array();
		if($events['status']){
			$data ['events'] = $events['data'];
		}
		
		$animation_videos = $this->Custom_model->single_table_records ( 'animation_videos');
		$data ['animation_videos'] = array();
		if($animation_videos['status']){
			$data ['animation_videos'] = $animation_videos['data'];
		}
		
		$testimonials = $this->Custom_model->single_table_records ( 'testimonials');
		$data ['testimonials'] = array();
		if($testimonials['status']){
			$data ['testimonials'] = $testimonials['data'];
		}
		
		$this->load->view('landing',$data);
	}
}

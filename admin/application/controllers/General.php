<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {
	
	//variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	//appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
    }
	
	public function banner_videos($page=null, $origin=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['video_name']['error'] == 0 and $_FILES['video_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/banner_videos/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'wmv|mp4|avi|mov';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select a video file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['video_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'banner_video-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$video_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'video_name' is the name of the input
					if (!$this->upload->do_upload('video_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$video_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($video_data) {
						$file = $upload_path . $video_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['video_name'] = $file_name;
					$data['video_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['video_type'] = $video_data['file_type'];
					$this->handle_success('Video was successfully uploaded.');
					$this->Custom_model->update_record('banner_videos', array('video_url' => $file_name,'status'=>1,'created_datetime'=>date('Y-m-d H:i:s')),array('origin'=>$_REQUEST['origin']));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					$videos = $this->Custom_model->single_table_records ( 'banner_videos','*',array('origin'=>$_REQUEST['origin']));
					$data ['videos'] = array();
					if($videos['status']){
						$data ['videos'] = $videos['data'][0];
					}
					//load the view along with data
					$this->load->view('header');
					$this->load->view('banner_videos/banner_video_edit', $data);
					$this->load->view('footer');
				}else{
					redirect(base_url()."index.php/general/banner_videos");
				}
			}else if ($page == "edit") {
				if ($origin == null) { redirect(base_url(), 'auto'); }
				$videos = $this->Custom_model->single_table_records ( 'banner_videos','*',array('origin'=>$origin));
				$data ['videos'] = array();
				if($videos['status']){
					$data ['videos'] = $videos['data'][0];
				}
				$this->load->view('header');
				$this->load->view('banner_videos/banner_video_edit', $data);
				$this->load->view('footer');
			} else {
				$get_banners = $this->Custom_model->single_table_records ( 'banner_videos');
				$data ['videos'] = array();
				if($get_banners['status']){
					$data ['videos'] = $get_banners['data'];
				}
				$this->load->view('header');
				$this->load->view('banner_videos/banner_videos', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function award_icons($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/award_icons/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select an Image file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'award_icon-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$image_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'image_name' is the name of the input
					if (!$this->upload->do_upload('image_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$image_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($image_data) {
						$file = $upload_path . $image_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['image_name'] = $file_name;
					$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['image_type'] = $image_data['file_type'];
					$this->handle_success('Image was successfully uploaded.');
					$this->Custom_model->insert_record('award_icons', array('award_icon_url' => $file_name,'status'=>1,'created_datetime'=>date('Y-m-d H:i:s')));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					//load the view along with data
					$this->load->view('header');
					$this->load->view('award_icons/award_add', $data);
					$this->load->view('footer');
				}else{
					redirect(base_url()."index.php/general/award_icons");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('award_icons/award_add');
				$this->load->view('footer');
			} elseif ($page == "delete") {
				if(isset($_POST['origin'])){
					$where = array('origin' => $_POST['origin']);
					$file = "../assets/custom/award_icons/".$_POST['award_icon_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'award_icons', $where );
				}
				redirect(base_url()."index.php/general/award_icons");
			} else {
				$get_awards = $this->Custom_model->single_table_records ( 'award_icons');
				$data ['award_icons'] = array();
				if($get_awards['status']){
					$data ['award_icons'] = $get_awards['data'];
				}
				$this->load->view('header');
				$this->load->view('award_icons/award_icons', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function courses($page=null, $course_id=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()){
				$postData = $this->input->post();
				if(isset($postData['action'])){
					$action = $postData['action'];
					if($action == "add"){
						$file_name = '';
						if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
							//set preferences
							//file upload destination
							$upload_path = '../assets/custom/courses/';
							$config['upload_path'] = $upload_path;
							//allowed file types. * means all types
							$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
							//allowed max file size. 0 means unlimited file size
							$config['max_size'] = '0';
							//max file name size
							$config['max_filename'] = '255';
							//whether file name should be encrypted or not
							$config['encrypt_name'] = FALSE;
							
							$book_id = date('d-His').'-'.rand(1,1000000);
							$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
							$file_name = 'courses-'.$book_id.'.'.$ext;
							$config['file_name'] = $file_name;
							$image_data = '';
							$is_file_error = FALSE;
							//check if file was selected for upload
							if (!$_FILES) {
								$is_file_error = TRUE;
								$this->handle_error('Select an Image file.');
							}
							//if file was selected then proceed to upload
							if (!$is_file_error) {
								//load the preferences
								$this->load->library('upload', $config);
								//check file successfully uploaded. 'image_name' is the name of the input
								if (!$this->upload->do_upload('image_name')) {
									//if file upload failed then catch the errors
									$this->handle_error($this->upload->display_errors());
									$is_file_error = TRUE;
								} else {
									//store the video file info
									$image_data = $this->upload->data();
								}
							}
						}
						$this->Custom_model->insert_record('courses', array('course_name' => trim($postData['course_name']),'course_image'=>$file_name,'course_desc'=>$postData['course_desc'],'course_years'=>$postData['course_years'],'course_seasons'=>$postData['course_seasons'],'course_status'=>$postData['course_status'],'created_date'=>date('Y-m-d H:i:s')));
					}else if($action == "edit"){
						$isuploaded = false;
						if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
							//set preferences
							//file upload destination
							$upload_path = '../assets/custom/courses/';
							$config['upload_path'] = $upload_path;
							//allowed file types. * means all types
							$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
							//allowed max file size. 0 means unlimited file size
							$config['max_size'] = '0';
							//max file name size
							$config['max_filename'] = '255';
							//whether file name should be encrypted or not
							$config['encrypt_name'] = FALSE;
							
							$book_id = date('d-His').'-'.rand(1,1000000);
							$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
							$file_name = 'courses-'.$book_id.'.'.$ext;
							$config['file_name'] = $file_name;
							$image_data = '';
							$is_file_error = FALSE;
							//check if file was selected for upload
							if (!$_FILES) {
								$is_file_error = TRUE;
								$this->handle_error('Select an Image file.');
							}
							//if file was selected then proceed to upload
							if (!$is_file_error) {
								//load the preferences
								$this->load->library('upload', $config);
								//check file successfully uploaded. 'image_name' is the name of the input
								if (!$this->upload->do_upload('image_name')) {
									//if file upload failed then catch the errors
									$this->handle_error($this->upload->display_errors());
									$is_file_error = TRUE;
								} else {
									//store the video file info
									$image_data = $this->upload->data();
									$isuploaded = true;
								}
							}
						}
						if($isuploaded){
							$this->Custom_model->update_record('courses', array('course_name' => trim($postData['course_name']),'course_image'=>$file_name,'course_desc'=>$postData['course_desc'],'course_years'=>$postData['course_years'],'course_seasons'=>$postData['course_seasons'],'course_status'=>$postData['course_status'],'updated_date'=>date('Y-m-d H:i:s')),array('course_id'=>$postData['course_id']));
						}else{
							$this->Custom_model->update_record('courses', array('course_name' => trim($postData['course_name']),'course_desc'=>$postData['course_desc'],'course_years'=>$postData['course_years'],'course_seasons'=>$postData['course_seasons'],'course_status'=>$postData['course_status'],'updated_date'=>date('Y-m-d H:i:s')),array('course_id'=>$postData['course_id']));
						}
					}else if($action == "delete"){
						$this->Custom_model->delete_record('courses',array('course_id'=>$postData['course_id']));
					}
				}
			}
			if ($page == "add") {
				$this->load->view('header');
				$this->load->view('courses/course_add');
			} elseif ($page == "edit") {
				if ($course_id == null) { redirect(base_url(), 'auto'); }
				$courses = $this->Custom_model->single_table_records ( 'courses','*',array('course_id'=>$course_id));
				$data ['courses'] = array();
				if($courses['status']){
					$data ['courses'] = $courses['data'][0];
				}
				$this->load->view('header');
				$this->load->view('courses/course_edit', $data);
			} else {
				$courses = $this->Custom_model->single_table_records ( 'courses');
				$data ['courses'] = array();
				if($courses['status']){
					$data ['courses'] = $courses['data'];
				}
				$this->load->view('header');
				$this->load->view('courses/courses', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function award_photos($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/award_photos/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select an Image file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'award_icon-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$image_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'image_name' is the name of the input
					if (!$this->upload->do_upload('image_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$image_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($image_data) {
						$file = $upload_path . $image_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['image_name'] = $file_name;
					$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['image_type'] = $image_data['file_type'];
					$this->handle_success('Image was successfully uploaded.');
					$this->Custom_model->insert_record('award_photos', array('award_photo_url' => $file_name,'status'=>1,'created_datetime'=>date('Y-m-d H:i:s')));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					//load the view along with data
					$this->load->view('header');
					$this->load->view('award_photos/award_add', $data);
					$this->load->view('footer');
				}else{
					redirect(base_url()."index.php/general/award_photos");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('award_photos/award_add');
				$this->load->view('footer');
			} elseif ($page == "delete") {
				if(isset($_POST['origin'])){
					$where = array('origin' => $_POST['origin']);
					$file = "../assets/custom/award_photos/".$_POST['award_photo_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'award_photos', $where );
				}
				redirect(base_url()."index.php/general/award_photos");
			} else {
				$get_awards = $this->Custom_model->single_table_records ( 'award_photos');
				$data ['award_photos'] = array();
				if($get_awards['status']){
					$data ['award_photos'] = $get_awards['data'];
				}
				$this->load->view('header');
				$this->load->view('award_photos/award_photos', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function digital_paintings($page=null, $dp_id=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()) {
				if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
					//set preferences
					//file upload destination
					$upload_path = '../assets/custom/digital_paintings/';
					$config['upload_path'] = $upload_path;
					//allowed file types. * means all types
					$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
					//allowed max file size. 0 means unlimited file size
					$config['max_size'] = '0';
					//max file name size
					$config['max_filename'] = '255';
					//whether file name should be encrypted or not
					$config['encrypt_name'] = FALSE;
					//store video info once uploaded
					$video_data = array();
					//check for errors
					$is_file_error = FALSE;
					//check if file was selected for upload
					if (!$_FILES) {
						$is_file_error = TRUE;
						$this->handle_error('Select an Image file.');
					}
					$book_id = date('d-His').'-'.rand(1,1000000);
					$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
					$file_name = 'digital_paintings-'.$book_id.'.'.$ext;
					$config['file_name'] = $file_name;
					$image_data = '';
					//if file was selected then proceed to upload
					if (!$is_file_error) {
						//load the preferences
						$this->load->library('upload', $config);
						//check file successfully uploaded. 'image_name' is the name of the input
						if (!$this->upload->do_upload('image_name')) {
							//if file upload failed then catch the errors
							$this->handle_error($this->upload->display_errors());
							$is_file_error = TRUE;
						} else {
							//store the video file info
							$image_data = $this->upload->data();
						}
					}
					// There were errors, you have to delete the uploaded video
					if ($is_file_error) {
						if ($image_data) {
							$file = $upload_path . $image_data['file_name'];
							if (file_exists($file)) {
								unlink($file);
							}
						}
					}else {
						$data['image_name'] = $file_name;
						$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
						$data['image_type'] = $image_data['file_type'];
						$this->handle_success('Image was successfully uploaded.');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$this->Custom_model->update_record('digital_paintings', array('dp_student_name'=>$_REQUEST['dp_student_name'],'dp_course_name'=>$_REQUEST['dp_course_name'],'dp_image_url' => $file_name),array('dp_id'=>$_REQUEST['dp_id']));
						}else{
							$this->Custom_model->insert_record('digital_paintings', array('dp_student_name'=>$_REQUEST['dp_student_name'],'dp_course_name'=>$_REQUEST['dp_course_name'],'dp_image_url' => $file_name,'created_at'=>date('Y-m-d H:i:s')));
						}
					}
					//load the error and success messages
					$data['errors'] = $this->error;
					$data['success'] = $this->success;
					if ($is_file_error) {
						//load the view along with data
						$this->load->view('header');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$digital_paintings = $this->Custom_model->single_table_records ( 'digital_paintings','*',array('dp_id'=>$dp_id));
							$data ['digital_paintings'] = array();
							if($digital_paintings['status']){
								$data ['digital_paintings'] = $digital_paintings['data'][0];
							}
							$this->load->view('digital_paintings/digital_paintings_edit', $data);
						}else{
							$this->load->view('digital_paintings/digital_paintings_add', $data);
						}
						$this->load->view('footer');
					}else{
						redirect(base_url()."index.php/general/digital_paintings");
					}
				}else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
					$this->Custom_model->update_record('digital_paintings', array('dp_student_name'=>$_REQUEST['dp_student_name'],'dp_course_name'=>$_REQUEST['dp_course_name']),array('dp_id'=>$_REQUEST['dp_id']));
					redirect(base_url()."index.php/general/digital_paintings");
				}elseif ($page == "delete") {
					if(isset($_POST['dp_id'])){
						$where = array('dp_id' => $_POST['dp_id']);
						$file = "../assets/custom/digital_paintings/".$_POST['dp_image_url'];
						if (file_exists($file)) {
							unlink($file);
						}
						$this->Custom_model->delete_record ( 'digital_paintings', $where );
					}
					redirect(base_url()."index.php/general/digital_paintings");
				}else{
					redirect(base_url()."index.php/general/digital_paintings");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('digital_paintings/digital_paintings_add');
				$this->load->view('footer');
			}elseif ($page == "edit") {
				if ($dp_id == null) { redirect(base_url(), 'auto'); }
				$digital_paintings = $this->Custom_model->single_table_records ( 'digital_paintings','*',array('dp_id'=>$dp_id));
				$data ['digital_paintings'] = array();
				if($digital_paintings['status']){
					$data ['digital_paintings'] = $digital_paintings['data'][0];
				}
				$this->load->view('header');
				$this->load->view('digital_paintings/digital_paintings_edit', $data);
			} elseif ($page == "delete") {
				if(isset($_POST['dp_id'])){
					$where = array('dp_id' => $_POST['dp_id']);
					$file = "../assets/custom/digital_paintings/".$_POST['dp_image_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'digital_paintings', $where );
				}
				redirect(base_url()."index.php/general/digital_paintings");
			} else {
				$get_awards = $this->Custom_model->single_table_records ( 'digital_paintings');
				$data ['digital_paintings'] = array();
				if($get_awards['status']){
					$data ['digital_paintings'] = $get_awards['data'];
				}
				$this->load->view('header');
				$this->load->view('digital_paintings/digital_paintings', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function animation_videos($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['video_name']['error'] == 0 and $_FILES['video_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/animation_videos/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'wmv|mp4|avi|mov';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select a video file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['video_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'animation_video-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$video_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'video_name' is the name of the input
					if (!$this->upload->do_upload('video_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$video_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($video_data) {
						$file = $upload_path . $video_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['video_name'] = $file_name;
					$data['video_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['video_type'] = $video_data['file_type'];
					$this->handle_success('Video was successfully uploaded.');
					$this->Custom_model->insert_record('animation_videos', array('video_url' => $file_name,'status'=>1,'created_datetime'=>date('Y-m-d H:i:s')));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					//load the view along with data
					$this->load->view('header');
					$this->load->view('animation_videos/animation_videos_add', $data);
					$this->load->view('footer');
				}else{
					redirect(base_url()."index.php/general/animation_videos");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('animation_videos/animation_videos_add');
				$this->load->view('footer');
			} elseif ($page == "delete") {
				if(isset($_POST['origin'])){
					$where = array('origin' => $_POST['origin']);
					$file = "../assets/custom/animation_videos/".$_POST['video_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'animation_videos', $where );
				}
				redirect(base_url()."index.php/general/animation_videos");
			} else {
				$get_banners = $this->Custom_model->single_table_records ( 'animation_videos');
				$data ['videos'] = array();
				if($get_banners['status']){
					$data ['videos'] = $get_banners['data'];
				}
				$this->load->view('header');
				$this->load->view('animation_videos/animation_videos', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function events($page=null, $e_id=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()) {
				if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
					//set preferences
					//file upload destination
					$upload_path = '../assets/custom/events/';
					$config['upload_path'] = $upload_path;
					//allowed file types. * means all types
					$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
					//allowed max file size. 0 means unlimited file size
					$config['max_size'] = '0';
					//max file name size
					$config['max_filename'] = '255';
					//whether file name should be encrypted or not
					$config['encrypt_name'] = FALSE;
					//store video info once uploaded
					$video_data = array();
					//check for errors
					$is_file_error = FALSE;
					//check if file was selected for upload
					if (!$_FILES) {
						$is_file_error = TRUE;
						$this->handle_error('Select an Image file.');
					}
					$book_id = date('d-His').'-'.rand(1,1000000);
					$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
					$file_name = 'events-'.$book_id.'.'.$ext;
					$config['file_name'] = $file_name;
					$image_data = '';
					//if file was selected then proceed to upload
					if (!$is_file_error) {
						//load the preferences
						$this->load->library('upload', $config);
						//check file successfully uploaded. 'image_name' is the name of the input
						if (!$this->upload->do_upload('image_name')) {
							//if file upload failed then catch the errors
							$this->handle_error($this->upload->display_errors());
							$is_file_error = TRUE;
						} else {
							//store the video file info
							$image_data = $this->upload->data();
						}
					}
					// There were errors, you have to delete the uploaded video
					if ($is_file_error) {
						if ($image_data) {
							$file = $upload_path . $image_data['file_name'];
							if (file_exists($file)) {
								unlink($file);
							}
						}
					}else {
						$data['image_name'] = $file_name;
						$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
						$data['image_type'] = $image_data['file_type'];
						$this->handle_success('Image was successfully uploaded.');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$this->Custom_model->update_record('events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'e_image_url' => $file_name,'updated_datetime'=>date('Y-m-d H:i:s')),array('e_id'=>$_REQUEST['e_id']));
						}else{
							$this->Custom_model->insert_record('events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'e_image_url' => $file_name,'created_datetime'=>date('Y-m-d H:i:s')));
						}
					}
					//load the error and success messages
					$data['errors'] = $this->error;
					$data['success'] = $this->success;
					if ($is_file_error) {
						//load the view along with data
						$this->load->view('header');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$events = $this->Custom_model->single_table_records ( 'events','*',array('e_id'=>$e_id));
							$data ['events'] = array();
							if($events['status']){
								$data ['events'] = $events['data'][0];
							}
							$this->load->view('events/events_edit', $data);
						}else{
							$this->load->view('events/events_add', $data);
						}
						$this->load->view('footer');
					}else{
						redirect(base_url()."index.php/general/events");
					}
				}else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
					$this->Custom_model->update_record('events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'updated_datetime'=>date('Y-m-d H:i:s')),array('e_id'=>$_REQUEST['e_id']));
					redirect(base_url()."index.php/general/events");
				}elseif ($page == "delete") {
				
					if(isset($_POST['e_id'])){
						$where = array('e_id' => $_POST['e_id']);
						$file = "../assets/custom/events/".$_POST['e_image_url'];
						if (file_exists($file)) {
							unlink($file);
						}
						$this->Custom_model->delete_record ( 'events', $where );
					}
					redirect(base_url()."index.php/general/events");
				}else{
					redirect(base_url()."index.php/general/events");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('events/events_add');
				$this->load->view('footer');
			}elseif ($page == "edit") {
				if ($e_id == null) { redirect(base_url(), 'auto'); }
				$events = $this->Custom_model->single_table_records ( 'events','*',array('e_id'=>$e_id));
				$data ['events'] = array();
				if($events['status']){
					$data ['events'] = $events['data'][0];
				}
				$this->load->view('header');
				$this->load->view('events/events_edit', $data);
			} elseif ($page == "delete") {
				
				if(isset($_POST['e_id'])){
					$where = array('e_id' => $_POST['e_id']);
					$file = "../assets/custom/events/".$_POST['e_image_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'events', $where );
				}
				redirect(base_url()."index.php/general/events");
			} else {
				$events = $this->Custom_model->single_table_records ( 'events');
				$data ['events'] = array();
				if($events['status']){
					$data ['events'] = $events['data'];
				}
				$this->load->view('header');
				$this->load->view('events/events', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function about($page=null, $id=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/about_college/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select an Image file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'award_icon-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$image_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'image_name' is the name of the input
					if (!$this->upload->do_upload('image_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$image_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($image_data) {
						$file = $upload_path . $image_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['image_name'] = $file_name;
					$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['image_type'] = $image_data['file_type'];
					$this->handle_success('Image was successfully uploaded.');
					$this->Custom_model->update_record('about_college', array('description'=>$_REQUEST['description'],'image_url' => $file_name,'updated_datetime'=>date('Y-m-d H:i:s')),array('id'=>$_REQUEST['id']));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					$about_college = $this->Custom_model->single_table_records ( 'about_college','*',array('id'=>$_REQUEST['id']));
					$data ['about_college'] = array();
					if($about_college['status']){
						$data ['about_college'] = $about_college['data'][0];
					}
					//load the view along with data
					$this->load->view('header');
					$this->load->view('about_college/about_college_edit', $data);
				}else{
					redirect(base_url()."index.php/general/about");
				}
			}else if ($page == "edit") {
				if ($id == null) { redirect(base_url(), 'auto'); }
				$about_college = $this->Custom_model->single_table_records ( 'about_college','*',array('id'=>$id));
				$data ['about_college'] = array();
				if($about_college['status']){
					$data ['about_college'] = $about_college['data'][0];
				}
				$this->load->view('header');
				$this->load->view('about_college/about_college_edit', $data);
			} else {
				$about_college = $this->Custom_model->single_table_records ( 'about_college');
				$data ['about_college'] = array();
				if($about_college['status']){
					$data ['about_college'] = $about_college['data'];
				}
				$this->load->view('header');
				$this->load->view('about_college/about_college', $data);
				$this->load->view('footer');
			} 	
		}
	}
	public function art_gallery($page=null, $adminid=0) {
		if ($this->Admin_model->verifyUser()) {
			//print_r($_FILES);exit;
			if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
				//set preferences
				//file upload destination
				$upload_path = '../assets/custom/art_gallery/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				//store video info once uploaded
				$video_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload
				if (!$_FILES) {
					$is_file_error = TRUE;
					$this->handle_error('Select an Image file.');
				}
				$book_id = date('d-His').'-'.rand(1,1000000);
				$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
				$file_name = 'award_icon-'.$book_id.'.'.$ext;
				$config['file_name'] = $file_name;
				$image_data = '';
				//if file was selected then proceed to upload
				if (!$is_file_error) {
					//load the preferences
					$this->load->library('upload', $config);
					//check file successfully uploaded. 'image_name' is the name of the input
					if (!$this->upload->do_upload('image_name')) {
						//if file upload failed then catch the errors
						$this->handle_error($this->upload->display_errors());
						$is_file_error = TRUE;
					} else {
						//store the video file info
						$image_data = $this->upload->data();
					}
				}
				// There were errors, you have to delete the uploaded video
				if ($is_file_error) {
					if ($image_data) {
						$file = $upload_path . $image_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				}else {
					$data['image_name'] = $file_name;
					$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
					$data['image_type'] = $image_data['file_type'];
					$this->handle_success('Image was successfully uploaded.');
					$this->Custom_model->insert_record('art_gallery', array('art_icon_url' => $file_name,'status'=>1,'created_datetime'=>date('Y-m-d H:i:s')));
				}
				//load the error and success messages
				$data['errors'] = $this->error;
				$data['success'] = $this->success;
				if ($is_file_error) {
					//load the view along with data
					$this->load->view('header');
					$this->load->view('art_gallery/art_gallery_add', $data);
					$this->load->view('footer');
				}else{
					redirect(base_url()."index.php/general/art_gallery");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('art_gallery/art_gallery_add');
				$this->load->view('footer');
			} elseif ($page == "delete") {
				if(isset($_POST['origin'])){
					$where = array('origin' => $_POST['origin']);
					$file = "../assets/custom/art_gallery/".$_POST['art_icon_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'art_gallery', $where );
				}
				redirect(base_url()."index.php/general/art_gallery");
			} else {
				$art_gallery = $this->Custom_model->single_table_records ( 'art_gallery');
				$data ['art_gallery'] = array();
				if($art_gallery['status']){
					$data ['art_gallery'] = $art_gallery['data'];
				}
				$this->load->view('header');
				$this->load->view('art_gallery/art_gallery', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function upcoming_events($page=null, $e_id=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()) {
				if (valid_array($_FILES) == true and $_FILES['image_name']['error'] == 0 and $_FILES['image_name']['size'] > 0) {
					//set preferences
					//file upload destination
					$upload_path = '../assets/custom/upcoming_events/';
					$config['upload_path'] = $upload_path;
					//allowed file types. * means all types
					$config['allowed_types'] = 'JPEG|JPG|PNG|GIF|png|jpg|gif|jpeg';
					//allowed max file size. 0 means unlimited file size
					$config['max_size'] = '0';
					//max file name size
					$config['max_filename'] = '255';
					//whether file name should be encrypted or not
					$config['encrypt_name'] = FALSE;
					//store video info once uploaded
					$video_data = array();
					//check for errors
					$is_file_error = FALSE;
					//check if file was selected for upload
					if (!$_FILES) {
						$is_file_error = TRUE;
						$this->handle_error('Select an Image file.');
					}
					$book_id = date('d-His').'-'.rand(1,1000000);
					$ext = pathinfo($_FILES ['image_name'] ['name'], PATHINFO_EXTENSION);
					$file_name = 'events-'.$book_id.'.'.$ext;
					$config['file_name'] = $file_name;
					$image_data = '';
					//if file was selected then proceed to upload
					if (!$is_file_error) {
						//load the preferences
						$this->load->library('upload', $config);
						//check file successfully uploaded. 'image_name' is the name of the input
						if (!$this->upload->do_upload('image_name')) {
							//if file upload failed then catch the errors
							$this->handle_error($this->upload->display_errors());
							$is_file_error = TRUE;
						} else {
							//store the video file info
							$image_data = $this->upload->data();
						}
					}
					// There were errors, you have to delete the uploaded video
					if ($is_file_error) {
						if ($image_data) {
							$file = $upload_path . $image_data['file_name'];
							if (file_exists($file)) {
								unlink($file);
							}
						}
					}else {
						$data['image_name'] = $file_name;
						$data['image_path'] = str_replace("admin/../","",base_url().$upload_path);
						$data['image_type'] = $image_data['file_type'];
						$this->handle_success('Image was successfully uploaded.');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$this->Custom_model->update_record('upcoming_events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'e_image_url' => $file_name,'updated_datetime'=>date('Y-m-d H:i:s')),array('e_id'=>$_REQUEST['e_id']));
						}else{
							$this->Custom_model->insert_record('upcoming_events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'e_image_url' => $file_name,'created_datetime'=>date('Y-m-d H:i:s')));
						}
					}
					//load the error and success messages
					$data['errors'] = $this->error;
					$data['success'] = $this->success;
					if ($is_file_error) {
						//load the view along with data
						$this->load->view('header');
						if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
							$upcoming_events = $this->Custom_model->single_table_records ( 'upcoming_events','*',array('e_id'=>$e_id));
							$data ['upcoming_events'] = array();
							if($upcoming_events['status']){
								$data ['upcoming_events'] = $upcoming_events['data'][0];
							}
							$this->load->view('upcoming_events/events_edit', $data);
						}else{
							$this->load->view('upcoming_events/events_add', $data);
						}
						$this->load->view('footer');
					}else{
						redirect(base_url()."index.php/general/upcoming_events");
					}
				}else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit"){
					$this->Custom_model->update_record('upcoming_events', array('e_name'=>$_REQUEST['e_name'],'e_desc'=>$_REQUEST['e_desc'],'updated_datetime'=>date('Y-m-d H:i:s')),array('e_id'=>$_REQUEST['e_id']));
					redirect(base_url()."index.php/general/upcoming_events");
				}elseif ($page == "delete") {
				
					if(isset($_POST['e_id'])){
						$where = array('e_id' => $_POST['e_id']);
						$file = "../assets/custom/upcoming_events/".$_POST['e_image_url'];
						if (file_exists($file)) {
							unlink($file);
						}
						$this->Custom_model->delete_record ( 'upcoming_events', $where );
					}
					redirect(base_url()."index.php/general/upcoming_events");
				}else{
					redirect(base_url()."index.php/general/upcoming_events");
				}
			}
			else if ($page == "add") {
				$this->load->view('header');
				$this->load->view('upcoming_events/events_add');
				$this->load->view('footer');
			}elseif ($page == "edit") {
				if ($e_id == null) { redirect(base_url(), 'auto'); }
				$upcoming_events = $this->Custom_model->single_table_records ( 'upcoming_events','*',array('e_id'=>$e_id));
				$data ['upcoming_events'] = array();
				if($upcoming_events['status']){
					$data ['upcoming_events'] = $upcoming_events['data'][0];
				}
				$this->load->view('header');
				$this->load->view('upcoming_events/events_edit', $data);
			} elseif ($page == "delete") {
				
				if(isset($_POST['e_id'])){
					$where = array('e_id' => $_POST['e_id']);
					$file = "../assets/custom/upcoming_events/".$_POST['e_image_url'];
					if (file_exists($file)) {
						unlink($file);
					}
					$this->Custom_model->delete_record ( 'upcoming_events', $where );
				}
				redirect(base_url()."index.php/general/upcoming_events");
			} else {
				$upcoming_events = $this->Custom_model->single_table_records ( 'upcoming_events');
				$data ['upcoming_events'] = array();
				if($upcoming_events['status']){
					$data ['upcoming_events'] = $upcoming_events['data'];
				}
				$this->load->view('header');
				$this->load->view('upcoming_events/events', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function testimonials($page=null, $id=0) {
		if ($this->Admin_model->verifyUser()) {
			if ($this->input->post()){
				$postData = $this->input->post();
				if(isset($postData['action'])){
					$action = $postData['action'];
					if($action == "add"){
						$this->Custom_model->insert_record('testimonials', array('name' => trim($postData['name']),'country'=>$postData['country'],'description'=>$postData['description'],'created_datetime'=>date('Y-m-d H:i:s')));
					}else if($action == "edit"){
						$this->Custom_model->update_record('testimonials', array('name' => trim($postData['name']),'country'=>$postData['country'],'description'=>$postData['description'],'updated_datetime'=>date('Y-m-d H:i:s')),array('id'=>$postData['id']));
					}else if($action == "delete"){
						$this->Custom_model->delete_record('testimonials',array('id'=>$postData['id']));
					}
				}
			}
			if ($page == "add") {
				$this->load->view('header');
				$this->load->view('testimonials/testimonials_add');
			} elseif ($page == "edit") {
				if ($id == null) { redirect(base_url(), 'auto'); }
				$testimonials = $this->Custom_model->single_table_records ( 'testimonials','*',array('id'=>$id));
				$data ['testimonials'] = array();
				if($testimonials['status']){
					$data ['testimonials'] = $testimonials['data'][0];
				}
				$this->load->view('header');
				$this->load->view('testimonials/testimonials_edit', $data);
			} else {
				$testimonials = $this->Custom_model->single_table_records ( 'testimonials');
				$data ['testimonials'] = array();
				if($testimonials['status']){
					$data ['testimonials'] = $testimonials['data'];
				}
				$this->load->view('header');
				$this->load->view('testimonials/testimonials', $data);
				$this->load->view('footer');
			} 	
		}
	}
	
	public function enquiry_form($page=null, $id=0) {
		if ($this->Admin_model->verifyUser()) {
			$enquiry_form = $this->Custom_model->single_table_records ( 'enquiry_form','','','','',array('id'=>'desc'));
			$data ['enquiry_form'] = array();
			if($enquiry_form['status']){
				$data ['enquiry_form'] = $enquiry_form['data'];
			}
			$this->load->view('header');
			$this->load->view('enquiry_form/enquiry_form', $data);
			$this->load->view('footer');
		}
	}
	public function app_form($page=null, $id=0) {
		if ($this->Admin_model->verifyUser()) {
			$app_form = $this->Custom_model->single_table_records ( 'app_form','','','','',array('id'=>'desc'));
			$data ['app_form'] = array();
			if($app_form['status']){
				$data ['app_form'] = $app_form['data'];
			}
			$this->load->view('header');
			$this->load->view('enquiry_form/app_form', $data);
			$this->load->view('footer');
		}
	}
}

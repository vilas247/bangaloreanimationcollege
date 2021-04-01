<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Academics</li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>index.php/general/courses">Courses</a></li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>

        <form method="POST" action="<?=base_url()?>index.php/general/courses" enctype="multipart/form-data" >
            <input type="hidden" name="action" value="add">
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Name</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="" placeholder="" name="course_name">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Description</label>
              <div class="col-10">
                <textarea name="course_desc" id="course_desc" rows="10" cols="80"></textarea>
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Years</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="" placeholder="" name="course_years">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Seasons</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="" placeholder="" name="course_seasons">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Image</label>
              <div class="col-10">
                <input class="form-control" required type="file" value="" placeholder="" name="image_name">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Status</label>
              <div class="col-10">
                <div style="display:flex">
					Enable<input class="form-control" style="width:10%" type="radio" placeholder="" name="course_status" value="1" checked />
					Disable<input class="form-control" style="width:10%" type="radio" placeholder="" name="course_status" value="0" />
				</div>
              </div>
            </div>
            <div class="form-group row"> 
              <div class="col-10">
                <input type="submit" class="btn btn-primary">
              </div>
            </div> 
            

        </form>
		<?= $this->load->view('footer'); ?>
		<script>
			CKEDITOR.editorConfig = function (config) {
				config.language = 'es';
				config.uiColor = '#F7B42C';
				config.height = 300;
				config.toolbarCanCollapse = true;

			};
			CKEDITOR.replace('course_desc');
		</script>
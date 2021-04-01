<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Showcase</li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>index.php/general/digital_paintings">Digital Paintings</a></li>
                <li class="breadcrumb-item active">Edit Digital Painting</li>
            </ol>
		<p>Select an Image to upload (JPEG | JPG | PNG | GIF)</p>
        <?php
			if (isset($success) && strlen($success)) {
				echo '<div class="success">';
				echo '<p>' . $success . '</p>';
				echo '</div>';

				//HTML5 video play
				echo '<video width="320" height="240" controls>
				  <source src="' . $video_path . '/' . $video_name . '" type="' . $video_type . '">
				  Your browser does not support the video tag.
				  </video>';
			}
			if (isset($errors) && strlen($errors)) {
				echo '<div class="error">';
				echo '<p>' . $errors . '</p>';
				echo '</div>';
			}
			if (validation_errors()) {
				echo validation_errors('<div class="error">', '</div>');
			}
        ?>
		<?php
			$attributes = array('name' => 'image_upload', 'id' => 'image_upload');
			echo form_open_multipart(base_url().'index.php/general/digital_paintings', $attributes);
		?>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="dp_id" value="<?= $digital_paintings['dp_id'] ?>">
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Student Name</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="<?= $digital_paintings['dp_student_name'] ?>" placeholder="" name="dp_student_name">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Name</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="<?= $digital_paintings['dp_course_name'] ?>" placeholder="" name="dp_course_name">
              </div>
            </div>
			
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Digital Photo</label>
              <div class="col-10">
                <p><img height="120" width="200" src="<?= str_replace("admin","",base_url())?>assets/custom/digital_paintings/<?= $digital_paintings['dp_image_url'] ?>"><br/><br/><input name="image_name" id="image_name" readonly="readonly" type="file" /></p>
              </div>
            </div>
            <div class="form-group row"> 
              <div class="col-10">
                <input type="submit" class="btn btn-primary">
              </div>
            </div> 
        <?php
			echo form_close();
        ?>
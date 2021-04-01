<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">CMS</li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>index.php/general/about_college">About College</a></li>
                <li class="breadcrumb-item active">Edit About College</li>
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
			echo form_open_multipart(base_url().'index.php/general/about', $attributes);
		?>
            <input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?= $about_college['id'] ?>">
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Description</label>
              <div class="col-10">
                <textarea class="form-control" name="description" id="description" required ><?= $about_college['description'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Description</label>
              <div class="col-10">
                <p><input name="image_name" id="image_name" readonly="readonly" type="file" /></p>
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
		<?= $this->load->view('footer'); ?>
		<script>
			CKEDITOR.editorConfig = function (config) {
				config.language = 'es';
				config.uiColor = '#F7B42C';
				config.height = 300;
				config.toolbarCanCollapse = true;

			};
			CKEDITOR.replace('description');
		</script>
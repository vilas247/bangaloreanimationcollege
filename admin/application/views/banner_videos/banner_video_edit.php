<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">CMS</li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>index.php/general/banner_videos">Banner Videos</a></li>
                <li class="breadcrumb-item active">Add Video</li>
            </ol>
		<p>Select a video file to upload</p>
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
			$attributes = array('name' => 'video_upload', 'id' => 'video_upload');
			echo form_open_multipart(base_url().'index.php/general/banner_videos', $attributes);
		?>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="origin" value="<?= $videos['origin'] ?>">
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Uploaded Banner Video</label>
              <div class="col-10">
                <p><video width="220" height="140" controls>
										  <source src="<?= str_replace("admin","",base_url())?>assets/custom/banner_videos/<?= $videos['video_url'] ?>">
										  Your browser does not support the video tag.
										  </video></p>
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Choose New Banner Video</label>
              <div class="col-10">
                <p><input name="video_name" id="video_name" readonly="readonly" type="file" /></p>
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
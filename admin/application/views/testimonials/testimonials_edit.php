<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">CMS</li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>index.php/general/testimonials">Testimonials</a></li>
                <li class="breadcrumb-item active">Edit Testimonial</li>
            </ol>

        <form method="POST" action="<?=base_url()?>index.php/general/testimonials" >
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?= $testimonials['id'] ?>">
            <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Name</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="<?= $testimonials['name'] ?>" placeholder="" name="name">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Country</label>
              <div class="col-10">
                <input class="form-control" required type="text" value="<?= $testimonials['country'] ?>" placeholder="" name="country">
              </div>
            </div>
			<div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Course Description</label>
              <div class="col-10">
                <textarea name="description" id="description" rows="10" cols="80"><?= $testimonials['description'] ?></textarea>
              </div>
            </div>
            <div class="form-group row"> 
              <div class="col-10">
                <input type="submit" class="btn btn-primary">
              </div>
            </div> 
            

        </form>
		<?= $this->load->view('footer'); ?>
<?php $this->view('header'); ?>
<section class="app-form d-flex mt-5">
	<div class="container">
		<h3>Thank you</h3>
		<div class="form-row">
				<div class="app-formdiv">
                  <h2>Thak you for Contacing us. Our team will contact you soon.</h2>
                </div>
		</div>
	</div>
</section><br><br>
<?php $this->view('footer'); ?>
<?php
if(!empty($name)){
	echo '<script>window.location.href="'.base_url().'index.php/general/downloadFile/'.$name.'"</script>';die();
}
?>
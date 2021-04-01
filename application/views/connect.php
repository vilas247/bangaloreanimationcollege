<?php $this->view('header'); ?>
	<section class="contact-page">
		<div class="container d-flex">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12  first-img">
					<img src="<?=base_url()?>assets/images/contact-img.jpg" alt="College" title="college" class="">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 ">
					<h3>Contact Us</h3>
				</div>
				
			</div>
			
		</div>
	</section>

	
<section class="contact-section">
 <div class="container contact-cont  ">
 	<div class="row">
 		<div class="col-lg-6 col-md-6 col-sm-12 mt-5 pt-5">
	<div class="card contact-card first-card" data-tilt>
		<div class="content">
			<h2><i class="fas fa-map-marker-alt"></i></h2>
			<h3>Our Location</h3>
			<p>1308, 4th Floor, Shetty Plaza, Jeevan Bima Nagar Main Rd, HAL 3rd Stage, Jeevanbhima Nagar,Bangalore-560008. </p>
			 
		</div>

	</div>

	<div class="card contact-card second-card" data-tilt>
		<div class="content" >
			<h2><i class="fas fa-mobile-alt"></i></h2>
			<h3>Contact Us Anytime</h3>
			<p>9836390098 <br>
					08043760955</p>
			
		</div>

	</div>

	<div class="card contact-card third-card" data-tilt>
		<div class="content">
			<h2><i class="far fa-envelope-open"></i></h2>
			<h3>Write Some Words</h3>
			<p>info@bangaloreanimationcollege.com</p>
			
		</div>

	</div>
</div>




<div class="col-lg-6 col-md-6 col-sm-12">
<div class=" contact-form ">
	<div class="card card-contact" >
		<div class="box">
		<div class="content">
			
<h2>ENQUIRY FORM</h2>
<form action="<?= base_url().'index.php/general/saveForm' ?>" method="POST" class="contact-formdiv" >
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Full Name <span class="req">*</span></label>
                  <input type="text" name="name" class="form-control" id="name" required/>
                 
                </div>
                <div class="form-group col-md-6">
                  <label for="name"> Email Address <span class="req">*</span></label>
                  <input type="email" class="form-control" name="email" required/>
               
                </div>
              </div>
               <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name"> Phone Number<span class="req">*</span></label>
                <input type="text" class="form-control" name="phone" required/>
               
              </div>
              <div class="form-group col-md-6 ">
              	<label for="name">Select Course <span class="req">*</span></label>
                <select class="form-control "  name="course" required>
                 <option value="" disabled selected></option>
					        <option >Graphic Design</option>
					        <option >Web Design</option>
					        <option >UI / UX Design</option>
					        <option >3D Animation</option>
					        <option >VFX</option>
					        <option >Photography</option>
					        <option >Diploma In Animation</option>
					        <option >Diploma In Game Development</option>
					        <option >Diploma In VFX</option>
					        <option >Diploma In AR & VR</option>
					        <option >Bachelor Of Visual Arts</option>
               </select>
              </div>
          </div>
              <div class="form-group">
                <label for="name">Message <span class="req">*</span></label>
                <textarea class="form-control text-form" name="subject" rows="4" data-rule="required" data-msg="Please write something for us"></textarea>
               
              </div>
           
              <div class="text-center"><a href=""><button type="submit" class="btn btn-outline enquiry-btn">Enquiry Now</button></a></div>
            </form>
	</div>

		</div>
</div>
	</div>
</div>
</div>
</section>
<section class="sectn-map">
<div class="container map-cont">
	<div class="map-contact">
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.057804465746!2d77.64842131433522!3d12.968152990858089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14004caba0d7%3A0x5b0016efa4155c4f!2sShetty+Plaza%2C+Jeevan+Bima+Nagar+Main+Rd%2C+HAL+3rd+Stage%2C+Kodihalli%2C+Bengaluru%2C+Karnataka+560008!5e0!3m2!1sen!2sin!4v1541610845899" width="" height="" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	</div>
</section>
<?php $this->view('footer'); ?>
<script type="text/javascript" src="plugins/vanilla-tilt.min.js"></script>
	<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".contact-card"), {
		max: 25,
		speed: 400
	});

	
	</script>
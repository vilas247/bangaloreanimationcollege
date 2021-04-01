<?php $this->view('header'); ?>
<div class="video-background-holder d-none d-lg-block">
   <div class="video-background-overlay"></div>
   <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class=" ">
      <source src="<?= $video_url ?>" type="video/mp4">
   </video>
   <!-- end video source-->
   <div class="video-background-content container-fluid ">
      <div class="row">
         <div class="col-xl-9 col-lg-8">
            <div class=" h-100  awards ml-5">
				<?php
					foreach($award_icons as $k=>$v){
				?>
				<img src="<?=base_url()?>assets/custom/award_icons/<?= $v['award_icon_url'] ?>" >
				<?php } ?>
            </div>
            <!-- end text/button area -->
         </div>
         <div class="col-xl-3 col-lg-4">
            <div class="enquiryform">
               <div class="form1">
                  <form action="<?= base_url().'index.php/general/saveForm' ?>" method="POST" >
                     <label for="name">Name</label>
                     <input type="text" id="name" name="name" required placeholder="Enter Your Name">
                     <label for="email">Email id</label>
                     <input type="text" id="email" name="email" required placeholder="Enter Your Email-id">
                     <label for="phone">Phone Number</label>
                     <input type="text" id="Phone Number" name="phone" required placeholder="Enter Your Phone Number">
                     <label for="courseseclection">Select Course</label>
                     <select id="courseseclection" name="course" required >
                        <option value="Bachelor Of Visual Arts">Bachelor Of Visual Arts</option>
                        <option value="B.Sc in animation & VFX">B.Sc in animation & VFX</option>
                        <option value="M.Sc in visual communications">M.Sc in visual communications</option>
                        <option value="Professional Diploma">Professional Diploma</option>
                        <option value="Junior Diploma">Junior Diploma</option>
                     </select>
                     <label for="subject">Subject</label>
                     <textarea id="subject" name="subject" class="textarea" required placeholder="Enter Your Msg here..." style=""></textarea>
                     <input type="submit" value="Submit">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end video-background-overlay-->
<section id="hero" class="d-flex align-items-center d-lg-none ">
   <div class="container text-center position-relative" >
      <h1>Bangalore Animation College</h1>
      <h2> Best Animation College in India and Thousands of student and professionals</h2>
      <a href="" class="btn-get-started scrollto"  data-toggle="modal" data-target="#form">Enquire now</a>
   </div>
</section>
<!-- End Hero -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header border-bottom-0">
            <h5 class="modal-title text-center font-weight-bold" id="exampleModalLabel">Enquire now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form>
            <div class="modal-body">
               <label for="name">Name</label>
               <input type="text" id="fname" name="firstname" placeholder="Enter Your Name">
               <label for="email">Email id</label>
               <input type="text" id="email" name="email" placeholder="Enter Your Email-id">
               <label for="phone">Phone Number</label>
               <input type="text" id="Phone Number" name="Phone Number" placeholder="Enter Your Phone Number">
               <label for="courseseclection">Select Course</label>
               <select id="courseseclection" name="courseseclection">
                  <option value="course1">  Bachelor Of Visual Arts</option>
                  <option value="course2">  B.Sc in animation & VFX</option>
                  <option value="course3">  M.Sc in visual communications</option>
                  <option value="course4">   Professional Diploma</option>
                  <option value="course5">    Junior Diploma</option>
               </select>
               <label for="subject">Subject</label>
               <textarea id="subject" name="subject" class="textarea" placeholder="Enter Your Msg here..." style=""></textarea>
               <input type="submit" value="Submit">
            </div>
            <!--  <div class="modal-footer border-top-0 d-flex justify-content-center">
               <button type="submit" class="btn btn-success">Submit</button>
               </div> -->
         </form>
      </div>
   </div>
</div>
<section id="about" class="about">
   <div class="container" data-aos="fade-up">
      <div class="row">
         <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" >
            <div class="about-img">
               <img src="<?=base_url()?>assets/custom/about_college/<?= $about_college['image_url'] ?>" alt="">
            </div>
         </div>
         <div class="col-lg-6  pt-lg-4 order-2 order-lg-1 content">
            <h2>about us</h2>
            <?= $about_college['description'] ?>
			<a href="<?=base_url()?>index.php/about"><button type="button" class="btn readmore">Readmore</button></a>
         </div>
      </div>
   </div>
</section>
<!-- End About Section -->
<section id="about-award" class="about-award">
   <div class="container">
      <div class="row" >
         <div class="col-xl-12 col-lg-12 ">
            <div class="icon-boxes ">
               <div class="row">
                  <div class="col-xl-12" data-aos="fade-up" >
                     <div class="icon-box mt-4 ">
                        <img src="<?=base_url()?>assets/images/award.png">
                        <h4>online support</h4>
                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End about Section -->
<section id="courses" class="courses">
   <div class="container" data-aos="fade-up">
      <div class="section-titlecourses">
         <h2>OUR COURSES</h2>
         <p>Find Best Course For Yourself!</p>
      </div>
      <div class="row">
		<?php
			foreach($courses as $ck=>$cv){
		?>
         <div class="col-lg-3 col-md-6 mb-2" data-aos="fade-up" >
            <div class="card">
               <img src="<?=base_url().'assets/custom/courses/'.$cv['course_image'] ?>" class="card-img-top" alt="...">
               <div class="card-icon">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
               </div>
               <div class="card-body">
                  <h5 class="card-title"><a href=""><?= $cv['course_name'] ?></a></h5>
                  <?= $cv['course_desc'] ?>
               </div>
               <ul>
                  <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i><?= $cv['course_years'] ?></li>
                  <li> <i class="fa fa-hand-o-right" aria-hidden="true"></i><?= $cv['course_seasons'] ?></li>
                  <!-- <li>₹ 98,000</li> -->
               </ul>
               <button type="button" class="btn readmore1">  <a href="<?= base_url().'index.php/academics' ?>">  Readmore</button></a>   
            </div>
         </div>
		<?php } ?>
         
      </div>
   </div>
</section>
<!-- End  courses Section -->
<section class="gallery-index">
   <div class="container gallery-container">
      <div class="gallery-box">
         <div class="section-titlecourses">
            <h2>Student Art Gallery</h2>
         </div>
         <div class="row">
			<?php
				$i=1;
				foreach($art_gallery as $agk=>$agv){
			?>
            <div class="col-sm-6 col-md-4">
               <a class="lightbox" href="#">
               <img src="<?=base_url().'assets/custom/art_gallery/'.$agv['art_icon_url'] ?>" alt="Park">
               </a>
            </div>
			<?php 
				if($i == 6){break;}
				$i++;
				}
			?>
         </div>
         <div class="seemorebutton text-center" >
            <a href="<?= base_url().'index.php/showcase' ?>" ><button type="button" class="btn  ">See more</button></a>
         </div>
      </div>
   </div>
</section>
<section class="indexevents">
   <div class="container  eventsindex ">
      <div class="section-titleevents mb-2">
         <h2>EVENTS</h2>
      </div>
      <div class="row ">
		<?php
				$ei=1;
				foreach($events as $ek=>$ev){
			?>
         <div class="col-lg-4">
            <figure class="rounded p-3 bg-white shadow-sm">
               <img src="<?=base_url().'assets/custom/events/'.$ev['e_image_url'] ?>" alt="" class="w-100 card-img-top">
               <figcaption class="p-4 card-img-bottom">
                  <h2 class="h6 font-weight-bold mb-2 "><?= $ev['e_name'] ?></h2>
                  <p class="mb-0 text-small  "><?= substr($ev['e_desc'],0,159) ?>...</p>
               </figcaption>
            </figure>
         </div>
		 <?php 
				if($ei == 6){break;}
				$ei++;
				}
			?>
      </div>
      <div class="seemorebutton text-center" >
         <a href="<?= base_url().'index.php/events' ?>"><button type="button" class="btn  ">See more</button></a> 
      </div>
   </div>
</section>
<section id="video-gallery">
   <div class="container">
      <div class="heading"><span>Video Gallery</span></div>
      <div class="video-list">
         <div class="row">
			<?php
				$avi=1;
				foreach($animation_videos as $avk=>$avv){
			?>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-2" id="video-gallery">
               <div class="embed-responsive embed-responsive-16by9">
                 <video width="560" height="315" controls>
										  <source src="<?= base_url()?>assets/custom/animation_videos/<?= $avv['video_url'] ?>">
										  Your browser does not support the video tag.
										  </video>
			   </div>
            </div>
			<?php 
				if($avi == 6){break;}
				$avi++;
				}
			?>
         </div>
      </div>
      <div class="seemorebutton text-center" >
         <a href="showcase.html"><button type="button" class="btn">See more</button></a>
      </div>
   </div>
   </div>
</section>
<!-- ------------------------------------reviews------------------------------- -->
<section class="reviews">
   <div class="container mt-5" style="">
      <div class="heading"><span>testimonials</span></div>
      <div class="row">
         <div class="col-md-8 offset-md-2 col-10 offset-1 mt-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active "></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner mt-4">
				<?php
					$ti = 0;
					foreach($testimonials as $tk=>$tv){
				?>
                  <div class="carousel-item text-center <?= ($ti==0)?'active':'' ?>">
                     <div class="img-box p-1 border rounded-circle m-auto">
                        <img class="d-block w-100 rounded-circle" src="<?=base_url()?>assets/images/re.png" alt="First slide">
                     </div>
                     <h5 class="mt-4 mb-0"><strong class=" name text-uppercase"><?= $tv['name'] ?></strong></h5>
                     <h6 class="text-dark m-0"><?= $tv['country'] ?></h6>
                     <p class="m-0 pt-3 text-black"><?= $tv['description'] ?></p>
                  </div>
				<?php $ti++;} ?>
               </div>
               <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<br><br>
<section id="companies" class="section-bg">
   <div class="heading"><span>Get job Offers</span></div>
   <div class="container">
      <!--   <div class="section-header ">
         <h3>Get job Offers</h3>
         
         </div> -->
      <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="<?=base_url()?>assets/images/companies/company1.png" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="<?=base_url()?>assets/images/companies/company2.jpg" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="<?=base_url()?>assets/images/companies/company3.jpg" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="<?=base_url()?>assets/images/companies/company1.png" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="<?=base_url()?>assets/images/companies/company2.jpg" class="img-fluid" alt="">  </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">  <img src="<?=base_url()?>assets/images/companies/company3.jpg" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1559460418/client-7.png" class="img-fluid" alt=""> </div>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">  <img src="<?=base_url()?>assets/images/companies/company3.jpg" class="img-fluid" alt=""></div>
         </div>
      </div>
   </div>
</section>
<section class="collge-life  mt-3 text-center mb-3">
   <div class="collegelifeheading">
      <h2>Life Of Banglore Animation College</h2>
   </div>
</section>
<section class="indexbannervideo">
   <div class="overlay"></div>
   <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="<?=base_url()?>assets/video/video.mp4" type="video/mp4">
   </video>
   <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
      </div>
   </div>
</section>
<br><br>
<?php $this->view('footer'); ?>
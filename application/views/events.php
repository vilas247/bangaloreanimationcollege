<?php $this->view('header'); ?>
<section id="hero" class="d-flex align-items-center  ">
    <div class="container text-center position-relative" >
      <h1>EVENTS</h1>
      <!-- <h2> Best Animation College in India and Thousands of student and professionals</h2> -->
      <a href="" class="btn-get-started scrollto">Enquire now</a>
    </div>
  </section><!-- End Hero -->

    <!-- ======= up coming ======= -->
    <section id="upcoming" class="upcoming upcoming-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="upcomingsection-title" data-aos="fade-right">
              <h2>Up Comingevets</h2>
              <p>Join the events we are going to organize</p>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="owl-carousel upcoming-carousel">
			<?php
				foreach($upcoming_events as $uek=>$uev){
			?>
              <div class="upcomingevents">
               <h5><?= $uev['e_name'] ?></h5>
                <p>
                 <i class="fa fa-quote-left" aria-hidden="true"></i>
                 <?= $uev['e_desc'] ?>
                  <i class="fa fa-quote-right" aria-hidden="true"></i>
                </p>
                <img src="<?=base_url().'assets/custom/events/'.$uev['e_image_url'] ?>" class="events-img" alt="">
               
              </div>
			<?php } ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End upcoming Section -->

 <section id="events" class="events">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
		<?php
				foreach($events as $ek=>$ev){
			?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="singleevent">
              <div class="singleevent-img">
                <img src="<?=base_url().'assets/custom/events/'.$ev['e_image_url'] ?>" class="img-fluid" alt="">
              
              </div>
              <div class="singleevent-info">
                <h4><?= $ev['e_name'] ?></h4>
               
              <p><?= $ev['e_desc'] ?></p>
              </div>
            </div>
          </div>
		<?php } ?>
           
        </div>
      </div>

    </section><!-- End Team Section -->
<?php $this->view('footer'); ?>
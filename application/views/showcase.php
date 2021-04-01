<?php $this->view('header'); ?>
<!-- ------------------------------------------showcase-banner------------------------------ -->
<section id="showcase-banner">
   <div class="container ">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>SHOWCASE</h3>
         </div>
      </div>
   </div>
</section>
<!-- --------------------------------Students gallery--------------------------- -->
<section id="showcase">
   <div class="container-flex">
      <h1 class="galley-head"><span>Digital Painting and Drawing</span></h1>
      <div class="gallery">
         <ul class="students-gallery">
            <?php
               $i=0;
               $ii=1;
               foreach($digital_paintings as $k=>$v){
               	if($i == 5){
               		echo '</ul><ul class="students-gallery">';
               		$i=0;
               		$ii++;
               	}
               ?>
            <li class="gallery-<?= $ii ?>">
               <img src="<?=base_url().'assets/custom/digital_paintings/'.$v['dp_image_url'] ?>" alt="Painting">
               <div class="course-name">
                  <h4>jyoshnapriya</h4>
                  <h5>Junior Diploma</h5>
               </div>
            </li>
            <?php $i++;} ?>
         </ul>
      </div>
   </div>
</section>
<!-- ----------------------------------video-gallery----------------------------- -->
<section id="video-gallery">
   <div class="container">
      <div class="heading"><span>Video Gallery</span></div>
      <div class="video-list">
         <div class="row">
			<?php
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
			<?php } ?>
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
<!-- -----------------------------------students work------------------------- -->
<section id="show" class="show-about">
   <div class="show-head">
      <h2>Showcase</h2>
   </div>
   <div class="row ">
	<?php
		$ag=0;
		foreach($art_gallery as $agk=>$agv){
			if($ag == 4){
               	echo '</div><div class="row ">';
               	$i=0;
            }
	?>
      <div class="col-lg-3 col-md-6 ">
         <div class="showcase-1">
            <div class="showcase-img">
			   <img src="<?=base_url().'assets/custom/art_gallery/'.$agv['art_icon_url'] ?>" class="img-fluid" alt="Park">
            </div>
         </div>
      </div>
	<?php } ?>
   </div>
</section>
<?php $this->view('footer'); ?>
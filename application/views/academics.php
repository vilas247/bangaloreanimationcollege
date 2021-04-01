<?php $this->view('header'); ?>

<section id="academics">
	<div class="container ">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3>Academics</h3>
				
			</div>
		</div>
	</div>
	
</section>

<section class="course-types">
	<h4>Course Types</h4>
	<?php
		foreach($courses as $k=>$v){
	?>
	<div class="container-flex academy-cont">
		
		<div class="card course-card" data-tilt>
			<div class="course-image">
			<img src="<?=base_url().'assets/custom/courses/'.$v['course_image']?>" alt="Diploma" title="Diploma" class="card-img-top">
		</div>
		<div class="content">
			<h5><?= $v['course_name'] ?></h5>
			<a href="#vfx<?= $v['course_id'] ?>" onclick="opensection(event, 'vfx<?= $v['course_id'] ?>')"><button   class="btn btn-outline read-more more1"  >Read More</button></a>
			
		</div>

	</div>
	<?php } ?>
</section>
<!------------Course-details- Vfx Course--------------->
<?php
	foreach($courses as $k=>$v){
?>
<section class="vfx-course know" id="vfx<?= $v['course_id'] ?>">
	<section class="course-back course-back " >
	</section>
	<div class="container">
		<div class="vfx-course-main">
				<h3><?= $v['course_name'] ?></h3>

				<?= $v['course_desc'] ?>
				<a href="<?=base_url()?>index.php/app-form"><button class="btn btn-outline apply-now-btn">Apply Now</button></a>

				
		</div>

		<div class="course-outline">
			<h4>Course Outline</h4>
			<p>Below are the course breakdown for Animation VFX & Gaming program.</p>
			<div class="row d-flex flex-wrap">
				<div class="col-lg-3 col-md-3 col-6 ">
					<div class="course-box">
						<h6>Module 1</h6>
						<hr>
						<ul>
							<li>Basic Line</li>
							<li>Life Study</li>
							<li>Head Study</li>
							<li>Art of Posing</li>
							<li>Drawing for Animation</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-6">
					<div class="course-box">
						<h6>Module 2</h6>
						<hr>
						<ul>
							<li>Basic Line</li>
							<li>Life Study</li>
							<li>Head Study</li>
							<li>Art of Posing</li>
							<li>Drawing for Animation</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-6">
					<div class="course-box">
						<h6>Module 3</h6>
						<hr>
						<ul>
							<li>Basic Line</li>
							<li>Life Study</li>
							<li>Head Study</li>
							<li>Art of Posing</li>
							<li>Drawing for Animation</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-6">
					<div class="course-box">
						<h6>Module 4</h6>
						<hr>
						<ul>
							<li>Basic Line</li>
							<li>Life Study</li>
							<li>Head Study</li>
							<li>Art of Posing</li>
							<li>Drawing for Animation</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-6">
					<div class="course-box">
						<h6>Module 5</h6>
						<hr>
						<ul>
							<li>Basic Line</li>
							<li>Life Study</li>
							<li>Head Study</li>
							<li>Art of Posing</li>
							<li>Drawing for Animation</li>
						</ul>
					</div>
				</div>


			</div>

		</div>
	</div>
</section>
	<?php } ?>
<?php $this->view('footer'); ?>
<script >
 function opensection(evt, secName) {
  var i, know, more1;
  know= document.getElementsByClassName("know");
  for (i = 0; i < know.length; i++) {
    know[i].style.display = "none";
  }
  more1 = document.getElementsByClassName("more1");
  for (i = 0; i < more1.length; i++) {
    more1[i].className = more1[i].className.replace(" active", "");
  }
  document.getElementById(secName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$currentURL = current_url();
$dashboard_active = '';
$cms_active = '';
$about_active = '';
$academics_active = '';
$showcase_active = '';
$events_active = '';
$forms_active = '';

if(strpos($currentURL,"banner_videos") != '' || strpos($currentURL,"award_icons") != '' || strpos($currentURL,"about") != '' || strpos($currentURL,"testimonials") != ''){
	$cms_active = 'active';
}else if(strpos($currentURL,"award_photos") != ''){
	$about_active = 'active';
}else if(strpos($currentURL,"courses") != ''){
	$academics_active = 'active';
}else if(strpos($currentURL,"digital_paintings") != '' || strpos($currentURL,"animation_videos") != '' || strpos($currentURL,"art_gallery") != ''){
	$showcase_active = 'active';
}else if(strpos($currentURL,"events") != ''){
	$events_active = 'active';
}else if(strpos($currentURL,"enquiry_form") != '' || strpos($currentURL,"app_form") != ''){
	$forms_active = 'active';
}else{
	$dashboard_active = 'active';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link href="<?= base_url() ?>resources/images/fevicon.png" rel="icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>BEST ANIMATION INSTITUTE IN BANGALORE   |    BANGALORE ANIMATION COLLEGE</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url()?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?=base_url()?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>resources/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item <?= $dashboard_active ?>">
                    <a class="nav-link" href="<?=base_url()?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
				<li class="nav-item <?= $cms_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1"><i class="fa fa-cogs"></i> CMS</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents1">
                        <li>
                            <a href="<?=base_url()?>index.php/general/banner_videos">Banner Video</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/general/award_icons">Award Icons</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/about">About College</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/testimonials">Testimonials</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item <?= $about_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2"><i class="fa fa-fw fa-laptop"></i> About</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents2">
						<li>
                            <a href="<?=base_url()?>index.php/general/award_photos">Award Photos</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item <?= $academics_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3"><i class="fa fa-book"></i> Academics</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents3">
						<li>
                            <a href="<?=base_url()?>index.php/general/courses">Our Courses</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item <?= $showcase_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4"><i class="fa fa-camera"></i> Showcase</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents4">
						<li>
                            <a href="<?=base_url()?>index.php/general/digital_paintings">Digital Paintings</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/animation_videos">Animation Videos</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/art_gallery">Student Art Gallery</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item <?= $events_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5"><i class="fa fa-calendar"></i> Events</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents5">
						<li>
                            <a href="<?=base_url()?>index.php/general/events">Completed Events</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/upcoming_events">Upcoming Events</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item <?= $forms_active ?>">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents6"><i class="fa fa-user"></i> Forms</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents6">
						<li>
                            <a href="<?=base_url()?>index.php/general/enquiry_form">Enquiry Forms</a>
                        </li>
						<li>
                            <a href="<?=base_url()?>index.php/general/app_form">App Forms</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item" style="display:none;">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i class="fa fa-fw fa-wrench"></i> Users</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="<?=base_url()?>index.php/settings/admins">Admins</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/settings/groups">Admin Groups</a>
                        </li> 
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>index.php/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title><?php config('app', 'name') ?> - <?php config('app', 'tagline') ?></title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php asset('css/style.css') ?>">
<link rel="stylesheet" href="<?php asset('css/colors/green.css') ?>" id="colors">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header>
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="<?php url('/') ?>"><img src="<?php asset('images/logo.png') ?>"></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

                <li><a href="<?php url('/') ?>" id="current">Home</a></li>
                <li><a href="#">Jobseekers</a>
                    <ul>
                        <li><a href="<?php url('/job/jobs') ?>">Job Page</a></li>
                        <li><a href="<?php url('/job/browse-jobs') ?>">Browse Jobs</a></li>
                        <li><a href="<?php url('/job/browse-categories') ?>">Browse Categories</a></li>
                    </ul>
                </li>
                <li><a href="#">Employers</a>
                    <ul>
                        <li><a href="<?php url('/job/add-jobs') ?>">Add Job</a></li>
                        <li><a href="<?php url('/job/manage-jobs') ?>">Manage Jobs</a></li>
                        <li><a href="<?php url('/job/manage-applications') ?>">Manage Applications</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
            </ul>

            <ul class="float-right">
                <?php if(!isset($_SESSION['user'])) : ?>
                    <li><a href="<?php url('login') ?>"><i class="fa fa-user"></i> Sign Up</a></li>
                    <li><a href="<?php url('register') ?>"><i class="fa fa-lock"></i> Log In</a></li>
                <?php else: ?>
                    <li><a href="#"><i class="fa fa-user"></i> Administrator</a>
                        <ul>
                            <li><a href="<?php url('/job/add-jobs') ?>">Dashboard</a></li>
                            <li><a href="<?php url('/job/manage-jobs') ?>">My Profile</a></li>
                            <li><a href="<?php url('/job/manage-applications') ?>">My Resume</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>
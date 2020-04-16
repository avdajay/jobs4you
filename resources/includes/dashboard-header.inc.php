<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title><?php echo config('app', 'name') ?> - <?php echo config('app', 'tagline') ?></title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php asset('css/style.css') ?>">
<link rel="stylesheet" href="<?php asset('css/colors.css') ?>">

</head>
<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="dashboard-header">
<div class="container">
<div class="sixteen columns">

    <!-- Logo -->
    <div id="logo">
        <h1><a href="<?php url('/') ?>"><img src="<?php echo $path = $_SERVER['REQUEST_URI'] == '/' ? asset('images/logo2.png') : asset('images/logo.png') ?>" alt="Jobs4You"></a></h1>
    </div>

    <!-- Menu -->
    <nav id="navigation" class="menu">
        <ul id="responsive">

            <li><a href="<?php url('/') ?>">Home</a></li>
            <li><a href="#">Jobseekers</a>
                <ul>
                    <li><a href="<?php url('/browse-jobs') ?>">Browse Jobs</a></li>
                    <li><a href="<?php url('/browse-locations') ?>">Browse Locations</a></li>
                </ul>
            </li>

            <li><a href="#">Employeers</a>
                <ul>
                    <li><a href="<?php url('/resume') ?>">Browse Resumes</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Navigation -->
    <div id="mobile-navigation">
        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
    </div>

</div>
</div>
</header>
<div class="clearfix"></div>
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
<header class="<?php echo $path = $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index' ? 'transparent sticky-header' : 'sticky-header' ?>">
<div class="container">
<div class="sixteen columns">

    <!-- Logo -->
    <div id="logo">
        <h1><a href="<?php url('/') ?>"><img src="<?php echo $path = $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index' ? asset('images/logo2.png') : asset('images/logo.png') ?>" alt="Jobs4You"></a></h1>
    </div>

    <!-- Menu -->
    <nav id="navigation" class="menu">
        <ul id="responsive">

            <li><a href="<?php url('/') ?>">Home</a></li>
            <li><a href="#">Jobseekers</a>
                <ul>
                    <li><a href="<?php url('/job') ?>">Browse Jobs</a></li>
                    <li><a href="<?php url('/browse-categories') ?>">Browse Categories</a></li>
                </ul>
            </li>

            <li><a href="#">Employeers</a>
                <ul>
                    <li><a href="<?php url('/resume') ?>">Browse Resumes</a></li>
                </ul>
            </li>
        </ul>

        <?php if (isset($_SESSION['uid'])): ?>
            <?php if ($_SESSION['uid'] == 1): ?>
            <ul class="float-right"> 
                <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a>
                    <ul>
                        <li><a href="<?php url('/main') ?>">Dashboard</a></li>
                        <li><a href="<?php url('/messages') ?>">Messages</a></li>
                        <li><a href="<?php url('/manage-resume') ?>">Manage Resumes</a></li>
                        <li><a href="<?php url('/add-resume') ?>">Add Resume</a></li>
                        <li><a href="<?php url('/profile') ?>">My Profile</a></li>
                        <li><a href="<?php url('/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php else: ?>
            <ul class="float-right"> 
                <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a>
                    <ul>
                        <li><a href="<?php url('/main') ?>">Dashboard</a></li>
                        <li><a href="<?php url('/messages') ?>">Messages</a></li>
                        <li><a href="<?php url('/manage-jobs') ?>">Manage Jobs</a></li>
                        <li><a href="<?php url('/manage-applications') ?>">Manage Applications</a></li>
                        <li><a href="<?php url('/add-job') ?>">Add Job</a></li>
                        <li><a href="<?php url('/profile') ?>">My Profile</a></li>
                        <li><a href="<?php url('/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>
        <?php else: ?>
            <ul class="float-right">
                <li><a href="<?php url('/register') ?>"><i class="fa fa-user"></i> Sign Up</a></li>
                <li><a href="<?php url('/login') ?>"><i class="fa fa-lock"></i> Log In</a></li>
            </ul>
        <?php endif; ?>

    </nav>

    <!-- Navigation -->
    <div id="mobile-navigation">
        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
    </div>

</div>
</div>
</header>
<div class="clearfix"></div>
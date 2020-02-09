<?php the_dashhead() ?>

<!-- Titlebar
================================================== -->

<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Start">
				<li class="active"><a href="<?php url('/main') ?>">Dashboard</a></li>
				<li><a href="dashboard-messages.html">Messages <span class="nav-tag">2</span></a></li>
			</ul>

			<ul data-submenu-title="Management">
				<li><a>For Employers</a>
					<ul>
						<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">5</span></a></li>
						<li><a href="dashboard-manage-applications.html">Manage Applications <span class="nav-tag">4</span></a></li>
						<li><a href="dashboard-add-job.html">Add Job</a></li>
					</ul>
				</li>

				<li><a>For Candidates</a>
					<ul>
						<li><a href="dashboard-manage-resumes.html">Manage Resumes <span class="nav-tag">2</span></a></li>
						<li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
						<li><a href="dashboard-add-resume.html">Add Resume</a></li>
					</ul>
				</li>	
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="dashboard-my-profile.html">My Profile</a></li>
				<li><a href="index.html">Logout</a></li>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Howdy, Tom!</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4 class="counter">3</h4> <span>Active Job Listings</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
				</div>
			</div>

				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4 class="counter">527</h4> <span>Total Job Views</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
				</div>
			</div>


				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4 class="counter">17</h4> <span>Total Applications</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
				</div>
			</div>


			<!-- Item -->
				<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4 class="counter">36</h4> <span>Times Bookmarked</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
				</div>
			</div>

		</div>


		<div class="row">
			
			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-20">
					<h4>Recent Activities</h4>
					<ul>
						<li>
							Your listing <strong><a href="#">Marketing Coordinator - SEO / SEM Experience </a></strong> has been approved!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							Kathy Brown has sent you <strong><a href="#">private message</a></strong>!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							Someone bookmarked your <strong><a href="#">Restaurant Team Member - Crew</a></strong>!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							You have new application for <strong><a href="#">Power Systems User Experience Designer</a></strong>!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							Someone bookmarked your <strong><a href="#">Core PHP Developer for Site Maintenance  </a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
						<li>
							Your job listing <strong><a href="#">Core PHP Developer for Site Maintenance  </a></strong> is expiring!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>


			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Your Packages</h4>
					<ul class="dashboard-packages">
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Basic</strong>
							<span>You have 2 listings posted</span>
						</li>
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Extended</strong>
							<span>You have 2 listings posted</span>
						</li>
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Professional</strong>
							<span>You have 5 listings posted</span>
						</li>
					</ul>
				</div>
			</div>

<?php the_dashfoot() ?>
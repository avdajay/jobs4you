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
				<li><a href="<?php url('/messages') ?>">Messages</a></li>
			</ul>

			<ul data-submenu-title="Management">
				<?php if(isset($_SESSION['rid']) && $_SESSION['rid'] == 1): ?>
					<li><a>For Candidates</a>
						<ul>
							<li><a href="<?php url('/manage-resume') ?>">Manage Resumes</a></li>
							<li><a href="<?php url('/add-resume') ?>">Add Resume</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li><a>For Employers</a>
						<ul>
							<li><a href="<?php url('/manage-jobs') ?>">Manage Jobs</a></li>
							<li><a href="<?php url('/manage-applications') ?>">Manage Applications</a></li>
							<li><a href="<?php url('/add-jobs') ?>">Add Job</a></li>
						</ul>
					</li>
				<?php endif; ?>	
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="<?php url('/profile') ?>">My Profile</a></li>
				<li><a href="<?php url('/logout') ?>">Logout</a></li>
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
				<?php if (!empty($_SESSION['success'])): ?>
					<?php foreach ($_SESSION['success'] as $success): ?>
						<div class="notification success closeable">
							<p><span><?php echo 'Success! '?></span><?php echo $success['success']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
					<h2>Welcome back!</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<!-- Content -->
		<div class="row">
			<?php if($_SESSION['rid'] == 1): ?>
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['resume'])) ?></h4> <span>Resume on File</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
				</div>
			</div>

				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['exposure'])) ?></h4> <span>Company Exposure</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
				</div>
			</div>


				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['applications'])) ?></h4> <span>Active Job Applications</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
				</div>
			</div>


			<!-- Item -->
				<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['bookmarks'])) ?></h4> <span>Times Resumes Bookmarked</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
				</div>
			</div>
			<?php else: ?>
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['jobs'])) ?></h4> <span>Active Job Listing</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
				</div>
			</div>

				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e($data['totalCount']) ?></h4> <span>Total Job Applications</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
				</div>
			</div>


				<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4 class="counter"><?php echo isset($data['count']) ? count($data['count']) : 0 ?></h4> <span>Jobs with Applications</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
				</div>
			</div>


			<!-- Item -->
				<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4 class="counter"><?php e(count($data['bookmarksEmployer'])) ?></h4> <span>Resumes Bookmarked</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-20">
					<h4>List of Bookmarked Resumes</h4>
					<ul>
						<?php if (count($data['bookmarksList']) > 0): ?>
						<?php foreach($data['bookmarksList'] as $bookmarks): ?>
						<li>
							<?php e($bookmarks['name']) ?> <strong><a href="<?php url('/resume?id=' . $bookmarks['id']) ?>"><?php e($bookmarks['title']) ?></a></strong>
						</li>
						<?php endforeach; ?>
						<?php else: ?>
						<li>
							<h5>No records found. Try bookmarking a resume.</h5>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>

			<!-- Recent Activity -->
			<!-- <div class="col-lg-6 col-md-12">
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
			</div> -->

<?php the_dashfoot() ?>
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
				<li><a href="<?php url('/main') ?>">Dashboard</a></li>
				<li><a href="<?php url('/messages') ?>">Messages</a></li>
			</ul>

			<ul data-submenu-title="Management">
				<?php if(isset($_SESSION['rid']) && $_SESSION['rid'] == 1): ?>
					<li class="active-submenu"><a>For Candidates</a>
						<ul>
							<li><a href="<?php url('/manage-resume') ?>">Manage Resumes</a></li>
							<li><a href="<?php url('add-resume') ?>">Add Resume</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="active-submenu"><a>For Employers</a>
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
					<h2>Manage Jobs</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Manage Jobs</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<?php if (!empty($_SESSION['success'])): ?>
				<?php foreach ($_SESSION['success'] as $success): ?>
					<div class="notification success closeable">
						<p><?php echo $success['success']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php if (!empty($_SESSION['error'])): ?>
				<?php foreach ($_SESSION['error'] as $error): ?>
					<div class="notification danger closeable">
						<p><?php echo $error['error']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				<div class="notification notice">
					Your listings are shown in the table below. Expired listings will be archived and removed after 7 days.
				</div>

				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->

						<table class="manage-table responsive-table">

							<tr>
								<th><i class="fa fa-file-text"></i> Title</th>
								<th><i class="fa fa-check-square-o"></i> Filled?</th>
								<th><i class="fa fa-calendar"></i> Date Posted</th>
								<th><i class="fa fa-calendar"></i> Date Expires</th>
								<th><i class="fa fa-user"></i> Applications</th>
								<th><i class="fa fa-cog"></i> Actions</th>
							</tr>
									
							<!-- Item -->
							<?php //print("<pre>".print_r($data,true)."</pre>"); die(); ?>
							<?php foreach($data['jobs'] as $job): ?>
							<tr>
								<td class="title"><a href="<?php url('/job') . e('?id='.$job['id']) ?>"><?php e($job['job_title']) ?></a></td>
								<td class="centered"><?php echo (empty($job['filled_at'])) ? '-' : '<i class="fa  fa-check">' ?></td>
								<td><?php e(Carbon\Carbon::parse($job['created_at'])->toFormattedDateString()) ?></td>
								<td><?php e(Carbon\Carbon::parse($job['expired_at'])->toFormattedDateString()) ?></td>
								<td class="centered"><?php echo (empty($job['applications'])) ? '-' : '<a href="/manage-applications?job='.$job['id'].'"class="button">Show ('.$job['applications'].')</a>'; ?></td>
								<td class="action">
									<a href="<?php url('/job?id=' . $job['id']) ?>"><i class="fa fa-eye"></i> View</a>
									<a href="<?php url('/manage-jobs?edit=' . $job['id']) ?>"><i class="fa fa-pencil"></i> Edit</a>
									<?php if (!isset($job['filled_at'])): ?>
									<a href="#" onclick="event.preventDefault(); document.getElementById('filled<?php e($job['id']); ?>').submit();"><i class="fa fa-check"></i> Mark Filled</a>
									<?php endif; ?>
									<form id="filled<?php e($job['id']) ?>" method="POST" action="<?php url('/manage-jobs') ?>">
  										<input type="hidden" name="filled" value="<?php e($job['id']) ?>">
									</form>
								</td>
							</tr>
							<?php endforeach; ?>

						</table>

					</div>
				</div>
				<a href="<?php url('/add-jobs') ?>" class="button margin-top-30">Add New Listing</a>
			</div>

<?php the_dashfoot() ?>
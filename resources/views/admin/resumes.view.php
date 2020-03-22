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
				<li><a href="<?php url('/admin') ?>">Dashboard</a></li>
				<li><a href="<?php url('/admin/messages') ?>">Messages</a></li>
			</ul>

			<ul data-submenu-title="Management">
                <li class="active-submenu"><a>For Administrator</a>
                    <ul>
                        <li><a href="<?php url('/admin/users') ?>">Manage Users</a></li>
                        <li><a href="<?php url('/admin/resumes') ?>">Manage Resumes</a></li>
                        <li><a href="<?php url('/admin/jobs') ?>">Manage Jobs</a></li>
                    </ul>
                </li>
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="<?php url('/admin/profile') ?>">My Profile</a></li>
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
					<h2>Manage Resumes</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/admin') ?>">Home</a></li>
							<li><a href="<?php url('/admin') ?>">Dashboard</a></li>
							<li>Manage Resumes</li>
						</ul>
					</nav>
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
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="notification notice">
					See all submitted resumes.
				</div>
				<div class="dashboard-list-box margin-top-5">
					<div class="dashboard-list-box-content">
    
						<!-- Table -->
							<table class="manage-table resumes responsive-table">

								<tr>
									<th><i class="fa fa-user"></i> Name</th>
									<th><i class="fa fa-file-text"></i> Title</th>
									<th><i class="fa fa-map-marker"></i> Location</th>
									<th><i class="fa fa-calendar"></i> Date Posted</th>
									<th><i class="fa fa-cog"></i> Actions</th>
								</tr>

								<?php foreach ($data['resume'] as $resume): ?>
								<tr>
									<td class="title"><a href="<?php url('/resume') . e('?id='.$resume['id']) ?>"><?php e($resume['name']) ?></a></td>
									<td><?php e($resume['title']) ?></td>
									<td><?php e($resume['lname']) ?></td>
									<td><?php e($resume['created_at']) ?></td>
									<td class="action">
										<a href="<?php url('/resume') . e('?id='.$resume['id']) ?>"><i class="fa  fa-eye"></i> View</a>
									</td>
								</tr>
								<?php endforeach; ?>

							</table>
					</div>	
				</div>
				<p class="note margin-top-30">Accounts violated our Terms of Service (TOS) should have their accounts suspended.</p>
			</div>

<?php the_dashfoot() ?>
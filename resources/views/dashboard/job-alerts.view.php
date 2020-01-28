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
				<li><a href="dashboard.html">Dashboard</a></li>
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

				<li class="active-submenu"><a>For Candidates</a>
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
					<h2>Job Alerts</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Job Alerts</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<div class="dashboard-list-box-content">

						<!-- Table -->
						<table class="manage-table resumes responsive-table">

							<tr>
								<th><i class="fa fa-file-text"></i> Alert Name</th>
								<th><i class="fa fa-calendar"></i> Date Created</th>
								<th><i class="fa fa-tags"></i> Keywords</th>
								<th><i class="fa fa-map-marker"></i> Location</th>
								<th><i class="fa fa-clock-o"></i> Frequency</th>
								<th><i class="fa fa-check-square-o"></i> Status</th>
								<th></th>
							</tr>

							<!-- Item #1 -->
							<tr>
								<td class="alert-name">Web Dev Job</td>
								<td>September 30, 2019</td>
								<td class="keywords">Web Developer, PHP, HTML</td>
								<td>London</td>
								<td>Daily</td>
								<td>Enabled</td>
								<td class="action">
									<a href="#"><i class="fa fa-check-circle-o"></i> Show Results</a>
									<a href="#"><i class="fa fa-envelope"></i> Email</a>
									<a href="#"><i class="fa fa-pencil"></i> Edit</a>
									<a href="#"><i class="fa  fa-eye-slash"></i> Disable</a>
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>

							<!-- Item #2 -->
							<tr>
								<td class="alert-name">Q&A Testing</td>
								<td>September 30, 2019</td>
								<td class="keywords">Q&A, testing, mobile applications tests</td>
								<td>London</td>
								<td>Daily</td>
								<td>Enabled</td>
								<td class="action">
									<a href="#"><i class="fa fa-check-circle-o"></i> Show Results</a>
									<a href="#"><i class="fa fa-envelope"></i> Email</a>
									<a href="#"><i class="fa fa-pencil"></i> Edit</a>
									<a href="#"><i class="fa  fa-eye-slash"></i> Disable</a>
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>
						</table>

					</div>
				</div>
				<a href="#" class="button margin-top-30">Add Alert</a>
			</div>

<?php the_dashfoot() ?>
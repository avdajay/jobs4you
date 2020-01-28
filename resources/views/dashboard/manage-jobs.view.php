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
				<li class="active-submenu"><a>For Employers</a>
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
					<h2>Manage Resumes</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Manage Resumes</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="notification notice">
					Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.
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
								<th></th>
							</tr>
									
							<!-- Item #1 -->
							<tr>
								<td class="title"><a href="#">Marketing Coordinator - SEO / SEM Experience <span class="pending">(Pending Approval)</span></a></td>
								<td class="centered">-</td>
								<td>September 30, 2015</td>
								<td>October 10, 2015</td>
								<td class="centered">-</td>
								<td class="action">
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>
									
							<!-- Item #2 -->
							<tr>
								<td class="title"><a href="#">Web Developer - Front End Web Development, Relational Databases</a></td>
								<td class="centered">-</td>
								<td>September 30, 2015</td>
								<td>October 10, 2015</td>
								<td class="centered"><a href="dashboard-manage-applications.html" class="button">Show (4)</a></td>
								<td class="action">
									<a href="#"><i class="fa fa-pencil"></i> Edit</a>
									<a href="#"><i class="fa  fa-check "></i> Mark Filled</a>
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>	

							<!-- Item #2 -->
							<tr>
								<td class="title"><a href="#">Power Systems User Experience Designer</a></td>
								<td class="centered"><i class="fa fa-check"></i></td>
								<td>May 16, 2015</td>
								<td>June 30, 2015</td>
								<td class="centered"><a href="dashboard-manage-applications.html" class="button">Show (9)</a></td>
								<td class="action">
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>

						</table>

					</div>
				</div>
				<a href="#" class="button margin-top-30">Add New Listing</a>
			</div>

<?php the_dashfoot() ?>
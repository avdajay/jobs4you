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
					<h2>Add Resume</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Resume</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<h4>Details</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5>Your Name</h5>
							<input class="search-field" type="text" placeholder="Your full name" value="">
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Your Email</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value="">
						</div>

						<!-- Title -->
						<div class="form">
							<h5>Professional Title</h5>
							<input class="search-field" type="text" placeholder="e.g. Web Developer" value="">
						</div>

						<!-- Location -->
						<div class="form">
							<h5>Location</h5>
							<input class="search-field" type="text" placeholder="e.g. London, UK" value="">
						</div>

						<!-- Logo -->
						<div class="form">
							<h5>Photo <span>(optional)</span></h5>
							<label class="upload-btn">
							    <input type="file" multiple="">
							    <i class="fa fa-upload"></i> Browse
							</label>
							<span class="fake-input">No file selected</span>
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Video <span>(optional)</span></h5>
							<input class="search-field" type="text" placeholder="A link to a video about you" value="">
						</div>

						<!-- Description -->
						<div class="form" style="width: 100%;">
							<h5>Resume Content</h5>
							<textarea class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
						</div>

					</div>

					</div>
				</div>


				<div class="dashboard-list-box margin-top-30">
					<h4>Education</h4>
					<div class="dashboard-list-box-content with-padding">

						<div class="form-inside">

							<!-- Add Education -->
							<div class="form boxed box-to-clone education-box">
								<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
								<input class="search-field" type="text" placeholder="School Name" value="">
								<input class="search-field" type="text" placeholder="Qualification(s)" value="">
								<input class="search-field" type="text" placeholder="Start / end date" value="">
								<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Notes (optional)"></textarea>
							</div>

							<a href="#" class="button gray add-education add-box margin-top-10"><i class="fa fa-plus-circle"></i> Add Education</a>
						</div>

					</div>
				</div>


				<div class="dashboard-list-box margin-top-30">
					<h4>Experience</h4>
					<div class="dashboard-list-box-content with-padding">
				<div class="form-inside">

					<!-- Add Experience -->
					<div class="form boxed box-to-clone experience-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<input class="search-field" type="text" placeholder="Employer" value="">
						<input class="search-field" type="text" placeholder="Job Title" value="">
						<input class="search-field" type="text" placeholder="Start / end date" value="">
						<textarea name="desc1" id="desc1" cols="30" rows="10" placeholder="Notes (optional)"></textarea>
					</div>

					<a href="#" class="button gray add-experience add-box margin-top-10"><i class="fa fa-plus-circle"></i> Add Experience</a>
				</div>


					</div>
				</div>


				<a href="#" class="button margin-top-30">Preview <i class="fa fa-arrow-circle-right"></i></a>

			</div>

<?php the_dashfoot() ?>
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
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Add Resume</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
<form method="POST" action="<?php url('/add-resume') ?>" enctype="multipart/form-data">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<h4>Details</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5>Your Name</h5>
							<input class="search-field" type="text" placeholder="Your full name" value="" name="name">
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Your Email</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value="" name="email">
						</div>

						<!-- Title -->
						<div class="form">
							<h5>Professional Title</h5>
							<input class="search-field" type="text" placeholder="e.g. Web Developer" value="" name="title">
						</div>

						<!-- Location -->
						<div class="form">
							<h5>Expected Salary</h5>
							<input class="search-field" type="text" placeholder="e.g. 14000" value="" name="salary">
						</div>

						<!-- Logo -->
						<div class="form">
							<h5>Photo <span>(optional)</span></h5>
							<label class="upload-btn">
							<input type="file" class="upload" id="upload" accept="image/*" onchange="document.getElementById('selected').textContent = this.files[0].name" name="photo">
							    <i class="fa fa-upload"></i> Browse
							</label>
							<span class="fake-input" id="selected">No file selected</span>
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Video <span>(optional)</span></h5>
							<input class="search-field" type="text" placeholder="A link to a video about you" value="" name="video">
						</div>

						<!-- Description -->
						<div class="form" style="width: 100%;">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" placeholder="Descriptive information on why are you qualified for the job or how will you contribute to the company or talk about your experiences and skills"></textarea>
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
                                <input class="search-field" type="text" placeholder="School Name" value="" name="school[]">
                                <select name="type[]" data-placeholder="School Type" id="type">
                                    <option value="0" selected>Choose Grade Type</option>		
                                    <option value="1">Primary</option>
                                    <option value="2">Secondary</option>
                                    <option value="3">College/University</option>
                                    <option value="4">Postgraduate</option>
                                </select>
                                <input class="search-field" type="text" placeholder="Course e.g. Bsc in Information Technology" value="" name="course[]">
                                <input class="search-field" type="text" placeholder="Major e.g. Computer Programming" value="" name="major[]">
                                <input class="search-field" type="text" placeholder="Start Year" value="" name="start[]">
                                <input class="search-field" type="text" placeholder="End Year" value="" name="end[]">
                                <textarea name="description[]" id="desc" cols="30" rows="10" placeholder="Summary of your achievements & activities"></textarea>
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
						<input class="search-field" type="text" placeholder="Employer/Company Name" value="" name="employer[]">
                        <input class="search-field" type="text" placeholder="Job Title/Position" value="" name="position[]">
                        <select name="level[]" data-placeholder="School Type" id="type">
                            <option value="0" selected>Choose Job Level</option>		
                            <option value="1">Part Time</option>
                            <option value="2">Full Time</option>
                            <option value="3">Freelance</option>
                            <option value="4">Internship/OJT</option>
                        </select>
                        <input class="search-field" type="text" placeholder="Start Date" value="" name="start_date[]">
                        <input class="search-field" type="text" placeholder="End Date" value="" name="end_date[]">
						<textarea name="summary[]" id="desc1" cols="30" rows="10" placeholder="Summary of Experience/Key Roles and Responsibilities"></textarea>
					</div>

					<a href="#" class="button gray add-experience add-box margin-top-10"><i class="fa fa-plus-circle"></i> Add Experience</a>
				</div>


					</div>
				</div>


				<button type="submit" class="button margin-top-30" name="save_resume">Save Resume <i class="fa fa-arrow-circle-right"></i></button>

			</div>
</form>
<?php the_dashfoot() ?>
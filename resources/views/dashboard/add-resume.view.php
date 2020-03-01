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
				<li><a href="<?php url('/messages') ?>">Messages <span class="nav-tag">2</span></a></li>
			</ul>

			<ul data-submenu-title="Management">
				<?php if(isset($_SESSION['rid']) && $_SESSION['rid'] == 1): ?>
					<li class="active-submenu"><a>For Candidates</a>
						<ul>
							<li><a href="<?php url('/manage-resume') ?>">Manage Resumes <span class="nav-tag">2</span></a></li>
							<li><a href="<?php url('add-resume') ?>">Add Resume</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li><a>For Employers</a>
						<ul>
							<li><a href="<?php url('/manage-jobs') ?>">Manage Jobs <span class="nav-tag">5</span></a></li>
							<li><a href="<?php url('/manage-applications') ?>">Manage Applications <span class="nav-tag">4</span></a></li>
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
					<h2>Add Resume</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Add Resume</li>
						</ul>
					</nav>
					<?php if (!empty($_SESSION['message'])): ?>
					<?php foreach ($_SESSION['message'] as $error): ?>
						<div class="notification error closeable">
							<p><?php echo $error['error']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="row">
<form method="POST" action="<?php url('/add-resume') ?>">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<h4>Details</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5>Your Name</h5>
							<input class="search-field" type="text" placeholder="Your full name" value="<?php e($data['user']['name']) ?>" name="name">
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Your Email</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value="<?php e($data['user']['email']) ?>" name="email">
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

						<!-- Description -->
						<div class="form" style="width: 100%;">
							<h5>Description</h5>
							<textarea name="desc" cols="40" rows="10" spellcheck="true" placeholder="Descriptive information on why are you qualified for the job or how will you contribute to the company or talk about your experiences and skills"></textarea>
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
                                <select name="type[]" id="type">	
                                    <option value="1" selected>Primary</option>
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
                            <option value="1" selected>Part Time</option>
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
                
                <div class="dashboard-list-box margin-top-30">
					<h4>Skills</h4>
					<div class="dashboard-list-box-content with-padding">

						<div class="form-inside">

							<!-- Add Skills -->
							<div class="form boxed box-to-clone education-box">
								<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                                <input class="search-field" type="text" placeholder="Skills e.g. PHP" value="" name="skill[]">
                                <select name="difficulty[]" id="type">	
                                    <option value="Beginner" selected>Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advance">Advance</option>
                                    <option value="Expert">Expert</option>
                                </select>
							</div>

							<a href="#" class="button gray add-education add-box margin-top-10"><i class="fa fa-plus-circle"></i> Add Skills</a>
						</div>

					</div>
				</div>


				<button type="submit" class="button margin-top-30" name="save_resume" value="save_resume">Save Resume <i class="fa fa-arrow-circle-right"></i></button>

			</div>
</form>
<?php the_dashfoot() ?>
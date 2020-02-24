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
					<h2>Add Job</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Add Job</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<h4>Job Details</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5>Your Email</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value="">
						</div>

						<!-- Title -->
						<div class="form">
							<h5>Job Title</h5>
							<input class="search-field" type="text" placeholder="e.g. Web Developer" value="">
						</div>

						<!-- Job Type -->
						<div class="form">
							<h5>Job Type</h5>
							<select data-placeholder="Full-Time" class="chosen-select-no-single">
								<option value="1">Full-Time</option>
								<option value="2">Part-Time</option>
								<option value="2">Internship</option>
								<option value="2">Freelance</option>
							</select>
						</div>


						<!-- Choose Category -->
						<div class="form">
							<div class="select">
								<h5>Category</h5>
								<select data-placeholder="Choose Categories" class="chosen-select" multiple="">
									<option value="1">Web Developers</option>
									<option value="2">Mobile Developers</option>
									<option value="3">Designers & Creatives</option>
									<option value="4">Writers</option>
									<option value="5">Virtual Assistants</option>
									<option value="6">Customer Service Agents</option>
									<option value="7">Sales & Marketing Experts</option>
									<option value="8">Accountants & Consultants</option>
								</select>
							</div>
						</div>


						<!-- Location -->
						<div class="form">
							<h5>Location <span>(optional)</span></h5>
							<input class="search-field" type="text" placeholder="e.g. London" value="">
							<p class="note">Leave this blank if the location is not important</p>
						</div>


						<!-- Tags -->
						<div class="form">
							<h5>Job Tags <span>(optional)</span></h5>
							<input class="search-field" type="text" placeholder="e.g. PHP, Social Media, Management" value="">
							<p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
						</div>


						<!-- Description -->
						<div class="form" style="width: 100%;">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
						</div>

						<!-- Application email/url -->
						<div class="form">
							<h5>Application email / URL</h5>
							<input type="text" placeholder="Enter an email address or website URL">
						</div>

						<!-- TClosing Date -->
						<div class="form">
							<h5>Closing Date <span>(optional)</span></h5>
							<input data-role="date" type="text" placeholder="yyyy-mm-dd">
							<p class="note">Deadline for new applicants.</p>
						</div>

					</div>

					</div>
				</div>

				<a href="#" class="button margin-top-50">Submit Job <i class="fa fa-arrow-circle-right"></i></a>
			</div>

<?php the_dashfoot() ?>
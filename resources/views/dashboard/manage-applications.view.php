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
					<h2>Manage Applications</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Manage Applications</li>
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
				<?php if (!empty($_SESSION['message'])): ?>
				<?php foreach ($_SESSION['message'] as $error): ?>
					<div class="notification error closeable">
						<p><?php echo $error['error']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php if (!isset($_GET['job'])): ?>
				<div class="notification warning">
					Please click Show button from a job on the <strong><a href="<?php url('/manage-jobs') ?>">Job Listing page</a></strong> to see current job applications.
				</div>
				<?php else: ?>
				<div class="notification notice closeable">
					The job applications for <strong><a href="<?php url('/job?id=' . $data['job']['id']) ?>" target="__blank"><?php e($data['job']['job_title']) ?></a></strong> are listed below.
					<a class="close" href="#"></a>
				</div>
				<?php endif; ?>
			</div>
		<?php if (isset($_GET['job']) && !empty($_GET['job'])): ?>
		<!-- <div class="col-md-6">
			<select data-placeholder="Filter by status" class="chosen-select-no-single">
				<option value="">Filter by status</option>
				<option value="new">New</option>
				<option value="interviewed">Interviewed</option>
				<option value="offer">Offer extended</option>
				<option value="hired">Hired</option>
				<option value="archived">Archived</option>
			</select>
			<div class="margin-bottom-15"></div>
		</div>

		<div class="col-md-6">
			<select data-placeholder="Newest first" class="chosen-select-no-single">
				<option value="">Newest first</option>
				<option value="name">Sort by name</option>
				<option value="rating">Sort by rating</option>
			</select>
			<div class="margin-bottom-35"></div>
		</div> -->


		<!-- Applications -->
		<div class="col-md-12">
			<?php foreach($data['applications'] as $application): ?>
			<div class="application">
				<div class="app-content">
					
					<!-- Name / Avatar -->
					<div class="info">
						<img src="<?php asset('uploads/'. $application['photo']) ?>" alt="Resume Profile Photo">
						<span><a href="<?php url('/resume?id=' . $application['resume_id']) ?>"><?php e($application['name']) ?></a></span>
						<ul>
							<li><a href="<?php url('/resume?id=' . $application['resume_id']) ?>" target="__blank"><i class="fa fa-file-text"></i> Preview CV</a></li>
							<li><a href="<?php url('/resume?id=' . $application['resume_id'] . '#small-dialog') ?>" target="__blank"><i class="fa fa-envelope"></i> Message</a></li>
							<li><a href="tel:<?php e($application['phone']) ?>"><i class="fa fa-phone"></i> Call</a></li>
						</ul>
					</div>
					
					<!-- Buttons -->
					<div class="buttons">
						<a href="#one-2" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
						<a href="#two-2" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
						<a href="#three-2" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
					</div>
					<div class="clearfix"></div>

				</div>

				<!--  Hidden Tabs -->
				<div class="app-tabs">

					<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
					
					<!-- First Tab -->
				    <div class="app-tab-content" id="one-2">
					<form action="<?php url('/manage-applications?job='. $application['job_id']) ?>" method="POST">
						<div class="select-grid">
							<select data-placeholder="Application Status" class="chosen-select-no-single" name="status">
								<option value="new">New</option>
								<option value="checking">Checking</option>
								<option value="interviewed">Interviewed</option>
								<option value="job offer">Job Offer</option>
								<option value="hired">Hired</option>
								<option value="declined">Declined</option>
							</select>
						</div>

						<div class="select-grid">
							<input type="number" min="1" max="5" placeholder="Rating (out of 5)" name="rating">
						</div>

						<div class="clearfix"></div>
						<input type="hidden" name="applicant" value="<?php e($application['name']) ?>">
						<input type="hidden" name="app_id" value="<?php e($application['id']) ?>">
						<input type="hidden" name="applicantID" value="<?php e($application['user_id']) ?>">
						<button type="submit" class="button margin-top-15" name="statusRating">Save</button>
					</form>
					</div>
					
				    <!-- Second Tab -->
				    <div class="app-tab-content" id="two-2">
						<form action="<?php url('/manage-applications?job='. $application['job_id']) ?>" method="POST">
							<input type="hidden" name="applicant" value="<?php e($application['name']) ?>">
							<input type="hidden" name="app_id" value="<?php e($application['id']) ?>">
							<textarea placeholder="Private note regarding this application" name="notes"><?php e($application['employer_notes']) ?></textarea>
							<button type="submit" class="button margin-top-15" name="saveNote">Save</button>
						</form>
				    </div>
				    
				    <!-- Third Tab -->
				    <div class="app-tab-content" id="three-2">
						<i>Full Name:</i>
						<span><?php e($application['name']) ?></span>

						<i>Email:</i>
						<span><a href="mailto:<?php e($application['email']) ?>"><?php e($application['email']) ?></a></span>

						<i>Message:</i>
						<span><?php e($application['message']) ?></span>
				    </div>

				</div>

				<!-- Footer -->
				<div class="app-footer">

					<div class="rating <?php e($application['rating']) ?>">
						<div class="star-rating"></div>
						<div class="star-bg"></div>
					</div>

					<ul>
						<li class="text-notice"><i class="fa fa-file-text-o"></i> <?php e(ucwords($application['status'])) ?></li>
						<li><i class="fa fa-calendar"></i> <?php e(Carbon\Carbon::parse($application['applied_at'])->toFormattedDateString()) ?></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>

<?php the_dashfoot() ?>
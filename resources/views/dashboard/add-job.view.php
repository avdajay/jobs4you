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
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="dashboard-list-box margin-top-0">
					<h4>Job Details</h4>
					<div class="dashboard-list-box-content">

<form method="POST" action="<?php url('/add-job') ?>">

					<div class="submit-page">
						<!-- Email -->
						<div class="form">
							<h5>Your Email</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value="<?php e($data['user']['email']) ?>" name="email">
						</div>

						<!-- Title -->
						<div class="form">
							<h5>Job Title</h5>
							<input class="search-field" type="text" placeholder="e.g. Web Developer" value="" name="title">
						</div>

						<!-- Job Type -->
						<div class="form">
							<h5>Job Type</h5>
							<select data-placeholder="Choose Job Type" class="chosen-select-no-single" name="type">
								<?php foreach($data['type'] as $type): ?>
                                    <option value="<?php e($type['id']) ?>"><?php e($type['name']) ?></option>
                                <?php endforeach; ?>
							</select>
						</div>


						<!-- Choose Category -->
						<div class="form">
							<h5>Category</h5>
							<select data-placeholder="Choose Category" class="chosen-select-no-single" name="category">
								<?php foreach($data['categories'] as $categories): ?>
                                    <option value="<?php e($categories['id']) ?>"><?php e($categories['name']) ?></option>
                                <?php endforeach; ?>
							</select>
						</div>


						<!-- Location -->
						<div class="form">
							<h5>Location</h5>
							<select data-placeholder="Choose Location" class="chosen-select-no-single" name="location">
								<?php foreach($data['locations'] as $locations): ?>
                                    <option value="<?php e($locations['id']) ?>"><?php e($locations['island_name']) ?></option>
                                <?php endforeach; ?>
							</select>
						</div>


						<!-- Job Level -->
						<div class="form">
							<h5>Job Level</h5>
							<select data-placeholder="Choose Location" class="chosen-select-no-single" name="level">
								<?php foreach($data['levels'] as $levels): ?>
                                    <option value="<?php e($levels['id']) ?>"><?php e($levels['name']) ?></option>
                                <?php endforeach; ?>
							</select>
						</div>


						<!-- Description -->
						<div class="form" style="width: 100%;">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true" placeholder="Enter Job Description, Required Skillsets"></textarea>
						</div>

						<!-- Tags -->
						<div class="form">
							<h5>Job Tags <span>(optional)</span></h5>
							<input class="search-field" type="text" placeholder="e.g. PHP, Social Media, Management" value="" name="tags">
							<p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
						</div>

						<!-- TClosing Date -->
						<div class="form">
							<h5>Closing Date <span>(optional)</span></h5>
							<input data-role="date" type="date" name="closing-date" value="<?php echo Carbon\Carbon::now()->toDateString(); ?>" class="search-field" style="border-radius: 3px; padding: 12px 18px; outline: none; font-size: 14px; color: #909090; margin: 0; max-width: 100%; width: 100%; box-sizing: border-box; display: block; background-color: #fcfcfc; font-weight: 500; border: 1px solid #e0e0e0; opacity: 1;">
							<p class="note">Deadline for new applicants.</p>
						</div>

					</div>

					</div>
				</div>

				<button type="submit" name="add-job" class="button margin-top-50">Submit Job <i class="fa fa-arrow-circle-right"></i></a>
			</div>

</form>

<?php the_dashfoot() ?>
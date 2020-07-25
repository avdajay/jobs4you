<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span>We found <?php echo count($data['jobs']) ?> jobs</span>
			<h2>All Jobs</h2>
		</div>

		<div class="six columns">
			<?php if (isset($_SESSION['rid']) && $_SESSION['rid'] == 2) : ?>
				<a href="<?php url('/add-jobs') ?>" class="button">Post a Job, It’s Free!</a>
			<?php elseif (isset($_SESSION['uid']) && $_SESSION['rid'] == 1 || $_SESSION['rid'] == 0) : ?>
				<!-- Will not be shown to jobseekers -->
			<?php else : ?>
				<a href="<?php url('/add-jobs') ?>" class="button">Post a Job, It’s Free!</a>
			<?php endif; ?>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eleven columns">
		<div class="padding-right">
			<?php if (!empty($_SESSION['success'])) : ?>
				<?php foreach ($_SESSION['success'] as $success) : ?>
					<div class="notification success closeable">
						<p><?php echo $success['success']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if (!empty($_SESSION['message'])) : ?>
				<?php foreach ($_SESSION['message'] as $error) : ?>
					<div class="notification error closeable">
						<p><?php echo $error['error']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="listings-container">

				<!-- Listing -->
				<?php foreach ($data['jobs'] as $job) : ?>
					<a href="<?php url('/job') . e('?id=' . $job['id']) ?>" class="listing <?php e(slug($job['etype'])) ?>">
						<div class="listing-logo">
							<img src="<?php asset('uploads/' . $job['logo']) ?>" alt="Company Logo" title="Company Logo">
						</div>
						<div class="listing-title">
							<h4><?php e($job['job_title']) ?><span class="listing-type"><?php e($job['etype']) ?></span></h4>
							<ul class="listing-icons">
								<li><i class="ln ln-icon-Management"></i> <?php e($job['employer']) ?>
									<!--<i class="fa fa-check-circle" style="color:#26AE61" title="Verified" alt="Verified Badge"></i>-->
								</li>
								<li><i class="ln ln-icon-Map2"></i> <?php e($job['lname']) ?></li>
								<li>
									<div class="listing-date">Posted: <?php echo Carbon\Carbon::parse($job['created_at'])->toFormattedDateString(); ?></div>
								</li>
							</ul>
						</div>
					</a>
				<?php endforeach; ?>

			</div>
			<div class="clearfix"></div>

			<!-- <div class="pagination-container">
			<nav class="pagination">
				<ul>
					<li><a href="#" class="current-page">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li class="blank">...</li>
					<li><a href="#">22</a></li>
				</ul>
			</nav>

			<nav class="pagination-next-prev">
				<ul>
					<li><a href="#" class="prev">Previous</a></li>
					<li><a href="#" class="next">Next</a></li>
				</ul>
			</nav>
		</div> -->

		</div>
	</div>

	<form method="GET" action="<?php url('/job') ?>">
		<!-- Widgets -->
		<div class="five columns">

			<!-- Sort by -->
			<div class="widget">
				<h4>Category</h4>

				<!-- Select -->
				<select data-placeholder="Choose Category" class="chosen-select-no-single" name="category">
					<option selected="selected" value="recent">Choose Category</option>
					<option value="2">IT / Computers / Programming</option>
					<option value="3">Accounting / Finance</option>
					<option value="4">Teaching / Education</option>
					<option value="5">Admin / Office</option>
					<option value="6">Arts / Media / Design</option>
					<option value="7">Engineering</option>
					<option value="8">Health / Medical / Science</option>
					<option value="9">HR / Recruitment</option>
					<option value="10">Food / Restaurant</option>
					<option value="11">Hotel / Spa / Salon</option>
					<option value="12">Legal / Documentation</option>
					<option value="13">Logistics</option>
					<option value="14">Production / Manufacturing</option>
					<option value="15">Maritime</option>
					<option value="16">Sales / Marketing / Retail</option>
					<option value="17">Skilled Work / Technical</option>
					<option value="18">Sports</option>
					<option value="19">Others</option>
				</select>

			</div>

			<!-- Location -->
			<div class="widget">
				<h4>Location</h4>
				<input type="text" placeholder="City" value="" name="city">
			</div>

			<!-- Job Type -->
			<div class="widget">
				<h4>Job Type</h4>

				<ul class="checkboxes">
					<li>
						<input id="check-2" type="checkbox" name="type" value="1">
						<label for="check-2">Part Time</label>
					</li>
					<li>
						<input id="check-3" type="checkbox" name="type" value="2">
						<label for="check-3">Full Time</label>
					</li>
					<li>
						<input id="check-4" type="checkbox" name="type" value="3">
						<label for="check-4">Freelance</label>
					</li>
					<li>
						<input id="check-5" type="checkbox" name="type" value="4">
						<label for="check-5">Internship</label>
					</li>
				</ul>
				<button type="submit" name="filter" class="button margin-top-30">Refine Search</button>
			</div>
		</div>
		<!-- Widgets / End -->
	</form>

</div>

<?php the_footer() ?>
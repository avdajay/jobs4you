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
			<a href="<?php url('/add-job') ?>" class="button">Post a Job, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
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

		<div class="listings-container">
			
			<!-- Listing -->
			<?php foreach($data['jobs'] as $job): ?>
            <a href="<?php url('/job') . e('?id='.$job['id']) ?>" class="listing <?php e(slug($job['etype'])) ?>">
                <div class="listing-logo">
                    <img src="<?php asset('uploads/'. $job['logo']) ?>" alt="Company Logo" title="Company Logo">
                </div>
                <div class="listing-title">
                    <h4><?php e($job['job_title']) ?><span class="listing-type"><?php e($job['etype']) ?></span></h4>
                    <ul class="listing-icons">
                        <li><i class="ln ln-icon-Management"></i> <?php e($job['employer']) ?> <i class="fa fa-check-circle" style="color:#26AE61" title="Verified" alt="Verified Badge"></i></li>
                        <li><i class="ln ln-icon-Map2"></i>  <?php e($job['lname']) ?></li>
                        <li><div class="listing-date">Posted: <?php e($job['created_at']) ?></div></li>
                    </ul>
                </div>
            </a>
            <?php endforeach; ?>

		</div>
		<div class="clearfix"></div>

		<div class="pagination-container">
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
		</div>

	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Sort by</h4>

			<!-- Select -->
			<select data-placeholder="Choose Category" class="chosen-select-no-single">
				<option selected="selected" value="recent">Newest</option>
				<option value="oldest">Oldest</option>
				<option value="expiry">Expiring Soon</option>
				<option value="ratehigh">Hourly Rate – Highest First</option>
				<option value="ratelow">Hourly Rate – Lowest First</option>
			</select>

		</div>

		<!-- Location -->
		<div class="widget">
			<h4>Location</h4>
			<form action="#" method="get">
				<input type="text" placeholder="State / Province" value="">
				<input type="text" placeholder="City" value="">

				<input type="text" class="miles" placeholder="Miles" value="">
				<label for="zip-code" class="from">from</label>
				<input type="text" id="zip-code" class="zip-code" placeholder="Zip-Code" value=""><br>

				<button class="button">Filter</button>
			</form>
		</div>

		<!-- Job Type -->
		<div class="widget">
			<h4>Job Type</h4>

			<ul class="checkboxes">
				<li>
					<input id="check-1" type="checkbox" name="check" value="check-1" checked="">
					<label for="check-1">Any Type</label>
				</li>
				<li>
					<input id="check-2" type="checkbox" name="check" value="check-2">
					<label for="check-2">Full-Time <span>(312)</span></label>
				</li>
				<li>
					<input id="check-3" type="checkbox" name="check" value="check-3">
					<label for="check-3">Part-Time <span>(269)</span></label>
				</li>
				<li>
					<input id="check-4" type="checkbox" name="check" value="check-4">
					<label for="check-4">Internship <span>(46)</span></label>
				</li>
				<li>
					<input id="check-5" type="checkbox" name="check" value="check-5">
					<label for="check-5">Freelance <span>(119)</span></label>
				</li>
			</ul>

		</div>

	</div>
	<!-- Widgets / End -->


</div>

<?php the_footer() ?>
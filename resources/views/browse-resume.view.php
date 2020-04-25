<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span>We've found <?php e(count($data['resume'])) ?> resumes</span>
			<h2>All Resumes</h2>
		</div>

		<div class="six columns">
			<a href="<?php url('/add-resume')?>" class="button">Post a Resume, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container margin-bottom-50">
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">

		<ul class="resumes-list">
            <?php foreach($data['resume'] as $resume): ?>
			<li><a href="<?php url('/resume') . e('?id='.$resume['id']); ?>">
				<img src="<?php asset('uploads/' . $resume['photo']); ?>" alt="Jobseeker Profile" title="Jobseeker Profile">
				<div class="resumes-list-content">
					<h4><?php e($resume['name']) ?> <span><?php e($resume['title']) ?></span></h4>
					<span><i class="fa fa-map-marker"></i> <?php e($resume['lname']) ?></span>
					<span>₱ <?php e($resume['salary']) ?></span>
					<p><?php e(truncate_desc($resume['description'], 200)) ?></p>
				</div>
				</a>
				<div class="clearfix"></div>
			</li>	
            <?php endforeach; ?>

		</ul>
		<div class="clearfix"></div>

		<!-- <div class="pagination-container">
			<nav class="pagination">
				<ul>
					<li><a href="#" class="current-page">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li class="blank">...</li>
					<li><a href="#">8</a></li>
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

<form method="GET" action="<?php url('/resume') ?>">
	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Location</h4>

			<!-- Select -->
			<select data-placeholder="Choose Location" class="chosen-select-no-single" name="location">
				<option selected="selected" value="">Choose Location</option>
				<?php foreach($data['location'] as $location): ?>
				<option value="<?php e($location['id']) ?>"><?php e($location['island_name']) ?></option>
				<?php endforeach; ?>
			</select>

		</div>

		<!-- Skills -->
		<div class="widget">
			<h4>Position</h4>
			<input type="text" placeholder="Job Title" value="" name="title">
		</div>

		<button type="submit" class="button">Refine Search</button>

	</div>
	<!-- Widgets / End -->
</form>

</div>

<?php the_footer() ?>
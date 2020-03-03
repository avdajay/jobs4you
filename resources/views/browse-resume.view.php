<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span>We've found <?php echo count($data['resume']) ?> resumes</span>
			<h2>All Resumes</h2>
		</div>

		<div class="six columns">
			<a href="add-resume.html" class="button">Post a Resume, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">

		<ul class="resumes-list">

            <?php foreach($data['resume'] as $resume): ?>
			<li><a href="<?php url('/resume') . e('?id='.$resume['id']) ?>">
				<img src="<?php asset('uploads/' . $resume['photo']) ?>" alt="Jobseeker Profile" title="Jobseeker Profile">
				<div class="resumes-list-content">
					<h4><?php e($resume['name']) ?> <span><?php e($resume['title']) ?></span></h4>
					<span><i class="fa fa-map-marker"></i> <?php e($resume['lname']) ?></span>
					<span>₱ <?php e($resume['salary']) ?></span>
					<p><?php e($resume['description']) ?></p>
				</div>
				</a>
				<div class="clearfix"></div>
			</li>	
            <?php endforeach; ?>

		</ul>
		<div class="clearfix"></div>

		<div class="pagination-container">
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
				<option selected="selected" value="recent">Relevance</option>
				<option value="">Hourly Rate – Highest First</option>
				<option value="">Hourly Rate – Lowest First</option>
			</select>

		</div>

		<!-- Skills -->
		<div class="widget">
			<h4>Skills</h4>

			<!-- Select -->
			<form action="#" method="get">
				<select data-placeholder="Select Skills" class="chosen-select" multiple="">
					<option value="">Adobe Photoshop</option>
					<option value="">PHP</option>
					<option value="">HTML</option>
					<option value="">CSS</option>
					<option value="">JavaScript</option>
					<option value="">jQuery</option>
					<option value="">MySQL</option>
					<option value="">WordPress</option>
				</select>
				<div class="margin-top-15"></div>
				<button class="button">Filter</button>
			</form>
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

	</div>
	<!-- Widgets / End -->


</div>

<?php the_footer() ?>
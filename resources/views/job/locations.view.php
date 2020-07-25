<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="photo-bg" style="background-image: url(images/all-categories-photo.jpg);">
	<div class="container">
		<div class="ten columns">
			<h2>All Locations</h2>
		</div>

		<div class="six columns">
			<?php if (isset($_SESSION['uid'])) : ?>
				<?php if (isset($_SESSION['rid']) && $_SESSION['rid'] == 2) : ?>
					<a href="<?php url('/add-jobs') ?>" class="button">Post a Job, It’s Free!</a>
				<?php elseif (isset($_SESSION['uid']) && $_SESSION['rid'] == 1 || $_SESSION['rid'] == 0) : ?>
					<!-- Will not be shown to jobseekers -->
				<?php else : ?>
					<a href="<?php url('/add-jobs') ?>" class="button">Post a Job, It’s Free!</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div id="categories">
	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			<div class="four columns">
				<h4>Western Visayas</h4>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=1">Aklan</a></li>
					<li><a href="/job?location=2">Antique</a></li>
					<li><a href="/job?location=3">Capiz</a></li>
				</ul>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=4">Guimaras</a></li>
					<li><a href="/job?location=5">Ilo-Ilo</a></li>
					<li><a href="/job?location=6">Negros Occidental</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			<div class="four columns">
				<h4>Central Visayas</h4>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=7">Bohol</a></li>
					<li><a href="/job?location=8">Cebu</a></li>
				</ul>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=9">Negros Oriental</a></li>
					<li><a href="/job?location=10">Siquijor</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			<div class="four columns">
				<h4>Eastern Visayas</h4>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=11">Biliran</a></li>
					<li><a href="/job?location=12">Leyte</a></li>
					<li><a href="/job?location=13">Southern Leyte</a></li>
				</ul>
			</div>
			<div class="four columns">
				<ul>
					<li><a href="/job?location=14">Eastern Samar</a></li>
					<li><a href="/job?location=15">Northern Samar</a></li>
					<li><a href="/job?location=16">Samar</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>

<?php the_footer() ?>
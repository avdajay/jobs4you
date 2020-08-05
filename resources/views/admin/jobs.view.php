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
				<li><a href="<?php url('/admin') ?>">Dashboard</a></li>
			</ul>

			<ul data-submenu-title="Management">
				<li class="active-submenu"><a>For Administrator</a>
					<ul>
						<li><a href="<?php url('/admin/users') ?>">Manage Users</a></li>
						<li><a href="<?php url('/admin/resumes') ?>">Manage Resumes</a></li>
						<li><a href="<?php url('/admin/jobs') ?>">Manage Jobs</a></li>
					</ul>
				</li>
			</ul>

			<ul data-submenu-title="Account">
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
					<h2>Manage Jobs</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/admin') ?>">Home</a></li>
							<li><a href="<?php url('/admin') ?>">Dashboard</a></li>
							<li>Manage Jobs</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">

			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<?php if (!empty($_SESSION['success'])) : ?>
					<?php foreach ($_SESSION['success'] as $success) : ?>
						<div class="notification success closeable">
							<p><?php echo $success['success']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

				<div class="notification notice">
					Manage all employer's job listings.
				</div>
				<p class="note">Jobs <span style="background: #26AE61; padding: 3px; color: #ffffff">highlighted</span> in green are approved and shown to the jobseekers.</p>
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->

						<table class="manage-table responsive-table">

							<tr>
								<th><i class="fa fa-file-text"></i> Title</th>
								<th><i class="fa fa-star"></i> Featured</th>
								<th><i class="fa fa-calendar"></i> Date Posted</th>
								<th><i class="fa fa-calendar"></i> Date Expires</th>
								<th><i class="fa fa-user"></i> Applications</th>
								<th><i class="fa fa-cog"></i> Actions</th>
							</tr>

							<!-- Item -->
							<?php //print("<pre>".print_r($data,true)."</pre>"); die(); 
							?>
							<?php foreach ($data['jobs'] as $job) : ?>
								<tr <?php !empty($job['approved_at']) ? print('style="background: #7EF482!important; color: #454545!important;"') : '' ?>>
									<td class="title"><a href="<?php url('/job') . e('?id=' . $job['id']) ?>"><?php e($job['job_title']) ?></a></td>
									<td class="centered"><?php echo (empty($job['featured_at'])) ? '-' : '<i class="fa  fa-check">' ?></td>
									<td><?php e(Carbon\Carbon::parse($job['created_at'])->toFormattedDateString()) ?></td>
									<td><?php e(Carbon\Carbon::parse($job['expired_at'])->toFormattedDateString()) ?></td>
									<td class="centered"><?php echo (empty($job['applications'])) ? '-' : '<a href="#" class="button">' . $job['applications'] . '</a>'; ?></td>
									<td class="action">
										<?php if (empty($job['approved_at'])) : ?>
											<form method="POST" action="<?php url('/admin/jobs') ?>" id="approved<?php e($job['id']) ?>">
												<input type="hidden" name="approved" value="<?php e($job['id']) ?>">
											</form>
											<a href="#" class="approved" onclick="event.preventDefault(); document.getElementById('approved<?php e($job['id']) ?>').submit();"><i class="fa fa-check"></i> Approved</a>
										<?php endif; ?>
										<?php if (empty($job['featured_at'])) : ?>
											<form method="POST" action="<?php url('/admin/jobs') ?>" id="featured<?php e($job['id']) ?>">
												<input type="hidden" name="featured" value="<?php e($job['id']) ?>">
											</form>
											<a href="#" onclick="event.preventDefault(); document.getElementById('featured<?php e($job['id']) ?>').submit();"><i class="fa  fa-check "></i> Featured</a>
										<?php endif; ?>
										<?php if (empty($job['applications'])) : ?>
											<form method="POST" action="<?php url('/admin/jobs') ?>" id="deleted<?php e($job['id']) ?>">
												<input type="hidden" name="deleted" value="<?php e($job['id']) ?>">
											</form>
											<a href="#" class="delete" onclick="event.preventDefault(); document.getElementById('deleted<?php e($job['id']) ?>').submit();"><i class="fa fa-remove"></i> Delete</a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>

						</table>
					</div>
				</div>
			</div>

			<?php the_dashfoot() ?>
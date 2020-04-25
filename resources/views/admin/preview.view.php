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
			</div>
		<!-- Applications -->
		<div class="col-md-12">
			<div class="application">
				<div class="app-content">
					<!-- Name / Avatar -->
					<div class="info">
						<img src="<?php ($_GET['role'] == 1) ? asset('uploads/'. $data['photo']) : asset('uploads/' . $data['logo']) ?>" alt="Resume Profile Photo">
						<span><a href="<?php url('/resume?id=' . $data['id']) ?>"><?php e($data['name']) ?></a> <?php echo (isset($data['verified_at']) ? '<i class="fa fa-check-circle" title="Verification Badge - Trusted Business"></i>' : '') ?></span>
						<ul>
							<li><a href="mailto:<?php e($data['email']) ?>"><i class="fa fa-envelope"></i> <?php e($data['email']) ?></a></li>
							<li><a href="tel:<?php e($data['phone']) ?>"><i class="fa fa-phone"></i> <?php e($data['phone']) ?></a></li>
							<li><a href="https://twitter.com/<?php e($data['twitter']) ?>" target="__blank"><i class="fa fa-twitter"></i> <?php e($data['twitter']) ?></a></li>
							<li><a href="https://facebook.com/<?php e($data['facebook']) ?>" target="__blank"><i class="fa fa-facebook"></i> <?php e($data['facebook']) ?></a></li>
							<li><a href="https://instagram.com/<?php e($data['linkedin']) ?>" target="__blank"><i class="fa fa-linkedin"></i> <?php e($data['linkedin']) ?></a></li>
						</ul>
					</div>
					
					<!-- Buttons -->
					<div class="buttons">
						<a href="#three-2" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
					</div>
					<div class="clearfix"></div>

				</div>

				<!--  Hidden Tabs -->
				<div class="app-tabs">

					<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
				    
				    <!-- Third Tab -->
				    <div class="app-tab-content" id="three-2">
						<i>Full Name</i>
						<span><?php e($data['name']) ?></span>

						<i>Address</i>
						<span><?php e($data['address']) ?></span>

						<?php if (isset($data['size'])): ?>
						<i>Company Size</i>
						<span><?php e($data['size']) ?></span>
						<?php endif; ?>
						
						<i>About</i>
						<span><?php e($_GET['role'] == 1 ? $data['summary'] : $data['description']) ?></span>
				    </div>

				</div>

				<!-- Footer -->
				<div class="app-footer">
					<ul>
						<li class="text-notice"><i class="fa fa-file-text-o"></i> <?php e(empty($data['suspended_at']) ? 'Currently Active' : 'Suspended') ?></li>
						<li><i class="fa fa-calendar"></i> User since <?php e(Carbon\Carbon::parse($data['created_at'])->toFormattedDateString()) ?></li>
						<li>
						<?php if($_GET['role'] == 2): ?>
						<?php if(isset($data['verified_at'])): ?>
							<i class="fa fa-calendar"></i> Verified since <?php e(Carbon\Carbon::parse($data['verified_at'])->toFormattedDateString()); ?>
						<?php else: ?>
							<i class="fa fa-check"></i><a href="#" onclick="event.preventDefault(); document.getElementById('verify').submit();"> Approve Verification</a>
							<form id="verify" action="<?php url('/admin/users?view=' . $_GET['view'] . '&role=' . $_GET['role']) ?>" method="POST">
								<input type="hidden" name="verify" value="<?php e($_GET['view']) ?>">
							</form>
						<?php endif; ?>
						<?php endif; ?>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

<?php the_dashfoot() ?>
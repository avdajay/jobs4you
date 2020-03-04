<?php the_dashhead() ?>

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
                <li class="active-submenu"><a>For Administrator</a>
                    <ul>
                        <li><a href="<?php url('/admin/settings') ?>">Manage Site Settings</a></li>
                        <li><a href="<?php url('/admin/users') ?>">Manage Users</a></li>
                        <li><a href="<?php url('/admin/resumes') ?>">Manage Resumes</a></li>
                        <li><a href="<?php url('/admin/jobs') ?>">Manage Jobs</a></li>
                    </ul>
                </li>
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="<?php url('/admin/profile') ?>">My Profile</a></li>
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
				<?php if (!empty($_SESSION['message'])): ?>
					<?php foreach ($_SESSION['message'] as $error): ?>
						<div class="notification error closeable">
							<p><?php echo $error['error']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if (!empty($_SESSION['success'])): ?>
					<?php foreach ($_SESSION['success'] as $success): ?>
						<div class="notification success closeable">
							<p><?php echo $success['success']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
					<h2>My Profile</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/admin/') ?>">Dashboard</a></li>
							<li><a href="#">Manage Site Settings</a></li>
						</ul>
					</nav>
				</div>
			</div>
        </div>
        
<form method="POST" action="<?php url('/profile') ?>">
			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Current Password</label>
							<input type="password" name="current_password">

							<label>New Password</label>
							<input type="password" name="new_password">

							<label>Confirm New Password</label>
							<input type="password" name="confirm_new">

							<button type="submit" class="button margin-top-50" name="change_pass">Change Password</button>
						</div>

					</div>
				</div>
			</div>
</form>

<?php the_dashfoot() ?>
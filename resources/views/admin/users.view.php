<?php

the_dashhead() ?>

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
					<h2>Manage Resumes</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/admin') ?>">Home</a></li>
							<li><a href="<?php url('/admin') ?>">Dashboard</a></li>
							<li>Manage Resumes</li>
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
				<?php if (!empty($_SESSION['error'])): ?>
				<?php foreach ($_SESSION['error'] as $error): ?>
					<div class="notification danger closeable">
						<p><?php echo $error['error']; ?></p>
						<a class="close" href="#"></a>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>

				<div class="notification notice">
					Manage all user accounts.
				</div>
				<p class="note">Accounts <span style="background: #F7AAAA; padding: 3px;">highlighted</span> in red are suspended.</p>
				<div class="dashboard-list-box margin-top-5">
					<div class="dashboard-list-box-content">
    
						<!-- Table -->
							<table class="manage-table resumes responsive-table">

								<tr>
									<th><i class="fa fa-user"></i> ID</th>
									<th><i class="fa fa-user"></i> Role</th>
									<th><i class="fa fa-at"></i> Email</th>
									<th><i class="fa fa-calendar"></i> Member Since</th>
									<th><i class="fa fa-check"></i> Status</th>
									<th><i class="fa fa-cog"></i> Actions</th>
								</tr>
								<?php foreach ($data['users'] as $user): ?>
								<tr <?php !empty($user['suspended_at']) ? print('style="background: #F7AAAA!important; color: #454545!important;"') : '' ?>>
									<td class="title">M<?php e($user['id']) ?></td>
									<td><?php e($user['rname']) ?></td>
									<td><?php e($user['email']) ?></td>
									<td><?php e(Carbon\Carbon::parse($user['created_at'])->toFormattedDateString()) ?></td>
									<td><?php echo empty($user['activated_at']) ? '<p style="color:red">Unactivated</p>' : '<p style="color:green">Activated</p>' ?></td>
									<td class="action">
										<a href="<?php url('/admin/users?view=' . $user['id'] . '&role=' . $user['role_id']) ?>"><i class="fa  fa-eye"></i> View</a>
										<?php if (empty($user['suspended_at'])): ?>
											<a href="#" onclick="event.preventDefault(); document.getElementById('suspend<?php e($user['id']) ?>').submit();"><i class="fa  fa-times-circle"></i> Suspend</a>
											<form id="suspend<?php e($user['id']) ?>" action="<?php url('/admin/users') ?>" method="post">
												<input type="hidden" name="suspend" value="<?php e($user['id']) ?>">
											</form>
										<?php else: ?>
											<a href="#" onclick="event.preventDefault(); document.getElementById('unsuspend<?php e($user['id']) ?>').submit();"><i class="fa  fa-refresh"></i> Unsuspend</a>
											<form id="unsuspend<?php e($user['id']) ?>" action="<?php url('/admin/users') ?>" method="post">
												<input type="hidden" name="unsuspend" value="<?php e($user['id']) ?>">
											</form>
										<?php endif; ?>
										<?php if (empty($user['activated_at'])): ?>
										<a href="#" onclick="event.preventDefault(); document.getElementById('manual<?php e($user['id']) ?>').submit();"><i class="fa  fa-key"></i> Manual Activate</a>
										<form id="manual<?php e($user['id']) ?>" action="<?php url('/admin/users') ?>" method="post">
											<input type="hidden" name="manual" value="<?php e($user['id']) ?>">
										</form>
										<a href="#" onclick="event.preventDefault(); document.getElementById('activation<?php e($user['id']) ?>').submit();"><i class="fa  fa-envelope"></i> Resend Activation</a>
										<form id="activation<?php e($user['id']) ?>" action="<?php url('/admin/users') ?>" method="post">
											<input type="hidden" name="email" value="<?php e($user['email']) ?>">
											<input type="hidden" name="activation" value="<?php e($user['activation_code']) ?>">
										</form>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; ?>

							</table>
					</div>	
				</div>
			</div>

<?php the_dashfoot() ?>
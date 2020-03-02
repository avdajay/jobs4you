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
				<li><a href="<?php url('/messages') ?>">Messages</a></li>
			</ul>

			<ul data-submenu-title="Management">
				<?php if(isset($_SESSION['rid']) && $_SESSION['rid'] == 1): ?>
					<li><a>For Candidates</a>
						<ul>
							<li><a href="<?php url('/manage-resume') ?>">Manage Resumes</a></li>
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
				<li class="active"><a href="<?php url('/profile') ?>">My Profile</a></li>
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
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

<form method="POST" action="<?php url('/profile') ?>" enctype="multipart/form-data">
		<div class="row">
			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profile Details</h4>
					<div class="dashboard-list-box-static">
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<small>* Must be a 300px by 300px photo</small>
							<?php if (isset($data['user']['photo']) || isset($data['user']['logo'])): ?>
							<?php if ($_SESSION['rid'] == 1): ?>
								<img src="<?php asset('uploads/' . $data['user']['photo']) ?>" alt="Profile Picture or Logo" id="photo" width="300" height="300">
							<?php elseif ($_SESSION['rid'] ==2): ?>
								<img src="<?php asset('uploads/' . $data['user']['logo']) ?>" alt="Profile Picture or Logo" id="photo" width="300" height="300">
							<?php endif; ?>
							<?php else: ?>
								<img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&s=300" alt="Profile Picture or Logo" id="photo" width="300" height="300">
							<?php endif; ?>
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" id="upload" accept="image/*" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" name="photo">
								</div>
							</div>
						</div>
	
						<!-- Details -->
						<div class="my-profile">

							<label>Name</label>
							<input value="<?php e($data['user']['name'] ) ?>" type="text" name="name">

							<label>Phone</label>
							<input value="<?php e($data['user']['phone'] ) ?>" type="text" name="phone">

							<label>Email</label>
							<input value="<?php e($data['user']['email']) ?>" type="text" name="email">

							<label>Address</label>
							<textarea name="address" id="notes" cols="30" rows="10"><?php e($data['user']['address']) ?></textarea>

							<label for="location">Location</label>
							<select name="location" data-placeholder="Choose Location" class="chosen-select-no-single">		
							<?php foreach ($data['location'] as $location): ?>
								<option value="<?php echo $location['id'] ?>"<?php echo ($data['user']['location'] == $location['id']) ? ' selected' : '' ?>><?php echo $location['island_name'] ?></option>
							<?php endforeach; ?>
							</select>

							<label>Details/Summary</label>
							<textarea name="details" id="notes" cols="30" rows="10"><?php e(($_SESSION['rid'] == 1) ? $data['user']['summary'] : $data['user']['description']) ?></textarea>

							<?php if(isset($_SESSION['rid'])): ?>
							<?php if ($_SESSION['rid'] == 2): ?>
							<label for="location">No. of Employees</label>
							<input placeholder="1000" type="text" value="<?php e($data['user']['size']) ?>" name="size">

							<label>Website</label>
							<input placeholder="www.jobs4you.com" type="text" value="<?php e($data['user']['website']) ?>" name="website">
							<?php endif; ?>
							<?php endif; ?>

							<label><i class="fa fa-twitter"></i> Twitter</label>
							<input placeholder="@Jobs4You" type="text" value="<?php e($data['user']['twitter']) ?>" name="twitter">

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<input placeholder="Jobs4YouPH" type="text" value="<?php e($data['user']['facebook']) ?>" name="facebook">

							<label><i class="fa fa-linkedin"></i> Linkedin</label>
							<input placeholder="jobs4youph" type="text" value="<?php e($data['user']['linkedin']) ?>" name="linkedin">
						</div>
	
						<button type="submit" class="button margin-top-50" name="update_profile">Update Profile</button>

					</div>
				</div>
			</div>
</form>
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
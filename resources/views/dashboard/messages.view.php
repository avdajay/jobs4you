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
				<li class="active"><a href="<?php url('/messages') ?>">Messages</a></li>
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
							<li><a href="<?php url('/manage-jobs') ?>">Manage Jobs</a></li>
							<li><a href="<?php url('/manage-applications') ?>">Manage Applications</a></li>
							<li><a href="<?php url('/add-jobs') ?>">Add Job</a></li>
						</ul>
					</li>
				<?php endif; ?>	
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="<?php url('/profile') ?>">My Profile</a></li>
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
					<h2>Messages</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Messages</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>



		<div class="row">
			<!-- Messages -->
			<div class="col-lg-12 col-md-12">
				<?php if (!empty($_SESSION['success'])): ?>
					<?php foreach ($_SESSION['success'] as $success): ?>
						<div class="notification success closeable">
							<p><?php echo $success['success']; ?></p>
							<a class="close" href="#"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<div class="messages-container margin-top-0">
					<div class="messages-headline">
						<h4>Inbox</h4>
					</div>

					<div class="messages-container-inner">
						<!-- Messages -->
						<div class="messages-inbox">
							<ul>
								<?php if (!is_null($data['messages'][0]['id'])): ?>
								<?php foreach($data['messages'] as $message): ?>
								<li <?php echo isset($_GET['id']) && $message['id'] == $_GET['id'] ? 'class="active-message"' : '' ?>>
									<a href="<?php url('/messages?id=' . $message['id']) ?>">
										<div class="message-avatar"><img src="<?php ($_SESSION['rid'] == 2) ? asset('uploads/' . $message['applicantsPhoto']) : asset('uploads/' . $message['employerLogo']) ?>" alt="Chat Avatar" title="Chat Avatar"></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5><?php ($_SESSION['rid'] == 2) ? e($message['applicantsName']) : e($message['employerName']) ?></h5>
												<span><?php e(Carbon\Carbon::parse($message['sent_at'])->toFormattedDateString()) ?></span>
											</div>
											<p><?php e($message['content']) ?></p>
										</div>
									</a>
								</li>
								<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<?php if (isset($_GET['id'])): ?>
							<?php foreach($data['chats'] as $chat): ?>
							<div class="message-bubble <?php echo ($_SESSION['uid'] == $chat['user_id']) ? 'me' : '' ?>">
								<div class="message-avatar">
									<img src="<?php ($chat['receiver_id'] == $chat['user_id']) ? asset('uploads/' . $chat['applicantsPhoto']) : asset('uploads/' . $chat['employerLogo']) ?>" alt="Chat Avatar" title="Chat Avatar">
								</div>
								<div class="message-text">
									<p><?php e($chat['content']) ?></p>
								</div>
							</div>
							<?php endforeach; ?>

							<!-- Reply Area -->
							<div class="clearfix"></div>
							<div class="message-reply">
								<form action="<?php url('/messages?id=' . $_GET['id']) ?>" method="POST">
									<textarea cols="40" rows="3" placeholder="Your Message" name="message"></textarea>
									<button type="submit" class="button" name="reply">Send Message</button>
								</form>
							</div>
							<?php elseif(!isset($_GET['id']) && is_null($data['messages'][0]['id'])): ?>
							<div class="notification warning">
								<h5>No conversations/notifications to show.</h5>
							</div>
							<?php else: ?>
							<div class="notification notice">
								<h5>Please select a message from the left.</h5>
							</div>
							<?php endif; ?>
							
						</div>
						<!-- Message Content -->

					</div>

				</div>

			</div>

<?php the_dashfoot() ?>
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
				<li><a href="dashboard.html">Dashboard</a></li>
				<li><a href="dashboard-messages.html">Messages <span class="nav-tag">2</span></a></li>
			</ul>

			<ul data-submenu-title="Management">
				<li class="active-submenu"><a>For Employers</a>
					<ul>
						<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">5</span></a></li>
						<li><a href="dashboard-manage-applications.html">Manage Applications <span class="nav-tag">4</span></a></li>
						<li><a href="dashboard-add-job.html">Add Job</a></li>
					</ul>
				</li>

				<li><a>For Candidates</a>
					<ul>
						<li><a href="dashboard-manage-resumes.html">Manage Resumes <span class="nav-tag">2</span></a></li>
						<li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
						<li><a href="dashboard-add-resume.html">Add Resume</a></li>
					</ul>
				</li>	
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="dashboard-my-profile.html">My Profile</a></li>
				<li><a href="index.html">Logout</a></li>
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
					<h2>Manage Applications</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Manage Applications</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="notification notice">
					The job applications for <strong><a href="#">Power Systems User Experience Designer</a></strong> are listed below.
				</div>
			</div>

		<div class="col-md-6">
			<!-- Select -->
			<select data-placeholder="Filter by status" class="chosen-select-no-single">
				<option value="">Filter by status</option>
				<option value="new">New</option>
				<option value="interviewed">Interviewed</option>
				<option value="offer">Offer extended</option>
				<option value="hired">Hired</option>
				<option value="archived">Archived</option>
			</select>
			<div class="margin-bottom-15"></div>
		</div>

		<div class="col-md-6">
			<!-- Select -->
			<select data-placeholder="Newest first" class="chosen-select-no-single">
				<option value="">Newest first</option>
				<option value="name">Sort by name</option>
				<option value="rating">Sort by rating</option>
			</select>
			<div class="margin-bottom-35"></div>
		</div>


		<!-- Applications -->
		<div class="col-md-12">
			
			<!-- Application #1 -->
			<div class="application">
				<div class="app-content">
					
					<!-- Name / Avatar -->
					<div class="info">
						<img src="images\resumes-list-avatar-01.png" alt="">
						<span>John Doe</span>
						<ul>
							<li><a href="#"><i class="fa fa-file-text"></i> Download CV</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
						</ul>
					</div>
					
					<!-- Buttons -->
					<div class="buttons">
						<a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
						<a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
						<a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
					</div>
					<div class="clearfix"></div>

				</div>

				<!--  Hidden Tabs -->
				<div class="app-tabs">

					<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
					
					<!-- First Tab -->
				    <div class="app-tab-content" id="one-1">

						<div class="select-grid">
							<select data-placeholder="Application Status" class="chosen-select-no-single">
								<option value="">Application Status</option>
								<option value="new">New</option>
								<option value="interviewed">Interviewed</option>
								<option value="offer">Offer extended</option>
								<option value="hired">Hired</option>
								<option value="archived">Archived</option>
							</select>
						</div>

						<div class="select-grid">
							<input type="number" min="1" max="5" placeholder="Rating (out of 5)">
						</div>

						<div class="clearfix"></div>
						<a href="#" class="button margin-top-15">Save</a>
						<a href="#" class="button gray margin-top-15 delete-application">Delete this application</a>

				    </div>
				    
				    <!-- Second Tab -->
				    <div class="app-tab-content" id="two-1">
						<textarea placeholder="Private note regarding this application"></textarea>
						<a href="#" class="button margin-top-15">Add Note</a>
				    </div>
				    
				    <!-- Third Tab -->
				    <div class="app-tab-content" id="three-1">
						<i>Full Name:</i>
						<span>John Doe</span>

						<i>Email:</i>
						<span><a href="/cdn-cgi/l/email-protection#204a4f484e0e444f45604558414d504c450e434f4d"><span class="__cf_email__" data-cfemail="d1bbbeb9bfffb5beb491b4a9b0bca1bdb4ffb2bebc">[email&#160;protected]</span></a></span>

						<i>Message:</i>
						<span>Praesent efficitur dui eget condimentum viverra. Sed non maximus ipsum, non consequat nulla. Vivamus nec convallis nisi, sit amet egestas magna. Quisque vulputate lorem sit amet ornare efficitur. Duis aliquam est elit, sed tincidunt enim commodo sed. Fusce tempus magna id sagittis laoreet. Proin porta luctus ante eu ultrices. Sed porta consectetur purus, rutrum tincidunt magna dictum tempus. </span>
				    </div>

				</div>

				<!-- Footer -->
				<div class="app-footer">

					<div class="rating no-stars">
						<div class="star-rating"></div>
						<div class="star-bg"></div>
					</div>

					<ul>
						<li><i class="fa fa-file-text-o"></i> New</li>
						<li><i class="fa fa-calendar"></i> September 24, 2019</li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>


			<!-- Application #2 -->
			<div class="application">
				<div class="app-content">
					
					<!-- Name / Avatar -->
					<div class="info">
						<img src="images\avatar-placeholder.png" alt="">
						<span><a href="#">Tom Smith</a></span>
						<ul>
							<li><a href="#"><i class="fa fa-file-text"></i> Download CV</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
						</ul>
					</div>
					
					<!-- Buttons -->
					<div class="buttons">
						<a href="#one-2" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
						<a href="#two-2" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
						<a href="#three-2" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
					</div>
					<div class="clearfix"></div>

				</div>

				<!--  Hidden Tabs -->
				<div class="app-tabs">

					<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
					
					<!-- First Tab -->
				    <div class="app-tab-content" id="one-2">

						<div class="select-grid">
							<select data-placeholder="Application Status" class="chosen-select-no-single">
								<option value="">Application Status</option>
								<option value="new">New</option>
								<option value="interviewed">Interviewed</option>
								<option value="offer">Offer extended</option>
								<option value="hired">Hired</option>
								<option value="archived">Archived</option>
							</select>
						</div>

						<div class="select-grid">
							<input type="number" min="1" max="5" placeholder="Rating (out of 5)">
						</div>

						<div class="clearfix"></div>
						<a href="#" class="button margin-top-15">Save</a>
						<a href="#" class="button gray margin-top-15 delete-application">Delete this application</a>

				    </div>
				    
				    <!-- Second Tab -->
				    <div class="app-tab-content" id="two-2">
						<textarea placeholder="Private note regarding this application"></textarea>
						<a href="#" class="button margin-top-15">Add Note</a>
				    </div>
				    
				    <!-- Third Tab -->
				    <div class="app-tab-content" id="three-2">
						<i>Full Name:</i>
						<span>Tom Smith</span>

						<i>Email:</i>
						<span><a href="/cdn-cgi/l/email-protection#1d697270336e707469755d78657c706d7178337e7270"><span class="__cf_email__" data-cfemail="33475c5e1d405e5a475b73564b525e435f561d505c5e">[email&#160;protected]</span></a></span>

						<i>Message:</i>
						<span>Morbi non pharetra quam. Pellentesque eget massa dolor. Sed vitae placerat eros, quis aliquet purus. Donec feugiat sapien urna, at sagittis libero pellentesque in. Praesent efficitur dui eget condimentum viverra. Sed non maximus ipsum, non consequat nulla. Vivamus nec convallis nisi, sit amet egestas magna. Quisque vulputate lorem sit amet ornare efficitur. Duis aliquam est elit, sed tincidunt enim commodo sed. Fusce tempus magna id sagittis laoreet. Proin porta luctus ante eu ultrices. Sed porta consectetur purus, rutrum tincidunt magna dictum tempus. </span>
				    </div>

				</div>

				<!-- Footer -->
				<div class="app-footer">

					<div class="rating five-stars">
						<div class="star-rating"></div>
						<div class="star-bg"></div>
					</div>

					<ul>
						<li><i class="fa fa-file-text-o"></i> Interviewed</li>
						<li><i class="fa fa-calendar"></i> September 22, 2019</li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>


			<!-- Application #3 -->
			<div class="application">
				<div class="app-content">
					
					<!-- Name / Avatar -->
					<div class="info">
						<img src="images\avatar-placeholder.png" alt="">
						<span>Kathy Berry</span>
						<ul>
							<li><a href="#"><i class="fa fa-file-text"></i> Download CV</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
						</ul>
					</div>
					
					<!-- Buttons -->
					<div class="buttons">
						<a href="#one-3" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
						<a href="#two-3" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
						<a href="#three-3" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
					</div>
					<div class="clearfix"></div>

				</div>

				<!--  Hidden Tabs -->
				<div class="app-tabs">

					<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
					
					<!-- First Tab -->
				    <div class="app-tab-content" id="one-3">

						<div class="select-grid">
							<select data-placeholder="Application Status" class="chosen-select-no-single">
								<option value="">Application Status</option>
								<option value="new">New</option>
								<option value="interviewed">Interviewed</option>
								<option value="offer">Offer extended</option>
								<option value="hired">Hired</option>
								<option value="archived">Archived</option>
							</select>
						</div>

						<div class="select-grid">
							<input type="number" min="1" max="5" placeholder="Rating (out of 5)">
						</div>

						<div class="clearfix"></div>
						<a href="#" class="button margin-top-15">Save</a>
						<a href="#" class="button gray margin-top-15 delete-application">Delete this application</a>

				    </div>
				    
				    <!-- Second Tab -->
				    <div class="app-tab-content" id="two-3">
						<textarea placeholder="Private note regarding this application"></textarea>
						<a href="#" class="button margin-top-15">Add Note</a>
				    </div>
				    
				    <!-- Third Tab -->
				    <div class="app-tab-content" id="three-3">
						<i>Full Name:</i>
						<span>Kathy Berry</span>

						<i>Email:</i>
						<span><a href="/cdn-cgi/l/email-protection#127973667a6b3c707760606b52776a737f627e773c717d7f"><span class="__cf_email__" data-cfemail="751e14011d0c5b171007070c35100d14180519105b161a18">[email&#160;protected]</span></a></span>
				    </div>

				</div>
				

			<!-- Footer -->
			<div class="app-footer">

				<div class="rating four-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>

				<ul>
					<li><i class="fa fa-file-text-o"></i> Interviewed</li>
					<li><i class="fa fa-calendar"></i> September 26, 2019</li>
				</ul>
				<div class="clearfix"></div>

			</div>
		</div>


	</div>

<?php the_dashfoot() ?>
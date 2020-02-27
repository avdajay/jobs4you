<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html"><?php e($data['job']['category']) ?></a></span>
			<h2>Restaurant Team Member - Crew <span class="freelance">Full-Time</span><span class="full-time">Managerial/Supervisory</span></h2>
		</div>

		<div class="six columns">
			<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Job</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
			<img src="<?php asset('images/company-logo.png') ?>" alt="">
			<div class="content">
				<h4>King LLC</h4>
				<span><a href="#"><i class="fa fa-link"></i> Website</a></span>
				<span><a href="#"><i class="fa fa-twitter"></i> @kingrestaurants</a></span>
			</div>
			<div class="clearfix"></div>
            <div class="skills">
                <span>JavaScript</span>
                <span>PHP</span>
                <span>WordPress</span>
            </div>
            <div class="clearfix"></div>
		</div>

		<p class="margin-reset">
			The Food Service Specialist ensures outstanding customer service is provided to food customers and that all food offerings meet the required stock levels and presentation standards. Beginning your career as a Food Steward will give you a strong foundation in Speedway’s food segment that can make you a vital member of the front line team!
		</p>

		<br>
		<p>The <strong>Food Service Specialist</strong> will have responsibilities that include:</p>

		<ul class="list-1">
			<li>Executing the Food Service program, including preparing and presenting our wonderful food offerings
			to hungry customers on the go!
			</li>
			<li>Greeting customers in a friendly manner and suggestive selling and sampling items to help increase sales.</li>
			<li>Keeping our Store food area looking terrific and ready for our valued customers by managing product 
			inventory, stocking, cleaning, etc.</li>
			<li>We’re looking for associates who enjoy interacting with people and working in a fast-paced environment!</li>
		</ul>
		
		<br>

		<h4 class="margin-bottom-10">Job Requirment</h4>

		<ul class="list-1">
			<li>Excellent customer service skills, communication skills, and a happy, smiling attitude are essential.</li>
			<li>Must be available to work required shifts including weekends, evenings and holidays.</li>
			<li>Must be able to perform repeated bending, standing and reaching.</li>
			<li> Must be able to occasionally lift up to 50 pounds</li>
		</ul>

	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">
				
				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>Location:</strong>
							<span>20180 Outer Dr Dearborn, MI 48124</span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Job Title:</strong>
							<span>Food Service Specialist</span>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<div>
							<strong>Hours:</strong>
							<span>40h / week</span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Rate:</strong>
							<span>$9.50 - $12.50 / hour</span>
						</div>
					</li>
				</ul>

                <?php if(!empty($_SESSION['uid']) && $_SESSION['rid'] == 1): ?>
                    <a href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</a>
                <?php elseif(!empty($_SESSION['uid']) && $_SESSION['rid'] == 2): ?>
                    <!-- apply button doesn't make sense on employer accounts. hidden -->
                <?php else: ?>
                    <a href="<?php url('/login') ?>" class="popup-with-zoom-anim button">Login To Apply</a>
                <?php endif; ?>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Apply For This Job</h2>
					</div>

					<div class="small-dialog-content">
                        <form action="<?php url('/job') ?>" method="POST">
                            <textarea placeholder="Your message / cover letter sent to the employer. A good start to impress your employer." name="message"></textarea>

                            <!-- Upload CV -->
                            <div class="upload-info"><strong>Attach a Resume</strong></div>
                            <div class="form">
                                <select data-placeholder="Choose a Resume" class="chosen-select-no-single" name="type">
                                    <?php foreach($data['resume'] as $resume): ?>
                                        <option value="<?php e($resume['id']) ?>"><?php e($resume['title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="divider"></div>

                            <button class="send">Send Application</button>
                        </form>
					</div>
					
				</div>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>

<?php the_footer() ?>
<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="browse-jobs.html"><?php e($data['job']['category']) ?></a></span>
			<h2><?php e($data['job']['job_title']) ?> <span class="freelance"><?php e($data['job']['type']) ?></span><span class="full-time"><?php e($data['job']['level']) ?></span></h2>
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
			<img src="<?php asset('uploads/' . $data['job']['logo']) ?>" alt="Employer Logo" title="Employer Logo">
			<div class="content">
				<h4><?php e($data['job']['name']) ?> <!--<i class="fa fa-check-circle" style="color:#26AE61" title="Verified" alt="Verified Badge"></i>--></h4>
				<span><a href="http://<?php e($data['job']['website']) ?>" target="_blank"><i class="fa fa-link"></i> <?php e($data['job']['website']) ?></a></span>
				<span><a href="http://www.linkedin.com/in/<?php e($data['job']['linkedin']) ?>" target="_blank"><i class="fa fa-linkedin"></i> <?php e($data['job']['linkedin']) ?></a></span>
			</div>
			<div class="clearfix"></div>
            <div class="skills">
			<?php $tags = explode(',',$data['job']['tags']); foreach($tags as $tag): ?>
				<span><?php e($tag); ?></span>
			<?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
		</div>

		<h4 class="margin-bottom-10"><strong>About <?php e($data['job']['name']) ?></strong></h4>
		<div class="margin-bottom-30">
			<?php e($data['job']['description']) ?>
		</div>

		<h4 class="margin-bottom-10"><strong>Job Description</strong></h4>
		<div class="margin-bottom-30">
			<?php e($data['job']['description']) ?>
		</div>

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
							<span><?php e($data['job']['address']) ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Job Title:</strong>
							<span><?php e($data['job']['job_title']) ?></span>
						</div>
					</li>
					<!-- <li>
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
					</li> -->
				</ul>

                <?php if(!empty($_SESSION['uid']) && $_SESSION['rid'] == 1): ?>
                    <a href="#small-dialog" class="popup-with-zoom-anim button" <?php echo ($data['app']['job_id'] != $_GET['id']) ? ' ' : 'style="pointer-events:none!important; cursor:none!important;"' ?>>
					<?php echo ($data['app']['job_id'] != $_GET['id']) ? 'Apply for the job' : 'Already applied' ?>
					</a>
                <?php elseif(!empty($_SESSION['uid']) && $_SESSION['rid'] == 2): ?>
                    <!-- apply button doesn't make sense on employer accounts. hidden -->
                <?php else: ?>
                    <a href="<?php url('/login') ?>" class="button">Login To Apply</a>
                <?php endif; ?>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Apply For This Job</h2>
					</div>

					<div class="small-dialog-content">
                        <form action="<?php url('/job?id=') . e($_GET['id']) ?>" method="POST">
                            <textarea placeholder="Your message / cover letter sent to the employer. A good start to impress your employer." name="message" required></textarea>
                            <!-- Upload CV -->
                            <div class="upload-info"><strong>Attach a Resume</strong></div>
                            <div class="form">
                                <select data-placeholder="Choose a Resume" class="chosen-select-no-single" name="resume" required>
                                    <?php foreach($data['resume'] as $resume): ?>
                                        <option value="<?php e($resume['id']) ?>"><?php e($resume['title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="divider"></div>
							<input type="hidden" name="title" value="<?php e($data['job']['job_title']) ?>">
							<input type="hidden" name="employer" value="<?php e($data['job']['user_id']) ?>">
                            <button type="submit" name="apply" class="send">Send Application</button>
                        </form>
					</div>
					
				</div>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>

<?php the_footer() ?>
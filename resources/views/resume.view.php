<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
    <div class="container">
    <?php //print('<pre>'. print_r($data, true) .'</pre>'); die(); ?>
		<div class="ten columns">
            <div class="resume-titlebar">
				<img src="<?php asset('uploads/' . $data['resume']['latestPhoto']) ?>" alt="Jobseeker Profile Image" title="Jobseeker Profile Image">
				<div class="resumes-list-content">
					<h4><?php e($data['resume']['name']) ?> <span><?php e($data['resume']['title']) ?></span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i> <?php e($data['resume']['location_name']) ?></span>
					<span class="icons">₱ <?php e($data['resume']['salary']) ?></span>
					<span class="icons"><a href="http://www.twitter.com/<?php e($data['resume']['twitter']) ?>"><i class="fa fa-twitter"></i> <?php e($data['resume']['twitter']) ?></a></span>
                    

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">
				<?php if (isset($_SESSION['rid']) && $_SESSION['rid'] == 2): ?>
				<a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Send a Message</h2>
					</div>
					<div class="small-dialog-content">
						<form action="<?php url('/resume?id=' . $data['resume']['id']) ?>" method="POST">
							<textarea placeholder="Message" name="msgContent"></textarea>
							<input type="hidden" name="userID" value="<?php e($data['resume']['user_id']) ?>">
							<button type="submit" class="send" name="message">Send</button>
						</form>
					</div>
				</div>
				<?php if (isset($_SESSION['uid']) && $_SESSION['uid'] === $data['bookmark']['bookmark_user'] && $_GET['id'] === $data['bookmark']['bookmark_content']): ?>
				<a class="button dark" ><i class="fa fa-star" ></i> Resume already bookmarked!</a>
				<?php else: ?>
				<a class="button dark"  onclick="event.preventDefault(); document.getElementById('bookmark').submit();"><i class="fa fa-star" ></i> Bookmark This Resume</a>
				<form action="<?php url('/resume') ?>" method="post" id="bookmark">
					<input type="hidden" name="bookmark" value="<?php e($_GET['id']) ?>">
				</form>
				<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<?php if (!empty($_SESSION['success'])): ?>
		<?php foreach ($_SESSION['success'] as $success): ?>
			<div class="notification success closeable">
				<p><?php echo $success['success']; ?></p>
				<a class="close" href="#"></a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<div class="padding-right">
		<div class="skills">
        <?php foreach($data['skills'] as $skill): ?>
            <span><?php e($skill['name'] . ' (' . $skill['difficulty'] . ')') ?></span>
        <?php endforeach; ?>
        </div>
		<div class="clearfix"></div>
		<div class="margin-bottom-30"></div>

		<h3>About Me</h3>

        <div>
            <?php e($data['resume']['description']) ?>
        </div>
        
        <div class="margin-bottom-30"></div>

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3>Education</h3>

		<!-- Resume Table -->
        <dl class="resume-table">
        <?php foreach($data['educ'] as $educ): ?>
			<dt>
				<small class="date"><?php e($educ['start_year']) ?> - <?php e($educ['end_year']) ?></small>
				<strong><?php e($educ['course']) ?> Major in <?php e($educ['major']) ?> at <?php e($educ['school_name']) ?></strong>
			</dt>
			<dd>
				<p><?php e($educ['description']) ?></p>
			</dd>
        <?php endforeach; ?>

        </dl>
        
        <h3 class="margin-top-15">Experience</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
        <?php foreach($data['experience'] as $exp): ?>
            <dt>
                <small class="date"><?php e(Carbon\Carbon::parse($exp['start_date'])->toFormattedDateString()) ?> - <?php e(empty($exp['end_date']) ? 'Present' : Carbon\Carbon::parse($exp['start_date'])->toFormattedDateString()) ?></small>
                <strong><?php e($exp['position']) ?> at <?php e($exp['employer_name']) ?></strong>
            </dt>
            <dd>
                <p><?php e($exp['summary']) ?></p>
            </dd>
        <?php endforeach; ?>

		</dl>
        <div class="margin-bottom-30"></div>
	</div>

</div>

<?php the_footer() ?>
<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
    <div class="container">
    <?php //print('<pre>'. print_r($data, true) .'</pre>'); die(); ?>
		<div class="ten columns">
            <div class="resume-titlebar">
				<img src="<?php asset('uploads/' . $data['resume']['photo']) ?>" alt="Jobseeker Profile Image" title="Jobseeker Profile Image">
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

				<a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Send Message to John Doe</h2>
					</div>

					<div class="small-dialog-content">
						<form action="#" method="get">
							<input type="text" placeholder="Full Name" value="">
							<input type="text" placeholder="Email Address" value="">
							<textarea placeholder="Message"></textarea>

							<button class="send">Send Application</button>
						</form>
					</div>
					
				</div>
				<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a>


			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<div class="padding-right">

		<h3>About Me</h3>

        <div>
            <?php e($data['resume']['description']) ?>
        </div>
        
        <div class="skills">
        <?php foreach($data['skills'] as $skill): ?>
            <span><?php e($skill['name'] . ' (' . $skill['difficulty'] . ')') ?></span>
        <?php endforeach; ?>
        </div>
        <div class="clearfix"></div>
        
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
                <small class="date"><?php e($exp['start_date']) ?> - <?php e($exp['end_date']) ?></small>
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
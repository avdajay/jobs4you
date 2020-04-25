<?php the_header(); ?>

<!-- Banner
================================================== -->
<div id="banner" class="with-transparent-header parallax background" style="background-image: url('<?php asset('images/banner-home-02.jpg') ?>')" data-img-width="2000" data-img-height="1330" data-diff="300">
<div class="container">
    <div class="sixteen columns">
        <div class="search-container">

            <!-- Form -->
            <form action="<?php url('/job') ?>" method="GET">
            <h2>Find from over <?php echo count($data['jobs']) ?> Jobs</h2>
            <input type="text" class="ico-01" placeholder="job title, keywords or company name" value="" name="keywords">
            <input type="text" class="ico-02" placeholder="city, province or region" value="" name="location">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <!-- Browse Jobs -->
            <div class="browse-jobs">
                Browse job offers by <!--<a href="browse-categories.html"> category</a>--> <a href="<?php url('/browse-locations') ?>">location</a>
            </div>
            
            <!-- Announce -->
<!-- 				<div class="announce">
                We’ve over <strong>15 000</strong> job offers for you!
            </div> -->

        </div>

    </div>
</div>
</div>


<!-- Content
================================================== -->

<!-- Categories -->
<div class="container">
<div class="sixteen columns">
    <h3 class="margin-bottom-20 margin-top-10">Popular Categories</h3>
        <!-- Popular Categories -->
        <div class="categories-boxes-container">
            
            <!-- Box -->
            <a href="<?php url('/job?category=3')?>" class="category-small-box">
                <i class="ln ln-icon-Bar-Chart"></i>
                <h4>Accouting / Finance</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=7')?>" class="category-small-box">
                <i class="ln ln-icon-Car"></i>
                <h4>Engineering</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=17')?>" class="category-small-box">
                <i class="ln  ln-icon-Worker"></i>
                <h4>Skilled Work / Technical</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=4')?>" class="category-small-box">
                <i class="ln  ln-icon-Student-Female"></i>
                <h4>Teaching / Education</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=8')?>" class="category-small-box">
                <i class="ln ln-icon-Medical-Sign"></i>
                <h4>Health / Medical / Science</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=10')?>" class="category-small-box">
                <i class="ln ln-icon-Plates"></i>
                <h4>Food / Restaurant</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=13')?>" class="category-small-box">
                <i class="ln ln-icon-Globe"></i>
                <h4>Logistics</h4>
            </a>

            <!-- Box -->
            <a href="<?php url('/job?category=2')?>" class="category-small-box">
                <i class="ln   ln-icon-Laptop-3"></i>
                <h4>IT / Computers / Programming</h4>
            </a>

        </div>

    <div class="clearfix"></div>
    <div class="margin-top-30"></div>

    <!-- <a href="<?php url('/browse-categories') ?>" class="button centered">Browse All Categories</a> -->
    <div class="margin-bottom-55"></div>
</div>
</div>


<div class="container">
<!-- Recent Jobs -->
<div class="eleven columns">
<div class="padding-right">
    <h3 class="margin-bottom-25">Recent Jobs</h3>
    <div class="listings-container">

        <!-- Listing -->
        <?php foreach($data['jobs'] as $job): ?>
        <a href="<?php url('/job') . e('?id='.$job['id']) ?>" class="listing <?php e(slug($job['etype'])) ?>">
            <div class="listing-logo">
                <img src="<?php asset('uploads/'. $job['logo']) ?>" alt="Company Logo" title="Company Logo">
            </div>
            <div class="listing-title">
                <h4><?php e($job['job_title']) ?><span class="listing-type"><?php e($job['etype']) ?></span></h4>
                <ul class="listing-icons">
                    <li><i class="ln ln-icon-Management"></i> <?php e($job['employer']) ?></li>
                    <li><i class="ln ln-icon-Map2"></i>  <?php e($job['lname']) ?></li>
                    <li><div class="listing-date">Posted: <?php echo Carbon\Carbon::parse($job['created_at'])->toFormattedDateString(); ?></div></li>
                </ul>
            </div>
        </a>
        <?php endforeach; ?>

    </div>

    <a href="<?php url('/browse-jobs') ?>" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
    <div class="margin-bottom-55"></div>
</div>
</div>

<!-- Job Spotlight -->
<div class="five columns">
    <h3 class="margin-bottom-5">Featured Jobs</h3>

    <!-- Navigation -->
    <div class="showbiz-navigation">
        <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
        <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>
    
    <!-- Showbiz Container -->
    <div id="job-spotlight" class="showbiz-container">
        <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1">
            <div class="overflowholder">

                <ul>

                    <?php foreach ($data['jobs'] as $job): ?>
                    <?php if (isset($job['featured_at'])): ?>
                    <li>
                        <div class="job-spotlight">
                            <a href="<?php url('/job?id='. $job['id']) ?>"><h4><?php e($job['job_title']) ?> <span class="<?php e(slug($job['etype'])) ?>"><?php e($job['etype']) ?></span></h4></a>
                            <span><i class="fa fa-briefcase"></i> <?php e($job['employer']) ?></span>
                            <span><i class="fa fa-map-marker"></i> <?php e($job['lname']) ?></span>
                            <p><?php e(truncate_desc($job['description'], 200)) ?></p>
                            <a href="<?php url('/job?id='. $job['id']) ?>" class="button">Apply For This Job</a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
</div>

<!-- Flip banner -->
<a href="<?php url('/browse-jobs') ?>" class="flip-banner" data-background="<?php asset('images/all-categories-photo.jpg') ?>" data-color="#26ae61" data-color-opacity="0.93">
<div class="flip-banner-content">
    <h2 class="flip-visible">Step inside and see for yourself!</h2>
    <h2 class="flip-hidden">Get Started <i class="fa fa-angle-right"></i></h2>
</div>
</a>
<!-- Flip banner / End -->

<!-- <div class="container">
<div class="sixteen columns">
    <h3 class="margin-bottom-25">Recent Posts</h3>
</div>

<div class="one-third column">

    <div class="recent-post">
        <div class="recent-post-img"><a href="blog-single-post.html"><img src="<?php asset('images/recent-post-01.jpg') ?>" alt=""></a><div class="hover-icon"></div></div>
        <a href="blog-single-post.html"><h4>Hey Job Seeker, It’s Time To Get Up And Get Hired</h4></a>
        <div class="meta-tags">
            <span>October 10, 2015</span>
            <span><a href="#">0 Comments</a></span>
        </div>
        <p>The world of job seeking can be all consuming. From secretly stalking the open reqs page of your dream company to sending endless applications.</p>
        <a href="blog-single-post.html" class="button">Read More</a>
    </div>
    
</div>

</div> -->

<?php the_footer(); ?>
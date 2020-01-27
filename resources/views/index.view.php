<?php the_header(); ?>

<!-- Banner
================================================== -->
<div id="banner" style="background: url('<?php asset('images/banner-home-01.jpg') ?>')">
<div class="container">
    <div class="sixteen columns">
        
        <div class="search-container">

            <!-- Form -->
            <h2>Find job</h2>
            <input type="text" class="ico-01" placeholder="job title, keywords or company name" value=""/>
            <input type="text" class="ico-02" placeholder="city, province or region" value=""/>
            <button><i class="fa fa-search"></i></button>

            <!-- Browse Jobs -->
            <div class="browse-jobs">
                Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
            </div>
            
            <!-- Announce -->
            <div class="announce">
                We’ve over <strong>15 000</strong> job offers for you!
            </div>

        </div>

    </div>
</div>
</div>


<!-- Content
================================================== -->

<!-- Categories -->
<div class="container">
<div class="sixteen columns">
    <h3 class="margin-bottom-25">Popular Categories</h3>
    <ul id="popular-categories">
        <li><a href="#"><i class="fa fa-line-chart"></i> Accounting / Finance</a></li>
        <li><a href="#"><i class="fa fa-wrench"></i> Automotive Jobs</a></li>
        <li><a href="#"><i class="fa fa-building-o"></i> Construction / Facilities</a></li>
        <li><a href="#"><i class="fa fa-graduation-cap"></i> Education Training</a></li>
        <li><a href="#"><i class="fa fa-medkit"></i> Healthcare</a></li>
        <li><a href="#"><i class="fa fa-cutlery"></i> Restaurant / Food Service</a></li>
        <li><a href="#"><i class="fa fa-globe"></i> Transportation / Logistics</a></li>
        <li><a href="#"><i class="fa fa-laptop"></i> Telecommunications</a></li>
    </ul>

    <div class="clearfix"></div>
    <div class="margin-top-30"></div>

    <a href="<?php url('/job/browse-categories') ?>" class="button centered">Browse All Categories</a>
    <div class="margin-bottom-50"></div>
</div>
</div>


<div class="container">

<!-- Recent Jobs -->
<div class="eleven columns">
<div class="padding-right">
    <h3 class="margin-bottom-25">Recent Jobs</h3>
    <ul class="job-list">

        <li class="highlighted"><a href="<?php url('/job/jobs') ?>">
            <img src="<?php asset('images/job-list-logo-01.png') ?>" alt="">
            <div class="job-list-content">
                <h4>Marketing Coordinator - SEO / SEM Experience <span class="full-time">Full-Time</span></h4>
                <div class="job-icons">
                    <span><i class="fa fa-briefcase"></i> King</span>
                    <span><i class="fa fa-map-marker"></i> Sydney</span>
                    <span><i class="fa fa-money"></i> $100 / hour</span>
                </div>
            </div>
            </a>
            <div class="clearfix"></div>
        </li>

        <li><a href="job-page.html">
            <img src="<?php asset('images/job-list-logo-02.png') ?>" alt="">
            <div class="job-list-content">
                <h4>Core PHP Developer for Site Maintenance <span class="part-time">Part-Time</span></h4>
                <div class="job-icons">
                    <span><i class="fa fa-briefcase"></i> Cubico</span>
                    <span><i class="fa fa-map-marker"></i> London</span>
                    <span><i class="fa fa-money"></i> $50 / hour</span>
                </div>
            </div>
            </a>
            <div class="clearfix"></div>
        </li>

        <li><a href="job-page.html">
            <img src="<?php asset('images/job-list-logo-03.png') ?>" alt="">
            <div class="job-list-content">
                <h4>Restaurant Team Member - Crew <span class="full-time">Full-Time</span></h4>
                <div class="job-icons">
                    <span><i class="fa fa-briefcase"></i> King</span>
                    <span><i class="fa fa-map-marker"></i> Sydney</span>
                    <span><i class="fa fa-money"></i> $15 / hour</span>
                </div>
            </div>
            </a>
            <div class="clearfix"></div>
        </li>

        <li><a href="job-page.html">
            <img src="<?php asset('images/job-list-logo-04.png') ?>" alt="">
            <div class="job-list-content">
                <h4>Power Systems User Experience Designer  <span class="internship">Internship</span></h4>
                <div class="job-icons">
                    <span><i class="fa fa-briefcase"></i> Hexagon</span>
                    <span><i class="fa fa-map-marker"></i> London</span>
                    <span><i class="fa fa-money"></i> $75 / hour</span>
                </div>
            </div>
            </a>
            <div class="clearfix"></div>
        </li>

        <li><a href="job-page.html">
            <img src="<?php asset('images/job-list-logo-05.png') ?>" alt="">
            <div class="job-list-content">
                <h4>iPhone / Android Music App Development <span class="temporary">Temporary</span></h4>
                <div class="job-icons">
                    <span><i class="fa fa-briefcase"></i> Mates</span>
                    <span><i class="fa fa-map-marker"></i> New York</span>
                    <span><i class="fa fa-money"></i> $115 / hour</span>
                </div>
            </div>
            </a>
            <div class="clearfix"></div>
        </li>
    </ul>

    <a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
    <div class="margin-bottom-55"></div>
</div>
</div>

<!-- Job Spotlight -->
<div class="five columns">
    <h3 class="margin-bottom-5">Job Spotlight</h3>

    <!-- Navigation -->
    <div class="showbiz-navigation">
        <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
        <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
    </div>
    <div class="clearfix"></div>
    
    <!-- Showbiz Container -->
    <div id="job-spotlight" class="showbiz-container">
        <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
            <div class="overflowholder">

                <ul>

                    <li>
                        <div class="job-spotlight">
                            <a href="#"><h4>Social Media: Advertising Coordinator <span class="part-time">Part-Time</span></h4></a>
                            <span><i class="fa fa-briefcase"></i> Mates</span>
                            <span><i class="fa fa-map-marker"></i> New York</span>
                            <span><i class="fa fa-money"></i> $20 / hour</span>
                            <p>As advertising & content coordinator, you will support our social media team in producing high quality social content for a range of media channels.</p>
                            <a href="job-page.html" class="button">Apply For This Job</a>
                        </div>
                    </li>

                    <li>
                        <div class="job-spotlight">
                            <a href="#"><h4>Prestashop / WooCommerce Product Listing <span class="freelance">Freelance</span></h4></a>
                            <span><i class="fa fa-briefcase"></i> King</span>
                            <span><i class="fa fa-map-marker"></i> London</span>
                            <span><i class="fa fa-money"></i> $25 / hour</span>
                            <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque lorem quis enim venenatis pellentesque.</p>
                            <a href="job-page.html" class="button">Apply For This Job</a>
                        </div>
                    </li>

                    <li>
                        <div class="job-spotlight">
                            <a href="#"><h4>Logo Design <span class="freelance">Freelance</span></h4></a>
                            <span><i class="fa fa-briefcase"></i> Hexagon</span>
                            <span><i class="fa fa-map-marker"></i> Sydney</span>
                            <span><i class="fa fa-money"></i> $10 / hour</span>
                            <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Etiam tincidunt libero quis commodo.</p>
                            <a href="job-page.html" class="button">Apply For This Job</a>
                        </div>
                    </li>


                </ul>
                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
</div>


<!-- Testimonials -->
<div id="testimonials">
<!-- Slider -->
<div class="container">
    <div class="sixteen columns">
        <div class="testimonials-slider">
                <ul class="slides">
                <li>
                    <p>I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back.
                    <span>Collis Ta’eed, Envato</span></p>
                </li>

                <li>
                    <p>Nam eu eleifend nulla. Duis consectetur sit amet risus sit amet venenatis. Pellentesque pulvinar ante a tincidunt placerat. Donec dapibus efficitur arcu, a rhoncus lectus egestas elementum.
                    <span>John Doe</span></p>
                </li>
                
                <li>
                    <p>Maecenas congue sed massa et porttitor. Duis placerat commodo ex, ut faucibus est facilisis ac. Donec eleifend arcu sed sem posuere aliquet. Etiam lorem metus, suscipit vel tortor vitae.
                    <span>Tom Smith</span></p>
                </li>

                </ul>
        </div>
    </div>
</div>
</div>


<!-- Infobox -->
<div class="infobox">
<div class="container">
    <div class="sixteen columns">Start Building Your Own Job Board Now <a href="my-account.html">Get Started</a></div>
</div>
</div>


<!-- Recent Posts -->
<div class="container">
<div class="sixteen columns">
    <h3 class="margin-bottom-25">Recent Posts</h3>
</div>


<div class="one-third column">

    <!-- Post #1 -->
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


<div class="one-third column">

    <!-- Post #2 -->
    <div class="recent-post">
        <div class="recent-post-img"><a href="blog-single-post.html"><img src="<?php asset('images/recent-post-02.jpg') ?>" alt=""></a><div class="hover-icon"></div></div>
        <a href="blog-single-post.html"><h4>How to "Woo" a Recruiter and Land Your Dream Job</h4></a>
        <div class="meta-tags">
            <span>September 12, 2015</span>
            <span><a href="#">0 Comments</a></span>
        </div>
        <p>Struggling to find your significant other the perfect Valentine’s Day gift? If I may make a suggestion: woo a recruiter. </p>
        <a href="blog-single-post.html" class="button">Read More</a>
    </div>

</div>

<div class="one-third column">

    <!-- Post #3 -->
    <div class="recent-post">
        <div class="recent-post-img"><a href="blog-single-post.html"><img src="<?php asset('images/recent-post-03.jpg') ?>" alt=""></a><div class="hover-icon"></div></div>
        <a href="blog-single-post.html"><h4>11 Tips to Help You Get New Clients Through Cold Calling</h4></a>
        <div class="meta-tags">
            <span>August 27, 2015</span>
            <span><a href="#">0 Comments</a></span>
        </div>
        <p>If your dream employer appears on this list, you’re certainly in good company. But it also means you’re up for some intense competition.</p>
        <a href="blog-single-post.html" class="button">Read More</a>
    </div>
</div>

</div>

<?php the_footer(); ?>
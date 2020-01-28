<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Manage Jobs</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Job Dashboard</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Table -->
	<div class="sixteen columns">

		<p class="margin-bottom-25">Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.</p>

		<table class="manage-table responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-check-square-o"></i> Filled?</th>
				<th><i class="fa fa-calendar"></i> Date Posted</th>
				<th><i class="fa fa-calendar"></i> Date Expires</th>
				<th><i class="fa fa-user"></i> Applications</th>
				<th></th>
			</tr>
					
			<!-- Item #1 -->
			<tr>
				<td class="title"><a href="#">Marketing Coordinator - SEO / SEM Experience <span class="pending">(Pending Approval)</span></a></td>
				<td class="centered">-</td>
				<td>September 30, 2015</td>
				<td>October 10, 2015</td>
				<td class="centered">-</td>
				<td class="action">
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td>
			</tr>
					
			<!-- Item #2 -->
			<tr>
				<td class="title"><a href="#">Web Developer - Front End Web Development, Relational Databases</a></td>
				<td class="centered">-</td>
				<td>September 30, 2015</td>
				<td>October 10, 2015</td>
				<td class="centered"><a href="manage-applications.html" class="button">Show (4)</a></td>
				<td class="action">
					<a href="#"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#"><i class="fa  fa-check "></i> Mark Filled</a>
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td>
			</tr>	

			<!-- Item #2 -->
			<tr>
				<td class="title"><a href="#">Power Systems User Experience Designer</a></td>
				<td class="centered"><i class="fa fa-check"></i></td>
				<td>May 16, 2015</td>
				<td>June 30, 2015</td>
				<td class="centered"><a href="manage-applications.html" class="button">Show (9)</a></td>
				<td class="action">
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td>
			</tr>

		</table>

		<br>
		<a href="#" class="button">Add Job</a>

	</div>

</div>

<?php the_footer() ?>
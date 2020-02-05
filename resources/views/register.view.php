<?php the_header(); ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>Create an Account</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Register</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="my-account">
        <!-- Register -->
        <?php if (!empty($_SESSION['message'])): ?>
            <?php foreach ($_SESSION['message'] as $error): ?>
                <div class="notification error closeable">
                    <p><span><?php echo 'Error! '?></span><?php echo $error['error']; ?></p>
                    <a class="close" href="#"></a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="tab-content" id="tab2" style="display: none;">

            <form method="POST" class="register" action="<?php url('/register') ?>">
                
            <p class="form-row form-row-wide">
                <label for="email2">Email Address:
                    <i class="ln ln-icon-Mail"></i>
                    <input type="email" class="input-text" name="email">
                </label>
            </p>

            <p class="form-row form-row-wide">
                <label for="password1">Password:
                    <i class="ln ln-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password">
                </label>
            </p>

            <p class="form-row form-row-wide">
                <label for="password2">Repeat Password:
                    <i class="ln ln-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="confirm">
                </label>
            </p>

            <p class="form-row form-row-wide">
                <label for="role">Account Type:
                    <select data-placeholder="Choose Category" class="chosen-select-no-single" name="role">
                        <option selected="selected" value="1">Jobseeker</option>
                        <option value="2">Employer</option>
                    </select>
                </label>
            </p>

            <p class="form-row">
                <input type="submit" class="button border fw margin-top-10" name="submit">
            </p>

            </form>
        </div>
	</div>
</div>

<?php the_footer(); ?>
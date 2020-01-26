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

<!-- Container -->
<div class="container">
    <div class="my-account">
        <!-- Register -->
		<div class="tab-content" id="tab2" style="display: none;">
            <h3 class="margin-bottom-10 margin-top-10">Register</h3>
            <form method="post" class="register" action="<?php url('register') ?>">
                <p class="form-row form-row-wide">
                    <label for="reg_email">Email Address:</label>
                    <input type="email" class="input-text" name="email" id="reg_email" value="" />
                </p>
                
                <p class="form-row form-row-wide">
                    <label for="reg_password">Password:</label>
                    <input type="password" class="input-text" name="password" id="reg_password" />
                </p>

                <p class="form-row form-row-wide">
                    <label for="reg_password2">Repeat Password:</label>
                    <input type="password" class="input-text" name="password-again" id="reg_password2" />
                </p>
      
                <p class="form-row">
                    <input type="submit" class="button" name="submit" value="Register" />
                </p>
                
            </form>
        </div>
    </div>
</div>

<?php the_footer(); ?>
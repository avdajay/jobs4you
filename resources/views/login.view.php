<?php the_header(); ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Login to Jobs4You</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li>Login</li>
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
        <!-- Login -->
        <div class="tab-content" id="tab1" style="display: none;">
            <form method="post" class="login">

                <p class="form-row form-row-wide">
                    <label for="username">Username:
                        <i class="ln ln-icon-Male"></i>
                        <input type="text" class="input-text" name="username" id="username" value="">
                    </label>
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password:
                        <i class="ln ln-icon-Lock-2"></i>
                        <input class="input-text" type="password" name="password" id="password">
                    </label>
                </p>

                <p class="form-row">
                    <input type="submit" class="button border fw margin-top-10" name="login" value="Login">

                    <label for="rememberme" class="rememberme">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label>
                </p>

                <p class="lost_password">
                    <a href="#">Lost Your Password?</a>
                </p>
                
            </form>
        </div>
    </div>
</div>

<?php the_footer(); ?>
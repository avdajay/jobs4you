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

<!-- Container -->
<div class="container">
    <div class="my-account">
        <!-- Login -->
        <div class="tab-content" id="tab1" style="display: none;">
            <h3 class="margin-bottom-10 margin-top-10">Login</h3>
            <form method="post" class="login" action="<?php url('login') ?>">        
                <p class="form-row form-row-wide">
                    <label for="email">Email Address:</label>
                    <input type="email" class="input-text" name="email" id="username" value="" />
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password:</label>
                    <input class="input-text" type="password" name="password" id="password" />
                </p>

                <p class="form-row">
                    <input type="submit" class="button" name="submit" value="Login" />
                </p>

                <p class="lost_password">
                    <a href="#" >Lost Your Password?</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php the_footer(); ?>
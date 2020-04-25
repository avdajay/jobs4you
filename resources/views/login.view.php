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
        <?php if (!empty($_SESSION['message'])): ?>
            <?php foreach ($_SESSION['message'] as $error): ?>
                <div class="notification error closeable">
                    <p><span><?php echo 'Error! '?></span><?php echo $error['error']; ?></p>
                    <a class="close" href="#"></a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="tab-content" id="tab1" style="display: none;">
            <form method="POST" class="login" action="<?php url('/login') ?>">

                <p class="form-row form-row-wide">
                    <label for="username">Email Address:
                        <i class="ln ln-icon-Male"></i>
                        <input type="email" class="input-text" name="email" id="email">
                    </label>
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password:
                        <i class="ln ln-icon-Lock-2"></i>
                        <input class="input-text" type="password" name="password" id="password">
                    </label>
                </p>

                <p class="form-row">
                    <input type="submit" class="button border fw margin-top-10" name="submit">
                </p>

                <!-- <p class="lost_password">
                    <a href="#">Lost Your Password?</a>
                </p> -->
                
            </form>
        </div>
    </div>
</div>

<?php the_footer(); ?>
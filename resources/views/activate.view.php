<?php the_header() ?>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>Activate Account</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>You are here:</li>
                    <li><a href="<?php url('/') ?>">Home</a></li>
                    <li>Activate</li>
                </ul>
            </nav>
        </div>

    </div>
</div>


<div class="container">
    <div class="sixteen columns">
        <?php if (isset($_SESSION['message'])): ?>
            <?php foreach ($_SESSION['message'] as $error): ?>
                <div class="notification error closeable">
                    <p><span><?php echo 'Error! '?></span><?php echo $error['error']; ?></p>
                    <a class="close" href="#"></a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <h4>We've emailed you an activation code!</h4>
        <p>As part of the registration process, we require all new users to activate their accounts to access other areas of the site and to verify the authenticy of each email address. Please enter your activation token below to activate your account. Check out for your emails, don't forget to check on spam too.</p>
        <form method="GET" action="<?php url('/activate') ?>">
            <p class="form-row form-row-wide">
                <label for="username">Activation Token:
                    <input type="text" class="input-text" name="token" value="<?php echo $token = isset($_GET['token']) ? $_GET['token'] : '' ?>">
                </label>
            </p>
            <p class="form-row">
                <input type="submit" class="button border fw margin-top-10" name="submit">
            </p>
        </form>
    </div>
</div>
<?php the_footer() ?>
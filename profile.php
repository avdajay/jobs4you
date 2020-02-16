<?php

require __DIR__ . '/bootstrap.php';

$profile = new AccountController();

if (isset($_POST['update_profile']))
{
    $profile->update_profile();
}
else if (isset($_POST['change_pass']))
{
    $profile->change_password();
}

$profile->profile();
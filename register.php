<?php

require './bootstrap.php';

$auth = new AuthController();

if (isset($_POST['submit']))
{
    $auth->insert();
}

$auth->register();
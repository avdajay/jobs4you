<?php

require './bootstrap.php';

$auth = new AuthController();

if (isset($_POST['submit']))
{
    $auth->insert();
    header('Location: login.php');
}


$auth->register();
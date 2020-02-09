<?php

require_once './bootstrap.php';

$activate = new AuthController();

if (isset($_GET['submit']))
{
    $activate->handleActivation($_GET['token']);
}

$activate->activate();
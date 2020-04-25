<?php

require_once __DIR__ . '/../bootstrap.php';

$admin = new AdminController();

if (isset($_POST['manual']))
{
    $admin->manualActivate();
}

if (isset($_POST['verify']))
{
    $admin->verifyAccount();
}

if (isset($_POST['activation']))
{
    $admin->resendActivation();
}

if (isset($_POST['suspend']))
{
    $admin->suspend();
}

if (isset($_POST['unsuspend']))
{
    $admin->unsuspend();
}

if (isset($_GET['view']) && isset($_GET['role']))
{
    $admin->preview($_GET['view'], $_GET['role']);
}
else
{
$admin->users();
}
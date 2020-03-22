<?php

require_once __DIR__ . '/../bootstrap.php';

$admin = new AdminController();

if (isset($_POST['featured']))
{
    $admin->addFeatured();
}

if (isset($_POST['deleted']))
{
    $admin->deleteJobAdmin();
}

$admin->jobs();
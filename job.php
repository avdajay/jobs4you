<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['apply']))
{
    $job->apply();
}

if (isset($_GET['location']))
{
    $job->locationSearch($_GET['location']);
}
elseif (isset($_GET['keywords']) && isset($_GET['location']))
{
    $job->indexSearch($_GET['keywords'], $_GET['location']);
}
elseif (isset($_GET['id']))
{
    $job->single($_GET['id']);
}
else
{
    $job->browse();    
}

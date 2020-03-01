<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['apply']))
{
    $job->apply();
}

if (isset($_GET['id']))
{
    $job->single($_GET['id']);
}
else
{
    $job->browse();    
}

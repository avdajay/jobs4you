<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_GET['add']))
{
    $job->add();
}
else if (isset($_GET['id']))
{
    $job->single($_GET['id']);
}
else
{
    $job->browse();    
}

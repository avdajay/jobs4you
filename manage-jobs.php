<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['update']))
{
    $job->update();
}

if (isset($_POST['filled']))
{
    $job->filled();
}

if (isset($_GET['edit']))
{
    $job->edit($_GET['edit']);
}
else
{
    $job->manage();
}
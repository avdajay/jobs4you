<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_GET['add']))
{
    $job->add();
}
else
{
    $job->single();
}

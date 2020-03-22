<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['add-job']))
{
    $job->insert();
}
$job->add();
<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['saveNote']))
{
    $job->employerNotes();
}

if (isset($_POST['statusRating']))
{
    $job->setStatusRating();
}

$job->applications();
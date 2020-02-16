<?php

require __DIR__ . '/bootstrap.php';

$addResumeView = new DashboardController();
$processResume = new ResumeController();

if (isset($_POST['save_resume']))
{
    $processResume->save();
}

$addResumeView->addResumeView();
<?php

require __DIR__ . '/bootstrap.php';

$resume = new ResumeController();

if (isset($_POST['save_resume']))
{
    $resume->save();
}

$resume->add_resume_view();
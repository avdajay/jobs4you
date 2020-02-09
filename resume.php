<?php

require __DIR__ . '/bootstrap.php';

$resume = new ResumeController();

if (isset($_GET['id']))
{
    $resume->show($_GET['id']);
}

$resume->index();
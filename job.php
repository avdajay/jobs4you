<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

if (isset($_POST['apply']))
{
    $job->apply();
}

if (isset($_GET['category']))
{
    $job->categorySearch($_GET['category']);
}
elseif (isset($_GET['location']))
{
    $job->locationSearch($_GET['location']);
}
elseif (isset($_GET['keywords']) && isset($_GET['location']))
{
    $job->indexSearch($_GET['keywords'], $_GET['location']);
}
elseif (isset($_GET['category']) && isset($city) && isset($_GET['type']))
{
    $job->filter($_GET['category'], $_GET['city'], $_GET['type']);
}
elseif (isset($_GET['id']))
{
    $job->single($_GET['id']);
}
else
{
    $job->browse();    
}

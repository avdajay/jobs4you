<?php

require __DIR__ . '/bootstrap.php';

$job = new JobController();

// For applying jobs
if (isset($_POST['apply'])) {
    $job->apply();
}

// Logic for controlling views
if (isset($_GET['id'])) {
    $job->single($_GET['id']);
} else if (isset($_GET['keywords']) && isset($_GET['location'])) {
    $job->indexSearch($_GET['keywords'], $_GET['location']);
} else if (isset($_GET['category']) && isset($_GET['city']) && isset($_GET['type'])) {
    $job->filter($_GET['category'], $_GET['city'], $_GET['type']);
} else if (isset($_GET['category'])) {
    $job->categorySearch($_GET['category']);
} else if (isset($_GET['location'])) {
    $job->locationSearch($_GET['location']);
} else {
    $job->browse();
}

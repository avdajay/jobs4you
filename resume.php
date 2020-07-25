<?php

require __DIR__ . '/bootstrap.php';

$resume = new ResumeController();

if (isset($_POST['message'])) {
    $resume->messageFromResume();
}

if (isset($_POST['bookmark'])) {
    $resume->bookmark();
}

if (isset($_GET['id'])) {
    $resume->show($_GET['id']);
} elseif (isset($_GET['location']) && isset($_GET['title'])) {
    $resume->filter($_GET['location'], $_GET['title']);
} else {
    $resume->index();
}

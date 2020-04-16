<?php

require __DIR__ . '/bootstrap.php';

$messages = new MessageController();

if (isset($_POST['reply']))
{
    $messages->reply($_GET['id']);
}

if (isset($_GET['id']))
{
    $messages->view($_GET['id']);
}
else
{
    $messages->index();
}

<?php

require __DIR__ . '/bootstrap.php';

$auth = new AuthController();

if (isset($_POST['submit']))
{
	$auth->authenticate($_POST['email'], $_POST['password']);
}

$auth->login();
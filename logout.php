<?php

require_once __DIR__ . '/bootstrap.php';

// unset all session and destroy current session
$_SESSION = array();
session_destroy();

// redirect home
header("Location: /");
<?php

// Define constant global values
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOST', $_SERVER['HTTP_HOST']);

// The entry point for most files
// Requires all important files including class and vendor files and useful helper functions

// Start the application session
session_start();

$_SESSION['message'] = array();
$_SESSION['success'] = array();

//Development Mode;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';
require __DIR__ . '/functions.php';

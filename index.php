<?php

// require bootstrap file
require_once __DIR__ . '/bootstrap.php';

// create a new HomeController instance passing the current user as parameter
$home = new HomeController();
$home->index(1);
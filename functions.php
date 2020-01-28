<?php

// Global Functions
function the_header()
{
    require_once ROOT . '/resources/includes/header.inc.php';
}

function the_footer()
{
    require_once ROOT . '/resources/includes/footer.inc.php';
}

function the_dashfoot()
{
    require_once ROOT. '/resources/includes/dashboard-footer.inc.php';
}

function the_sidebar()
{
    require_once ROOT . '/resources/includes/sidebar.inc.php';
}

function config($name, $option)
{
    $config = include ROOT . '/config/' . $name . '.php';
    echo $config[$option];
}

function asset($path)
{
    echo '/public/'. $path;
}

function view($name, $data = [])
{
    require ROOT. '/resources/views/' . $name . '.view.php';
}

function url($path)
{
	echo $path;
}

function out($output)
{
    echo htmlspecialchars($output);
}

function redirect($route)
{
    header('Location: ' . $route);
}
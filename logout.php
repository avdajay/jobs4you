<?php

// destroy current session
session_destroy();

// redirect home
header("Location: login.php");
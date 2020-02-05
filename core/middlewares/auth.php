<?php

if (!isset($_SESSION['uid']))
{
	return redirect('login');
}
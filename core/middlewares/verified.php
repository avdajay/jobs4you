<?php

if (!isset($_SESSION['act']))
{
	return redirect('activate');
}
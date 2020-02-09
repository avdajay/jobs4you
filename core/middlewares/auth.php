<?php

if (empty($_SESSION['uid']))
{
	return redirect('login');
}
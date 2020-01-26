<?php

if (!(isset($_SESSION['login']) && $_SESSION['login'] != ''))
{
	return redirect('login');
}
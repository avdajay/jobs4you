<?php

if (!empty($_SESSION['uid']) && empty($_SESSION['act']))
{
	return redirect('activate');
}
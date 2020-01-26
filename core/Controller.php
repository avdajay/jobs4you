<?php

abstract class Controller
{   
    public function middleware($collections = [])
	{
		$path = $_SERVER['DOCUMENT_ROOT']. '/core/middlewares/';
		
		foreach($collections as $collection)
		{
			require $path . $collection . '.php';
		}
	}
	
	public function validate($input, $format)
	{
		switch($format)
		{
			case 'email':
			case 'number':
			case 'date':
			default:
				return false;
		}
	}

	public function sanitize($data)
	{
		$data = htmlspecialchars(stripslashes(trim($data)));
		return $data;
	}
}
<?php

abstract class Controller
{
	public function middleware($collections = [])
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . '/core/middlewares/';

		foreach ($collections as $collection) {
			require $path . $collection . '.php';
		}
	}

	public function validateDate($date, $format = 'Y-m-d')
	{
		$checkedDate = Carbon\Carbon::createFromFormat($format, $date);
		return $checkedDate && $checkedDate->format($format) === $date;
	}

	public function sanitize($data)
	{
		$data = htmlspecialchars(stripslashes(trim($data)));
		return $data;
	}
}

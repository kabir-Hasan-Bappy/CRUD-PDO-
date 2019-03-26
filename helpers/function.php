<?php

if (!function_exists('connection')) {

	function connection()

	{
		$con= null;
		$server= 'mysql:dbname=crud;host=127.0.0.1';
		$user= 'root';
		$pass= '';

		try{
			$con= new PDO($server, $user, $pass);

			$con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$con-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		}
		catch(PDOException $e){

			echo $e->getmessage();

		}
		return $con;
	}

}


if (!function_exists('is_logged_in')) {

	function is_logged_in()

	{
		return isset($_SESSION['id'], $_SESSION['email'],$_SESSION['name'],$_SESSION['photo'],$_SESSION['role']);
		exit();
	}
}


if (!function_exists('is_admin')) {

	function is_admin()

	{
		return $_SESSION['role'] == 'admin';
		exit();
	}
}
if (!function_exists('redirect')) {

	function redirect($location= '/')

	{
		header('Location: '.$location.'.php');
		exit();
	}
}
if (!function_exists('notification')) {

	function notification($message, $type='success')

	{
		$_SESSION['message']= $message;
		$_SESSION['type']= $type;
	}
}



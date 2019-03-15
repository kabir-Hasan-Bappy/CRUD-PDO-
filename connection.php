<?php
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
 
	
	?>
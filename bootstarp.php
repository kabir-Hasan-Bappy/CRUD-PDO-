<?php

 require_once 'vendor/autoload.php';
 $con= connection();
 session_start();



 $message= $_SESSION['message'] ?? null;
 $type= $_SESSION['type'] ?? null;

 ?>
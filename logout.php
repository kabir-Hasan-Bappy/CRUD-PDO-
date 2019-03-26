<?php 
  require_once 'bootstarp.php';
$session= $_SESSION['id'];
unset($session);

session_destroy();

redirect('login');
?>
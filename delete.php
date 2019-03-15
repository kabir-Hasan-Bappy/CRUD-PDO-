<?php 

require_once 'connection.php';

$id = (int)trim($_GET['id']);


$query = 'DELETE FROM customers WHERE id=:id';


$stmt = $con -> prepare($query);
$stmt ->bindParam(':id', $id, PDO::PARAM_INT);
$stmt ->execute();

header('Location:index.php');




 ?>
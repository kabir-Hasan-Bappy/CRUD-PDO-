<?php 
  require_once 'bootstarp.php';


if (!is_logged_in()) {
    notification('You have to log in', 'danger');
    redirect('login');
   


if (!is_admin()) {
    notification('You are not admin', 'danger');
    redirect('dashboard');
}

}

if ($_SESSION['id']==$id) {
	redirect('dashboard');

    exit();
}

$id = (int)trim($_GET['id']);


$query = 'DELETE FROM customers WHERE id=:id';


$stmt = $con -> prepare($query);
$stmt ->bindParam(':id', $id, PDO::PARAM_INT);
$stmt ->execute();

redirect('index');




 ?>
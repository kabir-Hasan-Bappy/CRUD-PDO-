<?php
require_once 'bootstarp.php';


if (!is_logged_in()) {
    notification('You have to login first.', 'danger');
    redirect('login');

}
if (isset($_POST['edit'])) {
    // print_r($_POST);
    // exit();
    $id= $_POST['cusid'];
   
    if (!empty($_FILES['photo']['name'])) {
        $file = $_FILES['photo']['tmp_name'];
        $file_parts = explode('.', $_FILES['photo']['name']);
        $extension = end($file_parts);
        $filename = uniqid('photo_', true) . time() . '.' . $extension;
        $destination = 'uploads/pic/' . $filename;
        move_uploaded_file($file, $destination);
        $query = 'UPDATE customers SET photo=:photo WHERE id=:id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':photo', $filename);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    if (!empty($_POST['email'])) {
        $email = trim($_POST['email']);
        $query = 'UPDATE customers SET email=:email WHERE id=:id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    if (!empty($_POST['password'])) {
        $password = trim($_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = 'UPDATE customers SET password=:password WHERE id=:id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    if (!empty($_POST['name'])) {
        $name = trim($_POST['name']);
        $query = 'UPDATE customers SET name=:name WHERE id=:id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    notification('Profile  updated.');
    redirect('edit');
}
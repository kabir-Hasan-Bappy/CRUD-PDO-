<?php
require_once 'bootstarp.php';
$token = $_GET['token'] ?? null;
if ($token === null || empty($token)) {
    redirect('add');
}
$query = 'SELECT id FROM customers WHERE email_verification_token = :token';
$stmt = $con->prepare($query);
$stmt->bindParam(':token', $token);
$stmt->execute();
$user = $stmt->fetch();
if ($stmt->rowCount() === 1) {
    $id = (int)$user['id'];
    $query = "UPDATE customers SET email_verification_token = '', email_verified = 1 WHERE id = '$id'";
    $stmt = $con->query($query);
    $stmt->execute();
    notification('Account activated. You can login now.');
    redirect('login');
}
notification('Invalid token.');
redirect('add');

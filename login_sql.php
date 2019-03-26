<?php

require_once 'bootstarp.php';

if (is_logged_in()) {
    redirect('dashboard');
}
  
if (isset($_POST['login'])) {

  $email= $_POST['email'];
  $password= trim($_POST['password']);

  $query= 'SELECT id, name, email, password, photo, role FROM customers WHERE email=:email';
  $stmt= $con->prepare($query);
  $stmt-> bindParam(':email', $email);
  $stmt->execute();

  $customer= $stmt->fetch();
  
  if ($customer) {
    if (password_verify($password, $customer['password'])==true) {

      $message="log in Successfull";
      $_SESSION['id']= $customer['id'];
      $_SESSION['email']= $customer['email'];
      $_SESSION['name']= $customer['name'];
      $_SESSION['photo']= $customer['photo'];
      $_SESSION['role']= $customer['role'];
      redirect('dashboard');

     

    }
    else{
       notification('Invalid Password','danger');
            redirect('login');
    }

    # code...
  }
  else{
  notification('Invalid Email','danger');
            redirect('login');
  }


}


?>
<?php
if (isset($_POST['login'])) {

  $email= $_POST['email'];
  $password= trim($_POST['password']);

  require_once 'connection.php';

  $q= 'SELECT id, email, password FROM customers WHERE email=:email';
  $stmt= $con->prepare($q);
  $stmt-> bindParam(':email', $email);
  $stmt->execute();

  $customer= $stmt->fetch();
  
  if ($customer) {
    if (md5($password, $customer['password'])==true) {

    $message="log in Successfull";
    # code...
  }
  else{
    $message= "invalid password";
  }
  
    # code...
  }
  else{
    $message= 'Email doesnot exist';
  }

    
}


?>


<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
    <title>User Log in </title>
</head>
<body>
   <div class="container py-5 border">


    <?php if (isset($message)): ?>

    <div class="alert alert-success">

        <?php echo $message; ?>

    </div>
    <?php endif; ?>
    <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="py-3">  Customer Login <a style="float:right" href="index.php"> Back</a></h3>
        <div class="panel-body">
            <form action="" method="post" class="form-group" enctype="multipart/form-data">
                

              <div class="form-group">
                <label for="">Email: </label>
                    <input type="email" class="form-control" name="email" required="Please fill up">
                </div>

                <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" class="form-control" name="password" required="Please fill up">
                </div>

                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-center" class="form-control" name="login" value="Log In" onclick="return msg()" />       
                </div>

            </form>
        </div>

    </div>
</div>
</div>
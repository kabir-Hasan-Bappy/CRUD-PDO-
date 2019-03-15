<?php
if (isset($_POST['submit'])) {
    if (!empty($_FILES['photo']['name'])) {

        $file = $_FILES['photo']['tmp_name'];
        $file_parts = explode('.', $_FILES['photo']['name']);
        $extension = end($file_parts);
        $photo = uniqid('photo_', true) .time() . '.' . $extension;
        $destination = 'upload/pic/' .  $photo;

  //die($filename);
        move_uploaded_file($file, $destination);

    }


    if (!empty($_POST['email']) || !empty($_POST['password'])) {

        require_once 'connection.php';

        
        $name= trim($_POST['name']);
        $gender= $_POST['gender'];
        $email= trim($_POST['email']);
        $password=$_POST['password'];
        $password = md5($password);


        try{

            $query= 'INSERT INTO customers(name,gender,email,password,photo) VALUES (:name,:gender,:email,:password,:photo)';

            $stmt= $con->prepare($query);
            $stmt-> bindParam(':name', $name);
            $stmt-> bindParam(':gender', $gender);
            $stmt-> bindParam(':email', $email);
            $stmt-> bindParam(':password', $password);
            $stmt-> bindParam(':photo', $photo);
            $stmt-> execute();
            $con ->lastInsertId();

            $message= "Registration Successfull";

        }

        catch(Exception $e){
            $message= $e->getmessage();
        }


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
	
    <title>CRUD OPERATION </title>
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
        <h3 class="py-3"> Add Customer <a style="float:right" href="index.php"> Back</a></h3>
        <div class="panel-body">
            <form action="" method="post" class="form-group" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Customer Name: </label>
                    <input type="text" class="form-control" name="name" required="Please fill up">
                </div>

                <div class="form-group">
                 Gender:  <label class="radio-inline">
                  <input type="radio" name="gender" value="male" checked>Male
              </label>
              <label class="radio-inline">
                  <input type="radio" value="female" name="gender">Female
              </label></div>

              <div class="form-group">
                <label for="">Email: </label>
                    <input type="email" class="form-control" name="email" required="Please fill up">
                </div>

                <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" class="form-control" name="password" required="Please fill up">
                </div>

                <div class="form-group">
                    <label for="">Photo: </label>
                    <input type="file" class="form-control" name="photo" >
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-center" class="form-control" name="submit" value="Add" onclick="return msg()" />       
                </div>

            </form>
        </div>

    </div>
</div>
</div><!-- 
<script>
    function msg(){
        alert("Data Insert Successfully");
        return true;
    }

</script> -->
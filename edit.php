<?php
require_once 'connection.php';

$id= (int)trim($_GET['id']);

if ($id==0) {

    header('Location:index.php');

}

if (isset($_POST['edit'])) {
    if (!empty($_FILES['photo']['name'])) {

        $file = $_FILES['photo']['tmp_name'];
        $file_parts = explode('.', $_FILES['photo']['name']);
        $extension = end($file_parts);
        $photo = uniqid('photo_', true) .time() . '.' . $extension;
        $destination = 'upload/pic/' .  $photo;

  //die($filename);
        move_uploaded_file($file, $destination);

        $q= 'UPDATE customers SET photo=:photo WHERE id=:id';

        $stmt= $con->prepare($q);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount()==1) {
            $message= "Data Updated";
    # code...
        }
        else{
            $message= "Not Updated";

        }


    }


    if (!empty($_POST['email'])) {
        $email= trim($_POST['email']);
        $q= 'UPDATE customers SET email=:email WHERE id=:id';

        $stmt= $con->prepare($q);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        

        
    }

    if (!empty($_POST['password'])) {
        $password= trim($_POST['password']);
        $password= password_hash($password, PASSWORD_BCRYPT);
        $q= 'UPDATE customers SET password=:password WHERE id=:id';

        $stmt= $con->prepare($q);
        $stmt->bindParam(':password', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        


        
    } 

    if (!empty($_POST['name'])) {
        $email= trim($_POST['name']);
        $q= 'UPDATE customers SET name=:name WHERE id=:id';

        $stmt= $con->prepare($q);
        $stmt->bindParam(':name', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        

                    $message= "Data Updated";

    }  
}

$q= 'SELECT name, email, password, photo FROM customers WHERE id=:id';
$stmt= $con->prepare($q);
$stmt->bindParam(':id', $id);
$stmt->execute();

$customer= $stmt->fetch();

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
        <h3 class="py-3"> Update Customer <a style="float:right" href="index.php"> Back</a></h3>
        <div class="panel-body">
            <form action="" method="post" class="form-group" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Customer Name: </label>
                    <input type="text" value="<?php echo $customer['name'];?>" class="form-control" name="name" required="Please fill up">
                </div>


                <div class="form-group">
                    <label for="">Email: </la€bel>
                        <input type="email" class="form-control" value="<?php echo $customer['email'];?>" name="email" required="Please fill up">
                    </div>
                    <!--  -->
                    <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" value="<?php echo $customer['photo'];?>" class="form-control" name="password" required="Please fill up">
                </div>

                    <div class="form-group">
                        <label for="">Photo: </label>
                        <input type="file" value="<?php echo $customer['photo'];?>" class="form-control" name="photo" >
                        <img src="upload/pic/<?php echo $customer['photo'];  ?>" alt="" width= 60>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-center" class="form-control" name="edit" value="Update" onclick="return msg()" />       
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
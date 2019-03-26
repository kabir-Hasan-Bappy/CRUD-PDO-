<?php
require_once 'bootstarp.php';
if (!is_logged_in()) {
    notification('You have to login first.', 'danger');
    redirect('login');
}
if (isset($_GET['id'])) {
    # code...

$id = (int)$_GET['id'];
$query = 'SELECT id, name, email, photo FROM customers WHERE id=:id';
$stmt = $con->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$customer = $stmt->fetch();}
require_once 'partials/_header.php';


// if ($id === 0) {
//     header('Location: index.php');
// }
?>



<div class="container py-5 border">





 <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="py-3"> Update Customer <a style="float:right" href="dashboard.php"> Back</a></h3>
        <div class="panel-body">
            <form action="update_customer.php" method="post" class="form-group" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Customer Name: </label>
                    <input type="hidden" value="<?php echo $customer['id'];?>" class="form-control" name="cusid" required="Please fill up">
                    <input type="text" value="<?php echo $customer['name'];?>" class="form-control" name="name" required="Please fill up">
                </div>


                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="email" class="form-control" value="<?php echo $customer['email'];?>" name="email" required="Please fill up">
                </div>
                <!--  -->
                 <div class="form-group">
                    <label for="">Password: </label>
                    <input type="text"  class="form-control" name="password" required="Please fill up">
                </div>


                <div class="form-group">
                    <label for="">Photo: </label>
                    <input type="file" value="<?php echo $customer['photo'];?>" class="form-control" name="photo" >
                    <img src="upload/pic/<?php echo $customer['photo'];  ?>" alt="" width= 60>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-center" class="form-control" name="update" value="Update Customers" onclick="return msg()" />       
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
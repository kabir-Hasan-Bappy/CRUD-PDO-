
<?php 
  require_once"bootstarp.php";
if(is_logged_in()){
    redirect("dashboard");
    
}
?>
<?php require_once 'partials/_header.php';?>

 <div class="container py-5 border" >


 <?php require_once 'partials/_message.php';?>

  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="py-3">  Customer Login <a style="float:right" href="index.php"> Back</a></h3>
    <div class="panel-body">
      <div class="card col-md-10 ml-5" >
        <div class="card-body">
      <form action="login_sql.php" method="post" class="form-group" >


        <div class="form-group">
          <label for="">Email: </label>
          <input type="email" class="form-control" name="email" required="Please fill up">
        </div>

        <div class="form-group">
          <label for="">Password: </label>
          <input type="password" class="form-control" name="password" >
        </div>


        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-center" class="form-control" name="login" value="Log In" onclick="return msg()" />  

          <hr>
          <a href="add.php">Sign Up</a>     
        </div>

      </form>
      </div>
      </div>
    </div>

  </div>
</div>
</div>

<?php require_once 'partials/_footer.php';?>
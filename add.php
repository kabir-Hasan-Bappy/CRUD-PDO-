<?php

  require_once 'bootstarp.php';

if (is_logged_in()) {
    redirect('dashboard');
  }
  

 require_once 'partials/_header.php';
?>

   <div class="container py-5 border">


  <?php  require_once 'partials/_message.php'; ?>

    <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="py-3"> Add Customer <a style="float:right" href="index.php"> Back</a></h3>
        <div class="panel-body">
            <form action="register.php" method="post" class="form-group" enctype="multipart/form-data">
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
                    <hr>
          <a href="login.php">Sign In</a>       
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
<?php require_once 'partials/_footer.php';?>
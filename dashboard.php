<?php
  require_once 'bootstarp.php';


if (!is_logged_in()) {
    redirect('login');


    


if (!is_admin()) {

 redirect('dashboard');
}}


$id= $_SESSION['id'];

?>



<?php require_once 'partials/_header.php';?>

	<div class="container py-5 ">
		<?php require_once 'partials/_message.php';?>

		<div class="alert alert-primary py-5">
			
			Hello, <?php echo $_SESSION['name'];?>	
                    
            <img style="float:right" src="upload/pic/<?php echo $_SESSION['photo'];  ?>" alt="" width= 100>

		</div>

		<div class="text-center">
			<?php if ($_SESSION['role']=='admin'):?>
			
			<a href="index.php">Customer Information</a> <br>
		<?php endif;?>
			<a href="edit.php">Update Information</a> <br>
			<a href="logout.php">Log Out</a>
		</div>
	</div>
















	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php require_once 'partials/_footer.php';?>
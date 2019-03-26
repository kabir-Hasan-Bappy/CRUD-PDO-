<?php
  require_once 'bootstarp.php';


if (!is_logged_in()) {
    redirect('login');
   
}

if (!is_admin()){
	redirect('dashboard');
}




	$q= 'SELECT * FROM customers ORDER BY id DESC';

	$stmt=$con-> prepare($q);
	$stmt->execute();

	$cus= $stmt->fetchAll();
?>



<?php require_once 'partials/_header.php';?>
	<div class="container py-5">
		<div class="well text-center">
			<h2>Customer List</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3> <a href="login.php">LOGIN</a> <a style="float:right" href="dashboard.php">Back</a></h3>
			</div>
			<div class="panel-body">
				<table class="table table-stripped table-bordered">
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Photo</d></th>
						<th>Action</th>
						
					</tr>
					
					<?php foreach ($cus as $value):?> 
											
					<tr>
						<td><?php echo $value['id'];  ?></td>
						<td><?php echo $value['name'];  ?></td>
						<td><?php echo $value['gender'];  ?></td>
						<td><?php echo $value['email'];  ?></td>
						<td> <img src="upload/pic/<?php echo $value['photo'];  ?>" alt="" width= 60> </td>
						<td>
							<a class="btn btn-success" href="update.php?id=<?php echo $value['id']; ?>">Edit</a> 
							<?php if ($_SESSION['id']!==$value['id']):?>						

							<a class="btn btn-danger"  onclick="return confirm('Are you sure want to delete?')" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
						<?php endif;?>
						</td>
					</tr>
				<?php endforeach;?>
					
				</table>
			</div>

		</div>
	</div>
















	<?php require_once 'partials/_footer.php';?>
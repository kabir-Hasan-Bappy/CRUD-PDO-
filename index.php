<?php
	require_once 'connection.php';
	$q= 'SELECT * FROM customers ORDER BY id DESC';

	$stmt=$con-> prepare($q);
	$stmt->execute();

	$cus= $stmt->fetchAll();
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
	<div class="container py-5">
		<div class="well text-center">
			<h2>Customer List</h2>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3> <a href="login.php">LOGIN</a> <a style="float:right" href="add.php">New Customer</a></h3>
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
							<a class="btn btn-success" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a> 							<a class="btn btn-danger"  onclick="return confirm('Are you sure want to delete?')" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach;?>
					
				</table>
			</div>

		</div>
	</div>
















	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
	include 'dbcon.php';
	session_start();
	if (isset($_SESSION['user'])) {
	session_regenerate_id();
	$sql = "SELECT * FROM `attendance` ORDER BY `uname` ASC";
	$res = mysqli_query($conn,$sql);
?>

	<!doctype html>
		<html lang="en">
		  <head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<title>Admin Panel</title>
		  </head>
		  <body>
		  <div class="alert alert-primary" role="alert">Wellcome - <?php echo htmlspecialchars($_SESSION['user']); ?>
		</div>

		<form action="dopdf.php" method="POST">
		  <div class="d-grid gap-2 col-6 mx-auto">
			<button class="btn btn-success me-md-2" name="download" type="submit">Download Attendance PDF</button>
		  </div>
		</form>

			<h2>Attendance</h2>
			<table class="table">
		  <thead class="thead-dark">
			  <tr>
				<th scope="col">Name</th>
				<th scope="col">UserName</th>
				<th scope="col">Date</th>
				<th scope="col">Week</th>
			  </tr>
			  </thead>
			  <?php
		while($deatils = mysqli_fetch_array($res)){
			$name = $deatils['name'];
			$uname = $deatils['uname'];
			$dt = $deatils['dt'];
			$week = $deatils["week"];
		  echo '<tbody>';
		   echo '<tr>';
			  echo '<td>'.$name.'</td>';
			  echo '<td>'.$uname.'</td>';
			  echo '<td>'.$dt.'</td>';
			  echo '<td>'.$week.'</td>';
			echo '</tr>';
		  echo '</tbody>';
		} ?>
		</table>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		  </body>
		</html>
		<?php
		}else{ header("location:log_admin.php"); }
?>
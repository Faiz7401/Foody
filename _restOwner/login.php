<?php
session_start();
include('db.inc.php');
if(isset($_POST["submit"])){
	$uname = $_POST['user_name'];
	$role = $_POST['user_role'];
	$pass = $_POST['user_password'];

	if (empty($uname)) {
		
	}else if(empty($role)){

	}else if(empty($pass)){

	}else{

	$sql = " SELECT * FROM admin WHERE user_name = '$uname' AND user_password = '$pass'";
	$sql1 = " SELECT * FROM user WHERE user_name = '$uname'  AND user_role='$role' AND user_password = '$pass'";
	$res = mysqli_query($conn, $sql);
	$res1 = mysqli_query($conn, $sql1);

	if (mysqli_num_rows($res) == 1) {
			$_SESSION['admin'] = $uname;
			header("Location: ./index.php");

	}else if (mysqli_num_rows($res1) == 1) {

		  if ($role == "restaurant Owner") {
			  $_SESSION['restaurant Owner'] = $uname;
			  header("Location: ./restOwner.php");		
		  		
		  }else if ($role == "rider") {
			$_SESSION['rider'] = $uname;
			header("Location: ./rider.php");		
	
		  }else if ($role == "general User") {
			$_SESSION['general User'] = $uname;
			header("Location: ./genUser.php");		
		  }
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>multi-user role-based-login-system</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<form class="border shadow p-3 rounded"action="" method="post" style="width: 450px;">
				<h1 class="text-center p-3">LOGIN</h1>
				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert"><?=$_GET['error']?>
				</div>
				<?php } ?>
					<div class="mb-3">
						<label for="username" class="form-label">User name</label>
						<input type="text" class="form-control" name="user_name" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" name="user_password" class="form-control" id="password" required>
					</div>
					<div class="mb-1">
						<label class="form-label">Select User Type:</label>
					</div>
					<select class="form-select mb-3"name="user_role" aria-label="Default select example">
						<option disabled selected value> -- select an option -- </option>
						<option value="admin">Admin</option>
						<option value="restaurant Owner">restaurant Owner</option>
						<option value="rider">rider</option>
						<option value="general User">general User</option>
					</select>
			
					<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
			</form>
      </div>
</body>
</html>
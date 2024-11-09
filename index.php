<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "foody3") or die(mysqli_connect_error());

//include('config.php');
if(isset($_POST["submit"])){
	$uname = $_POST['user_name'];
	$role = $_POST['user_role'];
	$pass = $_POST['user_password'];

	if (empty($uname)) {
		
	}else if(empty($role)){

	}else if(empty($pass)){

	}else{

	//$sql = " SELECT * FROM admin WHERE user_name = '$uname' AND user_password = '$pass'";
	$sql1 = " SELECT * FROM user WHERE user_name = '$uname'  AND user_password = '$pass'";
	//$res = mysqli_query($conn, $sql);
	$res1 = mysqli_query($conn, $sql1);
	//echo $res;
	/*if (mysqli_num_rows($res) == 1) {
			$_SESSION['admin'] = $uname;
			header("Location: ./_admin/index.php");

	}*/
	
	
	if (mysqli_num_rows($res1) == 1) {

		   if ($role == "restaurant Owner") {
		 	  $_SESSION['restaurant Owner'] = $uname;
		 	  header("Location: ./_restOwner/RestOwner");		
		  		
		}else if ($role == "rider") {
			$_SESSION['rider'] = $uname;
			header("Location: ./_rider/index.php");		
	
		  }else if ($role == "general User") {
		 	$_SESSION['general User'] = $uname;
		 	header("Location: ./_general_user/index.php");

		   }else if ($role == "admin") {
			$_SESSION['admin'] = $uname;
			header("Location: ./_admin/index.php");
		}
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>multi-user role-based-login-system</title>
	<link rel="icon" href="images/logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<style>
		
		body{
    		background:url(images/image.jpg);
    		background-size:cover; 
			
		}

		img{
			width:10%;
		}

		.logo{
			width: 180px;
			height: 150px;
			margin: 0 auto;
			margin-bottom: 10px;
		}

		.logo img{
			width: 100%;
		}
	</style>

</head>
<body>

      <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<form class="border shadow p-3 rounded"action="" method="post" style="width: 450px;">
			<div class="logo">
				<img src="images/logo.png">
			</div>	
			
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
						<option value="restaurant Owner">Restaurant Owner</option>
						<option value="rider">Rider</option>
						<option value="general User">General User</option>
					</select>
			
					<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
			</form>
      </div>
</body>
</html>
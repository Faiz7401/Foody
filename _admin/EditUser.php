<?php
include_once("config.php");
$result = mysqli_query($conn,"SELECT * FROM user WHERE user_ID='" . $_GET['user_ID'] . "'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
    <header>
        <img id="logo" src="foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <a href="login.php"><button class="logout" >Logout</button></a>
    </header>

    <div class="row">
        <nav class="sidebar">
            <h2>Home</h2>
            <ul>
                <a href="index.php"><li><i class="fas fa-home"></i> Dashboard </li></a>
                <a href="ManageUser.php"><li><i class="fas fa-user"></i> Manage User <i class="fa fa-caret-down"></i></li></a>
                <ul class="sub-menu">
                    <li><a href="NewUser.php">Create new user</a></li>
                    <li><a class="active" href="">Edit User</a></li>
                  </ul>
                <a href="report.php"><li><i class="fas fa-chart-bar"></i> Report </li></a>

            </ul>                  
        </nav>     

        <div class="main">
            <div class="info">
                    <form  action="update.php" method="post">
                        <h1>Edit User</h1><br>
                            <label for="name">User ID:</label><br>
                            <input type="text" id="user_ID" name="user_ID" value="<?php echo $row['user_ID']?>"><br><br>
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" value="<?php echo $row['user_name']?>"  name="user_name"><br><br>
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" value="<?php echo $row['user_password']?>" name="user_password"><br><br>
                            <label for="phoneno">Phone Number:</label><br>
                            <input type="tel" id="phone" value="<?php echo $row['user_contactPhone']?>" name="user_contactPhone" placeholder="012-3456789"><br><br>
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" value="<?php echo $row['user_email']?>" name="user_email" placeholder="abc@gmail.com"><br><br>
                            <label for="address">Address:</label><br>
                            <input type="text" id="address" value="<?php echo $row['user_address']?>" name="user_address"><br><br>
                            <input type="submit" name="Update" value="Update" class="btn btn-primary">
                    </form>
            </div>
        </div>    
    </div>


    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>
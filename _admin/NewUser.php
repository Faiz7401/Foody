<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="../images/logo.png">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <header>
        <img id="logo" src="foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../index.php'">Logout</button>
    </header>

    <div class="row">
        <nav class="sidebar">
            <h2>Home</h2>
            <ul>
                <a href="index.php"><li><i class="fas fa-home"></i> Dashboard </li></a>
                <a href="ManageUser.php"><li><i class="fas fa-user"></i> Manage User <i class="fa fa-caret-down"></i></li></a>
                <ul class="sub-menu">
                    <li><a class="active" href="">Create new user</a></li>
                    <li><a href="">Edit User</a></li>
                </ul>
                <a href="report.php"><li><i class="fas fa-chart-bar"></i> Report </li></a>

            </ul>                    
        </nav>     

        <div class="main">
            <div class="info">
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                        <h1>Create New User</h1><br>
                        <label for="Role">Role:</label>
                        <select id="role" name="user_role" onchange="yesnoCheck(this);">
                          <option disabled selected value> -- select role -- </option>
                          <option value="restaurant Owner">Restaurant Owner</option>           
                          <option value="rider">Rider</option>
                          <option value="general User">General User</option>
                        </select><br><br>
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="user_name" required><br><br>
                        <label for="password">Password:</label><br>
                        <input type="password" id="passowrd" name="user_password" required><br><br>
                        <label for="phoneno">Phone Number:</label><br>
                        <input type="tel" id="phone" name="user_contactPhone" placeholder="012-3456789" required><br><br>
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="user_email" placeholder="abc@gmail.com" required><br><br>
                        <label for="address">Address:</label><br>
                        <input type="text" id="address" name="user_address" required><br><br>
                        <!--<label for="image">Profile Picture:</label><br>
                        <input type="file" name="user_image"><br><br>-->
                        <input type="submit" name="submit" value="Done" class="btn btn-primary"> 
                    </form>
            </div>      
        </div>    
    </div>

            
    <footer><hr><br> &copy 2022 All Right Reserve</footer>
<script src="js/bootstrap.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../images/logo.png">
    <meta charset="UTF-8">
    <title>Foody</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<style>
* {
  box-sizing: border-box;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #444;
  color: white;
}
</style>

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
                <a class="active" href="#"><li><i class="fas fa-home"></i> Dashboard </li></a>
                <a href="ManageUser.php"><li><i class="fas fa-user"></i> Manage User <i class="fa fa-caret-down"></i></li></a>
                <ul class="sub-menu">
                    <li><a href="NewUser.php">Create new user</a></li>
                    <li><a href="">Edit User</a></li>
                  </ul>
                <a href="report.php"><li><i class="fas fa-chart-bar"></i> Report </li></a>

            </ul> 
        </nav>

        <div class="main">
            <div class="info">
                <div class="row">
                    <div class="column">
                      <div class="card">
                        <p><i class="fas fa-hamburger"></i></p>
                        <h3>                       
                            <?php
                                
                                require_once('config.php');
                                $query=mysqli_query($conn,"SELECT count(*) AS data3 FROM user WHERE user_role='restaurant Owner'");
                                while($row=mysqli_fetch_array($query))
                                echo $row['data3'];
                            ?>
                        </h3>
                        <p>Restaurant Owner</p>
                      </div>
                    </div>

                    <div class="column">
                        <div class="card">
                          <p><i class="fa fa-motorcycle"></i></p>
                          <h3>
                          <?php

                                require_once('config.php');
                                $query=mysqli_query($conn,"SELECT count(*) AS data4 FROM user WHERE user_role='rider'");
                                while($row=mysqli_fetch_array($query))
                                echo $row['data4'];
                            ?>
                          </h3>
                          <p>Rider</p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                          <p><i class="fa fa-user"></i></p>
                          <h3>
                          <?php
                                require_once('config.php');
                                $query=mysqli_query($conn,"SELECT count(*) AS data5 FROM user WHERE user_role='general User'");
                                while($row=mysqli_fetch_array($query))
                                echo $row['data5'];
                            ?>
                          </h3>
                          <p>General User</p>
                        </div>
                    </div>

                </div>
              </div>
          </div>


    </div>
    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>
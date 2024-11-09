<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../images/logo.png">
    <meta charset="UTF-8">
    <title>Foody</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
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
                <a class="active" href="#"><li><i class="fas fa-user"></i> Manage User <i class="fa fa-caret-down"></i></li></a>
                <ul class="sub-menu">
                    <li><a href="NewUser.php">Create new user</a></li>
                    <li><a href="">Edit User</li></a>
                  </ul>
                <a href="report.php"><li><i class="fas fa-chart-bar"></i> Report </li></a>

            </ul> 
        </nav>


        <div class="main">
            <div class="info">
                <div class="btn btn-success" style="color:lightgreen">
                    <a class="text-center" href="NewUser.php" class="btn btn-primary" style="color:white;">Add New User</a>
                </div>
                <input id="myInput" type="text" placeholder="Search.." style="float: right;"></input>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th style="width: 1%">No</th>
                            <!--<th>Image</th>-->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                            include('../_rider/partials/dbconn.php');
                            $query=mysqli_query($conn,"select * from `user`");
                            $i=1;
                            while($row=mysqli_fetch_array($query)){                         
                            ?>                        
                            <tr>
                                <td><?php echo $i; ?></td>
                                <!--<td><img src="uploads/<?php echo $row['user_image']; ?>" width="100px" height="100px" style="border:1px solid #333333;"></td>-->
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_contactPhone']; ?></td>
                                <td><?php echo $row['user_address']; ?></td>
                                <td><?php echo $row['user_role']; ?></td>
                                <td class="text-center"><a href="EditUser.php?user_ID=<?php echo $row["user_ID"]; ?>" type="button" class="btn btn-primary">EDIT</a>
                                <a href="DeleteUser.php?user_ID=<?php echo $row["user_ID"]; ?>"  type="button" class="btn btn-danger" value="Delete "name="Delete">DELETE</a>
                                </td>  
                                
                            </tr>                  
                            <?php
                            $i++;
                            }
                        ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>
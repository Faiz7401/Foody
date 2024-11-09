<!---
This is the edit profile for the user to update their phone number and email.
-->

<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM general_user WHERE generalUser_ID = ".$_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody: UMP Food Delivery System</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="icon" href="../images/logo.png">
    <style>
        button{
            color: #990000;
            padding: 8px 12px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: white;
        }

        button:hover{
            color: white;
            cursor: pointer;
            background-color: #990000;
        }

        .update{
            color: white;
            padding: 8px 12px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: #990000;
        }

        .update:hover,{
            color: #990000;
            cursor: pointer;
            background-color: white;
        }
        .main{
            height: 500px;
        }

        .profile{
            height: 480px;
            padding: 32px;
            border-radius: 12px;
            background-color: white;
        }

        table, th, td{
            border-collapse: collapse;
            border: 1px solid #990000;
            padding: 12px;
            margin-left: auto;
            margin-right: auto;
        }  

        th{
            color: #fff;
            background-color: #990000;
        }

        .subject {
            color: white;
            background-color: #CE2029;
        }

        img{
            max-width: 200px;
        }
        input{
            border: none;
            height: 32px;
            width: 100%;
        }
    </style>

</head>
<body>
    <header>
        <img src="images/foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <a href="#"></a><button class="logout" >Logout</button>
    </header>

    <!--Sidebar-->
    <div class="row">
        <div class="sidebar">
            <h2>Profile</h2>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="list.php"><i class="fa fa-utensils"></i> Restaurant</a></li>
                <li><a href="order.php"><i class="fas fa-address-card"></i> Orders</a></li>
                <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fas fa-exclamation"></i> Complaint</a></li>
                <li><a href="report.php"><i class="fas fa-file"></i> Report</a></li>
            </ul> 
            </div>
        <div class="main">
            <div class="profile">
            <?php while ($row = $result->fetch_assoc()):?>
                <form action="update.php" method="POST">
                <table>
                    <tr>
                        <td  rowspan="7"><img src="images/profile.png" class="centerImage" width="155" height="225"></td>
                        <th colspan="2" width="100%">User Profile</th>
                    </tr>
                    <tr>
                        <td class="subject" width="10">Name</td>
                        <td><input type="text" name="Fname" id="Fname" value="<?php echo $row["user_name"]; ?>"/></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Age</td>
                        <td><input type="text" name="age" id="age" value="<?php echo $row["user_age"]; ?>"/></td>
                    </tr>

                    <tr>
                        <td class="subject">Gender</td>
                        <td><input type="text" name="gender" id="gender" value="<?php echo $row["user_gender"]; ?>"/></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Phone Number</td>
                        <td><input type="tel" name="phoneNumber" value="<?php echo $row["user_contactPhone"]; ?>"/></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Address</td>
                        <td><input type="text" name="address" value="<?php echo $row["user_address"]; ?>"/></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Email</td>
                        <td><input type="text" name="email" value="<?php echo $row["user_email"]; ?>"/></td>
                    </tr>
                </table>
                <!--Update Button-->
                    <button class="update" style="margin-top: 16px;float: right;">Update</button>
                <!--Cancel Button-->
                    <button class="cancel" style="margin-right: 16px;margin-top: 16px;float: right;">
                    <a href="profile.php">Cancel</a></button>
                </div>
            </div></form>
            
            <?php endwhile;?>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
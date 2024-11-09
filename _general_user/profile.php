<!--
    This is class is for profile
-->
<?php
include_once 'database.php';
$data = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '".$_SESSION['general User']."'");
$data2 = mysqli_query($conn, "SELECT * FROM general_user WHERE user_name = '".$_SESSION['general User']."'");

$test = mysqli_fetch_row($data);
$test2 = mysqli_fetch_row($data2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody: UMP Food Delivery System</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        button, .edit{
            color: #990000;
            padding: 8px 12px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: rgb(245, 245, 245);
        }

        .edit{
            margin-top: 12px;
            float: right;
        }

        button:hover, .edit:hover{
            color: white;
            cursor: pointer;
            background-color: #990000;
        }
        .main{
            height: 500px;
        }

        .profile{
            height: 400px;
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
    </style>
</head>
<body>
    

    <header>
        <img src="images/foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../index.php'">Logout</button>
    </header>

    <div class="row">
        <div class="sidebar">
            <h2>Profile</h2>
            <?php
                include 'sidebar.php';
            ?> 
            </div>
        <div class="main">
        
            <div class="profile">
                <table>
                    <tr>
                        <td  rowspan="7"><img src="images/profile.png" class="centerImage" width="155" height="225"></td>
                        <th colspan="2" width="100%">User Profile</th>
                    </tr>
                    <tr>
                        <td class="subject" width="20%">Name</td>
                        <td><?php echo $test[1]; ?></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Age</td>
                        <td><?php echo $test2[5]; ?></td>
                    </tr>

                    <tr>
                        <td class="subject">Gender</td>
                        <td><?php echo $test2[4]; ?></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Phone Number</td>
                        <td><?php echo $test[4]; ?></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Address</td>
                        <td><?php echo $test[6]; ?></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Email</td>
                        <td><?php echo $test[5]; ?></td>
                    </tr>
                </table>
				<button class="edit" name="edit" onclick="window.location.href = 'profile-edit.php';">Edit Profile</button>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
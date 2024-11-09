<!--This is the hompage for the user-->
<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM restaurant WHERE restaurant_ID > 0 AND restaurant_ID < 5" );
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
        /*Search Bar*/
        .searchbar{
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: center;
        }

        #searchQueryInput {
            border: none;
            height: 32px;
            outline: none;
            font-size: 16px;
            background: white;
            border-radius: 26px;
            padding: 0 56px 0 24px;
        }

        #searchQuerySubmit {
            width: 56px;
            height: 32px;
            border: none;
            outline: none;
            background: none;
            margin-left: -56px;
        }

        #searchQuerySubmit:hover {
            cursor: pointer;
        }

        /*Welcome*/
        .Welcome {
            height: 300px;
            padding: 16px;
            margin-top: 20px;
            margin-bottom: 32px;
            border-radius: 12px;
            background-image: url(images/welcome.jpg);  
        }

        .Welcome h1{
            font-size: 32px;
            font-weight: bold;
        }

        .welcome-text{
            color: white;
            padding: 12px;
            border-radius: 16px;
            display: table-cell;
            vertical-align: bottom;
            background-color: rgba(0, 0, 0, 0.479) ;
        }

        /*Rextaurant Button*/
        .Menu{ 
            float: left;
            color: #990000;
            margin-top: 5px;
            padding: 8px 12px;
            border-radius: 8px; 
            background-color: white; 
            border: 2px solid #990000;
        }

        .Menu:hover {
            color: white;
            cursor: pointer;
            background-color: #990000;
        }

        /*Restaurant Content*/
        .restaurant-container{
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .restaurant-container ul{
            list-style-type: none;
        }

        .restaurant-container li{
            display: inline;
            float: left;
        }

        .restaurant-container ul li a{
            color: #990000;
        }

        .restaurant-container ul li a:hover{
            color: #CE2029;
        }

        .title{ 
            margin: auto; 
            border-bottom: 8px solid #990000
        }

        /*Horizontal Restaurant List*/
        .features {
            display: flex;
            margin-top: 32px;
            margin-bottom: 16px;
            margin-right: 8px;
            justify-content: space-around;
        }

        .features .items{
            width: 220px;
            height: 280px;
            padding: 14px;
            border-radius: 16px;
            background-image: url(images/background2.webp);
        }

        .items h3{
            color: white;
            text-overflow:ellipsis;
        }
        
        .items a{
            color: black;
        }
        .features .items:hover, .items a:hover {
            opacity: 80%;
        }

        .items img{
            padding: 14px;
            width: 190px;
        }

        /*Services*/
        .Services{
            display: flex;
            margin-top: 16px;
            margin-bottom: 16px;
            align-items: center;
            justify-content: space-around;
        }

        .col{
            width: 270px;
            height: 270px;
            padding: 20px;
            margin-top: 16px;
            text-align: center;
            border-radius: 24px;
            background-color: white;
        }

        .col img{
            max-width: 230px;
            max-height: 180px;
            padding: 12px;
        }

    </style>
</head>
<body>
    <!--Header for Foody-->
    <header>
        <img src="images/foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../index.php'">Logout</button>
    </header>

    <div class="row">

        <!--Side Navigation Bar-->
        <div class="sidebar">
            <h2>Home</h2>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="list.php"><i class="fa fa-utensils"></i> Restaurant</a></li>
                <li><a href="order.php"><i class="fas fa-address-card"></i> Orders</a></li>
                <!-- <li><a href="status.php"><i class="fas fa-clock"></i> Status</a></li> -->
                <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="../_complaint/filecomp.php"><i class="fas fa-exclamation"></i> Complaint</a></li>
                <li><a href="report.php"><i class="fas fa-file"></i> Report</a></li>
            </ul> 
            </div>

        <!--Main Body-->
        <div class="main">

            <!--Welcome Dashboard-->
            <div class="Welcome">
                <br><br><br><br><br><br><br><br>
                <div class="welcome-text">
                    <h1>Welcome To Foody</h1>
                    <p>Giving your Hunger a new Option</p>
                </div>
            </div>

            <!--Featured Restaurant-->
            <div class="restaurant-container">
                <ul>
                    <li ><h2 class="title">Featured Restaurant</h2></li>
                    <li style="float: right;"><a href="list.php">View All >></a></li>
                </ul>
            </div>
            <br>
            
            <div class="features">

                <!--Featured Restaurant List-->

                <!--This code is for loop restaurant list from database based on restaurant_ID 1 untill 4-->
                <?php
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)){
                    ?>

                <div class="items">
                    <a href="restaurant.php?id=<?php echo $row["restaurant_ID"] ?>">
                        <h3><?php echo $row["restaurant_name"] ?></h3>
                    </a>
                </div>

                <?php
                    }
                }
                ?>

            </div>

            <!--Service that foody provided-->
            <div class="title" style="width: 20%;">
                <h2 style="text-align: center;">Services</h2>
            </div>
            
            <div class="Services">
                
                <div class="col" >
                    <img src="images/choose.jpg">
                    <h3>Choosse your Meals</h3>
                     <p>20+ Menus to choose from</p>
                </div>

                <div class="col">
                    <img src="images/deliver.jpg">
                    <h3>We Deliver It to You</h3>
                    <p>Choose your dates for delievery</p>
                </div>

                <div class="col">
                    <img src="images/enjoy.jpg">
                    <h3>Cook & Enjoy</h3>
                    <p>Eat your freshly cooked meal</p>
                </div>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
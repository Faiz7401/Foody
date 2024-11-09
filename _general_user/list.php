<!--
    This is the list of restaurant that are available in the foody
-->

<?php
require_once('../_rider/partials/dbconn.php');
$query = "SELECT * FROM restaurant ORDER BY restaurant_ID ASC";
$result = mysqli_query($conn,$query);
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

        .back button{
            color: #990000;
            padding: 8px 12px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: rgb(245, 245, 245);
        }

        .back button:hover{
            color: white;
            cursor: pointer;
            background-color: #990000;
        }
        
        /*Restaurant List*/
        .row {
            display: flex;
            margin-top: 32px;
            margin-bottom: 16px;
            justify-content: space-around;
        }

        .row .items{
            width: 220px;
            height: 280px;
            margin: 16px;
            padding: 14px;
            border-radius: 16px;
            float: left;
            background-image: url(images/background2.webp)
        }
        
        .items h3{
            color: white;
            text-overflow:ellipsis;
        }
        
        .items a{
            color: white;
        }
        .features .items:hover, .items a:hover {
            opacity: 80%;
        }

        .items img{
            padding: 14px;
            width: 190px;
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

    <div class="row">
        <div class="sidebar">
            <h2>Home</h2>
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
            <div class="back">
                <a href="index.php"><button >Back</button></a>
            </div>

            <!--Search Bar-->
            <div class="searchbar">
                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search Restaurant.." value="">
                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                  </svg>
                </button>
            </div>

            <!--List of restaurant in the databses-->
            <div class="list">
                <div class="row">
                <?php while ($row = $result->fetch_assoc()):?>
                    <div class="items">
                        <a href="restaurant.php">
                            <h3><?php echo $row["restaurant_name"] ?></h3>
                        </a>
                    </div>
                <?php endwhile;?>
                </div>
                </div>
            </div>
        
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
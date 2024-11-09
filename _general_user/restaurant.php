<!--
    This is the page for restaurant description and list all for that are available at the restaurant
-->

<?php
require_once('../_rider/partials/dbconn.php');
$result = mysqli_query($conn,"SELECT * FROM restaurant WHERE restaurant_ID = '".$_SESSION['general User']."'");
$food = mysqli_query($conn,"SELECT * FROM menu WHERE restaurant_ID = '".$_SESSION['general User']."'");
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
        .About{
            margin-top: 16px;
            margin-bottom: 16px;
            margin-left: auto;
            margin-right: auto;
            padding: 32px;
            border-radius: 12px;
            color: white;
            max-width: 1000px;
            background-image: url(images/background2.webp);
        }

        .address{
            text-overflow:ellipsis;
            width: 300px;
        }

        table{
            margin-right: auto;
            margin-left: auto;
        }

        table, tr ,th, td{
            padding: 8px 12px;
        }

        
        /*Search Bar*/
        .searchbar{
            margin-top: 32px;
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

        button{
            color: #990000;
            padding: 8px 12px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: rgb(245, 245, 245);
        }

        button:hover{
            color: white;
            cursor: pointer;
            background-color: #990000;
        }
        
        /*Restaurant List*/
        .row {
            display: flex;
            margin-top: 32px;
            flex-direction: row;
            margin-bottom: 16px;
            justify-content: space-around;
        }

        .row .items{
            width: 220px;
            height: 280px;
            padding: 14px;
            margin: 16px;
            border-radius: 16px;
            background-color: #000;
            background-image: url(images/background.jpg);
        }
        
        .items a{
            color: black;
        }

        .items h3{
            color: black;
            text-overflow:ellipsis;
        }
        .features .items:hover, .items a:hover {
            opacity: 80%;
        }

        .items img{
            padding: 14px;
            width: 190px;
        }

        .filter{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .filter button{
            width: 80px;
            margin: 12px;
        }

        .active{
            color: white;
            background-color: #990000;
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
                <a href="list.php"><button>Back</button></a>
            </div>

            <!--Restaurant Details-->
            <?php while ($row = $result->fetch_assoc()):?>
            <div class="About">
                <form method="post" action="menu.php">
                <table>
                    <tr>
                        <th colspan="2"><h2><?php echo $row["restaurant_name"] ?></h2></th>
                    </tr>
                    <tr>
                        <td class="subject" width="170px">Address</td>
                        <td class="address"><?php echo $row["restaurant_address"] ?></td>
                    </tr>
        
                    <tr>
                        <td class="subject">Opening Times: </td>
                        <td><?php echo $row["time_operation"] ?></td>
                    </tr>

                    <tr>
                        <td class="subject">Contact Phone</td>
                        <td><?php echo $row["time_phone"] ?></td>
                    </tr>
                </table>
                </form>
            </div>
            <?php endwhile;?>

            <!--Search Bar
            <div class="searchbar">
                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search Food.." value="">
                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                  </svg>
                </button>
            </div>
            
            Filter item by their food category
            <div class="filter">
                <div><button class="active">All</button></div>
                <div><button>Nasi</button></div>
                <div><button>Burger</button></div>
                <div><button>Beverage</button></div>
            </div>
            -->
            <div class="list">
                <!--List of menu in the restaurant-->
                <div class="row">
            <?php
                if(mysqli_num_rows($food) > 0){
                    while ($row = mysqli_fetch_array($food)){
                    ?>
                    <div class="items">
                        <a href="menu.php">
                            <h3><?php echo $row["food_name"] ?></h3>
                            <p><?php echo $row["food_price"] ?></p>
                        </a>
                    </div>
                    <?php
                    }
                }
                ?>

                </div>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
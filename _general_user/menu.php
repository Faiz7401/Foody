<!--

This class is for food description page, so the user can choose how much quantity of food before add to cart.

-->

<?php
include_once 'database.php';
$food = mysqli_query($conn,"SELECT * FROM menu WHERE menu_ID = ".$_GET["id"]);

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
        .main{
            height: 500px;
        }

        form{
            display: flex;
            align-items: center;
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

        table{
            height: 300px;
            margin: auto;
            color: white;
        }

        .food{
            display: flex;
            justify-content: space-around;
        }

        .Desc{
            margin-left: 56px;
            margin-right: 56px;
            border-radius: 16px;
            padding: 32px;
            width: 400px;
            height: 400px;
            background-image: url(images/background.jpg);
        }

        .container{
            display: flex;
        }

        .container div{
            margin-top: 6px;
            margin-right: 16px;
            color: #990000;
            padding: 2px 6px;
            border-radius: 8px; 
            border: 2px solid #990000;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .order{
            width: 400px;
            margin-right: 16px;
            background-color: #CE2029;
            border-radius: 16px;
            padding: 16px;
        }

        .order button{
            margin-top: 12px;
        }

        input{
            width: 100px;
            text-align: center;
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
            <!--Back Button-->
            <div class="back">
                <a href="restaurant.php?id=<?php echo $_GET["restaurantID"]; ?>"><button >Back</button></a>
            </div>

            <div class="food">

            <form action="order.php" method="POST">
            <!--Foood Information-->
            <?php while ($row = $food->fetch_assoc()):?>
                
                <div class="Desc">
                <!--Foood Description-->
                    <h2><?php echo $row["food_name"]?></h2>
                    <p style="text-align: justify; text-justify: inter-word;"><?php echo $row["food_desc"]?></p>
                    <div class="container">
                        <div><p><?php echo $row["status_availability"]?></p></div>
                        <div><p><?php echo $row["food_category"]?></p></div>
                    </div>
                </div>

                <!--Order Description-->
                <div class="order">
                    <h2 style="color: white;">Your Order</h2>
                    <table>
                        <tr>
                            <td style="width: 100px;">Price(RM) </td>
                            <td><input type="number" readonly value=<?php echo $row["food_price"]?> id="price"></td>
                        </tr>
                        <tr>
                            <td>Quantity</td>
                            <td><input type="number" value="" id="qty" name="qty" onchange="priceQuantity()" ></td>
                        </tr>
                        <tr>
                            <td>Total Price(RM)</td>
                            <td><input type="number" readonly id="totalPrice" value=""></td>
                        </tr>
                    </table>

                    <!--Check Out Button-->
                    <div class="checkout" style="align-items: center;">
                        <button name="checkout">Add to Order</button>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
            </form>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <?php
    $sql ="INSERT INTO `order`(`menu_ID`, `order_qty`, `total_payment`) 
        VALUES ('[value-1]','[value-2]','[value-3]');";
    ?>
    <script>
        function priceQuantity(){
            var qty, price, tp;

            qty = Number(document.getElementById("qty").value);
            price = Number(document.getElementById("price").value);
            
            tp = qty * price;

            document.getElementById("totalPrice").value = tp.toFixed(2);
        }
    </script>
</body>
</html>
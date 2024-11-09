<!--
    This is the cart page where the user can confirm their order and update their delievery address
-->

<?php
include_once 'database.php';
// $order = mysqli_query($conn,"SELECT * FROM order ORDER BY order_ID ASC");
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
        
        a{
            color: #990000;
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

        .cart-page{
            margin: 30px auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        .cart-info{
            display: flex;
            flex-wrap: wrap;
        }

        th{
            text-align: left;
            padding: 5px;
            color: white;
            font-weight: normal;
            background-color: #990000;
        }

        td{
            padding: 10px 5px;
        }

        td input{
            width: 40px;
            height: 30px;
            padding: 5px;
        }

        td a{
            color: #990000;
            font-size: 12px;

        }

        td img{
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .total-price{
            display: flex;
            justify-content: flex-end;
        }

        .total-price table{
            border-top: 3px solid #990000;
            width: 100%;
            max-width: 350px;
        }

        td:last-child{
            text-align: right;
        }

        th:last-child{
            text-align: right;
        }

        .deliveryAddress{
            margin: 16px;
            border: #990000 solid 1px;
        }

        .deliveryAddress p{
            background-color: #990000;
            padding: 8px;
            width: 90px;
        }
        .deliveryAddress input{
            height: 32px;
            margin-top: 12px;
            margin-bottom: 12px;
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
            <h2>Order</h2>
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
            <div class="address">
                <p>Deliver to:</p>
                <input type="text" placeholder="Your Current Location">
            </div>
            <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    
                    <?php 
                    // if(mysqli_num_rows($order) > 0){
                    //     while ($row = mysqli_fetch_array($order)){ 
                        ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <div>
                                    <p><?php// echo $row["food_name"] ?></p>
                                    <small>Price: RM<?php// echo $row["food_price"] ?></small>
                                    | <a href="#">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td><input type="number" value=<?php //echo $row["order_qty"] ?> readonly></td>
                        <td><p id="item1"><?php //echo $row["total_payment"] ?></p></td>
                    </tr>
                    <?php
                //     }
                // }
                ?>

                </table>

                <div class="total-price">

                    <table>
                        <tr>
                            <td>Subtotal(RM)</td>
                            <td><p id="substotal">12.00</p></td>
                        </tr>
                        <tr>
                            <td>Delivery Fee(RM)</td>
                            <td><p id="fee">4.00</p></td>
                        </tr>
                        <tr>
                            <td>Total(RM)</td>
                            <td><p id="total">16.00</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button>Check Out</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
    <script>
        function totalOrder(){
            var price1, price2, price3, substotal, fee, total;

            price1 = Number(document.getElementById("item1").value);
            price2 = Number(document.getElementById("item2").value);
            price3 = Number(document.getElementById("item3").value);
            fee = Number(document.getElementById("fee").value);

            substotal = price1 + price2 + price3;
            total = substotal + fee 

            document.getElementById("substotal").innerHTML = substotal;
            document.getElementById("total").innerHTML = total;
        }
    </script>
</body>
</html>
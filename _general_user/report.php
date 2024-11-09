<!--
    This is the cart page where the user can confirm their order and update their delievery address
-->

<?php

include 'database.php';

// session_start();
// $uname = $_SESSION['general User'];

$resultROW = $conn->query("SELECT * FROM user WHERE user_name='$uname'") or die($mysqli->error);
while ($rowUser = $resultROW->fetch_assoc()):
    $uid = $rowUser['user_ID'];

endwhile;


$order = mysqli_query($conn,"SELECT * FROM `order` WHERE order_status = 'DELIVER' and user_ID = $uid");

$avg = mysqli_query($conn,"SELECT AVG(total_payment) as average FROM `order` WHERE order_status = 'DELIVER'");

$sum = mysqli_query($conn,"SELECT MONTHNAME(order_time) as month, SUM(total_payment) as sumPay 
                            FROM `order`    
                            WHERE order_status = 'DELIVER'
                            GROUP BY month");

    foreach($query as $data)
  {
    $month[] = $data['month'];
    $amount[] = $data['sumPay'];
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody: UMP Food Delivery System</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .dev, .pay{
            width: 100%;
            margin-right:16px;
            border-top: 3px solid #990000;
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
            <h2>Report</h2>
            <?php
                include 'sidebar.php';
            ?> 
            </div>
        <div class="main">

            <h1>Expenses Report</h1>
            <p>User expenses report based on month</p>

            <div style="width: 500px; margin:auto;">
                <canvas id="myChart"></canvas>
            </div>
            
            <script>
            // === include 'setup' then 'config' above ===
            const labels = <?php echo json_encode($month); ?>;
            const data = {
                labels: labels,
                datasets: [{
                label: 'UMP (Food Delivery System)',
                data: <?php echo json_encode($amount); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
            </script>


            <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Desc</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Status Order</th>
                        <th>Total Payment</th>
                    </tr>
                   
                    <?php 
                            $tp=0; 
                            $total=0;
                    if(mysqli_num_rows($order) > 0){
                         while ($row = mysqli_fetch_array($order)){
                             $id= 
                             $menuID = $row['menu_ID'];
                             $resultMenu = $conn->query("SELECT * FROM `menu` WHERE id = $menuID") or die ($mysqli->error);
                        ?>
                    <tr>
                        <td name="id" style="width:2%;">
                            #<?php echo $row['order_ID'] ?>
                            <input type="hidden" name="id" value="<?php echo $row['order_ID'] ?>">
                        </td>
                        <td>
                        <?php while ($rowDetails = mysqli_fetch_array($resultMenu)){?>
                            <div class="cart-info">
                                <div>
                                    <p><?php echo $rowDetails["food_name"] ?></p>
                                </div>
                            </div>
                        <?php }?>
                        </td>
                        <td><?php echo $row["order_qty"] ?></td>
                        <td><?php echo $row["order_time"] ?></td>
                        <td><?php echo $row["order_status"] ?></td>
                        <td><p id="item1" >RM <?php echo $row["total_payment"] ?></p></td>
                    </tr>
                    <?php
                     }
                 }
                ?>
                   

                </table>

                <div class="total-price">
                    <table>
                        <tr>
                            <td>Average Expenses</td>
                <?php
                    if ($avg->num_rows > 0) {
                        // output data of each row
                        while($row = $avg->fetch_assoc()) {
                            $avgPay=$row["average"];
                ?>
                            <td><p id="substotal">RM <?php echo number_format($avgPay,2)."<br>"; ?></p></td>
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
                        </tr>
                        <tr>
                            <td>Total Expenses</td>
                <?php
                    if ($sum->num_rows > 0) {
                        // output data of each row
                        while($row = $sum->fetch_assoc()) {
                            $sumPay=$row["sumPay"];
                ?>
                            <td><p id="fee">RM <?php $delivery=5.00; echo number_format($sumPay,2)."<br>";?></p></td>
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
                        </tr>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
</body>
</html>
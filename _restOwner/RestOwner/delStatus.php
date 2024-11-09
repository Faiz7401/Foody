<?php 
//$uname = $_SESSION['restaurant Owner'];

include('../../_rider/partials/dbconn.php');

$resultROW = $conn->query("SELECT * FROM user WHERE user_name='".$_SESSION['restaurant Owner']."'") or die($mysqli->error);
while ($rowUser = $resultROW->fetch_assoc()):
$phone = $rowUser['user_contactPhone'];
//secho $phone;
$resultRest = $conn->query("SELECT * FROM restaurant WHERE time_phone = '$phone'") or die($mysqli->error);

    while ($rowRest = $resultRest->fetch_assoc()):
    $id = $rowRest['Restaurant_ID'];
    $name = $rowRest['restaurant_name'];

    $result = $conn->query("SELECT * FROM order WHERE Restaurant_ID = $id AND order_status = 'prepare'") or die($mysqli->error);
    
    endwhile;
endwhile;



//print_r($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody: UMP Food Delivery System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <header>
        <img id="logo" src="foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1><?php echo $name;?></h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../../index.php'">Logout</button>
    </header>

    <div class="row">
        <nav class="sidebar">
            <h2>Home</h2>
            <ul>
                <a href="index.php"><li><i class="fas fa-hamburger"></i> Menu</li></a>
                <a class="active" href="#"><li><i class="fas fa-motorcycle"></i> Delivery Status</li></a>
                <a href="sales.php"><li><i class="fas fa-money-check"></i> Sales</li></a>
                <a href="setting.php"><li><i class="fas fa-cog"></i> Settings</li></a>

            </ul> 
        </nav>
        <div class="main">
            <div class="info">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th style="width: 1%">No</th>
                            <th>Order ID</th>
                            <th>Menu</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <form action="includes/delivery.inc.php" method="POST">
                    <tbody class="text-center">
                    <?php
                        $i=1;
                        while ($row = $result->fetch_assoc()):?>
                            
                                <!-- Modal -->
                                <div class="modal fade" id="view-modal<?php echo $row['order_ID']?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="hidden">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-title">Menu Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button> 
                                            </div>
                                            
                                            <div class="modal-body">

                                                <p><b>Food Name &nbsp;&ensp;: </b>
                                                <?php 
                                                    $menuID = $row['menu_ID'];
                                                    //echo $menuID;
                                                    $resultMenu = $conn->query("SELECT * FROM menu WHERE id = $menuID") or die($mysqli->error);

                                                    while ($rowMenu = $resultMenu->fetch_assoc()):
                                                    $foodName = $rowMenu['food_name'];
                                                    echo $foodName;
                                                    
                                                    endwhile;

                                                ?>
                                                </p>
                                                <p><b>Quantity &emsp;&emsp; : </b><?php echo $row['order_qty'];?></p>
                                                <p><b>Price &emsp;&emsp;&emsp;&emsp;: </b><?php $number = $row['total_payment']; echo 'RM'.number_format($number, 2, '.', ''); ?></p>
                                                <p><b>Address &emsp;&emsp;&ensp;: </b><?php echo $row['delivery_address'];?></p>
                                                
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['order_ID'];?></td>
                            <td class="text-center">
                                <!-- Modal Trigger-->
                                <a href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#view-modal<?php echo $row['order_ID'];?>">View</a>
                                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $row['order_ID'];?>">
                            </td>
                            <!--<td class="text-center"><button type="button" class="btn btn-danger">REJECT</button></td>-->
                            <td class="text-center"><button type="submit" class="btn btn-success" name="updateStatus" >PICKUP</a></td>
                        
                        </tr>
                        <?php $i++; ?>
                        <?php endwhile;?>
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>
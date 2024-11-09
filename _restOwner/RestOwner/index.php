<?php 
//$uname = $_SESSION['restaurant Owner'];

include('../../_rider/partials/dbconn.php');

$resultROW = $conn->query("SELECT * FROM user WHERE user_name='".$_SESSION['restaurant Owner']."'") or die($mysqli->error);
while ($rowUser = $resultROW->fetch_assoc()):
$phone = $rowUser['user_contactPhone'];
//secho $phone;
$resultRest = $conn->query("SELECT * FROM restaurant WHERE time_phone = '$phone'") or die($mysqli->error);

    while ($rowRest = $resultRest->fetch_assoc()):
    $id = $rowRest['restaurant_ID'];
    $name = $rowRest['restaurant_name'];

    $result = $conn->query("SELECT * FROM menu WHERE restaurant_id = $id") or die($mysqli->error);
    
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
                <a class="active" href="#"><li><i class="fas fa-hamburger"></i> Menu</li></a>
                <a href="delStatus.php"><li><i class="fas fa-motorcycle"></i> Delivery Status</li></a>
                <a href="sales.php"><li><i class="fas fa-money-check"></i> Sales</li></a>
                <a href="setting.php"><li><i class="fas fa-cog"></i> Settings</li></a>

            </ul> 
        </nav>
        <div class="main">
            <div class="info">
                <a href="addMenu.php" type="button" class="btn btn-outline-success" style="width:10%">Add Menu</a>
                
                
                
                <br>
                <br>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th style="width: 1%">No</th>
                            <th>Food Name</th>
                            <th>Category</th>
                            <th>Details</th>
                            <th style="width: 15%">
                                Availability 
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Blue = Available &#10;Gray/White = Not Available">
                                    <button class="btn btn-secondary" style="pointer-events: none; background-color: gray; border-color: gray; width: auto;" type="button" disabled><i class="fas fa-info-circle"></i></button>
                                </span>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $i=1;
                        while ($row = $result->fetch_assoc()):?>
                            <!-- Modal -->
                            <div class="modal fade" id="view-modal<?php echo $row['id']?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="hidden">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-title">Menu Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button> 
                                        </div>
                                        <div class="modal-body">
                                            <img style="width:150px; height:150px; display: block; margin-left: auto; margin-right: auto;" src="includes/<?php echo $row['food_photo']?>"/>
                                            <br>
                                            <p><b>Food Name &nbsp;&ensp;: </b><?php echo $row['food_name'];?></p>
                                            <p><b>Category &emsp;&emsp;: </b><?php echo $row['food_category'];?></p>
                                            <p><b>Price &emsp;&emsp;&emsp;&emsp;: </b><?php $number = $row['food_price']; echo 'RM'.number_format($number, 2, '.', ''); ?></p>
                                            <p><b>Description &ensp;&ensp;: </b><?php echo $row['food_desc'];?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       

                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['food_name'];?></td>
                            <td><?php echo $row['food_category'];?></td>
                            <td class="text-center">
                                <!-- Modal Trigger-->
                                <a href="#" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#view-modal<?php echo $row['id']?>">View</a>
                            </td>
                            <td>
                                <div class="form-check form-switch" style="vertical-align: middle; text-align: center;">
                                    <input class="form-check-input" style="padding-left: 30%; margin-left: 20%;" name="avl<?php echo $row['id']?>" type="checkbox" id="availability" onclick="updateDB(<?php echo $row['id']?>,this.checked)"
                                    <?php if($row['status_availability']=="Available"){ echo 'Checked';}?>>
                                </div>
                            </td>
                            <td class="text-center"><a href="edit.php?id=<?php echo $row['id']?>" type="button" class="btn btn-primary btn-block">EDIT</a></td>
                        </tr>               

                        
                        
                        <?php $i++; ?>
                        <?php endwhile;?>
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
    <!-----------------------------------Availability Auto Update----------------------------------->
    <script type="text/javascript">
        function updateDB(id, chk) {
            var c = document.querySelector("input[type=checkbox]");
            
            if (chk == true){
                console.log(id);
                console.log(chk);    
                
                // (B2) AJAX CALL
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/script.php?id="+id+"&availability=Available");
                xhr.onload = function () {
                    console.log(this.response);
                };
                xhr.send(c);
                return false;
            }else{
                console.log(id);
                console.log(c);    
                
                // (B2) AJAX CALL
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/script.php?id="+id+"&availability=Not Available");
                xhr.onload = function () {
                    console.log(this.response);
                };
                xhr.send(c);
                return false;
            }
        }
    </script>
    <!---------------------------------------------------------------------------------------------->
</body>
</html>
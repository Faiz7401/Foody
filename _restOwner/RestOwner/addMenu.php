<?php 
session_start();
$uname = $_SESSION['restaurant Owner'];

require 'includes/db.inc.php';

$resultROW = $conn->query("SELECT * FROM user WHERE user_name='$uname'") or die($mysqli->error);
while ($rowUser = $resultROW->fetch_assoc()):
$phone = $rowUser['user_contactPhone'];
//secho $phone;
$resultRest = $conn->query("SELECT * FROM restaurant WHERE time_phone = '$phone'") or die($mysqli->error);

    while ($rowRest = $resultRest->fetch_assoc()):
    $rest_id = $rowRest['restaurant_ID'];
    $name = $rowRest['restaurant_name'];

    $resultCat = $conn->query("SELECT * FROM category WHERE restaurant_id = '$rest_id'") or die($mysqli->error);
    
    endwhile;
endwhile;
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
            <li><h1>Restaurant Name</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../../index.php'">Logout</button>
    </header>

    <div class="row">
        <nav class="sidebar">
            <h2>Home</h2>
            <ul>
                <a class="active" href="index.php"><li><i class="fas fa-hamburger"></i> Menu</li></a>
                <a href="delStatus.php"><li><i class="fas fa-motorcycle"></i> Delivery Status</li></a>
                <a href="sales.php"><li><i class="fas fa-money-check"></i> Sales</li></a>
                <a href="setting.php"><li><i class="fas fa-cog"></i> Settings</li></a>


            </ul> 
        </nav>
        <div class="main">
            <div class="info">
                <form action="includes/addMenu.inc.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <img src="upload.jpg" id="upload" onclick="triggerClick()"/>
                        <div class="row">
                            <input type='file' name="fimage" id="getImg" style="display:none" accept="image/png, image/jpeg, image/jpg" onchange="displayImage(this)">
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="Category">Category :</label>
                                
                            </div>
                            
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm" name="category" id="category">
                                    <option selected>--SELECT CATEGORY--</option>
                                    <option value="Beverage">Beverage</option>
                                    <option value="Seafood">Seafood</option>
                                    <option value="Appetizers">Appetizers</option>
                                    <?php while ($rowCat = $resultCat->fetch_assoc()):?>
                                    <?php foreach($resultCat as $rowCat){?>
                                    <option value="<?php echo $rowCat['category'];?>"><?php echo $rowCat['category'];?></option>
                                    <?php $i++; }?>
                                    <?php endwhile;?>
                                    <option value="Other">Other</option>
                                </select>
                                <br id="break">
                                <input class="form-control" type="text" id="other" name="other">
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="fname">Name :</label>
                                
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="fname" name="fname">
                                <input class="form-control" type="hidden" id="rest_id" name="rest_id" value="<?php echo $rest_id?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="fprice">Price (RM) :</label>
                                
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="fprice" name="fprice" min="2.50" step=".01">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="fprice">Description :</label>
                                
                                
                            </div>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="fdescription"> </textarea>
                            </div>
                        </div>
                        
                    

                        
                    </div>

                        <div class="row">
                        
                            <div class="col-lg-3">
                                <a href="index.php" class="btn btn-secondary">CANCEL</a>
                            </div>

                            <div class="col-lg-3 offset-lg-6">
                                <button type="submit" class="btn btn-success" name="add-menu" value="add-menu">ADD</button>
                            </div>

                            
                        </div>
                </form>                  
            </div>
        </div>
    </div>
    <script>
        //category
        const Category = document.getElementById('category');

        const other = document.getElementById('other');
        const breaks = document.getElementById('break');

        Category.addEventListener('change', function handleChange(event) {
        if (event.target.value === 'Other') {
            other.style.display = 'block';
            breaks.style.display = 'block';
        } else {
            other.style.display = 'none';
            breaks.style.display = 'none';
        }
        });
    </script>
    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
    <script src="img.js"></script>
</body>
</html>
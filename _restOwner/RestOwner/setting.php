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
                <a href="index.php"><li><i class="fas fa-hamburger"></i> Menu</li></a>
                <a href="delStatus.php"><li><i class="fas fa-motorcycle"></i> Delivery Status</li></a>
                <a href="sales.php"><li><i class="fas fa-money-check"></i> Sales</li></a>
                <a class="active" href="#"><li><i class="fas fa-cog"></i> Settings</li></a>



            </ul> 
        </nav>
        <div class="main">
            <div class="info">
                <div class="row">
                    <div class="row">
                            <img src="upload.jpg" id="upload" onclick="triggerClick()"/>
                            <div class="row">
                                <input type='file' name="fimage" id="getImg" style="display:none" accept="image/png, image/jpeg, image/jpg" onchange="displayImage(this)">
                            </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="fmail">Email :</label>
                            
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" id="fmail" name="fmail" value="alicafe@gmail.com" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <label for="fname">Name :</label>
                            
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="fname" name="fname" value="Ali bin Abu" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="fcontact">Contact Number :</label>
                            
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="fcontact" name="fcontact" value="012-3459876" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="fprice">Address :</label>
                            
                        </div>
                        <div class="col-sm-8">
                            <textarea class="form-control">ALI CAFE, Taman Tas, Kuantan</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="Category">Time Operation :</label>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="fprice">From </label>
                                
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="time" id="fcontact" name="fcontact" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="fprice">Until </label>
                                
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="time" id="fcontact" name="fcontact" >
                            </div>
                        </div>
                        <a href="#">Change Password</a>
                    
                    </div>

                    

                </div>

                    <div class="d-flex justify-content-end">
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        </div>    
                    </div>

                    

                    
            </div>
        </div>
    </div>
    
    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
    <script src="img.js"></script>
</body>
</html>
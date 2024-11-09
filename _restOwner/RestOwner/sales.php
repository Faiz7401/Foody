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
                <a class="active" href="#"><li><i class="fas fa-money-check"></i> Sales</li></a>
                <a href="setting.php"><li><i class="fas fa-cog"></i> Settings</li></a>


            </ul> 
        </nav>
        <div class="main">
            <div class="info">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th style="width: 1%">No</th>
                            <th>Date</th>
                            <th>Menu</th>
                            <th>Amount (RM)</th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td><a href="#" >View</a></td>
                            <td></td>
                            
                        </tr>
                       
                    </tbody>
                </table>

                <div class="col-sm-2">
                    <label for="fprice">Total Sales : RM</label>
                    
                </div>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>
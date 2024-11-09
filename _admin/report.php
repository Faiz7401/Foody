<?php
    include('config.php');
    $sql ="SELECT count(*) as data1 FROM user where user_role='restaurant Owner'";  
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) { 
        $user_role[]  = $row['data1'] ;
    }

    $sql1 ="SELECT count(*) as data2 FROM user where user_role='rider'";  
    $result1 = mysqli_query($conn,$sql1);
    while ($row = mysqli_fetch_array($result1)) { 
        $user_role1[]  = $row['data2'] ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="../images/logo.png">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</head>
<body>
    <header>
        <img id="logo" src="foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../index.php'">Logout</button>
    </header>



    <div class="row">
        <nav class="sidebar">
            <h2>Home</h2>
            <ul>
                <a href="index.php"><li><i class="fas fa-home"></i> Dashboard </li></a>
                <a href="ManageUser.php"><li><i class="fas fa-user"></i> Manage User <i class="fa fa-caret-down"></i></li></a>
                <ul class="sub-menu">
                    <li><a href="NewUser.php">Create new user</a></li>
                    <li><a href="">Edit User</a></li>
                </ul>
                <a class="active" href="#"><li><i class="fas fa-chart-bar"></i> Report </li></a>

            </ul>                    
        </nav>   

        <div class="main">
            <div class="info">
                <div class="row">
                        <div class="col-xl">     
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th style="width: 1%">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        include('config.php');
                                        $i=1;
                                        $query=mysqli_query($conn,"select * from `user`");
                                        while($row=mysqli_fetch_array($query)){                         
                                        ?>                        
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['user_contactPhone']; ?></td>
                                            <td><?php echo $row['user_address']; ?></td>
                                            <td><?php echo $row['user_role']; ?></td>                              
                                        </tr>                          
                                        <?php
                                        $i++;                                                    
                                        }
                                    ?> 
                                </tbody>
                            </table>
                        </div>                                     
                        <div class="col-xl">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas> 
                                <script>
                                        var xValues = ["restaurant Owner", "rider", "general User"];
                                        var yValues = <?php echo json_encode($user_role); ?>;
                                        var barColors = ["red", "green","blue"];

                                        new Chart("myChart", {
                                            type: "bar",
                                            data: {
                                                labels: xValues,
                                                datasets: [{
                                                backgroundColor: barColors,
                                                data: yValues
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                }
                                                            }]
                                                        },
                                                legend: {display: false},
                                                title: {
                                                display: true,
                                                text: "Foody(UMP Food Delivery System)"
                                                }
                                            }
                                        });
                                </script>
                        </div>     
                </div>
            </div>
        </div>
    </div>


    </div>
    <footer><hr><br> &copy 2022 All Right Reserve</footer>
<script src="js/bootstrap.js"></script>
</body>
</html>
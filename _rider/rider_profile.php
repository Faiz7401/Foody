<?php 
include('partials/dbconn.php');

$data = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '".$_SESSION['rider']."'");
$data2 = mysqli_query($conn, "SELECT * FROM rider WHERE rider_name = '".$_SESSION['rider']."'");

$test = mysqli_fetch_row($data);
$test2 = mysqli_fetch_row($data2);

include('partials/top.php'); 
?>

        <div class="main">
            <div class="info">
				<div><img src="bike.png" alt="Profile Picture"></div>
				<div>
                        <table class="tbl-profile">
                            <tr>
                                
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                            </tr>

                                
                           
                            <tr>
                                
                                <td><?php echo $test[2]; ?></td>
                                <td><?php echo $test[3]; ?></td>
                                <td><?php echo $test2[1]; ?></td>
                            </tr>

                                            
                            
                        </table>
				</div>
				<button class="order_profile" onclick="window.location.href = 'rider_profileEdit.php';">Edit Profile</button>
                <!--<a href="" class="order_profile">Edit</a>-->
            </div>
        </div>
    </div>

    

    <?php include('partials/footer.php'); //sadadsadasdasd?>
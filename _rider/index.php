<?php 
include('partials/dbconn.php');

$data = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '".$_SESSION['rider']."'");
$data2 = mysqli_query($conn, "SELECT * FROM rider WHERE rider_name = '".$_SESSION['rider']."'");

$test = mysqli_fetch_row($data);
$test2 = mysqli_fetch_row($data2);


include('partials/top.php'); 
?>


            <!-- main content-->

        <div class="main">
            <div class="info">
                <h1>Welcome, <?php echo $_SESSION['rider'];?></h1> <br><br>
                <h3>To Foody UMP Rider Management Page</h3><br>
                <img src="bike.png" alt="ride" width="1920" height="1008">
			</div>
        </div>
    </div>

<!-- footer below-->

<?php include('partials/footer.php'); ?>
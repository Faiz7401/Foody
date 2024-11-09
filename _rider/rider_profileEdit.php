
<?php
include('partials/dbconn.php');
$data = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '".$_SESSION['rider']."'");
$data2 = mysqli_query($conn, "SELECT * FROM rider WHERE rider_name = '".$_SESSION['rider']."'");

$test = mysqli_fetch_row($data);
$test2 = mysqli_fetch_row($data2);

$id = $test[0];
$user_name = $test[1];
$user_contactPhone = $test[4];
$rider_plateNumber = $test2[1];

include('partials/top.php');
?>

<div class="main">
            <div class="info">
				<div><img src="bike.png" alt="Profile Picture"></div>
					<div>
					

					<form action="" method="POST">
						<table>
							<tr>
								<td>Rider Name</td>
								<td>
									<input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>">
								</td>
							</tr>

							<tr>
								<td>Rider Contact Number</td>
								<td>
									<input type="text" id="user_contactPhone" name="user_contactPhone" value="<?php echo $user_contactPhone; ?>"> 
								</td>
							</tr>

							<tr>
								<td>Rider Plate Number</td>
								<td>
									<input type="text" id="rider_plateNumber" name="rider_plateNumber" value="<?php echo $rider_plateNumber; ?>"> 
								</td>
							</tr>

							<tr>
								<td colspan="2">
								<!--<input type="hidden" name="Rider_ID" value="<?php// echo $Rider_ID ?>">-->
									<input type="submit" name="submit" value="Update User" id="submit" class="order_profile">
								</td>
							</tr>
						</table>
					</form>

					<button class="order_profile" onclick="window.location.href = 'rider_profile.php';">Go Back</button>	
				</div>
			</div>
     </div>
</div>

<?php if(isset($_POST['submit']) )
    {
		$user_name = $_POST['user_name'];
		$user_contactPhone = $_POST['user_contactPhone'];
		$rider_plateNumber = $_POST['rider_plateNumber'];
		
		$sql = "UPDATE user SET user_name = '$user_name', user_contactPhone = '$user_contactPhone' WHERE user_ID = $id";
		$sql2 = "UPDATE rider SET rider_name = '$user_name', rider_plateNumber = '$rider_plateNumber' WHERE Rider_ID = $id";
		$res = mysqli_query($conn, $sql);
		$res2 = mysqli_query($conn, $sql2);

		if($res && $res2){
            $_SESSION['rider'] = $user_name;
			echo "
                <script>
                    alert('Data has been updated');
                    document.location.href = 'rider_profile.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Data fail to update');
                    document.location.href = 'rider_profile.php';
                </script>
            ";
            die(mysqli_error($conn));
        }
	}
?>

<?php include('partials/footer.php'); ?>


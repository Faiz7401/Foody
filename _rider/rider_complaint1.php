<?php include('partials/dbconn.php'); ?>

<?php
$data = mysqli_query($conn, "SELECT DISTINCT complaint_type FROM complaint ORDER BY complaint_date ASC");
$test = mysqli_fetch_all($data);
$serial = 1;

/*$data2 = mysqli_query($conn, "SELECT complaint_type FROM complaint ORDER BY complaint_date ASC");
$test2 = mysqli_fetch_all($data2);*/

//print_r($test);
include('partials/top.php'); 
?>

<div class="main">
            <div class="info">
			<H2>Complaint List<br><br></h2>
			<form action="rider_complaint2.php" method="GET">
				<div>
					<select class="comp" name="complaint_type" id="complaint_type" required>
						<option value=""></option>
						<?php 
						foreach($test as $value) 
							{
								echo '<option value="' . $value[0] . '">' . $value[0] . '</option>';
							}
						?>
					</select>
				</div>
						<br><H2>Complaint List</H2><br><br>
				
				
				<button type="submit" class="check_compl">View Complaint</button>
			</form>
				
            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
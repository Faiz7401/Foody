<?php
include('partials/dbconn.php');
$data = mysqli_query($conn, "SELECT * FROM complaint WHERE complaint_type = '".$_GET['complaint_type']."'");
$test = mysqli_fetch_all($data);


//print_r($test);
include('partials/top.php'); 
?>

<
        <div class="main">
            <div class="info">
				<table>
					<tr>
						<th>Complaint Type</th>
						<th>Complaint Date</th>
						<th>Complaint Time</th>
						<th>Complaint Description</th>
					</tr>
					
					<?php
					foreach($test as $row){ ?>
					<tr>
						<td><?php echo $row[3];?></td>
						<td><?php echo $row[1];?></td>
						<td><?php echo $row[2];?></td>
						<td><?php echo $row[4];?></td>
					</tr>
					<?php }?>
				</table>
				<form action="">
					<button type="submit"></button>
				</form>
            </div>
        </div>
    </div>

    <footer><hr><br> &copy 2022 All Right Reserve</footer>
    
</body>
</html>
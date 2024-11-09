
<?php 
include('partials/dbconn.php');
$data = mysqli_query($conn, "SELECT complaint_desc FROM complaint WHERE complaint_ID = ");

include('partials/top.php'); 
?>

<div class="main">
            <div class="info">
                <div class= "order_title"><h2>Current Orders</h2></div>
				<div>
					<table class="">
						<tr>
							<th>Restaurant</th>
							<td>
                            </td>
						</tr>
						<tr>
							<th>Menu Item(s)</th>
							<td>
                            </td>
						</tr>
						<tr>
							<th>Customer Name</th>
							<td>
                            </td>
						</tr>
						<tr>
							<th>Customer Address</th>
							<td>
                                
                            </td>
						</tr>
						<tr>
							<th>Customer Contact No.</th>
							<td>
                                
                            </td>
						</tr>
					</table>
				</div>
                <form action="" method="POST">
                <!--<input type="submit" name="submit" value="Update Admin" id="" class="btn-secondary">-->
				<button type="submit" class="order_status" >Preparing</button>
				<button type="submit" class="order_status" >Picked Up</button>
				<button type="submit" class="order_status" >Delivered</button>
				<button type="submit" class="order_status" >Cancelled</button>
                </form>
			</div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
<?php
include('config.php');
$result=mysqli_query($conn,"select * from `complaint`");
$i=1;
while($row=mysqli_fetch_array($result))                       
?>

<?php include('partials/top.php'); ?>

        <div class="column middle">
            <a style="cursor: pointer" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

        <div class="column right">
            <div class="info">
                
                <h1 style="align:center">REPORT</h1>

                <div>
				<select name="compdate" id="compdate">
					<option value="weekly">Weekly</option>
					<option value="monthly">Monthly</option>
					<option value="overall">Overall</option>
					<option value="other">Specific Date</option>
				</select><br>
				</div>
				<h2>For Specific Date:<h2><br><br>
				<div>
					<label for="start">From:</label>
					<input class="date" type="date" id="start" name="start" value="" min="2022-01-01" max="2022-12-31">
					<label for="end">Until:</label>
					<input class="date" type='date' id="end" name="end" min='2022-01-01' max='2022-12-31'></input>
				</div>
				<!--<button class="" onclick="window.location.href = '#2.html';">Generate Report</button>-->
			</div>
<?php

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">complaint_ID</font> </td> 
          <td> <font face="Arial">user_name</font> </td> 
          <td> <font face="Arial">complaint_date</font> </td> 
          <td> <font face="Arial">complaint_time</font> </td> 
          <td> <font face="Arial">order_ID</font> </td> 
          <td> <font face="Arial">complaint_type</font> </td>
          <td> <font face="Arial">complaint_desc</font> </td>
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $complaint_ID = $row["col1"];
        $user_name = $row["col2"];
        $complaint_date = $row["col3"];
        $complaint_time = $row["col4"];
        $order_ID = $row["col5"]; 
        $complaint_type = $row["col6"];
        $complaint_desc = $row["col7"];

        echo '<tr> 
                  <td>'.$complaint_ID.'</td> 
                  <td>'.$user_name.'</td> 
                  <td>'.$complaint_date.'</td> 
                  <td>'.$complaint_time.'</td> 
                  <td>'.$order_ID.'</td> 
                  <td>'.$complaint_type.'</td> 
                  <td>'.$complaint_desc.'</td>
              </tr>';
    }
    $result->free();
} 
?>    

            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
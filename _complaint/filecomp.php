<?php include('../_rider/partials/dbconn.php');
$data = mysqli_query($conn,"SELECT * FROM complaint WHERE Complaint_ID = '".$_SESSION['general User']."'");
$data2 = mysqli_query($conn,"SELECT * FROM user WHERE role='".$_SESSION['general User']."'");
echo $_SESSION['general User'];
$test = mysqli_fetch_row($data);
$test2 = mysqli_fetch_row($data2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foody: UMP Food Delivery System</title>
    <link rel="stylesheet" href="complaint.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/4dc048a7a9.js" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</head>
<body>

    <!-- top section starts-->

    <header>
        <img src="foody logo.png" alt="Foody Logo">
        <ul>
            <li><h1>Foody</h1></li>
            <li><p>UMP Food Delivery System</p></li>
        </ul>
        <button class="logout" onClick="parent.location='../index.php'">Logout</button>
    </header>

    <div class="row">
        <div class="column left">
        <div class="sidebar">
            <h2>Home</h2>
			<ul>
                <li><a href="#.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#.php"><i class="fas fa-address-card"></i> Orders</a></li>
                <li><a href="#.php"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="filecomp.php"><i class="fas fa-exclamation"></i> Complaint</a></li>
                <li><a href="report.php"><i class="fas fa-file"></i> Report</a></li>
            </ul> 
            </div>
        </div>
    <!-- top section ends -->

        <div class="column middle">
            <a style="cursor: pointer" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>

        <div class="c">

            <div class="info">
                
                <h1 class="h1">FILE A COMPLAINT</h1><br>

                <div class="filecomp">
                    <table class="compform" name="compform" style="align:left">
                    <form action="compinsert.php" method="post" class="filecomp" enctype="multipart/form-data">

                    <?php while ($row = $data2->fetch_assoc()):?> 

                        <tr class="a" style="align:left">
                            <td class="a" style="align:left">User ID</td>
                            <td class="a">:</td>
                            <td class="a"><?php echo $row['user_ID']; ?></td>
                        </tr>
                        <?php endwhile;?>

                        <tr class="a">
                            <td class="a">Name</td>
                            <td class="a">:</td>
                            <td class="a">
                                <?php echo $_SESSION['general User']; ?></td>
                        </tr>

                        <tr class="a">
                            <td class="a">Date</td>
                            <td class="a">:</td>
                            <td class="a"><?php echo date("Y-m-d"); ?></td>
                        </tr>

                        <tr class="a">
                            <td class="a">Time</td>
                            <td class="a">:</td>
                            <td class="a"><?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("h:i a"); ?></td>
                        </tr>

                        <tr class="a">
                            <td class="a">Order ID</td>
                            <td class="a">:</td>
                            <td class="a"></td>
                        </tr>

                        <tr class="a">
                            <td class="a">Type</td>
                            <td class="a">:</td>
                            <td class="a">
                                <select id="complaint_type" name="complaint_type" required>
                                    <option disabled selected value>FILE COMPLAINT:</option>
                                    <option value="Late delivery">Late delivery</option>
                                    <option value="Package damage during delivery">Package damage during delivery</option>
                                    <option value="Billing/Collection">Billing/Collection</option>
                                    <option value="Others">Others</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="a">
                            <td class="a">Description</td>
                            <td class="a">:</td>
                            <td class="a"><textarea id="complaint_desc" name="complaint_desc" rows="4" cols="50"></textarea></td>
                        </tr>

                        <tr class="a">
                            <td class="a"></td>
                            <td class="a"></td>
                            <td class="a"><input type="submit" value="Submit" class="submit" /></td>
                        </tr>

                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>
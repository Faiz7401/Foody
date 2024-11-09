<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foody";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
if(ISSET($_POST['Update'])){
        $complaint_ID = $_POST['complaint_ID'];
        $order_ID = $_POST['order_ID'];
        $complaint_type = $_POST['complaint_type'];
        $complaint_date = $_POST['complaint_date'];
        $complaint_time = $_POST['complaint_time'];
        $complaint_desc = $_POST['complaint_date'];
        $sql = "UPDATE `complaint`SET `complaint_type` = '$complaint_type', `complaint_desc` = '$complaint_desc'  WHERE `complaint_ID` = '$complaint_ID'";
        if ($conn->query($sql) === TRUE) {
          echo("<script>alert('Complaint has been successfully updated.')</script>");
          echo("<script>window.location = './list.php';</script>");
        } else {
          echo("<script>alert('Failed to update complaint.')</script>");
          echo("<script>window.location = './list.php';</script>");
        }
}
?>
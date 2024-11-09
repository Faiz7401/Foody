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
    $sql = "DELETE FROM complaint WHERE complaint_ID ='" . $_GET["complaint_ID"] . "'";
    if ($conn->query($sql) === TRUE) {
        echo("<script>alert('Complaint has been deleted.')</script>");
        echo("<script>window.location = './list.php';</script>");
      } else {
        echo("<script>alert('Failed to delete complaint.')</script>");
        echo("<script>window.location = './list.php';</script>");
      }
    
?>
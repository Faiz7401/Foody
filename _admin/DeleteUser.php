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
    $sql = "DELETE FROM user WHERE user_ID ='" . $_GET["user_ID"] . "'";
    if ($conn->query($sql) === TRUE) {
        echo("<script>alert('User successful deleted!')</script>");
        echo("<script>window.location = './ManageUser.php';</script>");
      } else {
        echo("<script>alert('Error')</script>");
        echo("<script>window.location = './ManageUser.php';</script>");
      }
    
?>

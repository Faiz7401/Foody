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
        $user_ID = $_POST['user_ID'];
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_contactPhone = $_POST['user_contactPhone'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $sql = "UPDATE `user`SET `user_name` = '$user_name', `user_password` = '$user_password', `user_contactPhone` = '$user_contactPhone', `user_email` = '$user_email', `user_address` = '$user_address'  WHERE `user_ID` = '$user_ID'";
        if ($conn->query($sql) === TRUE) {
          echo("<script>alert('User successful updated!')</script>");
          echo("<script>window.location = './ManageUser.php';</script>");
        } else {
          echo("<script>alert('Error')</script>");
          echo("<script>window.location = './ManageUser.php';</script>");
        }
}
?>
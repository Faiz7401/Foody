
<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "foody3") or die(mysqli_connect_error());

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

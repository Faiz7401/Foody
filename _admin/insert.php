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

if(isset($_POST['submit']))
{    
     $user_name = $_POST['user_name'];
     $user_password = $_POST['user_password'];
     $user_role = $_POST['user_role'];
     $user_contactPhone = $_POST['user_contactPhone'];
     $user_email = $_POST['user_email'];
     $user_address = $_POST['user_address'];
     /*move_uploaded_file($_FILES["user_image"]["tmp_name"],"uploads/" . $_FILES["user_image"]["name"]);			
     $location=$_FILES["user_image"]["name"];
     $extension= ['png','jpeg','jpg','gif'];*/
     $sql = "INSERT INTO user (user_name, user_password, user_role, user_contactPhone, user_email, user_address)
     VALUES ('$user_name','$user_password','$user_role','$user_contactPhone','$user_email','$user_address')";
     if (mysqli_query($conn, $sql)) {
          echo("<script>alert('User successful added!')</script>");
          echo("<script>window.location = './ManageUser.php';</script>");
        exit();
     } else {
          echo("<script>alert('Error')</script>");
          echo("<script>window.location = './ManageUser.php';</script>");
     }
     mysqli_close($conn);
}
?>
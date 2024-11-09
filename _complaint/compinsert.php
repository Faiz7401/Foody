<?php include('../_rider/partials/dbconn.php');

if(isset($_POST['submit']))
{    
     $user_ID = $_POST['user_ID'];
     $user_name = $_POST['user_name'];
     $complaint_date = $_POST['complaint_date'];
     $complaint_time = $_POST['complaint_time'];
     $order_ID = $_POST['order_ID'];
     $complaint_type = $_POST['complaint_type'];
     $complaint_desc = $_POST['complaint_desc'];
     $sql = "INSERT INTO complaint (user_ID,user_name,complaint_date,complaint_time,order_ID,complaint_type,complaint_desc)
     VALUES ('$user_ID','$user_name','$complaint_date','$complaint_time','$order_ID','$complaint_type','$complaint_desc')";
     if (mysqli_query($conn, $sql)) {
          echo("<script>alert('Complaint has been filed.')</script>");
          echo("<script>window.location = './list.php';</script>");
        exit();
     } else {
          echo("<script>alert('Complaint failed to be filed.')</script>");
          echo("<script>window.location = './list.php';</script>");
     }
     mysqli_close($conn);
}
?>
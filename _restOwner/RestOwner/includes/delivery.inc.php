<?php
 require 'db.inc.php';
if(isset($_POST['updateStatus'])){

    $id = $_POST['id'];
    
    $status = 'Pickup';



    $conn->query("UPDATE `order` SET order_status='$status' WHERE order_ID=$id") or die($conn->error());
       

    header("location: ../delStatus.php?id=$id&updated");
    exit();
}else{
    header("location: ../delStatus.php?id=$id&Error");
    exit();
}
?>
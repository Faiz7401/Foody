<?php
 require 'db.inc.php';
if(isset($_POST['update'])){

    
        

    $targetDir = "menu/";
    $fimage = $_FILES['fimage'];

    $category = $_POST['category'];

    echo $category;
    
    if(!empty($_POST['other'])){
        $other = $_POST['other'];
        $category = $other;
    }

    
    $targetFilePath = $_POST['image'];
    $id= $_POST['id'];
    $rest_id = 'B02';
    $fname = $_POST['fname'];
    $fprice = $_POST['fprice'];
    $fdescription = $_POST['fdescription'];
    $fstatus = 'Available';
    if(!empty($_FILES["fimage"]["name"])){
        $fileName = basename($_FILES["fimage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $tmpName = addslashes(file_get_contents($_FILES["fimage"]["tmp_name"]));
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $allowTypes = array('jpg','jpeg','png');
        if(in_array($fileType,$allowTypes)){
            if(move_uploaded_file($_FILES["fimage"]["tmp_name"], $targetFilePath)){
                $conn->query("UPDATE menu SET food_category='$category', food_name='$fname', food_price='$fprice', food_desc='$fdescription', food_photo='$targetFilePath' WHERE id=$id") or die($conn->error());
            }
        }

    }



        $conn->query("UPDATE menu SET food_category='$category', food_name='$fname', food_price='$fprice', food_desc='$fdescription', food_photo='$targetFilePath' WHERE id=$id") or die($conn->error());
       

    header("location: ../edit.php?id=$id&updated");
    exit();
}

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $sql = "DELETE FROM menu WHERE id=$id ";
    if($conn->query($sql) === TRUE){
        header("location: ../index.php?id=$id&deleted");
        exit();
    }else{
        header("Location: ../edit.php?error=sqlerror2");
        exit();
    }
    
}


?>
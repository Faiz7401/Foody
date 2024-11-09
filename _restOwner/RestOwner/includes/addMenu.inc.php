<?php 

    if(isset($_POST['add-menu'])){
        
        require 'db.inc.php';
        

        $targetDir = "menu/";
        $fimage = $_FILES['fimage'];

        $category = $_POST['category'];
        
        if(!empty($_POST['other'])){
            $other = $_POST['other'];
            $category = $other;
        }
        
        $fname = $_POST['fname'];
        $fprice = $_POST['fprice'];
        $fdescription = $_POST['fdescription'];
        $fstatus = 'Available';
        $rest_id = $_POST['rest_id'];

        //echo $category;
        //echo ' ' . $fname;
        //echo ' ' . $fprice;
        //echo ' ' . $fdescription;
        if( empty($category) || empty($fname) || empty($fprice) || empty($fdescription) ){
            header("Location: ../addMenu.php?error=emptyfields&");
            exit();
        
        }
        else{
            $sql = "SELECT food_name FROM menu WHERE food_name=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../addMenu.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $fname);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                     if(!empty($_FILES["fimage"]["name"])){
                        $fileName = basename($_FILES["fimage"]["name"]);
                        $targetFilePath = $targetDir . $fileName;
                        $tmpName = addslashes(file_get_contents($_FILES["fimage"]["tmp_name"]));
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        
                        $allowTypes = array('jpg','jpeg','png');
                        if(in_array($fileType,$allowTypes)){
                            if(move_uploaded_file($_FILES["fimage"]["tmp_name"], $targetFilePath)){
                                $sql = "INSERT INTO menu (food_photo, restaurant_id,food_name,food_price,food_desc,status_availability,food_category) VALUES (('".$targetFilePath."'),?,?,?,?,?,?)";
                            }
                        }

                    
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../addMenu.php?error=sqlerror%HELP");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "dsdsss", $rest_id,$fname,$fprice,$fdescription,$fstatus,$category);
                        mysqli_stmt_execute($stmt);
                        if(!empty($_POST['other'])){
                            header("Location: addCategory.php?rest=$rest_id&cat=$other");
                            exit();
                        }else{
                            header("Location: ../index.php?menu=Saved");
                            exit();
                        }
                        
                    }
                }else{
                    header("Location: ../addMenu.php");
                    exit();
                }
            }
        
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else{
        header("Location: ../addMenu.php");
        exit();
    }

?>
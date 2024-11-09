<?php 


        
        require 'db.inc.php';
        

        $category = $_GET['cat'];
        $rest_id = $_GET['rest'];


        if( empty($category) || empty($rest_id)){
            header("Location: ../addMenu.php?error=emptyfields&");
            exit();
        
        }
        else{
            $sql = "SELECT id FROM category WHERE category=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../addMenu.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $category);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header("Location: ../addMenu.php?error=categoryTaken=".$category);
                    exit();
                }
                else{
                    $sql = "INSERT INTO category (restaurant_id, category) VALUES (?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../addMenu.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "ss", $rest_id,$category);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?menu=Saved");
                        exit();
                    }
                }
            }
        
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

?>
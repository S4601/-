<?php
    session_start();
    include_once '../../includes/dbh.inc.php';
    
    if(!isset($_POST["submit"])) {
        header("Location: ../addPost.php?error=post");
    } else {        
        $ID = $_SESSION['userid'];           
        $title = $_POST['title'];
        $desc = $_POST['description'];
        echo $desc;
        $subject = $_POST['subject'];
        
        if($subject == "Оthers"){
            $class = 0;
        } else if(isset($_POST["subject"])){
            $class = $_POST['class'];
        }
        
        $publisher = $_POST['publisher'];

        $price = $_POST['price'];
        $area = $_POST['area'];
        $place = $_POST['place'];   
        
            
        include "errorHandlerAdd.php";
        include 'upload.php';
        
        if(empty($imgId)) {
            $imgIds = "none";
        } else {
            $imgIds = implode(" ", $imgId);
        }        
    
        $sql = "INSERT IGNORE INTO posts (users_id, post_title, post_description, post_subject, class, publisher, post_price, post_area, post_place, img_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {         
            mysqli_stmt_bind_param($stmt, "ssssssssss", $ID, $title, $desc, $subject, $class, $publisher, $price, $area, $place, $imgIds);           
            mysqli_stmt_execute($stmt);           
        }

        header("Location: ../addPost.php?error=success");
        
    }
?>
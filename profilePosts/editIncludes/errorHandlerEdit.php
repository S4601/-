<?php
        
    if(empty($title) || empty($desc) || empty($price) || empty($area) || empty($place) || $subject == "Default" || $publisher == "Default") {
        header("Location: ../edit.php?error=empty&postId=".$_SESSION["postId"]."");        
        exit();
    } else {                      
        if(!preg_match("/^[a-zA-ZА-Яа-я]+$/", $area)) {
            header("Location: ../edit.php?error=char&postId=".$_SESSION["postId"]."");            
            exit();
        }
        if(!preg_match("/^[a-zA-ZА-Яа-я]+$/", $place)) {
            header("Location: ../edit.php?error=char&postId=".$_SESSION["postId"]."");           
            exit();
        }
    }    
?>
<?php
    session_start();
    include_once "../../includes/dbh.inc.php";
    if(!isset($_POST["submit"]) || !isset($_SESSION["userid"])) {
        header("Location: ../../profile.php");
        exit();
    } else if(!isset($_SESSION["postId"])) {
        header("Location: ../edit.php");
        exit();
    } else {
        //print_r($_POST);
        
        //print_r($_SESSION);
        $title = $_POST["title"];
        $desc = $_POST["description"];
        $subject = $_POST["subject"];
        $class;        
        
        if($subject == "Оthers"){
            $class = 0;
        } else if(isset($_POST["subject"])){
            $class = $_POST['class'];
        }
        
        $publisher = $_POST['publisher'];

        $price = $_POST["price"];
        $area = $_POST["area"];
        $place = $_POST["place"];

        include "errorHandlerEdit.php";

        //saved data
        $savedTitle = $_POST["savedTitle"];
        $savedDescription = $_POST["savedDescription"];
        $savedSubject = $_POST["savedSubject"];
        $savedClass = $_POST["savedClass"];
        $savedPublisher = $_POST["savedPublisher"];
        $savedPrice = $_POST["savedPrice"];
        $savedArea = $_POST["savedArea"];
        $savedPlace = $_POST["savedPlace"];
        
        $sqlPart1 = array();
        $stmtParamValues = array();
        $stmtParams = "";

        //If something has changed/updated
        $changed = false;

        if($savedTitle == "false") {          
            $sqlPart1[] = "post_title = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $title;
            $changed = true;
        }
        if($savedDescription == "false") {
            $sqlPart1[] = "post_description = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $desc;
            $changed = true;
        }
        if($savedSubject == "false") {
            $sqlPart1[] = "post_subject = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $subject;
            $changed = true;
        }
        if($savedClass == "false") {
            $sqlPart1[] = "class = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $class;
            $changed = true;
        }
        if($savedPublisher == "false") {
            $sqlPart1[] = "publisher = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $publisher;
            $changed = true;
        }
        if($savedPrice == "false") {
            $sqlPart1[] = "post_price = ?";
            $stmtParams .= "i";
            $stmtParamValues[] = $price;
            $changed = true;
        }
        if($savedArea == "false") {
            $sqlPart1[] = "post_area = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $area;
            $changed = true;
        }
        if($savedPlace == "false") {
            $sqlPart1[] = "post_place = ?";
            $stmtParams .= "s";
            $stmtParamValues[] = $place;
            $changed = true;
        }
        
        if($changed) {            
            $sqlPart2 = implode(", ", $sqlPart1);        
            
            //include '../../post/contain/upload.php';
            /*
            if(empty($imgId)) {
                $imgIds = "none";
            } else {
                $imgIds = implode(" ", $imgId);
            }        
            */
            //$imgIds = $_GET["imgs"];
            
            $sql = "UPDATE posts SET ".$sqlPart2." WHERE post_id = ".$_SESSION["postId"].";";        
            /*
            echo $sql;
            echo $stmtParams;
            echo strlen($stmtParams);
            */
            
            $stmt = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                /*
                echo "      ";
                echo strlen($stmtParams);
                print_r($stmtParamValues);
                */
                
                if(strlen($stmtParams) == 1) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0]);    
                } else if(strlen($stmtParams) == 2) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1]);    
                } else if(strlen($stmtParams) == 3) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2]);    
                } else if(strlen($stmtParams) == 4) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2], $stmtParamValues[3]);    
                } else if(strlen($stmtParams) == 5) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2], $stmtParamValues[3], $stmtParamValues[4]);    
                } else if(strlen($stmtParams) == 6) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2], $stmtParamValues[3], $stmtParamValues[4], $stmtParamValues[5]);    
                } else if(strlen($stmtParams) == 7) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2], $stmtParamValues[3], $stmtParamValues[4], $stmtParamValues[5], $stmtParamValues[6]);    
                } else if(strlen($stmtParams) == 8) {
                    mysqli_stmt_bind_param($stmt, $stmtParams, $stmtParamValues[0], $stmtParamValues[1], $stmtParamValues[2], $stmtParamValues[3], $stmtParamValues[4], $stmtParamValues[5], $stmtParamValues[6], $stmtParamValues[7]);    
                }
                            
                mysqli_stmt_execute($stmt);
            }
            
            /*
            $sqlTest = "SELECT * FROM posts WHERE post_id = ".$_GET["postId"].";";
            $t = mysqli_query($conn, $sqlTest);
            echo "<br>";
            if($row = mysqli_fetch_assoc($t)) {
                print_r($row);
            }
            */
            
            header("Location: ../edit.php?error=success&changed=".$changed."&postId=".$_SESSION["postId"]."");
            unset($_SESSION["postId"]);            
            exit();
        } else {            
            header("Location: ../edit.php?error=notChanged&changed=false&postId=".$_SESSION["postId"]."");
            exit();
        }                
    }   
?>
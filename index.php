<?php
    include_once 'header.php';
?>
    
    <div class="p-5">
        <p class="lead indexPostTitle pb-2">Скорошни обяви</p>

        <div class="container-fluid py-2">
            <div class="d-flex flex-row flex-nowrap  overflow-auto pb-3">
            <?php
                include "includes/dbh.inc.php";
                $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 4;";
        
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                    $subjectConv;
                    $classConv;
                    $publisherConv;

                    switch($row["post_subject"]) {
                        case 'Math':
                            $subjectConv = "Математика";
                            break;
                        case 'Bulgarian':
                            $subjectConv = "Български език";
                            break;
                        case "Literature":
                            $subjectConv = "Литература";
                            break;
                        case "Chemistry":
                            $subjectConv = "Химия";
                            break;
                        case "Physics":
                            $subjectConv = "Физика";
                            break;
                        case "Biology":
                            $subjectConv = "Биология";
                            break;
                        case "History":
                            $subjectConv = "История";
                            break;
                        case "Geography":
                            $subjectConv = "География";
                            break;
                        case "Philosophy":
                            $subjectConv = "Философия";
                            break;
                        case "English":
                            $subjectConv = "Английски език";
                            break;
                        case "German":
                            $subjectConv = "Немски език";
                            break;
                        case "Spanish":
                            $subjectConv = "Испански език";
                            break;
                        case "French":
                            $subjectConv = "Френски език";
                            break;
                        case "Russian":
                            $subjectConv = "Руски език";
                            break;
                        case "Others":
                            $subjectConv = "Други";
                            break;
                        default:
                            $subjectConv = $row["post_subject"];
                            break; 
                    }
                
                    switch($row["class"]) {
                        case "8. class":
                            $classConv = "8. клас";
                            break;
                        case "9. class":
                            $classConv = "9. клас";
                            break;
                        case "10. class":
                            $classConv = "10. клас";
                            break;
                        case "11. class":
                            $classConv = "11. клас";
                            break;
                        case "12. class":
                            $classConv = "12. клас";
                            break;
                        default:
                            $classConv = $row["class"];
                            break;       
                    }
                    
                    if($row["publisher"] == "Default")
                    {
                        $publisherConv = "Друго";
                    } else {
                        $publisherConv = $row["publisher"];
                    }

                    echo '<div class="card card-body-index mx-5 img-fluid">
                        <div class="card mx-auto">';
                        if($row["img_id"] === "none") {
                            
                            echo '<img src="post/contain/uploads/none.png" class="card-img-top w-100" alt="">';
                        } else {
                            $imgs = explode(" ", $row["img_id"]);                            

                            $sqlImgs = "SELECT * FROM images WHERE img_id = ?;";
                            $stmt = mysqli_stmt_init($conn);

                            if(!mysqli_stmt_prepare($stmt, $sqlImgs)) {
                                header("Location: ../../posts.php?error=stmtFailed");
                                exit();
                            }
                                                        
                            mysqli_stmt_bind_param($stmt, "i", $imgs[0]);
                            mysqli_stmt_execute($stmt);

                            $resultImgData = mysqli_stmt_get_result($stmt);

                            if($imgRow = mysqli_fetch_assoc($resultImgData)) {
                                echo '<img src="post/contain/'.$imgRow["img_dir"].'" class="card-img-top w-100 mh-25 mx-auto" alt="">';
                            }                            
                        }
                            
                            echo '<div class="card-body">
                                <h5 class="card-title">'.$row["post_title"].'</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>'.$subjectConv.'</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p>'.$classConv.'</p> 
                                    <p class="card-text"><p class="d-inline inf">Издателство: </p>'.$publisherConv.'</p>                               
                                    <p class="card-text"><p class="d-inline inf">Област: </p>'.$row["post_area"].'</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>'.$row["post_place"].'</p>

                                    <p class="card-text text-danger text-center h2 my-3">'.$row["post_price"].' лв.</p>
                                </div>';
                                if(isset($_SESSION['useruid'])) {
                                    echo '<a href="post/contain/display.php?postId='.$row["post_id"].'" class="btn w-100 viewMore">Виж повече</a>';
                                }                              
                        echo '</div>
                        </div>        
                        </div>';
                }
            ?>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>
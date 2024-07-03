<?php
    session_start();
    require_once("dbcontroller.php");
    require_once("pagination.class.php");
    $db_handle = new DBController();
    $perPage = new PerPage();
    $user = $_SESSION['userid'];    
    $sql = "SELECT * from posts WHERE users_id = $user";
    $paginationlink = "profilePosts/getresult.php?page=";
    
    $page = 1;
    if(!empty($_GET["page"])) {
        $page = $_GET["page"];
    }
    
    $start = ($page-1)*$perPage->perpage;//0 * 2 = 0
    if($start < 0) $start = 0;
    
    $query =  $sql . " limit " . $start . "," . $perPage->perpage;
    $faq = $db_handle->runQuery($query);
    
    
    $_GET["rowcount"] = $db_handle->numRows($sql);
    if($_GET["rowcount"] == 0)
    {
        echo "<p class='lead mt-3'>Все още няма обяви</p>";
        exit();
    }        	
    ///
    ///
    ///
    ///
    
    $perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);    

    $output = '';

    if(empty($faq))
    {
        print "<p class='lead mt-3'>Все още няма обяви</p>";
        exit();
    }


    foreach($faq as $k=>$v) {
        $imgId = array();
        if($faq[$k]["img_id"] == 'none') {
            $imgs[0]['img_dir'] = "uploads/none.png";
        } else {
            $imgId = explode(" ", $faq[$k]["img_id"]);	
            $imgSql = "SELECT img_dir FROM images WHERE img_id=$imgId[0]";		
            $imgs = $db_handle->runQuery($imgSql);
        }
        
        $subjectConv;
        $classConv;

        switch($faq[$k]["post_subject"]) {
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
                $subjectConv = $faq[$k]["post_subject"];
                break; 
        }
    
        switch($faq[$k]["class"]) {
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
                $classConv = $faq[$k]["class"];
                break;       
        }

        if($faq[$k]["publisher"] == "Default")
        {
            $publisherConv = "Друго";
        } else {
            $publisherConv = $faq[$k]["publisher"];
        }

        $output .= '<div class="col-md-6 col-lg-4 col-xl-4 g-4">
            <div class="card mx-auto">
            <img src="post/contain/'.$imgs[0]["img_dir"].'" class="card-img-top w-100 mh-25 mx-auto" alt="t">
                <div class="card-body">
                    <h5 class="card-title">'.$faq[$k]["post_title"].'</h5>
                    <div class="container">
                        <p class="card-text"><p class="d-inline inf">Предмет: </p>'.$subjectConv.'</p>
                        <p class="card-text"><p class="d-inline inf">Клас: </p>'.$classConv.'</p>                                
                        <p class="card-text"><p class="d-inline inf">Издателство: </p>'.$publisherConv.'</p>
                        <p class="card-text"><p class="d-inline inf">Област: </p>'.$faq[$k]["post_area"].'</p>
                        <p class="card-text"><p class="d-inline inf">Населено място: </p>'.$faq[$k]["post_place"].'</p>

                        <p class="card-text text-danger text-center h2 my-3">'.$faq[$k]["post_price"].' лв.</p>
                    </div>                                
                    <a href="profilePosts/edit.php?postId='.$faq[$k]["post_id"].'" class="btn w-100 viewMore">Редактиране</a>
                </div>
            </div>        
            </div>';         
    }
   
    if(!empty($perpageresult)) {
    $output .= '<nav class="mt-4"><ul class="pagination d-flex justify-content-center" id="pagination">' . $perpageresult . '</ul></nav>';
    }
    print $output;
    
?>

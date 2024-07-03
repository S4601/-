<?php
    
    include_once '../../includes/dbh.inc.php';
    
    if(empty($title) || empty($desc) || empty($price) || empty($area) || empty($place) || $subject == "Default" || $publisher == "Default") {
        header("Location: ../addPost.php?error=empty&title=$title&description=$desc&subject=$subject&class=$class&publisher=$publisher&price=$price&area=$area&place=$place");
        exit();
    } else {                    
        if(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\\\-=\-_+\-¬\`\]]/", $area) || preg_match('/^[0-9]{1,}/', $area)) {
            header("Location: ../addPost.php?error=char&title=$title&description=$description&subject=$subject&class=$class&publisher=$publisher&price=$price");                
            exit();
        } else if(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\\\-=\-_+\-¬\`\]]/", $place) || preg_match('/^[0-9]{1,}/', $place)) {
            header("Location: ../addPost.php?error=char&title=$title&description=$description&subject=$subject&class=$class&publisher=$publisher&price=$price");                
            exit();
        }
    }
    

?>
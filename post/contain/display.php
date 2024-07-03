<?php
    //sesssion_start();
    $_POST['menuLinks'] = "../../";
    include ''.$_POST['menuLinks'].'header.php';
    
    if(!isset($_SESSION['useruid'])) {
        header("Location: ".$_POST['menuLinks']."index.php");
        exit();
    }
?>

<?php

    if(isset($_GET["postId"])) {
        $sql = "SELECT * FROM posts WHERE post_id = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../posts.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $_GET["postId"]);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData))
        {            
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
                $subjectConv = "Химия и опазване на околната среда";
                break;
              case "Physics":
                $subjectConv = "Физика и астрономия";
                break;
              case "Biology":
                $subjectConv = "Биология и здравно образование";
                break;
              case "History":
                $subjectConv = "История и цивилизация";
                break;
              case "Geography":
                $subjectConv = "География и икономика";
                break;
              case "INF":
                $subjectConv = "Информатика";
                break;
              case "IT":
                $subjectConv = "Информационни технологии";
                break;
              case "Economy":
                $subjectConv = "Икономика";
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

            ?>

            <div class="p-5">
                <div class="container">
                    <div class="d-lg-flex justify-content-between">
                        <div class="postForm w-100 pe-lg-5">                            
                                <div class="justify-content-between pb-0">
                                    <?php                                         
                                        echo '<p name="title" class="lead">'.$row["post_title"].'<p>';                                        
                                    ?>                        
                                </div>
                                                 
                                <div class="uploadImg rounded lead text-center mt-0 center">                                    
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                        <?php
                                            if($row["img_id"] === "none") {
                                                echo '<div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                                                    </div>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="uploads/none.png" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>';
                                            } else {
                                                $imgs = explode(" ", $row["img_id"]);
                                                $imgData = array();

                                                $sqlImgs = "SELECT * FROM images WHERE img_id = ?;";
                                                $stmt = mysqli_stmt_init($conn);

                                                if(!mysqli_stmt_prepare($stmt, $sqlImgs)) {
                                                    header("Location: ../../posts.php?error=stmtFailed");
                                                    exit();
                                                }
                                                
                                                foreach($imgs as $imgId) {
                                                    mysqli_stmt_bind_param($stmt, "i", $imgId);
                                                    mysqli_stmt_execute($stmt);

                                                    $resultImgData = mysqli_stmt_get_result($stmt);

                                                    if($imgRow = mysqli_fetch_assoc($resultImgData)) {
                                                        $imgData[] = $imgRow;
                                                    }
                                                }

                                                $carousel = '<div class="carousel-indicators">';

                                                for($i = 0; $i < count($imgs); $i++) {
                                                    $active = ($i == 0) ? 'class="active"' : '';
                                                    $carousel .= '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" '.$active.'></button>';
                                                }
                                                $carousel .= '</div><div class="carousel-inner">';
                                                for($i = 0; $i < count($imgs); $i++) {
                                                    $active = ($i == 0) ? 'active' : '';
                                                    $carousel .= '<div class="carousel-item '.$active.'">
                                                            <img src="'.$imgData[$i]["img_dir"].'" class="d-block maxHeigth img-fluid m-auto" alt="...">
                                                        </div>';
                                                }
                                                $carousel .= '</div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                        <i class="bi bi-caret-left-fill fs-1 carousel-nav"></i>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                        <i class="bi bi-caret-right-fill fs-1 carousel-nav"></i>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>';
                                                echo $carousel;
                                            }
                                        ?>                                        
                                    </div>                                                        
                                </div>
                                
                                <div class="justify-content-between my-4">
                                    <?php
                                        
                                        echo '<p class="">Описание: </p><textarea name="description" class="form-control postDisplay py-5" placeholder="Описание" disabled>'.$row["post_description"].'</textarea>';
                                        
                                    ?>
                                    
                                </div>
                                
                                <?php
                                    
                                    echo '<div id="classSection">
                                        <p class="mb-0">Предмет: </p>
                                        <select class="form-select postDisplay my-4 mt-2" name="subject" disabled>                        
                                            <option value="Subject">'.$subjectConv.'</option>                                            
                                        </select>
                                    </div>';
                                    
                                ?>                    

                                <?php                                    
                                    echo '<div id="classSection">
                                        <p class="mb-0">Клас: </p>
                                        <select class="form-select postDisplay my-4 mt-2" name="class" disabled>
                                            <option value="Class" selected>'.$classConv.'</option>                                        
                                        </select>
                                    </div>';                                    
                                ?>
                                
                                <?php                                    
                                    echo '<div id="publisherSection">
                                        <p class="mb-0">Издателство: </p>
                                        <select class="form-select postDisplay my-4 mt-2" name="publisher" disabled>
                                            <option value="Publisher" selected>'.$publisherConv.'</option>                                        
                                        </select>
                                    </div>';                                    
                                ?>

                                <?php                                    
                                    echo '<div class="justify-content-between my-4">
                                        <p class="mb-0">Цена: </p>
                                        <p name="price" class="form-control postDisplay mt-2">'.$row["post_price"].' лв.</p>
                                    </div>';                                    
                                ?>

                                <?php                                    
                                    echo '<div class="justify-content-between my-4">
                                        <p class="mb-0">Област: </p>
                                        <p name="area" class="form-control postDisplay mt-2">'.$row["post_area"].'</p>
                                    </div>';                                    
                                ?>

                                <?php                                    
                                    echo '<div class="justify-content-between my-4">
                                        <p class="mb-0">Населено място: </p>
                                        <p name="place" class="form-control postDisplay mt-2">'.$row["post_place"].'</p>
                                    </div>';                                    
                                ?>                                  

                                <div class="my-4 rounded lead text-center center" id="booksFromOtherSites">
                                  
                                </div>                                                            
                        </div>
                        <div class="profileData w-lg-50 w-100 mt-5 mt-lg-0">
                            <div class="text-center">
                                <img src="../../img/AccountIcon.svg" alt="" class="w-lg-50 w-25 mt-4">
                            </div>
                            
                            <div class="my-4 mx-5 mx-3-lg">
                              <?php
                                  $sqlUser = "SELECT * FROM users WHERE usersId = ?";
                                  $stmt = mysqli_stmt_init($conn);
                                  
                                  if(!mysqli_stmt_prepare($stmt, $sqlUser)) {
                                      header("Location: ../profile.php?error=stmtFailed");
                                      exit();
                                  }
                                  
                                  mysqli_stmt_bind_param($stmt, 'i', $row["users_id"]);
                                  mysqli_stmt_execute($stmt);
                                  
                                  $resultData = mysqli_stmt_get_result($stmt);                                    
                                  $ratedUser;
                                  if($rowUser = mysqli_fetch_assoc($resultData)) {                                   
                                    echo '<p class="lead">Име: '.$rowUser["usersName"].'</p>
                                      <p class="lead">Имейл: '.$rowUser["usersEmail"].'</p>
                                      <p class="lead">Потребителско име: '.$rowUser["usersUid"].'</p>
                                      <p class="lead">Телефонен номер: '.$rowUser["phone"].'</p>';
                                      
                                    $ratedUser = $rowUser["usersId"];
                                    
                                    $sqlRateStar = 'SELECT rate FROM rates WHERE userID=? && ratedUser=?;';
                                    $stmtRateStar = mysqli_stmt_init($conn);                                   
                                    $rate = -1;

                                    if(!mysqli_stmt_prepare($stmtRateStar, $sqlRateStar)) {
                                      echo "SQL statement failed";
                                    } else {
                                      
                                      mysqli_stmt_bind_param($stmtRateStar, "ii", $_SESSION['userid'], $ratedUser);
                                      mysqli_stmt_execute($stmtRateStar);

                                      $resultDataRateStar = mysqli_stmt_get_result($stmtRateStar);
                                      
                                      while($row = mysqli_fetch_assoc($resultDataRateStar)) {
                                        $rate = $row['rate'] - 1;
                                      }
                                        
                                    }

                                    echo '<section id="empty">
                                        <section class="section-no-border">
                                          <section>
                                            <div class="bg-white border rounded-5">
                                              <section class="section-preview p-1">
                                                <div id="rate" class="mx-auto"><p class="h1 mx-auto w-25 text-center">'.$rowUser['rate'].'</p></div>
                                                <div class="container d-flex">
                                                  <span id="rateMe2" data-index="'.$rate.'" class="empty-stars h1 mx-auto d-flex flex-column flex-sm-row"></span>
                                                </div>        
                                              </section>                          
                                            </div>
                                          </section>    
                                        </section>                                          
                                    </section>';


                                  }
                              ?>                                                                                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }

    } else {
        header("Location: ".$_POST['menuLinks']."index.php");
        exit();
    }
?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script>
  (function ($) {
    $.fn.RateStars = function () {
      var $stars;
      var $container = $(this);
      
      var titles = ['Много лошо', 'Лошо', 'ОК', 'Добро', 'Отлично'];

      for (var i = 0; i < 5; i++) {
        $container.append(`<i class="py-2 px-1 rate-popover" data-index="${i}" data-html="true" data-toggle="tooltip"
        data-placement="top" title="${titles[i]}"></i>`);
      }
      
      $stars = $container.children();
      
      $stars.addClass('far fa-star');
      
      markStarsAsActive(document.getElementById('rateMe2').dataset.index);

      $stars.on('mouseover', function () {
        var index = $(this).attr('data-index');
        
        markStarsAsActive(index);
        var $_GET = <?php echo json_encode($_GET); ?>;

        $.ajax({
          url: "rate.php",
          type: "GET",
          data:  {
            "rate": index,
            "ratedUser": "<?php echo $ratedUser;?>"
          },		
          success: function(data){
            $("#rate").html(data);		    
          },
          error: function() 
          {} 	        
        });

        //document.getElementById('rateMe2').dataset.index = ++index;
        //console.log(document.getElementById('rateMe2').dataset.index);
        //$stars[index].innerHTML = '<div class="h2 px-4 py-2 tooltip">t</div>';
        /*
        console.log("t");
        console.log($stars[index].innerHTML);
        console.log("t");
        console.log($stars[0].innerHTML);
        console.log($stars[1].innerHTML);
        console.log($stars[2].innerHTML);
        console.log($stars[3].innerHTML);
        console.log($stars[4].innerHTML);
        */
      });
      
      function markStarsAsActive(index) {
        unmarkActive();               
        
        /*
        for(var i = 0; i < 5; i++) {
          $stars[i].innerHTML = '';
        }
        */

        for (var i = 0; i <= index; i++) {          

          if ($container.hasClass('empty-stars')) {
            $($stars.get(i)).addClass('fas');
            switch (index) {
              case '0':
                $($stars.get(i)).addClass('oneStar');
                break;
              case '1':
                $($stars.get(i)).addClass('twoStars');
                break;
              case '2':
                $($stars.get(i)).addClass('threeStars');
                break;
              case '3':
                $($stars.get(i)).addClass('fourStars');
                break;
              case '4':
                $($stars.get(i)).addClass('fiveStars');
                break;
            }
          } else {
            $($stars.get(i)).addClass('amber-text');
          }
        }
      }

      function unmarkActive() {
        $stars.parent().hasClass('rating-faces') ? $stars.addClass('fa-meh-blank') : $stars;
        $container.hasClass('empty-stars') ? $stars.removeClass('fas') : $container;
        $stars.removeClass('fa-angry fa-frown fa-meh fa-smile fa-laugh live oneStar twoStars threeStars fourStars fiveStars amber-text');
      }

      /*
      $stars.on('click', function () {
        $stars.popover('hide');
      });
      $container.on('click', '#voteSubmitButton', function () {
        $stars.popover('hide');
      });

      $container.on('click', '#closePopoverButton', function () {
        $stars.popover('hide');
      });
      

      if ($container.hasClass('feedback')) {

        $(function () {
          $stars.popover({
            container: $container,
            content: ""
          });
        })
      }
      */                        
    }
  })(jQuery);

  // Rating Initialization
  $(document).ready(function() {
    $('#rateMe2').RateStars();
  });
</script>

<script>  
  $.ajax({
    url: 'WebScrapingAPI/webscrapingapi.php',
    type: "POST",
    data: {
      "class": <?php echo explode(".", $classConv)[0]; ?>,
      "subject": "<?php echo $subjectConv; ?>",
      "publisher": "<?php echo $publisherConv; ?>"
	  },
	  success: function(data){      
      $("#booksFromOtherSites").html(data);

      $('.product-item-details').addClass("mb-4");      
      $('.price-final_price').addClass("text-danger h2");
	  },                                      
	  error: function() 
	    {console.log("error");} 	        
    });

</script>

<?php
    include_once ''.$_POST['menuLinks'].'footer.php';
?>


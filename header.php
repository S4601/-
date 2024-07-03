<?php 
    session_start();
    include_once 'includes/dbh.inc.php';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../includes/compiled-4.20.0.min.css">
    


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo $_POST['menuLinks'];?>style11.css">

    
    <title>A&G</title>
</head>
<body>    
    
    <nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top navigation">
        <div class="container">
            <a href="<?php echo $_POST['menuLinks'];?>index.php" class="navbar-brand rounded-pill bg-white px-3 logo">A&G</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>                
            </button>

            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navmenu">
                <ul class="navbar-nav ms-auto rounded-pill px-lg-4 px-5 bg-white">
                    <?php
                    
                    if(isset($_SESSION['useruid'])) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $_POST['menuLinks'];?>posts.php" class="nav-link  menu-button">Обяви</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $_POST['menuLinks'];?>profile.php" class="nav-link  menu-button">Профил</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $_POST['menuLinks'];?>includes/logout.inc.php" class="nav-link menu-button">Излизане от профила</a>
                            </li>  
                        <?php
                    } else {
                        ?>
                            <li class="nav-item">
                                <a href="signup.php" class="nav-link  menu-button">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link menu-button">Влизане в профил</a>
                            </li>                          
                        <?php
                    }
                    ?>
                                      
                </ul>
            </div>


        </div>    
    </nav>

    <div class="content">
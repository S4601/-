<?php
    include_once 'header.php';
?>

<!--Login-->
<section class="p-5">
    <div class="container text-center">

        <h1 class="signUpTitle">Влизане в профил</h1>

        <form action="includes/login.inc.php" method="POST" class="form w-75 w-lg-50 m-auto pt-4">

            <?php
                if($_GET['error'] === 'wrongloginUid') {
                    echo '<input class="form-control my-4 regInput error" type="text" name="uid" placeholder="Грешно потребителско име/имейл">';
                } else if(isset($_GET['username']) && !empty($_GET["username"])) {
                    echo '<input class="form-control my-4 regInput" type="text" name="uid" placeholder="Имейл/Потребителско име" value="' . $_GET["username"] . '">';
                } else if(isset($_GET['username'])) {
                    echo '<input class="form-control my-4 regInput error" type="text" name="uid" placeholder="Имейл/Потребителско име">';
                } else {
                    echo '<input class="form-control my-4 regInput" type="text" name="uid" placeholder="Имейл/Потребителско име">';
                }

                if($_GET['error'] === 'wrongloginPwd') {
                    echo '<input class="form-control my-4 regInput error" type="password" name="pwd" placeholder="Грешна парола">';
                } else if($_GET['error'] === 'emptyInput' && !empty($_GET['username']) || $_GET['error'] === 'emptyInput'){
                    echo '<input class="form-control my-4 regInput error" type="password" name="pwd" placeholder="Парола">';
                } else {
                    echo '<input class="form-control my-4 regInput" type="password" name="pwd" placeholder="Парола">';
                }
            ?>
            
            
            <button class="btn submitBtn btn-lg px-sm-5" type="submit" name="submit">Влизане</button>
        </form>
            
    </div>
</section>

<?php
    include_once 'footer.php';
?>
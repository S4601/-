<?php
    include_once 'header.php';
?>

<!--Signup-->

<section class="p-5">
        <div class="container text-center">

            <h1 class="signUpTitle">Регистрация</h1>

            <form action="includes/signup.inc.php" method="POST" class="form w-75 w-lg-50 m-auto pt-4">
                <?php
                    //Name
                    if($_GET['error'] === 'invalidName') {
                        echo '<input class="form-control my-4 regInput error" type="text" name="name" placeholder="Непозволени символи">';                        
                    } else if(isset($_GET["name"]) && !empty($_GET["name"])) {
                        echo '<input class="form-control my-4 regInput" type="text" name="name" placeholder="Име" value="' . $_GET["name"] . '">';
                    } else if(isset($_GET["name"])) {
                        echo '<input class="form-control my-4 regInput error" type="text" name="name" placeholder="Име">';
                    } else {
                        echo '<input class="form-control my-4 regInput" type="text" name="name" placeholder="Име">';
                    }

                    //Email
                    if($_GET['error'] === 'invalidEmail') {
                        echo '<input class="form-control my-4 regInput error" type="text" name="email" placeholder="Невалиден имейл">';
                    } else if($_GET['error'] === 'emailTaken') {
                        echo '<input class="form-control my-4 regInput error" type="text" name="email" placeholder="Имейлът е зает">';
                    } else if(isset($_GET["email"]) && !empty($_GET["email"])) {
                        echo '<input class="form-control my-4 regInput" type="text" name="email" placeholder="Имейл" value="' . $_GET['email'] .  '">';
                    } else if(isset($_GET["email"])) {
                        echo '<input class="form-control my-4 regInput error" type="text" name="email" placeholder="Имейл">';
                    } else {
                        echo '<input class="form-control my-4 regInput" type="text" name="email" placeholder="Имейл">';
                    }

                    //Username
                    if($_GET['error'] === 'invalidUid') {
                        echo '<input class="form-control my-4 regInput error" type="text" name="uid" placeholder="Невалидно потребителско име">';
                    } else if($_GET['error'] === 'usernameTaken') {
                        echo '<input class="form-control my-4 regInput error" type="text" name="uid" placeholder="Потребителското име е заето">';
                    } else if(isset($_GET["username"]) && !empty($_GET["username"])) {
                        echo '<input class="form-control my-4 regInput" type="text" name="uid" placeholder="Потребителско име" value="' . $_GET['username'] .  '">';
                    } else if(isset($_GET["username"])) {
                        echo '<input class="form-control my-4 regInput error" type="text" name="uid" placeholder="Потребителско име">';
                    } else {
                        echo '<input class="form-control my-4 regInput" type="text" name="uid" placeholder="Потребителско име">';
                    }

                    //Phone
                    if($_GET['error'] === 'invalidPhone') {
                        echo '<div class="d-flex"><p class="d-inline inf m-auto me-2">+359</p><input class="form-control my-4 regInput error" type="text" name="phone" placeholder="Невалиден телефонен номер"></div>';
                    } else if($_GET['error'] === 'phoneTaken') {
                        echo '<div class="d-flex"><p class="d-inline inf m-auto me-2">+359</p><input class="form-control my-4 regInput error" type="text" name="phone" placeholder="Телефонният номер е зает"></div>';
                    } else if(isset($_GET["phone"]) && !empty($_GET["phone"])) {
                        echo '<div class="d-flex"><p class="d-inline inf m-auto me-2">+359</p><input class="form-control my-4 regInput" type="text" name="phone" placeholder="Телефонен номер" value="' . $_GET['username'] .  '"></div>';
                    } else if(isset($_GET["phone"])) {
                        echo '<div class="d-flex"><p class="d-inline inf m-auto me-2">+359</p><input class="form-control my-4 regInput error" type="text" name="phone" placeholder="Телефонен номер"></div>';
                    } else {
                        echo '<div class="d-flex"><p class="d-inline inf m-auto me-2">+359</p><input class="form-control my-4 regInput" type="text" name="phone" placeholder="Телефонен номер"></div>';
                    }

                    //Password                    
                    if($_GET['error'] === 'passwordDontMatch') {
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwd" placeholder="Паролите не съвпадат">';
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwdrepeat" placeholder="Паролите не съвпадат">';
                    } else if($_GET['error'] === 'passwordLenght') {
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwd" placeholder="Паролата е къса">';
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwdrepeat" placeholder="Потвърди паролата">';
                    } else if($_GET['error'] === 'emptyInput') {
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwd" placeholder="Парола">';
                        echo '<input class="form-control my-4 regInput error" type="password" name="pwdrepeat" placeholder="Потвърди паролата">';
                    } else {
                        echo '<input class="form-control my-4 regInput" type="password" name="pwd" placeholder="Парола">';
                        echo '<input class="form-control my-4 regInput" type="password" name="pwdrepeat" placeholder="Потвърди паролата">';
                    }
                ?>
                                                        
                <button class="btn submitBtn btn-lg px-sm-5" type="submit" name="submit">Регистрация</button>
            </form>
                
        </div>
</section>

<?php
    include_once 'footer.php';
?>
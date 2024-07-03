<?php
    $_POST['menuLinks'] = "../";
    include ''.$_POST['menuLinks'].'header.php';

    if(!isset($_SESSION['useruid'])) {
        header("Location: ".$_POST['menuLinks']."index.php");
        exit();
    }

    if(!isset($_GET["postId"])) {
        header("Location: ".$_POST['menuLinks']."profile.php");
        exit();
    }

    $sql = "SELECT * FROM posts WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ".$_POST['menuLinks']."profile.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $_GET["postId"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row;

    if($row = mysqli_fetch_assoc($resultData)) {
        if($row["users_id"] != $_SESSION['userid']) {
            header("Location: ".$_POST['menuLinks']."profile.php");
            exit();
        } else {
            $_SESSION["postId"] = $row["post_id"];            
        }
    }  
    //print_r($row);
?>

<script>
function classes(subject) {    
    if (subject == "Math" || subject == "Bulgarian" || subject == "Literature" || subject == "Chemistry" || subject == "Physics" || subject == "Biology" || subject == "History" || subject == "Geography" || subject == "Philosophy") {
                
        document.getElementById("classSection").innerHTML = '<select class="form-select postInput my-4" id="class" name="class" onchange="successLebel(this)"><option value="8. class" <?php if($row["class"] == "8. class"){echo 'selected';} else { echo '';} ?>>8. клас</option><option value="9. class" <?php if($row["class"] == "9. class"){echo 'selected';} else { echo '';} ?>>9. клас</option><option value="10. class" <?php if($row["class"] == "10. class"){echo 'selected';} else { echo '';} ?>>10. клас</option><option value="11. class" <?php if($row["class"] == "11. class"){echo 'selected';} else { echo '';} ?>>11. клас</option><option value="12. class" <?php if($row["class"] == "12. class"){echo 'selected';} else { echo '';} ?>>12. клас</option></select>';
        successLebel(document.getElementById("class"));

    } else if(subject == "English" || subject == "German" || subject == "Spanish" || subject == "French" || subject == "Russian") {
        
        document.getElementById("classSection").innerHTML = '<select class="form-select postInput my-4" id="class" name="class" onchange="successLebel(this)"><option value="A1" <?php if($row["class"] == "A1"){echo "selected";} else { echo " ";} ?>>A1</option><option value="A2" <?php if($row["class"] == "A2"){echo 'selected';} else { echo "";} ?>>A2</option><option value="B1" <?php if($row["class"] == "B1"){echo "selected";} else { echo "";} ?>>B1</option><option value="B2" <?php if($row["class"] == "B2"){echo "selected";} else { echo "";} ?>>B2</option></select>';
        successLebel(document.getElementById("class"));    
    } else if(subject == "Others") {
		document.getElementById("classSection").innerHTML = '<input type="text" name="classFilter" class="classFilter" id="classFilter" placeholder="Друго">';
	}
}

var title = "<?php echo $row["post_title"];?>";
var desc = "<?php echo $row["post_description"];?>";
var sub = "<?php echo $row["post_subject"];?>";
var Class = "<?php echo $row["class"];?>";
var publisher = "<?php echo $row["publisher"];?>";
var price = "<?php echo $row["post_price"];?>";
var area = "<?php echo $row["post_area"];?>";
var place = "<?php echo $row["post_place"];?>";

function successLebel(elem) {    
    if(elem.name == "title" && elem.value == title) {
        document.getElementById("savedTitle").setAttribute("value", "true");        
    } else if(elem.name == "title"){
        document.getElementById("savedTitle").setAttribute("value", "false");
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "description" && elem.value == desc) {
        document.getElementById("savedDescription").setAttribute("value", "true");
    } else if(elem.name == "description"){
        document.getElementById("savedDescription").setAttribute("value", "false");
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "subject" && elem.value == sub) {
        document.getElementById("savedSubject").setAttribute("value", "true");
    } else if(elem.name == "subject"){
        document.getElementById("savedSubject").setAttribute("value", "false");        
        document.getElementById("warning").innerHTML = '';
    }    
    if(elem.name == "class" && elem.value == Class) {
        document.getElementById("savedClass").setAttribute("value", "true");        
    } else if(elem.name == "class"){
        document.getElementById("savedClass").setAttribute("value", "false");    
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "publisher" && elem.value == publisher) {
        document.getElementById("savedPublisher").setAttribute("value", "true");        
    } else if(elem.name == "publisher"){
        document.getElementById("savedPublisher").setAttribute("value", "false");    
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "price" && elem.value == price) {
        document.getElementById("savedPrice").setAttribute("value", "true");        
    } else if(elem.name == "price"){
        document.getElementById("savedPrice").setAttribute("value", "false");    
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "area" && elem.value == area) {
        document.getElementById("savedArea").setAttribute("value", "true");        
    } else if(elem.name == "area"){
        document.getElementById("savedArea").setAttribute("value", "false");    
        document.getElementById("warning").innerHTML = '';
    }
    if(elem.name == "place" && elem.value == place) {
        document.getElementById("savedPlace").setAttribute("value", "true");        
    } else if(elem.name == "place"){
        document.getElementById("savedPlace").setAttribute("value", "false");    
        document.getElementById("warning").innerHTML = '';
    }
}

</script>


<div class="p-5">
    <div class="container">
        <div class="d-lg-flex justify-content-between">
            <div class="postForm w-100 pe-lg-5">
                <form action="editIncludes/saveEdit.php?imgs=<?php echo $row["img_id"];?>" method="POST" enctype="multipart/form-data" class="text-center">
                    <div class="justify-content-between pb-2">
                        <?php
                            if(isset($_GET["title"]) && !empty($_GET["title"])) {
                                echo '<input type="text" name="title" class="form-control postInput" placeholder="Име на обявата" value="'.$_GET["title"].'" onchange="successLebel(this)">';
                            } else if(isset($_GET["title"])) {
                                echo '<input type="text" name="title" class="form-control postInput error" placeholder="Име на обявата" value="'.$row["post_title"].'" onchange="successLebel(this)">';
                            } else {
                                echo '<input type="text" name="title" class="form-control postInput" placeholder="Име на обявата" value="'.$row["post_title"].'" onchange="successLebel(this)">';
                            }
                        ?>                        
                    </div>
                                        
                    <div class="uploadImg rounded lead text-center mt-3 center">
                        <div class="title lead">Качи файл</div>                        
                        <div class="dropzone mx-auto my-5">
                            <div class="content p-5">
                                <img src="contain/upload.svg" class="upload" id="img">
                                <span class="filename"></span>
                                <input type="file" name="image[]" class="input" multiple>                                
                            </div>                            
                        </div>                        
                    </div>
                    
                    <div class="justify-content-between my-4">
                        <?php
                            if(isset($_GET["description"]) && !empty($_GET["description"])) {
                                echo '<textarea name="description" class="form-control postInput py-5" placeholder="Описание" onchange="successLebel(this)">'.$_GET["description"].'</textarea>';
                            } else if(isset($_GET["description"])) {
                                echo '<textarea name="description" class="form-control postInput py-5 error" placeholder="Описание" onchange="successLebel(this)">'.$row["post_description"].'</textarea>';
                            } else {
                                echo '<textarea name="description" class="form-control postInput py-5" placeholder="Описание" onchange="successLebel(this)">'.$row["post_description"].'</textarea>';
                            }
                        ?>
                        
                    </div>
                    
                    <?php
                        if(isset($_GET["subject"]) && !empty($_GET["subject"])) {
                            echo '<select class="form-select postInput my-4" name="subject" onchange="classes(this.value), successLebel(this)" value="'.$_GET["subject"].'">                        
                            <option value="Default">Изберете предмет</option>
                            <option value="Math">Математика</option>
                            <option value="Bulgarian">Български език</option>
                            <option value="Literature">Литература</option>
                            <option value="Chemistry">Химия</option>
                            <option value="Physics">Физика</option>
                            <option value="Biology">Биология</option>
                            <option value="History">История</option>
                            <option value="Geography">География</option>
                            <option value="Philosophy">Философия</option>
                            <option value="English">Английски език</option>
                            <option value="German">Немски език</option>
                            <option value="Spanish">Испански език</option>
                            <option value="French">Френски език</option>
                            <option value="Russian">Руски език</option>     
                            <option value="Others">Други</option>
                        </select>';
                        } else {
                            echo '<select class="form-select postInput my-4" name="subject" onchange="classes(this.value), successLebel(this)">                        
                                <option value="Default">Изберете предмет</option>
                                <option value="Math" '.(($row["post_subject"] === "Math") ? 'selected' : '').'>Математика</option>
                                <option value="Bulgarian" '.(($row["post_subject"] == 'Bulgarian') ? "selected" : "").'>Български език</option>
                                <option value="Literature" '.(($row["post_subject"] == 'Literature') ? "selected" : "").'>Литература</option>
                                <option value="Chemistry" '.(($row["post_subject"] == 'Chemistry') ? "selected" : "").'>Химия</option>
                                <option value="Physics" '.(($row["post_subject"] == 'Physics') ? "selected" : "").'>Физика</option>
                                <option value="Biology" '.(($row["post_subject"] == 'Biology') ? "selected" : "").'>Биология</option>
                                <option value="History" '.(($row["post_subject"] == 'History') ? "selected" : "").'>История</option>
                                <option value="Geography" '.(($row["post_subject"] == 'Geography') ? "selected" : "").'>География</option>
                                <option value="Philosophy" '.(($row["post_subject"] == 'Philosophy') ? "selected" : "").'>Философия</option>
                                <option value="English" '.(($row["post_subject"] == 'English') ? "selected" : "").'>Английски език</option>
                                <option value="German" '.(($row["post_subject"] == 'German') ? "selected" : "").'>Немски език</option>
                                <option value="Spanish" '.(($row["post_subject"] == 'Spanish') ? "selected" : "").'>Испански език</option>
                                <option value="French" '.(($row["post_subject"] == 'French') ? "selected" : "").'>Френски език</option>
                                <option value="Russian" '.(($row["post_subject"] == 'Russian') ? "selected" : "").'>Руски език</option>     
                                <option value="Others" '.(($row["post_subject"] == 'Others') ? "selected" : "").'>Други</option>
                            </select>';
                                                        
                        }
                    ?>                    
                    
                    <?php
                    
                        if(isset($_GET["class"]) && !empty($_GET["class"])) {
                            echo '<div id="classSection"><select class="form-select postInput my-4" id="class" name="class" value="'.$_GET["class"].'" onchange="successLebel(this)">                        
                            <option value="8. class" selected>8. клас</option>
                            <option value="9. class">9. клас</option>
                            <option value="10. class">10. клас</option>
                            <option value="11. class">11. клас</option>
                            <option value="12. class">12. клас</option>
                        </select></div>';
                        } else {    
                            echo '<div id="classSection"><select class="form-select postInput my-4" id="class" name="class" onchange="successLebel(this)">                        
                            <option value="8. class" '.(($row["class"] == '8. class') ? "selected" : "").'>8. клас</option>
                            <option value="9. class" '.(($row["class"] == '9. class') ? "selected" : "").'>9. клас</option>
                            <option value="10. class" '.(($row["class"] == '10. class') ? "selected" : "").'>10. клас</option>
                            <option value="11. class" '.(($row["class"] == '11. class') ? "selected" : "").'>11. клас</option>
                            <option value="12. class" '.(($row["class"] == '12. class') ? "selected" : "").'>12. клас</option>
                        </select></div>';
                        }                        
                    ?>

                    <?php
                        if(isset($_GET["publisher"]) && !empty($_GET["publisher"])) {
                            echo '<div id="publisherSection"><select class="form-select postInput my-4" name="publisher" value="'.$_GET["publisher"].'" onchange="successLebel(this)">                        
                                <option value="Default" selected>Издателство</option>
                                <option value="Архонт - О">Архонт - О</option>
                                <option value="A&T Publishing">A&T Publishing</option>
                                <option value="ALMA Edizioni">ALMA Edizioni</option>
                                <option value="Cambridge University Press">Cambridge University Press</option>
                                <option value="Casa delle Lingue">Casa delle Lingue</option>
                                <option value="CubicFun">CubicFun</option>
                                <option value="Difusion">Difusion</option>
                                <option value="Edelsa">Edelsa</option>
                                <option value="Edinumen">Edinumen</option>
                                <option value="Express Publishing">Express Publishing</option>
                                <option value="Gera Art">Gera Art</option>
                                <option value="Heinemann">Heinemann</option>
                                <option value="Herma">Herma</option>
                                <option value="Intense">Intense</option>
                                <option value="Klett">Klett</option>
                                <option value="Macmillan">Macmillan</option>
                                <option value="Millenium">Millenium</option>
                                <option value="Multiprint">Multiprint</option>
                                <option value="National Geographic Learning">National Geographic Learning</option>
                                <option value="New Era">New Era</option>
                                <option value="Orange Books">Orange Books</option>
                                <option value="Pumpelina">Pumpelina</option>
                                <option value="Santillana">Santillana</option>
                                <option value="SGEL">SGEL</option>
                                <option value="АБВ">АБВ</option>
                                <option value="Авис 24">Авис 24</option>
                                <option value="АВМ-Епсилон">АВМ-Епсилон</option>
                                <option value="Агенция Ню Импрес">Агенция Ню Импрес</option>
                                <option value="АзБуки-Просвета">АзБуки-Просвета</option>
                                <option value="Аиком">Аиком</option>
                                <option value="Академично издателство Проф. Марин Дринов">Академично издателство Проф. Марин Дринов</option>
                                <option value="Албатрос">Албатрос</option>
                                <option value="Алекс Принт">Алекс Принт</option>
                                <option value="АлексСофт">АлексСофт</option>
                                <option value="Амрита">Амрита</option>
                                <option value="Анубис">Анубис</option>
                                <option value="Анубис/Булвест 2000">Анубис/Булвест 2000</option>
                                <option value="Апостроф">Апостроф</option>
                                <option value="Арт Етърнал">Арт Етърнал</option>
                                <option value="Артлайн Студиос">Артлайн Студиос</option>
                                <option value="Архимед/Диоген">Архимед/Диоген</option>
                                <option value="Асеневци">Асеневци</option>
                                <option value="Атеа Букс">Атеа Букс</option>
                                <option value="Атласи">Атласи</option>
                                <option value="Б-3">Б-3</option>
                                <option value="Бард">Бард</option>
                                <option value="БГ Учебник / ИКЦ Отличник">БГ Учебник / ИКЦ Отличник</option>
                                <option value="Бенида">Бенида</option>
                                <option value="Бит и техника">Бит и техника</option>
                                <option value="Бон-Благоевград">Бон-Благоевград</option>
                                <option value="Буквите">Буквите</option>
                                <option value="Бултест Стандарт">Бултест Стандарт</option>
                                <option value="Бяла Лодка">Бяла Лодка</option>
                                <option value="Веди">Веди</option>
                                <option value="Велес">Велес</option>
                                <option value="Византия">Византия</option>
                                <option value="ВТУ Св. Св. Кирил и Методий">ВТУ Св. Св. Кирил и Методий</option>
                                <option value="Галеон">Галеон</option>
                                <option value="Глобал">Глобал</option>
                                <option value="Грамма">Грамма</option>
                                <option value="Гутенберг">Гутенберг</option>
                                <option value="Д-р Иван Богоров/АИКОМ">Д-р Иван Богоров/АИКОМ</option>
                                <option value="Дамян Яков">Дамян Яков</option>
                                <option value="Данте">Данте</option>
                                <option value="Двери">Двери</option>
                                <option value="Джоджо">Джоджо</option>
                                <option value="Диана Ковачева">Диана Ковачева</option>
                                <option value="Дидаско">Дидаско</option>
                                <option value="Диоген">Диоген</option>
                                <option value="Диос">Диос</option>
                                <option value="Дуо Дизайн">Дуо Дизайн</option>
                                <option value="Ед Хьолцел">Ед Хьолцел</option>
                                <option value="Екслибрис">Екслибрис</option>
                                <option value="Елементи">Елементи</option>
                                <option value="Емас">Емас</option>
                                <option value="Еньовче">Еньовче</option>
                                <option value="Ергон">Ергон</option>
                                <option value="Жар">Жар</option>
                                <option value="Здраве и щастие">Здраве и щастие</option>
                                <option value="Зелена вълна">Зелена вълна</option>
                                <option value="Знание и сила">Знание и сила</option>
                                <option value="Издателски център Боян Пенев">Издателски център Боян Пенев</option>
                                <option value="Изкуства">Изкуства</option>
                                <option value="ИКЦ Отличник">ИКЦ Отличник</option>
                                <option value="Интеграл">Интеграл</option>
                                <option value="ИОП Архимед и Диоген">ИОП Архимед и Диоген</option>
                                <option value="Калоянов">Калоянов</option>
                                <option value="Караиванови - НК">Караиванови - НК</option>
                                <option value="Картография">Картография</option>
                                <option value="Клет България">Клет България</option>
                                <option value="Книгомания">Книгомания</option>
                                <option value="Колибри">Колибри</option>
                                <option value="Компас">Компас</option>
                                <option value="Красимира Кацарска">Красимира Кацарска</option>
                                <option value="Кронос">Кронос</option>
                                <option value="Лабиринт">Лабиринт</option>
                                <option value="ЛИК">ЛИК</option><option value="Логос">Логос</option>
                                <option value="Лократ">Лократ</option><option value="Май">Май</option>
                                <option value="Маре">Маре</option>
                                <option value="Мартилен">Мартилен</option>
                                <option value="Матком">Матком</option>
                                <option value="Медицински университет - Варна">Медицински университет - Варна</option>
                                <option value="Милениум">Милениум</option>
                                <option value="Миранда">Миранда</option>
                                <option value="Наука и изкуство">Наука и изкуство</option>
                                <option value="Немезида">Немезида</option>
                                <option value="Нике">Нике</option>
                                <option value="Нова звезда">Нова звезда</option>
                                <option value="О Плюс">О Плюс</option>
                                <option value="Оксиарт">Оксиарт</option>
                                <option value="Папагалчето">Папагалчето</option>
                                <option value="Паритет">Паритет</option>
                                <option value="Педагог 6">Педагог 6</option>
                                <option value="Пергамент Прес">Пергамент Прес</option>
                                <option value="Питагор/Златното пате">Питагор/Златното пате</option>
                                <option value="Планета 3">Планета 3</option>
                                <option value="Посоки">Посоки</option>
                                <option value="Прес">Прес</option>
                                <option value="Прозорец">Прозорец</option>
                                <option value="Просвета Плюс">Просвета Плюс</option>
                                <option value="Просвета-АзБуки">Просвета-АзБуки</option>
                                <option value="Просвета/Рива/Прозорец">Просвета/Рива/Прозорец</option>
                                <option value="Пух">Пух</option>
                                <option value="Рая">Рая</option>
                                <option value="Реко">Реко</option>
                                <option value="Рива">Рива</option>
                                <option value="С.А.Н.-ПРО">С.А.Н.-ПРО</option>
                                <option value="Световит">Световит</option>
                                <option value="Свят. Наука">Свят. Наука</option>
                                <option value="Сиби">Сиби</option>
                                <option value="Скайпринт">Скайпринт</option>
                                <option value="Славена">Славена</option>
                                <option value="Софи-Р">Софи-Р</option>
                                <option value="Софтпрес">Софтпрес</option>
                                <option value="Списание Математика">Списание Математика</option>
                                <option value="Стандартизация принт">Стандартизация принт</option>
                                <option value="ТАФПринт">ТАФПринт</option>
                                <option value="Теди Тед">Теди Тед</option>
                                <option value="Тилиа">Тилиа</option>
                                <option value="Торнадо-НВ">Торнадо-НВ</option>
                                <option value="Тракийски университет">Тракийски университет</option>
                                <option value="Труд">Труд</option>
                                <option value="УИ Неофит Рилски">УИ Неофит Рилски</option>
                                <option value="УИ Св. Климент Охридски">УИ Св. Климент Охридски</option>
                                <option value="Уникарт">Уникарт</option>
                                <option value="Унискорп">Унискорп</option>
                                <option value="Ученически свят">Ученически свят</option>
                                <option value="Фабер">Фабер</option>
                                <option value="Фондация Памет">Фондация Памет</option>
                                <option value="Фют">Фют</option><option value="Хейзъл">Хейзъл</option>
                                <option value="Хирон 2000">Хирон 2000</option>
                        </select></div>';                        
                        } else {
                            echo '<div id="publisherSection"><select class="form-select postInput my-4" name="publisher" onchange="successLebel(this)">                        
                                <option value="Default">Издателство</option>
                                <option value="Архонт - О" '.(($row["publisher"] == 'Архонт - О') ? "selected" : "").'>Архонт - О</option><option value="A&T Publishing" '.(($row["publisher"] == 'A&T Publishing') ? "selected" : "").'>A&T Publishing</option><option value="ALMA Edizioni" '.(($row["publisher"] == 'ALMA Edizioni') ? "selected" : "").'>ALMA Edizioni</option><option value="Cambridge University Press" '.(($row["publisher"] == 'Cambridge University Press') ? "selected" : "").'>Cambridge University Press</option><option value="Casa delle Lingue" '.(($row["publisher"] == 'Casa delle Lingue') ? "selected" : "").'>Casa delle Lingue</option><option value="CubicFun" '.(($row["publisher"] == 'CubicFun') ? "selected" : "").'>CubicFun</option><option value="Difusion" '.(($row["publisher"] == 'Difusion') ? "selected" : "").'>Difusion</option><option value="Edelsa" '.(($row["publisher"] == 'Edelsa') ? "selected" : "").'>Edelsa</option><option value="Edinumen" '.(($row["publisher"] == 'Edinumen') ? "selected" : "").'>Edinumen</option><option value="Express Publishing" '.(($row["publisher"] == 'Express Publishing') ? "selected" : "").'>Express Publishing</option><option value="Gera Art" '.(($row["publisher"] == 'Gera Art') ? "selected" : "").'>Gera Art</option><option value="Heinemann" '.(($row["publisher"] == 'Heinemann') ? "selected" : "").'>Heinemann</option><option value="Herma" '.(($row["publisher"] == 'Herma') ? "selected" : "").'>Herma</option><option value="Intense" '.(($row["publisher"] == 'Intense') ? "selected" : "").'>Intense</option><option value="Klett" '.(($row["publisher"] == 'Klett') ? "selected" : "").'>Klett</option><option value="Macmillan" '.(($row["publisher"] == 'Macmillan') ? "selected" : "").'>Macmillan</option><option value="Millenium" '.(($row["publisher"] == 'Millenium') ? "selected" : "").'>Millenium</option><option value="Multiprint" '.(($row["publisher"] == 'Multiprint') ? "selected" : "").'>Multiprint</option><option value="National Geographic Learning" '.(($row["publisher"] == 'National Geographic Learning') ? "selected" : "").'>National Geographic Learning</option><option value="New Era" '.(($row["publisher"] == 'New Era') ? "selected" : "").'>New Era</option><option value="Orange Books" '.(($row["publisher"] == 'Orange Books') ? "selected" : "").'>Orange Books</option><option value="Pumpelina" '.(($row["publisher"] == 'Pumpelina') ? "selected" : "").'>Pumpelina</option><option value="Santillana" '.(($row["publisher"] == 'Santillana') ? "selected" : "").'>Santillana</option><option value="SGEL" '.(($row["publisher"] == 'SGEL') ? "selected" : "").'>SGEL</option><option value="АБВ" '.(($row["publisher"] == 'АБВ') ? "selected" : "").'>АБВ</option><option value="Авис 24" '.(($row["publisher"] == 'Авис 24') ? "selected" : "").'>Авис 24</option><option value="АВМ-Епсилон" '.(($row["publisher"] == 'АВМ-Епсилон') ? "selected" : "").'>АВМ-Епсилон</option><option value="Агенция Ню Импрес" '.(($row["publisher"] == 'Агенция Ню Импрес') ? "selected" : "").'>Агенция Ню Импрес</option><option value="АзБуки-Просвета" '.(($row["publisher"] == 'АзБуки-Просвета') ? "selected" : "").'>АзБуки-Просвета</option><option value="Аиком" '.(($row["publisher"] == 'Аиком') ? "selected" : "").'>Аиком</option><option value="Академично издателство Проф. Марин Дринов" '.(($row["publisher"] == 'Академично издателство Проф. Марин Дринов') ? "selected" : "").'>Академично издателство Проф. Марин Дринов</option><option value="Албатрос" '.(($row["publisher"] == 'Албатрос') ? "selected" : "").'>Албатрос</option><option value="Алекс Принт" '.(($row["publisher"] == 'Алекс Принт') ? "selected" : "").'>Алекс Принт</option><option value="АлексСофт" '.(($row["publisher"] == 'АлексСофт') ? "selected" : "").'>АлексСофт</option><option value="Амрита" '.(($row["publisher"] == 'Амрита') ? "selected" : "").'>Амрита</option><option value="Анубис" '.(($row["publisher"] == 'Анубис') ? "selected" : "").'>Анубис</option><option value="Анубис/Булвест 2000" '.(($row["publisher"] == 'Анубис/Булвест 2000') ? "selected" : "").'>Анубис/Булвест 2000</option><option value="Апостроф" '.(($row["publisher"] == 'Апостроф') ? "selected" : "").'>Апостроф</option><option value="Арт Етърнал" '.(($row["publisher"] == 'Арт Етърнал') ? "selected" : "").'>Арт Етърнал</option><option value="Артлайн Студиос" '.(($row["publisher"] == 'Артлайн Студиос') ? "selected" : "").'>Артлайн Студиос</option><option value="Архимед/Диоген" '.(($row["publisher"] == 'Архимед/Диоген') ? "selected" : "").'>Архимед/Диоген</option><option value="Асеневци" '.(($row["publisher"] == 'Асеневци') ? "selected" : "").'>Асеневци</option><option value="Атеа Букс" '.(($row["publisher"] == 'Атеа Букс') ? "selected" : "").'>Атеа Букс</option><option value="Атласи" '.(($row["publisher"] == 'Атласи') ? "selected" : "").'>Атласи</option><option value="Б-3" '.(($row["publisher"] == 'Б-3') ? "selected" : "").'>Б-3</option><option value="Бард" '.(($row["publisher"] == 'Бард') ? "selected" : "").'>Бард</option><option value="БГ Учебник / ИКЦ Отличник" '.(($row["publisher"] == 'БГ Учебник / ИКЦ Отличник') ? "selected" : "").'>БГ Учебник / ИКЦ Отличник</option><option value="Бенида" '.(($row["publisher"] == 'Бенида') ? "selected" : "").'>Бенида</option><option value="Бит и техника" '.(($row["publisher"] == 'Бит и техника') ? "selected" : "").'>Бит и техника</option><option value="Бон-Благоевград" '.(($row["publisher"] == 'Бон-Благоевград') ? "selected" : "").'>Бон-Благоевград</option><option value="Буквите" '.(($row["publisher"] == 'Буквите') ? "selected" : "").'>Буквите</option><option value="Бултест Стандарт" '.(($row["publisher"] == 'Бултест Стандарт') ? "selected" : "").'>Бултест Стандарт</option><option value="Бяла Лодка" '.(($row["publisher"] == 'Бяла Лодка') ? "selected" : "").'>Бяла Лодка</option><option value="Веди" '.(($row["publisher"] == 'Веди') ? "selected" : "").'>Веди</option><option value="Велес" '.(($row["publisher"] == 'Велес') ? "selected" : "").'>Велес</option><option value="Византия" '.(($row["publisher"] == 'Византия') ? "selected" : "").'>Византия</option><option value="ВТУ Св. Св. Кирил и Методий" '.(($row["publisher"] == 'ВТУ Св. Св. Кирил и Методий') ? "selected" : "").'>ВТУ Св. Св. Кирил и Методий</option><option value="Галеон" '.(($row["publisher"] == 'Галеон') ? "selected" : "").'>Галеон</option><option value="Глобал" '.(($row["publisher"] == 'Глобал') ? "selected" : "").'>Глобал</option><option value="Грамма" '.(($row["publisher"] == 'Грамма') ? "selected" : "").'>Грамма</option><option value="Гутенберг" '.(($row["publisher"] == 'Гутенберг') ? "selected" : "").'>Гутенберг</option><option value="Д-р Иван Богоров/АИКОМ" '.(($row["publisher"] == 'Д-р Иван Богоров/АИКОМ') ? "selected" : "").'>Д-р Иван Богоров/АИКОМ</option><option value="Дамян Яков" '.(($row["publisher"] == 'Дамян Яков') ? "selected" : "").'>Дамян Яков</option><option value="Данте" '.(($row["publisher"] == 'Данте') ? "selected" : "").'>Данте</option><option value="Двери" '.(($row["publisher"] == 'Двери') ? "selected" : "").'>Двери</option><option value="Джоджо" '.(($row["publisher"] == 'Джоджо') ? "selected" : "").'>Джоджо</option><option value="Диана Ковачева" '.(($row["publisher"] == 'Диана Ковачева') ? "selected" : "").'>Диана Ковачева</option><option value="Дидаско" '.(($row["publisher"] == 'Дидаско') ? "selected" : "").'>Дидаско</option><option value="Диоген" '.(($row["publisher"] == 'Диоген') ? "selected" : "").'>Диоген</option><option value="Диос" '.(($row["publisher"] == 'Диос') ? "selected" : "").'>Диос</option><option value="Дуо Дизайн" '.(($row["publisher"] == 'Дуо Дизайн') ? "selected" : "").'>Дуо Дизайн</option><option value="Ед Хьолцел" '.(($row["publisher"] == 'Ед Хьолцел') ? "selected" : "").'>Ед Хьолцел</option><option value="Екслибрис" '.(($row["publisher"] == 'Екслибрис') ? "selected" : "").'>Екслибрис</option><option value="Елементи" '.(($row["publisher"] == 'Елементи') ? "selected" : "").'>Елементи</option><option value="Емас" '.(($row["publisher"] == 'Емас') ? "selected" : "").'>Емас</option><option value="Еньовче" '.(($row["publisher"] == 'Еньовче') ? "selected" : "").'>Еньовче</option><option value="Ергон" '.(($row["publisher"] == 'Ергон') ? "selected" : "").'>Ергон</option><option value="Жар" '.(($row["publisher"] == 'Жар') ? "selected" : "").'>Жар</option><option value="Здраве и щастие" '.(($row["publisher"] == 'Здраве и щастие') ? "selected" : "").'>Здраве и щастие</option><option value="Зелена вълна" '.(($row["publisher"] == 'Зелена вълна') ? "selected" : "").'>Зелена вълна</option><option value="Знание и сила" '.(($row["publisher"] == 'Знание и сила') ? "selected" : "").'>Знание и сила</option><option value="Издателски център Боян Пенев" '.(($row["publisher"] == 'Издателски център Боян Пенев') ? "selected" : "").'>Издателски център Боян Пенев</option><option value="Изкуства" '.(($row["publisher"] == 'Изкуства') ? "selected" : "").'>Изкуства</option><option value="ИКЦ Отличник" '.(($row["publisher"] == 'ИКЦ Отличник') ? "selected" : "").'>ИКЦ Отличник</option><option value="Интеграл" '.(($row["publisher"] == 'Интеграл') ? "selected" : "").'>Интеграл</option><option value="ИОП Архимед и Диоген" '.(($row["publisher"] == 'ИОП Архимед и Диоген') ? "selected" : "").'>ИОП Архимед и Диоген</option><option value="Калоянов" '.(($row["publisher"] == 'Калоянов') ? "selected" : "").'>Калоянов</option><option value="Караиванови - НК" '.(($row["publisher"] == 'Караиванови - НК') ? "selected" : "").'>Караиванови - НК</option><option value="Картография" '.(($row["publisher"] == 'Картография') ? "selected" : "").'>Картография</option><option value="Клет България" '.(($row["publisher"] == 'Клет България') ? "selected" : "").'>Клет България</option><option value="Книгомания" '.(($row["publisher"] == 'Книгомания') ? "selected" : "").'>Книгомания</option><option value="Колибри" '.(($row["publisher"] == 'Колибри') ? "selected" : "").'>Колибри</option><option value="Компас" '.(($row["publisher"] == 'Компас') ? "selected" : "").'>Компас</option><option value="Красимира Кацарска" '.(($row["publisher"] == 'Красимира Кацарска') ? "selected" : "").'>Красимира Кацарска</option><option value="Кронос" '.(($row["publisher"] == 'Кронос') ? "selected" : "").'>Кронос</option><option value="Лабиринт" '.(($row["publisher"] == 'Лабиринт') ? "selected" : "").'>Лабиринт</option><option value="ЛИК" '.(($row["publisher"] == 'ЛИК') ? "selected" : "").'>ЛИК</option><option value="Логос" '.(($row["publisher"] == 'Логос') ? "selected" : "").'>Логос</option><option value="Лократ" '.(($row["publisher"] == 'Лократ') ? "selected" : "").'>Лократ</option><option value="Май" '.(($row["publisher"] == 'Май') ? "selected" : "").'>Май</option><option value="Маре" '.(($row["publisher"] == 'Маре') ? "selected" : "").'>Маре</option><option value="Мартилен" '.(($row["publisher"] == 'Мартилен') ? "selected" : "").'>Мартилен</option><option value="Матком" '.(($row["publisher"] == 'Матком') ? "selected" : "").'>Матком</option><option value="Медицински университет - Варна" '.(($row["publisher"] == 'Медицински университет - Варна') ? "selected" : "").'>Медицински университет - Варна</option><option value="Милениум" '.(($row["publisher"] == 'Милениум') ? "selected" : "").'>Милениум</option><option value="Миранда" '.(($row["publisher"] == 'Миранда') ? "selected" : "").'>Миранда</option><option value="Наука и изкуство" '.(($row["publisher"] == 'Наука и изкуство') ? "selected" : "").'>Наука и изкуство</option><option value="Немезида" '.(($row["publisher"] == 'Немезида') ? "selected" : "").'>Немезида</option><option value="Нике" '.(($row["publisher"] == 'Нике') ? "selected" : "").'>Нике</option><option value="Нова звезда" '.(($row["publisher"] == 'Нова звезда') ? "selected" : "").'>Нова звезда</option><option value="О Плюс" '.(($row["publisher"] == 'О Плюс') ? "selected" : "").'>О Плюс</option><option value="Оксиарт" '.(($row["publisher"] == 'Оксиарт') ? "selected" : "").'>Оксиарт</option><option value="Папагалчето" '.(($row["publisher"] == 'Папагалчето') ? "selected" : "").'>Папагалчето</option><option value="Паритет" '.(($row["publisher"] == 'Паритет') ? "selected" : "").'>Паритет</option><option value="Педагог 6" '.(($row["publisher"] == 'Педагог 6') ? "selected" : "").'>Педагог 6</option><option value="Пергамент Прес" '.(($row["publisher"] == 'Пергамент Прес') ? "selected" : "").'>Пергамент Прес</option><option value="Питагор/Златното пате" '.(($row["publisher"] == 'Питагор/Златното пате') ? "selected" : "").'>Питагор/Златното пате</option><option value="Планета 3" '.(($row["publisher"] == 'Планета 3') ? "selected" : "").'>Планета 3</option><option value="Посоки" '.(($row["publisher"] == 'Посоки') ? "selected" : "").'>Посоки</option><option value="Прес" '.(($row["publisher"] == 'Прес') ? "selected" : "").'>Прес</option><option value="Прозорец" '.(($row["publisher"] == 'Прозорец') ? "selected" : "").'>Прозорец</option><option value="Просвета Плюс" '.(($row["publisher"] == 'Просвета Плюс') ? "selected" : "").'>Просвета Плюс</option><option value="Просвета-АзБуки" '.(($row["publisher"] == 'Просвета-АзБуки') ? "selected" : "").'>Просвета-АзБуки</option><option value="Просвета/Рива/Прозорец" '.(($row["publisher"] == 'Просвета/Рива/Прозорец') ? "selected" : "").'>Просвета/Рива/Прозорец</option><option value="Пух" '.(($row["publisher"] == 'Пух') ? "selected" : "").'>Пух</option><option value="Рая" '.(($row["publisher"] == 'Рая') ? "selected" : "").'>Рая</option><option value="Реко" '.(($row["publisher"] == 'Реко') ? "selected" : "").'>Реко</option><option value="Рива" '.(($row["publisher"] == 'Рива') ? "selected" : "").'>Рива</option><option value="С.А.Н.-ПРО" '.(($row["publisher"] == 'С.А.Н.-ПРО') ? "selected" : "").'>С.А.Н.-ПРО</option><option value="Световит" '.(($row["publisher"] == 'Световит') ? "selected" : "").'>Световит</option><option value="Свят. Наука" '.(($row["publisher"] == 'Свят. Наука') ? "selected" : "").'>Свят. Наука</option><option value="Сиби" '.(($row["publisher"] == 'Сиби') ? "selected" : "").'>Сиби</option><option value="Скайпринт" '.(($row["publisher"] == 'Скайпринт') ? "selected" : "").'>Скайпринт</option><option value="Славена" '.(($row["publisher"] == 'Славена') ? "selected" : "").'>Славена</option><option value="Софи-Р" '.(($row["publisher"] == 'Софи-Р') ? "selected" : "").'>Софи-Р</option><option value="Софтпрес" '.(($row["publisher"] == 'Софтпрес') ? "selected" : "").'>Софтпрес</option><option value="Списание Математика" '.(($row["publisher"] == 'Списание Математика') ? "selected" : "").'>Списание Математика</option><option value="Стандартизация принт" '.(($row["publisher"] == 'Стандартизация принт') ? "selected" : "").'>Стандартизация принт</option><option value="ТАФПринт" '.(($row["publisher"] == 'ТАФПринт') ? "selected" : "").'>ТАФПринт</option><option value="Теди Тед" '.(($row["publisher"] == 'Теди Тед') ? "selected" : "").'>Теди Тед</option><option value="Тилиа" '.(($row["publisher"] == 'Тилиа') ? "selected" : "").'>Тилиа</option><option value="Торнадо-НВ" '.(($row["publisher"] == 'Торнадо-НВ') ? "selected" : "").'>Торнадо-НВ</option><option value="Тракийски университет" '.(($row["publisher"] == 'Тракийски университет') ? "selected" : "").'>Тракийски университет</option><option value="Труд" '.(($row["publisher"] == 'Труд') ? "selected" : "").'>Труд</option><option value="УИ Неофит Рилски" '.(($row["publisher"] == 'УИ Неофит Рилски') ? "selected" : "").'>УИ Неофит Рилски</option><option value="УИ Св. Климент Охридски" '.(($row["publisher"] == 'УИ Св. Климент Охридски') ? "selected" : "").'>УИ Св. Климент Охридски</option><option value="Уникарт" '.(($row["publisher"] == 'Уникарт') ? "selected" : "").'>Уникарт</option><option value="Унискорп" '.(($row["publisher"] == 'Унискорп') ? "selected" : "").'>Унискорп</option><option value="Ученически свят" '.(($row["publisher"] == 'Ученически свят') ? "selected" : "").'>Ученически свят</option><option value="Фабер" '.(($row["publisher"] == 'Фабер') ? "selected" : "").'>Фабер</option><option value="Фондация Памет" '.(($row["publisher"] == 'Фондация Памет') ? "selected" : "").'>Фондация Памет</option><option value="Фют" '.(($row["publisher"] == 'Фют') ? "selected" : "").'>Фют</option><option value="Хейзъл" '.(($row["publisher"] == 'Хейзъл') ? "selected" : "").'>Хейзъл</option><option value="Хирон 2000" '.(($row["publisher"] == 'Хирон 2000') ? "selected" : "").'>Хирон 2000</option>
                        </select></div>';
                        }
                    ?>

                    <?php
                        if(isset($_GET["price"]) && !empty($_GET["price"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="number" name="price" class="form-control postInput" placeholder="Цена" min="0" max="100" value="'.$_GET["price"].'" onchange="successLebel(this)">
                        </div>';
                        } else if(isset($_GET["price"])) {
                            echo '<div class="justify-content-between my-4">
                                <input type="number" name="price" class="form-control postInput error" placeholder="Цена" min="0" max="100" value="'.$row["post_price"].'" onchange="successLebel(this)">
                            </div>';
                        } else {
                            echo '<div class="justify-content-between my-4">
                            <input type="number" name="price" class="form-control postInput" placeholder="Цена" min="0" max="100" value="'.$row["post_price"].'" onchange="successLebel(this)">
                        </div>';
                        }
                    ?>

                    <?php
                        if(isset($_GET["area"]) && !empty($_GET["area"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="area" class="form-control postInput" placeholder="Област" value="'.$_GET["area"].'" onchange="successLebel(this)">
                        </div>';
                        } else if(isset($_GET["area"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="area" class="form-control postInput error" placeholder="Област" value="'.$row["post_area"].'" onchange="successLebel(this)">
                        </div>';
                        } else {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="area" class="form-control postInput" placeholder="Област" value="'.$row["post_area"].'" onchange="successLebel(this)">
                        </div>';
                        }
                    ?>

                    <?php
                        if(isset($_GET["place"]) && !empty($_GET["place"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="place" class="form-control postInput" placeholder="Населено място" value="'.$_GET["place"].'" onchange="successLebel(this)">
                        </div>';
                        } else if(isset($_GET["place"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="place" class="form-control postInput error" placeholder="Населено място" value="'.$row["post_place"].'" onchange="successLebel(this)">
                        </div>';
                        } else {
                            echo '<div class="justify-content-between my-4">
                            <input type="text" name="place" class="form-control postInput" placeholder="Населено място" value="'.$row["post_place"].'" onchange="successLebel(this)">
                        </div>';
                        }
                        echo '<div id="warning">';
                        if(isset($_GET["error"]) && $_GET["error"] == "success") {
                            echo '<p>Успешно запазихте информацията!</p>';
                        } else if(isset($_GET["error"]) && $_GET["error"] == "notChanged") {
                            echo '<p>Не сте променили нищо в обявата!</p>';
                        } else if(isset($_GET["error"]) && $_GET["error"] == "char") {
                            echo '<p>Използвали сте непозволени знаци!</p>';
                        }
                        echo '</div>';
                    ?>
                    <input type="hidden" name="savedTitle" id="savedTitle" value="true"/>
                    <input type="hidden" name="savedDescription" id="savedDescription" value="true"/>
                    <input type="hidden" name="savedSubject" id="savedSubject" value="true"/>
                    <input type="hidden" name="savedClass" id="savedClass" value="true"/>
                    <input type="hidden" name="savedPublisher" id="savedPublisher" value="true"/>
                    <input type="hidden" name="savedPrice" id="savedPrice" value="true"/>
                    <input type="hidden" name="savedArea" id="savedArea" value="true"/>
                    <input type="hidden" name="savedPlace" id="savedPlace" value="true"/>

                    <button class="btn btn-lg submitBtn" type="submit" name="submit">Приложи</button>
                </form>                
            </div>
            <div class="profileData w-lg-50 w-100 mt-5 mt-lg-0">
                <div class="text-center">
                    <img src="../img/AccountIcon.svg" alt="" class="w-lg-50 w-25 mt-4">
                </div>
                
                <div class="my-4 mx-5 mx-3-lg">
                    <?php
                        $sql = "SELECT * FROM users WHERE usersId = ?";
                        $stmt = mysqli_stmt_init($conn);
                        
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../profile.php?error=stmtFailed");
                            exit();
                        }
                        
                        mysqli_stmt_bind_param($stmt, 'i', $_SESSION['userid']);
                        mysqli_stmt_execute($stmt);
                        
                        $resultData = mysqli_stmt_get_result($stmt);
                        
                        if($row1 = mysqli_fetch_assoc($resultData)) {
                            echo '<p class="lead">Име: '.$row1["usersName"].'</p>
                            <p class="lead">Имейл: '.$row1["usersEmail"].'</p>
                            <p class="lead">Потребителско име: '.$row1["usersUid"].'</p>
                            <p class="lead">Телефонен номер: '.$row1["phone"].'</p>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    classes('<?php echo $row["post_subject"]?>');
</script>

<script src='https://100dayscss.com/codepen/js/jquery.min.js'></script>
<!--<script  src="contain/script.js"></script>-->



<?php
    include_once ''.$_POST['menuLinks'].'footer.php';
?>
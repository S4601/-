<?php
    include_once 'header.php';

    if(!isset($_SESSION['useruid'])) {
        header("Location: index.php");
        exit();
    }
?>

<script src="https://code.jquery.com/jquery-2.1.1.js"></script>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),			
			"subjectFilter": $("#subjectFilter").val(),
			"classFilter": $("#classFilter").val(),
            "publisherFilter": $("#publisherFilter").val(),
			"priceFrom": $("#priceFrom").val(),
			"priceTo": $("#priceTo").val()
		},		
		success: function(data){
		    $("#pagination-result").html(data);		    
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("posts/getresult.php");
	}
}


changePagination("all-links");
</script>

<script>
function classes(subject) {
    if (subject == "Math" || subject == "Bulgarian" || subject == "Literature" || subject == "Chemistry" || subject == "Physics" || subject == "Biology" || subject == "History" || subject == "Geography" || subject == "Philosophy") {
                
        document.getElementById("classSection").innerHTML = '<select class="form-select postInput my-4" id="classFilter" name="class"><option value="Default" selected>Изберете клас</option><option value="8. class">8. клас</option><option value="9. class">9. клас</option><option value="10. class">10. клас</option><option value="11. class">11. клас</option><option value="12. class">12. клас</option></select>';

    } else if(subject == "English" || subject == "German" || subject == "Spanish" || subject == "French" || subject == "Russian") {
                
        document.getElementById("classSection").innerHTML = '<select class="form-select postInput my-4" id="classFilter" name="class"><option value="Default" selected>Изберете клас</option><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option></select>';
                
    } else if(subject == "Others") {
		document.getElementById("classSection").innerHTML = '<input type="text" name="classFilter" class="classFilter" id="classFilter" placeholder="Друго">';
	}
}

</script>

<script>		
	function ScrollToTop() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}

</script>

<div class="p-5">
    <div class="container">
        <div class="d-lg-flex justify-content-between">
            <div class="filthers w-lg-35 w-100 mb-5 mb-lg-0">
                <div class="text-center">
                    <p class="lead mt-4">Филтри</p>
                </div>
                
                <div class="my-4 mx-5 mx-3-lg">
                    <form onChange="changePagination('all-links');">
                    
                        <!--Filters-->
                        <!--Subject-->
                        
                        <select class="form-select postInput my-4" id="subjectFilter" name="subject" onchange="classes(this.value)">                        
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
                        </select>
                        
                    
                        <!--Class-->
                        <div id="classSection"><select class="form-select postInput my-4" id="classFilter" name="class">
                            <option value="Default" selected>Изберете клас</option>
                            <option value="8. class">8. клас</option>
                            <option value="9. class">9. клас</option>
                            <option value="10. class">10. клас</option>
                            <option value="11. class">11. клас</option>
                            <option value="12. class">12. клас</option>
                        </select></div>

                        <!--Publisher-->
                        <div id="publisherSection">
                            <select class="form-select postInput my-4" id="publisherFilter" name="publisher">                        
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
                            </select>
                        </div>

                        <!--Price-->
                        <div class="text-center">
                            <p class="lead mt-4">Цена</p>
                        </div>
                        <div class="mb-4">
                            <p class="lead mb-2">От: </p>
                            <input type="number" class="form-control postInput" id="priceFrom">
                        </div>
                        
                        <div class="mt-4">
                            <p class="lead mb-2">До: </p>
                            <input type="number" class="form-control postInput" id="priceTo">
                        </div>
                    </form>
                </div>
            </div>    
        
            <div class="myPosts w-lg-120">
                <div class="myPostsTitle d-flex justify-content-between pb-2">
                    <p class="lead my-auto ms-4">Обяви</p>
                    <a class="btn align-middle rounded-pill addPost" href="post/addPost.php">Добави обява</a>
                </div>
                
                <div class="row w-100 mx-auto page-content" id="pagination-result">
                    <!--
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>-->
                    

                    <input type="hidden" name="rowcount" id="rowcount" />
                </div>
                
            </div>

            
        </div>
    </div>
</div>

<script>
    getresult("getresult.php");
</script>

<?php
    include_once 'footer.php';
?>
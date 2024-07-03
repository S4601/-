<?php

$conn = mysqli_connect("localhost", "root", "", "loginsystem") or die("Database Error");
// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_GET['text']);

//mysqli_query($conn, "UPDATE `chatbot` SET `queries` = 'Здравей|здравей|Здрасти|здрасти|Добър ден|добър ден|zdr', `replies` = 'Здравейте! Как мога да Ви помогна?ZDRt' WHERE `chatbot`.`id` = 1; ");
//mysqli_query($conn, "UPDATE `chatbot` SET `queries` = 'учебник|Как да намеря учебник|Търся учебник', `replies` = 'За да намерите учебник трябва да кликнете върху менюто \"Обяви\". Там се намират всичките качени обяви! Може да улесните търсенето като използвате филтрите!' WHERE `chatbot`.`id` = 2; ");
//mysqli_query($conn, 'INSERT INTO chatbot(queries, replies) VALUES("такса|такси|плащане|безплотно|платено", "Използването на уеб сайта е напълно безплатно!")');
//mysqli_query($conn, 'INSERT INTO chatbot(queries, replies) VALUES("проблем|админ|свързване с вас|свържа с вас|Как да се свържа с вас?|как да се свържа с вас?|контакти|Контакти", "Пишете ни на нашата Instagram страница @borsaaxg(наличен е линк при натискане на бутона \"Контакти\")")');
//mysqli_query($conn, "UPDATE `chatbot` SET `queries` = 'такса|такси|плащане|безплотно|платено', `replies` = 'Използването на уеб сайта е напълно безплатно!' WHERE `chatbot`.`id` = 3; ");
//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");
// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    
    echo $replay;
}else{
    echo "Съжалявам, не мога да Ви разбера!";
}
?>

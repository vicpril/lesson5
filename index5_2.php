<?php

header('Content-type: text/html; charset=utf-8');
error_reporting(E_ALL);

$news = 'Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';

$news_array = explode("\n", $news);

//print_r($news_array);

function printAllNews($array) {
    foreach ($array as $value) {
        echo "<br>$value";
    }
}

function printOneNew($array, $index) {
    echo "<br>[$index] - $array[$index]";
}

if (!array_key_exists('id', $_GET)||$_GET['id'] == null) {      //if GET is empty
    header('HTTP/1.0 404 Not Found');
    echo "<h1>Error 404 Not Found</h1>";
    echo "Вы отправили пустой запрос. Пожалуйста, отправьте запрос снова.";
    exit;
}elseif (is_numeric($_GET['id'])) {                             //if GET is numeric
    if (array_key_exists($_GET['id'], $news_array)) {
        printOneNew($news_array, $_GET['id']);
    } else {
        printAllNews($news_array);
    }
} else {                                                        //if GET is impossible
    header('HTTP/1.0 404 Not Found');
    echo "<h1>Error 404 Not Found</h1>";
    echo "Вы отправили недопустимый запрос. Пожалуйста, отправьте запрос снова.";
    exit;
}





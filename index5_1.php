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

function printInformation($array, $id) {
    if (array_key_exists($id, $array)) {
        printOneNew($array, $id);
    } else {
        printAllNews($array);
    }
}

ob_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>FORM for POST</title>
    </head>
    <body>

        <form method="POST">
            <p><b>Введите параметр id:?</b></p>
            <p>
                <input type="text" name="id"<Br>
            </p>
            <p><input type="submit"></p>
        </form>

    </body>
</html>

<?php
if ($_POST) {
    $id = $_POST['id'];
//print_r($id);

    if ($id == null) {
        ob_end_clean();
        header('HTTP/1.0 404 Not Found');
        echo "<h1>Error 404 Not Found</h1>";
        echo "Вы отправили пустой запрос. Пожалуйста, вернитесь на <a href=http://xaver.loc/index.php>предыдущую страницу</a> и отправьте запрос снова.";
        exit;
    } elseif (is_numeric($id)) {
        ob_end_flush();
        printInformation($news_array, $id);
    } else {
        ob_end_clean();
        header('HTTP/1.0 404 Not Found');
        echo "<h1>Error 404 Not Found</h1>";
        echo "Вы отправили недопустимый запрос. Пожалуйста, вернитесь на <a href=http://xaver.loc/index.php>предыдущую страницу</a> и отправьте запрос снова.";
        //var_dump($id);
        exit;
    }
}
?>
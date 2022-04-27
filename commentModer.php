<?php
// подключаем файлы для работы с базой данных и файлы с объектами 
require_once 'config/database.php';
require_once 'objects/model.php';
require_once 'objects/marka.php';
require_once 'objects/comments.php';

// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// подготавливаем объекты 
$model = new Model($db);
$marka = new Marka($db);
$comments = new Comment($db);


// установка заголовка страницы 


$stmt = $comments->readAllModer();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            extract($row);
 
            echo "<div class='commens'>";
                echo "<p>Пользователь: <b> {$user}</b></p>";
                echo "<p>Тема: <b>{$title}</b> </p>";
                echo "<p>Отзыв: {$text} </p>";
                echo "<p><b><i>Дата: {$created} </i></b></p>";
            echo "</div>";
        }
   
?>


<?php // подвал 
require_once "layout_footer.php";
?>


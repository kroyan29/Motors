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


$stmt = $comments->readAllModerNoYes();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="index.css" type="text/css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Motors - Админ</title>
        <style>
            .log {
                width: 150px;
            }

            .im {
                width: 150px;
            }

            .commens {
                padding-left: 100px;
               
            }

            .btn {
                font-size: 14px;
                padding: 10px;
                padding-top: -120px;
                margin-left: 5%
            }
        </style>
    </head>

    <body class="">
        <?php
        require_once "config/appvars.php";
        require_once "config/connectionvars.php";
        ?>



        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a>
                </div>

                <div class="menu">

                    <nav class="desktop-nav">
                        <ul class="first-level">
                            <li><a href="admin_redakt.php" class="animsition-link">Назад на администрирование</a></li>



                        </ul>
                    </nav>
                    <!-- mobile navbar -->
                    <nav class="mobile-nav"></nav>
                    <div class="menu-icon">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </header>
        <br><br><br><br><br><br><br><br>
        <?

        echo "
            <div class='commens'>";
        echo "№{$id}<p>Пользователь: <b> {$user}</b></p>";
        echo "<p>Тема: <b>{$title}</b> </p>";
        echo "<p>Отзыв: {$text} </p>";
        echo "<p><b><i>Дата: {$created} </i></b></p>";
        $tt = ($moder == 0) ? '<spun style="color:red"> &#10060;</spun>' : '<spun style="color:lime">&#10003</spun> ';
        echo "<p><b><i>Прошли модерацию: $tt </i></b></p>";
        ?>

        <form method="post" name="f1">
            <input type="hidden" name="hiddenModer" value="<?= $moder ?>">
            <button type="submit" name="submitUpdate" class="btn" value="<?= $id ?>"> ПРИНЯТЬ / ОТКАЗАТЬ</button>
        </form>
        <br>
        <form method="post" name="f2">
            <button type="submit" name="submitDelete" class="btn" value="<?= $id ?>">УДАЛИТЬ</button>
        </form>
    <?php
    echo "</div>";
}
    ?>
    <!-- Удаление -->
    <?php
    $action = $_POST['submitDelete'];
    if (isset($_POST['submitDelete'])) {
        $id = $action;
        $comments->id = $id;
        if ($comments->delete())
            echo "<div  style='background-color:#a3ffb7; border:1px green solid; padding:10px; margin-left: 10%;
			margin-right: 10%;
            margin-top: -870px;>Отзыв был успешно удален.</div>";
        else
            echo "<div style='background-color:#ffa3a3; border:1px green solid; padding:10px; margin-left: 10%;
			margin-right: 10%;>Отзыв не был  удален.</div>";
    }

    $action = $_POST['submitUpdate'];
    if (isset($_POST['submitUpdate'])) {
        $id = $action;
        $comments->id = $id;
        if ($_POST["hiddenModer"] == 1)
            $comments->moder = 0;
        else
            $comments->moder = 1;
        if ($comments->update())
            echo "<div style='background-color:#a3ffb7; border:1px green solid; padding:10px; margin-left: 10%;
			margin-right: 10%;
            '>Отзыв был успешно ПРИНЯТ.</div>";
        else
            echo "<div style='background-color:#ffa3a3; border:1px green solid; padding:10px; margin-left: 10%;
			margin-right: 10%;'>Отзыв НЕ ПРИНЯТ.</div>";
    }


    ?>
    </body>

    </html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
require_once 'config/connectionvars.php';
if (!isset($_SESSION['user_login']))    //проверьте, неавторизованный пользователь не имеет доступа в "welcome.php " страница
{
    header("location: index.php");
}

$id = $_SESSION['user_login'];

$select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
$select_stmt->execute(array(":uid" => $id));

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['user_login'])) {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Motors. Просмотр профиля</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<style>
    



    h3 {
        font-size: 30px;
        text-align: center;
        text-shadow: 1px 1px 2px black, 0 0 1em white, 0 0 0.2em white;
    }

    form {
        width: 400px;
        display: grid;
        grid-template-columns: 1fr;
        margin: auto;
        text-shadow: 1px 1px 2px black, 0 0 1em white, 0 0 0.2em white;
        background-image: url(images/samurai_PNG4.png);
    }

    .sub {
        background: linear-gradient(-95deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400%;
        animation: gradient 15s ease infinite;
        padding: 20px;
        font-size: 16px;
        font-family: cursive;
        border: 3px groove gray;
        box-shadow: 12px 12px 2px 1px rgba(0, 0, 255, .2);
        text-shadow: 1px 1px 2px black, 0 0 1em white, 0 0 0.2em white;


    }
</style>

<body>
    <h3>Моторс - Просмотр профиля</h3>
    <?php
    require_once('config/appvars.php');
    require_once('config/connectionvars.php');

   
        echo ('<p class="login">Вы вошли как <b>' . $row['username'] . '</b>. <a href="viewprofile.php">Выйти</a>.</p>');
    
        
    if (!isset($_GET['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $query2 = "SELECT username, first_name, last_name, gender, birthdate, city, state, picture FROM tbl_user WHERE user_id = :user_id";
    } else {
        $user_id = $_GET['user_id'];
        $query2 = "SELECT username, first_name, last_name, gender, birthdate, city, state, picture FROM tbl_user WHERE user_id = :user_id";
    }
    $result3 = $pdo->prepare($query2);
    $result3->bindParam(':user_id', $user_id);
    $result3->execute();
    $count3 = $result3->rowCount();
    if ($count3 == 1) {
        $row1 = $result3->fetch();
        echo '<table>';
        if (!empty($row1['username'])) {
            echo '<tr><td class="label">Логин:</td><td>' . $row1['username'] . '</td></tr>';
        }
        if (!empty($row1['first_name'])) {
            echo '<tr><td class="label">Имя:</td><td>' . $row1['first_name'] . '</td></tr>';
        }
        if (!empty($row1['last_name'])) {
            echo '<tr><td class="label">Фамилия:</td><td>' . $row1['last_name'] . '</td></tr>';
        }
        if (!empty($row1['gender'])) {
            echo '<tr><td class="label">Пол:</td><td>';
            if ($row1['gender'] == 'M') {
                echo "Мужской";
            } else if ($row1['gender'] == 'F') {
                echo "Женский";
            } else {
                echo '?';
            }
            echo '</td></tr>';
        }
        if (!empty($row1['birthdate'])) {
            if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
                echo '<tr><td class="label">Дата рождения:</td><td>' . $row1['birthdate'] . '</td></tr>';
            } else {
                list($year, $month, $day) = explode('-', $row1['birthdate']);
                echo '<tr><td class="label">Год рождения:</td><td>' . $year . '</td></tr>';
            }
        }
        if (!empty($row1['city']) || !empty($row1['state'])) {
            echo '<tr><td class="label">Область:</td><td>' . $row1['city'] . ', ' . $row1['state'] . '</td></tr>';
        }
        if (!empty($row1['picture'])) {
            echo '<tr><td class="label">Фотография:</td><td><img src="' . MM_UPLOADPATH . $row1['picture'] . '" alt="Profile Picture" /></td></tr>';
        }
        echo '</table>';
        if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
            echo '<p>Хотели бы вы <a href="editprofile.php">отредактировать свой профиль</a>?</p>';
        }
    } else {
        echo '<p class="error">Возникла проблема с доступом к вашему профилю</p>';
    }
    $rezult3 = NULL;
}
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css" type="text/css">
    <link rel="shortcut icon" href="img/log.png" type="image/png">
    <title>Регистрация</title>
</head>
<style>
    body {
        background-color: #f5f5f5;
    }

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
    }

    .side-top {
        grid-column: 2/3;
        grid-row: 3/4;
        padding: 10px;
        background: linear-gradient(15deg, #f5f5f5, #f5f5f5, #c9c8c8, #b4b4b4);
        background-size: 600% 600%;
        animation: gradient 15s ease infinite;

        font-family: cursive;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .closing-button {
        text-decoration: none;
        display: inline-block;
        margin: 10px;
        color: rgb(0, 0, 0);
        box-shadow: 0 0 0 2px black;
        padding: 20px 0;
        width: 240px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 3px;
        position: relative;
        overflow: hidden;
    }

    .closing-button span {
        font-family: 'Montserrat', sans-serif;
        position: relative;
        z-index: 5;
    }

    .closing-button:before,
    .closing-button:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

    .closing-button:before {
        transform: translateX(-100%);
        background: white;
        transition: transform .3s cubic-bezier(.55, .055, .675, .19);
    }

    .closing-button:after {
        background: gray;
        transform: translateX(100%);
        transition: transform .3s cubic-bezier(.16, .73, .58, .62) .3s;
    }

    .closing-button:hover:before,
    .closing-button:hover:after {
        transform: translateX(0);
    }
</style>

<body>
    <h3>Автосалон "Моторс" - Регистрация</h3>
    <?php
    require_once('config/appvars.php');
    require_once('config/connectionvars.php');
    if (isset($_POST['submit'])) {
        //берем данные из профиля POST
        $username = trim($_POST['username']);
        $password1 = trim($_POST['password1']);
        $password2 = trim($_POST['password2']);
        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
            //проверяем что кто-то еще не зарегестрирован под этим именем
            $zapros1 = "SELECT * FROM klient WHERE username = :username";
            $result1 = $pdo->prepare($zapros1);
            $result1->bindParam(':username', $username);
            $result1->execute();
            $kol = $result1->rowCount;
            if ($kol == 0) {
                //если имя пользователя уникально, то вставляем запись в базу
                $secret = sha1($password1);
                $data = date("Y-m-d");
                $ins = "INSERT INTO klient (username,password,join_date) VALUES (:username,:secr,:data)";
                $inser = $pdo->prepare($ins);
                $inser->bindParam(':username', $username);
                $inser->bindParam(':secr', $secret);
                $inser->bindParam(':data', $data);
                $inser->execute();
                echo '<p>Ваш новый аккаунт был успешно создан. Теперь вы готовы<a href="login.php">Авторизироваться</a></p>';
                $inser = NULL;
                exit();
            } else {
                //Учетная запись ля этого имени уже сущетвует
                echo '<p class="error">Учетная запись уже существует для этого имени пользователя. Пожалуйста, используйте другой логин.</p>';
                $username = "";
            }
        } else {
            echo '<p class="error">Вы должны ввести все регистрационные данные, включая желаемый пароль, дважды.</p>';
        }
    }
    $inser = NULL;
    ?>
    <div class="container">
        <main class="main titl">
            <p> Пожалуйста, введите ваше имя пользователя и пароль, чтобы войти в блог</p>
            <img src="img/AORQ.gif" width="700" alt="">
        </main>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="side-top tile">
                <fieldset>
                    <legend>Информация о регистрации</legend>
                    <label for="username">Логин: </label><br>
                    <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>"><br>
                    <label for="password1">Пароль: </label><br>
                    <input type="password" id="password1" name="password1"><br>
                    <label for="password1">Подтвердите пароль: </label><br>
                    <input type="password" id="password2" name="password2"><br>
                </fieldset><br><br>
            </div>
            <div class="sidebar-bottom tile centered">
                <input type="submit" class="closing-button" class="sub" value="Зарегистрироваться" name="submit"><br>
                <a href="index.php" class="closing-button"><span>Назад</span> </a>
            </div>
        </form>
    </div>
</body>

</html>
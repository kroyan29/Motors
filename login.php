<?php

require_once 'config/connectionvars.php';

session_start();

$_SESSION["menuUser"] = 'false';
if (isset($_SESSION["user_login"]))    //проверьте условие входа пользователя в систему, а не прямого возврата к index.php страница
{
    header("location: welcome.php");
}

if (isset($_REQUEST['btn_login']))    //кнопка name is "btn_login" 
{
    $username    = strip_tags($_REQUEST["txt_username_email"]);    //textbox name "txt_username_email"
    $email        = strip_tags($_REQUEST["txt_username_email"]);    //textbox name "txt_username_email"
    $password    = strip_tags($_REQUEST["txt_password"]);            //textbox name "txt_password"

    if (empty($username)) {
        $errorMsg[] = "Пожалуйста, введите имя пользователя или адрес электронной почты";    //проверьте, чтобы текстовое поле "имя пользователя / адрес электронной почты" не было пустым 
    } else if (empty($email)) {
        $errorMsg[] = "Пожалуйста, введите имя пользователя или адрес электронной почты";
    } else if (empty($password)) {
        $errorMsg[] = "Пожалуйста, введите password";    //проверьте, чтобы текстовое поле "passowrd" не было пустым
    } else {
        try {
            $select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail"); //sql select query
            $select_stmt->execute(array(':uname' => $username, ':uemail' => $email));    //выполнить запрос с параметром привязки
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if ($select_stmt->rowCount() > 0)    //проверьте условие записи базы данных больше нуля после продолжения
            {
                if ($username == $row["username"] or $email == $row["email"]) //проверьте условие, при котором вводимые пользователем "имя пользователя или адрес электронной почты" совпадают с данными базы данных "имя пользователя или адрес электронной почты" после продолжения
                {
                    if (password_verify($password, $row["password"])) //проверьте условие, при котором вводимый пользователем "пароль" совпадает с "паролем" базы данных, используя password_verify() после продолжения
                    {
                        $_SESSION["user_login"] = $row["user_id"]; 
                        $_SESSION['username'] = $row['username'];  //заполнен пользователь "user_login"
                        $loginMsg = "Успешно Войдите в систему."; //user login success message
                        header("refresh:2; index_user.php");            //refresh 2 second after redirect to "welcome.php" page
                    } else {
                        $errorMsg[] = "неверный password";
                    }
                } else {
                    $errorMsg[] = "неправильное имя пользователя или адрес электронной почты";
                }
            } else {
                $errorMsg[] = "неправильное имя пользователя или адрес электронной почты";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    $_SESSION["user_login"] = $row["user_id"];
    $_SESSION['username'] = $row['username'];  //заполнен пользователь "user_login"
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Motors - Авторизация</title>
    <!-- <link rel="stylesheet" href="login.css"> -->
    <link rel="shortcut icon" href="img/log.png" type="image/png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/animsition.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url(img/lake-g24bd8b7ed_1920.jpg);
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="animsition">

    <?php require_once 'login.php'; ?>

    <header class="main-header">
        <div class="container">
            <div class="logo">
                <!-- <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a> -->
            </div>

            <div class="menu">

                <nav class="desktop-nav">
                    <ul class="first-level">


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

    <?php
    if (isset($errorMsg)) {
        foreach ($errorMsg as $error) {
    ?>
            <div class="alert alert-danger">
                <strong><?php echo $error; ?></strong>
            </div>
        <?php
        }
    }
    if (isset($loginMsg)) {
        ?>
        <div class="alert alert-success">
            <strong><?php echo $loginMsg; ?></strong>
        </div>
    <?php
    }
    ?>
    <br><br><br><br><br> <br><br><br><br><br> 
    <center>
        <h2>Страница входа</h2>
    </center><br><br>
    <div class="container">
        <form method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-3 control-label">Введите имя или Email</label>
                <div class="col-sm-6">
                    <input type="text" name="txt_username_email" class="form-control" placeholder="Введите имя или email" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="txt_password" class="form-control" placeholder="Введите passowrd" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    <input type="submit" name="btn_login" class="btn btn-success" value="Войти">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    У вас нет учетной записи, зарегистрированной здесь? <a href="register.php">
                        <p class="text-info">Зарегистрировать учетную запись</p>
                    </a>
                </div>
            </div>

        </form>

    </div>

    </div>

    </div>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/smoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
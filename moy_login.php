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
                        $_SESSION["user_login"] = $row["user_id"];    //session name is "user_login"
                        $loginMsg = "Успешно Войдите в систему."; //user login success message
                        header("refresh:2; welcome.php");            //refresh 2 second after redirect to "welcome.php" page
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
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="login.css" type="text/css">
    <link rel="shortcut icon" href="img/log.png" type="image/png">
</head>

<body>
    <div class="container">
        <header>
            <p class="logo"><img src="img/motoes.png" class="log" alt=""></p>

        </header>

        <main class="main tile">
            <h1>Выбор один, делаете его правильным с нами</h1>
            <p>На сегодняшний день сложилась ситуация, что во многих отраслях производства и предоставления услуг проводится усовершенствование документооборота, вводятся новые принципы обмена информацией, оптимизируется время выполнения вычислений.</p>
        </main>
        <div class="side-top tile">
            <h3>Авторизация</h3>
            <?php
            //var_dump($_SESSION['id_klient']);
            if (empty($_SESSION['id_klient'])) {
                echo '<p class="error">' . $error_msg . '</p>';

            ?>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="anime">
                        <fieldset>
                            <legend>Авторизация</legend>
                            <label for="username" class="tex">Логин:&nbsp;&nbsp; </label>
                            <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>"><br>
                            <label for="password" class="tex">Пароль: </label>
                            <input type="password" name="password"><br><br> <span><input type="submit" class="closing-button" value="Авторизоваться" name="submit"></span><br>
                            <a href="index.php" class="closing-button"><span>Назад</span></a>
                        </fieldset>
                    </div>

                </form>
            <?php
            } else {
                echo ('<p class="login">Вы вошли как ' . $_SESSION['username'] . '</p>');
            }
            ?>
        </div>
        <div class="sidebar-bottom tile centered">
            <small>Если вы еще не зарегистрированы то переходя по ссылку можете <a class="cta-button" href="signup.php">зарегистрироватся</a></small>
            <div class="cost">

            </div>

        </div>
    </div>
</body>

</html>
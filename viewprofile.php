<?php
session_start();
require_once 'config/appvars.php';
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
    <html>

    <head>
        <title>Motors - Редактирование профиля</title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="author" content="Amine Akhouad">
        <meta name="description">

        <!-- STYLES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/log.png" type="image/png">
        <style>
            .im {
                width: 150px;
            }
        </style>
    </head>

    <body class="animsition">
        <!-- HEADER  -->
        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" class="im" alt="logo"></a>
                </div>
                <div class="menu">
                    <!-- desktop navbar -->
                    <nav class="desktop-nav">
                        <ul class="first-level">
                            <?
                            if ($row['rol'] == "admin")
                                echo '<li><a href="admin_redakt.php" class="animsition-link"> =>  АДМИНИСТРИРОВАНИЕ</a></li>';
                            ?>
                            <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                            <li><a href="news.php" class="animsition-link">Новости</a></li>
                            <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                            <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            <li><a href="viewprofile.php" class="animsition-link"><?= $row['username']; ?></a></li>
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

        <!-- HERO SECTION  -->
        <div class="site-hero_2">
            <div class="page-title">
                <div class="big-title montserrat-text uppercase">Редактирование профиля </div>
                <form action="" method="post" name="panel">
                    <?php

                    //меню навигации

                    echo "<input type='submit' class='btn' name='but' value='Посмотреть профиль'><br>";
                    echo "<a href='logout.php'>Выйти из профиля <b> " . $row['username'] . "</b></a>";



                    ?></form>
                    <?
                    switch ($action) {
                        case "Посмотреть профиль":

                            $stmt = $pdo->prepare("SELECT * FROM tbl_user, type_face, bank WHERE tbl_user.vid_lica_id = type_face.id_typeface and tbl_user.bank_id = bank.id_bank and tbl_user.user_id = $id");
                            $stmt->execute();
                            while ($raw = $stmt->fetch()) {
                                echo "<div><fieldset><legend><h3>Клиент №" . $raw['user_id'] . "</h3></legend>
                    <p>Имя: <b>" . $raw['first_name'] . "</b></p>
                    <p>Фамилия: <b>" . $raw['last_name'] . "</b></p>
                    <p>Пол: <b>" . $raw['gender'] . "</b></p>
                    <p>Город: <b>" . $raw['city'] . "</b></p>
                    <p>Страна: <b>" . $raw['state'] . "</b></p>
                    <p>Вид лица: <b>" . $raw['face'] . "</b></p>
                    <p>Банк: <b>" . $raw['name_bank'] . "</b></p>
                    <p>Номер счета: <b>" . $raw['numer_schet'] . "</b></p>
                    <p>Дата: <b>" . $raw['data_klient'] . "</b></p>
                    <p style='margin-left:60%;margin-top:-70%;'><img src='" . $raw['picture'] . "' width='400px' ></b></p>
                    <fieldset></div>";
                            }
                            break;
                    }
                    ?>
                
            </div>
        </div>



        <br><br><br><br>



        <!-- FOOTER -->

        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                                <li><a href="about.html" class="animsition-link">Новости</a></li>

                                <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                                <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" style="text-align:right">
                    <div class="row">
                        <div class="uppercase gray-text">

                        </div>
                        <ul class="social-icons" style="margin-top:30px;float:right">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-youtube"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- SCRIPTS -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                new WOW().init();
            });
        </script>
    <? }
    ?>
    </body>

    </html>
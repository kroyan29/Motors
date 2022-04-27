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
        <title>Motors - Банк</title>
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
                <div class="big-title montserrat-text uppercase">Банк</div>
                <div class="small-title montserrat-text uppercase">Только у нас дают автокредит 5%</div>
            </div>
        </div>

        <!-- WHAT WE DO -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <span>Почему кредит?</span>
                        <p>Автосалону выгоднее продать машину в кредит, так как он получит за это вознаграждение от банка, а также от страховой компании за оформление страховых продуктов.</p>
                    </div>
                </div>

                <div class="row">

                </div>

                <div class="col-md-6 wow fadeInUp" data-wow-delay=".1s">

                </div>
            </div><!-- end row -->
            </div><!-- end container -->
        </section>


        <section>
            <div class="container">
                <div class="row">

                    <?php
                    echo "<div class='col-md-3 col-sm-6 col-xs-12 wow fadeInUp'>
                        <div class='benefits_1_single'>";
                    $stmt = $pdo->prepare('SELECT * FROM bank WHERE id_bank = 1');
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        echo " <img src='" . $row['foto_bank'] .  "' width='150px'>" . "<div class='title montserrat-text uppercase'>" . $row[''] . "
                            </div><p>" . $row['opis_bank'] . "</p>";
                    }
                    echo " </div> </div>"
                    ?>
                    <?php
                    echo "<div class='col-md-3 col-sm-6 col-xs-12 wow fadeInUp' data-wow-delay='.1s'>
                        <div class='benefits_1_single'>";
                    $stmt = $pdo->prepare('SELECT * FROM bank WHERE id_bank = 2 ');
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        echo " <img src='" . $row['foto_bank'] .  "' width='150px'>" . "<div class='title montserrat-text uppercase'>" . $row[' '] . "
                            </div><p>" . $row['opis_bank'] . "</p>";
                    }
                    echo " </div> </div>"
                    ?>
                    <?php
                    echo "<div class='col-md-3 col-sm-6 col-xs-12 wow fadeInUp' data-wow-delay='.2s'>
                        <div class='benefits_1_single'>";
                    $stmt = $pdo->prepare('SELECT * FROM bank WHERE id_bank = 5  ');
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        echo " <img src='" . $row['foto_bank'] .  "' width='200px'>" . "<div class='title montserrat-text uppercase'>" . $row[' '] . "
                            </div><p>" . $row['opis_bank'] . "</p>";
                    }
                    echo " </div> </div>"
                    ?>
                    <?php
                    echo "<div class='col-md-3 col-sm-6 col-xs-12 wow fadeInUp' data-wow-delay='.3s'>
                        <div class='benefits_1_single'>";
                    $stmt = $pdo->prepare('SELECT * FROM bank WHERE id_bank = 6  ');
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        echo " <img src='" . $row['foto_bank'] .  "' width='200px'>" . "<div class='title montserrat-text uppercase'>" . $row[' '] . "
                            </div><p>" . $row['opis_bank'] . "</p>";
                    }
                    echo " </div> </div>"
                    ?>



                </div>
            </div>
        </section>


        <section class="pricing_plans">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <span>Простой процесс</span>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                        <div class="pricing_plan">
                            <div class="plan_price montserrat-text uppercase">Шаг 1</div>
                            <div class="plan_title montserrat-text uppercase">Заполните онлайн-форму</div>
                            <p>Подайте заявку сейчас, предоставив достаточно информации для наших предпочтительных кредиторов, чтобы конкурировать за ваш кредит.</p>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".1s">
                        <div class="pricing_plan">
                            <div class="plan_price montserrat-text uppercase">Шаг 2</div>
                            <div class="plan_title montserrat-text uppercase">Мы делаем покупки для вас</div>

                            <p>Наша целеустремленная финансовая команда гарантирует, что вы получите наилучшую возможную ставку.</p>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".2s">
                        <div class="pricing_plan">
                            <div class="plan_price montserrat-text uppercase">Шаг 3</div>
                            <div class="plan_title montserrat-text uppercase">Принять доставку</div>

                            <p>Мы доставляем по всей стране. Позвольте нам загрузить вашу новую экзотику и отправиться к вам сегодня.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <br><br><br><br>



        <!-- FOOTER -->

        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <?
                                if ($row['rol'] == "admin")
                                    echo '<li><a href="admin_redakt.php" class="animsition-link"> =>  АДМИНИСТРИРОВАНИЕ</a></li>';
                                ?>
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
    <? } ?>
    </body>

    </html>
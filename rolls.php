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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">

        <title>Motors - Rolls Royce</title>
        <style>
            .log {
                width: 100px;
            }
        </style>
    </head>

    <body class="animsition">

        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a>
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
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
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
        <div class="site-hero_2">
            <div class="page-title">
                <div class="big-title montserrat-text uppercase">Rolls Royce</div>
                <div class="small-title montserrat-text uppercase">Фотокартины</div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="section-title">
                    <span>История</span>
                    <p>В 1998 году владельцы концерна <b>Vickers</b> решили избавиться от активов <b>Rolls-Royce Motors</b>. Наиболее привлекательным покупателем был немецкий автопроизводитель <b>BMW</b>, который уже поставлял двигатели и компоненты для автомобилей <b>Rolls-Royce и Bentley</b>, но итоговое предложение <b>BMW</b>, составившее <b>£340 млн</b>, перебил другой немецкий автогигант <b>Volkswagen</b>, предложивший <b>£430 млн.</b></p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <img src="img/166453-rolls_rojs_kallinan_spofek-rolls_rojs_kullinan-rolls_royce-rolls_rojs_prizrak-legkovyye_avtomobili-1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/rolls_royce_phantom_luxury_vid_sboku_chernyj_dvizhenie_99900_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/rollsroyce_vid_speredi_fary_136993_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    </div>
                    <div class="col-md-4">
                        <p>
                            2003 Phantom — представленный в январе 2003 года на детройтской североамериканской международной автомобильной выставке стала первой моделью компании Rolls-Royce Motor Cars Limited. Подразделение BMW не имело технической или корпоративной связи с самой компанией Rolls-Royce, за исключением торговой марки и логотипа. Автомобиль был оснащён двигателем 6,75 л V12, производства BMW. Часть электроники была также производства компании и её подрядчиков, однако большинство деталей было оригинальными для автомобиля. В отличие от Mini (который на 90 % был разработан и производился в Великобритании) большая часть деталей производилась в Германии, хотя сборка и ходовые испытания автомобилей проводятся на фабрике в Гудвуде. Вместе с тем, новый автомобиль имеет пропорции и линии, характерные для классических автомобилей Rolls-Royce. Автомобиль доступен в стандартной и удлинённой версии, стоимость автомобиля начинается от £250,000. <br>
                            В 2007 году компания объявила о выходе ограниченной серии из 25 седанов Rolls-Royce Phantom, окрашенных в необычный белый цвет Metallic Ghost Silver, со статуэткой «Дух Экстаза» из серебра и особой отделкой салона. Выпуск серии приурочен к 100-летнему юбилею модели Rolls-Royce Silver Ghost.
                            <br>
                            2007 Phantom Drophead Coupe — кабриолет с мягкой складной крышей был разработан на базе прототипа Rolls-Royce 100ЕХ. <br>
                            2018 Rolls-Royce Cullinan — первый в истории компании Rolls-Royce внедорожник, который официально был представлен в 2018 году.
                        </p>
                        <ul class="list" style="margin:30px 0">
                            <li>Веб дизайт</li>
                            <li>
                                Фронтенд разработка</li>
                            <li>Бэкэнд разработка</li>
                            <li>Поисковая оптимизация</li>
                        </ul>
                        <h5 class="uppercase montserrat-text">Поделится</h5>
                        <ul class="social-icons" style="margin-top:20px;">
                            <li><a href="https://ru-ru.facebook.com/" data-social="fb"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/?lang=ru" data-social="tw"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="javasript:void(0);" data-social="ln"><i class="icon ion-social-linkedin"></i></a></li>
                            <li><a href="javasript:void(0);" data-social="pt"><i class="icon ion-social-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video -->

        <div class="container">
            <div class="light-gray-section wow fadeInUp" style="padding:15px 30px">
                <div class="row">
                    <p class="italic" style="float:left;line-height:50px;margin:0">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    </p>
                    <a href="" class="btn green" style="float:right"><span>read more</span></a>
                </div>
            </div>
        </div>

        <br><br> <br><br>

        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                                <li><a href="about.html" class="animsition-link">Новости</a></li>
                                <li><a href="bank.php" class="animsition-link">Банк</a></li>
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
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.social-buttons.min.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                new WOW().init();

                $('.project_images').flexslider({
                    directionNav: false,
                    controlNav: false
                });

                $("[data-social]").socialButtons();
            });
        </script>
    <? } ?>
    </body>

    </html>
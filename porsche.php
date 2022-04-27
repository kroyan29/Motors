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

        <title>Motors - Porsche</title>
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
                <div class="big-title montserrat-text uppercase">Porsche</div>
                <div class="small-title montserrat-text uppercase">Фотокартины</div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="section-title">
                    <span>История</span>
                    <p>Компания выпускает спортивные автомобили класса «люкс», а также внедорожники. Производство <b>Porsche</b> в значительной мере кооперируется с <b>Volkswagen</b>. Апараллельно с участием в автоспорте, ведётся работа над совершенствованием конструкции автомобиля: в разные годы были разработаны синхронизаторы механической КПП, автоматические КПП с возможностью ручного переключения, турбонаддув для серийного автомобиля, турбонаддув с изменяемой геометрией крыльчатки турбины в бензиновом двигателе, электронно-управляемая подвеска и так далее.</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <img src="img/porsche911.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/porsche_cayen_white.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/porsche_macan.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    </div>
                    <div class="col-md-4">
                        <p>К моменту выпуска первого автомобиля под своим именем Фердинанд Порше успел накопить немалый опыт. Основанное им 25 апреля 1931 года предприятие Dr. Ing. h.c. F. Porsche GmbH под его началом уже успело поработать над такими проектами, как 6-цилиндровый гоночный Auto Union и Volkswagen Käfer, ставший одним из самых продаваемых автомобилей в истории. В 1939 году был разработан первый автомобиль компании — Porsche 64, который стал прародителем всех будущих Porsche. Для постройки этого экземпляра Фердинанд Порше использовал многие компоненты от Volkswagen Käfer.
                            <br>
                            В течение Второй Мировой компания занималась выпуском военной продукции — штабных автомобилей и амфибий. Фердинанд Порше принимал участие в разработке немецких тяжёлых танков «Тигр P», а также сверхтяжёлого танка «Маус».
                            <br>
                            В декабре 1945 года он был арестован по обвинению в военных преступлениях и помещён в тюрьму, где провёл 20 месяцев. В то же время его сын Фердинанд (краткое имя Ферри) Антон Эрнст решил начать выпуск собственных автомобилей. В Гмюнде Ферри Порше вместе с несколькими знакомыми инженерами собрал прототип 356-го с мотором в базе и алюминиевым открытым кузовом и начал подготовку к его серийному производству. В июне 1948 года этот экземпляр был сертифицирован для дорог общего пользования. Как и 9 лет назад, тут вновь были использованы агрегаты от Volkswagen Käfer, включая 4-цилиндровый мотор воздушного охлаждения, подвеску и коробку передач. У первых серийных машин было принципиальное отличие — двигатель перенесли за заднюю ось, что позволило удешевить производство и освободить пространство для двух дополнительных мест в салоне. Спроектированный кузов обладал очень хорошей аэродинамикой — Cx равнялся 0,29. В 1950 году компания вернулась в Штутгарт.
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
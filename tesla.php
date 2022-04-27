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

        <title>Motors - Tesla</title>
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
                            <li><a href="about.html" class="animsition-link">Новости</a></li>
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
                            <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                            <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            <li><a href="redaktir.php" class="animsition-link"><?= $row['username']; ?></a></li>

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
                <div class="big-title montserrat-text uppercase">Tesla</div>
                <div class="small-title montserrat-text uppercase">Фотокартины</div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="section-title">
                    <span>История</span>
                    <p>Компания <b>Tesla</b> была зарегистрирована 1 июля 2003 года <b>Мартином Эберхардом и Марком Тарпеннингом</b>. Ян Райт был третьим сотрудником <b>Tesla</b>, присоединившимся к ней несколько месяцев спустя. В феврале 2004 года трое основателей привлекли инвестиции в размере <b>7,5 млн долларов США</b>, при этом <b>Илон Маск внес 6,5 млн долларов</b>. Маск стал председателем совета директоров и назначил <b>Эберхарда генеральным директором</b>.</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <img src="img/tesla-model-y-exterior-hevcars-04.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/tesla_model_s_tesla_belyj_132883_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/tesla_model_x.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    </div>
                    <div class="col-md-4">
                        <p>
                            Спортивный электромобиль, первый автомобиль фирмы. Официальная презентация состоялась 19 июля 2006 года в городе Санта-Моника, Калифорния.

                            Tesla Motors провела конкурс для выбора вида запланированных двух Tesla Roadster, выданных британским производителем спортивных автомобилей Lotus. Автомобили были получены.

                            Первые 1000 Tesla Roadster были сделаны в течение одного месяца. Цена одного автомобиля составила 100 000 долларов США. Серийное производство началось в марте 2008 года.

                            Эта модель продавалась до 2012 года, поскольку контракт с Lotus на поставку 2500 машин истёк в конце 2011 года. Компания перестала принимать заявки на американском рынке в августе 2011 года. Следующее поколение этой модели планировалось представить в 2019 году.
                            Концепт автомобиля был представлен 26 марта 2009 года в городке Хоторн, Калифорния. Пятидверный хетчбэк разрабатывается под прежним условным обозначением «Whitestar» фирменным филиалом в Детройте. После окончания проектно-конструкторских работ фабрика должна производить в Калифорнии первоначально 10 000, позже — 25 000 автомобилей модели.

                            Поставка автомобилей в США началась 22 июня 2012 года. Изначально предлагалось две версии: на 60 и 85 кВт⋅ч, оборудованные одним электродвигателем, расположенным на задней оси. Затем, 9 октября 2014 года, появилась опция с электродвигателями на каждой оси, а уже с 8 апреля 2015 года компания полностью отказалась от однодвигательной комплектации и от 60 кВт⋅ч версии. С этого времени все выпускающиеся машины оборудованы двумя электродвигателями, полным приводом и в базовой версии оснащаются 70 кВт⋅ч батареей. Стартовая цена начинается от 75 750 долларов в США. В зависимости от комплектации, без перезарядки автомобиль сможет проехать 442, 502 и 480 километров.
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
                                <li><a href="news.php" class="animsition-link">Новости</a></li>
                                <li><a href="bank.php" class="animsition-link">Банк</a></li>
                                <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                                <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                                <li><a href="viewprofile.php" class="animsition-link"><?= $row['username']; ?></a></li>
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
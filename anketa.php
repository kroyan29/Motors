<?php
session_start();
$id_m = isset($_GET['aut']) ? $_GET['aut'] : die('ERROR: отсуствует ID.');
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Анкета</title>
        <style>
            .cen_p {
                margin-top: -270px;
            }

            span {
                float: right;
                margin-top: -280px;
            }

            .kart {
                margin-left: 35%;
                margin-right: 35%;

            }
            .im{
                width: 200px;
            }
        </style>
    </head>

    <body class="animsition">
        <!-- HEADER  -->
        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" style="width:150px;" alt="logo"></a>
                </div>
                <div class="menu">
                    <!-- desktop navbar -->
                    <nav class="desktop-nav">
                        <ul class="first-level">

                            <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                            <li><a href="news.php" class="animsition-link">Новости</a></li>
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
                            <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                            <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            <li><a href="viewprofile.php" class="animsition-link"><?= $_SESSION['username']; ?></a></li>
                        </ul>
                    </nav>
                    <!-- mobile navbar -->

                </div>
            </div>
            </div>
        </header>

        <br><br><br><br><br><br>
        <form action="" method="post" name="panel">
            <fieldset>

                <?
                if (!empty($row['first_name'])) {
                    echo "<center><a href='view_avto.php' class='btn'>Назад</a>";
                    echo "<input type='submit' class='btn' name='but' value='Посмотреть профиль'>";
                    echo "<input type='submit' class='btn' name='but' value='Договор'></center>";

                    $action = $_POST['but'];


                    switch ($action) {
                        case "Договор":
                ?>
                            <style>
                                .dogov {
                                    border: 1px solid black;
                                    margin-left: 20%;
                                    margin-right: 20%;
                                    padding: 10px;
                                }

                                p {
                                    font-size: 16px;
                                }
                            </style>
                            <div class="dogov">




                                <center>
                                    <h3>Договор купли-продажи автомобиля</h3>
                                    <h4>(автомототранспортного средства, прицепа, номерного агрегата)</h4>
                                </center>
                                <p style="float:right">
                                <img src="img/opi.png" class="im" alt=""></p>
                                <p>Город <?php $stmt = $pdo->query("SELECT * FROM tbl_user WHERE tbl_user.user_id = $id", PDO::FETCH_LAZY);
                                            foreach ($stmt as $row) {
                                                echo " ________<u><b>" . $row['city'] . ", " . $row['state'] . "</b></u>______";
                                            ?></p><br>
                                <p>Покупатель <? echo " ___________<u><b>" . $row['first_name'] . " " . $row['last_name'] . "</b></u>___________<p> Дата рождения ______<u><b>" . $row['data_klient'] . "</b></u>______</p>";
                                            } ?></p>
                                <h4>Вы заключили настоящий договор с компаний ООО'Моторс'</h4>
                                <p>1. Компания продал, а Покупатель купил автомобиль (мотоцикл, прицеп, номерной агрегат):</p>
                                <hr>
                                <p>Марка, модель: <?php

                                                    $res = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and model.id_model = $id_m", PDO::FETCH_LAZY);
                                                    foreach ($res as $row) {
                                                        echo "________________<b><u>" . $row['marka_name'] . " " . $row['model_name'] . "</u></b>_________, &nbsp;&nbsp; "; ?>Год выпуска:<? echo "__________<b><u>" . $row['year'] . " г.</u></b>________<br>
         "; ?>Двигатель:<? echo " ______________<b><u>" . $row['obiom_dvig'] . " л.</u></b>_________________ Мощность двигателя: _________<b><u>" . $row['moshnost'] . " л.с.</u></b>______________
<br>

Кузов _______________<b><u>" . $row['kuzov_name'] . "</u></b>__________________ Цвет __________________<b><u>" . $row['color_name'] . "</u></b>__________________________<br><br>
2.  За проданный автомобиль (ТС) Продавец деньги в сумме ____________________________<b><u>" . $row['price'] . ".00 $</u></b>_________________


получил полностью.

<br><br>
3. Продавец обязуется передать автомобиль (автомототранспортное средство, прицеп, номерной агрегат), указанный в настоящем договоре Покупателю. До заключения настоящего договора ТС никому не продано, не заложено, в споре и под арестом не состоит. Покупатель обязуется в течение 10 дней со дня подписания договора перерегистрировать автомобиль (автомототранспортное средство, прицеп, номерной агрегат) на себя. Настоящий договор составлен в трех экземплярах - по одному для каждой из сторон и для оформления в ГИБДД.<br>

<br>
Продавец
<br><br>
Покупатель
<br><br><br>

Деньги получил, транспортное средство передал <small>(подпись и ФИО)</small>__________________________________________<br>


Деньги передал, транспортное средство получил <small>(подпись и ФИО)</small>__________________________________________<br>

<br><br>





Тел._______________________________________

Тел._______________________________________


";
                                                    }

                        ?></b></u></p>

                            </div>
                    <?

                            break;
                        case "Посмотреть профиль":
                            echo "<table class = 'tablshow'>";
                            $stmt = $pdo->prepare("SELECT * FROM tbl_user, type_face, bank WHERE tbl_user.vid_lica_id = type_face.id_typeface and tbl_user.bank_id = bank.id_bank and tbl_user.user_id = $id");
                            $stmt->execute();
                            while ($raw = $stmt->fetch()) {
                                echo "<div class='kart'><fieldset><legend><h3>Клиент №" . $raw['user_id'] . "</h3></legend>
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
                            echo "<tbody></table>";
                            break;
                    }
                } else {
                    echo "<center><input type='submit' name='but' class='btn' value='Заполнять профиль'></center>";



                    ?>


            </fieldset>
        </form>

        <?php


                    $action = $_POST['but'];
                    switch ($action) {

                        case "Заполнять профиль":
        ?>
                <form action="" method="post">
                    <div class="container">
                        <fieldset>
                            <h2>Запись №<?php echo $id; ?></h2>
                            <br><br>
                            <p>
                                <label for="name">Имя: </label> <br>
                                <input type="text" name="name" id="name" value="<?php echo $first_name; ?>" required>
                            </p>
                            <p>
                                <label for="last">Фамилия: </label> <br>
                                <input type="text" name="last" id="last" value="<?php echo $last_name; ?>" required>
                            </p>
                            <p>
                                <label for="gen">Пол: </label> <br>
                                <input type="text" name="gen" id="gen" value="<?php echo $gender; ?>" required>
                            </p>
                            <center class="cen_p">
                                <p>
                                    <label for="city">Город: </label> <br>
                                    <input type="text" name="city" id="city" value="<?php echo $city; ?>" required>
                                </p>
                                <p>
                                    <label for="state">Страна: </label> <br>
                                    <input type="text" name="state" id="state" value="<?php echo $state; ?>" required>
                                </p>
                                <p>
                                    <label for="vid">Вид лица: </label> <br>
                                    <input type="text" name="vid" id="vid" value="<?php echo $vid_lica_id; ?>" required>
                                </p>
                                <p>
                                    <label for="bank">Банк: </label> <br>
                                    <input type="text" name="bank" id="bank" value="<?php echo $bank_id; ?>" required>
                                </p>
                            </center>
                            <span>
                                <p>
                                    <label for="dat">Дата: </label> <br>
                                    <input type="date" name="dat" id="dat" value="<?php echo $data_klient; ?>" required>
                                </p>
                                <p>
                                    <label for="numb">Номер счета: </label> <br>
                                    <input type="text" name="numb" id="numb" value="<?php echo $numer_schet; ?>" required>
                                </p>
                                <p>
                                    <label for="pick">Изображение: </label> <br>
                                    <input type="text" name="pick" id="pick" value="<?php echo $picture; ?>" required>
                                </p>
                            </span>

                    </div>
                    <input type="hidden" name="IDHid" value="<?php echo $user_id; ?>">
                    <br>
                    <center>
                        <p><input type="submit" name="but" class="btn" value="Сохранить изменения"></p>
                    </center>
                    </fieldset>
                 

<?php

                            break;
                        case "Сохранить изменения";
                            $action4 = $_POST['but'];
                            $first_name = $_POST['name'];
                            $last_name = $_POST['last'];
                            $gender = $_POST['gen'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $vid_lica_id = (int)$_POST['vid'];
                            $bank_id = (int)$_POST['bank'];
                            $data_klient = $_POST['dat'];
                            $numer_schet = $_POST['numb'];
                            $picture = $_POST['pick'];
                            $id = (int)$_POST['IDHid'];


                            $zapros = "UPDATE tbl_user SET first_name=?, last_name=?, gender=?,city=?,state=?,vid_lica_id=?,bank_id=?,data_klient=?,numer_schet=?,picture=? WHERE user_id=?";

                            $result = $pdo->prepare($zapros);
                            $result->bindParam(1, $first_name);
                            $result->bindParam(2, $last_name);
                            $result->bindParam(3, $gender);
                            $result->bindParam(3, $city);
                            $result->bindParam(4, $state);
                            $result->bindParam(5, $vid_lica_id);
                            $result->bindParam(6, $bank_id);
                            $result->bindParam(7, $data_klient);
                            $result->bindParam(8, $numer_schet);
                            $result->bindParam(9, $picture);
                            $result->bindParam(10, $user_id);
                            $result->bindParam(11, $id);
                            $result->execute();

                            if ($result)
                                echo "<br><br><center><div style='background-color:#a3ffb7; width: 400px;padding: 20px; border:green 1px solid'> &#9989; Инфориация изменена в БД! </div><center>";
                            else
                                echo "<br><br><center><div style='background-color:#ffa3a3; width: 400px;padding: 20px; border:red 1px solid'> &#9940; Ошибка! Нет редактирования в БД!</div>";

                            break;
                    }
                }
            }
?>   </div>
                </form>
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
    </body>

    </html>
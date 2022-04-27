    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="index.css" type="text/css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Motors - Админ</title>
        <style>
            .log {
                width: 150px;
            }

            .vid {

                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -9999;
            }

            .im {
                width: 150px;
            }



            .glav {
                margin-right: 50px;
                margin-left: 50px;
            }



            table,
            tbody,
            tr,
            td,
            th {
                border: 0.3px groove black;
                border-collapse: collapse;
                margin: auto;
                padding: 10px;
            }






            .btn {
                font-size: 14px;
                padding: 10px;

                padding-top: -120px;

                margin-left: 5%
            }

            .cen {
                margin-top: -395px;
            }


            .cen_right {
                margin-left: 900px;
                margin-top: -395px;

            }
        </style>
    </head>

    <body class="animsition">
        <?php
        require_once "config/appvars.php";
        require_once "config/connectionvars.php";
        ?>



        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a>
                </div>

                <div class="menu">

                    <nav class="desktop-nav">
                        <ul class="first-level">
                            <li><a href="index_user.php" class="animsition-link">Назад на главную</a></li>
                            <li><a href="moder_comm.php" class="animsition-link">Модерация коментарий</a></li>



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

        <br><br><br><br><br><br><br>
        <div class="glav">
            <center>
                <button class="btn"><a href="admin_redakt.php" style="font-size:18px">Модели</a></button>
                <button class="btn"><a href="admin_marka.php" style="font-size:18px">Марки</a></button>
            </center>
        </div>

        <br>
        <div class="glav">
            <form action="" method="post" name="panel">
                <fieldset>
                    <center>
                        <input type="submit" name="but" class="btn" value="Вывести">
                        <input type="submit" name="but" class="btn" value="Добавить запись">
                        <input type="submit" name="but" class="btn" value="Редактировать запись">
                        <input type="submit" name="but" class="btn" 4 value="Удалить запись">
                    </center>
                </fieldset>
            </form>
            <br><br>
        </div>
        <?php


        $action = $_POST['but'];


        switch ($action) {
            case "Вывести":
                echo "<table class = 'tablshow'>
    <thead><tr><th>№</th><th>Модел</th><th>Марка</th><th>Привод</th>
    <th>Цена</th><th>Объем дв.</th><th>Мощность</th><th>Каробка</th><th>Год выпуска</th>
    <th>Пробег</th><th>Кузов</th><th>Цвет</th></tr></thead>";
                $stmt = $pdo->prepare('SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color ORDER BY model.id_model');
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<tbody><tr><td>" . $row['id_model'] . "</td>
        <td>" . $row['model_name'] . "</td>
        <td>" . $row['marka_name'] . "</td>
        <td>" . $row['privod_name'] . "</td>
        <td>" . $row['price'] . " $</td>
        <td>" . $row['obiom_dvig'] . " л.</td>
         <td>" . $row['moshnost'] . " л.с.</td>
        <td>" . $row['karob'] . "</td>
        <td>" . $row['year'] . " г.</td>
         <td>" . $row['probeg'] . " к.м.</td>
        <td>" . $row['kuzov_name'] . "</td>
        <td>" . $row['color_name'] . "</td>
        </tr>";
                }
                echo "<tbody></table>";
                break;

            case "Добавить запись":
        ?>

                <form action="" method="post" name="formNew" id="formNew">
                    <div class="container">
                        <fieldset>
                            <p>
                                <label for="mod">Модел: </label> <br>
                                <input type="text" name="mod" id="mod" maxlenght="80" size="30" required>
                            </p>
                            <p>
                                <label for="mar">Марка: </label> <br>
                                <input type="text" name="mar" id="mar" maxlenght="50" size="30" required>
                            </p>
                            <p>
                                <label for="pri">Цена: </label> <br>
                                <input type="text" name="pri" id="pri" maxlength="50" size="30" required>
                            </p>

                            <p>
                                <label for="kuz">Кузов: </label> <br>
                                <input type="text" name="kuz" id="kuz" maxlenght="50" size="30" required>
                            </p>

                            <p>
                                <label for="col">Цвет: </label> <br>
                                <input type="text" name="col" id="col" maxlenght="50" size="30" required>
                            </p>
                            <div class="cen">
                                <center>
                                    <p>
                                        <label for="priv">Привод: </label> <br>
                                        <input type="text" name="priv" id="priv" maxlenght="50" size="30" required>
                                    </p>
                                    <p>
                                        <label for="dvig">Обьем двигателя: </label> <br>
                                        <input type="text" name="dvig" id="dvig" maxlenght="50" size="30" required>
                                    </p>
                                    <p>
                                        <label for="mosh">Мощнасть: </label> <br>
                                        <input type="text" name="mosh" id="mosh" maxlenght="50" size="30" required>
                                    </p>
                                    <p>
                                        <label for="year">Год: </label> <br>
                                        <input type="text" name="year" id="year" maxlenght="50" size="30" required>
                                    </p>
                                    <p>
                                        <label for="prob">Пробег: </label> <br>
                                        <input type="text" name="prob" id="prob" maxlenght="50" size="30" required>
                                    </p>
                                </center>
                            </div>
                            <div class="cen_right">

                                <p>
                                    <label for="karob">Каробка передачи: </label> <br>
                                    <input type="text" name="karob" id="karob" maxlenght="50" size="30" required>
                                </p>
                                <p>
                                    <label for="kar1">Картинка 1: </label> <br>
                                    <input type="text" name="kar1" id="kar1" maxlenght="50" size="30" required>
                                </p>
                                <p>
                                    <label for="kar2">Картинка 2: </label> <br>
                                    <input type="text" name="kar2" id="kar2" maxlenght="50" size="30" required>
                                </p>
                                <p>
                                    <label for="kar3">Картинка 3: </label> <br>
                                    <input type="text" name="kar3" id="kar3" maxlenght="50" size="30" required>
                                </p>
                                <p>
                                    <label for="kar4">Картинка 4: </label> <br>
                                    <input type="text" name="kar4" id="kar4" maxlenght="50" size="30" required>
                                </p>

                            </div>
                            <p class="buttom_knop"><input type="submit" name="but" class="btn" value="Сохранить"></p>
                        </fieldset>
                    </div>
                </form>
            <?php
                break;
            case "Сохранить":
                $action2 = $_POST['but'];
                $model_name = $_POST['mod'];
                $marka_id = $_POST['mar'];
                $kuzov_id = $_POST['kuz'];
                $color_id = $_POST['col'];
                $price = $_POST['pri'];
                $privod_id = $_POST['priv'];
                $obiom_dvig = $_POST['dvig'];
                $moshnost = $_POST['mosh'];
                $year = $_POST['year'];
                $probeg = $_POST['prob'];
                $karob = $_POST['karob'];
                $foto_model = $_POST['kar1'];
                $foto_model2 = $_POST['kar2'];
                $foto_model3 = $_POST['kar3'];
                $foto_model4 = $_POST['kar4'];


                $zapros = "INSERT INTO model (model_name,marka_id,kuzov_id,color_id,price, privod_id, obiom_dvig, moshnost, year,probeg, karob,foto_model , foto_model2, foto_model3,foto_model4) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $model_name);
                $result->bindParam(2, $marka_id);
                $result->bindParam(3, $kuzov_id);
                $result->bindParam(4, $color_id);
                $result->bindParam(5, $price);
                $result->bindParam(6, $privod_id);
                $result->bindParam(7, $obiom_dvig);
                $result->bindParam(8, $moshnost);
                $result->bindParam(9, $year);
                $result->bindParam(10, $probeg);
                $result->bindParam(11, $karob);
                $result->bindParam(12, $foto_model);
                $result->bindParam(13, $foto_model2);
                $result->bindParam(14, $foto_model3);
                $result->bindParam(15, $foto_model4);
                $result->execute();

                if ($result)
                    echo "<div class='messag OK'> &#9989; Инфориация занесена в БД! </div>";
                else
                    echo "<div class='messag NO'> &#9940; Ошибка! Инфориация не занесена в БД!</div>";
                break;
            case "Редактировать запись":
            ?>
                <form action="" method="post" name="formNomerEdit" id="formNomerEdit">
                    <div class="container">
                        <fieldset>

                            <p><label for="editNumer">Выведите номер модели</label>
                                <input type="text" name="editNumer" id="editNumer" maxlenght="10" size="30" required>
                            </p>
                            <input type="submit" value="Выбрать" class="btn" name="but">
                        </fieldset>

                    </div>
                </form>
                <?php
                break;
            case "Выбрать";
                $action = $_POST['but'];
                $IDNomerEdit = $_POST['editNumer'];
                $zapros = "SELECT model_name,marka_id,kuzov_id,color_id,price, privod_id, obiom_dvig, moshnost, year,probeg, karob,foto_model , foto_model2, foto_model3,foto_model4 FROM model, privod, color, kuzov, marka WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and model.id_model=?";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $IDNomerEdit);
                $result->execute();

                while ($stroka = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id_model = $IDNomerEdit;
                    $model_name = $stroka['model_name'];
                    $marka_id = $stroka['marka_id'];
                    $kuzov_id = $stroka['kuzov_id'];
                    $color_id = $stroka['color_id'];
                    $price = $stroka['price'];
                    $privod_id = $stroka['privod_id'];
                    $obiom_dvig = $stroka['obiom_dvig'];
                    $moshnost = $stroka['moshnost'];
                    $year = $stroka['year'];
                    $probeg = $stroka['probeg'];
                    $karob = $stroka['karob'];
                    $foto_model = $stroka['foto_model'];
                    $foto_model2 = $stroka['foto_model2'];
                    $foto_model3 = $stroka['foto_model3'];
                    $foto_model4 = $stroka['foto_model4'];
                }
                if ($model_name == null || $model_name == '')
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет идентификатора в БД!</div>";
                else {
                ?>
                    <form action="" method="post">
                        <div class="container">
                            <fieldset>
                                <legend>Отредактировать запись № <?php echo $id_model; ?></legend>
                                <p>
                                    <label for="mod">Модел: </label> <br>
                                    <input type="text" name="mod" id="mod" value="<?php echo $model_name; ?>" required>
                                </p>
                                <p>
                                    <label for="mar">Марка: </label> <br>
                                    <input type="text" name="mar" id="mar" value="<?php echo $marka_id; ?>" required>
                                </p>
                                <p>
                                    <label for="pri">Цена: </label> <br>
                                    <input type="text" name="pri" id="pri" value="<?php echo $price; ?>" required>
                                </p>

                                <p>
                                    <label for="kuz">Кузов: </label> <br>
                                    <input type="text" name="kuz" id="kuz" value="<?php echo $kuzov_id; ?>" required>
                                </p>

                                <p>
                                    <label for="col">Цвет: </label> <br>
                                    <input type="text" name="col" id="col" value="<?php echo $color_id; ?>" required>
                                </p>
                                <div class="cen">
                                    <center>
                                        <p>
                                            <label for="priv">Привод: </label> <br>
                                            <input type="text" name="priv" id="priv" value="<?php echo $privod_id; ?>" required>
                                        </p>
                                        <p>
                                            <label for="dvig">Обьем двигателя: </label> <br>
                                            <input type="text" name="dvig" id="dvig" value="<?php echo $obiom_dvig; ?>" required>
                                        </p>
                                        <p>
                                            <label for="mosh">Мощнасть: </label> <br>
                                            <input type="text" name="mosh" id="mosh" value="<?php echo $moshnost; ?>" required>
                                        </p>
                                        <p>
                                            <label for="year">Год: </label> <br>
                                            <input type="text" name="year" id="year" value="<?php echo $year; ?>" required>
                                        </p>
                                        <p>
                                            <label for="prob">Пробег: </label> <br>
                                            <input type="text" name="prob" id="prob" value="<?php echo $probeg; ?>" required>
                                        </p>
                                    </center>
                                </div>
                                <div class="cen_right">

                                    <p>
                                        <label for="karob">Каробка передачи: </label> <br>
                                        <input type="text" name="karob" id="karob" value="<?php echo $karob; ?>" required>
                                    </p>
                                    <p>
                                        <label for="kar1">Картинка 1: </label> <br>
                                        <input type="text" name="kar1" id="kar1" value="<?php echo $foto_model; ?>" required>
                                    </p>
                                    <p>
                                        <label for="kar2">Картинка 2: </label> <br>
                                        <input type="text" name="kar2" id="kar2" value="<?php echo $foto_model2; ?>" required>
                                    </p>
                                    <p>
                                        <label for="kar3">Картинка 3: </label> <br>
                                        <input type="text" name="kar3" id="kar3" value="<?php echo $foto_model3; ?>" required>
                                    </p>
                                    <p>
                                        <label for="kar4">Картинка 4: </label> <br>
                                        <input type="text" name="kar4" id="kar4" value="<?php echo $foto_model4; ?>" required>
                                    </p>

                                </div>
                                <input type="hidden" name="IDHid" value="<?php echo $id_model; ?>">
                                <br>
                                <p><input type="submit" name="but" class="btn" value="Сохранить изменения"></p>
                            </fieldset>
                        </div>
                    </form>
                <?php
                }
                break;
            case "Сохранить изменения";
                $action4 = $_POST['but'];
                $model_name = $_POST['mod'];
                $marka_id = $_POST['mar'];
                $kuzov_id = $_POST['kuz'];
                $color_id = $_POST['col'];
                $price = $_POST['pri'];
                $privod_id = $_POST['priv'];
                $obiom_dvig = $_POST['dvig'];
                $moshnost = $_POST['mosh'];
                $year = $_POST['year'];
                $probeg = $_POST['prob'];
                $karob = $_POST['karob'];
                $foto_model = $_POST['kar1'];
                $foto_model2 = $_POST['kar2'];
                $foto_model3 = $_POST['kar3'];
                $foto_model4 = $_POST['kar4'];
                $id_model = (int)$_POST['IDHid'];


                $zapros = "UPDATE model SET model_name=?, marka_id=?, kuzov_id=?, color_id=?, price=?, privod_id=?, obiom_dvig=?, moshnost=?, year=?, probeg=?, karob=?, foto_model=?, foto_model2=?, foto_model3=?, foto_model4=?  WHERE id_model=?";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $model_name);
                $result->bindParam(2, $marka_id);
                $result->bindParam(3, $kuzov_id);
                $result->bindParam(4, $color_id);
                $result->bindParam(5, $price);
                $result->bindParam(6, $privod_id);
                $result->bindParam(7, $obiom_dvig);
                $result->bindParam(8, $moshnost);
                $result->bindParam(9, $year);
                $result->bindParam(10, $probeg);
                $result->bindParam(11, $karob);
                $result->bindParam(12, $foto_model);
                $result->bindParam(13, $foto_model2);
                $result->bindParam(14, $foto_model3);
                $result->bindParam(15, $foto_model4);
                $result->bindParam(16, $id_model);
                $result->execute();

                if ($result)
                    echo "<div class='messag OK'> &#9989; Инфориация изменена в БД! </div>";
                else
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет редактирования в БД!</div>";

                break;

            case "Удалить запись":
                ?>
                <form action="" method="post" name="formNomerDelet" id="formNomerDelet">
                    <div class="container">
                        <fieldset>

                            <p><label for="deleteNumer">Выведите номер строки</label>
                                <input type="text" name="deleteNumer" id="deleteNumer" maxlenght="10" size="30" required>
                            </p>
                            <input type="submit" value="Удалить" class="btn" name="but">
                        </fieldset>

                    </div>
                </form>
        <?php
                break;
            case "Удалить":
                $action5 = $_POST['but'];
                $delNomer = $_POST['deleteNumer'];

                $id_model = $delNomer;
                $stmt = $pdo->prepare("SELECT * FROM model WHERE id_model = ?");
                $stmt->execute([$id_model]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['model_name'] == '' || $row['model_name'] == null)
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет идентификатора в БД!</div>";
                else {
                    $zapros = "DELETE FROM model WHERE id_model=?";
                    $result = $pdo->prepare($zapros);
                    $result->bindParam(1, $delNomer);
                    $result->execute();

                    if ($result)
                        echo "<div class='messag OK'>  Информация удалена из БД успешно! </div>";

                    else
                        echo "<div class='messag NO'>  Ошибка! </div>";
                }
                break;
        }

        ?>
        </fieldset>
        </div>
        <br><br>

        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>
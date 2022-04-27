<?php
// содержит переменные пагинации 
require_once 'config/core.php';
// для подключения к БД и файлы с объектами 
require_once 'config/database.php';
require_once 'objects/model.php';
require_once 'objects/marka.php';

// создание экземпляра класса базы данных и товара 
$database = new Database();
$db = $database->getConnection();
$model = new Model($db);
$marka = new Marka($db);


// получение поискового запроса 
$search_term = isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "Вы искали на \"{$search_term}\"";


// запрос товаров 
$stmt = $model->search($search_term, $from_record_num, $records_per_page);

// указываем страницу, на которой используется пагинация 
$page_url = "searchauto.php?s={$search_term}&";

// подсчитываем общее количество строк - используется для разбивки на страницы 
$total_rows = $model->countAll_BySearch($search_term);
echo "<a href='view_avto.php' class='btn btn-primary left-margin'>";
echo "<span class='glyphicon glyphicon-search'></span> </a>";
if ($total_rows > 0) {
    echo "<div class='containerProd'>"; 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            extract($row);
             $res = $pdo->query("SELECT * FROM marka", PDO::FETCH_LAZY);
                                    foreach ($res as $raws) {
                                        echo "<center><h2 class='montserrat-text uppercase'>" . $raws['marka_name'] . "</h2></center> <div class='wrapper'>";
                                        $a = $raws['id_marka'];
                                        $ris = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and marka.id_marka=$a ORDER BY marka.marka_name");
                                        foreach ($ris as $rows) {
                                            echo "<p><hr> <b> <h3>" . $rows['year'] . " " . $rows['model_name'] . "</h3></b><img src='" . $rows['foto_model'] . "' class='images'>" . "  <br>";
                                            echo "<form action='view_avto2.php' method='get'><br><p>
                                        <a href='view_avto2.php?auto=" . $rows['id_model'] . "' class='btn btn-primary left-margin' name='auto'>";
                                            echo "П&#10026;ДР&#10026;БНЕЕ";
                                            echo "</a></p></form>";
                                        }
                                        echo "</div>";
                                    }
                                
        }

    echo "</div>";

    // пагинация 

}

// сообщить пользователю, что товаров нет 
else {
    echo "<div class='alert alert-danger'>Товаров не найдено.</div>";
}

// ***********************************************************************
// содержит наш JavaScript и закрывающие теги html 


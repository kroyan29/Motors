<?php
class Model
{

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "model";

    // свойства объекта 
    public $id_model;
    public $model_name;
    public $privod_id;
    public $price;
    public $obiom_dvig;
    public $moshnost;
    public $karob;
    public $marka_id;
    public $year;
    public $probeg;
    public $kuzov_id;
    public $color_id;
    public $foto_model;
    public $foto_model2;
    public $foto_model3;
    public $foto_model4;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // метод создания товара 
    function create()
    {
        
        // запрос MySQL для вставки записей в таблицу БД «products» 

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    model_name=:model_name,
                    privod_id=:privod_id,
                    price=:price,
                    obiom_dvig=:obiom_dvig,
                        moshnost=:moshnost,
                         karob=:karob,
                         marka_id=:marka_id,
                          year=:year,
                           probeg=:probeg,
                           kuzov_id=:kuzov_id,
                           color_id=:color_id,
                            foto_model=:foto_model,
                            foto_model2=:foto_model2,
                            foto_model3=:foto_model3,
                             foto_model4=:foto_model4";

        $stmt = $this->conn->prepare($query);
        // опубликованные значения 
        $this->model_name = htmlspecialchars(strip_tags($this->model_name));
        $this->privod_id = htmlspecialchars(strip_tags($this->privod_id));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->obiom_dvig = htmlspecialchars(strip_tags($this->obiom_dvig));
        $this->moshnost = htmlspecialchars(strip_tags($this->moshnost));
        $this->karob = htmlspecialchars(strip_tags($this->karob));
        $this->marka_id = htmlspecialchars(strip_tags($this->marka_id));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->probeg = htmlspecialchars(strip_tags($this->probeg));
        $this->kuzov_id = htmlspecialchars(strip_tags($this->kuzov_id));
        $this->color_id = htmlspecialchars(strip_tags($this->color_id));
        $this->foto_model = htmlspecialchars(strip_tags($this->foto_model));
        $this->foto_model2 = htmlspecialchars(strip_tags($this->foto_model2));
        $this->foto_model3 = htmlspecialchars(strip_tags($this->foto_model3));
        $this->foto_model4 = htmlspecialchars(strip_tags($this->foto_model4));

        // получаем время создания записи 
        $this->timestamp = date('Y-m-d H:i:s');

        // привязываем значения 
        $stmt->bindParam(":model_name", $this->model_name);
        $stmt->bindParam(":privod_id", $this->privod_id);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":obiom_dvig", $this->obiom_dvig);
        $stmt->bindParam(":moshnost", $this->moshnost);
        $stmt->bindParam(":karob", $this->karob);
        $stmt->bindParam(":marka_id", $this->marka_id);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":probeg", $this->probeg);
        $stmt->bindParam(":kuzov_id", $this->kuzov_id);
        $stmt->bindParam(":color_id", $this->color_id);
        $stmt->bindParam(":foto_model", $this->foto_model);
        $stmt->bindParam(":foto_model2", $this->foto_model2);
        $stmt->bindParam(":foto_model3", $this->foto_model3);
        $stmt->bindParam(":foto_model4", $this->foto_model4);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Метод чтения товара
    function readAll($from_record_num, $records_per_page)
    {
        // запрос MySQL 
        $query = "SELECT id_model, model_name,privod_id, price,obiom_dvig,moshnost,karob,marka_id, year,probeg,kuzov_id,color_id,foto_model,foto_model2,foto_model3,foto_model4
                FROM  " . $this->table_name . "
                ORDER BY id ASC
                LIMIT {$from_record_num}, {$records_per_page}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // используется для пагинации товаров 
    public function countAll()
    {
        // запрос MySQL 
        $query = "SELECT id_model FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }

    //  читать по ID
    function readOne()
    {
        // запрос MySQL 
        $query = "SELECT model_name,privod_id, price,obiom_dvig,moshnost,karob,marka_id, year,probeg,kuzov_id,color_id,foto_model,foto_model2,foto_model3,foto_model4
            FROM  " . $this->table_name . " WHERE  id_model = ?  LIMIT  0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_model);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->model_name = $row['model_name'];
        $this->privod_id = $row['privod_id'];
        $this->price = $row['price'];
        $this->obiom_dvig = $row['obiom_dvig'];
        $this->moshnost = $row['moshnost'];
        $this->karob = $row['karob'];
        $this->marka_id = $row['marka_id'];
        $this->year = $row['year'];
        $this->probeg = $row['probeg'];
        $this->kuzov_id = $row['kuzov_id'];
        $this->color_id = $row['color_id'];
        $this->foto_model = $row['foto_model'];
        $this->foto_model2 = $row['foto_model2'];
        $this->foto_model3 = $row['foto_model3'];
        $this->foto_model4 = $row['foto_model4'];
    }

    // обновить
    function update()
    {
        // MySQL запрос для обновления записи (товара) 

        $query = "UPDATE  " . $this->table_name . "
            SET  model_name=:model_name,
                    privod_id=:privod_id,
                    price=:price,
                    obiom_dvig=:obiom_dvig,
                        moshnost=:moshnost,
                         karob=:karob,
                         marka_id=:marka_id,
                          year=:year,
                           probeg=:probeg,
                           kuzov_id=:kuzov_id,
                           color_id=:color_id,
                            foto_model=:foto_model,
                            foto_model2=:foto_model2,
                            foto_model3=:foto_model3,
                             foto_model4=:foto_model4
            WHERE id_model = :id_model";
        // подготовка запроса 
        $stmt = $this->conn->prepare($query);
        // очистка 
        $this->model_name = htmlspecialchars(strip_tags($this->model_name));
        $this->privod_id = htmlspecialchars(strip_tags($this->privod_id));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->obiom_dvig = htmlspecialchars(strip_tags($this->obiom_dvig));
        $this->moshnost = htmlspecialchars(strip_tags($this->moshnost));
        $this->karob = htmlspecialchars(strip_tags($this->karob));
        $this->marka_id = htmlspecialchars(strip_tags($this->marka_id));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->probeg = htmlspecialchars(strip_tags($this->probeg));
        $this->kuzov_id = htmlspecialchars(strip_tags($this->kuzov_id));
        $this->color_id = htmlspecialchars(strip_tags($this->color_id));
        $this->foto_model = htmlspecialchars(strip_tags($this->foto_model));
        $this->foto_model2 = htmlspecialchars(strip_tags($this->foto_model2));
        $this->foto_model3 = htmlspecialchars(strip_tags($this->foto_model3));
        $this->foto_model4 = htmlspecialchars(strip_tags($this->foto_model4));
        $this->id_model = htmlspecialchars(strip_tags($this->id_model));

        // $this->image = htmlspecialchars(strip_tags($this->image));

        // var_dump( $this->image);
        // var_dump($_SESSION['sesStr']);

        // привязка значений 
        $stmt->bindParam(":model_name", $this->model_name);
        $stmt->bindParam(":privod_id", $this->privod_id);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":obiom_dvig", $this->obiom_dvig);
        $stmt->bindParam(":moshnost", $this->moshnost);
        $stmt->bindParam(":karob", $this->karob);
        $stmt->bindParam(":marka_id", $this->marka_id);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":probeg", $this->probeg);
        $stmt->bindParam(":kuzov_id", $this->kuzov_id);
        $stmt->bindParam(":color_id", $this->color_id);
        $stmt->bindParam(":foto_model", $this->foto_model);
        $stmt->bindParam(":foto_model2", $this->foto_model2);
        $stmt->bindParam(":foto_model3", $this->foto_model3);
        $stmt->bindParam(":foto_model4", $this->foto_model4);
        $stmt->bindParam(':id_model', $this->id_model);
       

        // выполняем запрос 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // удаление товара 
    function delete()
    {

        // запрос MySQL для удаления 
        $query = "DELETE FROM " . $this->table_name . " WHERE id_model = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_model);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // читаем товары по поисковому запросу 
    public function search($search_term, $from_record_num, $records_per_page)
    {

        // запрос к БД 
        $query = "SELECT 
                c.name as marka_name, p.id_model, p.model_name, p.privod_id, p.price, p.obiom_dvig, p.moshnost, p.karob, p.marka_id, p.year, p.probeg, p.kuzov_id, p.color_id, p.foto_model, p.foto_model2, p.foto_model3, p.foto_model4,
            FROM  " . $this->table_name . " p
                LEFT JOIN  marka c  ON p.id_model = c.id_marka
            WHERE  p.model_name LIKE ? OR p.year LIKE ?
            ORDER BY p.model_name ASC
            LIMIT  ?, ?";
        // подготавливаем запрос 
        $stmt = $this->conn->prepare($query);

        // привязываем значения переменных 
        $search_term = "%{$search_term}%";
        $stmt->bindParam(1, $search_term);
        $stmt->bindParam(2, $search_term);
        $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);

        // выполняем запрос 
        $stmt->execute();
        // возвращаем значения из БД 
        return $stmt;
    }

    public function countAll_BySearch($search_term)
    {
        // запрос 
        $query = "SELECT COUNT(*) as total_rows
            FROM  " . $this->table_name . " p 
            WHERE p.model_name LIKE ? OR p.year LIKE ?";

        // подготовка запроса 
        $stmt = $this->conn->prepare($query);

        // привязка значений 
        $search_term = "%{$search_term}%";
        $stmt->bindParam(1, $search_term);
        $stmt->bindParam(2, $search_term);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    // загрузка файла изображения на сервер 
    function uploadPhoto()
    {
        $result_message = "";

        // если изображение не пустое, пробуем загрузить его 
        if ($this->foto_model) {

            // функция sha1_file() используется для создания уникального имени файла 
            $target_directory = "uploads/";
            $target_file = $target_directory . $this->foto_model;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // сообщение об ошибке пусто 
            $file_upload_error_messages = "";

            // убеждаемся, что файл - изображение 
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if ($check !== false) {
                // отправленный файл является изображением 
            } else {
                $file_upload_error_messages .= "<div>Отправленный файл не является изображением.</div>";
            }

            // проверяем, разрешены ли определенные типы файлов 
            $allowed_file_types = array("jpg", "jpeg", "png", "gif");

            if (!in_array($file_type, $allowed_file_types)) {
                $file_upload_error_messages .= "<div>Разрешены только файлы JPG, JPEG, PNG, GIF.</div>";
            }

            // убеждаемся, что файл не существует 
            if (file_exists($target_file)) {
                $file_upload_error_messages .= "<div>Изображение уже существует. Попробуйте изменить имя файла.</div>";
            }

            // убедимся, что отправленный файл не слишком большой (не может быть больше 1 МБ) 
            if ($_FILES['image']['size'] > (1024000)) {
                $file_upload_error_messages .= "<div>Размер изображения не должен превышать 1 МБ.</div>";
            }

            // убедимся, что папка uploads существует, если нет, то создаём 
            if (!is_dir($target_directory)) {
                mkdir($target_directory, 0777, true);
            }

            // если $file_upload_error_messages всё ещё пуст 
            if (empty($file_upload_error_messages)) {

                // ошибок нет, пробуем загрузить файл 
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // фото загружено 
                } else {
                    $result_message .= "<div class='alert alert-danger'>";
                    $result_message .= "<div>Невозможно загрузить фото.</div>";
                    $result_message .= "<div>Обновите запись, чтобы загрузить фото снова.</div>";
                    $result_message .= "</div>";
                }
            }

            // если $file_upload_error_messages НЕ пусто 
            else {

                // это означает, что есть ошибки, поэтому покажем их пользователю 
                $result_message .= "<div class='alert alert-danger'>";
                $result_message .= "{$file_upload_error_messages}";
                $result_message .= "<div>Обновите запись, чтобы загрузить фото.</div>";
                $result_message .= "</div>";
            }
        }

        return $result_message;
    }



    // **************************ПОИСК ПО КАТЕГОРИИ

    public function searchCat()
    {

        $query = "SELECT * FROM  " . $this->table_name . " WHERE  marka_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->marka_id);
        $stmt->execute();

        return $stmt;
    }

    public function countAll_searchCat()
    {
        // запрос 
        $query = "SELECT COUNT(*) as total_rows
            FROM  " . $this->table_name . " WHERE  marka_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->marka_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}

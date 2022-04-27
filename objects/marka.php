<?php
class Marka
{

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "marka";

    // свойства объекта 
    public $id_marka;
    public $marka_name;
    public $image;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // данный метод используется в раскрывающемся списке 
    function read()
    {
        // запрос MySQL: выбираем столбцы в таблице «categories» 
        $query = "SELECT id_marka, marka_name FROM
                    " . $this->table_name . "
                ORDER BY id_marka";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // получение названия категории по её ID 
    function readName()
    {
        // запрос MySQL 
        $query = "SELECT marka_name FROM " . $this->table_name . " WHERE id_marka = ? limit 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_marka);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['marka_name'];
    }

    // проверка на совпадение категории при вводе
    function proverka($marka_name)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->table_name . " WHERE marka_name ='$marka_name'";
        $result = $this->conn->query($query)->fetch(PDO::FETCH_ASSOC);
        return $result['kol'];
    }


    // метод создания категории 
    function create()
    {
        // запрос MySQL для вставки записей в таблицу БД категория     
        $query = "INSERT INTO
                " . $this->table_name . "
            SET  marka_name=:marka_name, created=:created";
        $stmt = $this->conn->prepare($query);
        // опубликованные значения 
        $this->marka_name = htmlspecialchars(strip_tags($this->marka_name));
        // получаем время создания записи 
        $this->timestamp = date('Y-m-d H:i:s');
        // привязываем значения 
        $stmt->bindParam(":marka_name", $this->marka_name);
        $stmt->bindParam(":created", $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Читать таблицу
    function readAll($from_record_num, $records_per_page)
    {
        // запрос MySQL 
        $query = "SELECT id_marka, marka_name
            FROM  " . $this->table_name . "
            ORDER BY marka_name ASC
            LIMIT {$from_record_num}, {$records_per_page}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // используется для пагинации категории 
    public function countAll()
    {
        // запрос MySQL 
        $query = "SELECT id_marka FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }

    // обновление
    function update()
    {
        // MySQL запрос для обновления записи (товара) 
        $query = "UPDATE  " . $this->table_name . "
            SET marka_name = :marka_name
            WHERE id_marka = :id_marka";
        // подготовка запроса 
        $stmt = $this->conn->prepare($query);
        // очистка 
        $this->marka_name = htmlspecialchars(strip_tags($this->marka_name));
        $this->id_marka = htmlspecialchars(strip_tags($this->id_marka));

        // привязка значений 
        $stmt->bindParam(':marka_name', $this->marka_name);
        $stmt->bindParam(':id_marka', $this->id_marka);
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
        $queryProduct = "DELETE FROM  model  WHERE  model.marka_id = ?";
        $stmtqueryProduct = $this->conn->prepare($queryProduct);
        $stmtqueryProduct->bindParam(1, $this->id_marka);
        $stmtqueryProduct->execute();

        $query = "DELETE FROM " . $this->table_name . " WHERE id_marka = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_marka);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

<?php
class Comment {

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "comments";

    // свойства объекта 
    public $id;
    public $tovar_id;
    public $user;
    public $title;
    public $text;
    public $moder;
    public $timestamp;

    public function __construct($db) {
        $this->conn = $db;
    }
   
	// метод создания комментария 
    function create() {
        // запрос MySQL для вставки записей в таблицу БД «products» 
		
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                tovar_id=:tovar_id, user=:user, title=:title, text=:text, created=:created";


        $stmt = $this->conn->prepare($query);
        // опубликованные значения 
        $this->tovar_id=htmlspecialchars(strip_tags($this->tovar_id));
        $this->user=htmlspecialchars(strip_tags($this->user));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->text=htmlspecialchars(strip_tags($this->text));

        // получаем время создания записи 
        $this->timestamp = date('Y-m-d H:i:s');

        // привязываем значения 
        $stmt->bindParam(":tovar_id", $this->tovar_id);
        $stmt->bindParam(":user", $this->user);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":created", $this->timestamp);
      
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Метод чтения комментарий по ID товара
    function readAll() {
        // запрос MySQL 
        $query = "SELECT id, user, title, text, created
                FROM  " . $this->table_name . " WHERE moder=1 and tovar_id =?
                ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->tovar_id);
        $stmt->execute();    
        return $stmt;
    }  
 
    function readCount(){
        $query ="SELECT COUNT(id) as kol FROM comments WHERE moder=1 AND tovar_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->tovar_id);
        $stmt->execute();   
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return   $row['kol']; 
    }

     // Метод чтения ВСЕХ комментарий ++++
     function readAllModer() {
        // запрос MySQL 
        $query = "SELECT id, user, title, text, created, tovar_id
                FROM  " . $this->table_name . " WHERE moder=1 
                ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);     
        $stmt->execute();    
        return $stmt;
    }  


    // удаление отзыва 
    function delete()    {

        // запрос MySQL для удаления 
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // обновить
    function update()
    {
        // MySQL запрос для обновления записи (товара) 

        $query = "UPDATE  " . $this->table_name . "
            SET moder=:moder
            WHERE id = :id";
        // подготовка запроса 
        $stmt = $this->conn->prepare($query);
        // очистка 
               $this->id = htmlspecialchars(strip_tags($this->id));
        // привязка значений 
         $stmt->bindParam(':moder', $this->moder);
        $stmt->bindParam(':id', $this->id);
        // выполняем запрос 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


        // Метод чтения ВСЕХ комментарий 
        function readAllModerNoYes() {
            // запрос MySQL 
            $query = "SELECT *
                    FROM  " . $this->table_name .
                    " ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);     
            $stmt->execute();    
            return $stmt;
        } 
}

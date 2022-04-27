<?php
class Database {

    // укажите свои собственные учетные данные для базы данных 
    private $host = "localhost";
    private $db_name = "autosalon";
    private $username = "root";
    private $password = "root";
    public $conn;

    // получение соединения с базой данных 
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=3306;dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
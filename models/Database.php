<?php
/*
* Mysql database class - only one connection alowed
*/
class Database {
    private $_connection;
    private static $_instance;
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "holbi";
    private $_type = "mysqli";
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance($param) {
        if(!self::$_instance) {
            self::$_instance = new self($param);
        }
        return self::$_instance;
    }


    private function __construct($param) {

        $this->_host = $param['host'];
        $this->_username = $param['user'];
        $this->_password = $param['password'];
        $this->_database = $param['database'];
        $this->_type = $param['type'];

        switch ($this->_type){
            case 'mysqli':
                $this->_connection = new mysqli($this->_host, $this->_username,
                    $this->_password, $this->_database);

                if (mysqli_connect_error()) {
                    trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                        E_USER_ERROR);
                }
                break;
            case 'pdo':
                    try {
                        $this->_connection  = new \PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password);
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                break;
            default:
                trigger_error("Unknown type connection: ", E_USER_ERROR);
        }

    }

    private function __clone() { }


    public function getConnection() {
        return $this->_connection;
    }

    public function getType(){
        return $this->_type;
    }
}
?>

<?php 
include "config.php";
  class Database{
    private static $db; //Database object
    private $pdo = null; //pdo object
                
    private final function __construct() { 
       
    }
    
    public static function getInstance() { 
        if (!isset(self::$db))
            self::$db = new Database();
        return self::$db; 
    }
    //start connection
    public function start(){
         // echo "Connecting to db ..."; 
        $serverName = DB_HOST;
        $username = DB_USER;
        $password = DB_PWD;
        $dbName = DB_NAME;
        try {
            $this->pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //close connection
    public function close(){
        $this->pdo = null;
    }

    function __destruct() {
        $this->close();
    }
    public function getPDO(){
        return $this->pdo;
    }


  }

?>  
  
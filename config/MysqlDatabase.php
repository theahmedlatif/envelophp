<?php
namespace Envelope\Database;
use Envelope\Envelope;
use PDO;
use PDOException;
require_once dirname(__DIR__, 1) . '/src/Envelope.php';

class MysqlDatabase extends Envelope {
    private $host;
    private $database_dsn;
    private $database_name;
    private $username;
    private $password;
    public $conn;

    public function __construct()
    {
        $variables = $this->getDatabaseVariables();
        $this->host = $variables['HOST'];
        $this->database_dsn = $variables['DATABASE_DSN'];
        $this->database_name = $variables['DATABASE_NAME'];
        $this->username = $variables['DATABASE_USERNAME'];
        $this->password = $variables['DATABASE_PASSWORD'];
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO($this->database_dsn.":host=" . $this->host.
            ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch (PDOException $exception){
            echo "Couldn't connect to database: " . $exception->getMessage();
        }
        return $this->conn;
    }
}


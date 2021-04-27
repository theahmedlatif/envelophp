<?php

namespace Envelope\Database;

use Envelope\Envelope;
use PDO;
use PDOException;

require_once dirname(__DIR__, 1) . '/src/Envelope.php';

class MysqlDatabase extends Envelope
{
    public $conn;
    private $host;
    private $database_dsn;
    private $database_name;
    private $username;
    private $password;


    public function __construct()
    {
        $variables = $this->getDatabaseVariables();
        $this->host = $variables['HOST'];
        $this->database_dsn = $variables['DATABASE_DSN'];
        $this->database_name = $variables['DATABASE_NAME'];
        $this->username = $variables['DATABASE_USERNAME'];
        $this->password = $variables['DATABASE_PASSWORD'];
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO($this->database_dsn . ":host=" . $this->host .
                ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Couldn't connect to database: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getDatabaseName()
    {
        return $this->database_name;
    }
    public function createDatabase()
    {
        try {
            $database = new PDO("$this->database_dsn:host=$this->host", $this->username, $this->password);
            $mysqlStatement = "  CREATE DATABASE $this->database_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
            return ($database->exec($mysqlStatement));

        } catch (PDOException $exception) {
            return "DB ERROR: " . $exception->getMessage();
        }
    }

    public function insert($statement)
    {
        try {
            $connection = $this->getConnection();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec($statement);
            return "handled successfully!";
        } catch (PDOException $exception) {
            return $statement . "<br>" . $exception->getMessage();
        }
    }

    public function select($statement)
    {
        try {
            $connection = $this->getConnection();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection->query("$statement")->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            return $statement . "<br>" . $exception->getMessage();
        }
    }

    public function delete($statement)
    {
        try {
            $connection = $this->getConnection();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec($statement);
            return "handled successfully!";
        } catch (PDOException $exception) {
            return $statement . "<br>" . $exception->getMessage();
        }
    }

    public function update($statement)
    {
        try {
            $connection = $this->getConnection();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec($statement);
            return "handled successfully!";
        } catch (PDOException $exception) {
            return $statement . "<br>" . $exception->getMessage();
        }
    }

    public function closeConnection()
    {
        return $this->conn = null;
    }
}


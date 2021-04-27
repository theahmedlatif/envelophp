<?php

namespace Envelope\Tests\Unit;

use Envelope\Database\MysqlDatabase;

require_once dirname(__DIR__, 1) . '\config\MysqlDatabase.php';

class CreateDBTest extends MysqlDatabase
{
    public function testCreateMysqlDatabase()
    {
        return $this->createDatabase();
    }
}

$readyTestCase = new CreateDBTest();
if ($readyTestCase->testCreateMysqlDatabase() != false) {
    echo "Test database created successfully." . PHP_EOL;
 } else {
    echo "Failed to create Test database." . PHP_EOL;
}

// set the PDO error mode to exception
//$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// sql to create table
$connection = $readyTestCase->getConnection();
$db_name = $readyTestCase->getDatabaseName();
$sql = "CREATE TABLE `$db_name`.`test_table` ( 
            `id` INT NOT NULL AUTO_INCREMENT , 
            `name` VARCHAR(20) NOT NULL , 
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
            `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
            PRIMARY KEY (`id`)) ENGINE = InnoDB";

// use exec() because no results are returned
$connection->exec($sql);
echo "Table test created successfully";




$readyTestCase->closeConnection();

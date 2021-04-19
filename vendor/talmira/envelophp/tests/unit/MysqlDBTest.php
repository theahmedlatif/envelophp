<?php
namespace  Tal\Tests\Unit;
use Tal\Database\MysqlDB;
require_once dirname(__DIR__,2).'\config\database.php';

class MysqlDBTest extends MysqlDB
{
    public function testMysqlDBConnection()
    {

        if ($this->getConnection())
        {
            echo "connected successfully".PHP_EOL;
        }
        else
        {
            echo "Unable to connect".PHP_EOL;
        }
    }
}

$readyTestCase = new MysqlDBTest();
$readyTestCase->testMysqlDBConnection();
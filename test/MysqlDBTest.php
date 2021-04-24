<?php

namespace Envelope\Tests\Unit;

use Envelope\Database\MysqlDatabase;

require_once dirname(__DIR__, 1) . '\config\MysqlDatabase.php';

class MysqlDBTest extends MysqlDatabase
{
    public function testMysqlDBConnection()
    {

        if ($this->getConnection()) {
            echo "connected successfully" . PHP_EOL;
        } else {
            echo "Unable to connect" . PHP_EOL;
        }
    }
}

$readyTestCase = new MysqlDBTest();
$readyTestCase->testMysqlDBConnection();

$readyTestCase->closeConnection();

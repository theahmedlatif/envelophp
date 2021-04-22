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

$readyTestCase->closeConnection();

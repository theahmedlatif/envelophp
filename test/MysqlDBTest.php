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

//print_r($readyTestCase->select("SELECT * FROM museums"));
/*$readyTestCase->insert("INSERT INTO museums (mname, arabic_name, city, type, est_year)
VALUES ('test', 'اختبار' , 'test', 'test' , 1111)");*/
//$readyTestCase->delete("DELETE FROM museums where id = 16");
//$readyTestCase->update("UPDATE museums SET city = 'test city' where id = 17");
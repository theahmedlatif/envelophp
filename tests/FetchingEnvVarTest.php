<?php
namespace  Tal\Tests\Unit;
use Tal\EnvironmentVariables;
require_once dirname(__DIR__, 1) . '\src\env.php';

class FetchingEnvVarTest extends EnvironmentVariables{
    public function testEnvironmentVariablesFetching()
    {
        if ($this->getDatabaseVariables())
        {
            return $this->getDatabaseVariables();
        }
        else
        {
            return "Failed to read .env file variables!".PHP_EOL;
        }
    }
}

$readyTestCase = new FetchingEnvVarTest();
var_dump($readyTestCase->getDatabaseVariables());

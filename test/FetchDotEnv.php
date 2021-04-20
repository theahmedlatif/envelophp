<?php
namespace  Envelope\Tests\Unit;
use Envelope\EnvironmentVariables;
require_once dirname(__DIR__, 1) . '\src\env.php';

class FetchDotEnv extends EnvironmentVariables{
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

$readyTestCase = new FetchDotEnv();
var_dump($readyTestCase->getDatabaseVariables());

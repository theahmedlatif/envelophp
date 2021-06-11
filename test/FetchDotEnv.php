<?php

namespace Envelope\Tests\Unit;

use Envelope\Envelope;

require_once dirname(__DIR__, 1) . '\src\Envelope.php';

class FetchDotEnv extends Envelope
{
    public function testEnvironmentVariablesFetching()
    {
        if ($this->getDatabaseVariables()) {
            return $this->getDatabaseVariables();
        } else {
            return "Failed to read .env file variables!" . PHP_EOL;
        }
    }
}

$readyTestCase = new FetchDotEnv();

var_dump($readyTestCase->testEnvironmentVariablesFetching());

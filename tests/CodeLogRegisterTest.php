<?php

namespace CodeMaster\CodeLog\Test;

use CodeMaster\CodeLog\CodeLogRegister;
use Monolog\Logger;

class CodeLogRegisterTest extends TestCase
{
    /** @test */
    public function it_is_get_logger_with_default_log_path()
    {
        app('config')->set('code-log.channel', 'database');

        $logger = app(CodeLogRegister::class)->setChannel('database')->getLogger();

        $this->assertInstanceOf(Logger::class, $logger);
    }
}

<?php

namespace CodeMaster\CodeLog\Test;

use CodeMaster\CodeLog\CodeLogRegister;
use CodeMaster\CodeLog\Contracts\Log;
use Monolog\Logger;

class LoggingTest extends TestCase
{
    /** @test */
    public function it_is_return_by_default_switch_case()
    {
        app('config')->set('code-log.channel', null);

        $logger = app(CodeLogRegister::class)->setChannel('file')->getLogger();

        $this->assertInstanceOf(Logger::class, $logger);

        app(Log::class)::info('test');
    }
}

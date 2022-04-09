<?php

namespace CodeMaster\CodeLog\Test;

use CodeMaster\CodeLog\Logging\Log;
use CodeMaster\CodeLog\Models\Log as ModelsLog;

class HelpersTest extends TestCase
{
    /** @test */
    public function it_is_test_codlog_method()
    {
        $message = 'message test';

        codelog($message);

        codelog($message, [], Log::INFO);
        
        codelog($message, [], Log::SUCCESS);
        
        codelog($message, [], Log::ERROR);
        
        codelog($message, [], 600);

        app('config')->set('code-log.channel', 'database');

        codelog($message);

        $log = app(ModelsLog::class)->first();
        
        $this->assertEquals('"'.$message.'"', $log->message);
    }
}
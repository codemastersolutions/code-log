<?php

namespace CodeMaster\CodeLog\Test;

use CodeMaster\CodeLog\Facades\CodeLog;
use CodeMaster\CodeLog\Models\Log;
use Exception;

class LogModelTest extends TestCase
{
    /** @var \CodeMaster\CodeLog\Models\Log $log */
    private $log;
    private $message;

    public function setup(): void
    {
        parent::setup();

        app('config')->set('code-log.channel', 'database');
        app('config')->set('code-log.channels.database.connection', null);
        app('config')->set('code-log.channels.database.table', null);

        $this->message = 'a message test';

        codelog($this->message);

        $this->log = app(Log::class)->whereMessage('"'.$this->message.'"')->first();
    }

    /** @test */
    public function it_is_check_if_model_get_default_connection()
    {
        $this->assertEquals('"'.$this->message.'"', $this->log->message);
    }

    /** @test */
    public function it_is_check_if_model_get_default_table()
    {
        $this->assertEquals('"'.$this->message.'"', $this->log->message);
    }

    /** @test */
    public function it_is_throw_exception_when_table_not_exists()
    {
        $this->expectException(Exception::class);

        app('config')->set('code-log.channels.database.table', 'other_table');
        
        CodeLog::info('other message');        
    }
}
<?php

namespace CodeMaster\CodeLog\Test;

use Exception;

include_once __DIR__.'/../src/Database/Migrations/2014_10_12_210000_create_logs_table.php';

class CodeLogServiceProviderTest extends TestCase
{
    /** @test */
    public function it_is_can_load_migrations()
    {
        $provider = app(Provider::class);
        app('config')->set('code-log.channel', 'database');

        $this->assertNull($provider->migrations());
    }

    /** @test */
    public function it_is_test_an_exception_on_model_constructor()
    {
        $this->expectException(Exception::class);

        app('config')->set('code-log.channels.database.connection', null);

        (new \CreateLogsTable())->up();
    }

    /** @test */
    public function it_is_test_down_method()
    {
        $this->assertNull((new \CreateLogsTable())->down());
    }

    /** @test */
    public function it_is_throw_exception_when_config_isnt_loaded()
    {
        $this->expectException(Exception::class);

        app('config')->set('code-log.table', null);
        
        (new \CreateLogsTable())->up();
    }
}

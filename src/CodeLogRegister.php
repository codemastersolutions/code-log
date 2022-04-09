<?php

namespace CodeMaster\CodeLog;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class CodeLogRegister
{
    /** @var Monolog\Logger $logger */
    private $logger;

    /** @var string $channel */
    private $channel;

    /** @var array $channels */
    private $channels;

    public function __construct()
    {
        $this->logger = new Logger('code-log');
        $this->channel = config('code-log.channel');
        $this->channels = config('code-log.channels');
    }

    /**
     * Get an instance of the role class.
     *
     * @return \Monolog\Logger
     */
    public function getLogger($level = Logger::DEBUG): Logger
    {
        if ($this->channel === 'file') {
            $path = $this->channels[$this->channel]['path'] ?? storage_path('logs/code-log.log');
        } else {
            $path = storage_path('logs/code-log.log');
        }

        return $this->logger->pushHandler(new StreamHandler($path, $level));
    }

    /**
     * Set new channel for logger
     * 
     * @param string $channel
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }
}

<?php

namespace CodeMaster\CodeLog\Logging;

use CodeMaster\CodeLog\CodeLogRegister;
use CodeMaster\CodeLog\Contracts\Log as LogContract;
use CodeMaster\CodeLog\Models\Log as ModelsLog;
use Monolog\Logger;

class Log implements LogContract {
    /**
     * @method static void error(string $message, array $context = [])
     * @method static void info(string $message, array $context = [])
     * @method static void success($level, string $message, array $context = [])
    */

    /**
     * General Events
     */
    public const INFO = 100;

    /**
     * Success Events
     */
    public const SUCCESS = 200;

    /**
     * Detailed debug information
     */
    public const DEBUG = 400;

    /**
     * Eror Events
     */
    public const ERROR = 500;

    /** @inheritDoc */
    public static function debug(string $message, array $context = []): void
    {
        self::log(Logger::DEBUG, $message, $context);
    }

    /** @inheritDoc */
    public static function error(string $message, array $context = []): void
    {
        self::log(Logger::ERROR, $message, $context);
    }

    /** @inheritDoc */
    public static function info(string $message, array $context = []): void
    {
        self::log(Logger::INFO, $message, $context);
    }

    /** @inheritDoc */
    public static function success(string $message, array $context = []): void
    {
        self::log(Logger::INFO, $message, $context);
    }

    /**
     * Efetua a persistência dos logs em seus respectivos canais
     * 
     * @param int $level
     * @param string $message
     * @param array $context
     */
    private static function log(int $level, string $message, $context = []): void
    {
        $logChannel = config('code-log.channel');
        $register = app(CodeLogRegister::class);

        switch($logChannel) {
            case 'file': {
                $context['user'] = !auth()->guest() ? auth()->user() : 'guest';
                $context['user_agent'] = request()->userAgent();
                
                /** @var \Monolog\Logger */
                $log = $register->getLogger($level);                
                $log->info($message, $context);
                break;
            }
            case 'database': {
                ModelsLog::create([
                    'user' => json_encode(!auth()->guest() ? auth()->user() : 'guest'),
                    'message' => json_encode($message),
                    'context' => json_encode($context),
                    'user_agent' => json_encode(request()->userAgent())
                ]);
                break;
            }
            default:
                return;
        }
    }
}

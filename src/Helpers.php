<?php

USE CodeMaster\CodeLog\Logging\Log;

if (! function_exists('codelog')) {

    /**
     * Helper para geração de logs
     * 
     * @param string $message
     * @param array $context
     * @param int $level
     * @return void
     */
    function codelog(string $message, $context = [], int $level = Log::DEBUG): void
    {
        switch($level) {
            case 100: {
                Log::info($message, $context);
                break;
            }
            case 200: {
                Log::success($message, $context);
                break;
            }
            case 400: {
                Log::debug($message, $context);
                break;
            }
            case 500: {
                Log::error($message, $context);
                break;
            }
            default: {
                Log::debug($message, $context);
            }
        }
    }
}

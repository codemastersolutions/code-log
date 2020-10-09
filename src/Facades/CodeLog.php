<?php

namespace CodeMaster\CodeLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeMaster\CodeLog\Skeleton\SkeletonClass
 */
class CodeLog extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'code-log';
    }
}

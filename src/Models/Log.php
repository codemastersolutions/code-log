<?php

namespace CodeMaster\CodeLog\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /** @var string|null */
    private static $conn;
    /** @var string|null */
    private static $customTableName;

    protected $fillable = ['user', 'message', 'context', 'user_agent'];

    /**
     * Model constructor
     *
     * @param array|null $attributes
     */
    public function __construct(array $attributes = [])
    {
        self::$conn = config('code-log.connection');

        if (! self::$conn) {
            self::$conn = $this->getConnectionName();
        }

        self::$customTableName = config('code-log.table');

        if (! self::$customTableName) {
            self::$customTableName = $this->getTable();
        }

        $this->setConnection(self::$conn);
        $this->setTable(self::$customTableName);

        parent::__construct($attributes);
    }

    /**
     * @inheritDoc
     */
    public static function create(array $attributes): self
    {
        return tap(static::query()->newModelInstance($attributes), function ($instance) {
            $instance->save();
        });
    }
}
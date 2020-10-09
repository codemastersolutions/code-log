<?php

use CodeMaster\CodeLog\Exceptions\ConfigNotLoaded;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    private static $conn;
    private static $table;

    public function __construct() {
        self::$conn = config('code-log.channels.database.connection');
        self::$table = config('code-log.channels.database.table');

        if (empty(self::$conn) || empty(self::$table)) {
            return new ConfigNotLoaded('config/code-log.php');
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(self::$conn)->create(self::$table, function (Blueprint $table) {
            $table->id();
            $table->text('user');
            $table->text('message');
            $table->text('context');
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(self::$conn)->dropIfExists(self::$table);
    }
}

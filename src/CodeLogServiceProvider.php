<?php

namespace CodeMaster\CodeLog;

use CodeMaster\CodeLog\Contracts\Log as LogContract;
use CodeMaster\CodeLog\Logging\Log;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CodeLogServiceProvider extends ServiceProvider
{
    /** @var array $channels */
    private $channels;

    public function boot(CodeLogRegister $codeLogLoader, Filesystem $filesystem)
    {
        $this->channels = config('code-log.channels');

        $this->register();
        $this->registerMigrations();
        $this->registerModelBindings();
        $this->registerPublishing($filesystem);

        $this->app->singleton(CodeLogRegister::class, function () use ($codeLogLoader) {
            return $codeLogLoader;
        });
    }

    /**
     * Register the package.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/code-log.php', 'code-log');
    }

    /**
     * Register the package's migrations.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if (config('code-log.channel') === 'database') {
            $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(Filesystem $filesystem)
    {
        if (function_exists('config_path')) {            
            $table = $this->channels['database']['table'];

            $this->publishes([
                __DIR__.'/../config/code-log.php' => config_path('code-log.php'),
            ], 'codelog-config');

            $this->publishes([
                __DIR__.'/Database/Migrations/2014_10_12_210000_create_logs_table.php' =>
                    $this->getMigrationFileName(
                        $filesystem,
                        $table,
                        '2014_10_12_210000'),
            ], 'codelog-migrations');
        }
    }

    /**
     * Register the package's models bind.
     *
     * @return void
     */
    protected function registerModelBindings()
    {
        $this->app->bind(LogContract::class, Log::class);
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @param string $tableName
     * @param string|null $timestamp
     *
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem, string $tableName, string $timestamp = null): string
    {
        $timestamp = $timestamp ?: date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem, $tableName) {
                return $filesystem->glob($path."*_create_{$tableName}_table.php");
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_{$tableName}_table.php")
            ->first();
    }
}

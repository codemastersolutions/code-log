<?php

namespace CodeMaster\CodeLog\Test;

use CodeMaster\CodeLog\CodeLogServiceProvider;

class Provider extends CodeLogServiceProvider {
    public function __construct()
    {
        parent::__construct(app());
    }

    public function modelBinds(): void
    {
        $this->registerModelBindings();
    }

    public function migrations(): void
    {
        $this->registerMigrations();
    }
}

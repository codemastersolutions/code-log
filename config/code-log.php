<?php

return [        
    /*
     * Nome padrão para o canal de logs.
     * 
     * Caso não seja informado nenhum canal específico no arquivo .env, será utilizado
     * o canal padrão `file`, onde os logs são armazenados na pasta `storage/logs`.
     * 
     * Canais aceitos: `file`, `database`
     */
    'channel' => env('CODELOG_CHANNEL', 'file'),

    /*
     * Nome padrão para o canal de logs.
     * 
     * Caso não seja informado nenhum canal específico no arquivo .env, será utilizado
     * o canal padrão `file`, onde os logs são armazenados na pasta `storage/logs`.
     */
    'channels' => [

        /*
         * Canal para armazenamento de logs em arquivo.         
         */
        'file' => [

            /*
             * Nome padrão para o arquivo de logs.
             * 
             * Caso não seja informado nenhum nome específico no arquivo .env, será utilizado
             * o nome padrão `code-log.log`.
             */
            'path' => storage_path('logs/' . env('CODE_LOG_FILENAME', 'code-log.log'))
        ],

        /*
         * Canal para armazenamento de logs em banco de dados.         
         */
        'database' => [
        
            /*
             * Conexão padrão do banco de dados.
             * 
             * Caso não seja informado nenhuma conexão expecifica no arquivo .env, será
             * utilizado a conexão padrão definida no arquivo `config/database.php` do Laravel.
             */
            'connection' => env('CODELOG_DB_CONNECTION', config('database.default')),

            /*
             * Nome padrão para a tabela de logs.
             * 
             * Caso não seja informado nenhum nome específico para a tabela no arquivo .env, será
             * utilizado a nomenclatura padrão do Laravel. Ex. `logs`.
             */
            'table' => env('CODELOG_TABLE_NAME', 'logs'),
        ]
    ],
];

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    protected $signature = 'logs:clear';
    protected $description = 'Очистить лог-файл';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        file_put_contents(storage_path('logs/laravel.log'), '');
        $this->info('Логи успешно очищены.');
    }
}

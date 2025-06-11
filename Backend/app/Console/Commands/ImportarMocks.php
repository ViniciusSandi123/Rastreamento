<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;

class ImportarMocks extends Command
{
    protected $signature = 'importar:mock';
    protected $description = 'Importa dados mockados das APIs para o banco';

    public function handle(ApiService $service): void
    {
        $this->info('Importando dados mockados...');
        $service->importarMocks();
        $this->info('Importação finalizada com sucesso!');
    }
}

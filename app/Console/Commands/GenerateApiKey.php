<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateApiKey extends Command
{
    protected $signature = 'generate:apikey';

    protected $description = 'Generate a new API key';

    public function handle()
    {
        $apiKey = bin2hex(random_bytes(16));
        $this->info('Your new API key is: '.$apiKey);
    }
}

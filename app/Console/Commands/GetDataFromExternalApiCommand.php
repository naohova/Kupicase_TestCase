<?php

namespace App\Console\Commands;

use App\Components\ImportExternalApiDataClient;
use Illuminate\Console\Command;

class GetDataFromExternalApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:externalData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get raw data from external api in json format';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportExternalApiDataClient();
        $response = $import->client->request('GET');
        dd(json_decode($response->getBody()->getContents()));
    }
}

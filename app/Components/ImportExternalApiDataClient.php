<?php

namespace App\Components;


use GuzzleHttp\Client;

class ImportExternalApiDataClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://u0362146.plsk.regruhosting.ru/api',
            'verify' => false,
        ]);
    }

    public function GetJson()
    {
        return json_decode($this->client->request('GET')->getBody()->getContents());
    }
}

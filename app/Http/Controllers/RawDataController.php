<?php

namespace App\Http\Controllers;
use App\Components\ImportExternalApiDataClient;

class RawDataController extends Controller
{
    public function PrintRaw(){
        $client = new ImportExternalApiDataClient();
        dd($client->GetJson());
    }
    public function FormatResultArray()
    {
        $client = new ImportExternalApiDataClient();
        $response = $client->GetJson();
        $sum = 0;
        $rawWarehouses = [];
        foreach($response as $item){
            $sum += $item->Price;
            $rawWarehouses[] = $item->warehouseName;
        }

        $warehouses = array_count_values($rawWarehouses);
        $warehouses = array_flip($warehouses);
        $UniqueWarehouses = [];
        foreach ($warehouses as $item)
            $UniqueWarehouses[] = $item;

        $result = [
            'summPrice' =>$sum,
            'uniqueWarehouse'=> $UniqueWarehouses,
        ];
        // foreach ($warehouses as $item)
        //     $result['uniqueWarehouse'] += $item;
        dump(json_encode($result, JSON_UNESCAPED_UNICODE));

    }

}

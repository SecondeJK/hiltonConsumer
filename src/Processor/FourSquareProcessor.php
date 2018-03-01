<?php

namespace App\Processor;

use App\ApiClient\ApiClient;
use App\Interfaces\ProcessorInterface;

class FourSquareProcessor extends Processor
{
    public function process()
    {
        echo "Processing FourSquare";
        $aResult = $this->apiClient->returnBodyFromApiCall('https://content-api.hiltonapps.com/v1/places/top-places/uk-london-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v');
        dump($aResult);
    }
}
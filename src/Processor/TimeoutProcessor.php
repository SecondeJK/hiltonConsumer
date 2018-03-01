<?php

namespace App\Processor;

use App\ApiClient\ApiClient;

class TimeoutProcessor extends Processor
{
    public function process()
    {
        echo 'Processing Timeout';
    }
}
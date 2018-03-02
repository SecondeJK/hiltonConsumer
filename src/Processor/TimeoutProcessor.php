<?php

namespace App\Processor;

use App\ApiClient\ApiClient;

class TimeoutProcessor extends Processor
{
    protected $clientCode = 'timeout';
}
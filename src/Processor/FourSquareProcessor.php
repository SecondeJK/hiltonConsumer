<?php

namespace App\Processor;

use App\ApiClient\ApiClient;
use App\Interfaces\ProcessorInterface;

class FourSquareProcessor extends Processor
{
    protected $clientCode = 'fsq';
}
<?php

namespace App\Processor;

use App\Interfaces\ProcessorInterface;

abstract class Processor implements ProcessorInterface
{

    public function process(){}
}
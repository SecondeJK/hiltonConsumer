<?php

namespace App\Processor;

use App\Interfaces\ProcessorInterface;

class FourSquareProcessor extends Processor
{
    public function process()
    {
        echo "Processing FourSquare";
    }
}
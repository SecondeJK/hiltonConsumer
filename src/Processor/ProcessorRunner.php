<?php

namespace App\Processor;

/**
 * Runner for all processors using service tags app.processor
 * @package App\Processor
 */
class ProcessorRunner
{
    private $processors;

    public function __construct(iterable $processors)
    {
        $this->processors = $processors;
    }

    public function execute()
    {
        foreach ($this->processors as $processor) {
            $processor->process();
        }
    }
}
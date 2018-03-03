<?php
namespace App\Processor;

use App\Entity\Feed;

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
    public function processFeed(Feed $feed)
    {
        foreach ($this->processors as $processor) {
            if ($feed->getProvider() == $processor::providerName())
            {
                $processor->process($feed);
            }
        }
    }
}
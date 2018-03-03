<?php
namespace App\Processor;

use App\Entity\Feed;

class TimeoutProcessor extends Processor
{
    static function providerName(): string
    {
        return 'timeout';
    }

    public function process(Feed $feed): void
    {
    }

    public function persistEntityFromLocation(array $location): void
    {
        // TODO: Implement persistEntityFromLocation() method.
    }

    static function generateProcessorEntity()
    {
        // TODO: Implement generateProcessorEntity() method.
    }
}
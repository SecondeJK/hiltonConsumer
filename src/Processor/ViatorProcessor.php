<?php
namespace App\Processor;

use App\Entity\Feed;

class ViatorProcessor extends Processor
{
    static function providerName(): string
    {
        return 'via';
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
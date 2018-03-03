<?php

namespace App\Interfaces;

use App\Entity\Feed;

interface ProcessorInterface
{
    static function providerName(): string;

    public function process(Feed $feed): void;

    public function resolveFullUrl(): string;

    public function persistEntityFromLocation(array $location): void;

    static function generateProcessorEntity();
}
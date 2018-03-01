<?php

namespace App\Processor;

use App\ApiClient\ApiClient;
use App\Interfaces\ProcessorInterface;

abstract class Processor implements ProcessorInterface
{
    protected $apiClient;

    protected $baseUrl;

    public function __construct(string $baseUrl, ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        $this->baseUrl = $baseUrl;
    }

    public function process()
    {
        // Method to overload
    }
}
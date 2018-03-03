<?php

namespace App\Processor;

use App\ApiClient\ApiClient;
use App\Entity\Feed;
use App\Interfaces\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @package App\Processor
 */
abstract class Processor implements ProcessorInterface
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var Feed
     */
    protected $feed;

    /**
     * @var string
     */
    protected $authToken;

    /**
     * @var \DateTime
     */
    protected $dateCreated;

    /**
     * @var \DateTime
     */
    protected $dateUpdated;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * Processor constructor.
     * @param string $baseUrl
     * @param ApiClient $apiClient
     * @param string $authtoken
     */
    public function __construct(string $baseUrl, ApiClient $apiClient, string $authtoken, EntityManagerInterface $em)
    {
        $this->apiClient = $apiClient;
        $this->baseUrl = $baseUrl;
        $this->authToken = $authtoken;
        $this->em = $em;
    }

    /**
     * Stub to extend to specific processing power per entity
     *
     * @param Feed $feed
     */
    public function process(Feed $feed): void
    {
        return;
    }

    /**
     * @return string
     */
    public function resolveFullUrl(): string
    {
        return $this->baseUrl . '/' . $this->feed->getLocationApiString() . '-' . $this->feed->getProvider() . "?access_token=" . $this->authToken;
    }
}
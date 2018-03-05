<?php

namespace App\Processor;

use App\ApiClient\ApiClient;
use App\Entity\Feed;
use App\Interfaces\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

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
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Processor constructor.
     * @param string $baseUrl
     * @param ApiClient $apiClient
     * @param string $authtoken
     */
    public function __construct(string $baseUrl, ApiClient $apiClient, string $authtoken, EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->apiClient = $apiClient;
        $this->baseUrl = $baseUrl;
        $this->authToken = $authtoken;
        $this->logger = $logger;
        $this->em = $em;
    }

    public function process(Feed $feed): void
    {
        $this->feed = $feed;
        $this->logger->info('Processing Feed: ' . $feed->getLocationName() . " " . $feed->getProvider());
        $result = $this->apiClient->makeApiCall($this->resolveFullUrl());
        $this->logger->info("Made API Call, result: " . var_dump($result));
        $metaLocation = array_column($result, 'location');
        $metaLocation = array_shift($metaLocation);
        $this->dateCreated = $metaLocation['created'];
        $this->dateUpdated = $metaLocation['updated'];

        $locationsToProcess = array_column($result, 'locations');

        // Some massaging required here
        $locationsToProcess = array_shift($locationsToProcess);

        foreach ($locationsToProcess as $location) {
            $this->persistEntityFromLocation($location);
        }
        $this->em->flush();
    }

    /**
     * @return string
     */
    public function resolveFullUrl(): string
    {
        return $this->baseUrl . '/' . $this->feed->getLocationApiString() . '-' . $this->feed->getProvider() . "?access_token=" . $this->authToken;
    }
}
<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\ViatorLocation;

class ViatorProcessor extends Processor
{
    static function providerName(): string
    {
        return 'via';
    }

    public function process(Feed $feed): void
    {
        $this->feed = $feed;
        $result = $this->apiClient->makeApiCall($this->resolveFullUrl());

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

    public function persistEntityFromLocation(array $location): void
    {
        $entity = self::generateProcessorEntity();
        $entity->setName($location['name']);
        $entity->setCreated(new \DateTime($this->dateCreated));
        $entity->setUpdated(new \DateTime($this->dateUpdated));
        $entity->setLatitude($location['latitude']);
        $entity->setLongitude($location['longitude']);
        $entity->setLocationName($this->feed->getLocationName());

        $entity->setDescription($location['description']);
        $entity->setDuration($location['duration']);
        $entity->setLink($location['link']);
        $entity->setRating($location['rating']);
        $entity->setRatingCount($location['rating_count']);
        $entity->setPrice($location['price']);
        $entity->setImageThumb($location['image_thumb']);
        $entity->setImageLarge($location['image_large']);
        $entity->setFeatured($location['featured']);
        $entity->setStartDate(new \DateTime($location['start_date']));
        $entity->setEndDate(new \DateTime($location['end_date']));
    }

    static function generateProcessorEntity()
    {
        return new ViatorLocation();
    }
}
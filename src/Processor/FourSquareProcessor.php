<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\FourSquareLocation;

/**
 * @package App\Processor
 */
class FourSquareProcessor extends Processor
{
    static function providerName(): string
    {
        return 'fsq';
    }

    static function generateProcessorEntity()
    {
        return new FourSquareLocation();
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
        $entity->setAddress($location['address']);
        $entity->setCategory($location['category']);
        $entity->setLink($location['link']);
        $entity->setRating($location['rating']);
        $entity->setPrice($location['price']);
        $entity->setImage($location['image']);
        $this->em->persist($entity);
    }
}
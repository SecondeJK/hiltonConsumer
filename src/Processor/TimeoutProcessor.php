<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\TimeoutLocation;

class TimeoutProcessor extends Processor
{
    static function providerName(): string
    {
        return 'timeout';
    }

    public function persistEntityFromLocation(array $location): void
    {
        // TODO Can use reflection to work out a way of looping through fields
        // Through something like if __get
        $entity = self::generateProcessorEntity();
        $entity->setName($location['name']);
        $entity->setCreated(new \DateTime($this->dateCreated));
        $entity->setUpdated(new \DateTime($this->dateUpdated));
        $entity->setLatitude($location['latitude']);
        $entity->setLongitude($location['longitude']);
        $entity->setLocationName($this->feed->getLocationName());

        $entity->setDescription($location['description']);
        $entity->setAddress($location['address']);
        $entity->setCategory($location['category']);
        $entity->setLink($location['link']);
        $entity->setRating($location['rating']);
        $entity->setPrice($location['price']);
        $entity->setImage($location['image']);
        $entity->setImageDynamic($location['image_dynamic']);
        $entity->setFeatured($location['featured']);
        $entity->setStartDate(new \DateTime($location['start_date']));
        $entity->setEndDate(new \DateTime($location['end_date']));

        $this->em->persist($entity);
    }

    static function generateProcessorEntity()
    {
        return new TimeoutLocation();
    }
}
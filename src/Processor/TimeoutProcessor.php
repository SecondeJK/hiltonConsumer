<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\TimeoutLocation;

/**
 * Class TimeoutProcessor
 * @package App\Processor
 */
class TimeoutProcessor extends Processor
{
    /**
     * @return string
     */
    static function providerName(): string
    {
        return 'timeout';
    }

    /**
     * @param array $location
     */
    public function persistEntityFromLocation(array $location): void
    {
        $entity = self::generateProcessorEntity();
        $entity->setName($location['name'])
            ->setCreated(new \DateTime($this->dateCreated))
            ->setUpdated(new \DateTime($this->dateUpdated))
            ->setLatitude($location['latitude'])
            ->setLongitude($location['longitude'])
            ->setLocationName($this->feed->getLocationName())
            ->setDescription($location['description'])
            ->setAddress($location['address'])
            ->setCategory($location['category'])
            ->setLink($location['link'])
            ->setRating($location['rating'])
            ->setPrice($location['price'])
            ->setImage($location['image'])
            ->setImageDynamic($location['image_dynamic'])
            ->setFeatured($location['featured'])
            ->setStartDate(new \DateTime($location['start_date']))
            ->setEndDate(new \DateTime($location['end_date']));

        $this->em->persist($entity);
    }

    /**
     * @return TimeoutLocation
     */
    static function generateProcessorEntity()
    {
        return new TimeoutLocation();
    }
}
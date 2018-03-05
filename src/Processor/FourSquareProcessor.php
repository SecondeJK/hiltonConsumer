<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\FourSquareLocation;

/**
 * @package App\Processor
 */
class FourSquareProcessor extends Processor
{
    /**
     * @return string
     */
    static function providerName(): string
    {
        return 'fsq';
    }

    /**
     * @return FourSquareLocation
     */
    static function generateProcessorEntity()
    {
        return new FourSquareLocation();
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
            ->setAddress($location['address'])
            ->setCategory($location['category'])
            ->setLink($location['link'])
            ->setRating($location['rating'])
            ->setPrice($location['price'])
            ->setImage($location['image']);

        $this->em->persist($entity);
    }
}
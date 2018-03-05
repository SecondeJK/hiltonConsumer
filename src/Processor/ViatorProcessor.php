<?php
namespace App\Processor;

use App\Entity\Feed;
use App\Entity\ViatorLocation;

/**
 * Class ViatorProcessor
 * @package App\Processor
 */
class ViatorProcessor extends Processor
{
    /**
     * @return string
     */
    static function providerName(): string
    {
        return 'via';
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
            ->setDuration($location['duration'])
            ->setLink($location['link'])
            ->setRating($location['rating'])
            ->setRatingCount($location['rating_count'])
            ->setPrice($location['price'])
            ->setImageThumb($location['image_thumb'])
            ->setImageLarge($location['image_large'])
            ->setFeatured($location['featured'])
            ->setStartDate(new \DateTime($location['start_date']))
            ->setEndDate(new \DateTime($location['end_date']));
    }

    /**
     * @return ViatorLocation
     */
    static function generateProcessorEntity()
    {
        return new ViatorLocation();
    }
}
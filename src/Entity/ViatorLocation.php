<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeoutLocation
 * @package App\Entity
 * @ORM\Entity
 */
class ViatorLocation extends Location
{
    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $duration;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $link;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $rating;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $ratingCount;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $price;

    /**
     * @ORM\Column(type="string",length=200, nullable=true)
     */
    protected $imageThumb;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $imageLarge;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $featured;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endDate;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return ViatorLocation
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return ViatorLocation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return ViatorLocation
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     * @return ViatorLocation
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * @param mixed $ratingCount
     * @return ViatorLocation
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return ViatorLocation
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageThumb()
    {
        return $this->imageThumb;
    }

    /**
     * @param mixed $imageThumb
     * @return ViatorLocation
     */
    public function setImageThumb($imageThumb)
    {
        $this->imageThumb = $imageThumb;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageLarge()
    {
        return $this->imageLarge;
    }

    /**
     * @param mixed $imageLarge
     * @return ViatorLocation
     */
    public function setImageLarge($imageLarge)
    {
        $this->imageLarge = $imageLarge;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * @param mixed $featured
     * @return ViatorLocation
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     * @return ViatorLocation
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     * @return ViatorLocation
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }
}
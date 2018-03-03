<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeoutLocation
 * @package App\Entity
 * @ORM\Entity
 */
class TimeoutLocation extends Location
{
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $category;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $link;

    /**
     * @ORM\Column(type="float")
     */
    protected $rating;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $imageDynamic;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $featured;

    /**
     * @ORM\Column(type="date")
     */
    protected $startDate;

    /**
     * @ORM\Column(type="date")
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
     * @return TimeoutLocation
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return TimeoutLocation
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return TimeoutLocation
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
     * @return TimeoutLocation
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
     * @return TimeoutLocation
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
     * @return TimeoutLocation
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return TimeoutLocation
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageDynamic()
    {
        return $this->imageDynamic;
    }

    /**
     * @param mixed $imageDynamic
     * @return TimeoutLocation
     */
    public function setImageDynamic($imageDynamic)
    {
        $this->imageDynamic = $imageDynamic;
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
     * @return TimeoutLocation
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
     * @return TimeoutLocation
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
     * @return TimeoutLocation
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

}
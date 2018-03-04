<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Serializer as Serializer;

/**
 * Class FourSquareLocation
 *
 * @package App\Entity
 * @ORM\Entity
 */
class FourSquareLocation extends Location
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $category;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $link;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $rating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $image;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return FourSquareLocation
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
     * @return FourSquareLocation
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
     * @return FourSquareLocation
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
     * @return FourSquareLocation
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
     * @return FourSquareLocation
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
     * @return FourSquareLocation
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
}

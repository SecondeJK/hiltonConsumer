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
    protected $duration;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $link;

    /**
     * @ORM\Column(type="float")
     */
    protected $rating;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $rating_count;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $imageThumb;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $imageLarge;

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
}
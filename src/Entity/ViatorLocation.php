<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class ViatorLocation extends Location
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
     * @ORM\Column(type="string", length=100)
     */
    protected $category;

    /**
     * @ORM\Column(type="string", length=50)
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
     * @ORM\Column(type="integer")
     */
    protected $ratingCount;

    /**
     * @ORM\Column(type="string", length=100)
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

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
}
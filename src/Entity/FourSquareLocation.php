<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}

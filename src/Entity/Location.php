<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="provider", type="string")
 * @ORM\DiscriminatorMap(
 *     {
 *       "timeoutlocation" = "TimeoutLocation",
 *       "foursqaurelocation" = "FourSquareLocation",
 *       "viatorlocation" = "ViatorLocation"
 *     })
 */
abstract class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100))
     */
    protected $name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $created;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $updated;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $locationName;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $latitude;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $longitude;

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     * @return Location
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     * @return Location
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Location
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Location
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     * @return Location
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param mixed $locationName
     * @return Location
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FeedRepository")
 */
class Feed
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $locationName;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $locationApiString;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $provider;

    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param mixed $locationName
     * @return Feed
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocationApiString()
    {
        return $this->locationApiString;
    }

    /**
     * @param mixed $locationApiString
     * @return Feed
     */
    public function setLocationApiString($locationApiString)
    {
        $this->locationApiString = $locationApiString;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     * @return Feed
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

}

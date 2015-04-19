<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApnsCategories
 *
 * @ORM\Table(name="apns_categories")
 * @ORM\Entity
 */
class ApnsCategories
{
    /**
     * @var string
     *
     * @ORM\Column(name="deviceuid", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deviceuid;

    /**
     * @var string
     *
     * @ORM\Column(name="categories", type="string", length=100, nullable=true)
     */
    private $categories;



    /**
     * Get deviceuid
     *
     * @return string 
     */
    public function getDeviceuid()
    {
        return $this->deviceuid;
    }

    /**
     * Set categories
     *
     * @param string $categories
     * @return ApnsCategories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return string 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}

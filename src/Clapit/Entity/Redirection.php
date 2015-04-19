<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Redirection
 *
 * @ORM\Table(name="redirection")
 * @ORM\Entity
 */
class Redirection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=250, nullable=false)
     */
    private $origine = '';

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=250, nullable=false)
     */
    private $destination = '';



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set origine
     *
     * @param string $origine
     * @return Redirection
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string 
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Redirection
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string 
     */
    public function getDestination()
    {
        return $this->destination;
    }
}

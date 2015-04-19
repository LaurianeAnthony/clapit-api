<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Groups;

/**
 * Pdv
 *
 * @ORM\Table(name="pdv", indexes={@ORM\Index(name="did", columns={"did"})})
 * @ORM\Entity(repositoryClass="PdvRepository")
 */
class Pdv
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     * @Groups({"public"})
     */
    private $intitule = '';

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     * @Groups({"public"})
     */
    private $adresse = '';

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     * @Groups({"public"})
     */
    private $latitude = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=false)
     * @Groups({"public"})
     */
    private $longitude = '0';

    /**
     * @var \Clapit\Entity\Deal
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Deal", inversedBy="pdvs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="did", referencedColumnName="id")
     * })
     */
    private $deal;



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
     * Set intitule
     *
     * @param string $intitule
     * @return Pdv
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Pdv
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Pdv
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Pdv
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set deal
     *
     * @param \Clapit\Entity\Deal $deal
     * @return Pdv
     */
    public function setDeal(Deal $deal = null)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \Clapit\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }

}

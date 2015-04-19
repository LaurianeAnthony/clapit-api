<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentesFlash
 *
 * @ORM\Table(name="ventes_flash", indexes={@ORM\Index(name="did", columns={"did"}), @ORM\Index(name="flash_start", columns={"flash_start"}), @ORM\Index(name="flash_end", columns={"flash_end"}), @ORM\Index(name="title", columns={"title"}), @ORM\Index(name="url", columns={"url"}), @ORM\Index(name="price", columns={"price"}), @ORM\Index(name="active", columns={"active"})})
 * @ORM\Entity
 */
class VentesFlash
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
     * @var integer
     *
     * @ORM\Column(name="did", type="integer", nullable=false)
     */
    private $did;

    /**
     * @var integer
     *
     * @ORM\Column(name="url", type="integer", nullable=false)
     */
    private $url;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=false)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="shipment", type="text", nullable=false)
     */
    private $shipment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="flash_start", type="datetime", nullable=false)
     */
    private $flashStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="flash_end", type="datetime", nullable=false)
     */
    private $flashEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="text", nullable=false)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="text", nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="technical_details", type="text", nullable=false)
     */
    private $technicalDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';



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
     * Set did
     *
     * @param integer $did
     * @return VentesFlash
     */
    public function setDid($did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Get did
     *
     * @return integer 
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Set url
     *
     * @param integer $url
     * @return VentesFlash
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return integer 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return VentesFlash
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return VentesFlash
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set shipment
     *
     * @param string $shipment
     * @return VentesFlash
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * Get shipment
     *
     * @return string 
     */
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * Set flashStart
     *
     * @param \DateTime $flashStart
     * @return VentesFlash
     */
    public function setFlashStart($flashStart)
    {
        $this->flashStart = $flashStart;

        return $this;
    }

    /**
     * Get flashStart
     *
     * @return \DateTime 
     */
    public function getFlashStart()
    {
        return $this->flashStart;
    }

    /**
     * Set flashEnd
     *
     * @param \DateTime $flashEnd
     * @return VentesFlash
     */
    public function setFlashEnd($flashEnd)
    {
        $this->flashEnd = $flashEnd;

        return $this;
    }

    /**
     * Get flashEnd
     *
     * @return \DateTime 
     */
    public function getFlashEnd()
    {
        return $this->flashEnd;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return VentesFlash
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return VentesFlash
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return VentesFlash
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return VentesFlash
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set technicalDetails
     *
     * @param string $technicalDetails
     * @return VentesFlash
     */
    public function setTechnicalDetails($technicalDetails)
    {
        $this->technicalDetails = $technicalDetails;

        return $this;
    }

    /**
     * Get technicalDetails
     *
     * @return string 
     */
    public function getTechnicalDetails()
    {
        return $this->technicalDetails;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return VentesFlash
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return VentesFlash
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}

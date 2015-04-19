<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenteFlashSold
 *
 * @ORM\Table(name="vente_flash_sold", indexes={@ORM\Index(name="vid", columns={"vid"}), @ORM\Index(name="uid", columns={"uid"}), @ORM\Index(name="order_number", columns={"order_number"})})
 * @ORM\Entity
 */
class VenteFlashSold
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
     * @ORM\Column(name="uid", type="integer", nullable=false)
     */
    private $uid;

    /**
     * @var integer
     *
     * @ORM\Column(name="vid", type="integer", nullable=false)
     */
    private $vid;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=255, nullable=false)
     */
    private $orderNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="text", nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="text", nullable=true)
     */
    private $size;

    /**
     * @var float
     *
     * @ORM\Column(name="payed", type="float", precision=10, scale=0, nullable=false)
     */
    private $payed;

    /**
     * @var string
     *
     * @ORM\Column(name="shipment_address", type="text", nullable=false)
     */
    private $shipmentAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_status", type="text", nullable=false)
     */
    private $paymentStatus;



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
     * Set uid
     *
     * @param integer $uid
     * @return VenteFlashSold
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set vid
     *
     * @param integer $vid
     * @return VenteFlashSold
     */
    public function setVid($vid)
    {
        $this->vid = $vid;

        return $this;
    }

    /**
     * Get vid
     *
     * @return integer 
     */
    public function getVid()
    {
        return $this->vid;
    }

    /**
     * Set orderNumber
     *
     * @param string $orderNumber
     * @return VenteFlashSold
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return string 
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return VenteFlashSold
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
     * @return VenteFlashSold
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
     * Set size
     *
     * @param string $size
     * @return VenteFlashSold
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
     * Set payed
     *
     * @param float $payed
     * @return VenteFlashSold
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * Get payed
     *
     * @return float 
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * Set shipmentAddress
     *
     * @param string $shipmentAddress
     * @return VenteFlashSold
     */
    public function setShipmentAddress($shipmentAddress)
    {
        $this->shipmentAddress = $shipmentAddress;

        return $this;
    }

    /**
     * Get shipmentAddress
     *
     * @return string 
     */
    public function getShipmentAddress()
    {
        return $this->shipmentAddress;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return VenteFlashSold
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set paymentStatus
     *
     * @param string $paymentStatus
     * @return VenteFlashSold
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }
}

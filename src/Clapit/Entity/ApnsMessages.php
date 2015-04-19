<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApnsMessages
 *
 * @ORM\Table(name="apns_messages", indexes={@ORM\Index(name="clientid", columns={"clientid"}), @ORM\Index(name="fk_device", columns={"fk_device"}), @ORM\Index(name="status", columns={"status"}), @ORM\Index(name="created", columns={"created"}), @ORM\Index(name="modified", columns={"modified"}), @ORM\Index(name="message", columns={"message"}), @ORM\Index(name="delivery", columns={"delivery"})})
 * @ORM\Entity
 */
class ApnsMessages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="clientid", type="string", length=64, nullable=false)
     */
    private $clientid;

    /**
     * @var integer
     *
     * @ORM\Column(name="fk_device", type="integer", nullable=false)
     */
    private $fkDevice;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delivery", type="datetime", nullable=false)
     */
    private $delivery;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status = 'queued';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified = '0000-00-00 00:00:00';



    /**
     * Get pid
     *
     * @return integer 
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set clientid
     *
     * @param string $clientid
     * @return ApnsMessages
     */
    public function setClientid($clientid)
    {
        $this->clientid = $clientid;

        return $this;
    }

    /**
     * Get clientid
     *
     * @return string 
     */
    public function getClientid()
    {
        return $this->clientid;
    }

    /**
     * Set fkDevice
     *
     * @param integer $fkDevice
     * @return ApnsMessages
     */
    public function setFkDevice($fkDevice)
    {
        $this->fkDevice = $fkDevice;

        return $this;
    }

    /**
     * Get fkDevice
     *
     * @return integer 
     */
    public function getFkDevice()
    {
        return $this->fkDevice;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return ApnsMessages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set delivery
     *
     * @param \DateTime $delivery
     * @return ApnsMessages
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return \DateTime 
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ApnsMessages
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ApnsMessages
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return ApnsMessages
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
}

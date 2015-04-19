<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliatedtrack
 *
 * @ORM\Table(name="affiliatedtrack")
 * @ORM\Entity
 */
class Affiliatedtrack
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
     * @ORM\Column(name="affiliate_code", type="string", length=32, nullable=false)
     */
    private $affiliateCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="deal_id", type="integer", nullable=false)
     */
    private $dealId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="useragent", type="string", length=200, nullable=false)
     */
    private $useragent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;



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
     * Set affiliateCode
     *
     * @param string $affiliateCode
     * @return Affiliatedtrack
     */
    public function setAffiliateCode($affiliateCode)
    {
        $this->affiliateCode = $affiliateCode;

        return $this;
    }

    /**
     * Get affiliateCode
     *
     * @return string 
     */
    public function getAffiliateCode()
    {
        return $this->affiliateCode;
    }

    /**
     * Set dealId
     *
     * @param integer $dealId
     * @return Affiliatedtrack
     */
    public function setDealId($dealId)
    {
        $this->dealId = $dealId;

        return $this;
    }

    /**
     * Get dealId
     *
     * @return integer 
     */
    public function getDealId()
    {
        return $this->dealId;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Affiliatedtrack
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set useragent
     *
     * @param string $useragent
     * @return Affiliatedtrack
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;

        return $this;
    }

    /**
     * Get useragent
     *
     * @return string 
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Affiliatedtrack
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
}

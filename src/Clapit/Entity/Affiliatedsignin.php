<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliatedsignin
 *
 * @ORM\Table(name="affiliatedsignin")
 * @ORM\Entity
 */
class Affiliatedsignin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAffiliated", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idaffiliated;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $iduser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="signInDateTime", type="datetime", nullable=false)
     */
    private $signindatetime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="subscriber", type="boolean", nullable=false)
     */
    private $subscriber = '0';



    /**
     * Set idaffiliated
     *
     * @param integer $idaffiliated
     * @return Affiliatedsignin
     */
    public function setIdaffiliated($idaffiliated)
    {
        $this->idaffiliated = $idaffiliated;

        return $this;
    }

    /**
     * Get idaffiliated
     *
     * @return integer 
     */
    public function getIdaffiliated()
    {
        return $this->idaffiliated;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Affiliatedsignin
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set signindatetime
     *
     * @param \DateTime $signindatetime
     * @return Affiliatedsignin
     */
    public function setSignindatetime($signindatetime)
    {
        $this->signindatetime = $signindatetime;

        return $this;
    }

    /**
     * Get signindatetime
     *
     * @return \DateTime 
     */
    public function getSignindatetime()
    {
        return $this->signindatetime;
    }

    /**
     * Set subscriber
     *
     * @param boolean $subscriber
     * @return Affiliatedsignin
     */
    public function setSubscriber($subscriber)
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * Get subscriber
     *
     * @return boolean 
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }
}

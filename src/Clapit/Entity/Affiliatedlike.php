<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliatedlike
 *
 * @ORM\Table(name="affiliatedlike")
 * @ORM\Entity
 */
class Affiliatedlike
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
     * @ORM\Column(name="idDeal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $iddeal;

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
     * @ORM\Column(name="likeDateTime", type="datetime", nullable=false)
     */
    private $likedatetime;



    /**
     * Set idaffiliated
     *
     * @param integer $idaffiliated
     * @return Affiliatedlike
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
     * Set iddeal
     *
     * @param integer $iddeal
     * @return Affiliatedlike
     */
    public function setIddeal($iddeal)
    {
        $this->iddeal = $iddeal;

        return $this;
    }

    /**
     * Get iddeal
     *
     * @return integer 
     */
    public function getIddeal()
    {
        return $this->iddeal;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Affiliatedlike
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
     * Set likedatetime
     *
     * @param \DateTime $likedatetime
     * @return Affiliatedlike
     */
    public function setLikedatetime($likedatetime)
    {
        $this->likedatetime = $likedatetime;

        return $this;
    }

    /**
     * Get likedatetime
     *
     * @return \DateTime 
     */
    public function getLikedatetime()
    {
        return $this->likedatetime;
    }
}

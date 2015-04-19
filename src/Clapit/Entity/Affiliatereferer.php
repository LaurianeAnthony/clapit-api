<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliatereferer
 *
 * @ORM\Table(name="affiliatereferer")
 * @ORM\Entity
 */
class Affiliatereferer
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
     * @ORM\Column(name="idAffiliated", type="integer", nullable=false)
     */
    private $idaffiliated;

    /**
     * @var integer
     *
     * @ORM\Column(name="idDeal", type="integer", nullable=false)
     */
    private $iddeal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="refDateTime", type="datetime", nullable=false)
     */
    private $refdatetime;



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
     * Set idaffiliated
     *
     * @param integer $idaffiliated
     * @return Affiliatereferer
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
     * @return Affiliatereferer
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
     * Set refdatetime
     *
     * @param \DateTime $refdatetime
     * @return Affiliatereferer
     */
    public function setRefdatetime($refdatetime)
    {
        $this->refdatetime = $refdatetime;

        return $this;
    }

    /**
     * Get refdatetime
     *
     * @return \DateTime 
     */
    public function getRefdatetime()
    {
        return $this->refdatetime;
    }
}

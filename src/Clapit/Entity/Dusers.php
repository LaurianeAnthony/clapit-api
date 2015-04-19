<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dusers
 *
 * @ORM\Table(name="dusers", indexes={@ORM\Index(name="uid", columns={"uid"}), @ORM\Index(name="fid", columns={"fid"})})
 * @ORM\Entity
 */
class Dusers
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
     * @ORM\Column(name="value", type="string", length=250, nullable=false)
     */
    private $value = '';

    /**
     * @var \Clapit\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="id")
     * })
     */
    private $uid;

    /**
     * @var \Clapit\Entity\Formulaire
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Formulaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fid", referencedColumnName="id")
     * })
     */
    private $fid;



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
     * Set value
     *
     * @param string $value
     * @return Dusers
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set uid
     *
     * @param \Clapit\Entity\Users $uid
     * @return Dusers
     */
    public function setUid(\Clapit\Entity\Users $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return \Clapit\Entity\Users 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set fid
     *
     * @param \Clapit\Entity\Formulaire $fid
     * @return Dusers
     */
    public function setFid(\Clapit\Entity\Formulaire $fid = null)
    {
        $this->fid = $fid;

        return $this;
    }

    /**
     * Get fid
     *
     * @return \Clapit\Entity\Formulaire 
     */
    public function getFid()
    {
        return $this->fid;
    }
}

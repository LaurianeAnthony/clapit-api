<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alertes
 *
 * @ORM\Table(name="alertes", uniqueConstraints={@ORM\UniqueConstraint(name="uid", columns={"uid", "cid"})}, indexes={@ORM\Index(name="uid_2", columns={"uid"}), @ORM\Index(name="cid", columns={"cid"})})
 * @ORM\Entity
 */
class Alertes
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
     * @var string
     *
     * @ORM\Column(name="cid", type="string", length=50, nullable=false)
     */
    private $cid;



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
     * @return Alertes
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
     * Set cid
     *
     * @param string $cid
     * @return Alertes
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return string 
     */
    public function getCid()
    {
        return $this->cid;
    }
}

<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikeAnnonceurs
 *
 * @ORM\Table(name="like_annonceurs", indexes={@ORM\Index(name="did", columns={"did"})})
 * @ORM\Entity
 */
class LikeAnnonceurs
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
     * @ORM\Column(name="nb", type="integer", nullable=false)
     */
    private $nb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';



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
     * @return LikeAnnonceurs
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
     * Set nb
     *
     * @param integer $nb
     * @return LikeAnnonceurs
     */
    public function setNb($nb)
    {
        $this->nb = $nb;

        return $this;
    }

    /**
     * Get nb
     *
     * @return integer 
     */
    public function getNb()
    {
        return $this->nb;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return LikeAnnonceurs
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

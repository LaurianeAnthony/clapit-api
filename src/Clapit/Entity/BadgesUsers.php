<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BadgesUsers
 *
 * @ORM\Table(name="badges_users", uniqueConstraints={@ORM\UniqueConstraint(name="bid", columns={"bid", "uid"})}, indexes={@ORM\Index(name="uid", columns={"uid"}), @ORM\Index(name="bid_2", columns={"bid"})})
 * @ORM\Entity
 */
class BadgesUsers
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \Clapit\Entity\Badges
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Badges")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bid", referencedColumnName="id")
     * })
     */
    private $bid;



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
     * @return BadgesUsers
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
     * Set date
     *
     * @param \DateTime $date
     * @return BadgesUsers
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
     * Set bid
     *
     * @param \Clapit\Entity\Badges $bid
     * @return BadgesUsers
     */
    public function setBid(\Clapit\Entity\Badges $bid = null)
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * Get bid
     *
     * @return \Clapit\Entity\Badges 
     */
    public function getBid()
    {
        return $this->bid;
    }
}
